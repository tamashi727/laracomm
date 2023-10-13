<!DOCTYPE html>
<html>
   <head>
      <!-- Basic -->
      <meta charset="utf-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge" />
      <!-- Mobile Metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
      <!-- Site Metas -->
      <meta name="keywords" content="" />
      <meta name="description" content="" />
      <meta name="author" content="" />
      <link rel="shortcut icon" href="images/favicon.png" type="">
      <title>Famms - Fashion HTML Template</title>
      <!-- bootstrap core css -->
      <link rel="stylesheet" type="text/css" href="home/css/bootstrap.css" />
      <!-- font awesome style -->
      <link href="home/css/font-awesome.min.css" rel="stylesheet" />
      <!-- Custom styles for this template -->
      <link href="home/css/style.css" rel="stylesheet" />
      <!-- responsive style -->
      <link href="home/css/responsive.css" rel="stylesheet" />
      <style type="text/css">
      .th_deg{
        background-color: aqua;
        padding:10px;
        color:black;
        border:2px solid black;
      }
      .td_deg{
        color:black;
        padding:10px;
        border:2px solid black;
      }
    </style>
   </head>
   <body>
      <div class="hero_area">
         <!-- header section strats -->
         @include('home.header')
         <!-- end header section -->

      
      <div style="margin:auto;margin-top:30px;">
      <table>
        <tr >
            <th class="th_deg">Product title</th>
            <th class="th_deg">Quantity</th>
            <th class="th_deg">Price</th>
            <th class="th_deg">Payment status</th>
            <th class="th_deg">Delivery status</th>
            <th class="th_deg">Image</th>
            <th class="th_deg">Cancel Order</th>
        </tr>
        @foreach($order as $order)
        <tr>
            <td class="td_deg">{{ $order->product_title }}</td>
            <td class="td_deg">{{ $order->quantity }}</td>
            <td class="td_deg">{{ $order->price }}</td>
            <td class="td_deg">{{ $order->payment_status}}</td>
            <td class="td_deg">{{ $order->delivery_status }}</td>
            <td class="td_deg"><img style="width:100px;height:200px;" src="product/{{ $order->image }}"/></td>
            @if($order->delivery_status=='processing')
            <td class="td_deg">
                <a class="btn btn-danger" onclick="return confirm('are you sure to cancel order?')" href="{{ url('cancel_order',$order->id) }}">cancel order</a>
            </td>
            @else
            <td class="td_deg">
            <p>not allowed</p>
            </td>
            @endif
        </tr>
        @endforeach
      </table>


    </div>
</div>
      <!-- footer end -->
      
      <!-- jQery -->
      <script src="home/js/jquery-3.4.1.min.js"></script>
      <!-- popper js -->
      <script src="home/js/popper.min.js"></script>
      <!-- bootstrap js -->
      <script src="home/js/bootstrap.js"></script>
      <!-- custom j/s -->
      <script src="home/js/custom.js"></script>
   </body>
</html>