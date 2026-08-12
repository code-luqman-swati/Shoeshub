<table id="CustomerTable" class="w-full">

    <thead>
        <tr class="border-b">

            <th class="p-3 text-left">
                Name
            </th>

            <th class="p-3 text-left">
                Email
            </th>

            <th class="p-3 text-left">
                Phone
            </th>

            <th class="p-3 text-left">
                Status
            </th>

            <th>
                Action
            </th>

        </tr>
    </thead>


    <tbody>

        @foreach($customers as $customer)

            <tr class="border-b">

                <td class="p-3">
                    {{ $customer->name }}
                </td>


                <td class="p-3">
                    {{ $customer->email }}
                </td>


                <td class="p-3">
                    {{ $customer->phone }}
                </td>


                <td class="p-3">

                    @if($customer->status)

                        <span class="text-green-600">
                            Active
                        </span>

                    @else

                        <span class="text-red-600">
                            Blocked
                        </span>

                    @endif

                </td>


                <td class="p-3">

                    <a href="{{ route('admin.customers.show',$customer) }}"
                       class="text-blue-600">

                        View

                    </a>


                    <form action="{{ route('admin.customers.status',$customer) }}"
                          method="POST"
                          class="inline">

                        @csrf
                        @method('PATCH')

                        <button class="ml-3 text-red-600">
                            Toggle
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
                    $('#CustomerTable').DataTable({
        responsive:true
    });

            }

        });

    });

});
</script>
@endpush