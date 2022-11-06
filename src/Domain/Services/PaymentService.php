<?php

namespace Batsirai\Gateway\Domain\Services;

use Batsirai\Gateway\Domain\Contracts\PayfastDtoContract;
use Batsirai\Gateway\Domain\Contracts\PaymentServiceContract;
use Batsirai\Gateway\Infrastructure\Services\AbstractService;
use Illuminate\Contracts\View\View;

class PaymentService extends AbstractService implements PaymentServiceContract
{
    public function __construct(public PayfastDtoContract $payfastDto)
    {
    }

    public function gateway($request): View
    {
        return $this->response('redirect', $this->payfastDto->process($request));
    }
}
