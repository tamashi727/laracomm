<?php

namespace App\Http\Controllers;
use App\Models\Category;

use App\Models\Product;

use App\Models\Order;

use Illuminate\Http\Request;


use TCPDF;

class AdminController extends Controller
{
    public function view_category(){

        $data=category::all();

        return view('admin.category',compact('data'));
    }

    public function add_category(Request $request){
        $data=new category;
        $data->category_name=$request->category;
        $data->save();
        return redirect()->back()->with('message','category added successfully');
        
    }
    public function delete_category($id){
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message','data deleted');

    }

    public function view_product(){
        $category=category::all();

        return view('admin.product',compact('category'));
        
    }

    public function add_product(Request $request){

        $product=new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->category=$request->category;
        $product->quantity=$request->quantity;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;

        $product->save();
        return redirect()->back()->with('message','product added');


    }

    public function show_product(){

        $product=product::all();

        return view('admin.show_product',compact('product'));
        }

        public function delete_product($id){
            $product=product::find($id);
            $product->delete();
            return redirect()->back()->with('message','product deleted');

            
            }

            public function update_product($id){
                $product=product::find($id);
                $category=category::all();

                return view('admin.update_product',compact('product','category'));
            }
            public function update_product_confirm(Request $request,$id){
                $product=product::find($id);
                $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->category=$request->category;
        $product->quantity=$request->quantity;

        $image=$request->image;
        if($image){
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product',$imagename);
        $product->image=$imagename;
    }
        $product->save();
        return redirect()->back()->with('message','product updated');



            }

        public function order(){

            $order=order::all();

            return view('admin.order',compact('order'));
        }

        public function delivered($id){
            $order=order::find($id);
            $order->delivery_status="delivered";
            $order->payment_status="paid";
            $order->save();
            return redirect()->back();
        }

        public function print_pdf($id){
            $order=order::find($id);
            $html=view()->make('admin.pdf',compact('order'))->render();
            $filename = 'order_details.pdf';


          

            $pdf=new TCPDF();

             
           $pdf->SetTitle('order details');
           $pdf->AddPage();
           $pdf->writeHTML($html, true, false, true, false, '');

           $pdf->Output(public_path($filename), 'F');

        return response()->download(public_path($filename));

           

            
           
            

          



        }

        public function searchdata(Request $request){
            $searchText=$request->search;
            $order=order::where('name','LIKE',"%$searchText%")->orWhere('product_title','LIKE',"%$searchText%")->orWhere('phone','LIKE',"%$searchText%")->get();
            return view('admin.order',compact('order'));


        }
}
