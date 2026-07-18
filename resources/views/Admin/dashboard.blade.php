@extends('layouts.app')

@section('content')

<div class="p-4 md:p-6">

    <h2 class="mb-6 text-2xl font-bold text-gray-800 dark:text-white">
        Dashboard
    </h2>


    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-2 lg:grid-cols-4">

        <div class="rounded-xl bg-white p-5 shadow dark:bg-gray-800">
            <p class="text-sm text-gray-500">Total Sales</p>
            <h3 class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">
                Rs 0
            </h3>
        </div>


        <div class="rounded-xl bg-white p-5 shadow dark:bg-gray-800">
            <p class="text-sm text-gray-500">Total Orders</p>
            <h3 class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">
                0
            </h3>
        </div>


        <div class="rounded-xl bg-white p-5 shadow dark:bg-gray-800">
            <p class="text-sm text-gray-500">Customers</p>
            <h3 class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">
                0
            </h3>
        </div>


        <div class="rounded-xl bg-white p-5 shadow dark:bg-gray-800">
            <p class="text-sm text-gray-500">Products</p>
            <h3 class="mt-2 text-2xl font-bold text-gray-800 dark:text-white">
                0
            </h3>
        </div>

    </div>


    <!-- Monthly Sales Chart -->

    <div class="mt-6 rounded-xl bg-white p-5 shadow dark:bg-gray-800">

        <h3 class="mb-5 text-lg font-semibold text-gray-800 dark:text-white">
            Monthly Sales
        </h3>


        <div class="max-w-full overflow-x-auto custom-scrollbar">

            <div id="chartOne"
                class="-ml-5 h-full min-w-[690px] pl-2 xl:min-w-full">
            </div>

        </div>

    </div>


</div>


@endsection