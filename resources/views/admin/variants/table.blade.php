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

                $('#ajax-table').html(response);
                    $('#shoeVariantTable').DataTable({
        responsive:true
    });

            }

        });

    });

});
</script>
@endpush