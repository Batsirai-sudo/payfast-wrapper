<?php

namespace Batsirai\Gateway\Domain\Controller;

use Batsirai\Gateway\Domain\Contracts\IPNServiceContract;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IPNController
{
    public function __construct(public IPNServiceContract $service)
    {
    }

    public function notification(Request $request): ResponseFactory|Application|Response
    {
        return response($this->service->process($request));
    }
}
