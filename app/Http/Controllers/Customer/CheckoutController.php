<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;


class CheckoutController extends Controller
{


    public function index()
    {
        $customer = Auth::guard('customer')->user();


        $cart = Cart::with('items.shoeVariant.shoe')
            ->where('customer_id',$customer->id)
            ->first();



        if(!$cart || $cart->items->count() == 0)
        {
            return redirect()
                ->route('cart.index')
                ->with('error','Your cart is empty');
        }



        $total = 0;


        foreach($cart->items as $item)
        {
            $total += $item->price * $item->quantity;
        }



        return view('customer.checkout',compact(
            'cart',
            'total'
        ));
    }







    public function store(Request $request)
    {

        $request->validate([

            'shipping_address'=>'required',

            'city'=>'required',

            'postal_code'=>'nullable'

        ]);




        $customer = Auth::guard('customer')->user();



        $cart = Cart::with('items.shoeVariant.shoe')
            ->where('customer_id',$customer->id)
            ->first();



        if(!$cart || $cart->items->count()==0)
        {
            return redirect()
                ->route('cart.index')
                ->with('error','Cart is empty');
        }





        // Check stock before order

        foreach($cart->items as $item)
        {

            if($item->shoeVariant->stock < $item->quantity)
            {

                return back()->with(
                    'error',

                    $item->shoeVariant->shoe->name.
                    ' only has '.
                    $item->shoeVariant->stock.
                    ' items available'
                );

            }

        }





        DB::transaction(function() use(
            $request,
            $customer,
            $cart,
            &$order
        ){



            $subtotal = 0;



            foreach($cart->items as $item)
            {

                $subtotal += 
                $item->price * $item->quantity;

            }





            $order = Order::create([


                'customer_id'=>$customer->id,


                'order_number'=>
                'ORD-'.strtoupper(Str::random(8)),


                'subtotal'=>$subtotal,


                'tax'=>0,


                'shipping'=>0,


                'total'=>$subtotal,


                'payment_status'=>'pending',


                'order_status'=>'pending',


                'shipping_address'=>$request->shipping_address,


                'city'=>$request->city,


                'postal_code'=>$request->postal_code


            ]);







            foreach($cart->items as $item)
            {


                OrderItem::create([


                    'order_id'=>$order->id,


                    'shoe_variant_id'=>$item->shoe_variant_id,


                    'quantity'=>$item->quantity,


                    'price'=>$item->price,


                    'subtotal'=>
                    $item->price * $item->quantity


                ]);



                // Reduce stock

              


            }






            // Clear cart

            $cart->items()->delete();



        });






        return redirect()
            ->route('stripe',$order->id);

    }


}