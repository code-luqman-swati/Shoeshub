<!DOCTYPE html>
<html>

<head>
<title>Order Confirmation</title>

<style>

body{
    font-family: Arial, sans-serif;
    background:#f5f5f5;
    padding:30px;
}

.container{
    background:white;
    max-width:650px;
    margin:auto;
    padding:30px;
    border-radius:15px;
}

h1{
    color:#111827;
}

.success{
    color:#16a34a;
    font-size:18px;
}

table{
    width:100%;
    border-collapse:collapse;
    margin-top:20px;
}

th,td{
    border:1px solid #ddd;
    padding:10px;
    text-align:center;
}

th{
    background:#f3f4f6;
}

.total{
    margin-top:20px;
    text-align:right;
    font-size:18px;
    font-weight:bold;
}

.footer{
    margin-top:30px;
    color:#777;
}

</style>

</head>


<body>


<div class="container">


<h1>
ShoeHub 👟
</h1>


<p class="success">
Payment Successful 🎉
</p>


<p>
Hello {{ $order->customer->name }},
</p>


<p>
Thank you for shopping with ShoeHub.
Your order has been confirmed.
</p>


<h3>
Order Details
</h3>


<p>
Order Number:
<strong>
{{ $order->order_number }}
</strong>
</p>


<p>
Status:
<strong>
{{ ucfirst($order->order_status) }}
</strong>
</p>



<table>


<tr>
<th>Shoe</th>
<th>Size</th>
<th>Color</th>
<th>Qty</th>
<th>Price</th>
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


</tr>

@endforeach


</table>



<div class="total">

Total:
Rs {{ number_format($order->total,2) }}

</div>


<p>
We will update you when your order is shipped.
</p>



<div class="footer">

Thank you for choosing ShoeHub ❤️

</div>


</div>


</body>

</html>