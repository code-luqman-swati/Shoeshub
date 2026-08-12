@extends('layouts.app')

@section('content')


<h2 class="text-2xl font-bold text-gray-800 dark:text-white mb-5">
    Edit Variant
</h2>



<form action="{{ route('admin.shoe-variants.update',$variant->id) }}"
      method="POST">

@csrf
@method('PUT')


<div class="space-y-5">


{{-- Shoe --}}
<div>

<label class="block mb-2">
    Shoe
</label>


<select name="shoe_id"
        class="h-11 w-full rounded border">


@foreach($shoes as $shoe)

<option value="{{ $shoe->id }}"
@if($variant->shoe_id == $shoe->id)
selected
@endif
>

{{ $shoe->name }}

</option>

@endforeach


</select>

</div>




{{-- Size --}}
<div>

<label class="block mb-2">
    Size
</label>


<select name="size_id"
        class="h-11 w-full rounded border">


@foreach($sizes as $size)

<option value="{{ $size->id }}"
@if($variant->size_id == $size->id)
selected
@endif
>

{{ $size->size }}

</option>

@endforeach


</select>

</div>




{{-- Color --}}
<div>

<label class="block mb-2">
    Color
</label>


<select name="color_id"
        class="h-11 w-full rounded border">


@foreach($colors as $color)

<option value="{{ $color->id }}"
@if($variant->color_id == $color->id)
selected
@endif
>

{{ $color->name }}

</option>

@endforeach


</select>

</div>




{{-- Stock --}}
<div>

<label class="block mb-2">
    Stock
</label>


<input 
type="number"
name="stock"
value="{{ $variant->stock }}"
class="h-11 w-full rounded border">


</div>



<button
class="rounded bg-blue-600 px-5 py-2 text-white hover:bg-blue-700">

Update Variant

</button>



</div>


</form>


@endsection