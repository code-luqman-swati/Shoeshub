<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $monthlySales = Order::select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('SUM(total) as total')
            )
            ->where('payment_status', 'paid')
            ->groupBy('month')
            ->orderBy('month')
            ->get();


        return view('Admin.dashboard', compact('monthlySales'));
    }
}