<?php

namespace App\Services;

use Exception;
use Twilio\Rest\Client;
use Illuminate\Support\Facades\Log;

class OtpService
{
    protected $client;
    protected $fromNumber;

    public function __construct()
    {
        $twilioSid = env('TWILIO_SID');
        $twilioAuthToken = env('TWILIO_AUTH_TOKEN');
        $this->fromNumber = env('TWILIO_FROM');

        Log::info('Twilio SID: ' . $twilioSid); // Kiểm tra giá trị của TWILIO_SID

        if (!$twilioSid || !$twilioAuthToken || !$this->fromNumber) {
            throw new Exception("Twilio credentials are not set.");
        }

        $this->client = new Client($twilioSid, $twilioAuthToken);
    }


    public function sendOtp($phoneNumber, $otpCode)
    {
        return $this->client->messages->create(
            $phoneNumber,
            [
                'from' => $this->fromNumber,
                'body' => "Your OTP code is: $otpCode"
            ]
        )->sid;
    }
}
