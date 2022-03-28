<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use App\Models\Order;
use App\Models\AssignedOrder;
use App\Models\User;
use App\Models\Writer;
use App\Http\Resources\WritersResource;
use App\Models\Files;

class OrderController extends Controller
{
    //order page admin
    public function orders()
    {
        $users = Writer::leftJoin('users', 'writers.user_id', '=', 'users.id')
            ->select('users.name', 'users.email', 'users.id')
            ->get();
        return Inertia::render('Admin/Order', ['writers' => $users]);
    }

    /**
     * @var string[]
     */
    protected $sortFields = ['total_price'];

    public function getOrders(Request $request)
    {
        //Pagination and sorting
        $sortFieldInput = $request->input('sort_field', self::DEFAULT_SORT_FIELD);
        $sortField = in_array($sortFieldInput, $this->sortFields) ? $sortFieldInput : self::DEFAULT_SORT_FIELD;
        $sortOrder = $request->input('sort_order', self::DEFAULT_SORT_ORDER);
        $searchInput = $request->input('search');
        $perPage = $request->input('per_page') ?? self::PER_PAGE;

        $query = Order::leftJoin('status', 'orders.paperstatus', '=', 'status.id')
            ->leftJoin('deadlines', 'orders.deadline', '=', 'deadlines.id')
            ->select('status.status as paper_status', 'status.color','orders.order_id','orders.created_at' ,'orders.id', 'orders.topic', 'orders.total_price', 'deadlines.deadline', 'orders.created_at', 'orders.display_writer', 'orders.client_ready')
            ->orderBy($sortField, $sortOrder);

        if (!is_null($searchInput)) {
            $searchQuery = "%$searchInput%";
            $query = $query->where('topic', 'like', $searchQuery);
        }

        $orders = $query->paginate((int)$perPage);

        foreach ($orders as $order) {

            $asigned = AssignedOrder::where('order_id', $order->id)->get();
            if (count($asigned) > 0) {
                $order->order_asigned = true;
            } else {
                $order->order_asigned = false;
            }
        }

        return WritersResource::collection($orders);
    }

    //Assign Order
    public function assignOrder(Request $request)
    {
        $order_id = $request->input('order_id');
        $writer_id = $request->input('writer_id');

        $check_if_assigned = AssignedOrder::where('order_id', $order_id)->get();
        if (count($check_if_assigned) > 0) {
            return redirect()->back()->with('error', "Order already assigned to another writer");
        } else {

            $assign = new AssignedOrder();
            $assign->order_id = $order_id;
            $assign->user_id = $writer_id;
            $assign->save();

            $order = Order::findOrFail($order_id);
            $order->paperstatus = 2;
            $order->display_writer = 0;
            $order->save();

            $user = User::findOrFail($writer_id);
            return redirect()->back()->with('success', "Order has been assigned to " . $user->name);
        }
    }

    //Display jobs for writers
    public function displayJobToWriters(Request $request)
    {
        $order = Order::findOrFail($request->input('order_id'));
        $order->display_writer = 1;
        $order->save();
        return redirect()->back()->with('success', 'Order is now available to writers');
    }

    //Mark as ready for customer
    public function orderReadyToBeSendToClient(Request $request)
    {
        $order = Order::findOrFail($request->input('order_id'));
        $order->client_ready = 1;
        $order->paperstatus = 3;
        $order->save();
        return redirect()->back()->with('success', 'The finished order is now available to the client');
    }

    //Rate writer
    public function rateWriter(Request $request)
    {
        $user_id = $request->input('writer_id');
        $order_id = $request->input('order_id');
        $rate = $request->input('rate');
        //Update rate of the order
        $update_rate = AssignedOrder::where('order_id', $order_id)->first();
        $update_rate->rate = $rate;
        $update_rate->save();
        //Calculare average rate
        $jobs_done = AssignedOrder::where('user_id', $user_id)->whereNotNull('rate')->get();
        $total_rate = 0;
        foreach ($jobs_done as $job) {
            $total_rate = $total_rate + $job->rate;
        }
        $rate = $total_rate / count($jobs_done);
        //Update average rate in writers table
        $writer = Writer::where('user_id', $user_id)->first();
        $writer->total_rate = $rate;
        $writer->save();
        //get name of writer
        $user = User::findOrFail($user_id);
        return redirect()->back()->with('success', 'The writer, ' . $user->name . ', has been successfully rated');
    }

    //get Order Details
    public function getOrderDetails($id)
    {
        $order = Order::leftJoin('academic_levels', 'orders.academic_level', '=', 'academic_levels.id')
            ->leftJoin('deadlines', 'orders.deadline', '=', 'deadlines.id')
            ->leftJoin('paper_types', 'orders.paper_type', '=', 'paper_types.id')
            ->leftJoin('disciplines', 'orders.discipline', '=', 'disciplines.id')
            ->select('orders.no_of_charts', 'orders.no_of_sources', 'orders.paper_format', 'orders.paper_type as type_paper', 'orders.discipline as paper_discipline', 'orders.id', 'orders.order_id', 'orders.total_price', 'academic_levels.academic_level', 'deadlines.deadline', 'paper_types.paper_type', 'disciplines.discipline', 'orders.no_of_pages', 'topic', 'paper_instruction')
            ->where('orders.id', $id)
            ->first();
        $files = Files::where('order_id', $order->id)->get();
        $assigned = AssignedOrder::where('order_id', $order->id)
            ->leftJoin('users', 'assigned_orders.user_id', '=', 'users.id')
            ->leftJoin('writers', 'assigned_orders.user_id', '=', 'writers.user_id')
            ->select('users.name', 'users.email', 'users.id', 'writers.total_rate', 'writers.phonenumber', 'writers.country', 'writers.address', 'writers.qualification')
            ->first();
        $writers = Writer::leftJoin('users', 'writers.user_id', '=', 'users.id')
            ->select('users.name', 'users.email', 'users.id')
            ->get();
        if ($assigned) {
            $order->order_asigned = true;
        } else {
            $order->order_asigned = false;
        }

        return Inertia::render('Admin/OrderDetails', ['orderDetails' => $order, 'files' => $files, 'assigned' => $assigned, 'writers' => $writers]);
    }
}
