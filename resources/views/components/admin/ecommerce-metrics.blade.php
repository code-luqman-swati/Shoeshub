@props([
    'totalOrders' => 0,
    'totalRevenue' => 0,
    'totalCustomers' => 0,
    'totalProducts' => 0,

    'pendingOrders' => 0,
    'completedOrders' => 0,
    'lowStockProducts' => 0,

    'customerGrowth' => 0,
    'orderGrowth' => 0,
    'revenueGrowth' => 0,
])


<div class="grid grid-cols-1 gap-4 md:grid-cols-2 xl:grid-cols-4">

    <!-- Customers -->
    <a href="{{ route('admin.customers.index') }}"
       class="block rounded-2xl border border-gray-200 bg-white p-5 transition hover:shadow-md dark:border-gray-800 dark:bg-white/[0.03] md:p-6">

        <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-xl dark:bg-gray-800">
            👥
        </div>

        <div class="flex items-end justify-between mt-5">
            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    Customers
                </span>

                <h4 class="mt-2 text-gray-800 text-title-sm dark:text-white/90">
                    {{ $totalCustomers }}
                </h4>
            </div>

            <span class="text-sm font-medium text-success-600">
                {{ number_format($customerGrowth,2) }}%
            </span>
        </div>

    </a>


    <!-- Orders -->
    <a href="{{ route('admin.orders.index') }}"
       class="block rounded-2xl border border-gray-200 bg-white p-5 transition hover:shadow-md dark:border-gray-800 dark:bg-white/[0.03] md:p-6">

        <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-xl dark:bg-gray-800">
            📦
        </div>

        <div class="flex items-end justify-between mt-5">

            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    Orders
                </span>

                <h4 class="mt-2 text-gray-800 text-title-sm dark:text-white/90">
                    {{ $totalOrders }}
                </h4>
            </div>

            <span class="text-sm font-medium text-success-600">
                {{ number_format($orderGrowth,2) }}%
            </span>

        </div>

    </a>


    <!-- Revenue -->
    <a href="{{ route('admin.payments.index') }}"
       class="block rounded-2xl border border-gray-200 bg-white p-5 transition hover:shadow-md dark:border-gray-800 dark:bg-white/[0.03] md:p-6">

        <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-xl dark:bg-gray-800">
            💰
        </div>

        <div class="flex items-end justify-between mt-5">

            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    Revenue
                </span>

                <h4 class="mt-2 text-gray-800 text-title-sm dark:text-white/90">
                    Rs {{ number_format($totalRevenue,2) }}
                </h4>
            </div>

            <span class="text-sm font-medium text-success-600">
                {{ number_format($revenueGrowth,2) }}%
            </span>

        </div>

    </a>


    <!-- Products -->
    <a href="{{ route('admin.shoes.index') }}"
       class="block rounded-2xl border border-gray-200 bg-white p-5 transition hover:shadow-md dark:border-gray-800 dark:bg-white/[0.03] md:p-6">

        <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-xl dark:bg-gray-800">
            👟
        </div>

        <div class="flex items-end justify-between mt-5">

            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    Products
                </span>

                <h4 class="mt-2 text-gray-800 text-title-sm dark:text-white/90">
                    {{ $totalProducts }}
                </h4>
            </div>

        </div>

    </a>


    <!-- Pending Orders -->
    <a href="{{ route('admin.orders.index',['status'=>'pending']) }}"
       class="block rounded-2xl border border-gray-200 bg-white p-5 transition hover:shadow-md dark:border-gray-800 dark:bg-white/[0.03] md:p-6">

        <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-xl dark:bg-gray-800">
            ⏳
        </div>

        <div class="flex items-end justify-between mt-5">

            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    Pending Orders
                </span>

                <h4 class="mt-2 text-gray-800 text-title-sm dark:text-white/90">
                    {{ $pendingOrders }}
                </h4>
            </div>

            <span class="text-sm font-medium text-warning-600">
                Pending
            </span>

        </div>

    </a>


    <!-- Completed Orders -->
    <a href="{{ route('admin.orders.index',['status'=>'delivered']) }}"
       class="block rounded-2xl border border-gray-200 bg-white p-5 transition hover:shadow-md dark:border-gray-800 dark:bg-white/[0.03] md:p-6">

        <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-xl dark:bg-gray-800">
            ✅
        </div>

        <div class="flex items-end justify-between mt-5">

            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    Completed Orders
                </span>

                <h4 class="mt-2 text-gray-800 text-title-sm dark:text-white/90">
                    {{ $completedOrders }}
                </h4>
            </div>

            <span class="text-sm font-medium text-success-600">
                Delivered
            </span>

        </div>

    </a>


    <!-- Low Stock -->
    <a href="{{ route('admin.inventory.index',['filter'=>'low-stock']) }}"
   class="block rounded-2xl border border-gray-200 bg-white p-5 transition hover:shadow-md dark:border-gray-800 dark:bg-white/[0.03] md:p-6">
        <div class="flex items-center justify-center w-12 h-12 bg-gray-100 rounded-xl dark:bg-gray-800">
            ⚠️
        </div>

        <div class="flex items-end justify-between mt-5">

            <div>
                <span class="text-sm text-gray-500 dark:text-gray-400">
                    Low Stock
                </span>

                <h4 class="mt-2 text-gray-800 text-title-sm dark:text-white/90">
                    {{ $lowStockProducts }}
                </h4>
            </div>

            <span class="text-sm font-medium text-error-600">
                Alert
            </span>

        </div>

    </a>

</div>