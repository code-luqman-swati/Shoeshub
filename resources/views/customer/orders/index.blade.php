@extends('customer.layouts.index')

@section('content')

<div class="bg-gray-50 min-h-screen py-12">
    <div class="max-w-7xl mx-auto px-4">

        <!-- Page Heading -->
        <div class="mb-8">
            <h2 class="text-3xl font-bold text-gray-800">My Orders</h2>
            <p class="text-gray-500 mt-1">
                View your complete purchase history.
            </p>
        </div>

        <!-- Orders Card -->
        <div class="bg-white rounded-xl shadow-lg overflow-hidden">

            <div class="overflow-x-auto">

                <table class="min-w-full divide-y divide-gray-200">

                    <thead class="bg-gray-100">
                        <tr>
                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Order #
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Date
                            </th>

                            <th class="px-6 py-4 text-left text-sm font-semibold text-gray-700">
                                Total
                            </th>

                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">
                                Payment
                            </th>

                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">
                                Order Status
                            </th>

                            <th class="px-6 py-4 text-center text-sm font-semibold text-gray-700">
                                Actions
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-gray-100">

                        @forelse($orders as $order)

                        <tr class="hover:bg-gray-50 transition">

                            <td class="px-6 py-5 font-semibold text-gray-800">
                                {{ $order->order_number }}
                            </td>

                            <td class="px-6 py-5 text-gray-600">
                                {{ $order->created_at->format('d M Y') }}
                            </td>

                            <td class="px-6 py-5 font-semibold text-gray-800">
                                Rs {{ number_format($order->total,2) }}
                            </td>

                            <td class="px-6 py-5 text-center">

                                @if($order->payment_status=='paid')
                                    <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-sm font-medium">
                                        Paid
                                    </span>

                                @elseif($order->payment_status=='pending')
                                    <span class="px-3 py-1 rounded-full bg-yellow-100 text-yellow-700 text-sm font-medium">
                                        Pending
                                    </span>

                                @elseif($order->payment_status=='failed')
                                    <span class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-sm font-medium">
                                        Failed
                                    </span>

                                @else
                                    <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-sm font-medium">
                                        {{ ucfirst($order->payment_status) }}
                                    </span>
                                @endif

                            </td>

                            <td class="px-6 py-5 text-center">

                                @php
                                    $statusColors = [
                                        'pending' => 'bg-yellow-100 text-yellow-700',
                                        'processing' => 'bg-blue-100 text-blue-700',
                                        'shipped' => 'bg-purple-100 text-purple-700',
                                        'delivered' => 'bg-green-100 text-green-700',
                                        'cancelled' => 'bg-red-100 text-red-700',
                                    ];
                                @endphp

                                <span class="px-3 py-1 rounded-full text-sm font-medium {{ $statusColors[$order->order_status] ?? 'bg-gray-100 text-gray-700' }}">
                                    {{ ucfirst($order->order_status) }}
                                </span>

                            </td>

                            <td class="px-6 py-5">

                                <div class="flex justify-center gap-2">

                                    <a href="{{ route('orders.invoice',$order) }}"
                                        class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg text-sm">
                                        View
                                    </a>

                                    <a href="{{ route('orders.invoice.download',$order) }}"
                                        class="px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg text-sm">
                                        Invoice
                                    </a>

                                </div>

                            </td>

                        </tr>

                        @empty

                        <tr>

                            <td colspan="6" class="text-center py-12">

                                <div class="text-gray-500">

                                    <h3 class="text-xl font-semibold mb-2">
                                        No Orders Found
                                    </h3>

                                    <p>
                                        You haven't placed any orders yet.
                                    </p>

                                </div>

                            </td>

                        </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

        <div class="mt-6">
            {{ $orders->links() }}
        </div>

    </div>
</div>

@endsection