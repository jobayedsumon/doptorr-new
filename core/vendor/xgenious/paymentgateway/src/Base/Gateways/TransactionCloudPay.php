<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Xgenious\Paymentgateway\Base\PaymentGatewayHelpers;
use Xgenious\Paymentgateway\Traits\ConvertUsdSupport;
use Xgenious\Paymentgateway\Traits\CurrencySupport;
use Xgenious\Paymentgateway\Traits\PaymentEnvironment;

class TransactionCloudPay extends PaymentGatewayBase
{
    use CurrencySupport,ConvertUsdSupport,PaymentEnvironment;
    public $apiLogin;
    public $apiPassword;
    public $productID;


    public function getApiLogin(){
        return $this->apiLogin;
    }
    public function setApiLogin($apiLogin){
        $this->apiLogin = $apiLogin;
        return $this;
    }

    public function getProductID(){
        return $this->productID;
    }
    public function setProductID($productID){
        $this->productID = $productID;
        return $this;
    }
    public function getApiPassword(){
        return $this->apiPassword;
    }
    public function setApiPassword($apiPassword){
        $this->apiPassword = $apiPassword;
        return $this;
    }

    public function charge_amount($amount)
    {
        if (in_array($this->getCurrency(), $this->supported_currency_list())){
            return $amount;
        }
        return $this->get_amount_in_usd($amount);
    }

    public function ipn_response(array $args = [])
    {
        //todo:: retrieve transaction by transaction id
        if (empty(request()->get("id"))){
            abort(500,__("transaction id not found"));
        }
        $res = Http::withHeaders($this->getHeaders())
            ->get($this->getBaseUrl()."/v1/transaction/".request()->id);

        if ($res->status() === 200){
            //get response from transaction cloud
            $result = $res->object();
            if ($result->transactionStatus === "ONE_TIME_PAYMENT_STATUS_PAID" && $result->transactionType === "ONETIME" && $result->productId === $this->getProductID()){
                $payloads = json_decode(Crypt::decryptString($result->payload));
                return $this->verified_data([
                    'status' => 'complete',
                    'order_id' => PaymentGatewayHelpers::unwrapped_id($payloads->order_id),
                    "payment_type" =>  $payloads->payment_type
                ]);

            }

        }

        return ['status' => 'failed','order_id' => null];

    }

    /**
     * @throws \Exception
     */
    public function charge_customer(array $args)
    {
        $order_id =  PaymentGatewayHelpers::wrapped_id($args['order_id']);

        //todo:: set customised product
        $res = Http::withHeaders($this->getHeaders())
            ->acceptJson()
            ->post($this->getBaseUrl().'/v1/customize-product/'.$this->getProductID(),[
                'prices' => [
                    [
                        'currency' => $this->getCurrency(),
                        'value' => $this->charge_amount($args['amount'])
                    ]
                ],
                'description' => $args["description"],
                'payload' => Crypt::encryptString(json_encode(["order_id" => $order_id,"payment_type" => $args['payment_type'] ?? " "])),
                'transactionIdToMigrate' => 'TC-TR_X'.random_int(111111,999999),
                'expiresIn' => 60
            ]);

        if ($res->status() === 200){
           $query_param =  http_build_query([
               "email" => $args["email"],
               "firstname" => $args["name"],
           ]);
            return redirect()->away($res->object()?->link."?".$query_param);
        }

        abort(500,__("checkout url generate failed, check your api credentials"));
    }

    public function supported_currency_list()
    {
        return  ['USD','EUR','PLN','INR','CAD','CNY','AUD','JPY','NOK','GBP','CHF','SGD','BRL','RUB','BGN','CZK','DKK','HUF','RON','SEK','GEL'];
    }

    public function charge_currency()
    {
        return 'USD';
    }

    public function gateway_name()
    {
        return 'transactionclud';
    }
    private function getHeaders(){
        return [
                'User-Agent' => 'parthenon/transaction-cloud 0.1',
                'Authorization' => sprintf('%s:%s', $this->getApiLogin(), $this->getApiPassword()),
            ];
    }
    private function getBaseUrl(){
        $sandbox_prefix = $this->getEnv() ? 'sandbox-' : "";//sandbox
        return 'https://'.$sandbox_prefix.'api.transaction.cloud';
    }
}
