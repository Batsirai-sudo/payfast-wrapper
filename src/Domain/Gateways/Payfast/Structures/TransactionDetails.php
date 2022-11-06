<?php

namespace Batsirai\Gateway\Domain\Gateways\Payfast\Structures;

use Batsirai\Gateway\Domain\Gateways\Payfast\Fees;

class TransactionDetails
{
    /**
     * TransactionDetails constructor.
     *
     *   Unique payment ID on the merchant’s system
     * @param string $m_payment_id
     *   The amount which the payer must pay in ZAR.
     * @param float $amount
     *   The name of the item being charged for.
     * @param string $item_name
     *   The description of the item being charged for.
     * @param string $item_description
     *   A series of 5 custom integer variables
     * @param string|null $custom_int1
     *   A series of 5 custom string variables
     * @param string|null $custom_str1
     */
    public function __construct(
        public string $m_payment_id,
        public float $amount,
        public string $item_name,
        public string $item_description,
        public ?string $custom_int1 = null,
        public ?string $custom_str1 = null
    ) {
        $this->feesCalculation();
    }

    public function feesCalculation(): void
    {
        $this->amount = app(Fees::class)->process($this->amount);

    }
}
