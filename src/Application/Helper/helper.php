<?php

if (! function_exists('payfastConfig')) {

    function payfastConfig(): array
    {
        return config('batsirai.gateway.payfast');
    }
}

if (! function_exists('currency')) {

    function currency($amount): string
    {
        return number_format( sprintf( '%.2f', $amount ), 2, '.', '' );
    }
}

if (! function_exists('initialiseValues')) {

    function initialiseValues($context): void
    {
        $configs = payfastConfig();

        foreach ($configs as $key => $config){
            if(!is_array($config) && property_exists($context, $key)) {
                $context->{$key} = $config;
            }
        }
    }
}
