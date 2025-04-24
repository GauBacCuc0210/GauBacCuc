<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
     public function handle(Request $request, Closure $next)
    {
        // Chỉ cần kiểm tra người dùng đã đăng nhập hay chưa
        if (Auth::check()) {
            return $next($request); // Nếu đã đăng nhập, cho phép tiếp tục
        }

        // Nếu chưa đăng nhập, chuyển hướng về trang login
        return redirect()->route('admin.login')->with('error', 'Bạn chưa đăng nhập!');
    }
    
}
