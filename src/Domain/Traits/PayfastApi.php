<?php

use AubreyKodar\Payfast\Facades\PayfastAPI as api;

trait PayfastApi
{
    public function ping()
    {
        return api::ping();
    }
}
