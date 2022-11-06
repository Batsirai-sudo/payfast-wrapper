<?php

namespace Batsirai\Gateway\Domain\Gateways\Payfast;


use Batsirai\Gateway\Domain\Gateways\Payfast\Structures\BuyerDetails;
use Batsirai\Gateway\Domain\Gateways\Payfast\Structures\RecurringBillingDetails;
use Batsirai\Gateway\Domain\Gateways\Payfast\Structures\TransactionDetails;
use Batsirai\Gateway\Domain\Gateways\Payfast\Structures\TransactionOptions;

class PayfastFormBuilder extends Payfast
{
    /**
     * @param BuyerDetails| $buyerDetails
     * @param TransactionDetails $transactionDetails
     * @param TransactionOptions $options
     * @param RecurringBillingDetails|null $recurringBillingDetails
     * @return string
     */
    public function build(
        BuyerDetails $buyerDetails,
        TransactionDetails $transactionDetails,
        TransactionOptions $options,
        RecurringBillingDetails $recurringBillingDetails = null ,
    ): string
    {
        $formStructures = [
            $this->merchant,
            $buyerDetails,
            $transactionDetails,
            $recurringBillingDetails,
            $options
        ];

        return '<form id="payment-form" action="'.$this->getUrl().'" method="POST">'
            .$this->render($formStructures)
            .'<input type="submit" value="Pay Now"></form>';
    }

    /**
     * @param array $structures
     * @return string
     */
    private function render(Array $structures) : string
    {
        $output = '';
        $attributes = [];

        foreach ($structures as $structure) {
            $elements = (Array) $structure;

            foreach ($elements as $name => $value) {
                if (null !== $value && !is_array($value) && $value !== '') {
                    $attributes[$name] = $value;
                    $output .= '<input type="hidden" name="' . $name . '" value="' . $value . '">';
                }elseif(is_array($value)){
                    foreach ($value as $key => $val) {
                        if(is_string($key)){
                            $attributes[$key] = $val;
                        }

                        $output .= '<input type="hidden" name="' . $key . '" value="' . $val . '">';
                   }
                }
            }
        }


        return $output . $this->appendSignature($attributes);
    }

    public function appendSignature($attributes): string
    {
        return '<input type="hidden" name="signature" value="' . (new Signature($attributes))->generate() . '">';
    }
}
