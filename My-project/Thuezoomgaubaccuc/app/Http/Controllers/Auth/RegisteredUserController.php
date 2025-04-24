<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        
        
        $request->validate([
            'name' => ['required', 'string', 'max:255', 'unique:users,name'], 
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'], 
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'phone' => ['required', 'string', 'max:20', 'unique:users,phone'], 
            'avatar' => ['nullable', 'string'],
            'coin' => ['nullable', 'numeric', 'min:0'],
        ]);
    
       
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone, 
            'avatar' => $request->avatar, 
            'coin' => $request->coin ?? 0,
            'password' => Hash::make($request->password), 
        ]);
    
  
        event(new Registered($user));
    

    
        return redirect()->route('login')->with('success', 'Tạo tài khoản thành công!');
    }
    
}
