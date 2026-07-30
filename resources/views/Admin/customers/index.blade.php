@extends('layouts.app')


@section('content')


<div class="flex justify-between mb-5">


<h2 class="text-2xl font-bold dark:text-white">
Customers
</h2>


</div>



<div class="bg-white dark:bg-gray-800 rounded-xl p-5">


<div id="ajax-table">

    @include('admin.customers.table')

</div>
</div>


@endsection

@push('scripts')

<script>
$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#CustomerTable')) {
        $('#CustomerTable').DataTable({
            responsive: true,
            language: {
                emptyTable: "No inventory found."
            }
        });
    }
});
</script>
@endpush
