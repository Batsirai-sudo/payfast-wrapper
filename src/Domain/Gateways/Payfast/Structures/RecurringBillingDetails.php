<?php

namespace Batsirai\Gateway\Domain\Gateways\Payfast\Structures;

use Illuminate\Support\Facades\Date;

class RecurringBillingDetails
{
    /**
     * @var int
     */
    public int $subscription_type;

    /**
     * @var Date
     */
    public string|Date $billing_date;

    /**
     * @var float
     */
    public float $recurring_amount;

    /**
     * @var int
     */
    public int $frequency;

    /**
     * @var string
     */
    public string|int $cycles;

    /**
     * RecurringBillingDetails constructor.
     * @param int $subscription_type
     * @param string $billing_date
     * @param float $recurring_amount
     * @param int $frequency
     * @param int $cycles
     */
    public function __construct(
        int $subscription_type,
        string $billing_date,
        float $recurring_amount,
        int $frequency,
        int $cycles
    ) {
        $this->subscription_type = $subscription_type;
        $this->billing_date = $billing_date;
        $this->recurring_amount = $recurring_amount;
        $this->frequency = $frequency;
        $this->cycles = $cycles;
    }
}
