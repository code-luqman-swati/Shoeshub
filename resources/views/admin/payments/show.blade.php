@extends('layouts.app')


@section('content')


<h2 class="text-2xl font-bold mb-5">
Payment Details
</h2>


<div class="bg-white p-6 rounded-xl">


<p>
Order:
<strong>
{{ $payment->order->order_number }}
</strong>
</p>


<p>
Customer:
<strong>
{{ $payment->order->customer->name }}
</strong>
</p>


<p>
Amount:
<strong>
{{ $payment->amount }} {{ $payment->currency }}
</strong>
</p>


<p>
Status:
<strong>
{{ ucfirst($payment->status) }}
</strong>
</p>



@if($payment->status == 'paid')

<form action="{{ route('admin.payments.refund',$payment) }}"
method="POST">

@csrf

<button
class="bg-red-600 text-white px-5 py-2 rounded">

Refund Payment

</button>


</form>

@endif


</div>


@endsection