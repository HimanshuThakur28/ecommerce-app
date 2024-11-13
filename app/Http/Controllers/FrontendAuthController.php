<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendAuthController extends Controller
{
    public function showLoginForm(){
        return view ('frontend.auth.login');


    }

    public function showRegistrationForm(){
        return view ('frontend.auth.register');


    }

    public function logout(Request $request)
    {
      
        $request->session()->forget(['api_token']);
        $request->session()->flush();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/login')->with('success', 'Logged out successfully!');
    }
}
