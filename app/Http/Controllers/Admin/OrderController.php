<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderStatusHistory;


class OrderController extends Controller
{
public function index(Request $request)
{
    $orders = Order::with('customer');


    // Status filter
    if ($request->status) {
        $orders->where('order_status', $request->status);
    }


    // Search
    if ($request->search) {

        $orders->where(function ($query) use ($request) {

            $query->where('order_number', 'like', "%{$request->search}%")
                  ->orWhere('order_status', 'like', "%{$request->search}%")
                  ->orWhereHas('customer', function ($customer) use ($request) {

                      $customer->where('name', 'like', "%{$request->search}%")
                               ->orWhere('email', 'like', "%{$request->search}%");

                  });

        });

    }


    $orders = $orders->latest()->get();


    // AJAX response
    if ($request->ajax()) {

        return view(
            'admin.order.table',
            compact('orders')
        );

    }


    return view(
        'admin.order.index',
        compact('orders')
    );
}


    public function show(Order $order)
{
    $order->load([
        'customer',
        'items.shoeVariant.shoe',
        'payment',
        'statusHistories'
    ]);

    return view('admin.order.show', compact('order'));
}

   


public function update(Request $request, Order $order)
{

    // Policy check
    $this->authorize('update', $order);


    $request->validate([
        'status' => 'required'
    ]);


    // Update order status
    $order->update([
        'order_status' => $request->status
    ]);


    // Save status history
    OrderStatusHistory::create([
        'order_id' => $order->id,
        'status' => $request->status
    ]);


    return back()->with(
        'success',
        'Order status updated successfully.'
    );
}
}