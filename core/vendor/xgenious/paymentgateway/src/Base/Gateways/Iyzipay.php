<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Iyzipay\Options;
use Xgenious\Paymentgateway\Base\GlobalCurrency;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Xgenious\Paymentgateway\Base\PaymentGatewayHelpers;
use Xgenious\Paymentgateway\Traits\ConvertUsdSupport;
use Xgenious\Paymentgateway\Traits\CurrencySupport;
use Xgenious\Paymentgateway\Traits\LocationSupport;
use Xgenious\Paymentgateway\Traits\PaymentEnvironment;

class Iyzipay extends PaymentGatewayBase
{
    use PaymentEnvironment, CurrencySupport, ConvertUsdSupport,LocationSupport;

    private $apiKey;
    private $secretKay;



    public function setSecretKey($secretKay)
    {
        $this->secretKay = $secretKay;
        return $this;
    }

    public function getSecretKey()
    {
        return $this->secretKay;
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


    public function charge_customer($args)
    {
        $locationDetails = $this->getLocationDetails(request()->ip());
        $options = new Options();
        $options->setApiKey($this->getApiKey());
        $options->setSecretKey($this->getSecretKey());
        $options->setBaseUrl($this->baseApiUrl());

        # create request class
        $request = new \Iyzipay\Request\CreatePayWithIyzicoInitializeRequest();
        $request->setLocale(\Iyzipay\Model\Locale::EN);
        $request->setConversationId(PaymentGatewayHelpers::wrapped_id($args['order_id'])); //order id
        $request->setPrice($this->charge_amount($args['amount'])); //price
        $request->setPaidPrice($this->charge_amount($args['amount'])); //price
        $request->setCurrency($this->getCurrency());
        $request->setBasketId($args['payment_type']."__".PaymentGatewayHelpers::wrapped_id($args['order_id'])); //order id with payment type
        $request->setPaymentGroup(\Iyzipay\Model\PaymentGroup::PRODUCT);
        $request->setCallbackUrl($args['ipn_url']); //set a get callback

        $buyer = new \Iyzipay\Model\Buyer();
        $buyer->setId("___".($args['payment_type'] ?? 'Unknown'));
        $buyer->setName($args['name']);
        $buyer->setSurname(".");
//        $buyer->setGsmNumber("+905350000000");
        $buyer->setEmail($args['email']);
        $buyer->setIdentityNumber("11111111111");//dummy number
        $buyer->setLastLoginDate("2018-07-06 11:11:11");//dummy date
        $buyer->setRegistrationDate("2018-07-06 11:11:11"); //dummy date
        $buyer->setRegistrationAddress("unknown");
        $buyer->setIp(request()->ip());
        $buyer->setCity($locationDetails['city']);
        $buyer->setCountry($locationDetails['country']);
//        $buyer->setZipCode("34732");
        $request->setBuyer($buyer);

        $billingAddress = new \Iyzipay\Model\Address();
        $billingAddress->setContactName($args['name']);
        $billingAddress->setCity($locationDetails['city']);
        $billingAddress->setCountry($locationDetails['country']);
        $billingAddress->setAddress("Unknown");
//        $billingAddress->setZipCode("34742");
        $request->setBillingAddress($billingAddress);

        $basketItems = array();
        $firstBasketItem = new \Iyzipay\Model\BasketItem();
        $firstBasketItem->setId($args['payment_type']."__".PaymentGatewayHelpers::wrapped_id($args['order_id']));
        $firstBasketItem->setName($args['title']);
        $firstBasketItem->setCategory1(($args['payment_type'] ?? 'Unknown'));
        $firstBasketItem->setItemType(\Iyzipay\Model\BasketItemType::VIRTUAL);
        $firstBasketItem->setPrice($this->charge_amount($args['amount']));
        $basketItems[0] = $firstBasketItem;
        $request->setBasketItems($basketItems);

        # make request
        $payWithIyzicoInitialize = \Iyzipay\Model\PayWithIyzicoInitialize::create($request, $options);
        if ($payWithIyzicoInitialize->getStatus() === 'success'){
            return redirect()->away($payWithIyzicoInitialize->getPayWithIyzicoPageUrl());
        }
        return redirect()->to($args['cancel_url']);
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



        $options = new Options();
        $options->setApiKey($this->getApiKey());
        $options->setSecretKey($this->getSecretKey());
        $options->setBaseUrl($this->baseApiUrl());

        # create request class
        $token = request()->get('token');
        $request = new \Iyzipay\Request\RetrievePayWithIyzicoRequest();
        $request->setLocale(\Iyzipay\Model\Locale::EN);
        $request->setToken($token);
        # make request
        $payWithIyzico = \Iyzipay\Model\PayWithIyzico::retrieve($request,$options);

        if ($payWithIyzico->getStatus() === 'success'){
            $order_id = is_array($payWithIyzico->getPaymentItems()) && count($payWithIyzico->getPaymentItems()) > 0 ? Str::of(current($payWithIyzico->getPaymentItems())?->getItemId())->after('__')->toString() : 'unknown';
            $order_type = is_array($payWithIyzico->getPaymentItems()) && count($payWithIyzico->getPaymentItems()) > 0 ? Str::of(current($payWithIyzico->getPaymentItems())?->getItemId())->before('__')->toString() : 'unknown';
            return $this->verified_data([
                'status' => 'complete',
                'transaction_id' => $payWithIyzico->getPaymentId(),
                'order_id' => PaymentGatewayHelpers::unwrapped_id($order_id), //get order id
                'payment_type' => $order_type //todo:: return reference
            ]);
        }
        return $this->verified_data([
            'status' => 'failed'
        ]);
    }

    /**
     * geteway_name();
     * return @string
     * */
    public function gateway_name()
    {
        return 'iyzipay';
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
        return "TRY";
    }

    /**
     * supported_currency_list();
     * it will return all of supported currency for the payment gateway
     * return array
     * */
    public function supported_currency_list()
    {
        return  ['TRY', 'USD', 'EUR', 'GBP','IRR','NOK','RUB','CHF'];
    }

    private function baseApiUrl()
    {
        $prefix = $this->getEnv() ? 'sandbox-' : '';
        return "https://".$prefix."api.iyzipay.com";
    }

}
