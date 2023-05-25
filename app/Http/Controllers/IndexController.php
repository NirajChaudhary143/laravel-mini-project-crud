<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        $products = Product::with('category')->get();
        $customers = Category::with('products')->get();
        // $username = auth()->user()->name;
        return view('dashboard',compact('products','customers'));
    }
    public function addProduct(){
        return view('addProduct');
    }

    public function storeProduct(Request $request){
        $request->validate(
            [
                'product_name'=>'required',
                'category'=>'required'
            ]
            );

            $product = new Product();
            $product->product_name=$request['product_name'];
            $product->category_id = $request['category'];
            $res = $product->save();
            if($res){
                return redirect('/admin-panel')->with('success','Product Added Succesfully');
            }
            else{
                return redirect('/admin-panel')->with('fail','Product Not Added');
            }

    }
    public function deleteProduct($id){
        $product = Product::with('category')->where('product_id',$id)->first();
        if($product){
            $product->delete();
            return redirect('/admin-panel')->with('success','Product Deleted Succesfully');
        }
        else{
            return redirect('/admin-panel')->with('fail','The id you provided are not in database');
        }
    }

    public function editView($id){
        $product = Product::with('category')->where('product_id', $id)->first();

        if($product){
            return view('editProduct',compact('product'));
        }
        else{
            return redirect('/admin-panel')->with('fail','The id you entered not on database');
        }
    }

    public function update(Request $request, $id){
        $request->validate(
            [
                'category'=>'required',
                'product_name'=>'required',
            ]
            );
        $product = Product::with('category')->where('product_id', $id)->first();
        $product->product_name=$request['product_name'];
        $product->category_id=$request['category'];
        // echo ($product->category_id);
        // echo "<pre>";
        // print_r($product->toArray());
        $res= $product->save();
        if($res){
            return redirect('/admin-panel')->with('success','Product Edited Succefully');
        }
        // else{
        //     return redirect()->back();
        // }


    }
}