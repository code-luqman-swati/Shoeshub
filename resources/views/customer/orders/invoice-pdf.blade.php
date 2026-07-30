<!DOCTYPE html>
<html>
<head>
    <title>ShoeHub Invoice</title>

    <style>
body {
    font-family: Arial, sans-serif;
    margin: 40px;
    color: #333;
}

.invoice-header {
    display: flex;
    justify-content: space-between;
    margin-bottom: 30px;
}

.company h1 {
    margin: 0;
    color: #111;
}

.invoice-info {
    text-align: right;
}


h3 {
    margin-top: 25px;
}


table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}


table, th, td {
    border: 1px solid #ddd;
}


th, td {
    padding: 12px;
    text-align: center;
}


th {
    background: #f5f5f5;
}


.total {
    margin-top: 20px;
    width: 300px;
    margin-left: auto;
}


.total p {
    display: flex;
    justify-content: space-between;
}


.history {
    border-left: 4px solid #2563eb;
    padding-left: 15px;
    margin-bottom: 15px;
}


.history strong {
    font-size: 16px;
}


.history p {
    color: #777;
    margin: 5px 0;
}


.print-btn {
    margin-top: 30px;
}


@media print {

    .print-btn {
        display:none;
    }

}

</style>
</head>

<body>


<div class="invoice-header">

    <div class="company">
        <h1>ShoeHub</h1>
        <p>Online Shoe Store</p>
    </div>


    <div class="invoice-info">

        <h2>Invoice</h2>

        <p>
            Order No:
            {{ $order->order_number }}
        </p>

        <p>
            Date:
            {{ $order->created_at->format('d M Y') }}
        </p>

    </div>

</div>



<h3>Customer Information</h3>

<p>
    Name:
    {{ $order->customer->name }}
</p>

<p>
    Address:
    {{ $order->shipping_address }},
    {{ $order->city }}
</p>



<h3>Order Items</h3>


<table>

<tr>
    <th>Shoe</th>
    <th>Size</th>
    <th>Color</th>
    <th>Quantity</th>
    <th>Price</th>
    <th>Subtotal</th>
</tr>


@foreach($order->items as $item)

<tr>

<td>
{{ $item->shoeVariant->shoe->name }}
</td>


<td>
{{ $item->shoeVariant->size->size }}
</td>


<td>
{{ $item->shoeVariant->color->name }}
</td>


<td>
{{ $item->quantity }}
</td>


<td>
Rs {{ number_format($item->price,2) }}
</td>


<td>
Rs {{ number_format($item->subtotal,2) }}
</td>


</tr>

@endforeach


</table>



<div class="total">

<p>
<span>Subtotal:</span>

<span>
Rs {{ number_format($order->subtotal,2) }}
</span>

</p>


<p>
<span>Tax:</span>

<span>
Rs {{ number_format($order->tax,2) }}
</span>

</p>


<p>
<span>Shipping:</span>

<span>
Rs {{ number_format($order->shipping,2) }}
</span>

</p>


<hr>


<p>
<strong>Total:</strong>

<strong>
Rs {{ number_format($order->total,2) }}
</strong>

</p>


</div>



<p>
Payment Status:
<strong>
{{ ucfirst($order->payment_status) }}
</strong>
</p>


<p>
Order Status:
<strong>
{{ ucfirst($order->order_status) }}
</strong>
</p>



<h3>
    Order History
</h3>


@foreach($order->statusHistories as $history)

<div class="history">

    <strong>
        {{ ucfirst($history->status) }}
    </strong>


    <p>
        {{ $history->created_at->format('d M Y h:i A') }}
    </p>

</div>

@endforeach
</div>




</body>
</html>