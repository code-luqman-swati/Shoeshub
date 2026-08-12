
<table 
class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
id="OrderTable">



<thead class="bg-gray-50 dark:bg-gray-700">


<tr>


<th class="px-6 py-3 text-left">
Order Number
</th>


<th class="px-6 py-3 text-left">
Customer
</th>


<th class="px-6 py-3 text-left">
Total
</th>


<th class="px-6 py-3 text-left">
Payment Status
</th>


<th class="px-6 py-3 text-left">
Order Status
</th>


<th class="px-6 py-3 text-right">
Action
</th>


</tr>


</thead>




<tbody>



@foreach($orders as $order)



<tr class="border-b dark:text-gray-300">



<td class="px-6 py-4">

{{ $order->order_number }}

</td>




<td class="px-6 py-4">

{{ $order->customer?->name ?? 'N/A' }}

</td>




<td class="px-6 py-4">

{{ $order->total }}

</td>




<td class="px-6 py-4">


@if($order->payment_status == 'paid')


<span class="rounded bg-green-100 px-3 py-1 text-green-700">
{{ ucfirst($order->payment_status) }}
</span>


@elseif($order->payment_status == 'refunded')


<span class="rounded bg-red-100 px-3 py-1 text-red-700">
{{ ucfirst($order->payment_status) }}
</span>


@else


<span class="rounded bg-yellow-100 px-3 py-1 text-yellow-700">
{{ ucfirst($order->payment_status) }}
</span>


@endif


</td>





<td class="px-6 py-4">


@if($order->order_status == 'delivered')


<span class="rounded bg-green-100 px-3 py-1 text-green-700">
{{ ucfirst($order->order_status) }}
</span>


@elseif($order->order_status == 'cancelled')


<span class="rounded bg-red-100 px-3 py-1 text-red-700">
{{ ucfirst($order->order_status) }}
</span>


@else


<span class="rounded bg-blue-100 px-3 py-1 text-blue-700">
{{ ucfirst($order->order_status) }}
</span>


@endif



</td>





<td class="px-6 py-4 text-right">


<a href="{{ route('admin.orders.show',$order->id) }}"
class="rounded bg-indigo-100 px-3 py-2 text-indigo-700">

View

</a>


</td>



</tr>



@endforeach



</tbody>



</table>

@push('scripts')
<script>
$(document).ready(function(){

    $('#global-search').on('keyup', function(){

        let search = $(this).val();

        $.ajax({

            url: window.location.href,

            type:'GET',

            data:{
                search: search
            },

            headers:{
                'X-Requested-With':'XMLHttpRequest'
            },

            success:function(response){

                $('#ajax-table').html(response);
                    $('#OrderTable').DataTable({
        responsive:true
    });

            }

        });

    });

});
</script>
@endpush