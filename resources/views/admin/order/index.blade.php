@extends('layouts.app')


@section('content')


<div class="flex justify-between items-center mb-5">


    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
        Orders Management
    </h2>


</div>



{{-- Success Toast --}}
@if(session('success'))


<div class="mb-4 rounded bg-green-100 px-5 py-3 text-green-700">

    {{ session('success') }}

</div>


@endif





<div class="rounded-xl bg-white p-5 dark:bg-gray-800">


<div id="ajax-table">
    @include('admin.order.table')
</div>


</div>




@endsection



@push('scripts')


<script>
$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#OrderTable')) {
        $('#OrderTable').DataTable({
            responsive: true,
            language: {
                emptyTable: "No inventory found."
            }
        });
    }
});
</script>


@endpush