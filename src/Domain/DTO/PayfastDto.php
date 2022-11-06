<?php

namespace Batsirai\Gateway\Domain\DTO;

use Batsirai\Gateway\Domain\Contracts\PayfastDtoContract;
use Batsirai\Gateway\Domain\Facades\PayfastForm;
use Batsirai\Gateway\Domain\Gateways\Payfast\Structures\BuyerDetails;
use Batsirai\Gateway\Domain\Gateways\Payfast\Structures\TransactionDetails;
use Batsirai\Gateway\Domain\Gateways\Payfast\Structures\TransactionOptions;
use Illuminate\Http\Request;

class PayfastDto implements PayfastDtoContract
{
    public array $buyerDetailsParameters = [
        'name_first',
        'name_last',
        'email_address',
        'cell_number'
    ];
    public array $transactionDetailsParameters = [
        'm_payment_id',
        'amount',
        'item_name',
        'item_description',
        'custom_int1',
        'custom_str1',
    ];
    public array $transactionOptionsParameters = [
        'email_confirmation',
        'confirmation_address'
    ];

    public array $payload;

    public function fake(){
        return [
            "firstname"=> "firstname",
            "lastname"=> "lastname",
            "email"=> "email@gmail.com",
            "amount"=> 567,
            "name"=> "item_name",
            "description"=> "item_name",
            "payment_id"=> "1234567890",
            "phone"=> "0671254408"
        ];
    }
    public function process(Request $request): string
    {
//       $data = $request->all();
       $data = $this->fake();

       $this->payload = [
         'name_first' => $data['firstname'],
         'name_last' => $data['lastname'],
         'email_address' => $data['email'],
         'cell_number' => $data['phone'],
         'm_payment_id' => $data['payment_id'],
         'amount' => $data['amount'],
         'item_name' => $data['name'],
         'item_description' => $data['description'],
         'custom_int1' => $data['custom_value1'] ?? '',
         'custom_str1' => $data['custom_value2'] ?? '',
         'email_confirmation' => true,
         'confirmation_address' => $data['email'],
       ];

        return $this->build();
    }

    public function build(): string
    {
        return PayfastForm::build(
            (new BuyerDetails(...$this->getValues($this->buyerDetailsParameters))),
            (new TransactionDetails(...$this->getValues($this->transactionDetailsParameters))),
            (new TransactionOptions(...$this->getValues($this->transactionOptionsParameters)))
        );
    }

    /**
     * @param $data
     * @return array
     */
    public function getValues($data): array
    {
        $temp = [];
        foreach ($data as $val){
            if(isset($this->payload[$val])){
                $temp[] = $this->payload[$val];
            }
        }
        return $temp;
    }
}
