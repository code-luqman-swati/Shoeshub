<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Barryvdh\DomPDF\Facade\Pdf;


class OrderController extends Controller
{

    public function index()
    {
        $customer = Auth::guard('customer')->user();

if (!$customer) {
    return redirect()->route('customer.login');
}


$orders = Order::where('customer_id', $customer->id)
    ->latest()
    ->paginate(10);
        return view('customer.orders.index', compact('orders'));
    }

    public function invoice(Order $order)
    {
        // Make sure the order belongs to the logged-in customer
        if ($order->customer_id != Auth::guard('customer')->id()) {
            abort(403, 'Unauthorized');
        }

      $order->load([
    'items.shoeVariant.shoe',
    'items.shoeVariant.size',
    'items.shoeVariant.color',
    'payment',
    'statusHistories'
]);

        return view('customer.orders.invoice', compact('order'));
    }



public function downloadInvoice(Order $order)
{

    if ($order->customer_id != Auth::guard('customer')->id()) {
        abort(403);
    }


 $order->load([
    'customer',
    'payment',
    'items.shoeVariant.shoe',
    'items.shoeVariant.size',
    'items.shoeVariant.color',
    'statusHistories'
]);


    $pdf = Pdf::loadView(
        'customer.orders.invoice-pdf',
        compact('order')
    );


    return $pdf->download(
        'invoice-'.$order->order_number.'.pdf'
    );

}
}