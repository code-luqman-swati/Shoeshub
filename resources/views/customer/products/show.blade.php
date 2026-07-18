@extends('customer.layouts.index')


@section('content')


<div class="container mx-auto px-6 py-10">


<div class="grid md:grid-cols-2 gap-10">


<div>

<img
src="{{ asset('storage/'.$shoe->image) }}"
class="w-full h-96 object-cover rounded"
>

</div>



<div>


<h1 class="text-3xl font-bold">
{{ $shoe->name }}
</h1>


<p class="text-red-500 text-xl mt-3">
${{ $shoe->price }}
</p>



<p class="mt-5">
{{ $shoe->description }}
</p>



<form action="{{ route('cart.add') }}"
method="POST"
class="mt-6">


@csrf


<label class="block font-semibold">
Select Variant
</label>


<select name="shoe_variant_id"
class="border p-2 w-full mt-2">


@foreach($shoe->variants as $variant)

<option value="{{ $variant->id }}">

Size:
{{ $variant->size->size }}

-
Color:
{{ $variant->color->name }}

</option>


@endforeach


</select>



<input
type="number"
name="quantity"
value="1"
min="1"
class="border p-2 mt-4 w-20"
>



<button
class="bg-black text-white px-6 py-3 rounded mt-5">

Add To Cart

</button>


</form>


</div>


</div>


</div>


@endsection