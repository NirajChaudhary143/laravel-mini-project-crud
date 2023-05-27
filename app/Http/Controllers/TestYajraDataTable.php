<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
Use Yajra\DataTables\Facades\DataTables;

class TestYajraDataTable extends Controller
{
    public function product(){
        return view('newYajraTable');
    }
    public function getProductData(){
        return Datatables::of(Product::query())->make(true);
        // if($request->ajax()){
        //     $data = Product::latest()->get();
        //     return Datatables::of($data)
        //     ->addIndexColumn()
        //     ->addColumn('action',function($row){
        //         $actionBtn = '<a href="javascript:void(0);" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0);" class="edit btn btn-danger btn-sm">Delete</a>';
        //         return $actionBtn;
        //     })
        //     ->rowColumns(['action'])
        //     ->make(true);
        // }
    }

}
