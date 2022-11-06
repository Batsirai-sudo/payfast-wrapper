<?php

return [
    'payfast' => [
        'merchant_id' => env('PAYFAST_MERCHANT_ID'),
        'merchant_key' => env('PAYFAST_MERCHANT_KEY'),
        'mode' => env('PAYFAST_MODE'),

        'sandbox_url' => 'https://sandbox.payfast.co.za/eng/process',
        'live_url' => 'https://www.payfast.co.za/eng/process',

        'return_url' => env('APP_URL').'/batsirai/return',
        'cancel_url' => env('APP_URL').'/batsirai/cancel',
        'notify_url' => env('APP_URL').'api/ipn',
        'passphrase' => env('PAYFAST_PASSPHRASE'),
        'fees' => 10
    ],
];
