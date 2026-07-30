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
                    $('#sizesTable').DataTable({
        responsive:true
    });

            }

        });

    });

});
</script>
@endpush