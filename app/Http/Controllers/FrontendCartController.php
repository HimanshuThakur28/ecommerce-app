<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendCartController extends Controller
{
    public function index()
    {
        $cart = session()->get('cart', []);
        return view('frontend.cart', compact('cart'));
    }

    public function add(Request $request)
    {
       
        $cart = session()->get('cart', []);
    
      
        $product = [
            "name" => $request->input('name'),
            "description" => $request->input('description'),
            "price" => $request->input('price')
        ];
    
        $cart[] = $product;
      
        session()->put('cart', $cart);
   
        return response()->json([
            'success' => true,
            'message' => 'Product added to cart!',
            'cart' => $cart
        ]);
    }
    
}
