<?php

namespace App\Http\Controllers;

use App\Models\ZoomAccount;
use Illuminate\Http\Request;

class ZoomAccountController extends Controller
{
    public function listzoompro(Request $request){

        $zoompros = ZoomAccount::all(); 
        $query = ZoomAccount::query();
         
        if ($request->has('id') && !empty($request->id)) {
            $query->where('id', $request->id);
        }

       
        if ($request->has('user') && !empty($request->user)) {
            $query->where('user', 'LIKE', '%' . $request->user . '%');
        }

        
 
        $zoompros = $query->paginate(10); 
        return view('zoompro.listzoompro', compact('zoompros'));
    }
    public function addzoompro(){



        return view('zoompro.addzoompro');
    }
    public function storezoompro(Request $request)
    {
        // Validate dữ liệu từ form
        $request->validate([
            'user' => 'required|string|max:255',
            'pass' => 'required|string|max:255',
            'key_host' => 'required|string|min:5',
            'zoom_client_secret' => 'required|string|max:255',
            'zoom_client_id' => 'required|string|max:255',
            'zoom_account_id' => 'required|string|max:255',
            'deadline' => 'required|date',  
            'type' => 'required|string|max:255',
            'status' => 'required|in:active,lock',  
        ]);
    
        // Tạo mảng dữ liệu trước khi lưu
        $zoomAccountData = [
            'user' => $request->user,
            'pass' => $request->pass,
            'key_host' => $request->key_host,
            'zoom_client_id' => $request->zoom_client_id,
            'zoom_account_id' => $request->zoom_account_id,
            'zoom_client_secret' => $request->zoom_client_secret,
            'deadline' => $request->deadline,
            'type' => $request->type,
            'status' => $request->status,
        ];

    
        ZoomAccount::create($zoomAccountData);
    
      
        return redirect()->route('listzoompro')->with('success', 'Thêm tài khoản thành công!');
    }
    public function editzoompro($id) {
        $zoompro = ZoomAccount::findOrFail($id); 
        return view('zoompro.editzoompro', compact('zoompro'));
    }
    public function update(Request $request, $id) {
        $request->validate([
            'user' => 'required|string|max:255',
            'pass' => 'required|string|max:255',
            'key_host' => 'required|string|min:5',
            'zoom_client_secret' => 'required|string|max:255',
            'zoom_client_id' => 'required|string|max:255',
            'zoom_account_id' => 'required|string|max:255',
            'deadline' => 'required|date',  
            'type' => 'required|string|max:255',
            'status' => 'required|in:active,lock',  
        ]);
    
        $zoompro = ZoomAccount::findOrFail($id);
    
    
        $zoompro->update([
            'user' => $request->user,
            'pass' => $request->pass,
            'key_host' => $request->key_host,
            'zoom_client_id' => $request->zoom_client_id,
            'zoom_account_id' => $request->zoom_account_id,
            'zoom_client_secret' => $request->zoom_client_secret,
            'deadline' => $request->deadline,
            'type' => $request->type,
            'status' => $request->status,
        ]);
    
        return redirect()->route('listzoompro')->with('success', 'Cập nhật thành công!');
    }
    public function destroy($id)
    {
        $zoompro = ZoomAccount::find($id);



        $zoompro->delete();

        return redirect()->route('listzoompro')->with('success', 'Xóa thành công!');
    }
}
