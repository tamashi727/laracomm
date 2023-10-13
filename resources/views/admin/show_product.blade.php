<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')
    <style type="text/css">
    .center{
        margin:auto;
        border:2px solid white;
        margin-top:30px;
        text-align:center;
        width:90%;
        font-size:25px;
    }
    
    </style>
  </head>
  <body>
    <div class="container-scroller">
      <!-- partial:partials/_sidebar.html -->
     @include('admin.sidebar')
      <!-- partial -->
      @include('admin.header')
        <!-- partial -->

        <div class="main-panel">
            <div class="content-wrapper">

              @if(session()->has('message'))
              <div class="alert alert-success">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                      X</button>
                  {{ session()->get('message') }}
              </div>

              @endif

  <h2 style="text-align:center;font-size:44px;">All products</h2>
                <table class="center">
                    <tr style="background-color: aqua;">
                        <th>Product title</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Discount price</th>
                        <th>Product Image</th>
                        <th>Delete</th>
                        <th>Update product</th>
                        
                    </tr>
                    @foreach($product as $product)
                    <tr>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->description }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td>{{ $product->category}}</td>
                        <td>{{ $product->price }}</td>
                        <td>{{ $product->discount_price}}</td>
                        <td style="width:100px;height:60px;">
                            <img src="/product/{{ $product->image }}"/>
                        </td>
                        <td><a class="btn btn-danger" onclick="return confirm('Are you sure to delete this?')"href="{{ url('/delete_product',$product->id) }}">delete</a></td>
                        <td><a class="btn btn-success" href="{{ url('/update_product',$product->id) }}">edit</a></td>

                    </tr> 
                    @endforeach
                </table>


            </div>
        </div>
        
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    
    <!-- End custom js for this page -->
  </body>
</html>