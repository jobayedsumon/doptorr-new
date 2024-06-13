<?php

namespace Xgenious\Paymentgateway\Base\Gateways;
use Illuminate\Support\Facades\Http;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Xgenious\Paymentgateway\Base\PaymentGatewayHelpers;
use Xgenious\Paymentgateway\Facades\XgPaymentGateway;
use Xgenious\Paymentgateway\Traits\ConvertUsdSupport;
use Xgenious\Paymentgateway\Traits\CurrencySupport;
use Xgenious\Paymentgateway\Traits\MyanmarCurrencySupport;
use Xgenious\Paymentgateway\Traits\PaymentEnvironment;
use Illuminate\Support\Facades\Cookie;

class KineticPay extends PaymentGatewayBase
{
    use CurrencySupport,PaymentEnvironment,MyanmarCurrencySupport;
    protected $bank;
    protected $merchant_key;

    public function setMerchantKey($merchant_key){
        $this->merchant_key = $merchant_key;
        return $this;
    }

    public function getMerchantKey(){
        return $this->merchant_key;
    }

    public function setBank($bank){
        $this->bank = $bank;
        return $this;
    }

    public function getBank(){
        return $this->bank;
    }

    /**
     * to work this payment gateway you must have this laravel package
     * */
    /**
     * @inheritDoc
     */
    public function charge_amount($amount)
    {
        if (in_array($this->getCurrency(), $this->supported_currency_list())){
            return $amount;
        }
        return $this->get_amount_in_myr($amount);
    }

    /**
     * @inheritDoc
     * return array('status','transaction_id','order_id');
     */
    public function ipn_response(array $args = [])
    {

        $encoded_transaction_data = json_decode(request()['encoded_transaction_data']);
        $order_id = $encoded_transaction_data?->record?->order_number;
        if (empty($order_id)){
            abort(501, __("order id not found"));
        }

        $url = "https://manage.kineticpay.my/payment/status";


        $res = Http::acceptJson()->get($url . '?merchant_key=' . $this->getMerchantKey() . '&invoice=' . (string) $order_id);

        if ($res->ok()){

            $result = $res->object();
            $order_id = $result->invoice ?? "";
            $transaction_id = $result->id ?? '';

            return $this->verified_data([
                'status' => 'complete',
                'transaction_id' => $transaction_id ,
                'order_id' => XgPaymentGateway::unwrapped_id($order_id ?? ""),
            ]);
        }
        return ['status' => 'failed'];
    }

    private function getBaseURL(){
        return 'https://manage.kineticpay.my/payment/';
    }

    /**
     * @inheritDoc
     * return array()
     */
    public function charge_customer(array $args)
    {

        $charge_amount = round($this->charge_amount($args['amount']), 2);
        $order_id =  XgPaymentGateway::wrapped_id($args['order_id']);

        if (empty($this->getBank())){
            abort(501,__("you must have to select a bank for pay with kineticpay"));
        }
        if (empty($this->getMerchantKey())){
            abort(501,__("merchant key not provided"));
        }



        $data = [
            'merchant_key' => $this->getMerchantKey(),
            'invoice' => $order_id,
            'amount' => $charge_amount,
            'description' => $args['description'],
            'bank' => $this->getBank(),
            'callback_success' => $args['ipn_url'], //POST URL
            'callback_error' => $args['cancel_url'],
            'callback_status' => $args['ipn_url']."?orderid=" . $order_id
        ];

        // API Endpoint URL
        $url = "https://manage.kineticpay.my/payment/create";
        $res = Http::acceptJson()->post($url,$data);
        $result = $res->object();
        if (is_object($result) && property_exists($result,"html")){
            return  $result?->html;
        }

        abort(501,__("failed to connect kineticpay server."));
    }

    /**
     * @inheritDoc
     */
    public function supported_currency_list()
    {
        return ['MYR'];
    }

    /**
     * @inheritDoc
     */
    public function charge_currency()
    {
        if (in_array($this->getCurrency(), $this->supported_currency_list())) {
            return $this->getCurrency();
        }
        return "MYR";
    }

    /**
     * @inheritDoc
     */
    public function gateway_name()
    {
        return 'kineticpay';
    }
}
