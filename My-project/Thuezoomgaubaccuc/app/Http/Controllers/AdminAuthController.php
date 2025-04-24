<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\Admins;
class AdminAuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }


    public function login(Request $request)
    {
       

        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
    
        $admin = Admins::where('username', $credentials['username'])->first();
    
        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            Auth::guard('admin')->login($admin); // Đăng nhập bằng guard 'admins'
            return redirect()->route('admin.dashboard');
        }
        
    
        return back()->withErrors(['username' => 'Sai tài khoản hoặc mật khẩu!']);
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
    public function listadmins(Request $request){

        $admins = Admins::all(); 
        $query = Admins::query();
         
        if ($request->has('id') && !empty($request->id)) {
            $query->where('id', $request->id);
        }

       
        if ($request->has('username') && !empty($request->username)) {
            $query->where('username', 'LIKE', '%' . $request->username . '%');
        }

        
        if ($request->has('email') && !empty($request->email)) {
            $query->where('email', 'LIKE', '%' . $request->email . '%');
        }

        $admins = $query->paginate(10); 
        return view('admin.listadmins', compact('admins'));
    }
    public function addadmins(){


        return view('admin.addadmins');
    }
    public function storeAdmin(Request $request)
    {
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|email|unique:admins,email',
            'password' => 'required|string|min:6',
        ]);
    
   
        $adminData = [
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'type' => 'user', 
        ];
    
      
    
      
        Admins::create($adminData);
    
        return redirect()->route('listadmins')->with('success', 'Thêm tài khoản thành công!');
    }
    public function editadmins($id) {
        $admin = Admins::findOrFail($id); 
        return view('admin.editadmins', compact('admin'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'password' => 'nullable|string|min:6', // Đặt mật khẩu là nullable nếu không thay đổi
            'email' => 'required|email|unique:admins,email,' . $id,
        ]);
    
        $admin = Admins::findOrFail($id);
    
        // Chỉ cập nhật email và mật khẩu nếu có thay đổi
        $admin->update([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $admin->password,
            'type' => $request->type,
        ]);
    
        return redirect()->route('listadmins')->with('success', 'Cập nhật thành công!');
    }
    
    
    
    public function destroy($id)
    {
        $admin = Admins::find($id);

        if (!$admin || $admin->username === 'gaubaccuc') {
            return redirect()->route('listadmins')->with('error', 'Không thể xóa tài khoản này!');
        }

        $admin->delete();

        return redirect()->route('listadmins')->with('success', 'Xóa tài khoản thành công!');
    }
}
