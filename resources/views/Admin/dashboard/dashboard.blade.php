@extends('layouts.app')

@section('content')
  <div class="grid grid-cols-12 gap-4 md:gap-6">
    <div class="col-span-12 space-y-6 xl:col-span-7">
  <x-admin.ecommerce-metrics
    :totalOrders="$totalOrders"
    :totalCustomers="$totalCustomers"
    :customerGrowth="$customerGrowth"
    :orderGrowth="$orderGrowth"
/>
      <x-admin.monthly-sale
      />
    </div>
    <div class="col-span-12 xl:col-span-5">
        <x-admin.monthly-target />
    </div>
<script>
    window.monthlySales = @json($monthlySales);
</script>
   <x-admin.statistics-chart 
    :monthly-sales="$monthlySales"
/>

    <div class="col-span-12 xl:col-span-5">
      <x-admin.customer-demographic />
    </div>

    <div class="col-span-12 xl:col-span-7">
      <x-admin.recent-orders
       />
    </div>
  </div>
@endsection
