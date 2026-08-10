@extends('layouts.app')

@section('content')

<div class="mb-6 flex items-center justify-between">
    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
        Categories
    </h2>

@can('create', App\Models\Category::class)
    <a href="{{ route('admin.categories.create') }}"
       class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
        Add New Category
    </a>
@endcan


</div>

{{-- Success Toast --}}

<div id="toast"
     class="fixed right-5 top-5 z-50 hidden rounded-lg bg-green-500 px-4 py-3 text-white shadow-lg">
</div>

<div class="overflow-hidden rounded-3xl border border-gray-200 bg-white dark:border-white/[0.05] dark:bg-white/[0.03]">
    <div class="max-w-full overflow-x-auto">

   <div id="ajax-table">
@include('admin.categories.table')

   </div>
    
</div>

</div>

@endsection

@push('scripts')

<script>
$(document).ready(function () {

    // Initialize DataTable only once
    let table = $('#categoriesTable').DataTable();

    // AJAX Delete
    $(document).on('submit', '.deleteCategoryForm', function (e) {
        e.preventDefault();

        let form = $(this);
        let id = form.data('id');

        if (!confirm('Are you sure you want to delete this category?')) {
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

                table
                    .row($('#category-' + id))
                    .remove()
                    .draw(false);

                $('#toast')
                    .removeClass('hidden')
                    .text(response.message || 'Category deleted successfully.')
                    .fadeIn();

                setTimeout(function () {
                    $('#toast').fadeOut();
                }, 3000);
            },
            error: function () {
                alert('Something went wrong. Please try again.');
            }
        });
    });

});
</script>

@endpush
