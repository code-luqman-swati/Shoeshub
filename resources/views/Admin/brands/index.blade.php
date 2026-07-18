@extends('layouts.app')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
        Brands
    </h2>

    <a href="{{ route('admin.brands.create') }}"
        class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
        Add Brand
    </a>
</div>

{{-- Success Toast --}}
<div id="toast"
    class="fixed top-5 right-5 hidden rounded-lg bg-green-500 px-5 py-3 text-white shadow-lg z-50">
</div>

<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">

    <div class="overflow-x-auto">

        <table id="brandsTable" class="min-w-full">

            <thead>
                <tr class="border-b border-gray-200 dark:border-gray-700">

                    <th class="px-5 py-3 text-left">
                        Logo
                    </th>

                    <th class="px-5 py-3 text-left">
                        Brand Name
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

                @foreach($brands as $brand)

                    <tr id="brand-{{ $brand->id }}"
                        class="border-b border-gray-200 dark:border-gray-700">

                        <!-- Logo -->
                        <td class="px-5 py-4">

                            @if($brand->logo)
                                <img
                                    src="{{ asset('storage/'.$brand->logo) }}"
                                    class="h-14 w-14 rounded-lg border object-cover"
                                    alt="{{ $brand->name }}"
                                >
                            @else
                                <span class="text-gray-400">
                                    No Logo
                                </span>
                            @endif

                        </td>

                        <!-- Name -->
                        <td class="px-5 py-4 font-medium">
                            {{ $brand->name }}
                        </td>

                        <!-- Status -->
                        <td class="px-5 py-4">

                            @if($brand->status)

                                <span class="rounded-full bg-green-100 px-3 py-1 text-sm text-green-700">
                                    Active
                                </span>

                            @else

                                <span class="rounded-full bg-red-100 px-3 py-1 text-sm text-red-700">
                                    Inactive
                                </span>

                            @endif

                        </td>

                        <!-- Created -->
                        <td class="px-5 py-4">
                            {{ $brand->created_at->format('d M Y') }}
                        </td>

                        <!-- Actions -->
                        <td class="px-5 py-4 text-center">

                            <div class="flex justify-center gap-2">

                                <a href="{{ route('admin.brands.edit', $brand->id) }}"
                                    class="rounded bg-blue-500 px-3 py-1 text-white hover:bg-blue-600">
                                    Edit
                                </a>

                                <form
                                    action="{{ route('admin.brands.destroy', $brand->id) }}"
                                    method="POST"
                                    class="deleteBrandForm"
                                    data-id="{{ $brand->id }}">

                                    @csrf
                                    @method('DELETE')

                                    <button
                                        type="submit"
                                        class="rounded bg-red-500 px-3 py-1 text-white hover:bg-red-600">

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

    if (!$.fn.DataTable.isDataTable('#brandsTable')) {
        $('#brandsTable').DataTable();
    }

    $(document)
        .off('submit', '.deleteBrandForm')
        .on('submit', '.deleteBrandForm', function (e) {

            e.preventDefault();

            let form = $(this);
            let id = form.data('id');

            if (!confirm('Are you sure you want to delete this brand?')) {
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

                    let table = $('#brandsTable').DataTable();

                    table
                        .row($('#brand-' + id))
                        .remove()
                        .draw(false);

                    $('#toast')
                        .removeClass('hidden')
                        .text(response.message || 'Brand deleted successfully.')
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