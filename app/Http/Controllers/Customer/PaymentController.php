<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Payment;
use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function pay(Order $order)
    {
        return view('customer.payment', compact('order'));
    }


 public function success(Request $request)
{
    Stripe::setApiKey(config('services.stripe.secret'));

    $session = Session::retrieve($request->session_id);


    $order = Order::with('items.shoeVariant')
        ->findOrFail($request->order);


    Payment::firstOrCreate(
        [
            'order_id' => $order->id,
        ],
        [
            'stripe_payment_id' => $session->payment_intent,
            'payment_method' => 'stripe',
            'amount' => $order->total,
            'currency' => 'USD',
            'status' => 'paid',
        ]
    );


    // Reduce inventory stock
  if($order->payment_status != 'paid')
{
    foreach($order->items as $item)
    {
        $item->shoeVariant->decrement('stock', $item->quantity);
    }
}


    // update order status
    $order->update([
        'payment_status' => 'paid',
        'order_status' => 'processing',
    ]);


    return view('customer.payment_success', compact('order'));

}


    public function cancel()
    {
        return view('customer.payment-cancel');
    }
}