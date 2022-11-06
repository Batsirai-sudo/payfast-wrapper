<?php

namespace Batsirai\Gateway\Domain\Gateways\Payfast;

class Fees
{
    public function getFees(){
       return payfastConfig()['fees'];
    }

    public function calculate($amount): float
    {
        return (($this->getFees()/100) * $amount) + $amount;
    }

    public function process($amount): float{
        return (float) currency($this->calculate($amount));
    }
}
