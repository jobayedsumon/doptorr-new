<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Xgenious\Paymentgateway\Base\GlobalCurrency;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Xgenious\Paymentgateway\Base\PaymentGatewayHelpers;
use Xgenious\Paymentgateway\Traits\ConvertUsdSupport;
use Xgenious\Paymentgateway\Traits\CurrencySupport;
use Xgenious\Paymentgateway\Traits\PaymentEnvironment;

class SitesWayPay extends PaymentGatewayBase
{
    use PaymentEnvironment,CurrencySupport,ConvertUsdSupport;
    protected $brand_id;
    protected $api_key;
    protected $endpoint = 'https://gate.sitesway.sa/api/v1/';

    /* get getBrandId */
    private function getBrandId(){
        return  $this->brand_id;
    }
    /* set setBrandId */
    public function setBrandId($brand_id){
        $this->brand_id = $brand_id;
        return $this;
    }
    /* set setApiKey */
    public function setApiKey($api_key){
        $this->api_key = $api_key;
        return $this;
    }
    /* get getApiKey */
    private function getApiKey(){
        return  $this->api_key;
    }
    /*
    * charge_amount();
    * @required param list
    * $amount
    *
    *
    * */
    public function charge_amount($amount)
    {
        if (in_array($this->getCurrency(), $this->supported_currency_list())){
            return $amount;
        }
        return $this->get_amount_in_usd($amount);
    }


       /**
     * @required param list
     * $args['amount']
     * $args['description']
     * $args['item_name']
     * $args['ipn_url']
     * $args['cancel_url']
     * $args['payment_track']
     * return redirect url for paypal
     * */


    public function charge_customer($args)
    {
        
        try {
            $res = Http::withToken($this->getApiKey())->asJson()->post($this->endpoint.'purchases/', [
                "client" => [
                    "email" => $args['email'],
                    "full_name" => $args['name']
                ],
                "purchase" => [
                    "currency" => $this->getCurrency(), //default SAR
                    "products" => [
                        [
                            "name" => $args['title'],
                            "price" => $this->charge_amount($args['amount']) * 100 //price need to multiply by 100
                        ]
                    ]
                ],
                "brand_id" => $this->getBrandId(),
                "success_redirect" => $args['success_url'],
                "failure_redirect" => $args['cancel_url'],
                "cancel_redirect" => $args['cancel_url'],
                "success_callback" => $args['ipn_url'],
                "reference" => json_encode([
                    'order_id' => PaymentGatewayHelpers::wrapped_id($args['order_id']),
                    'payment_type' => $args['payment_type']
                ])
            ]);

            $response_object = $res->object();

            if (is_object($response_object) && property_exists($response_object,"checkout_url")){
                $redirect_url = $response_object->checkout_url;
                return redirect()->away($redirect_url); //redirect to the payment provider website for complete payment
            }
            if (is_object($response_object) &&  property_exists($response_object,'__all__')){
                abort(500,current($response_object->__all__)->message);
            }

        }catch (\Exception $e){
            abort(500,$e->getMessage());
        }

    }

    /**
     * @required param list
     * $args['request']
     * $args['cancel_url']
     * $args['success_url']
     *
     * return @void
     * */
    public function ipn_response($args = []){

        $purchase_id = request()->id;
        $reference = json_decode(request()->reference);
        $res = Http::withToken($this->getApiKey())
            ->acceptJson()
            ->get($this->endpoint."purchases/{$purchase_id}/");
        $response_object = $res->object();
        if (is_object($response_object) && property_exists($response_object,"status")){


            if ($response_object->status === "paid"){
                return $this->verified_data([
                    'status' => 'complete',
                    'transaction_id' => $purchase_id ,
                    'order_id' => PaymentGatewayHelpers::unwrapped_id($reference->order_id ?? ""),
                    'order_type' => $reference->payment_type ?? ""
                ]);
            }

        }
        if (is_object($response_object) &&  property_exists($response_object,'__all__')){
            abort(500,current($response_object->__all__)->message);
        }

        return $this->verified_data([
            'status' => 'failed',
            'order_id' => PaymentGatewayHelpers::unwrapped_id($reference->order_id ?? ""),
            'order_type' => $reference->payment_type ?? ""
        ]);

    }

    /**
     * geteway_name();
     * return @string
     * */
    public function gateway_name(){
        return 'sitesway';
    }
    /**
     * charge_currency();
     * return @string
     * */
    public function charge_currency()
    {
        if (in_array($this->getCurrency(), $this->supported_currency_list())){
            return $this->getCurrency();
        }
        return  "USD";
    }
    /**
     * supported_currency_list();
     * it will returl all of supported currency for the payment gateway
     * return array
     * */
    public function supported_currency_list(){
        return [
            'USD',
            'EUR',
            'INR',
            'IDR',
            'AUD',
            'SGD',
            'JPY',
            'GBP',
            'MYR',
            'PHP',
            'THB',
            'KRW',
            'NGN',
            'GHS',
            'BRL',
            'BIF',
            'CAD',
            'CDF',
            'CVE',
            'GHP',
            'GMD',
            'GNF',
            'KES',
            'LRD',
            'MWK',
            'MZN',
            'RWF',
            'SLL',
            'STD',
            'TZS',
            'UGX',
            'XAF',
            'XOF',
            'ZMK',
            'ZMW',
            'ZWD',
            'AED',
            'AFN',
            'ALL',
            'AMD',
            'ANG',
            'AOA',
            'ARS',
            'AWG',
            'AZN',
            'BAM',
            'BBD',
            'BDT',
            'BGN',
            'BMD',
            'BND',
            'BOB',
            'BSD',
            'BWP',
            'BZD',
            'CHF',
            'CNY',
            'CLP',
            'COP',
            'CRC',
            'CZK',
            'DJF',
            'DKK',
            'DOP',
            'DZD',
            'EGP',
            'ETB',
            'FJD',
            'FKP',
            'GEL',
            'GIP',
            'GTQ',
            'GYD',
            'HKD',
            'HNL',
            'HRK',
            'HTG',
            'HUF',
            'ILS',
            'ISK',
            'JMD',
            'KGS',
            'KHR',
            'KMF',
            'KYD',
            'KZT',
            'LAK',
            'LBP',
            'LKR',
            'LSL',
            'MAD',
            'MDL',
            'MGA',
            'MKD',
            'MMK',
            'MNT',
            'MOP',
            'MRO',
            'MUR',
            'MVR',
            'MXN',
            'NAD',
            'NIO',
            'NOK',
            'NPR',
            'NZD',
            'PAB',
            'PEN',
            'PGK',
            'PKR',
            'PLN',
            'PYG',
            'QAR',
            'RON',
            'RSD',
            'RUB',
            'SAR',
            'SBD',
            'SCR',
            'SEK',
            'SHP',
            'SOS',
            'SRD',
            'SZL',
            'TJS',
            'TRY',
            'TTD',
            'TWD',
            'UAH',
            'UYU',
            'UZS',
            'VND',
            'VUV',
            'WST',
            'XCD',
            'XPF',
            'YER',
            'ZAR',
            'BHD'
        ];
    }
}
