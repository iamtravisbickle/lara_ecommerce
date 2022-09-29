<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::orderBy('id', 'desc')->paginate('6');
        return view('order.order', compact('orders'));
    }

    public function order_detail($id)
    {
        $order_details = OrderDetail::where('order_id', $id)->get();
        return view('order.order_detail', compact('order_details'));
    }
}
