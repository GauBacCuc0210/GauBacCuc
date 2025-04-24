<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('user.login');
    }

    public function login(Request $request)
    {
   
        $request->validate([
            'phone' => 'required|string|exists:users,phone',
            'password' => 'required|string|min:6',
        ]);

   
        $user = User::where('phone', $request->phone)->first();

   
        if ($user && Hash::check($request->password, $user->password)) {
        
            Auth::login($user);

          
            return redirect()->route('user.welcome')->with('success', 'Đăng nhập thành công');
        }

        return back()->withErrors(['phone' => 'Số điện thoại hoặc mật khẩu không chính xác.']);
    }



    
}
