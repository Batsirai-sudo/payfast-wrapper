<?php

namespace Batsirai\Gateway\Domain\Gateways\Payfast\Structures;

class Routes
{
    /**
     * The URL where the user is returned to after payment has been successfully taken.
     *
     * @var string
     */
    public string $return_url;

    /**
     * The URL where the user should be redirected should they choose to cancel their payment
     *
     * @var string
     */
    public string $cancel_url;

    /**
     * The URL which is used by PayFast to post the ITN
     *
     * @var string
     */
    public string $notify_url;

    /**
     * Live Payfast URL
     *
     * @var string
     */
    public string $live_url;

    /**
     * Sandbox Payfast URL
     *
     * @var string
     */
    public string $sandbox_url;

    public function __construct()
    {
        $this->initialise();
    }

    public function initialise(): void
    {
        initialiseValues($this);
    }

    public function mode(): string
    {
        return payfastConfig()['mode'] === 'live' ? $this->live_url : $this->sandbox_url;
    }

    public function getMerchantDetailsUrls($merchant_urls): array
    {
        $temp = [];
        foreach ($merchant_urls as $merchant_url){
            $temp[$merchant_url] = $this->{$merchant_url};
        }
        return $temp;
    }
}
