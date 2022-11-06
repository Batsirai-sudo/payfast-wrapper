<?php

namespace Batsirai\Gateway\Domain\Gateways\Payfast;

class Signature
{
    protected array $attributes;
    protected ?string $passphrase;




    public function __construct(array $attributes)
    {
        $this->attributes = $attributes;
        $this->passphrase = payfastConfig()['passphrase'];
    }

    public function generate(bool $sort = false): string
    {
        return md5($this->attributes($sort));
    }

    protected function attributes(bool $sort = false): string
    {
        $attributes = $this->attributes;

        if( $this->passphrase !== null ) {
              $attributes['passphrase'] = $this->passphrase;
        }

        array_walk($attributes, static function (&$value, $key) {
            $value = $key.'='.urlencode(trim((string)$value));
        });

        if ($sort) {
            ksort($attributes);
        }

        return implode(
            '&',
            array_values($attributes)
        );
    }
}
