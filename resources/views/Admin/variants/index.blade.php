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





 <div id="ajax-table">

      @include('admin.variants.table')
      </div>


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