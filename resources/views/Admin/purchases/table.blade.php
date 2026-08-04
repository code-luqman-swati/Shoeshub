<table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
id="purchaseTable">


<thead>

<tr class="border-b border-gray-200 dark:border-gray-700">


<th class="px-5 py-3 text-left">
#
</th>


<th class="px-5 py-3 text-left">
Purchase No
</th>


<th class="px-5 py-3 text-left">
Supplier
</th>


<th class="px-5 py-3 text-left">
Purchase Date
</th>


<th class="px-5 py-3 text-left">
Total Amount
</th>


<th class="px-5 py-3 text-left">
Status
</th>


<th class="px-5 py-3 text-center">
Actions
</th>


</tr>

</thead>



<tbody>


@foreach($purchases as $purchase)


<tr id="purchase-{{ $purchase->id }}"
class="border-b border-gray-200 dark:border-gray-700">


<td class="px-5 py-4">

{{ $loop->iteration }}

</td>



<td class="px-5 py-4 font-medium text-gray-800 dark:text-white">

{{ $purchase->purchase_no }}

</td>



<td class="px-5 py-4">

{{ $purchase->supplier->name ?? 'N/A' }}

</td>



<td class="px-5 py-4">

{{ \Carbon\Carbon::parse($purchase->purchase_date)->format('d M Y') }}

</td>



<td class="px-5 py-4">

Rs {{ number_format($purchase->total_amount,2) }}

</td>



<td class="px-5 py-4">


@if($purchase->status == 'completed')

<span class="rounded-full bg-green-100 px-3 py-1 text-xs text-green-700">

Completed

</span>


@elseif($purchase->status == 'pending')

<span class="rounded-full bg-yellow-100 px-3 py-1 text-xs text-yellow-700">

Pending

</span>


@else

<span class="rounded-full bg-red-100 px-3 py-1 text-xs text-red-700">

Cancelled

</span>


@endif


</td>



<td class="px-5 py-4 text-center">


<div class="flex justify-center gap-2">


<a href="{{ route('admin.purchases.show',$purchase->id) }}"

class="rounded bg-blue-500 px-3 py-1 text-white">

View

</a>



<a href="{{ route('admin.purchases.edit',$purchase->id) }}"

class="rounded bg-green-500 px-3 py-1 text-white">

Edit

</a>




<form action="{{ route('admin.purchases.destroy',$purchase->id) }}"

method="POST"

class="deletePurchaseForm"

data-id="{{ $purchase->id }}">


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

@push('scripts')

<script>

$(document).ready(function(){


$('#global-search').on('keyup',function(){


let search=$(this).val();



$.ajax({


url:window.location.href,

type:'GET',


data:{
    search:search
},


headers:{

'X-Requested-With':'XMLHttpRequest'

},



success:function(response){



$('#ajax-table').html(response);



if ($.fn.DataTable.isDataTable('#purchaseTable')) {

    $('#purchaseTable').DataTable().destroy();

}



$('#purchaseTable').DataTable({

    responsive:true

});



}



});



});


});

</script>


@endpush