<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::simplePaginate(10);
        return view('backend.order.index', compact('orders'));
    }

    public function show(Order $order)
    {
        return view('backend.order.view', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('admin.orders.index')->with('status', 'Order deleted successfully !!');
    }
}
