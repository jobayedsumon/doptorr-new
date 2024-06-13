<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Xgenious\Paymentgateway\Base\GlobalCurrency;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Xgenious\Paymentgateway\Base\PaymentGatewayHelpers;
use Xgenious\Paymentgateway\Traits\ConvertUsdSupport;
use Xgenious\Paymentgateway\Traits\CurrencySupport;
use Xgenious\Paymentgateway\Traits\PaymentEnvironment;

class PaymobPay extends PaymentGatewayBase
{
    use PaymentEnvironment, CurrencySupport, ConvertUsdSupport;

    private $apiKey;
    private $hmacSecret;
    private $integrationId;
    private $gatewayType;
    private $iframeId;
    private $secretKay;
    private $publicKey;
    private $walletMobileNumber;

    /**
     Available Gateway Type
     *
    "accept-online" //card payment
    "accept-kiosk"
    "accept-wallet"
    "accept-valu"
    "accept-installments"
    "accept-sympl"
    "accept-premium"
    "accept-souhoola"
    "accept-shahry"
    "accept-get_go"
    "accept-lucky"
    "accept-forsa"
    "accept-tabby"
    "accept-nowpay"
     * */


    public function setWalletMobileNumber($walletMobileNumber)
    {
        $this->walletMobileNumber = $walletMobileNumber;
        return $this;
    }

    public function getWalletMobileNumber()
    {
        return $this->walletMobileNumber;
    }

    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
        return $this;
    }

    public function getPublicKey()
    {
        return $this->publicKey;
    }

    public function setSecretKey($secretKay)
    {
        $this->secretKay = $secretKay;
        return $this;
    }

    public function getSecretKey()
    {
        return $this->secretKay;
    }


    public function setIframeId($iframeId)
    {
        $this->iframeId = $iframeId;
        return $this;
    }

    public function getIframeId()
    {
        return $this->iframeId;
    }

    public function setGatewayType($gatewayType)
    {
        $this->gatewayType = $gatewayType;
        return $this;
    }

    public function getGatewayType()
    {
        return $this->gatewayType;
    }

    public function setApiKey($apiKey)
    {
        $this->apiKey = $apiKey;
        return $this;
    }

    public function getApiKey()
    {
        return $this->apiKey;
    }

    public function setHmacSecret($hmacSecret)
    {
        $this->hmacSecret = $hmacSecret;
        return $this;
    }

    public function getHmacSecret()
    {
        return $this->hmacSecret;
    }

    public function setIntegrationId($integrationId)
    {
        $this->integrationId = $integrationId;
        return $this;
    }

    public function getIntegrationId()
    {
        return $this->integrationId;
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
        if (in_array($this->getCurrency(), $this->supported_currency_list())) {
            return $amount * 100;
        }
        return $this->get_amount_in_usd($amount) * 100;
    }


    /**
     * @required param list
     * $args['amount']
     * $args['description']
     * $args['item_name']
     * $args['ipn_url']
     * $args['cancel_url']
     * $args['payment_track']
     * return redirect url for
     * */

    public function charge_customer($args)
    {
        $authorize_token = $this->authentication_request();
        /*  make eCommerce Order */
        $order_request = $this->order_registration_request($authorize_token,$args);

        /*  work on payment key request */
        $payment_key_request_token = $this->payment_key_request($authorize_token,$args,($order_request['order_id'] ?? ""));

        $payment_url = '';


        /**
        Available Gateway Type
         *
        "accept-online" //card payment
        "accept-kiosk"
        "accept-wallet"
        "accept-valu"
        "accept-installments"
        "accept-sympl"
        "accept-premium"
        "accept-souhoola"
        "accept-shahry"
        "accept-get_go"
        "accept-lucky"
        "accept-forsa"
        "accept-tabby"
        "accept-nowpay"
         * */

        /* get payment page url based on the payment gateway type */
        if ($this->getGatewayType() === 'accept-online'){
            $payment_url = 'https://accept.paymobsolutions.com/api/acceptance/iframes/'.$this->getIframeId().'?payment_token='.$payment_key_request_token;
        }elseif ($this->getGatewayType() === 'accept-valu'){
            /* iframe id should be fore valU */
            $payment_url = 'https://accept.paymobsolutions.com/api/acceptance/iframes/'.$this->getIframeId().'?payment_token='.$payment_key_request_token;
        }elseif ($this->getGatewayType() === 'accept-kiosk'){
            // api request for kiosk, need to show bill_reference to the user for pay it from koisok
            $bill_reference = $this->process_kiosk_payment_request($payment_key_request_token,$authorize_token,$args);
            return "your kiosk payment bill reference id:". $bill_reference;
        }elseif ($this->getGatewayType() === 'accept-wallet'){
          //todo:: call wallet api and redirect them to redirect_url
            $redirect_url = $this->process_wallet_payment_request($payment_key_request_token,$authorize_token,$args);
            return redirect()->away($redirect_url);
        }
        return view('paymentgateway::paymob',[
            "payment_url" => $payment_url
        ]);
    }


    /**
     * @required param list
     * $args['request']
     * $args['cancel_url']
     * $args['success_url']
     *
     * return @void
     * */
    public function ipn_response($args = [])
    {

        $request = request();

        //todo:: need to check it is is post or get request,
        //post request mean == transaction process callback
        //get request mean == transaction response callback

        //todo:: need to verify hmac
        $request_method = strtolower($request->method());
        $hmac_type = $request_method === 'get' ? 'TRANSACTION' : 'TRANSACTION';
        $hash_value = $this->getHasvalue();
        $order_id = request()->get('merchant_order_id');

        $callback_type = 'TRANSACTION';
        if (strtolower(request()->method()) === 'post') {
            $callback_type = request()->type;
        }

        if(hash_equals($hash_value,$request->hmac)){
            if ($request_method === 'post'){
                //handle post request
                if ($callback_type == 'TRANSACTION') {
                    if (
                        $request->success === true &&
                        $request->is_voided === false &&
                        $request->is_refunded === false &&
                        $request->pending === false &&
                        $request->is_void === false &&
                        $request->is_refund === false &&
                        $request->error_occured === false
                    ) {
                        return $this->verified_data([
                            'status' => 'processing',
                            'order_id' => PaymentGatewayHelpers::unwrapped_id($order_id),
                            'order_type' => null
                        ]);
                    } else if (
                        $request->success === true &&
                        $request->is_refunded === true &&
                        $request->is_voided === false &&
                        $request->pending === false &&
                        $request->is_void === false &&
                        $request->is_refund === false
                    ) {
                        return $this->verified_data([
                            'status' => 'refunded',
                            'order_id' => PaymentGatewayHelpers::unwrapped_id($order_id),
                            'order_type' => null
                        ]);

                    } else if (
                        $request->success === true &&
                        $request->is_voided === true &&
                        $request->is_refunded === false &&
                        $request->pending === false &&
                        $request->is_void === false &&
                        $request->is_refund === false
                    ) {
                        return $this->verified_data([
                            'status' => 'cancelled',
                            'order_id' => PaymentGatewayHelpers::unwrapped_id($order_id),
                            'order_type' => null
                        ]);

                    } else if (
                        $request->success === false &&
                        $request->is_voided === false &&
                        $request->is_refunded === false &&
                        $request->is_void === false &&
                        $request->is_refund === false
                    ) {
                        return $this->verified_data([
                            'status' => 'pending-payment',
                            'order_id' => PaymentGatewayHelpers::unwrapped_id($order_id),
                            'order_type' => null
                        ]);
                    }
                }else if ($callback_type == 'TOKEN'){
                    //handle if token accept
                }

            }elseif ($request_method === 'get'){
                //handle get request

                if (
                    $request->success === "true" &&
                    $request->is_voided === "false" &&
                    $request->is_refunded === "false" &&
                    $request->pending === "false" &&
                    $request->is_void === "false" &&
                    $request->is_refund === "false" &&
                    $request->error_occured === "false"
                ) {
                    return $this->verified_data([
                        'status' => 'complete',
                        'transaction_id' => request()->get('id'),
                        'order_id' => PaymentGatewayHelpers::unwrapped_id($order_id),
                        'order_type' => null
                    ]);
                }
                elseif($request->data_message ==="Approved" ) {
                    return $this->verified_data([
                        'status' => 'complete',
                        'transaction_id' => request()->get('id'),
                        'order_id' => PaymentGatewayHelpers::unwrapped_id($order_id),
                        'order_type' => null
                    ]);
                }
            }
        }

        return $this->verified_data([
            'status' => 'failed',
            'order_id' => PaymentGatewayHelpers::unwrapped_id($order_id),
            'order_type' => null
        ]);
    }

    /**
     * geteway_name();
     * return @string
     * */
    public function gateway_name()
    {
        return 'paymob';
    }

    /**
     * charge_currency();
     * return @string
     * */
    public function charge_currency()
    {
        if (in_array($this->getCurrency(), $this->supported_currency_list())) {
            return $this->getCurrency();
        }
        return "EGP";
    }

    /**
     * supported_currency_list();
     * it will returl all of supported currency for the payment gateway
     * return array
     * */
    public function supported_currency_list()
    {
        $supported_currency = ['EGP'];
        if ($this->getGatewayType() === "accept-online"){
            $supported_currency = ['EGP', 'USD', 'EUR', 'GBP'];
        }
        return $supported_currency;
    }


    private function base_api_url() {
        return 'https://accept.paymob.com/api/';
    }

    private function authentication_request() {
        $url = $this->base_api_url().'auth/tokens';
        //todo:: post request
        $response = Http::post($url,[
            "api_key" => $this->getApiKey()
        ]);
        if ($response->status() === 201){
            $result = $response->object();
            $authorise_token = $result->token;
            if(!empty($authorise_token)){
                return $authorise_token;
            }
            abort(500,'authentication request token generate failed');
        }
        abort(500,'authentication_request failed');
    }

    private function order_registration_request($authorize_token,$args) {
        $response = Http::post($this->base_api_url().'ecommerce/orders',[
            "auth_token" =>  $authorize_token,
            "delivery_needed" => "false",
            "amount_cents" => $this->charge_amount($args['amount']),
            "currency" => $this->getCurrency(),
            "merchant_order_id" => PaymentGatewayHelpers::wrapped_id($args['order_id']),
            "items" => [
                [
                    "name" => $args['title'],
                    "amount_cents" => $this->charge_amount($args['amount']),
                    "description" => $args['description'],
                    "quantity" => "1"
                ]
            ]
        ]);

        if($response->status() === 201){
           return [
               'order_id' => $response->object()?->id,
               'token' => $response->object()?->token
           ];
        }
        abort(500,'order_registration_request failed');
    }

    private function payment_key_request($authorize_token, array $args,$order_request_id)
    {
        $response = Http::post($this->base_api_url().'acceptance/payment_keys',[
            "auth_token" => $authorize_token,
            "amount_cents" => $this->charge_amount($args['amount']),
            "expiration" => 3600,
            "order_id" => $order_request_id,
            "billing_data" => [
                "first_name" => "Clifford",
                "last_name" => "Nicolas",
                "email" => "claudette09@exa.com",
                "phone_number" => "+86(8)9135210487",
                "apartment" => "NA",
                "floor" => "NA",
                "street" => "NA",
                "building" => "NA",
                "shipping_method" => "NA",
                "postal_code" => "NA",
                "city" => "NA",
                "country" => "NA",
                "state" => "NA"
            ],
            "currency" => $this->getCurrency(),
            "integration_id" => $this->getIntegrationId(),
            "lock_order_when_paid" => "false"
        ]);
        if($response->status() === 201){
            return $response->object()?->token;
        }
        abort(500,'payment_key_request failed');
    }

    private function process_kiosk_payment_request($payment_key_request_token,$authorize_token,$args)
    {
        //todo api request
        $response = Http::asJson()->post($this->base_api_url().'acceptance/payment_keys',[
            "payment_token" => $payment_key_request_token,
            "auth_token" => $authorize_token,
            "source" => [
                "identifier" => "AGGREGATOR",
                "subtype" => "AGGREGATOR"
            ],
            'amount_cents' => $this->charge_amount($args['amount']),
            'currency' => $this->getCurrency()
        ]);
        if($response->status() === 201){
            return $response->object()?->data?->bill_reference;
        }
        abort(500,'process_kiosk_payment_request bill_reference generate failed');
    }
    private function process_wallet_payment_request($payment_key_request_token,$authorize_token,$args)
    {
        //todo api request
        $response = Http::asJson()->post($this->base_api_url().'acceptance/payment_keys',[
            "payment_token" => $payment_key_request_token,
            "auth_token" => $authorize_token,
            "source" => [
                "identifier" => $this->getWalletMobileNumber(),
                "subtype" => "WALLET"
            ],
            'amount_cents' => $this->charge_amount($args['amount']),
            'currency' => $this->getCurrency()
        ]);

        if($response->status() === 201){
            return $response->object()->redirect_url;
        }
        abort(500,'process_wallet_payment_request redirect_url generate failed');
    }

    private function getHmacStringArray()
    {
        $return_string = request()->all();
        if (strtolower(request()->method()) === 'post'){
            $return_string = '';
            $callback_type = request()->type;
            $object = request()->obj;
            $return_string = request()->obj;

            if ($callback_type === 'TRANSACTION'){

                $return_string->order =  $object->order?->id;
                $return_string->order =  $object->order?->id;
                $return_string->is_3d_secure         = ($object->is_3d_secure === true) ? 'true' : 'false';
                $return_string->is_auth                = ($object->is_auth === true) ? 'true' : 'false';
                $return_string->is_capture             = ($object->is_capture === true) ? 'true' : 'false';
                $return_string->is_refunded            = ($object->is_refunded === true) ? 'true' : 'false';
                $return_string->is_standalone_payment  = ($object->is_standalone_payment === true) ? 'true' : 'false';
                $return_string->is_voided              = ($object->is_voided === true) ? 'true' : 'false';
                $return_string->success                = ($object->success === true) ? 'true' : 'false';
                $return_string->error_occured          = ($object->error_occured === true) ? 'true' : 'false';
                $return_string->has_parent_transaction = ($object->has_parent_transaction === true) ? 'true' : 'false';
                $return_string->pending                = ($object->pending === true) ? 'true' : 'false';
                $return_string->source_data_pan        = $object->source_data?->pan;
                $return_string->source_data_type       = $object->source_data?->type;
                $return_string->source_data_sub_type   = $object->source_data?->sub_type;

                /*
                amount_cents
                created_at
                currency
                error_occured
                has_parent_transaction
                id
                integration_id
                is_3d_secure
                is_auth
                is_capture
                is_refunded
                is_standalone_payment
                is_voided
                order.id
                owner
                pending
                source_data.pan
                source_data.sub_type
                source_data.type
                success
                */

            }elseif ($callback_type === 'DELIVERY_STATUS'){
                $return_string->order = $object->order?->id;
            }
        }elseif(strtolower(request()->method()) === 'get'){
            //handle if the callback if get request transaction callback.
            $callback_type = 'TRANSACTION';
            $return_string = request()->all();
        }

        return $return_string;
    }

    private function getHasvalue()
    {
        $callback_type = 'TRANSACTION';
        if (strtolower(request()->method()) === 'post') {
            $callback_type = request()->type;
        }

        $hmac_string = $this->getHmacStringArray();
        $str = '';
        switch ($callback_type) {

            case 'TRANSACTION':

                $str =
                    $hmac_string['amount_cents'] .
                    $hmac_string['created_at'] .
                    $hmac_string['currency'] .
                    $hmac_string['error_occured'] .
                    $hmac_string['has_parent_transaction'] .
                    $hmac_string['id'] .
                    $hmac_string['integration_id'] .
                    $hmac_string['is_3d_secure'] .
                    $hmac_string['is_auth'] .
                    $hmac_string['is_capture'] .
                    $hmac_string['is_refunded'] .
                    $hmac_string['is_standalone_payment'] .
                    $hmac_string['is_voided'] .
                    $hmac_string['order'] .
                    $hmac_string['owner'] .
                    $hmac_string['pending'] .
                    $hmac_string['source_data_pan'] .
                    $hmac_string['source_data_sub_type'] .
                    $hmac_string['source_data_type'] .
                    $hmac_string['success'];
                break;
            case 'TOKEN':
                $str =
                    $hmac_string['card_subtype'] .
                    $hmac_string['created_at'] .
                    $hmac_string['email'] .
                    $hmac_string['id'] .
                    $hmac_string['masked_pan'] .
                    $hmac_string['merchant_id'] .
                    $hmac_string['order_id'] .
                    $hmac_string['token'];
                break;
            case 'DELIVERY_STATUS':
                $str =
                    $hmac_string['created_at'] .
                    $hmac_string['extra_description'] .
                    $hmac_string['gps_lat'] .
                    $hmac_string['gps_long'] .
                    $hmac_string['id'] .
                    $hmac_string['merchant'] .
                    $hmac_string['order'] .
                    $hmac_string['status'];
                break;
        }
        $hash = hash_hmac('sha512', $str, $this->getHmacSecret());
        return $hash;
    }

}
