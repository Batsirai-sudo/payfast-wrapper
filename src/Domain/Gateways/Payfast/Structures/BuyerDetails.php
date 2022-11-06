<?php

namespace Batsirai\Gateway\Domain\Gateways\Payfast\Structures;

/**
 * Class BuyerDetails
 *
 * @package Batsirai\Gateway\Domain\Gateways\Payfast\Structures
 */
class BuyerDetails
{
    /**
     * BuyerDetails constructor.
     *
     *   The buyer’s first name.
     * @param string $name_first
     *   The buyer’s last name.
     * @param string $name_last
     *   The buyer’s email address
     * @param string $email_address
     *   The buyer’s valid cell number
     * @param string $cell_number
     */
    public function __construct(
        public string $name_first,
        public string $name_last,
        public string $email_address,
        public string $cell_number
    )
    {

    }
}
