<?php

return [

    'otp' => [

        // OTP expiry in seconds
        'expiry' => (int) env('OTP_EXPIRY', 300),

        // User can request OTP again after these seconds
        'cooldown' => (int) env('OTP_COOLDOWN', 30),

        // Maximum OTP resend attempts
        'max_resend' => (int) env('OTP_MAX_RESEND', 3),

        // Return OTP in API only in local environment
        'show_in_response' => env('OTP_SHOW_IN_RESPONSE', false),

    ],

];
