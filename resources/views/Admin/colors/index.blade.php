@extends('layouts.app')

@section('content')

<div class="flex justify-between items-center mb-5">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
        Colors Management
    </h2>

    <a href="{{ route('admin.colors.create') }}"
       class="rounded-lg bg-blue-600 px-5 py-2 text-white hover:bg-blue-700">
        Add Color
    </a>
</div>


@if(session('success'))
    <div class="mb-4 rounded-lg bg-green-100 p-3 text-green-700">
        {{ session('success') }}
    </div>
@endif


<table id="colorsTable" class="min-w-full border">
    <thead>
        <tr class="border-b bg-gray-100">
            <th class="px-5 py-3">ID</th>
            <th class="px-5 py-3">Color</th>
            <th class="px-5 py-3">Preview</th>
            <th class="px-5 py-3">Created</th>
            <th class="px-5 py-3">Action</th>
        </tr>
    </thead>

    <tbody>

    @foreach($colors as $color)

        <tr id="color-{{ $color->id }}" class="border-b">

            <td class="px-5 py-3">
                {{ $color->id }}
            </td>


            <td class="px-5 py-3">
                {{ $color->name }}
            </td>


            <td class="px-5 py-3">
                <div
                    class="h-8 w-8 rounded-full border"
                    style="background-color: {{ $color->hex_code }}">
                </div>
            </td>


            <td class="px-5 py-3">
                {{ $color->created_at->format('d M Y') }}
            </td>


            <td class="px-5 py-3 flex gap-2">

                <a href="{{ route('admin.colors.edit',$color->id) }}"
                   class="rounded bg-blue-500 px-3 py-1 text-white">
                    Edit
                </a>


               <form action="{{ route('admin.colors.destroy',$color->id) }}"
      method="POST"
      class="deleteColorForm"
      data-id="{{ $color->id }}">

    @csrf
    @method('DELETE')

    <button type="submit"
            class="rounded bg-red-500 px-3 py-1 text-white">
        Delete
    </button>

</form>

            </td>

        </tr>

    @endforeach

    </tbody>

</table>
@push('scripts')

<script>
$(document).ready(function(){



$('#colorsTable').DataTable();



});




// AJAX DELETE


$(document).off('submit','.deleteColorForm')
.on('submit','.deleteColorForm',function(e){

    e.preventDefault();


    let form=$(this);

    let id=form.data('id');


    if(confirm('Are you sure you want to delete this color?')){


        $.ajax({

            url:form.attr('action'),

            type:'POST',

            data:form.serialize(),


            success:function(){

                $('#color-'+id).remove();

                alert('color deleted successfully');

            },


            error:function(){

                alert('Delete failed');

            }

        });


    }


});

</script>

@endpush
@endsection