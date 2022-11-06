<?php

trait Payfast
{
    /**
     * @return string
     */
    public function getEnvironment(): string
    {
        return config('payfast.env');
    }
}
