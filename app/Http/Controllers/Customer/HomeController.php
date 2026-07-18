<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Shoe;
use App\Models\Category;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        $products = Shoe::with('category')
            ->latest()
            ->take(8)
            ->get();


        return view('customer.home', compact(
            'categories',
            'products'
        ));
    }
}