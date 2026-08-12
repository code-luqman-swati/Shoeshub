@extends('layouts.app')

@section('content')

<div class="rounded-2xl border border-gray-200 bg-white p-5 dark:border-gray-800 dark:bg-white/[0.03]">

    <div class="flex justify-between items-center mb-5">

        <h2 class="text-xl font-semibold text-gray-800 dark:text-white">
            Suppliers
        </h2>


        <a href="{{ route('admin.suppliers.create') }}"
           class="rounded-lg bg-brand-500 px-4 py-2 text-sm font-medium text-white hover:bg-brand-600">
            Add Supplier
        </a>

    </div>


    <div class="overflow-x-auto">
<div id="ajax-table">
      @include('admin.suppliers.table')
</div>
    </div>

</div>

<script>

document.querySelectorAll('.delete-btn').forEach(button => {

    button.addEventListener('click', function(){

        let form = this.closest('.delete-form');

        let id = form.dataset.id;


        if(confirm('Are you sure you want to delete this supplier?')){


            fetch(form.action, {

                method: 'POST',

                headers: {

                    'X-CSRF-TOKEN': document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute('content'),

                    'Accept': 'application/json'

                },

                body: new FormData(form)

            })

            .then(response => response.json())

            .then(data => {


                if(data.success){

                    document
                    .getElementById('supplier-row-'+id)
                    .remove();


                }


            })

            .catch(error => console.log(error));


        }


    });

});

</script>
@endsection

@push('scripts')

<script>

$(document).ready(function(){


// DataTable

if (!$.fn.DataTable.isDataTable('#supplierTable')) {

    $('#supplierTable').DataTable({

        pageLength: 10,

        lengthMenu:[
            [5,10,25,50,-1],
            [5,10,25,50,"All"]
        ],

        ordering:true,

        searching:true,

        responsive:true

    });

}



});

</script>

@endpush