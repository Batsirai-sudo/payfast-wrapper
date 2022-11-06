<?php

namespace Batsirai\Gateway\Domain\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * Class PayfastForm
 *
 * @package Batsirai\Gateway\Domain\Facades
 */
class PayfastForm extends Facade
{
    /**
     * Get the registered name of the component.
     */
    protected static function getFacadeAccessor(): string
    {
        return 'batsirai.gateway.payfast.form';
    }
}
