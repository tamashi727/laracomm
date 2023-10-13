<!DOCTYPE html>
<html lang="en">
  <head>
    @include('admin.css')

    <style type="text/css">
    .div_center{
        text-align:center;
        padding-top:40px;

    }
    .font_size{
        font-size:40px;
        padding-bottom:40px;
    }
    .text_color{
        color:black;
        padding-bottom:20px;

    }
    label{
        display:inline-block;
        width:200px;
    }
    .div_design{
        padding-bottom:15px;
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
                <div class="div_center">
                    @if(session()->has('message'))
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
                            X</button>
                        {{ session()->get('message') }}
                    </div>
    
                    @endif

                    <h1 class="font_size">Add product</h1>
                    <form action="/add_product" method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="div_design">
                    <label>title</label>
                    <input class="text_color" type="text" name="title" placeholder="write a title" required=""/>
                    </div>

                    <div class="div_design">
                        <label>description</label>
                        <input class="text_color" type="text" name="description" placeholder="write a description" required="" />
                        </div>

                        <div class="div_design" >
                            <label>Price</label>
                            <input class="text_color" type="number" name="price" placeholder="price" required="" />
                            </div>

                            <div class="div_design">
                                <label>quantity</label>
                                <input class="text_color" type="number" min="0"  name="quantity" placeholder="write a quantity" required="" />
                                </div>
                                <div class="div_design">
                                    <label>discount price</label>
                                    <input class="text_color" type="number" name="discount_price" placeholder="write a discount price" />
                                    </div>


                                    <div class="div_design">
                                        <label>Category</label>
                                        <select class="text_color" name="category" required="">
                                            <option value="" selected="">category here</option>
                                            @foreach($category as $category)
                                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        </div>

                                        <div class="div_design">
                                            <label>image</label>
                                            <input type="file" name="image" required="" />
                                            </div>

                                            <div>
                                               
                                                <input type="submit" value="add product" class="btn btn-primary" />
                                                </div>
                                            </form>
                </div>


            </div>
        </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    @include('admin.script')
    
    <!-- End custom js for this page -->
  </body>
</html>