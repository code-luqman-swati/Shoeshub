@extends('layouts.app')


@section('content')


<h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-5">

Add Shoe Variant

</h2>



<form action="{{ route('admin.shoe-variants.store') }}"
method="POST">

@csrf


<div class="space-y-5">


<div>

<label>
Shoes
</label>


<select
name="shoe_id"
class="h-11 w-full rounded border">


<option value="">
Select Shoes
</option>


@foreach($shoe as $shoe)

<option value="{{ $shoe->id }}">

{{ $shoe->name }}

</option>


@endforeach


</select>

</div>




<div class="space-y-5">


<div>

<label>
Size
</label>


<select
name="size_id"
class="h-11 w-full rounded border">


<option value="">
Select Size
</option>


@foreach($sizes as $size)

<option value="{{ $size->id }}">

{{ $size->size}}

</option>


@endforeach


</select>

</div>




<div>

<label>
Color
</label>


<select
name="color_id"
class="h-11 w-full rounded border">


<option>
Select Color
</option>


@foreach($colors as $color)

<option value="{{ $color->id }}">

{{ $color->name }}

</option>


@endforeach


</select>


</div>

<div>

<label>
Stock
</label>

<input
type="number"
name="stock"
class="h-11 w-full rounded border">


</div>

<button
class="rounded bg-blue-600 px-5 py-2 text-white">

Save Variant

</button>



</div>


</form>


@endsection