@extends('layouts.app')

@section('content')





@if(session('error'))

<div class="mb-4 rounded-lg bg-red-100 p-4 text-red-700">
    {{ session('error') }}
</div>

@endif

<div class="grid grid-cols-12 gap-6">


    <!-- KPI Cards -->
    <div class="col-span-12">
        <x-admin.ecommerce-metrics
            :totalCustomers="$totalCustomers"
            :totalOrders="$totalOrders"
            :totalRevenue="$totalRevenue"
            :totalProducts="$totalProducts"

            :pendingOrders="$pendingOrders"
            :completedOrders="$completedOrders"
            :lowStockProducts="$lowStockProducts"

            :customerGrowth="$customerGrowth"
            :orderGrowth="$orderGrowth"
            :revenueGrowth="$revenueGrowth"
        />
    </div>



    <!-- Monthly Sales -->
    <div class="col-span-12 xl:col-span-8">
        <x-admin.monthly-sale
            :monthly-sales="$monthlySales"
        />
    </div>


    <!-- Monthly Target -->
    <div class="col-span-12 xl:col-span-4">
        <x-admin.monthly-target />
    </div>



    <!-- Statistics Chart -->
    <div class="col-span-12">
          {{-- Statistics Chart --}}
    <script>
    window.monthlySales = @json($monthlySales);
</script>
   <x-admin.statistics-chart 
    :monthly-sales="$monthlySales"
/>
</div>


    <!-- Recent Orders -->
    <!-- <div class="col-span-12">
        <x-admin.recent-orders />
    </div> -->


</div>

@endsection