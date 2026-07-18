<h2>Payment Page</h2>

<h3>
Order Number:
{{ $order->order_number }}
</h3>

<h3>
Total:
{{ $order->total }}
</h3>


<form action="{{ route('checkout',$order->id)}}" method="POST">
    @csrf

    <button type="submit">
        Pay Now
    </button>

</form>