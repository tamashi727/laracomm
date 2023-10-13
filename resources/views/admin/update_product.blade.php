<!DOCTYPE html>
<html lang="en">
  <head>
    <base href='/public'>
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
                    <form action={{ url('/update_product_confirm',$product->id) }} method="POST" enctype="multipart/form-data">
                        @csrf
                    <div class="div_design">
                    <label>title</label>
                    <input class="text_color" type="text" name="title" placeholder="write a title"  value="{{ $product->title }}"/>
                    </div>

                    <div class="div_design">
                        <label>description</label>
                        <input class="text_color" value="{{ $product->description }}"  type="text" name="description" placeholder="write a description"  />
                        </div>

                        <div class="div_design" >
                            <label>Price</label>
                            <input class="text_color" value="{{ $product->price }}"type="number" name="price" placeholder="price"  />
                            </div>

                            <div class="div_design">
                                <label>quantity</label>
                                <input class="text_color" value="{{ $product->quantity }}"type="number" min="0"  name="quantity" placeholder="write a quantity"  />
                                </div>
                                <div class="div_design">
                                    <label>discount price</label>
                                    <input class="text_color" value="{{ $product->discount_price }}"type="number" name="discount_price" placeholder="write a discount price" />
                                    </div>


                                    <div class="div_design">
                                        <label>Category</label>

                                        <select class="text_color" name="category" 
                                        >
                                            <option value="{{ $product->category }}" selected="">value="{{ $product->category }}" </option>
                                            @foreach($category as $category)
                                            <option value="{{ $category->category_name }}">{{ $category->category_name }}</option>
                                            @endforeach
                                        </select>
                                        
                                        </div>

                                        <div class="div_design">
                                            <label>Previous image</label>
                                        <img style="margin:auto;height:100px;width:200px;" src="/product/{{ $product->image }}"/>
                                            </div>

                                        <div class="div_design">
                                            <label>image</label>
                                            <input type="file" name="image"  />
                                            </div>

                                            <div>
                                               
                                                <input type="submit" value="Update product" class="btn btn-primary" />
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