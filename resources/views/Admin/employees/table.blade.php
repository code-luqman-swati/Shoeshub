<table id="employeesTable" class="min-w-full">
    <thead>
        <tr class="border-b border-gray-200 dark:border-gray-700">
            <th class="px-5 py-3 text-left">Employee</th>
            <th class="px-5 py-3 text-left">Phone</th>
            <th class="px-5 py-3 text-left">Email</th>
            <th class="px-5 py-3 text-left">Role</th>
            <th class="px-5 py-3 text-left">Status</th>
            <th class="px-5 py-3 text-left">Created</th>
            <th class="px-5 py-3 text-center">Actions</th>
        </tr>
    </thead>

    <tbody>
        @foreach($employees as $employee)
            <tr id="employee-{{ $employee->id }}"
                class="border-b border-gray-200 dark:border-gray-700">

                <td class="px-5 py-4">
                    {{ $employee->name }}
                </td>

                <td class="px-5 py-4">
                    {{ $employee->phone }}
                </td>

                <td class="px-5 py-4">
                    {{ $employee->email }}
                </td>

                <td class="px-5 py-4">
                    {{ ucfirst($employee->role?->name) }}
                </td>

                <td class="px-5 py-4">
                    {{ $employee->status ? 'Active' : 'Inactive' }}
                </td>

                <td class="px-5 py-4">
                    {{ $employee->created_at->format('d M Y') }}
                </td>

                <td class="px-5 py-4 text-center">
                    <div class="flex justify-center gap-2">

                        <a href="{{ route('employees.edit', $employee->id) }}"
                           class="rounded bg-blue-500 px-3 py-1 text-white">
                            Edit
                        </a>

                        <form action="{{ route('employees.destroy', $employee->id) }}"
                              method="POST"
                              class="deleteEmployeeForm"
                              data-id="{{ $employee->id }}">
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
                    $('#employeesTable').DataTable({
        responsive:true
    });

            }

        });

    });

});
</script>
@endpush