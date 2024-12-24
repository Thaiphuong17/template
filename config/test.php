<?php

return [
    'test_variable' => env('TEST_VARIABLE', 'default_value'),
    'twilio' => [
        'sid' => env('TWILIO_SID'),
        'auth_token' => env('TWILIO_AUTH_TOKEN'),
        'phone_number' => env('TWILIO_PHONE_NUMBER'),
    ],
];

