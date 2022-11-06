<?php

namespace Batsirai\Gateway\Infrastructure\Contracts;

interface AbstractServiceContract
{
    public function response($view, $data=[]);

    public function goodSugar();
}
