<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Confirmation</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #333333;
        }

        p {
            color: #666666;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: #ffffff;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Order Confirmation</h1>
        <p>Dear {{$order->address->name}},</p>
        <p>Thank you for your purchase! Your order has been confirmed and will be shipped shortly.</p>
        <p>Order ID:</p>
        <ul>
            <li>Order Number: {{$order->custom_order_id}}</li>
            <li>Total Amount: {{$order->payment->amount}}</li>
        </ul>
        {{-- <p>We will send you another email with the tracking information once your order has been shipped.</p> --}}
        <p>Thank you for choosing our services!</p>
        <p>Best Regards,<br>Selligion Technologies</p>
        {{-- <a href="[Link to Your Website]" class="btn">Visit Our Website</a> --}}
    </div>
</body>
</html>
