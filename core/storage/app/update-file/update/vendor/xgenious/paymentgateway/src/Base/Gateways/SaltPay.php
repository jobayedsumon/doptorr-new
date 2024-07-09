<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Xgenious\Paymentgateway\Base\GlobalCurrency;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use Xgenious\Paymentgateway\Base\PaymentGatewayHelpers;
use Xgenious\Paymentgateway\Traits\ConvertUsdSupport;
use Xgenious\Paymentgateway\Traits\CurrencySupport;
use Xgenious\Paymentgateway\Traits\PaymentEnvironment;
use net\authorize\api\contract\v1 as AnetAPI;
use net\authorize\api\controller as AnetController;

class SaltPay extends PaymentGatewayBase
{
    use PaymentEnvironment, CurrencySupport, ConvertUsdSupport;

    private $merchantId;
    private $secretkey;
    private $langpaymentPage = 'en';  //supported
    private $paymentGatewayId;

    public function setMerchantId($merchantId)
    {
        $this->merchantId = $merchantId;
        return $this;
    }

    public function getMerchantId()
    {
        return $this->merchantId;
    }

    public function setSecretKey($secretkey)
    {
        $this->secretkey = $secretkey;
        return $this;
    }

    public function getSecretKey()
    {
        return $this->secretkey;
    }

    public function setLangPaymentPage($langpaymentPage)
    {
        $this->langpaymentPage = $langpaymentPage;
        return $this;
    }

    public function getLangPaymentPage()
    {
        return $this->langpaymentPage;
    }

    public function setPaymentGatewayId($paymentGatewayId)
    {
        $this->paymentGatewayId = $paymentGatewayId;
        return $this;
    }

    public function getPaymentGatewayId()
    {
        return $this->paymentGatewayId;
    }


    /*
        Available Languages

        'is' => Icelandi
        'en' => English
        'de' => German
        'fr' => French
        'it' => Italian
        'pt' => Portugese
        'ru' => Russian
        'es' => Spanish
        'se' => Swedish
        'hu' => Hungarian
        'si' => Slovene

      */


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
            return number_format($amount,2);
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
     * return redirect url for
     * */

    public function view($args)
    {
        $salt_pay_args = array_merge($args, [
            'gateway_id' => $this->getPaymentGatewayId(),
            'merchantid' => $this->getMerchantId(),
            'language' => in_array($this->getLangPaymentPage(), $this->getAvilableLanguage()) ? $this->getLangPaymentPage() : 'en',
            'currency' => $this->getCurrency(),
            'charge_amount' => $this->charge_amount($args['amount']),
            'environment' => $this->getEnv(),
            'order_id' => PaymentGatewayHelpers::wrapped_id($args['order_id']),
            'action_url' => $this->getBaseUrl() . 'default.aspx',
            'reference' => $args['payment_type']
        ]);
        $salt_pay_args['checkhash'] = $this->generateCheckHash($salt_pay_args);

        return view('paymentgateway::saltpay', ['saltpay_data' => $salt_pay_args]);
    }

    public function charge_customer($args)
    {
        //todo:: format data for send in blade file for get user card details
        return $this->view($args);
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
        $status = $request->status;
        $orderid = $request->orderid;
        $reference_string = $request->reference;
        $reference = $reference_string;
        $order_amount = $request->amount;

        $orderhash = $request->orderhash;
        $step = $request->step;

        $errordescription = $request->errordescription;
        $errorcode = $request->errorcode;
        $errordescription = $request->errordescription;



        $authorizationcode = $request->authorizationcode;
        $refundid = $request->refundid;



        if($status === 'OK' && !empty($orderid)){
            if (hash_equals($orderhash,$this->getCheckoutHash($order_amount,$orderid))){
                //todo:: hash verified, now make an api call to cross check the payment is actually maid or not
                if ( strpos( $step, 'Payment' ) !== false ) {
                    $xml = '<PaymentNotification>Accepted</PaymentNotification>';

                    //send resopnse to saltpay that we have received the notification
                    try
                    {
                        Http::
                        withHeaders([
                            'Content-Type' => 'text/xml'
                        ])
                            ->timeout(60)
                            ->withoutVerifying()
                            ->maxRedirects(5)
                            ->post($this->getBaseUrl(). 'default.aspx',[
                                'postdata' => $xml, 'postfield' => 'value'
                            ]);


                    }catch (\Exception $e){
                        // abort(501,'failed to send data to salt pay');
                    }
                }


                return $this->verified_data([
                    'status' => 'complete',
                    'transaction_id' => $authorizationcode,
                    'order_id' => PaymentGatewayHelpers::unwrapped_id($orderid),
                    'order_type' => $reference
                ]);
            }
        }

        return $this->verified_data([
            'status' => 'failed',
            'order_id' => PaymentGatewayHelpers::unwrapped_id(request()->get('order_id')),
            'order_type' => $reference
        ]);
    }

    /**
     * geteway_name();
     * return @string
     * */
    public function gateway_name()
    {
        return 'saltpay';
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
        return "USD";
    }

    /**
     * supported_currency_list();
     * it will returl all of supported currency for the payment gateway
     * return array
     * */
    public function supported_currency_list()
    {
        return ['ISK', 'USD', 'EUR', 'GBP', 'DKK', 'NOK', 'SEK', 'CHF', 'JPY', 'CAD', 'HUF'];
    }


    private function getBaseUrl()
    {
        //true=sandbox, false=live
        return $this->getEnv() ? 'https://test.borgun.is/securepay/' : 'https://securepay.borgun.is/securepay/';
    }

    private function getAvilableLanguage()
    {
        return ['is', 'en', 'de', 'fr', 'it', 'pt', 'ru', 'es', 'se', 'hu', 'si'];
    }

    private function generateCheckHash($args)
    {

//Formual
//CheckHashMessage = MerchantId|ReturnUrlSuccess|ReturnUrlSuccessServer|OrderId|Amount|Currency -> this is for payment page
//OrderHashMessage = OrderId|Amount|Currency -> this is for payment verify

        $secretKey = $this->getSecretKey();
        $hashMessagesParams = [
            $args['merchantid'],
            $args['ipn_url'],
            $args['ipn_url'],
            $args['order_id'],
            $args['charge_amount'],
            $args['currency'],
        ];
        $CheckHashMessage = implode('|', $hashMessagesParams);

        $message = utf8_encode(trim($CheckHashMessage));
        $checkhash = hash_hmac('sha256', $message, $secretKey);
        return $checkhash;
    }

    private function getCheckoutHash(string $order_amount, mixed $orderid)
    {
        //formula
        //orderid|amount|Currency

        $secretKey = $this->getSecretKey();
        $hashMessagesParams = [
            $orderid,
            $order_amount,
            $this->getCurrency()
        ];
        $CheckHashMessage = implode('|', $hashMessagesParams);

        $message = utf8_encode(trim($CheckHashMessage));
        $checkhash = hash_hmac('sha256', $message, $secretKey);
        return $checkhash;
    }
}
