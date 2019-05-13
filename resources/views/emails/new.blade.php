<!DOCTYPE html>
<html lang="en">
<head>
    <title>Contact</title>
    <meta charset="utf-8">
</head>
<body>
<style type="text/css">
    .sl {font-size:12px;color:#333333;width:100%;border-width: 1px;border-color: Black;border-collapse: collapse;}
    .sl th {font-size:12px;background-color:White;border-width: 1px;padding: 8px;border-style: solid;border-color: Black;text-align:left;}
    .sl tr {background-color:White;}
    .sl td {font-size:12px;border-width: 1px;padding: 8px;border-style: solid;border-color: Black;}
</style>
<h2>Your order №{{ $orderId }}</h2>
<table class="sl" border="1">
    <tr>
        <th>№</th>
        <th>Order</th>
        <th>Price</th>
        <th>Name</th>
        <th>Last Name</th>
        <th>Phone</th>
        <th>Address</th>
        <th>Email</th>
        <th>Payment</th>
        <th>Time</th>
    </tr>
    <tr>
        <td>{{ $order->id }}</td>
        <td><table>
                @foreach($products as $product)
                    <tr>
                        <td><img src="{{asset($product->img)}}" style="width: 100px"></td>
                        <td>{{ $product->product_name }}</td>
                        <td>${{ $product->product_price }}</td>
                        <td>x{{ $product->quantity }}</td>
                    </tr>
                @endforeach
            </table></td>
        <td>{{ $order->total_price }}</td>
        <td>{{ $order->name }}</td>
        <td>{{ $order->last_name }}</td>
        <td>{{ $order->phone }}</td>
        <td>{{ $order->address }}</td>
        <td>{{ $order->email }}</td>
        <td>{{ $order->payment }}</td>
        <td>{{ $order->created_at}}</td>
    </tr>
</table>
</body>
</html>