<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use Stripe\Stripe;
use Stripe\Refund;
use Illuminate\Http\Request;
use App\Models\ShoeVariant;
use Illuminate\Support\Facades\DB;

class PaymentController extends Controller
{

 public function index(Request $request)
{
    $payments = Payment::with('order');


    if($request->search){

        $payments->where(function($query) use ($request){

            $query->where('status','like',"%{$request->search}%")
                  ->orWhereHas('order', function($q) use ($request){

                      $q->where('order_number','like',"%{$request->search}%");

                  });

        });

    }


    $payments = $payments->latest()->get();



    if($request->ajax()){

        return view(
            'admin.payments.table',
            compact('payments')
        );

    }



    return view(
        'admin.payments.index',
        compact('payments')
    );
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
    Stripe::setApiKey(config('services.stripe.secret'));

    DB::transaction(function () use ($payment) {

        $refund = Refund::create([
            'payment_intent' => $payment->stripe_payment_id
        ]);

        if ($refund->status == 'succeeded') {

            $payment->update([
                'status' => 'refunded'
            ]);

            $payment->order->update([
                'payment_status' => 'refunded',
                'order_status' => 'cancelled'
            ]);

            foreach ($payment->order->items as $item) {

                $variant = ShoeVariant::find($item->shoe_variant_id);

                if ($variant) {
                    $variant->increment('stock', $item->quantity);
                }
            }
        }

    });

    return back()->with('success', 'Payment refunded successfully');
}
}