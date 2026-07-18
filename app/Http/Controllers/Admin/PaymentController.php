<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\Refund;

class PaymentController extends Controller
{

    public function index()
    {
        $payments = Payment::with('order')
            ->latest()
            ->get();

        return view('Admin.payments.index', compact('payments'));
    }

    public function show(Payment $payment)
{
    $payment->load('order.customer');

    return view('admin.payments.show',
        compact('payment')
    );
}

public function refund(Payment $payment)
{

    Stripe::setApiKey(
        config('services.stripe.secret')
    );


    $refund = Refund::create([

        'payment_intent' => $payment->stripe_payment_id

    ]);



    if($refund->status == 'succeeded')
    {


        $payment->update([

            'status'=>'refunded'

        ]);



        $payment->order->update([

            'payment_status'=>'refunded',

            'order_status'=>'cancelled'

        ]);



    }



    return back()
        ->with('success','Payment refunded successfully');

}
}