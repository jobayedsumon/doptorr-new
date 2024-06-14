<?php

namespace App\Helper;

use ShurjopayPlugin\PaymentRequest;
use ShurjopayPlugin\Shurjopay;
use ShurjopayPlugin\ShurjopayConfig;
use ShurjopayPlugin\ShurjopayException;

class ShurjopayHelper
{
    /**
     * @var Shurjopay
     */
    public Shurjopay $instance;

    /**
     * @var mixed|null
     */
    private mixed $currency;

    /**
     * @var mixed|null
     */
    private mixed $exchangeRate;

    public function __construct(?string $ipnUrl = '')
    {
        $sandbox            = get_static_option('shurjopay_test_mode') === 'on';
        $apiUrl             = $sandbox ? 'https://sandbox.shurjopayment.com' : 'https://engine.shurjopayment.com';
        $username           = $sandbox ? get_static_option('shurjopay_sandbox_username') : get_static_option('shurjopay_live_username');
        $password           = $sandbox ? get_static_option('shurjopay_sandbox_password') : get_static_option('shurjopay_live_password');
        $orderPrefix        = $sandbox ? get_static_option('shurjopay_sandbox_order_prefix') : get_static_option('shurjopay_live_order_prefix');
        $this->currency     = get_static_option('site_global_currency');
        $this->exchangeRate = get_static_option('site_usd_to_bdt_exchange_rate');

        $this->instance = new Shurjopay($this->getShurjopayConfig($apiUrl, $username, $password, $orderPrefix, $ipnUrl));
    }

    /**
     * @throws ShurjopayException
     */
    public function chargeCustomer($data)
    {
        $paymentRequest = new PaymentRequest();

        $paymentRequest->currency = 'BDT';
        $paymentRequest->amount = $this->currency === 'BDT' ? $data['amount'] : ($data['amount'] * $this->exchangeRate);
        $paymentRequest->discountAmount = '0';
        $paymentRequest->discPercent = '0';
        $paymentRequest->customerName = $data['name'];
        $paymentRequest->customerPhone = '01700000000';
        $paymentRequest->customerEmail = $data['email'];
        $paymentRequest->customerAddress = 'Dhaka';
        $paymentRequest->customerCity = 'Dhaka';
        $paymentRequest->customerState = 'Dhaka';
        $paymentRequest->customerPostcode = '1200';
        $paymentRequest->customerCountry = 'Bangladesh';
        $paymentRequest->shippingAddress = 'Dhaka';
        $paymentRequest->shippingCity = 'Dhaka';
        $paymentRequest->shippingCountry = 'Bangladesh';
        $paymentRequest->receivedPersonName = $data['name'];
        $paymentRequest->shippingPhoneNumber = '';
        $paymentRequest->value1 = $data['order_id'];
        $paymentRequest->value2 = '';
        $paymentRequest->value3 = '';
        $paymentRequest->value4 = '';

        return $this->instance->makePayment($paymentRequest);
    }

    private function getShurjopayConfig(string $apiUrl, string $username, string $password, string $orderPrefix, ?string $ipnUrl = ''): ShurjopayConfig
    {
        $config = new ShurjopayConfig();
        $config->username = $username;
        $config->password = $password;
        $config->api_endpoint = $apiUrl;
        $config->callback_url = $ipnUrl;
        $config->log_path = 'core/storage/logs';
        $config->order_prefix = $orderPrefix;
        $config->ssl_verifypeer = 1;

        return $config;
    }
}