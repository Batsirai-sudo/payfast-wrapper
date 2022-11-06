<?php

namespace Batsirai\Gateway\Domain\Contracts;

interface IPNServiceContract
{
    public function process($request);
}
