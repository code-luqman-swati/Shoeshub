@extends('layouts.app')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-5">

    <div class="flex justify-between items-center mb-6">

        <h2 class="text-xl font-semibold">
            Purchase Details
        </h2>


       <div class="flex items-center gap-3">

    <a href="{{ route('admin.purchases.index') }}"
       class="inline-flex items-center gap-2 
              px-4 py-2 
              bg-gray-500 hover:bg-gray-600
              text-white 
              rounded-lg
              transition duration-200">

        <span>
            ←
        </span>

        Back

    </a>



    <a href="{{ route('admin.purchases.price.history',$purchase->id) }}"
       class="inline-flex items-center gap-2
              px-4 py-2
              bg-blue-600 hover:bg-blue-700
              text-white
              rounded-lg
              transition duration-200">

        <span>
            📄
        </span>

        Price History

    </a>

</div>

    </div>


<div class="grid grid-cols-2 gap-5 mb-6">


<div class="p-4 rounded-lg border bg-gray-50">
    <p class="text-sm text-gray-500">
        Purchase No
    </p>

    <p class="font-semibold text-gray-800">
        {{ $purchase->purchase_no }}
    </p>
</div>



<div class="p-4 rounded-lg border bg-gray-50">

    <p class="text-sm text-gray-500">
        Supplier
    </p>

    <p class="font-semibold text-gray-800">
        {{ $purchase->supplier->name }}
    </p>

</div>



<div class="p-4 rounded-lg border bg-gray-50">

    <p class="text-sm text-gray-500">
        Purchase Date
    </p>

    <p class="font-semibold text-gray-800">
        {{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M Y') }}
    </p>

</div>



<div class="p-4 rounded-lg border bg-gray-50">

    <p class="text-sm text-gray-500">
        Status
    </p>


    <span class="px-3 py-1 rounded-full text-sm
    bg-green-100 text-green-700">

        {{ ucfirst($purchase->status) }}

    </span>


</div>


</div>

    <h3 class="text-lg font-semibold mb-4">
        Items
    </h3>



    <div class="overflow-x-auto">

 <table class="w-full text-sm">

     <thead class="bg-gray-100 text-gray-700">

            <tr>

                <th class="p-3 border">
                    Shoe
                </th>


                <th class="p-3 border">
                    Size
                </th>


                <th class="p-3 border">
                    Color
                </th>


                <th class="p-3 border">
                    Qty
                </th>


                <th class="p-3 border">
                    Price
                </th>


                <th class="p-3 border">
                    Subtotal
                </th>

            </tr>

        </thead>



        <tbody>


        @foreach($purchase->items as $item)


        <tr>


            <td class="p-3 border">

                {{ $item->variant->shoe->name }}

            </td>


            <td class="p-3 border">

                {{ $item->variant->size->size }}

            </td>


            <td class="p-3 border">

                {{ $item->variant->color->name }}

            </td>


            <td class="p-3 border">

                {{ $item->quantity }}

            </td>


            <td class="p-3 border">

                Rs. {{ number_format($item->purchase_price,2) }}

            </td>


            <td class="p-3 border">

              Rs. {{ number_format($item->subtotal,2) }}

            </td>


        </tr>


        @endforeach


        </tbody>


    </table>


    </div>


<div class="mt-6 flex justify-end">

<div class="bg-blue-600 text-white px-6 py-4 rounded-xl">

<p class="text-sm">
Total Amount
</p>

<h3 class="text-2xl font-bold">

Rs. {{ number_format($purchase->total_amount,2) }}

</h3>


</div>

</div>


</div>


@endsection