<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Http;
use App\Models\Room;
use App\Models\Order;
use App\Models\ZoomAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::latest()->paginate(10);
        return view('rooms.index', compact('rooms'));
    }
    public function createRoom(Request $request)
    {
        $orderId = $request->get('order_id');
       
        $order = Order::findOrFail($orderId);
    
        $user = $order->user;
     
        
        $defaultTopic = 'Phòng họp của ' . $user->name;
        $defaultStartTime = now()->format('H:i Y-m-d '); 
        $defaultPass = str_pad(rand(0, 999999), 6, '0', STR_PAD_LEFT);
    
        return view('rooms.createRoom', compact('order', 'defaultTopic', 'defaultStartTime', 'defaultPass'));
    }
    
    public function store(Request $request)
    {
       

        $validated = $request->validate([
            'topic' => 'required|string',
            'pass' => 'required|string',
            'idRoom' => 'required|int',
            'id_order'=>'required|int',
            'start_time' => 'required|date',
            'input_pass' => 'required|in:0,1',
            'extend_time_use' => 'nullable|in:0,1', 
        ]);
        $startTime = \Carbon\Carbon::parse($validated['start_time'])->toIso8601String();
        
        
      
        $zoomAccount = ZoomAccount::where('status', 'active')->inRandomOrder()->first();

   
    
        $tokenResponse = Http::asForm()->withHeaders([
            'Authorization' => 'Basic ' . base64_encode($zoomAccount->zoom_client_id . ':' . $zoomAccount->zoom_client_secret)
        ])->post('https://zoom.us/oauth/token', [
            'grant_type' => 'account_credentials',
            'account_id' => $zoomAccount->zoom_account_id,
        ]);
    
        $accessToken = $tokenResponse->json()['access_token'];  
    
       
        $zoomResponse = Http::withToken($accessToken)->post('https://api.zoom.us/v2/users/me/meetings', [
            'topic' => $validated['topic'],
            'type' => 2, 
            'start_time' => $startTime,
            'password' => $validated['input_pass'] == '1' ? $validated['pass'] : '',
            'settings' => [
                'join_before_host' => true,
                'host_video' => true,
                'participant_video' => true,
                'password' => $validated['input_pass'] == '1' ? true : false,
            ],
        ]);
        
    
        $zoomData = $zoomResponse->json();  
       
        $room = new Room();
        $room->id_user = auth()->id(); 
        $room->id_order = request()->get('order_id');
        $room->id_zoom = $validated['idRoom']; 
        $room->info = json_encode([
            'topic' => $validated['topic'],
            'id_zoom' => $zoomData['id'],
            'password' => $validated['pass'],
            'start_url' => $zoomData['start_url'],
            'join_url' => $zoomData['join_url'],
            'participant_join_url' => $zoomData['participant_join_url'] ?? null,
            'admin_join_url' => $zoomData['admin_join_url'] ?? null,
            'input_pass' => $validated['input_pass'] ?? 1,
            'extend_time_use' => $validated['extend_time_use'] ?? 1
        ]);
        $room->id_order = $validated['id_order'];

        $room->link = $zoomData['join_url'];
        $room->save();
        $meetingDetailsResponse = Http::withToken($accessToken)
        ->get("https://api.zoom.us/v2/meetings/{$zoomData['id']}");
        $meetingDetails = $meetingDetailsResponse->json();
        $hostKey = $meetingDetails['host_key'] ?? null;
       
        $roomInfo = json_decode($room->info, true);
      
        return view('rooms.room', [
            'room' => $room,
            'roomInfo'=>$roomInfo,
            'hostKey' => $hostKey,
        ]);
    }
    
    public function show($id)
{
    $room = Room::find($id);

    if (!$room) {
        return redirect()->route('rooms.index')->with('error', 'Phòng họp không tồn tại');
    }

    // Giải mã JSON trong trường 'info' nếu có
    $roomInfo = json_decode($room->info, true); // Chuyển thành mảng

    return view('rooms.room', compact('room', 'roomInfo'));
}


}
