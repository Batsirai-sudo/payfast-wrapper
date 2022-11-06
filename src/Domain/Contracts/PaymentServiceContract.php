<?php

namespace Batsirai\Gateway\Domain\Contracts;

use Batsirai\Gateway\Infrastructure\Contracts\AbstractServiceContract;

interface PaymentServiceContract extends AbstractServiceContract
{
    public function gateway($request);
}
