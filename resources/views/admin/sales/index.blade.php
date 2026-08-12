@extends('layouts.app')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-5">

    <h2 class="text-xl font-semibold text-gray-800 mb-6">
        Sales Report
    </h2>


    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5">


        {{-- Today --}}
        <div class="rounded-xl border p-5 bg-white">

            <p class="text-sm text-gray-500">
                Today's Sales
            </p>

            <h3 class="text-2xl font-bold mt-2">
                Rs {{ number_format($todaySales,2) }}
            </h3>

        </div>



        {{-- Month --}}
        <div class="rounded-xl border p-5 bg-white">

            <p class="text-sm text-gray-500">
                This Month
            </p>

            <h3 class="text-2xl font-bold mt-2">
                Rs {{ number_format($monthlySales,2) }}
            </h3>

        </div>



        {{-- Year --}}
        <div class="rounded-xl border p-5 bg-white">

            <p class="text-sm text-gray-500">
                This Year
            </p>

            <h3 class="text-2xl font-bold mt-2">
                Rs {{ number_format($yearlySales,2) }}
            </h3>

        </div>



        {{-- Orders --}}
        <div class="rounded-xl border p-5 bg-white">

            <p class="text-sm text-gray-500">
                Total Orders
            </p>

            <h3 class="text-2xl font-bold mt-2">
                {{ $totalOrders }}
            </h3>

        </div>


    </div>


</div>

@endsection