<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class SalesController extends Controller
{
    public function index()
    {

        // Today's Sales
        $todaySales = Order::where('payment_status','paid')
            ->whereDate('created_at', today())
            ->sum('total');


        // Monthly Sales
        $monthlySales = Order::where('payment_status','paid')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total');


        // Yearly Sales
        $yearlySales = Order::where('payment_status','paid')
            ->whereYear('created_at', now()->year)
            ->sum('total');


        // Total Orders
        $totalOrders = Order::where('payment_status','paid')
            ->count();


        return view('admin.sales.index', compact(
            'todaySales',
            'monthlySales',
            'yearlySales',
            'totalOrders'
        ));

    }
}