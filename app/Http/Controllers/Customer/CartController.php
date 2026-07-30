<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartItem;
use App\Models\ShoeVariant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CartController extends Controller
{

    public function index()
    {
        $customer = Auth::guard('customer')->user();


        $cart = Cart::with('items.shoeVariant.shoe')
            ->where('customer_id', $customer->id)
            ->first();


        $total = 0;


        if($cart)
        {
            foreach($cart->items as $item)
            {
             $total += $item->price * $item->quantity;
            }
        }


        return view('customer.cart', compact(
            'cart',
            'total'
        ));
    }



    public function add(Request $request)
    {

        $request->validate([
            'shoe_variant_id'=>'required',
            'quantity'=>'required|integer|min:1'
        ]);


        $customer = Auth::guard('customer')->user();



        $variant = ShoeVariant::findOrFail(
            $request->shoe_variant_id
        );



        // Check stock

        if($variant->stock == 0)
        {
            return back()->with(
                'error',
                'Sorry, Size: '.$variant->size->name.
                ', Color: '.$variant->color->name.
                ' is out of stock.'
            );
        }



        if($request->quantity > $variant->stock)
        {
            return back()->with(
                'error',
                'Only '.$variant->stock.
                ' items available for Size: '.
                $variant->size->name.
                ', Color: '.
                $variant->color->name
            );
        }



        // Create cart

        $cart = Cart::firstOrCreate([
            'customer_id'=>$customer->id
        ]);




        $item = CartItem::where('cart_id',$cart->id)
            ->where('shoe_variant_id',$variant->id)
            ->first();



        if($item)
        {

            $newQuantity = $item->quantity + $request->quantity;



            if($newQuantity > $variant->stock)
            {
                return back()->with(
                    'error',
                    'Only '.$variant->stock.
                    ' items available for Size: '.
                    $variant->size->name.
                    ', Color: '.
                    $variant->color->name
                );
            }



            $item->quantity = $newQuantity;
            $item->save();

        }
        else
        {

            CartItem::create([

                'cart_id'=>$cart->id,

                'shoe_variant_id'=>$variant->id,

                'quantity'=>$request->quantity,

             'price' => $variant->shoe->discount_price ?? $variant->shoe->price

            ]);

        }



        return redirect()
            ->route('cart.index')
            ->with(
                'success',
                'Product added to cart'
            );

    }





    // AJAX quantity update

    public function update(Request $request, $id)
    {

        $cartItem = CartItem::findOrFail($id);


        $variant = $cartItem->shoeVariant;



        if($request->quantity > $variant->stock)
        {
            return response()->json([

                'status'=>false,

                'message'=>
                'Only '.$variant->stock.
                ' items available for Size: '.
                $variant->size->name.
                ', Color: '.
                $variant->color->name

            ]);
        }



        if($request->quantity < 1)
        {
            return response()->json([

                'status'=>false,

                'message'=>'Minimum quantity is 1'

            ]);
        }




        $cartItem->quantity = $request->quantity;

        $cartItem->save();



 return response()->json([

    'status' => true,

    'quantity' => $cartItem->quantity,

    'subtotal' => $cartItem->price * $cartItem->quantity,

    'total' => $total

]);
    }





    public function remove($id)
    {

        $cartItem = CartItem::findOrFail($id);


        $cartItem->delete();



        return back()
            ->with(
                'success',
                'Item removed from cart successfully.'
            );

    }

}