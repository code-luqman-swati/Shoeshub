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
  
    <div id="ajax-table">
        @include('admin.brands.table')
    </div>

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