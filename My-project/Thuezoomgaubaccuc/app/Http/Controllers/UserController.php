<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\History;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $users = User::all();
        $query = User::query();   
        if ($request->has('id') && !empty($request->id)) {
            $query->where('id', $request->id);
        }

       
        if ($request->has('type') && !empty($request->type)) {
            $query->where('type', 'LIKE', '%' . $request->type . '%');
        }

        $users = $query->paginate(10); 
        return view('user.index', compact('users'));
    }
    public function topupForm(User $user)
    {
        return view('user.topup', compact('user'));
    }
    
    public function topup(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $amount = $request->input('amount');
        $note = $request->input('note'); // nhận lý do cộng
    
        $user->coin += $amount;
        $user->save();
    
        History::create([
            'user_id' => $user->id,
            'time' => now(),
            'numbercoin' => $user->coin,
            'numbercoinmanager' => $amount,
            'type' => 'plus',
            'note' => $note ?? 'Nạp tiền vào tài khoản',
            'type_note' => 'plus_admin',
        ]);
    
        return redirect()->route('index.listuser')->with('success', 'Nạp tiền thành công');
    }
    
    public function deductForm(User $user)
{
    return view('user.deduct', compact('user'));
}

public function deduct(Request $request, $id)
{
    $user = User::findOrFail($id);
    $amount = $request->input('amount');
    $note = $request->input('note'); // nhận lý do cộng

    $user->coin -= $amount;
    $user->save();

    History::create([
        'user_id' => $user->id,
        'time' => now(),
        'numbercoin' => $user->coin,
        'numbercoinmanager' => $amount,
        'type' => 'minus',
        'note' => $note ?? 'Trừ tiền vào tài khoản',
        'type_note' => 'minus_admin',
    ]);

    return redirect()->route('index.listuser')->with('success', 'Trừ tiền thành công');
}


public function changePasswordForm(User $user)
{
    return view('user.change-password', compact('user'));
}

public function changePassword(Request $request, User $user)
{
    $request->validate([
        'password' => 'required|min:6|confirmed',
    ]);

    $user->password = Hash::make($request->password);
    $user->save();

    return redirect()->route('index.listuser')->with('success', 'Đổi mật khẩu thành công!');
}
}
