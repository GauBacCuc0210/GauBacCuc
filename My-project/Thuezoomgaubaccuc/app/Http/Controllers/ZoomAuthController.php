<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ZoomAuthController extends Controller
{
    public function getAccessToken()
    {
        $clientId = 'RTrYcxm1SjaoApmkdEr0g'; // Thay thế bằng client_id của bạn
        $clientSecret = 'tHG9M2BVwYT2H4BkyE4VOpbbsd6FeQuO'; // Thay thế bằng client_secret của bạn
        $accountId = 'VMES1BqQT2yacwMum_tKKQ'; // Thay thế bằng account_id của bạn
    
        $response = Http::asForm()->post('https://zoom.us/oauth/token', [
            'grant_type' => 'account_credentials',
            'account_id' => $accountId,
            'client_id' => $clientId,
            'client_secret' => $clientSecret,
        ]);
    
        if ($response->successful()) {
            // Lưu access token vào session hoặc cơ sở dữ liệu
            $accessToken = $response->json()['access_token'];
            return $accessToken;
        }
    
        return response()->json(['error' => 'Unable to get access token'], 400);
    }

public function createZoomMeeting()
{
    // Lấy access token từ session
    $accessToken = $this->getAccessToken();

    if (!$accessToken) {
        return response()->json(['error' => 'Access token not available'], 400);
    }

    // Thông tin cuộc họp Zoom
    $response = Http::withToken($accessToken)->post('https://api.zoom.us/v2/users/me/meetings', [
        'topic' => 'Test Zoom Meeting',  // Tiêu đề cuộc họp
        'type' => 2,  // Cuộc họp định sẵn (Scheduled)
        'start_time' => now()->addMinutes(10)->toIso8601String(),  // Thời gian bắt đầu
        'duration' => 30,  // Thời gian họp (30 phút)
        'timezone' => 'Asia/Ho_Chi_Minh',  // Múi giờ
        'agenda' => 'Test Zoom meeting agenda',  // Mô tả cuộc họp
    ]);

    // Kiểm tra nếu API Zoom trả về thành công
    if ($response->successful()) {
        return response()->json($response->json());  // Trả về thông tin cuộc họp mới tạo
    }

    return response()->json(['error' => 'Unable to create Zoom meeting'], 400);
}

    
    
    

}
