<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Order;
use App\Models\Shoe;
use App\Models\ShoeVariant;

class DashboardController extends Controller
{
    public function index()
    {
        $totalRevenue = Order::where('payment_status', 'paid')->sum('total');

        $totalOrders = Order::count();

        $totalCustomers = Customer::count();

        $totalProducts = Shoe::count();

        $monthlySales = Order::where('payment_status','paid')
    ->selectRaw('MONTH(created_at) as month, SUM(total) as total')
    ->groupBy('month')
    ->pluck('total','month')
    ->toArray();




        $pendingOrders = Order::where('order_status', 'pending')->count();

        $completedOrders = Order::where('order_status', 'delivered')->count();

        $lowStockProducts = ShoeVariant::where('stock', '<=', 5)->count();

        $monthlyRevenue = Order::where('payment_status', 'paid')
            ->whereMonth('created_at', now()->month)
            ->whereYear('created_at', now()->year)
            ->sum('total');


            $currentCustomers = Customer::whereMonth('created_at', now()->month)->count();

$lastCustomers = Customer::whereMonth(
    'created_at',
    now()->subMonth()->month
)->count();


$customerGrowth = $lastCustomers > 0 
    ? (($currentCustomers - $lastCustomers) / $lastCustomers) * 100
    : 0;



$currentOrders = Order::whereMonth('created_at', now()->month)->count();

$lastOrders = Order::whereMonth(
    'created_at',
    now()->subMonth()->month
)->count();



$currentRevenue = Order::where('payment_status', 'paid')
    ->whereMonth('created_at', now()->month)
    ->whereYear('created_at', now()->year)
    ->sum('total');


$lastRevenue = Order::where('payment_status', 'paid')
    ->whereMonth('created_at', now()->subMonth()->month)
    ->whereYear('created_at', now()->subMonth()->year)
    ->sum('total');


$revenueGrowth = $lastRevenue > 0
    ? (($currentRevenue - $lastRevenue) / $lastRevenue) * 100
    : 0;


$orderGrowth = $lastOrders > 0
    ? (($currentOrders - $lastOrders) / $lastOrders) * 100
    : 0;
        return view('Admin.dashboard.dashboard', compact(
            'totalRevenue',
            'revenueGrowth',
            'monthlySales',
            'totalOrders',
            'totalCustomers',
            'totalProducts',
            'pendingOrders',
            'completedOrders',
            'lowStockProducts',
            'monthlyRevenue',
            'orderGrowth',
            'customerGrowth'
        ));

        
    }
}