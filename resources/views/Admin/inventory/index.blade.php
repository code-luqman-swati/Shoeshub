@extends('layouts.app')

@section('content')

<div class="space-y-6">

    <h2 class="text-2xl font-bold text-gray-800 dark:text-white">
        Inventory Management
    </h2>

    <div class="overflow-x-auto rounded-xl border border-gray-200 bg-white dark:border-gray-700 dark:bg-gray-900">

      <div id="ajax-table">

      @include('Admin.inventory.table')
      </div>

    </div>

</div>

@endsection

@push('scripts')
<script>
$(document).ready(function () {
    if (!$.fn.DataTable.isDataTable('#InventoryTable')) {
        $('#InventoryTable').DataTable({
            responsive: true,
            language: {
                emptyTable: "No inventory found."
            }
        });
    }
});
</script>
@endpush