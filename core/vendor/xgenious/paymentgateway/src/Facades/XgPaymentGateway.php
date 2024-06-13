<?php

namespace Xgenious\Paymentgateway\Facades;

use Illuminate\Support\Facades\Facade;
use Xgenious\Paymentgateway\Base\Gateways\InstamojoPay;
use Xgenious\Paymentgateway\Base\PaymentGatewayHelpers;
use Xgenious\Paymentgateway\Base\Gateways\SquarePay;
/**
 * @see GlobalCurrency
 * @method static script_currency_list()
 *
 * @see PaymentGatewayHelpers
 * @method static stripe()
 * @method static paypal()
 * @method static midtrans()
 * @method static paytm()
 * @method static razorpay()
 * @method static mollie()
 * @method static flutterwave()
 * @method static paystack()
 * @method static payfast()
 * @method static cashfree()
 * @method static instamojo()
 * @method static mercadopago()
 * @method static payumoney()
 * @method static squareup()
 * @method static cinetpay()
 * @method static paytabs()
 * @method static zitopay()
 * @method static toyyibpay()
 * @method static pagalipay()
 * @method static authorizenet()
 * @method static sitesway()
 * @method static transactionclud()
 * @method static wipay()
 * @method static kineticpay()
 * @method static senangpay()
 * @method static saltpay()
 * @method static paymob()
 * @method static iyzipay()
 *
 */
/**
 * @see GlobalCurrency
 * @method static script_currency_list()
 *
 * @see PaymentGatewayHelpers
 * @method static stripe()
 * @method static paypal()
 * @method static midtrans()
 * @method static paytm()
 * @method static razorpay()
 * @method static mollie()
 * @method static flutterwave()
 * @method static paystack()
 * @method static payfast()
 * @method static cashfree()
 * @method static instamojo()
 * @method static mercadopago()
 * @method static payumoney()
 * @method static squareup()
 * @method static cinetpay()
 * @method static paytabs()
 * @method static zitopay()
 * @method static toyyibpay()
 * @method static pagalipay()
 * @method static authorizenet()
 * @method static sitesway()
 * @method static transactionclud()
 * @method static wipay()
 * @method static kineticpay()
 * @method static senangpay()
 * @method static saltpay()
 *
 */
/**
 * @see GlobalCurrency
 * @method static script_currency_list()
 *
 * @see PaymentGatewayHelpers
 * @method static stripe()
 * @method static paypal()
 * @method static midtrans()
 * @method static paytm()
 * @method static razorpay()
 * @method static mollie()
 * @method static flutterwave()
 * @method static paystack()
 * @method static payfast()
 * @method static cashfree()
 * @method static instamojo()
 * @method static mercadopago()
 * @method static payumoney()
 * @method static squareup()
 * @method static cinetpay()
 * @method static paytabs()
 * @method static zitopay()
 * @method static toyyibpay()
 * @method static pagalipay()
 * @method static authorizenet()
 * @method static sitesway()
 * @method static transactionclud()
 * @method static wipay()
 * @method static kineticpay()
 * @method static senangpay()
 * @method static saltpay()
 * @method static paymob()
 *
 */
class XgPaymentGateway extends Facade
{
    protected static function getFacadeAccessor(): string
    {
        return 'XgPaymentGateway';
    }
}
