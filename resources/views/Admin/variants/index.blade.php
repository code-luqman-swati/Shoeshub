@extends('layouts.app')

@section('content')


<div class="flex justify-between items-center mb-5">

<h2 class="text-2xl font-bold text-gray-800 dark:text-white">
    Shoe Variants Management
</h2>


<a href="{{ route('admin.shoe-variants.create') }}"
class="rounded-lg bg-blue-600 px-5 py-2 text-white hover:bg-blue-700">

Add Variant

</a>

</div>



{{-- Success Toast --}}
@if(session('success'))

<div class="mb-4 rounded bg-green-100 px-5 py-3 text-green-700">

{{ session('success') }}

</div>

@endif





<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
id="shoeVariantTable">


<thead class="bg-gray-50 dark:bg-gray-700">


<tr>

<th class="px-6 py-3 text-left">
Shoes
</th>

<th class="px-6 py-3 text-left">
Colour
</th>

<th class="px-6 py-3 text-left">
Size
</th>

<th class="px-6 py-3 text-left">
Stock
</th>

<th class="px-6 py-3 text-right">
Actions
</th>


</tr>


</thead>



<tbody>


@foreach($variants as $variant)

<tr>


<td class="px-6 py-4">
{{ $variant->shoe?->name ?? 'N/A' }}
</td>



<td class="px-6 py-4">
{{ $variant->color?->name ?? 'N/A' }}
</td>



<td class="px-6 py-4">
{{ $variant->size?->size ?? 'N/A' }}
</td>



<td class="px-6 py-4">
{{ $variant->stock }}
</td>




<td class="px-5 py-4 text-center ">

<div classs="flex justify-center gap-2">
<a href="{{ route('admin.shoe-variants.edit',$variant->id) }}"
class="rounded bg-indigo-100 px-3 py-2 text-indigo-700">

Edit

</a>



<form action="{{ route('admin.shoe-variants.destroy',$variant->id) }}"
method="POST"
class="inline deleteShoeVariantForm">


@csrf
@method('DELETE')


<button type="submit"
class="ml-2 rounded bg-red-100 px-3 py-2 text-red-700">

Delete

</button>

</div>
</form>



</td>


</tr>


@endforeach



</tbody>


</table>



@endsection




@push('scripts')


<script>
$(document).ready(function(){

    $('#shoeVariantTable').DataTable();


    $('.deleteShoeVariantForm')
    .off('submit')
    .on('submit', function(e){

        if(!confirm('Are you sure you want to delete this variant?'))
        {
            e.preventDefault();
        }

    });

});


</script>


@endpush