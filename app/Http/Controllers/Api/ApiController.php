<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\WritersResource;
use App\Models\AcademicLevel;
use App\Models\Deadline;
use App\Models\PaperType;
use App\Models\Pricing;
use App\Models\Order;
use App\Models\Discipline;
use App\Models\Files;
use App\Http\Requests\OrderRequest;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Exception;

class ApiController extends Controller
{
    //Get Academic, deadline, paper type, discipline data
    public function getAllResources()
    {
        $paper_type = PaperType::all();
        $academic_level = AcademicLevel::all();
        $deadlines = Deadline::all();
        $disciplines = Discipline::all();
        $pricing = Pricing::where('academic_level', self::DEFAULT_ACADEMIC_LEVEL)
            ->where('deadline', self::DEFAULT_DEADLINE)
            ->get();
        $data = ['disciplines' => $disciplines, 'paper_type' => $paper_type, 'academic_level' => $academic_level, 'deadlines' => $deadlines, 'pricing' => $pricing];
        return WritersResource::collection($data);
    }

    //Calculate Price based on Academic and deadline
    public function postSearchData(Request $request)
    {
        if ($request->filled('dead_line')) {
            $deadline = $request->input('dead_line');
        } else {
            $deadline = self::DEFAULT_DEADLINE;
        }

        if ($request->filled('academic_level')) {
            $academic_level = $request->input('academic_level');
        } else {
            $academic_level = self::DEFAULT_ACADEMIC_LEVEL;
        }

        $pricing = Pricing::where('academic_level', $academic_level)
            ->where('deadline', $deadline)
            ->get();
        return WritersResource::collection($pricing);
    }

    //Process Payment and save data to database
    public function placeOrder(OrderRequest $request)
    {
        if ($request->validated()) {
            DB::beginTransaction();
            try {
                $order = new Order();
                $order->academic_level = $request->input('academic_level');
                $order->paper_type = $request->input('type_of_paper');
                $order->deadline = $request->input('dead_line');
                $order->no_of_pages = $request->input('no_ofpages');
                $order->topic = $request->input('topic');
                $order->paper_instruction = $request->input('paper_instruction');
                $order->paper_format = $request->input('paper_format');
                $order->no_of_sources = $request->input('no_of_sources');
                $order->no_of_charts = $request->input('no_of_charts');
                $order->no_of_power_point_slides = $request->input('no_of_power_point_slides');
                $order->price_per_page = $request->input('price_per_page');
                $order->total_price = $request->input('price');
                $order->discipline = $request->input('discipline');
                $order->order_id = $request->input('order_id');
                $order->status = $request->input('status');
                $order->email = $request->input('email');
                $order->user_id = Auth::user()->id;
                $order->payer_name = $request->input('given_name') . ' ' . $request->input('surname');
                $order->save();

                $file = $request->file('files');
                $destinationPath = public_path() . '/uploads/';
                if ($request->hasFile('files')) {
                    foreach ($file as $item_uploaded) {
                        $name = $item_uploaded->getClientOriginalName();
                        $filename = time() . rand() . "." . $name;
                        $path = $item_uploaded->move($destinationPath, $filename);
                        $fil_e = new Files();
                        $fil_e->order_id = $order->id;
                        $fil_e->file_name = $name;
                        $fil_e->file_name_system = $filename;
                        $fil_e->file_url =  url('/') . '/uploads/' . $filename;
                        $fil_e->save();
                    }
                }
                $response['success'] = "Your order was processed successfully!";
                DB::commit();
            } catch (Exception $e) {
                $response['error'] = $e;
                DB::rollback();
            }
            return new WritersResource($response);
        }
    }

    //Get orders of a particular client.
    public function getMyOrders()
    {
        $orders = Order::leftJoin('academic_levels', 'orders.academic_level', '=', 'academic_levels.id')
            ->leftJoin('deadlines', 'orders.deadline', '=', 'deadlines.id')
            ->leftJoin('paper_types', 'orders.paper_type', '=', 'paper_types.id')
            ->leftJoin('disciplines', 'orders.discipline', '=', 'disciplines.id')
            ->select('orders.id', 'orders.order_id', 'orders.total_price', 'academic_levels.academic_level', 'deadlines.deadline', 'paper_types.paper_type', 'disciplines.discipline', 'orders.no_of_pages', 'topic', 'paper_instruction')
            ->where('user_id', Auth::user()->id)
            ->get();
        return new WritersResource($orders);
    }

    //Get resources and order details for edit page
    public function getResourcesOrderDetails($id)
    {
        $order = Order::leftJoin('academic_levels', 'orders.academic_level', '=', 'academic_levels.id')
            ->leftJoin('deadlines', 'orders.deadline', '=', 'deadlines.id')
            ->leftJoin('paper_types', 'orders.paper_type', '=', 'paper_types.id')
            ->leftJoin('disciplines', 'orders.discipline', '=', 'disciplines.id')
            ->select('orders.paper_format', 'orders.paper_type as type_paper', 'orders.discipline as paper_discipline', 'orders.id', 'orders.order_id', 'orders.total_price', 'academic_levels.academic_level', 'deadlines.deadline', 'paper_types.paper_type', 'disciplines.discipline', 'orders.no_of_pages', 'topic', 'paper_instruction')
            ->where('order_id', $id)
            ->first();
        $paper_type = PaperType::all();
        $academic_level = AcademicLevel::all();
        $deadlines = Deadline::all();
        $disciplines = Discipline::all();
        $pricing = Pricing::where('academic_level', self::DEFAULT_ACADEMIC_LEVEL)
            ->where('deadline', self::DEFAULT_DEADLINE)
            ->get();
        $data = ['order' => $order, 'disciplines' => $disciplines, 'paper_type' => $paper_type, 'academic_level' => $academic_level, 'deadlines' => $deadlines, 'pricing' => $pricing];
        return WritersResource::collection($data);
    }

    //Get order details
    public function getOrderDetails($id)
    {
        $order = Order::leftJoin('academic_levels', 'orders.academic_level', '=', 'academic_levels.id')
            ->leftJoin('deadlines', 'orders.deadline', '=', 'deadlines.id')
            ->leftJoin('paper_types', 'orders.paper_type', '=', 'paper_types.id')
            ->leftJoin('disciplines', 'orders.discipline', '=', 'disciplines.id')
            ->select('orders.no_of_charts', 'orders.no_of_sources', 'orders.paper_format', 'orders.paper_type as type_paper', 'orders.discipline as paper_discipline', 'orders.id', 'orders.order_id', 'orders.total_price', 'academic_levels.academic_level', 'deadlines.deadline', 'paper_types.paper_type', 'disciplines.discipline', 'orders.no_of_pages', 'topic', 'paper_instruction')
            ->where('order_id', $id)
            ->first();
        $files = Files::where('order_id', $order->id)->get();
        $data = ['order_details' => $order, 'files' => $files];
        //return WritersResource::collection($data);
        return new WritersResource($data);
    }

    //Update Order
    public function updateOrder(Request $request)
    {
        DB::beginTransaction();
        try {
            $order = Order::where('order_id', $request->input('order_id'))->first();
            $order->paper_type =  $request->input('type_of_paper');
            $order->paper_format =  $request->input('paper_format');
            $order->paper_instruction =  $request->input('paper_instruction');
            $order->topic =  $request->input('topic');
            $order->save();

            $file = $request->file('files');
            $destinationPath = public_path() . '/uploads/';
            if ($request->hasFile('files')) {
                foreach ($file as $item_uploaded) {
                    $name = $item_uploaded->getClientOriginalName();
                    $filename = time() . rand() . "." . $name;
                    $path = $item_uploaded->move($destinationPath, $filename);
                    $fil_e = new Files();
                    $fil_e->order_id = $order->id;
                    $fil_e->file_name = $name;
                    $fil_e->file_name_system = $filename;
                    $fil_e->file_url =  url('/') . '/uploads/' . $filename;
                    $fil_e->save();
                }
            }
            $response['success'] = "Your order was updated successfully!";
            DB::commit();
        } catch (Exception $e) {
            $response['error'] = $e;
            DB::rollback();
        }
        return new WritersResource($response);
    }

    //delete file
    public function deleteFileOrder($id)
    {
        $fil_e = Files::findOrFail($id);
        File::delete(public_path() . '/uploads/' . $fil_e->file_name_system);
        $fil_e->delete();
        $response['success'] = "File has been deleted!";
        
        return new WritersResource($response);
    }
}
