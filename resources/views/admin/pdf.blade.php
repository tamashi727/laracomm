<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
        <tr>
            <th style="border: 2px solid black;">name: </th>
            <th style="border: 2px solid black;">email:</th>
            <th style="border: 2px solid black;">phone:</th>
            <th style="border: 2px solid black;">address:</th>
            <th style="border: 2px solid black;">price: </th>
            <th style="border: 2px solid black;">product title:</th>
            <th style="border: 2px solid black;">quantity:</th>
            <th style="border: 2px solid black;">payment status </th>
            <th style="border: 2px solid black;">delivery status </th>
            <th style="border: 2px solid black;">image</th>
        </tr>
    </thead>
    <tbody>
        <tr>
    <td style="border:2px solid black;"> {{ $order->name }}</td>
    <td style="border:2px solid black;">  {{ $order->email }}</td>
    <td style="border:2px solid black;">  {{ $order->phone }}</td>
    <td style="border:2px solid black;">   {{ $order->address }}</td>
    <td style="border:2px solid black;"> {{ $order->price }}</td>
     
    <td style="border:2px solid black;">  {{ $order->product_title}}</td>
    <td style="border:2px solid black;"> {{  $order->quantity}}</td>
    
    <td style="border:2px solid black;">  {{ $order->payment_status }}</td>
    <td style="border:2px solid black;"> {{ $order->delivery_status }}</td>

    <td><img src="/product/{{ $order->image }}" style="width:100px;height:100px;"/></td>
        </tr>
    </tbody>

    </table>
</body>
</html>