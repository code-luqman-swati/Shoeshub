@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-5">

    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
        Sizes Management
    </h2>


    <a href="{{ route('admin.sizes.create') }}"
       class="rounded-lg bg-blue-600 px-5 py-2 text-white hover:bg-blue-700">
        Add Size
    </a>

</div>


{{-- Success Toast --}}
@if(session('success'))

<div class="mb-5 rounded-lg bg-green-100 px-5 py-3 text-green-700">
    {{ session('success') }}
</div>

@endif



<div class="overflow-x-auto">

<table id="sizesTable"
       class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">


<thead class="bg-gray-50 dark:bg-gray-800">

<tr>

<th class="px-5 py-3 text-left">
    ID
</th>


<th class="px-5 py-3 text-left">
    Size
</th>


<th class="px-5 py-3 text-left">
    Created At
</th>


<th class="px-5 py-3 text-center">
    Action
</th>


</tr>

</thead>



<tbody>


@foreach($sizes as $size)

<tr id="size-{{ $size->id }}"
    class="border-b border-gray-200 dark:border-gray-700">


<td class="px-5 py-4">
    {{ $size->id }}
</td>


<td class="px-5 py-4">
    {{ $size->size }}
</td>


<td class="px-5 py-4">
    {{ $size->created_at->format('d M Y') }}
</td>


<td class="px-5 py-4 text-center">


<div class="flex justify-center gap-2">


<a href="{{ route('admin.sizes.edit',$size->id) }}"
class="rounded bg-blue-500 px-3 py-1 text-white">
Edit
</a>



<form action="{{ route('admin.sizes.destroy',$size->id) }}"
      method="POST"
      class="deleteSizeForm"
      data-id="{{ $size->id }}">


@csrf
@method('DELETE')


<button type="submit"
class="rounded bg-red-500 px-3 py-1 text-white">

Delete

</button>


</form>


</div>


</td>


</tr>


@endforeach


</tbody>


</table>


</div>



@endsection




@push('scripts')


<script>


$(document).ready(function(){



$('#sizesTable').DataTable();



});




// AJAX DELETE


$(document).off('submit','.deleteSizeForm')
.on('submit','.deleteSizeForm',function(e){

    e.preventDefault();


    let form=$(this);

    let id=form.data('id');


    if(confirm('Are you sure you want to delete this size?')){


        $.ajax({

            url:form.attr('action'),

            type:'POST',

            data:form.serialize(),


            success:function(){

                $('#size-'+id).remove();

                alert('Size deleted successfully');

            },


            error:function(){

                alert('Delete failed');

            }

        });


    }


});



</script>


@endpush