  <table class="w-full text-left" id="supplierTable">

            <thead>
               <tr class="border-b border-gray-200 dark:border-gray-700">

                    <th class="px-5 py-3 text-sm font-medium text-gray-500">
                        #
                    </th>

                    <th class="px-5 py-3 text-sm font-medium text-gray-500">
                        Name
                    </th>

                    <th class="px-5 py-3 text-sm font-medium text-gray-500">
                        Phone
                    </th>

                    <th class="px-5 py-3 text-sm font-medium text-gray-500">
                        Email
                    </th>

                    <th class="px-5 py-3 text-sm font-medium text-gray-500">
                        Status
                    </th>

                    <th class="px-5 py-3 text-sm font-medium text-gray-500">
                        Action
                    </th>

                </tr>
            </thead>


            <tbody>

@foreach($suppliers as $supplier)

<tr class="border-b border-gray-100"
    id="supplier-row-{{ $supplier->id }}">

                    <td class="px-5 py-4">
                        {{ $loop->iteration }}
                    </td>


                    <td class="px-5 py-4 font-medium text-gray-800">
                        {{ $supplier->name }}
                    </td>


                    <td class="px-5 py-4">
                        {{ $supplier->phone }}
                    </td>


                    <td class="px-5 py-4">
                        {{ $supplier->email }}
                    </td>


                    <td class="px-5 py-4">

                        @if($supplier->status)

                            <span class="rounded-full bg-green-100 px-3 py-1 text-xs text-green-700">
                                Active
                            </span>

                        @else

                            <span class="rounded-full bg-red-100 px-3 py-1 text-xs text-red-700">
                                Inactive
                            </span>

                        @endif

                    </td>


                    <td class="px-5 py-4">

                        <a href="{{ route('admin.suppliers.edit',$supplier->id) }}"
                           class="text-blue-500">
                            Edit
                        </a>

<form action="{{ route('admin.suppliers.destroy',$supplier->id) }}"
      method="POST"
      class="inline delete-form"
      data-id="{{ $supplier->id }}">

    @csrf
    @method('DELETE')

    <button type="button"
            class="ml-3 text-red-500 delete-btn">
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
                    $('#supplierTable').DataTable({
        responsive:true
    });

            }

        });

    });

});
</script>
@endpush