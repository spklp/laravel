<?php

namespace App\Http\Controllers;

use App\InfoOrder;
use App\Order;
use App\OrderInfo;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CabinetController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->role == 'user') {


            $email = Auth::user()->email;
            $orders = Order::where('email', $email)->orderBy('created_at', 'desc')->get();
            $listOfOrders = [];

            foreach ($orders as $key => $order) {

                $orderInfo = new OrderInfo();
                $orderInfo->order = InfoOrder::where('order_id', $order->id)->get();
                $orderInfo->status = $order->status;
                $orderInfo->id = $order->id;
                $orderInfo->total_price = $order->total_price;
                $orderInfo->address = $order->address;
                $orderInfo->payment = $order->payment;
                $orderInfo->time = $order->created_at;
                $orderInfo->img = $order->img;
                $listOfOrders [] = $orderInfo;
            }
        }
        else {

            $orders = Order::orderBy('updated_at', 'desc')->where('status', 'new')->get();
            $listOfOrders = [];

            foreach ($orders as $key => $order) {

                $orderInfo = new OrderInfo();
                $orderInfo->order = InfoOrder::where('order_id', $order->id)->get();
                $orderInfo->name = $order->name;
                $orderInfo->last_name = $order->last_name;
                $orderInfo->phone = $order->phone;
                $orderInfo->email = $order->email;
                $orderInfo->status = $order->status;
                $orderInfo->address = $order->address;
                $orderInfo->payment = $order->payment;
                $orderInfo->order_id = $order->id;
                $orderInfo->total_price = $order->total_price;
                $orderInfo->time = $order->created_at;
                $orderInfo->img = $order->img;
                $listOfOrders [] = $orderInfo;
            }
        }

        return view('cabinet.cabinet', compact('listOfOrders'));
    }


    public function moderate(Request $request)
    {
        $post = $request->post();

        foreach ($post as $id => $status) {
            if ($status == 'complete' or $status == 'delete'){
                $order = Order::find($id);

                $order->status = $status;
                $order->update();
            }
        }
        return redirect('cabinet');
    }
}
