@extends('layouts.app')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
        Employees
    </h2>

    <a href="{{ route('employees.create') }}"
        class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
        Add Employee
    </a>
</div>

{{-- Success Toast --}}
<div id="toast"
    class="fixed top-5 right-5 hidden rounded-lg bg-green-500 px-5 py-3 text-white shadow-lg z-50">
</div>

<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">

    <div class="overflow-x-auto">
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
                    {{ ucfirst($employee->role) }}
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

    </div>

</div>

@endsection


@push('scripts')

<script>
$(document).ready(function () {

    // Initialize DataTable once
    if (!$.fn.DataTable.isDataTable('#employeesTable')) {
        $('#employeesTable').DataTable();
    }

    // AJAX Delete
    $(document)
        .off('submit', '.deleteEmployeeForm')
        .on('submit', '.deleteEmployeeForm', function (e) {

            e.preventDefault();

            let form = $(this);
            let id = form.data('id');

            if (!confirm('Are you sure you want to delete this employee?')) {
                return;
            }

            $.ajax({
                url: form.attr('action'),
                type: 'POST',
                data: {
                    _token: $('meta[name="csrf-token"]').attr('content'),
                    _method: 'DELETE'
                },

                success: function (response) {

                    let table = $('#employeesTable').DataTable();

                    table
                        .row($('#employee-' + id))
                        .remove()
                        .draw(false);

                    $('#toast')
                        .removeClass('hidden')
                        .text(response.message || 'Employee deleted successfully.')
                        .fadeIn();

                    setTimeout(function () {
                        $('#toast').fadeOut();
                    }, 3000);
                },

                error: function () {
                    alert('Something went wrong.');
                }
            });

        });

});
</script>

@endpush