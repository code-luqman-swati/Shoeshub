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
                    $('#colorsTable').DataTable({
        responsive:true
    });

            }

        });

    });

});
</script>
@endpush
