@extends('customer.layouts.index')

@section('content')


<form action="{{ route('cart.add') }}" method="POST">

@csrf


@foreach($shoe->variants as $variant)

<label class="block border p-4 rounded-lg mb-3">

<input
type="radio"
name="shoe_variant_id"
value="{{ $variant->id }}"
required
>

{{ $variant->size->size }}

-

{{ $variant->color->name }}

</label>


@endforeach



<input
type="number"
name="quantity"
value="1"
min="1"
class="border rounded-lg px-4 py-2 mb-4"
>


<button
type="submit"
class="
bg-black
text-white
px-6
py-3
rounded-xl
"
>

Add To Cart

</button>


</form>


@endsection