<?php

namespace Batsirai\Gateway\Domain\Controller;

use Batsirai\Gateway\Domain\Contracts\PayfastDtoContract;
use Batsirai\Gateway\Domain\Contracts\PaymentGatewayContract;
use Batsirai\Gateway\Domain\Contracts\PaymentServiceContract;
use Illuminate\Contracts\View\View;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class PaymentController extends BaseController
{

    public function __construct(public PaymentServiceContract $service)
    {
    }

    public function payment(Request $request): View
    {
        return $this->service->gateway($request);
    }

    public function cancel(): View
    {
        return $this->service->response('cancel');
    }

    public function return(): View
    {
        return $this->service->response('return');
    }
}
