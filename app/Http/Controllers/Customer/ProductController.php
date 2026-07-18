<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Shoe;

class ProductController extends Controller
{

    public function index()
    {
        $products = Shoe::with('category')
            ->latest()
            ->get();


        return view('customer.products.index', compact('products'));
    }



    public function show(Shoe $shoe)
    {
        $shoe->load([
            'category',
            'variants.size',
            'variants.color'
        ]);


        return view(
            'customer.products.show',
            compact('shoe')
        );
    }

}