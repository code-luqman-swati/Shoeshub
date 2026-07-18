<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Shoe;

class ShopController extends Controller
{
    public function index()
    {
        $shoes = Shoe::with([
            'brand',
            'category'
        ])
        ->latest()
        ->paginate(12);

        return view('customer.shop.index', compact('shoes'));
    }

    public function show(Shoe $shoe)
    {
        $shoe->load([
            'brand',
            'category',
            'variants.size',
            'variants.color'
        ]);

        return view('customer.shop.show', compact('shoe'));
    }
}