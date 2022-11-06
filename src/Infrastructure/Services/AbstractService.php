<?php

namespace Batsirai\Gateway\Infrastructure\Services;

use Illuminate\Contracts\View\View;

abstract class AbstractService
{
    public function response($view, $data=[]): View
    {
        return view('batsirai.gateway::'.$view, compact('data'));
    }
}
