<?php

namespace App\View\Composers;

use Illuminate\View\View;
use App\Models\Category;
use App\Models\Brand;
use Illuminate\Support\Facades\Auth;
use App\Models\Wishlist;
use App\Models\Cart;

class NavbarComposer
{
    public function compose(View $view)
    {
        $categories = Category::whereNull('parent_id')
            ->where('status', 1)
            ->with('children')
            ->get();


        $brands = Brand::all();


        $cartCount = 0;

if(Auth::guard('customer')->check()) {

    $cart = Cart::where(
        'customer_id',
        Auth::guard('customer')->id()
    )->first();


    if($cart){

        $cartCount = $cart->items()
            ->sum('quantity');

    }

}
$wishlistCount = 0;

if(Auth::guard('customer')->check()) {

    $wishlistCount = Wishlist::where(
        'customer_id',
        Auth::guard('customer')->id()
    )->count();

}


        $view->with([
            'navCategories' => $categories,
            'navBrands' => $brands,
            'cartCount' => $cartCount,
            'wishlistCount' => $wishlistCount,
        ]);
    }
}