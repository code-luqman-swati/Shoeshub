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



 <div id="ajax-table">

      @include('Admin.sizes.table')
      </div>
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