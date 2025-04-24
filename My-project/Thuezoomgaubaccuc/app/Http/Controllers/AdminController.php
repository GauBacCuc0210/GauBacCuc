<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function showLoginForm()
    {
        return view('user.login');
    }
    public function showregisterform() {
        return view('user.register');
    }
    public function showforgotform(){
        return view('user.forgot');
    }
    public function showresetPassword(){
        return view('user.resetPassword');
    }
    public function login(){

    }
}
