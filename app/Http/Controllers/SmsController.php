<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class SmsController extends Controller
{
    public function sendSms(Request $request)
    {
        // Xác thực đầu vào
        $request->validate([
            'phone' => 'required|string', // Đảm bảo rằng số điện thoại là bắt buộc
        ]);

        $phone = $request->input('phone'); // Lấy số điện thoại từ request
        $otp = rand(100000, 999999); // Tạo OTP ngẫu nhiên

        // Lấy biến từ tệp cấu hình
        $testVariable = config('test.test_variable');
        $testSID = config('test.twilio.sid');

        // Ghi log để kiểm tra
        Log::info('Test Variable: ' . $testVariable);
        Log::info('Test SID: ' . $testSID);
        Log::info('Sending OTP: ' . $otp . ' to phone: ' . $phone);

        // Gửi OTP qua Twilio
        $twilioSid = env('TWILIO_SID');
        $twilioToken = env('TWILIO_AUTH_TOKEN');
        $twilioFrom = env('TWILIO_PHONE_NUMBER');

        $client = new \Twilio\Rest\Client($twilioSid, $twilioToken);

        try {
            $client->messages->create($phone, [
                'from' => $twilioFrom,
                'body' => "Your OTP code is: $otp"
            ]);

            // Ghi lại OTP vào log (để gỡ lỗi hoặc cho việc xác thực sau này)
            Log::info('OTP sent to ' . $phone . ': ' . $otp);

            return response()->json(['success' => true, 'message' => 'OTP sent succesFsfully!']);
        } catch (\Exception $e) {
            Log::error('Error sending OTP: ' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Failed to send OTP.'], 500);
        }
    }





}