<?php

namespace App\Http\Controllers;
use Stripe\Stripe;
use Stripe\Checkout\Session;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Payment;


class StripeController extends Controller
{
public function checkout($id)

{

$order = Order::findorfail($id);
    Stripe::setApiKey(config('services.stripe.secret'));

    $session = Session::create([
        'payment_method_types' => ['card'],
        'line_items' => [[
            'price_data' => [
                'currency' => 'usd',
                'product_data' => [
                    'name' => 'Nike Air Max',
                ],
                'unit_amount' => 5000, // $50.00 (amount is in cents)
            ],
            'quantity' => 1,
        ]],
        'mode' => 'payment',
 'success_url' => route('payment.success')
    . '?order='.$order->id
    .'&session_id={CHECKOUT_SESSION_ID}',
      'cancel_url' => route('payment.cancel'),
    ]);

    return redirect($session->url);
}

 

    public function cancel()
    {
        return "Payment Cancelled";
    }
}