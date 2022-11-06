<?php

namespace Batsirai\Gateway\Domain\Services;

use Batsirai\Gateway\Domain\Contracts\IPNServiceContract;
use Batsirai\Gateway\Infrastructure\Services\AbstractService;

class IPNService extends AbstractService implements IPNServiceContract
{
    public function process($request): string
    {

        return 'Successfully';
    }
}
