<?php

namespace Xgenious\Paymentgateway\Tests\Gateways;

use Illuminate\Support\Facades\Http;
use Xgenious\Paymentgateway\Tests\TestCase;
use Xgenious\Paymentgateway\Base\Gateways\ZitoPay;

class ZitoPayTest extends TestCase
{
    public function test_charge_amount_returns_correct_amount()
    {
        $zitopay = new ZitoPay();
        $zitopay->setCurrency('USD');
        $this->assertEquals(10.00, $zitopay->charge_amount(10.00));
    }

    public function test_charge_amount_converts_to_usd_if_not_supported_currency()
    {
        $zitopay = new ZitoPay();
        $zitopay->setCurrency('DBD');
        $zitopay->setEnv(true);
        $zitopay->setExchangeRate(5);
        $this->assertEquals(50, $zitopay->charge_amount(10));
    }

    public function test_supported_currency_list_returns_array()
    {
        $zitopay = new ZitoPay();
        $this->assertIsArray($zitopay->supported_currency_list());
    }

    public function test_gateway_name_returns_zitopay()
    {
        $zitopay = new ZitoPay();
        $this->assertEquals('zitopay', $zitopay->gateway_name());
    }
    /* need to fix this code test */
    // public function test_ipn_response_returns_complete_if_transaction_is_successful()
    // {
    //     Http::fake([
    //         'zitopay.africa/api_v1' => Http::response([
    //             'status_msg' => 'COMPLETED',
    //             'zitopay_transaction_reference' => '123456',
    //         ], 200),
    //     ]);

    //     $zitopay = new ZitoPay();
    //     $result = $zitopay->ipn_response();

    //     $this->assertEquals('COMPLETED', $result['status']);
    //     $this->assertEquals('123456', $result['transaction_id']);
    //     $this->assertEquals('123', $result['order_id']);
    // }

    public function test_ipn_response_returns_failed_if_transaction_is_not_successful()
    {
        Http::fake([
            'zitopay.africa/api_v1' => Http::response([
                'status_msg' => 'DECLINED',
                'zitopay_transaction_reference' => '123456',
            ], 200),
        ]);

        $zitopay = new ZitoPay();
        $result = $zitopay->ipn_response(['ref' => 'order#123']);

        $this->assertEquals('failed', $result['status']);
    }
}
