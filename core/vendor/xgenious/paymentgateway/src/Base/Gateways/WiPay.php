<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Carbon\Carbon;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Xgenious\Paymentgateway\Base\PaymentGatewayHelpers;
use Xgenious\Paymentgateway\Traits\ConvertUsdSupport;
use Xgenious\Paymentgateway\Traits\CurrencySupport;
use Xgenious\Paymentgateway\Traits\PaymentEnvironment;
use Illuminate\Support\Str;

class WiPay extends PaymentGatewayBase
{
    use CurrencySupport,ConvertUsdSupport,PaymentEnvironment;
    public $accountNumber;
    public $accountApi;
    public $feeStructure;
    public $countryCode;


    public function getAccountNumber(){
        return $this->accountNumber;
    }
    public function setAccountNumber($accountNumber){
        $this->accountNumber = $accountNumber;
        return $this;
    }

    public function getAccountApi(){
        return $this->accountApi;
    }
    public function setAccountApi($accountApi){
        $this->accountApi = $accountApi;
        return $this;
    }

    public function getFeeStructure(){
        return $this->feeStructure;
    }

    public function setFeeStructure($feeStructure){
        $this->feeStructure = $feeStructure;
        return $this;
    }

    public function setCountryCode($countryCode){
        $this->countryCode = $countryCode;
        return $this;
    }

    public function getCountryCode(){
        return $this->countryCode;
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

        //todo check status is success
        $status = \request()->status;
        $hash = \request()->hash;
        $order_id = \request()->order_id;
        $transaction_id = \request()->transaction_id;
        $data = json_decode(\request()->data);
        $data = json_decode($data);

        if (!empty($hash) && !empty($transaction_id) && !empty($order_id) && $status === 'success'){
            // add condition
            $charge_amount = \session()->get('wipay_total_amount');
            \session()->forget('wipay_total_amount');
            $generate_hash = md5($transaction_id.number_format($charge_amount,2).$this->getAccountApi());
            if (hash_equals($hash,$generate_hash)){
                return $this->verified_data([
                    'status' => 'complete',
                    'transaction_id' => $transaction_id ,
                    'order_id' => PaymentGatewayHelpers::unwrapped_id($order_id ?? ""),
                    'order_type' => $data->payment_type ?? ""
                ]);
            }
        }

        return ['status' => 'failed','order_id' => PaymentGatewayHelpers::unwrapped_id($order_id),'order_type' => $data->payment_type ?? ""];
    }

    /**
     * @throws \Exception
     */
    public function charge_customer(array $args)
    {
        $order_id =  PaymentGatewayHelpers::wrapped_id($args['order_id']);

        //https://tt.wipayfinancial.com/plugins/payments/request
        //https://jm.wipayfinancial.com/plugins/payments/request
        //https://bb.wipayfinancial.com/plugins/payments/request
        \session()->put('wipay_total_amount',number_format($this->charge_amount($args['amount']),2));
        $res = Http::acceptJson()->asForm()->post("https://".strtolower($this->getCountryCode()).".wipayfinancial.com/plugins/payments/request",[
            "account_number" => $this->getAccountNumber() , //If environment is sandbox, then you must use the WiPay SANDBOX Account Number 1234567890.
            "currency" => $this->getCurrency(), // JMD, TTD, USD
            "environment" => $this->getEnv() ? 'sandbox' : 'live' , //live, sandbox,
            "fee_structure" => $this->getFeeStructure(), //customer_pay, merchant_absorb, split, who will pay wipay transaction fee,
            "method" => "credit_card",
            "order_id" => $order_id, //order_id by application
            "origin" => env('APP_NAME'),  //Your application's custom unique identifier for this transaction.
            "total" => number_format($this->charge_amount($args['amount']),2), //decimal value,
            "email" => $args['email'],
            "name" => $args['name'],
            'avs' => '0',
            "data" => json_encode($reference = [
                'order_id' => $order_id,
                'payment_type' => $args['payment_type']
            ]),
            'country_code' => $this->getCountryCode(),
            'response_url' =>  $args['ipn_url'], //get: callback for get data about the payment
        ]);

        $redirect_url = $res->object()?->url;
        if (is_null($redirect_url)){
            abort(501,$res->object()?->message);
        }
        return redirect()->away($redirect_url);
    }

    public function supported_currency_list()
    {
        return  ['JMD', 'TTD', 'USD'];
    }

    public function charge_currency()
    {
        return 'USD';
    }

    public function gateway_name()
    {
        return 'wipay';
    }

}
