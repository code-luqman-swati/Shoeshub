@extends('layouts.app')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-5">


    <div class="mb-6">

        <h2 class="text-xl font-semibold text-gray-800">
            Sales Report
        </h2>

    </div>



    {{-- Summary Cards --}}
    <div class="grid grid-cols-1 md:grid-cols-4 gap-5 mb-6">


        <div class="rounded-2xl border border-gray-200 p-5">

            <p class="text-gray-500">
                Total Sales
            </p>

            <h3 class="text-2xl font-bold mt-2">
                Rs {{ number_format($totalSales,2) }}
            </h3>

        </div>


        <div class="rounded-2xl border border-gray-200 p-5">

            <p class="text-gray-500">
                Total Orders
            </p>

            <h3 class="text-2xl font-bold mt-2">
                {{ $totalOrders }}
            </h3>

        </div>



        <div class="rounded-2xl border border-gray-200 p-5">

            <p class="text-gray-500">
                Refund Amount
            </p>

            <h3 class="text-2xl font-bold mt-2">
                Rs {{ number_format($refundAmount,2) }}
            </h3>

        </div>



        <div class="rounded-2xl border border-gray-200 p-5">

            <p class="text-gray-500">
                Net Sales
            </p>

            <h3 class="text-2xl font-bold mt-2">
                Rs {{ number_format($netSales,2) }}
            </h3>

        </div>


    </div>




    {{-- Filter --}}

    <div class="rounded-2xl border border-gray-200 p-5 mb-6">


        <form method="GET" class="flex flex-wrap gap-4">


            <input
                type="date"
                name="from_date"
                value="{{ request('from_date') }}"
                class="border rounded-lg px-3 py-2"
            >


            <input
                type="date"
                name="to_date"
                value="{{ request('to_date') }}"
                class="border rounded-lg px-3 py-2"
            >


            <button
                class="px-5 py-2 bg-blue-600 text-white rounded-lg"
            >
                Filter
            </button>


        </form>


    </div>


<div class="rounded-2xl border border-gray-200 p-5 mb-6">

    <h2 class="text-lg font-semibold mb-5">
        Sales Overview
    </h2>


    <canvas id="salesChart" height="100"></canvas>


</div>



    {{-- Sales Orders Table --}}

    <div class="rounded-2xl border border-gray-200 p-5 mb-6">


        <h2 class="text-lg font-semibold mb-5">
            Sales Orders
        </h2>


        <div class="overflow-x-auto">


      <table id="salesTable" class="w-full text-left">

                <thead class="border-b">

                    <tr>


                        <th class="py-3">
                            Order No
                        </th>


                        <th>
                            Customer
                        </th>


                        <th>
                            Date
                        </th>


                        <th>
                            Amount
                        </th>


                        <th>
                            Status
                        </th>


                    </tr>

                </thead>



                <tbody>


                @forelse($orders as $order)


                    <tr class="border-b">


                        <td class="py-3">
                            {{ $order->order_number }}
                        </td>


                        <td>
                            {{ $order->customer->name ?? 'Guest' }}
                        </td>


                        <td>
                            {{ $order->created_at->format('d M Y') }}
                        </td>


                        <td>
                            Rs {{ number_format($order->total,2) }}
                        </td>


                        <td>
                            {{ ucfirst($order->order_status) }}
                        </td>


                    </tr>


                @empty


                    <tr>

                        <td colspan="5" class="text-center py-5">
                            No sales found
                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


        </div>


    


    </div>






    {{-- Top Selling Products --}}

    <div class="rounded-2xl border border-gray-200 p-5">


        <h2 class="text-lg font-semibold mb-5">
            Top Selling Products
        </h2>



        <div class="overflow-x-auto">


            <table class="w-full text-left">


                <thead class="border-b">


                    <tr>


                        <th class="py-3">
                            Shoe
                        </th>


                        <th>
                            Brand
                        </th>


                        <th>
                            Quantity Sold
                        </th>


                        <th>
                            Revenue
                        </th>


                    </tr>


                </thead>



                <tbody>


                @forelse($topProducts as $product)


                    <tr class="border-b">


                        <td class="py-3">

                            {{ $product->shoeVariant->shoe->name ?? 'N/A' }}

                        </td>



                        <td>

                            {{ $product->shoeVariant->shoe->brand->name ?? 'N/A' }}

                        </td>



                        <td>

                            {{ $product->total_sold }}

                        </td>



                        <td>

                            Rs {{ number_format($product->total_revenue,2) }}

                        </td>


                    </tr>


                @empty


                    <tr>

                        <td colspan="4" class="text-center py-5">
                            No products found
                        </td>

                    </tr>


                @endforelse


                </tbody>


            </table>


        </div>


    </div>



</div>

@push('scripts')

<script>

document.addEventListener('DOMContentLoaded', function () {


  $(document).ready(function () {

    if (!$.fn.DataTable.isDataTable('#salesTable')) {

        $('#salesTable').DataTable();

    }

});

});


</script>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>


<script>

const salesData = @json($salesChart ?? []);


const labels = salesData.map(item => item.date);

const values = salesData.map(item => item.total);



new Chart(document.getElementById('salesChart'), {

    type: 'line',

    data: {

        labels: labels,

        datasets: [{

            label: 'Sales',

            data: values,

            borderWidth: 2,

            tension: 0.4

        }]

    },


    options: {

        responsive:true,

        scales: {

            y: {

                beginAtZero:true

            }

        }

    }

});


</script>
@endpush
@endsection