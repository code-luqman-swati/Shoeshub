<table 
class="min-w-full divide-y divide-gray-200 dark:divide-gray-700"
id="paymentTable">


<thead class="bg-gray-50 dark:bg-gray-700">


<tr>


<th class="px-6 py-3 text-left">
Order
</th>


<th class="px-6 py-3 text-left">
Customer
</th>


<th class="px-6 py-3 text-left">
Amount
</th>


<th class="px-6 py-3 text-left">
Status
</th>


<th class="px-6 py-3 text-right">
Action
</th>


</tr>


</thead>



<tbody>



@foreach($payments as $payment)



<tr class="border-b dark:text-gray-300">



<td class="px-6 py-4">

{{ $payment->order?->order_number ?? 'N/A' }}

</td>




<td class="px-6 py-4">

{{ $payment->order?->customer?->name ?? 'N/A' }}

</td>




<td class="px-6 py-4">

{{ $payment->amount }}
{{ $payment->currency }}

</td>




<td class="px-6 py-4">


@if($payment->status == 'paid')

<span class="rounded bg-green-100 px-3 py-1 text-green-700">
{{ ucfirst($payment->status) }}
</span>


@elseif($payment->status == 'refunded')


<span class="rounded bg-red-100 px-3 py-1 text-red-700">
{{ ucfirst($payment->status) }}
</span>


@else


<span class="rounded bg-yellow-100 px-3 py-1 text-yellow-700">
{{ ucfirst($payment->status) }}
</span>


@endif


</td>




<td class="px-6 py-4 text-right">


<a href="{{ route('admin.payments.show',$payment->id) }}"
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
                    $('#paymentTable').DataTable({
        responsive:true
    });

            }

        });

    });

});
</script>
@endpush