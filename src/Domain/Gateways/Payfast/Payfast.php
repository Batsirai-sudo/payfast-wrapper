<?php

namespace Batsirai\Gateway\Domain\Gateways\Payfast;

use Batsirai\Gateway\Domain\Contracts\PaymentGatewayContract;
use Batsirai\Gateway\Domain\Gateways\Payfast\Structures\MerchantDetails;
use Batsirai\Gateway\Domain\Gateways\Payfast\Structures\Routes;
use Carbon\Carbon;

class Payfast implements PaymentGatewayContract
{
    /**
     * Payfast constructor.
     * @param MerchantDetails $merchant
     * @param array $routes
     */
    public function __construct(
        protected MerchantDetails $merchant,
        protected array $routes = []
    )
    {
        $this->routes = $merchant->routes;
    }

    protected function getUrl(): string
    {
        return (new Routes)->mode();
    }

    public function getHeaders(): array
    {
        return [
            'Accept'=>'application/json',
            'merchant-id'=> $this->merchant->merchant_id,
            'version'=>'v1',
            'timestamp'=>$this->getTimeStamp(),
            'signature'=>''
        ];
    }
    public function getTimeStamp(): string
    {
        return Carbon::now()->format('Y-m-d H:i');
    }
    //amount=60&cycles=0&frequency=3&item_description=Hosting&item_name=Website+hosting&merchant-id=10012195&passphrase=AubreyIsKing12nowimpissed&timestamp=2019-03-28+20%3A12&version=v1
}


