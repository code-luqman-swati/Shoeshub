@extends('layouts.app')


@section('content')


<div class="mb-5 flex justify-between items-center">


    <h2 class="text-2xl font-bold dark:text-white">
        Order Details
    </h2>


    <a href="{{ route('admin.orders.index') }}"
       class="rounded-lg bg-gray-600 px-4 py-2 text-white">

        Back

    </a>


</div>




<div class="grid grid-cols-1 gap-5 lg:grid-cols-2">


<!-- Customer Information -->

<div class="rounded-xl bg-white p-5 dark:bg-gray-800">


<h3 class="mb-4 text-lg font-bold dark:text-white">
Customer Information
</h3>


<p class="dark:text-gray-300">
Name:
{{ $order->customer->name }}
</p>


<p class="dark:text-gray-300">
Email:
{{ $order->customer->email }}
</p>


<p class="dark:text-gray-300">
Phone:
{{ $order->customer->phone }}
</p>


</div>




<!-- Shipping -->

<div class="rounded-xl bg-white p-5 dark:bg-gray-800">


<h3 class="mb-4 text-lg font-bold dark:text-white">
Shipping Information
</h3>


<p class="dark:text-gray-300">
Address:
{{ $order->shipping_address }}
</p>


<p class="dark:text-gray-300">
City:
{{ $order->city }}
</p>


<p class="dark:text-gray-300">
Postal Code:
{{ $order->postal_code }}
</p>


</div>


</div>





<!-- Products -->


<div class="mt-5 rounded-xl bg-white p-5 dark:bg-gray-800">


<h3 class="mb-5 text-lg font-bold dark:text-white">
Order Items
</h3>



<table class="w-full">


<thead>


<tr class="border-b dark:text-gray-300">


<th class="p-3 text-left">
Shoe
</th>


<th class="p-3 text-left">
Size
</th>


<th class="p-3 text-left">
Color
</th>


<th class="p-3 text-left">
Quantity
</th>


<th class="p-3 text-left">
Price
</th>


<th class="p-3 text-left">
Subtotal
</th>


</tr>


</thead>



<tbody>



@foreach($order->items as $item)



<tr class="border-b dark:text-gray-300">


<td class="p-3">

{{ $item->shoeVariant->shoe->name }}

</td>



<td class="p-3">

{{ $item->shoeVariant->size->size }}

</td>



<td class="p-3">

{{ $item->shoeVariant->color->name }}

</td>



<td class="p-3">

{{ $item->quantity }}

</td>



<td class="p-3">

{{ $item->price }}

</td>



<td class="p-3">

{{ $item->subtotal }}

</td>


</tr>


@endforeach



</tbody>


</table>


</div>





<!-- Order Summary -->


<div class="mt-5 rounded-xl bg-white p-5 dark:bg-gray-800">


<h3 class="mb-4 text-lg font-bold dark:text-white">
Order Summary
</h3>



<p class="dark:text-gray-300">

Subtotal:
{{ $order->subtotal }}

</p>


<p class="dark:text-gray-300">

Tax:
{{ $order->tax }}

</p>


<p class="dark:text-gray-300">

Shipping:
{{ $order->shipping }}

</p>



<p class="font-bold dark:text-white">

Total:
{{ $order->total }}

</p>


</div>





<!-- Update Status -->


<div class="mt-5 rounded-xl bg-white p-5 dark:bg-gray-800">


<h3 class="mb-4 text-lg font-bold dark:text-white">
Update Order Status
</h3>


@if(session('success'))

<div class="mb-4 rounded bg-green-100 px-5 py-3 text-green-700">

{{ session('success') }}

</div>

@endif



<form action="{{ route('admin.orders.update',$order->id) }}"
method="POST">


@csrf
@method('PATCH')


<label class="font-semibold">
Order Status
</label>


<select name="order_status"
class="mt-2 rounded border p-2">


<option value="pending"
{{ $order->order_status == 'pending' ? 'selected' : '' }}>
Pending
</option>


<option value="processing"
{{ $order->order_status == 'processing' ? 'selected' : '' }}>
Processing
</option>


<option value="shipped"
{{ $order->order_status == 'shipped' ? 'selected' : '' }}>
Shipped
</option>


<option value="delivered"
{{ $order->order_status == 'delivered' ? 'selected' : '' }}>
Delivered
</option>


<option value="cancelled"
{{ $order->order_status == 'cancelled' ? 'selected' : '' }}>
Cancelled
</option>


</select>



<button
class="ml-3 rounded bg-blue-600 px-5 py-2 text-white">

Update

</button>


</form>



</div>



@endsection