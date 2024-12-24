<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\OtpService;
use Illuminate\Support\Facades\Log;

class OTPController extends Controller
{
    protected $otpService;

    public function __construct(OtpService $otpService)
    {
        $this->otpService = $otpService;
    }

    public function sendOtpToUser(Request $request)
    {
        // Xác thực thông tin đầu vào
        $request->validate([
            'phone' => 'required|string|max:15',
        ]);

        // Tạo mã OTP
        $otpCode = rand(100000, 999999);
        $phoneNumber = $request->phone;

        Log::info('Twilio SID: ' . env('TWILIO_SID'));
        Log::info('Twilio Token: ' . env('TWILIO_TOKEN'));
        Log::info('Twilio Phone Number: ' . env('TWILIO_PHONE_NUMBER'));
        // Gửi OTP qua SMS
        try {
            $messageSid = $this->otpService->sendOtp($phoneNumber, $otpCode);
            return response()->json(['message' => 'OTP sent successfully', 'sid' => $messageSid]);
        } catch (\Exception $e) {
            Log::error('OTP sending failed: ' . $e->getMessage());
            return response()->json(['message' => 'Failed to send OTP', 'error' => $e->getMessage()], 500);
        }
    }
}
