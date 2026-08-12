@extends('layouts.app')


@section('content')


<div class="mb-5">

    <a href="{{ route('admin.customers.index') }}"
       class="text-blue-600 hover:underline">
        ← Back to Customers
    </a>

</div>



<div class="rounded-xl bg-white p-6 shadow dark:bg-gray-800">


    <h2 class="mb-6 text-2xl font-bold text-gray-800 dark:text-white">
        Customer Details
    </h2>



    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">


        <div>

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Name
            </p>

            <p class="font-semibold text-gray-800 dark:text-white">
                {{ $customer->name }}
            </p>

        </div>




        <div>

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Email
            </p>

            <p class="font-semibold text-gray-800 dark:text-white">
                {{ $customer->email }}
            </p>

        </div>





        <div>

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Phone
            </p>

            <p class="font-semibold text-gray-800 dark:text-white">
                {{ $customer->phone }}
            </p>

        </div>





        <div>

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Status
            </p>


            @if($customer->status)

                <span class="rounded-full bg-green-100 px-3 py-1 text-sm text-green-700">
                    Active
                </span>

            @else

                <span class="rounded-full bg-red-100 px-3 py-1 text-sm text-red-700">
                    Blocked
                </span>

            @endif


        </div>





        <div>

            <p class="text-sm text-gray-500 dark:text-gray-400">
                Registered Date
            </p>

            <p class="font-semibold text-gray-800 dark:text-white">

                {{ $customer->created_at->format('d M Y') }}

            </p>

        </div>



    </div>



</div>



@endsection