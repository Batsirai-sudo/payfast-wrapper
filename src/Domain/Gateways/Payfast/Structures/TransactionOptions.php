<?php

namespace Batsirai\Gateway\Domain\Gateways\Payfast\Structures;

class TransactionOptions
{

    /**
     * TransactionOptions constructor.
     *
     *   Set if Buyer should receive email
     * @param bool $email_confirmation
     *   The address to send the confirmation email to.
     * @param string $confirmation_address
     */
    public function __construct(
        public bool $email_confirmation,
        public string $confirmation_address
    )
    {

    }
}
