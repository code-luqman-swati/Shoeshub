<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Shoe;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\CartItem;


class WishlistController extends Controller
{
    public function index()
    {
        $wishlists = Wishlist::with('shoe.images')
            ->where('customer_id', Auth::guard('customer')->id())
            ->latest()
            ->get();

        return view('customer.wishlist.index', compact('wishlists'));
    }

    public function store(Shoe $shoe)
    {
        Wishlist::firstOrCreate([
            'customer_id' => Auth::guard('customer')->id(),
            'shoe_id' => $shoe->id,
        ]);

        return back()->with('success', 'Product added to wishlist.');
    }

    public function destroy(Wishlist $wishlist)
    {
        if ($wishlist->customer_id != Auth::guard('customer')->id()) {
            abort(403);
        }

        $wishlist->delete();

        return back()->with('success', 'Product removed from wishlist.');
    }

    public function addToCart(Shoe $shoe)
{
    $customerId = Auth::guard('customer')->id();


    $cart = Cart::firstOrCreate([
        'customer_id' => $customerId
    ]);


    $variant = $shoe->variants()->first();


  CartItem::updateOrCreate(
    [
        'cart_id' => $cart->id,
        'shoe_variant_id' => $variant->id,
    ],
    [
        'quantity' => 1,
        'price' => $shoe->discount_price ?? $shoe->price,
    ]
);

    return redirect()
        ->route('cart.index')
        ->with('success','Product added to cart');
}

public function variant(Shoe $shoe)
{
    $shoe->load([
        'variants.size',
        'variants.color'
    ]);


    return view(
        'customer.wishlist.variants',
        compact('shoe')
    );
}
}