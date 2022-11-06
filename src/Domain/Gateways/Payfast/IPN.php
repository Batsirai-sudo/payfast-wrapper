<?php

namespace Batsirai\Gateway\Domain\Gateways\Payfast;

use Batsirai\Gateway\Domain\Gateways\Payfast\Constants\PaymentStatus;

class IPN
{
    public string $m_payment_id;
    public string $pf_payment_id;
    public string $payment_status;
    public string $item_name;
    public string $item_description;
    public string $amount_gross;
    public string $amount_fee;
    public string $amount_net;
    public string $name_first;
    public string $name_last;
    public string $email_address;
    public string $merchant_id;
    public string $signature;



    public function __construct($payload)
    {
        $this->setvalues($payload);
    }

    public function setvalues($payload): void
    {
        foreach ($payload as $key => $value){
            if(property_exists($this, $key)){
                $this->{$key} = $value;
            }
        }
    }

    public function transactionStatus(){
        switch ($this->payment_status){
            case PaymentStatus::COMPLETE:
                $this->complete();

                break;
            case PaymentStatus::CANCELLED:
                $this->cancelled();
                break;
        }
    }

    public function process(){
        return $this;
    }

    public function complete(){

    }

    public function cancelled(){

    }

}
