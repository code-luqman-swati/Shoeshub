<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\Payment;
use App\Models\OrderItem;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;


class SalesReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('customer')
            ->where('payment_status', 'paid');


        if($request->from_date && $request->to_date)
        {
            $query->whereBetween('created_at',[
                $request->from_date,
                $request->to_date
            ]);
        }


        $totalSales = (clone $query)->sum('total');

        $totalOrders = (clone $query)->count();


        $orders = $query
            ->latest()
            ->paginate()
            ->withQueryString();

            $refundAmount = Payment::where('status','refunded')
    ->sum('amount');



$totalSales = (clone $query)->sum('total');

$totalOrders = (clone $query)->count();

$netSales = $totalSales - $refundAmount;


$refundAmount = Payment::where('status','refunded')
    ->sum('amount');


$netSales = $totalSales - $refundAmount;

$topProducts = OrderItem::select(
        'shoe_variant_id',
        DB::raw('SUM(quantity) as total_sold'),
        DB::raw('SUM(subtotal) as total_revenue')
    )
    ->with([
        'shoeVariant.shoe'
    ])
    ->groupBy('shoe_variant_id')
    ->orderByDesc('total_sold')
    ->limit(5)
    ->get();

$salesChart = Order::where('payment_status','paid')
    ->whereMonth('created_at', now()->month)
    ->select(
        DB::raw('DATE(created_at) as date'),
        DB::raw('SUM(total) as total')
    )
    ->groupBy('date')
    ->orderBy('date')
    ->get();

   return view('admin.reports.sales', compact(
    'orders',
    'totalSales',
    'totalOrders',
    'refundAmount',
    'netSales',
    'topProducts',
    'salesChart'
));


    }
}