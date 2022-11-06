Getting Started

Config

publish default configuration file.

php artisan vendor:publish<br><br>
IMPORTANT: You will need to edit App\Http\Middleware\VerifyCsrfToken by adding the route, which handles the ITN response to the $excepted array. Validation is done via the ITN response.
```php
<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
      '/payment/itn' // Your Itn Route
    ];
}

```

```php
PAYFAST_MERCHANT_ID = Your Payfast Merchant Id
PAYFAST_MERCHANT_KEY = Your Payfast Merchant Key
PAYFAST_MERCHANT_PASSPHRASE = Your Payfast Passphrase
PAYFAST_TESTING = True Or False
PAYFAST_URL_ITN = "${APP_URL}/payment/itn"
PAYFAST_URL_RETURN = "${APP_URL}/payment/return"
PAYFAST_URL_CANCEL = "${APP_URL}/payment/cancel"
```
```php

// controller
    try {     
        $payfast = new PayFastPayment();

        $data = [
            'amount' => '100.00',
            'item_name' => 'Order#123'
        ];

        $htmlForm = $payfast->createFormFields($data, ['value' => 'PAY NOW', 'class' => 'btn btn-primary btn-sm']);
    } catch(Exception $e) {
        echo 'There was an exception: '.$e->getMessage();
    }

    return view('welcome',compact('htmlForm'));

   if you havent set up your env you can pass array

  $payfast = new PayFastPayment([
                'merchantId' => '10000100',
                'merchantKey' => '46f0cd694581a',
                'passPhrase' => '',
                'testMode' => true
            ]);       
   {!! $htmlForm !!}

<form action="https://sandbox.payfast.co.za/eng/process" method="post">
    <input name="merchant_id" type="hidden" value="10000100">
    <input name="merchant_key" type="hidden" value="46f0cd694581a">
    <input name="return_url" type="hidden" value="http://PayfastTest.test/payment/success">
    <input name="cancel_url" type="hidden" value="http://PayfastTest.test/payment/cancel">
    <input name="notify_url" type="hidden" value="http://PayfastTest.test/payment/itn">
    <input name="amount" type="hidden" value="100.00">
    <input name="item_name" type="hidden" value="Order#123">
    <input name="signature" type="hidden" value="51a97ee711960d3605f1386f5c0f70f6">
    <input type="submit" value="PAY NOW" class="btn btn-primary btn-sm">
</form>

  header( 'HTTP/1.0 200 OK' );
  flush();

    $data = [

            'm_payment_id' => '1234',
            'pf_payment_id' => '1221576',
            'payment_status' =>'COMPLETE',
            'item_name' =>'Order#123',
            'item_description' =>'',
            'amount_gross' =>'10.00',
            'amount_fee' =>'-0.23',
            'amount_net' =>'9.77',
            'custom_str1' =>'',
            'custom_str2' =>'',
            'custom_str3' =>'',
            'custom_str4' =>'',
            'custom_str5' =>'',
            'custom_int1' =>'',
            'custom_int2' =>'',
            'custom_int3' =>'',
            'custom_int4' =>'',
            'custom_int5' =>'',
            'name_first' =>'First Name',
            'name_last' =>'Last Name',
            'email_address' =>'test@test.com',
            'merchant_id' =>'10000100',
            'signature' =>'93db1c63dc397361ab6b05e36fd73125'
        ];

        $notification = $payfast->notification->isValidNotification($_POST, ['amount_gross' => "10.00"]);

        if($notification === true) {
        // All checks have passed, the payment is successful       
        } else {
        // Some checks have failed, check payment manually and log for investigation -> PayFastPayment::$errorMsg       
        }
        } catch(Exception $e) {
            // Handle exception
            // dd('There was an exception: '.$e->getMessage());
        };
```
