<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{



    public function showRegisterForm()
    {
        return view('user.register');
    }
    public function showLoginForm(){
        return view('user.login');
    }
    public function logout()
    {
        Auth::logout();  
        session()->invalidate();  
        session()->regenerateToken();  
    
        return redirect()->route('login');  
    }


}
