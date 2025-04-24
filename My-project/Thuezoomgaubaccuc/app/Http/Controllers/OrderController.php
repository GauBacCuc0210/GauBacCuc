<?php

namespace App\Http\Controllers;
use App\Models\Price;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\ZoomAccount;
use App\Models\History;
use App\Models\Room;
use Carbon\Carbon;
class OrderController extends Controller
{
    public function listorder(Request $request){

        $userId = Auth::id();
        $orders = Order::where('user_id', $userId)->orderBy('created_at', 'asc')->get();
        $zoom100 = ZoomAccount::where('type', 100)->where('status', 'active')->count();
        $zoom300 = ZoomAccount::where('type', 300)->where('status', 'active')->count();
        $zoom500 = ZoomAccount::where('type', 500)->where('status', 'active')->count();
        $zoom1000 = ZoomAccount::where('type', 1000)->where('status', 'active')->count();
 
        $query = Order::query();
         
        if ($request->has('id') && !empty($request->id)) {
            $query->where('id', $request->id);
        }

        $orders = $query->with('room')->paginate(10);
        $rooms = Room::get(['id', 'id_order']);
        $roomsByOrderId = $rooms->keyBy('id_order');
        return view('order.listorder', compact('zoom100', 'zoom300', 'zoom500', 'zoom1000','orders','roomsByOrderId'));
    }
    public function createorder() {
        $zoom100 = ZoomAccount::where('type', 100)->where('status', 'active')->count();
        $zoom300 = ZoomAccount::where('type', 300)->where('status', 'active')->count();
        $zoom500 = ZoomAccount::where('type', 500)->where('status', 'active')->count();
        $zoom1000 = ZoomAccount::where('type', 1000)->where('status', 'active')->count();
        $zoomPrices = Price::where('type', 100)->distinct('type')->get();
        return view('order.createorder', compact('zoom100', 'zoom300', 'zoom500', 'zoom1000','zoomPrices'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|integer',
            'numberhouse' => 'required|numeric',
            'extend_time_use' => 'required|in:0,1',
        ]);
    
        $user = Auth::user();
        $type = (int) $validated['type'];
        $hour = (int) $validated['numberhouse'];
        $autoExtend = (string) $validated['extend_time_use'];
    

        $price = Price::where('type', $type)->where('hour', $hour)->first()?->price ?? 0;

        if ($user->coin < $price) {
            return back()->with('error', 'Số dư không đủ để tạo đơn hàng');
        }
    
     
        $user->coin -= $price;
        $user->save();
    
      
        History::create([
            'user_id' => $user->id,
            'time' => now(),
            'numbercoin' => $user->coin, 
            'numbercoinmanager' => $price,
            'type' => 'minus',
            'note' => 'Thuê phòng Zoom',
            'type_note' => 'minus_order',
        ]);
    

        $zoomAccount = ZoomAccount::where('type', $type)->inRandomOrder()->first();
        if (!$zoomAccount) {
            return back()->with('error', 'Không tìm thấy tài khoản Zoom phù hợp');
        }
    
     
        $order = new Order();
        $order->user_id = $user->id;
        $order->numberhouse = $hour;
        $order->datestart = Carbon::now();
        $order->dateend = Carbon::now()->addHours($hour);
        $order->type = $type;
        $order->price = $price;
        $order->idRoom = $zoomAccount->id;
        $order->extend_time_use = $autoExtend;
    
        $order->save();
    
        return redirect()->route('listorder')->with('success', 'Tạo đơn hàng thành công');
    }
    
    
    

}
