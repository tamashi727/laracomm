<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
    .title_deg{
        text-align:center;
        font-size:25px;
        font-weight:bold;
        padding-bottom:50px;

    }
    .table_deg{
        border:cornsilk 2px solid;
        width:70%;
        padding-top:50px;
        text-align:center;
        margin:auto;

    }
    
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
      <div class="main-panel">
        <div class="content-wrapper">
            <h1 class="title_deg">All Orders</h1>
            <div style="padding-left:400px;padding-bottom:30px;">

            <form action="{{ url('search') }}" method="get">
              @csrf
              <input type="text" name="search" style="color:black;" placeholder="search for something">
              <input type="submit" value="search" class="btn btn-outline-primary">


            </form>
          </div>
            <table class="table_deg">
                <tr style="background-color: aqua;">
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Phone</th>
                    <th>Product title</th>
                    <th>quantity</th>
                    <th>Price</th>
                    <th>payment status</th>
                    <th>delivery status</th>
                    <th>image</th>
                    <th>Delivered</th>
                    <th>print pdf</th>
                    
                </tr>
                @forelse($order as $order)
                <tr>
                    <td>{{ $order->name }}</td>
                    <td>{{ $order->email }}</td>
                    <td>{{ $order->address}}</td>
                    <td>{{ $order->phone }}</td>
                    <td>{{ $order->product_title }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->price}}</td>
                    <td>{{ $order->payment_status }}</td>
                    <td>{{ $order->delivery_status}}</td>
                    <td><img src="/product/{{ $order->image }}" style="width:100px;height:100px;"/></td>

                    <td>
                      @if($order->delivery_status=='processing')
                      <a href="{{ url('delivered',$order->id) }}" onclick="return confirm('are you sure its delivered?')"class="btn btn-primary" >Delivered</a>
                      
                          
                      @else
                      <p>delivered</p>
                          
                      @endif

                    </td>
                    <td><a href="{{ url('print_pdf',$order->id) }}" class="btn btn-secondary">print pdf</a></td>
                </tr>

                @empty
                <div>
                  <p>no data found</p>
                </div>
                    
                
                @endforelse
            </table>


        </div>
    </div>
        <!-- partial -->
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    
    <!-- End custom js for this page -->
  </body>
</html>