<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;


class OrderController extends Controller
{


    public function index()
    {
           
        $orders = Order::with('customer')
            ->latest()
            ->paginate(10);


        return view('admin.order.index', compact('orders'));

    }



    public function show(Order $order)
    {

        $order->load([
            'customer',
            'items.shoeVariant.shoe',
            'payment'
        ]);


        return view('admin.order.show', compact('order'));

    }
public function update(Request $request, Order $order)
{

    $request->validate([

        'order_status'=>'required|in:pending,processing,shipped,delivered,cancelled'

    ]);


    $order->update([

        'order_status'=>$request->order_status

    ]);


    return back()
        ->with('success','Order status updated successfully');

}

}