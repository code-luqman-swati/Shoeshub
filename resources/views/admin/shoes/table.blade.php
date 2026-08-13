<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
id="shoesTable">


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
Sale Price
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

Rs {{ number_format($shoe->discount_price) }}

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


@push('scripts')
<script>
$(document).ready(function(){

    $('#global-search').on('keyup', function(){

        let search = $(this).val();

        $.ajax({

            url: window.location.href,

            type:'GET',

            data:{
                search: search
            },

            headers:{
                'X-Requested-With':'XMLHttpRequest'
            },

            success:function(response){
 $('#shoesTable').DataTable({
    responsive: true,
    autoWidth: false,
    scrollX: true
});
            }

        });

    });

});
</script>
@endpush