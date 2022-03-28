<?php

namespace App\Http\Controllers;

use App\Models\AcademicLevel;
use App\Models\Deadline;
use App\Models\Order;
use App\Models\Pricing;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Validator;
use App\Http\Resources\WritersResource;
use App\Models\Writer;
use  Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function Dashboard()
    {
        $seven_days_ago = Carbon::now()->subDays(14);

        $seven_days_orders = Order::where('created_at', '>=', $seven_days_ago)
            ->select(DB::raw("(sum(total_price)) as price"), DB::raw('DATE(created_at) as date'))
            ->groupBy('date')
            ->get();

        $count_orders = Order::where('created_at', '>=', $seven_days_ago)
            ->select(DB::raw("(COUNT(id)) as total"), DB::raw('DATE(created_at) as date'))
            ->groupBy('date')
            ->get();
        return Inertia::render('Admin/Dashboard', ['chart' => $seven_days_orders, 'chart_count' => $count_orders]);
    }

    public function getPricing()
    {
        return Inertia::render('Admin/Pricing', [
            'academic_levels' => AcademicLevel::all()->map(function ($academicLevel) {
                return [
                    'id' => $academicLevel->id,
                    'academic_level' => $academicLevel->academic_level,
                    'pricing' => Pricing::where('academic_level', $academicLevel->id)
                        ->leftJoin('deadlines', 'pricings.deadline', '=', 'deadlines.id')
                        ->select('deadlines.deadline as deadline', 'pricings.id', 'pricings.price', 'pricings.deadline as deadline_id', 'pricings.academic_level')
                        ->get()
                ];
            }),
            'deadlines' => Deadline::all(),
        ]);
    }

    public function About()
    {

        return Inertia::render('About', [
            'users' => User::all()->map(function ($user) {
                return [
                    'id' => $user->id,
                    'name' => $user->role->role_name,
                ];
            })
        ]);
    }

    public function storePricing(Request $request)
    {
        $inputs = $request->all();
        $rule = array(
            'pricing' => ['required', 'numeric'],
            'academic_level' => ['required'],
            'deadline' => ['required'],
        );

        $validator = Validator::make($inputs, $rule);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }


        $pricing = new Pricing();
        $pricing->academic_level = $request->input('academic_level');
        $pricing->price = $request->input('pricing');
        $pricing->deadline = $request->input('deadline');
        $pricing->save();

        return redirect()->back()->with('success', 'Price was saved successfully');
    }

    public function updatePricing(Request $request)
    {
        $inputs = $request->all();
        $rule = array(
            'pricing' => ['required'],
            'academic_level' => ['required'],
            'deadline' => ['required'],
        );

        $validator = Validator::make($inputs, $rule);

        if ($validator->fails()) {
            return back()->withErrors($validator->messages());
        }

        $pricing = Pricing::findOrFail($request->input('identifier'));
        $pricing->academic_level = $request->input('academic_level');
        $pricing->price = $request->input('pricing');
        $pricing->deadline = $request->input('deadline');
        $pricing->save();

        return redirect()->back()->with('success', 'Update completed successfully');
    }

    public function detailPricing($id)
    {
        $details = Pricing::where('id', $id)->get();
        return $details;
    }

    public function deletePricing($id)
    {
        $pricing = Pricing::findOrFail($id);
        $pricing->delete();
        return redirect()->back()->with('success', 'Delete completed successfully');
    }

    public function getStats()
    {
        $seven_days_ago = Carbon::now()->subDays(7);
        //Get stats of orders
        //$seven_days_orders = Order::where('created_at', '>=', $seven_days_ago)->count();
        
        $seven_days_orders = Order::whereBetween(
            'created_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->count();

        $fourteen_days_orders = Order::whereBetween(
            'created_at',
            [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
        )->count();

        $percentageChange = (($fourteen_days_orders - $seven_days_orders) / $fourteen_days_orders) * 100;
        if ($fourteen_days_orders > $seven_days_orders) {
            $increase = false;
        } else {
            $increase = true;
        }
        $change['increase'] = $increase;
        $change['change'] = $percentageChange;
        $change['orders_total'] = $seven_days_orders;

        //Get stats of writers
        $writers = Writer::count();

        //Earnings
        //$seven_days_earnings = Order::where('created_at', '>=', $seven_days_ago)->get();
        $seven_days_earnings = Order::whereBetween(
            'created_at',
            [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
        )->get();

        $fourteen_days_earnings = Order::whereBetween(
            'created_at',
            [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
        )->get();
        $total_this_week = 0;
        foreach ($seven_days_earnings as $row) {
            $total_this_week = $total_this_week + $row->total_price;
        }

        $total_last_week = 0;
        foreach ($fourteen_days_earnings as $row) {
            $total_last_week = $total_last_week + $row->total_price;
        }

        $percentageChangeEarnings = (($total_last_week - $total_this_week) / $total_last_week) * 100;
        if ($total_last_week > $total_this_week) {
            $increase_earnings = false;
        } else {
            $increase_earnings = true;
        }
        $change_earnings['increase'] = $increase_earnings;
        $change_earnings['change'] = round($percentageChangeEarnings, 1);
        $change_earnings['earnings'] = $total_this_week;


        $response['orders'] = $change;
        $response['writers'] = $writers;
        $response['earnings'] = $change_earnings;
        return new WritersResource($response);
    }

    public function getChartEarningsData()
    {
        $now = Carbon::now();
        $weekStartDate = $now->startOfWeek()->format('Y-m-d H:i');
        $weekEndDate = $now->endOfWeek()->format('Y-m-d H:i');
        $seven_days_ago = Carbon::now()->subDays(7);

        $count_orders = Order::where('created_at', '>=', $seven_days_ago)
            ->select(DB::raw("(COUNT(id)) as total"), DB::raw('DATE(created_at) as date'))
            ->groupBy('date')
            ->get();


        $fourteen_days_earnings = Order::select(DB::raw("(sum(total_price)) as price"), DB::raw('DATE(created_at) as date'))
            ->whereBetween(
                'created_at',
                [Carbon::now()->subWeek()->startOfWeek(), Carbon::now()->subWeek()->endOfWeek()]
            )->groupBy('date')->get();

        $this_week_earnings = Order::select(DB::raw("(sum(total_price)) as price"), DB::raw('DATE(created_at) as date'))
            ->whereBetween(
                'created_at',
                [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()]
            )->groupBy('date')->get();

        $seven_days_orders = Order::where('created_at', '>=', $seven_days_ago)
            ->select(DB::raw("(sum(total_price)) as price"), DB::raw('DATE(created_at) as date'))
            ->groupBy('date')
            ->get();
        $response['chart'] = $seven_days_orders;
        return new WritersResource($count_orders);
    }
}
