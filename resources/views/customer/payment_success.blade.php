<!DOCTYPE html>
<html>
<head>
    <title>Payment Success</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f8fafc;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 80px auto;
            background: white;
            padding: 40px;
            border-radius: 20px;
            text-align: center;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
        }

        .icon {
            width: 90px;
            height: 90px;
            background: #dcfce7;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: auto;
            font-size: 45px;
        }

        h1 {
            color: #16a34a;
            margin-top: 25px;
        }

        p {
            color: #555;
            font-size: 16px;
            line-height: 1.6;
        }

        .order-box {
            background: #f1f5f9;
            padding: 20px;
            border-radius: 12px;
            margin: 25px 0;
        }

        .order-number {
            font-size: 20px;
            font-weight: bold;
            color: #111827;
        }

        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 12px 25px;
            background: #111827;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            transition: .3s;
        }

        .btn:hover {
            background: #000;
        }

        .footer {
            margin-top: 30px;
            color: #94a3b8;
            font-size: 14px;
        }

    </style>

</head>


<body>


<div class="container">


    <div class="icon">
        ✅
    </div>


    <h1>
        Payment Successful!
    </h1>


    <p>
        Thank you for your purchase.  
        Your order has been received successfully.
    </p>


    <div class="order-box">

        <p>
            Order Number
        </p>

        <div class="order-number">
            {{ $order->order_number }}
        </div>

    </div>


    <p>
        We are now processing your order.
        You will receive updates about your delivery.
    </p>


    <a href="{{ route('customer.orders') }}" class="btn">
        View My Orders
    </a>


    <div class="footer">
        © {{ date('Y') }} ShoeHub. All rights reserved.
    </div>


</div>


</body>
</html>