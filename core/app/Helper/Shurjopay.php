<?php

namespace App\Helper;

use Illuminate\Http\Request;
use ShurjopayPlugin\PaymentRequest;
use ShurjopayPlugin\ShurjopayConfig;
use ShurjopayPlugin\ShurjopayException;
use Xgenious\Paymentgateway\Facades\XgPaymentGateway;

class Shurjopay extends XgPaymentGateway
{
    private string $username;
    private string $password;
    private string $orderPrefix;
    private string $currency;
    private bool   $env;
    private string $exchangeRate;

    public function setUsername(mixed $param): void
    {
        $this->username = $param;
    }

    public function setPassword(mixed $param): void
    {
        $this->password = $param;
    }

    public function setOrderPrefix(mixed $param): void
    {
        $this->orderPrefix = $param;
    }

    public function setCurrency(mixed $globalCurrency): void
    {
        $this->currency = $globalCurrency;
    }

    public function setEnv(bool $param): void
    {
        $this->env = $param;
    }

    public function setExchangeRate(mixed $usdConversionValue): void
    {
        $this->exchangeRate = $usdConversionValue;
    }

    /**
     * @throws ShurjopayException
     */
    public function charge_customer($data){

        $payment_request = new PaymentRequest();

        $payment_request->currency = 'BDT';
        $payment_request->amount = $this->currency === 'USD' ? ($data['amount'] * $this->exchangeRate) : $data['amount'];
        $payment_request->discountAmount = '0';
        $payment_request->discPercent = '0';
        $payment_request->customerName = $data['name'];
        $payment_request->customerPhone = '';
        $payment_request->customerEmail = $data['email'];
        $payment_request->customerAddress = 'Dhaka';
        $payment_request->customerCity = 'Dhaka';
        $payment_request->customerState = 'Dhaka';
        $payment_request->customerPostcode = '';
        $payment_request->customerCountry = 'Bangladesh';
        $payment_request->shippingAddress = 'Dhaka';
        $payment_request->shippingCity = 'Dhaka';
        $payment_request->shippingCountry = 'Bangladesh';
        $payment_request->receivedPersonName = $data['name'];
        $payment_request->shippingPhoneNumber = '';
        $payment_request->value1 = '';
        $payment_request->value2 = '';
        $payment_request->value3 = '';
        $payment_request->value4 = '';

        $shurjopayInstance = new \ShurjopayPlugin\Shurjopay($this->getShurjopayConfig($data['ipn_url']));

        return $shurjopayInstance->makePayment($payment_request);
    }

    public function verify_payment(Request $request){
        $order_id = $request->order_id;
        $response=$this->sp_instance->verifyPayment($order_id);
        print_r($response);exit;
    }

    private function getShurjopayConfig(string $ipnUrl): ShurjopayConfig
    {
        $config = new ShurjopayConfig();
        $config->username = $this->username;
        $config->password = $this->password;
        $config->api_endpoint = $this->env ? 'https://sandbox.shurjopayment.com' : 'https://engine.shurjopayment.com';
        $config->callback_url = $ipnUrl;
        $config->log_path = 'logs/shurjopay.log';
        $config->order_prefix = $this->orderPrefix;
        $config->ssl_verifypeer = 1;

        return $config;
    }
}