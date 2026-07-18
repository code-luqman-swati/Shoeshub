@extends('layouts.app')


@section('content')


<div class="flex justify-between mb-5">


<h2 class="text-2xl font-bold dark:text-white">
Customers
</h2>


</div>



<div class="bg-white dark:bg-gray-800 rounded-xl p-5">


<table class="w-full" id="CustomerTable">


<thead>

<tr class="border-b">

<th class="p-3 text-left">
Name
</th>


<th class="p-3 text-left">
Email
</th>


<th class="p-3 text-left">
Phone
</th>


<th class="p-3 text-left">
Status
</th>


<th>
Action
</th>


</tr>

</thead>



<tbody>


@foreach($customers as $customer)


<tr class="border-b">


<td class="p-3">

{{ $customer->name }}

</td>


<td class="p-3">

{{ $customer->email }}

</td>


<td class="p-3">

{{ $customer->phone }}

</td>



<td class="p-3">


@if($customer->status)

<span class="text-green-600">
Active
</span>

@else

<span class="text-red-600">
Blocked
</span>

@endif


</td>



<td class="p-3">


<a href="{{route('admin.customers.show',$customer)}}"
class="text-blue-600">

View

</a>


<form action="{{route('admin.customers.status',$customer)}}"
method="POST"
class="inline">

@csrf
@method('PATCH')


<button class="ml-3 text-red-600">

Toggle

</button>


</form>


</td>


</tr>


@endforeach


</tbody>


</table>


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
