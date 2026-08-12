@extends('layouts.app')

@section('content')


<div class="rounded-2xl border bg-white p-5">


<h2 class="text-xl font-semibold mb-6">

Purchase Price History

</h2>



<table class="w-full border">


<thead class="bg-gray-100">

<tr>

<th class="p-3 border">
Product
</th>


<th class="p-3 border">
Size
</th>


<th class="p-3 border">
Color
</th>


<th class="p-3 border">
Purchase Price
</th>


<th class="p-3 border">
Quantity
</th>


<th class="p-3 border">
Date
</th>


</tr>

</thead>



<tbody>


@foreach($purchase->items as $item)


@foreach($item->variant->priceHistories as $history)


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

{{ number_format($history->purchase_price,2) }}

</td>



<td class="p-3 border">

{{ $history->quantity }}

</td>



<td class="p-3 border">

{{ $history->created_at->format('d M Y') }}

</td>


</tr>


@endforeach


@endforeach


</tbody>


</table>


</div>


@endsection