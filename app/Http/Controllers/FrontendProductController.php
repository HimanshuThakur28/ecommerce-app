<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendProductController extends Controller
{
    public function index(){
       return view('frontend.product');

    }

    public function show($id){
        $product_id=$id;
        
        return view('frontend.product_detail',compact('product_id'));
 
     }
}
