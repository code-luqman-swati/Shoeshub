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


   <div id="ajax-table">
@include('Admin.colors.table')

   </div>

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