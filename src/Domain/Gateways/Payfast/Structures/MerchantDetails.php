<?php

namespace Batsirai\Gateway\Domain\Gateways\Payfast\Structures;

class MerchantDetails
{
    /**
     * Merchant ID
     *
     * @var string
     */
    public string $merchant_id;

    /**
     * Merchant Key
     *
     * @var string
     */
    public string $merchant_key;

    /**
     * Merchant Routes
     *
     * @var array
     */
    public array $routes;

    /**
     * MerchantDetails constructor.
     */
    public function __construct() {
        $this->initialise();
        $this->routes = (new Routes())->getMerchantDetailsUrls(['return_url', 'cancel_url', 'notify_url']);
    }

    public function initialise(): void
    {
        initialiseValues($this);
    }
}
