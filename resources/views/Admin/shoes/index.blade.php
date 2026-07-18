@extends('layouts.app')

@section('content')


<div class="mb-6 flex items-center justify-between">

    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
        Shoes
    </h2>


    <a href="{{ route('admin.shoes.create') }}"
       class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
        Add Shoe
    </a>

</div>



{{-- Success Toast --}}

<div id="toast"
    class="fixed top-5 right-5 hidden rounded-lg bg-green-500 px-5 py-3 text-white shadow-lg z-50">
</div>





<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">


<div class="overflow-x-auto">


<table id="shoesTable" class="min-w-full">


<thead>

<tr class="border-b border-gray-200 dark:border-gray-700">


<th class="px-5 py-3 text-left">
Image
</th>


<th class="px-5 py-3 text-left">
Shoe Name
</th>


<th class="px-5 py-3 text-left">
Category
</th>


<th class="px-5 py-3 text-left">
Brand
</th>


<th class="px-5 py-3 text-left">
Price
</th>


<th class="px-5 py-3 text-left">
Gender
</th>


<th class="px-5 py-3 text-left">
Status
</th>


<th class="px-5 py-3 text-left">
Created
</th>


<th class="px-5 py-3 text-center">
Actions
</th>


</tr>


</thead>




<tbody>


@foreach($shoes as $shoe)


<tr id="shoe-{{ $shoe->id }}"
class="border-b border-gray-200 dark:border-gray-700">





<td class="px-5 py-4">


@if($shoe->image)

<img

src="{{ asset('storage/'.$shoe->image) }}"

class="h-12 w-12 rounded-lg object-cover"

>


@else

<span class="text-gray-400">
No Image
</span>

@endif


</td>







<td class="px-5 py-4">

{{ $shoe->name }}

</td>







<td class="px-5 py-4">

{{ $shoe->category->name ?? 'N/A' }}

</td>







<td class="px-5 py-4">

{{ $shoe->brand->name ?? 'N/A' }}

</td>







<td class="px-5 py-4">

Rs {{ number_format($shoe->price) }}

</td>







<td class="px-5 py-4">

{{ ucfirst($shoe->gender) }}

</td>







<td class="px-5 py-4">

{{ $shoe->status ? 'Active' : 'Inactive' }}

</td>







<td class="px-5 py-4">

{{ $shoe->created_at->format('d M Y') }}

</td>







<td class="px-5 py-4 text-center">


<div class="flex justify-center gap-2">





<a href="{{ route('admin.shoes.edit',$shoe->id) }}"

class="rounded bg-blue-500 px-3 py-1 text-white">

Edit

</a>







<form action="{{ route('admin.shoes.destroy',$shoe->id) }}"

method="POST"

class="deleteShoeForm"

data-id="{{ $shoe->id }}">


@csrf

@method('DELETE')



<button

type="submit"

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


</div>



@endsection





@push('scripts')


<script>


$(document).ready(function(){



// DataTable

if (!$.fn.DataTable.isDataTable('#shoesTable')) {

    $('#shoesTable').DataTable();

}




// Ajax Delete


$(document)

.off('submit','.deleteShoeForm')

.on('submit','.deleteShoeForm',function(e){


e.preventDefault();



let form = $(this);

let id = form.data('id');



if(!confirm('Are you sure you want to delete this shoe?')){

    return;

}



$.ajax({


url: form.attr('action'),

type:'POST',


data:{


_token:$('meta[name="csrf-token"]').attr('content'),

_method:'DELETE'


},



success:function(response){



let table = $('#shoesTable').DataTable();



table

.row($('#shoe-'+id))

.remove()

.draw(false);





$('#toast')

.removeClass('hidden')

.text(response.message || 'Shoe deleted successfully.')

.fadeIn();



setTimeout(function(){

$('#toast').fadeOut();

},3000);



},




error:function(){

alert('Something went wrong.');

}



});



});



});


</script>


@endpush