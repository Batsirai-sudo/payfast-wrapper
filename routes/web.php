<?php

use Batsirai\Gateway\Domain\Controller\PaymentController;
use Batsirai\Gateway\Domain\Gateways\Payfast\IPN;
use Illuminate\Support\Facades\Route;

Route::controller(PaymentController::class)->prefix('batsirai')->group(function () {
    Route::get('/gateway','payment');
    Route::get('/cancel','cancel');
    Route::get('/return','return');
});

Route::get('/testing', function (){
  $payload = [
    'm_payment_id' => 'SuperUnique1',
    'pf_payment_id' => '1089250',
    'payment_status' => 'COMPLETE',
    'item_name' => 'test+product',
    'item_description' => '',
    'amount_gross' => 200.00,
    'amount_fee' => -4.60,
    'amount_net' => 195.40,
    'custom_str1' => '',
    'custom_str2' => '',
    'custom_str3' => '',
    'custom_str4' => '',
    'custom_str5' => '',
    'custom_int1' => '',
    'custom_int2' => '',
    'custom_int3' => '',
    'custom_int4' => '',
    'custom_int5' => '',
    'name_first' => '',
    'name_last' =>'' ,
    'email_address' => '',
    'merchant_id' => '10012577',
    'signature' => 'ad8e7685c9522c24365d7ccea8cb3db7'
];

  dd((new IPN($payload))->process());
});
