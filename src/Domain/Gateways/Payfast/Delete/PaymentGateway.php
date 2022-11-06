<?php

namespace Batsirai\Gateway;

use Batsirai\Gateway\Domain\Contracts\GatewayContract;

class PaymentGateway implements GatewayContract
{
    public function make(){

    }

    public function process()
    {
        // TODO: Implement process() method.
    }

    public function production()
    {
        // TODO: Implement sandbox() method.
    }

    public function sandbox()
    {
        // TODO: Implement sandbox() method.
    }

    public function ipn()
    {
        // TODO: Implement ipn() method.
    }

    public function fees()
    {
        // TODO: Implement fees() method.
    }

    public function paymentMethod()
    {
        // TODO: Implement paymentMethod() method.
    }

    public function transaction()
    {
        // TODO: Implement transaction() method.
    }
}
