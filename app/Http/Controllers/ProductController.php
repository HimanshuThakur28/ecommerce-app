<?php

namespace App\Http\Controllers;

use App\Models\Product;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $products=Product::paginate(10);
        return response()->json($products->items());


    }

    public function show($id){
        $products=Product::findOrfail($id);
        return response()->json($products);


    }

    public function search(Request $request){
       $search=$request->input('query');
       $products=Product::where('name','LIKE',"%$search%")->get();
       return response()->json($products);


    }

}
