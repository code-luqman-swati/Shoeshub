@extends('layouts.app')

@section('content')


<div class="mb-6 flex items-center justify-between">

    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
        Shoes
    </h2>


    <a href="{{ route('admin.shoes.create') }}"
       class="rounded-lg bg-blue-600 px-4 py-2 text-white hover:bg-blue-700">
        Add Shoe
    </a>

</div>



{{-- Success Toast --}}

<div id="toast"
    class="fixed top-5 right-5 hidden rounded-lg bg-green-500 px-5 py-3 text-white shadow-lg z-50">
</div>





<div class="overflow-hidden rounded-2xl border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">



   <div id="ajax-table">

      @include('admin.shoes.table')
      </div>





</div>



@endsection



@push('scripts')

<script>

$(document).ready(function () {

    // --------------------------------------------------
    // DataTable
    // --------------------------------------------------

    if (!$.fn.DataTable.isDataTable('#shoesTable')) {

         $('#shoesTable').DataTable({
    responsive: true,
    autoWidth: false,
    scrollX: true
});

    }


    // --------------------------------------------------
    // AJAX DELETE SHOE
    // --------------------------------------------------

    $(document)
        .off('submit', '.deleteShoeForm')
        .on('submit', '.deleteShoeForm', function (e) {

            e.preventDefault();

            let form = $(this);

            // Confirmation
            if (!confirm('Are you sure you want to delete this shoe?')) {
                return;
            }

            // Debug
            console.log('DELETE URL:', form.attr('action'));
            console.log('FORM DATA:', form.serialize());


            $.ajax({

                url: form.attr('action'),

                type: 'POST',

                data: form.serialize(),


                success: function (response) {

                    console.log('DELETE SUCCESS:', response);


                    let table = $('#shoesTable').DataTable();


                    // Remove row from DataTable
                    table
                        .row(form.closest('tr'))
                        .remove()
                        .draw(false);


                    // Show toast
                    $('#toast')
                        .removeClass('hidden')
                        .text(
                            response.message ||
                            'Shoe deleted successfully.'
                        )
                        .fadeIn();


                    setTimeout(function () {

                        $('#toast').fadeOut();

                    }, 3000);

                },


                error: function (xhr) {

                    console.log('DELETE ERROR');
                    console.log('STATUS:', xhr.status);
                    console.log('RESPONSE:', xhr.responseText);


                    alert(
                        xhr.responseJSON?.message ||
                        'Something went wrong while deleting the shoe.'
                    );

                }

            });

        });

});

</script>

@endpush