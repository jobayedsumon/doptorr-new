<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Paytabscom\Laravel_paytabs\PaytabsEnum;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Xgenious\Paymentgateway\Base\PaymentGatewayHelpers;
use Xgenious\Paymentgateway\Traits\ConvertUsdSupport;
use Xgenious\Paymentgateway\Traits\CurrencySupport;
use Xgenious\Paymentgateway\Traits\IndianCurrencySupport;
use Xgenious\Paymentgateway\Traits\PaymentEnvironment;
use Paytabscom\Laravel_paytabs\Facades\paypage;

class PowertranzPay extends PaymentGatewayBase
{

    use CurrencySupport,PaymentEnvironment,ConvertUsdSupport;

    protected $gateway_key;
    protected $merchant_id;
    protected $merchant_processing_password;


    public function setGatewayKey(string $gateway_key) : PowertranzPay
    {
        $this->gateway_key = $gateway_key;
        return $this;
    }
    public function getGatewayKey(){
        return $this->gateway_key;
    }

    public function setMerchantId(string $merchant_id) : PowertranzPay
    {
        $this->merchant_id = $merchant_id;
        return $this;
    }
    public function getMerchantId(){
        return $this->merchant_id;
    }

    public function setMerchantProcessingPassword(string $merchant_processing_password) : PowertranzPay
    {
        $this->merchant_processing_password = $merchant_processing_password;
        return $this;
    }
    public function getMerchantProcessingPassword(){
        return $this->merchant_processing_password;
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
        $SpiToken = request()->get('SpiToken');

        $payment_url = $this->base_url($this->getEnv()).'payment';
        $response = Http::post($payment_url,$SpiToken);
        $result = $response->object();
        $order_id = Str::of($result->OrderIdentifier)->before('__')->toString();
        $payment_type = Str::of($result->OrderIdentifier)->after('__')->toString();
        if ($result->Approved && $result->ResponseMessage === "Transaction is approved"){
            return $this->verified_data([
                    'transaction_id' => $result->TransactionIdentifier,
                    'order_id' => PaymentGatewayHelpers::unwrapped_id($order_id),
                    'payment_type' => $payment_type
                ]);
        }

       return [
           'status' => 'failed',
           'order_id' => $order_id,
           'payment_type' => $payment_type
       ];
    }

    /**
     * @throws \Exception
     */

    public function view($args){
        return view('paymentgateway::powertransz', ['powertransz_data' => array_merge($args,[
            'merchant_id' =>  Crypt::encrypt($this->getMerchantId()),
            'currency' => $this->getCurrency(),
            'merchant_password' => Crypt::encrypt($this->getMerchantProcessingPassword()),
            'gateway_key' => Crypt::encrypt($this->getGatewayKey()),
            'charge_amount' => $this->charge_amount($args['amount']),
            'environment' => $this->getEnv(),
            'order_id' => PaymentGatewayHelpers::wrapped_id($args['order_id'])
        ])]);
    }
    public function charge_customer($args)
    {
        return $this->view($args);
        //todo:: format data for send in blade file for get user card details
    }

    public function charge_customer_from_controller(){


        $input = request()->input();

        /* Create a merchantAuthenticationType object with authentication details retrieved from the constants file */
        $merchant_password = \Crypt::decrypt(request()->merchant_password);
        $merchant_id = \Crypt::decrypt(request()->merchant_id);
        $gateway_key = \Crypt::decrypt(request()->gateway_key);
        $currency = request()->currency;

        $payment_url = $this->base_url(request()->environment).'sale';

        $header_data = [
            'PowerTranz-PowerTranzId'=> $merchant_id,
            'PowerTranz-PowerTranzPassword' => $merchant_password,
            'Content-Type' => 'application/json; charset=utf-8'
        ];
        if (!empty($gateway_key)){
            $header_data['PowerTranz-GatewayKey '] = $gateway_key;
        }
        $cardNumber = preg_replace('/\s+/', '', $input['number']);
        $card_date = explode('/',request()->get('expiry'));
        $expiration_month = trim($card_date[0]); //detect if year value is full number like 2024 get only last two digit¥¥¥¥¥¥¥¥^-09oi87uy68uy6t5rewqsdw34e5
        $expiration_year = strlen(trim($card_date[1])) == 4 ? trim($card_date[1]) : trim($card_date[1]);
        $expiration_date = $expiration_year .$expiration_month;
        $response = Http::withHeaders($header_data)
            ->post($payment_url,[
            'TransactionIdentifier' => Str::uuid()->toString(), // Guid Ex: F388373D-9FD8-7AA0-B64B-0E51FF97227E  ( 36 Char Long string )
            'TotalAmount' => request()->get('charge_amount'), //need in decimal format
            'CurrencyCode' => $this->getCurrencyNumber($currency),//388,//$currency, // Must use numeric currency code (ISO 4217)
            'ThreeDSecure' => true,
            'AddressMatch' => false,
            'OrderIdentifier' => $input['order_id'].'__'.$input['payment_type'],
            'Source' => [
                'CardPan' => $cardNumber, //card number for test 4012000000020071
                'CardCvv' => $input['cvc'],
                'CardExpiration' => $expiration_date, //Expiry date in YYMM format
                'CardholderName' => $input['name']
            ],
            'BillingAddress' => [
                'Line2' => 'line 2',
                'City' => 'city',
                'PostalCode' => '123456', // Postal or Zip code (required for AVS) Strictly Alphanumeric only - No special characters, no accents, no spaces, no dashes…etc.
                'CountryCode' => 388,//'USA', //For USA ISO Code
                'FirstName' => $input['name'],
                'LastName' => ' ',
                'Line1' => 'unknown',
                'EmailAddress' =>  $input['email'],
            ],

            'ExtendedData' => [
                "ThreeDSecure" => [
                    "ChallengeWindowSize" =>  1, // Merchants preferred sized of challenge window presented to cardholder
                    /*
                    1 – 250 x 400
                    2 – 390x400
                    3 – 500x600
                    4 – 600x400
                    5 – 100%
                    */

                    "ChallengeIndicator" => "01" , // Conditional value – if supported
                    /*
                    01 = No preference
                    02 = No challenge requested
                    03 = Challenge requested: 3DS Requestor Preference
                    04 = Challenge requested: Mandate Default value if not provided is that ACS would interpret as: 01 = No preference.
                    */
                ],
                'MerchantResponseURL' => $input['ipn_url']
            ]
        ]);
        $result = $response->object();
        if (property_exists($result,'RedirectData')){
            return $result->RedirectData;
        }
        $error_message = 'payment failed';
        if (property_exists($result,'Errors')){
            $error = $result->Errors;
            $error_message = current($error)->Message ?? __("payment credentials failed");
        }
        abort(501,$error_message);
    }


    public function supported_currency_list() : array
    {
/*
 * Supported Currencies
 *
United States (USD)
East Caribbean (XCD)
Trinidad and Tobago (TTD)
Jamaica (JMD)
Barbados (BBD)
Bahamas (BSD)
Belize (BZD)
Dominican Republic (DOP)
Guyana (GYD)
Cayman Islands (KYD)
Honduras (HNL)
El Salvador (SVC)
Costa Rica (CRC)
Nicaragua (NIO)
Panama (PAB)

 *
 * */
        return ['USD','XCD','TTD','JMD','BBD','BSD','BZD','DOP','GYD','KYD','HNL','SVC','CRC','NIO','PAB'];
    }

    public function charge_currency() : string
    {
        if (in_array($this->getCurrency(), $this->supported_currency_list())){
            return $this->getCurrency();
        }
        return  "USD";
    }

    public function gateway_name() : string
    {
        return 'powertranz';
    }

    private function base_url($environment =false){
        return $environment ? 'https://staging.ptranz.com/api/spi/' : 'https://TBD.ptranz.com/api/spi/';
    }
}
