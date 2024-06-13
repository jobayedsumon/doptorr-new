# paymentgateway

> General information about this package.
## Installation For laravel 9x

##### Configure Your Composer.json file to install this package
add below code to your ``composer.json`` file

````shell
 "repositories": [
        {
            "type": "vcs",
            "url": "https://github.com/Sharifur/paymentgateway.git"
        }
    ],
````

run below command to install this package from your command promt or terminal
````shell
composer require xgenious/paymentgateway 
````

if this payment package asked you for username and password here is it or generate your own token.
```apacheconf

```


Information about the installation procedure for this package.
> use Version 3.x for laravel 9
> all payment gateway is now support v2/v3

## Supported Payment Gateway List

1. Paytm
2. PayPal
3. Stripe 
4. Midtrans
5. Razorpay
6. Mollie
7. FlutterwaveRave
8. Paystack
9. Payfast
10. Cashfree 
11. Instamojo 
12. Mercado pago 
13. Squareup 
14. Cinetpay 
15. PayTabs 
16. BillPlz 
17. Zitopay 
18. Toyyibpay 
19. Pagali 
20. Autorize.Net 
21. SitesWay 
22. TransactionCloud 
23. WiPay
24. KineticPay
25. Senangpay
26. SaltPay
27. Iyzipay
28. Paymob
29. PowertranzPay
* PayU (upcoming) 
* PerfectMoney (upcoming)
* payumoney (upcoming)
* Paytr (upcoming)
* Pagseguro (upcoming)


## 2.0 Setup For Paytm
route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

#### charge_customer method example
```php

$paytm = XgPaymentGateway::paytm();
$paytm->setMerchantId('Digita57697814558795');
$paytm->setMerchantKey('dv0XtmsPYpewNag&');
$paytm->setMerchantWebsite('WEBSTAGING');
$paytm->setChannel('WEB');
$paytm->setIndustryType('Retail');
$paytm->setCurrency("EUR");
$paytm->setEnv(true); // this must be type of boolean , string will not work
$paytm->setExchangeRate(74); // if INR not set as currency

$response =  $paytm->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.paytm.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example

```php
$paytm = XgPaymentGateway::paytm();
$paytm->setMerchantId('Digita57697814558795');
$paytm->setMerchantKey('dv0XtmsPYpewNag&');
$paytm->setMerchantWebsite('WEBSTAGING');
$paytm->setChannel('WEB');
$paytm->setIndustryType('Retail');
$paytm->setEnv(true); //env must set as boolean, string will not work
dd($paytm->ipn_response());

```



## CinetPay

[Checkout CinetPay Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/cinetpay/)


#### Paytm ipn route example
````php
Route::post('/cinetpay-ipn', [\App\Http\Controllers\PaymentLogController::class,'cinetpay_ipn'] )->name('payment.cinetpay.ipn');
````
you must have to excluded cinetpay ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'cinetpay-ipn'
    ];
}
````


## 2.0 Setup For Cinetpay
Cinetpay payment gateway is only supported in version  > v2.x

#### charge_customer method example
```php
$cinetpay = XgPaymentGateway::cinetpay();
$cinetpay->setAppKey('LE9C12TNM5HAS');
$cinetpay->setSiteId('EAAAEOuLQObrVwJvCvoio3H13b8Ssqz1ighmTBKZvIENW9qxirHGHkqsGcPBC1uN');
$cinetpay->setCurrency("USD");
$cinetpay->setEnv(true);
$cinetpay->setExchangeRate(74); // if ['XOF', 'XAF', 'CDF', 'GNF', 'USD'] not set as currency

$response =  $paytm->charge_customer([
    'amount' => 10, // minimum 100 amount is required to process payment if usd not set as currency
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.cinetpay.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example

```php
$cinetpay = XgPaymentGateway::cinetpay();
$cinetpay->setAppKey('LE9C12TNM5HAS');
$cinetpay->setSiteId('EAAAEOuLQObrVwJvCvoio3H13b8Ssqz1ighmTBKZvIENW9qxirHGHkqsGcPBC1uN');
$cinetpay->setEnv(true); //env must set as boolean, string will not work
dd($cinetpay->ipn_response());

```


#### CinetPay test credentials
```apacheconf
apiKey = "12912847765bc0db748fdd44.40081707"; 
site_id = "445160";
```



## 2.0 Setup For Paypal
route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

#### charge_customer method example
```php

$paypal = XgPaymentGateway::paypal();
$paypal->setClientId('client_id'); // provide sandbox id if payment env set to true, otherwise provide live credentials
$paypal->setClientSecret('client_secret'); // provide sandbox id if payment env set to true, otherwise provide live credentials
$paypal->setAppId('app_id'); // provide sandbox id if payment env set to true, otherwise provide live credentials
$paypal->setCurrency("EUR");
$paypal->setEnv(true); //env must set as boolean, string will not work
$paypal->setExchangeRate(74); // if INR not set as currency

$response =  $paypal->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.instamojo.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example

```php
$paypal = XgPaymentGateway::paypal();
$paypal->setClientId('AUP7AuZMwJbkee-2OmsSZrU-ID1XUJYE-YB-2JOrxeKV-q9ZJZYmsr-UoKuJn4kwyCv5ak26lrZyb-gb');
$paypal->setClientSecret('EEIxCuVnbgING9EyzcF2q-gpacLneVbngQtJ1mbx-42Lbq-6Uf6PEjgzF7HEayNsI4IFmB9_CZkECc3y');
$paypal->setEnv(true); //env must set as boolean, string will not work
$paypal->setAppId('641651651958');
dd($paypal->ipn_response());

```



## 2.0 Setup For Stripe
route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

#### charge_customer method example
```php
$stripe = XgPaymentGateway::stripe();
$stripe->setSecretKey('sk_test_51GwS1SEmGOuJLTMs2vhSliTwAGkOt4fKJMBrxzTXeCJoLrRu8HFf4I0C5QuyE3l3bQHBJm3c0qFmeVjd0V9nFb6Z00VrWDJ9Uw');
$stripe->setPublicKey('pk_test_51GwS1SEmGOuJLTMsIeYKFtfAT3o3Fc6IOC7wyFmmxA2FIFQ3ZigJ2z1s4ZOweKQKlhaQr1blTH9y6HR2PMjtq1Rx00vqE8LO0x');
$stripe->setCurrency("EUR");
$stripe->setEnv(true); //env must set as boolean, string will not work
$stripe->setExchangeRate(74); // if INR not set as currency

$response =  $stripe->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.instamojo.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example

```php
$stripe = XgPaymentGateway::stripe();
$stripe->setSecretKey('sk_test_51GwS1SEmGOuJLTMs2vhSliTwAGkOt4fKJMBrxzTXeCJoLrRu8HFf4I0C5QuyE3l3bQHBJm3c0qFmeVjd0V9nFb6Z00VrWDJ9Uw');
$stripe->setPublicKey('pk_test_51GwS1SEmGOuJLTMsIeYKFtfAT3o3Fc6IOC7wyFmmxA2FIFQ3ZigJ2z1s4ZOweKQKlhaQr1blTH9y6HR2PMjtq1Rx00vqE8LO0x');
$stripe->setEnv(true); //env must set as boolean, string will not work
dd($stripe->ipn_response());

```

## 2.0 Setup For Midtrans
route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

#### charge_customer method example
```php
$midtrans = XgPaymentGateway::midtrans();
$midtrans->setClientKey('SB-Mid-client-iDuy-jKdZHkLjL_I');
$midtrans->setServerKey('SB-Mid-server-9z5jztsHyYxEdSs7DgkNg2on');
$midtrans->setCurrency("IDR");
$midtrans->setEnv(true); //true mean sandbox mode , false means live mode
$midtrans->setExchangeRate(74); // if IDR not set as currency

$response =  $midtrans->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.instamojo.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example

```php
$midtrans->setClientKey('client_key');
$midtrans->setServerKey('server_key');
$midtrans->setEnv(true); //true mean sandbox mode , false means live mode
dd($midtrans->ipn_response());

```


#### Midtrans ipn route example
````php
Route::get('/midtrans-ipn', [\App\Http\Controllers\PaymentLogController::class,'midtrans_ipn'] )->name('payment.midtrans.ipn');
````

#### Midtrans Test Cards
```
VISA                                        Description
4811 1111 1111 1114                         3DS Enabled
4911 1111 1111 1113                         3DS Enabled. Transaction Denied by Bank

4411 1111 1111 1118                         3DS Disabled
4511 1111 1111 1117                         3DS Disabled. Challenged by Fraud Detection
4611 1111 1111 1116                         3DS Disabled. Denied by Fraud Detection
4711 1111 1111 1115                         3DS Disabled. Transaction Denied by Bank

MASTERCARD                                  Description
5211 1111 1111 1117                         3DS Enabled
5111 1111 1111 1118                         3DS Enabled. Transaction Denied by Bank

5410 1111 1111 1116                         3DS Disabled
5510 1111 1111 1115                         3DS Disabled. Challenged by Fraud Detection
5411 1111 1111 1115                         3DS Disabled. Denied by Fraud Detection
5511 1111 1111 1114                         3DS Disabled. Transaction Denied by Bank
```

## 2.0 Setup For Razorpay
[Checkout Razorpay Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/razorpay/)
route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

#### charge_customer method example
```php

$razorpay = XgPaymentGateway::razorpay();
$razorpay->setApiKey('rzp_test_SXk7LZqsBPpAkj');
$razorpay->setApiSecret('Nenvq0aYArtYBDOGgmMH7JNv');
$razorpay->setCurrency("EUR");
$razorpay->setEnv(true); //env must set as boolean, string will not work
$razorpay->setExchangeRate(74); // if INR not set as currency

$response =  $razorpay->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.instamojo.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example

```php
$razorpay = XgPaymentGateway::razorpay();
$razorpay->setApiKey('rzp_test_SXk7LZqsBPpAkj');
$razorpay->setApiSecret('Nenvq0aYArtYBDOGgmMH7JNv');
$razorpay->setEnv(true); //env must set as boolean, string will not work
dd($razorpay->ipn_response());

```







## 2.0 Setup For Mollie
[Checkout Mollie Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/mollie/)
route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method
#### Mollie ipn route example
````php
Route::get('/mollie-ipn', [\App\Http\Controllers\PaymentLogController::class,'mollie_ipn'] )->name('payment.razorpay.ipn');
````

#### charge_customer method example
```php

$mollie = XgPaymentGateway::mollie();
$mollie->setApiKey('api_key');
$mollie->setCurrency("EUR");
$mollie->setEnv(true); //env must set as boolean, string will not work
$mollie->setExchangeRate(74); // if INR not set as currency

$response =  $mollie->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.mollie.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example

```php
$mollie = XgPaymentGateway::mollie();
$mollie->setApiKey('api_key');
$mollie->setCurrency("EUR");
$mollie->setEnv(true); //env must set as boolean, string will not work
$mollie->setExchangeRate(74); // if INR not set as currency
dd($mollie->ipn_response());

```


## FlutterwaveRave

[Checkout Flutterwave Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/flutterwave/)

#### FlutterwaveRave ipn route example
````php
Route::get('/flutterwave-ipn', [\App\Http\Controllers\PaymentLogController::class,'flutterwave_ipn'] )->name('payment.flutterwave.ipn');
````

###### Test Cards
````apacheconf
Test MasterCard PIN authentication
 Card number: 5531 8866 5214 2950
 cvv: 564
 Expiry: 09/32
 Pin: 3310
 OTP: 12345

Card number: 4556052704172643
  cvv: 899
  Expiry: 09/32
  Pin: 3310
  OTP: 12345

````



## 2.0 Setup For Flutterwave
route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

#### charge_customer method example
```php

$flutterwave = XgPaymentGateway::flutterwave();
$flutterwave->setPublicKey('FLWPUBK_TEST-86cce2ec43c63e09a517290a8347fcab-X');
$flutterwave->setSecretKey('FLWSECK_TEST-d37a42d8917db84f1b2f47c125252d0a-X');
$flutterwave->setCurrency("USD");
$flutterwave->setEnv(true); //env must set as boolean, string will not work
$flutterwave->setExchangeRate(74); // if NGN not set as currency

$response =  $flutterwave->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.instamojo.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```

#### ipn_response method example

```php
$flutterwave = XgPaymentGateway::flutterwave();
$flutterwave->setPublicKey('FLWPUBK_TEST-86cce2ec43c63e09a517290a8347fcab-X');
$flutterwave->setSecretKey('FLWSECK_TEST-d37a42d8917db84f1b2f47c125252d0a-X');
$flutterwave->setCurrency("USD");
$flutterwave->setEnv(true);  //env must set as boolean, string will not work
dd($flutterwave->ipn_response());

```




## Paystack

[Checkout Paystack Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/paystack/)

Here is Test Credentials For Paystack

#### Paystack ipn route example
````php
Route::get('/paystack-ipn', [\App\Http\Controllers\PaymentLogController::class,'paystack_ipn'] )->name('payment.paystack.ipn');
````

> Note: paystack does not support multiple ipn route, it supports only one webhook you can add in paystack dashboard. you can use $arg['payment_type'] data for check which kind of payment processed



route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

#### charge_customer method example
```php

$paystack = XgPaymentGateway::paystack();
$paystack->setPublicKey('pk_test_a7e58f850adce9a73750e61668d4f492f67abcd9');
$paystack->setSecretKey('sk_test_2a458001d806c878aba51955b962b3c8ed78f04b');
$paystack->setMerchantEmail('sopnilsohan03@gmail.com');
$paystack->setCurrency("EUR");
$paystack->setEnv(true); //env must set as boolean, string will not work
$paystack->setExchangeRate(74); // if NGN not set as currency

$response =  $paystack->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.instamojo.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example

```php
$paystack = XgPaymentGateway::paystack();
$paystack->setPublicKey('pk_test_a7e58f850adce9a73750e61668d4f492f67abcd9');
$paystack->setSecretKey('sk_test_2a458001d806c878aba51955b962b3c8ed78f04b');
$paystack->setMerchantEmail('sopnilsohan03@gmail.com');
$paystack->setEnv(true);  //env must set as boolean, string will not work
dd($paystack->ipn_response());

```



## Payfast
[Checkout Payfast Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/payfast/)

Here is Test Credentials For Payfast


#### Payfast ipn route example
````php
Route::post('/payfast-ipn', [\App\Http\Controllers\PaymentLogController::class,'payfast_ipn'] )->name('payment.payfast.ipn');
````
you must have to excluded Payfast ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'payfast-ipn'
    ];
}
````
route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

#### charge_customer method example
```php

$payfast = XgPaymentGateway::payfast();
$payfast->setMerchantId('10024000');
$payfast->setMerchantKey('77jcu5v4ufdod');
$payfast->setPassphrase('testpayfastsohan');
$payfast->setCurrency("ZAR");
$payfast->setEnv(true); //env must set as boolean, string will not work
$payfast->setExchangeRate(74); // if INR not set as currency

$response =  $payfast->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.instamojo.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example

```php
$payfast = XgPaymentGateway::payfast();
$payfast->setMerchantId('10024000');
$payfast->setMerchantKey('77jcu5v4ufdod');
$payfast->setPassphrase('testpayfastsohan');
$payfast->setCurrency("ZAR");
$payfast->setEnv(true); //env must set as boolean, string will not work
dd($payfast->ipn_response());

```



## Cashfree
[Checkout Cashfree Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/cashfree/)


#### Cashfree ipn route example
````php
Route::post('/cashfree-ipn', [\App\Http\Controllers\PaymentLogController::class,'cashfree_ipn'] )->name('payment.cashfree.ipn');
````
you must have to excluded Cashfree ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'cashfree-ipn'
    ];
}
````

route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

#### charge_customer method example 
```php
$cashfree = XgPaymentGateway::cashfree();
$cashfree->setAppId('app_id');
$cashfree->setSecretKey('secret_key');
$cashfree->setCurrency("USD");
$cashfree->setEnv(true); //true means sandbox, false means live , //env must set as boolean, string will not work
$cashfree->setExchangeRate(74); // if INR not set as currency

$response =  $cashfree->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.cashfree.ipn'),
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example

```php
$cashfree = XgPaymentGateway::cashfree();
$cashfree->setAppId('app_id');
$cashfree->setSecretKey('secret_key');
$cashfree->setEnv(true); //true means sandbox, false means live  //env must set as boolean, string will not work
dd($cashfree->ipn_response());

```


## Instamojo
[Checkout Instamojo Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/instamojo)

>> Instamojo Pago only works with INR currency

#### Instamojo ipn route example
````php
Route::get('/instamojo-ipn', [\App\Http\Controllers\PaymentLogController::class,'instamojo_ipn'] )->name('payment.instamojo.ipn');
````

##### Test Credentials for Instamojo
````
mobile number 919090213229
For payments use the following card details:
Number: 4242 4242 4242 4242
Date: Any valid future date
CVV: 111
Name: abc
3D-secure password: 1221
````

## 2.0 Setup For Instamojo
route and middleware code will be same as version ^1.0, version ^2.0 will change only customer_charge and ipn_response method

#### charge_customer method example
```php
$instamojo = XgPaymentGateway::instamojo();
$instamojo->setClientId('client_id');
$instamojo->setSecretKey('secret_key');
$instamojo->setCurrency("INR");
$instamojo->setEnv(true); //true mean sandbox mode , false means live mode //env must set as boolean, string will not work
$instamojo->setExchangeRate(74); // if INR not set as currency

$response =  $instamojo->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.instamojo.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example

```php
$instamojo = XgPaymentGateway::instamojo();
$instamojo->setClientId('client_id');
$instamojo->setSecretKey('secret_key');
$instamojo->setEnv(true); //env must set as boolean, string will not work
dd($instamojo->ipn_response());

```


## Mercadopago

[Checkout Mercadopago Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/mercadopago/)

>> Mercado Pago only works with BRL currency 

#### Mercado ipn route example
````php
Route::get('/mercadopago-ipn', [\App\Http\Controllers\PaymentLogController::class,'mercadopago_ipn'] )->name('payment.mercadopago.ipn');
````

##### Test Credentials for Mercadopago
````
For payments use the following card details:
Number: 5031 4332 1540 6351
Date: 11/25
CVV: 123
Name: abc
````


## 2.0 Setup For Instamojo
route and middleware code will be same as version ^1.0, version ^2.0, will change only customer_charge and ipn_response method

#### charge_customer method example
```php
$mercadopago = XgPaymentGateway::mercadopago();
$mercadopago->setClientId('client_id');
$mercadopago->setClientSecret('client_secret');
$mercadopago->setCurrency("USD");
$mercadopago->setExchangeRate(82); // if BRL not set as currency, you must have to provide exchange rate for it
$mercadopago->setEnv(true); ////true mean sandbox mode , false means live mode
$response =  $mercadopago->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
	@@ -804,11 +804,11 @@ return $response;
#### ipn_response method example

```php
$mercadopago = XgPaymentGateway::mercadopago();
$mercadopago->setClientId('client_id');
$mercadopago->setClientSecret('client_secret');
$mercadopago->setEnv(true); 
dd($mercadopago->ipn_response());

```

#### ipn_response method example

```php
$mercadopago = XgPaymentGateway::mercadopago();
$mercadopago->setClientId('client_id');
$mercadopago->setClientSecret('client_secret');
$mercadopago->setEnv(true); 
dd($mercadopago->ipn_response());

```


## Squareup

[Checkout Squareup Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/how-to-get-square-payment-gateway-api-credentials/)

Here is Test Credentials For Squareup 

>> Squareup supported currency list

#### Squareup ipn route example
````php
Route::get('/Squareup-ipn', [\App\Http\Controllers\PaymentLogController::class,'Squareup_ipn'] )->name('payment.mercadopago.ipn');
````

##### Api Credentials for Squareup
```apacheconf
access_token = 'EAAAEOuLQObrVwJvCvoio3H13b8Ssqz1ighmTBKZvIENW9qxirHGHkqsGcPBC1uN'
location_id = 'LE9C12TNM5HAS'
```
##### Test Credentials for Squareup
````
Mastercard	5105 1051 0510 5100	
CVC: 111
Date: any future date

Discover	
6011 0000 0000 0004	
CVC: 111
Date: any future date

Diners Club	3000 000000 0004	
CVC: 111
Date: any future date


JCB	3569 9900 1009 5841	
CVC: 111
Date: any future date

Name: Test
Email: test@gmail.com
````


## 2.0 Setup For Squareup
#### charge_customer method example
```php
$squareup = XgPaymentGateway::squareup();
$squareup->setLocationId('location_id');
$squareup->setAccessToken('access_token');
$squareup->setApplicationId('');
$squareup->setCurrency("USD");
$squareup->setEnv(true);
$squareup->setExchangeRate(74); // if INR not set as currency
$response =  $squareup->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.get.ipn'),
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
 return $response;
```
#### ipn_response method example

```php
$squareup = XgPaymentGateway::squareup();
$squareup->setLocationId('location_id');
$squareup->setAccessToken('access_token');
$squareup->setApplicationId('');
$squareup->setCurrency("USD");
$squareup->setEnv(true);
dd($squareup->ipn_response());

```


## PayTabs

[Checkout PayTabs Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/how-to-get-paytabs-payment-gateway-api-credentials/)

Here is Test Credentials For PayTabs 

>> PayTabs supported currency list

#### PayTabs ipn route example
````php
Route::post('/paytabs-ipn', [\App\Http\Controllers\PaymentLogController::class,'paytabs_ipn'] )->name('payment.mercadopago.ipn');
````

#### Add This class to config/app.php (Its Mendatory)
````php
\Paytabscom\Laravel_paytabs\PaypageServiceProvider::class
````

##### Api Credentials for PayTabs
```phpregexp
[
'currency' => 'USD', //['AED','EGP','SAR','OMR','JOD','USD']
'profile_id' => '96698',
'region' => 'GLOBAL', // ['ARE','EGY','SAU','OMN','JOR','GLOBAL']
'server_key' => 'SKJNDNRHM2-JDKTZDDH2N-H9HLMJNJ2L'
]
```
##### Test Credentials for PayTabs
````
Number	            Scheme	CVV	3D enrolled

4000000000000002	Visa	123	Yes
4111111111111111	Visa	123	No
4012001036983332	Visa	530	Yes
5498383801606532	MasterCard	977	Yes
5200000000000007	MasterCard	977	Yes
5200000000000114	MasterCard	977	No
````


## 2.0 Setup For PayTabs
#### charge_customer method example
```php
$paytabs = XgPaymentGateway::paytabs();
$paytabs->setProfileId('96698');
$paytabs->setRegion('GLOBAL');
$paytabs->setServerKey('SKJNDNRHM2-JDKTZDDH2N-H9HLMJNJ2L');
$paytabs->setCurrency("USD");
$paytabs->setEnv(true);
$paytabs->setExchangeRate(74); // if ['AED','EGP','SAR','OMR','JOD','USD'] not set as currency
$response =  $paytabs->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.post.ipn'),
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example for PayTabs

```php
$paytabs = XgPaymentGateway::paytabs();
$paytabs->setProfileId('96698');
$paytabs->setRegion('GLOBAL');
$paytabs->setServerKey('SKJNDNRHM2-JDKTZDDH2N-H9HLMJNJ2L');
$paytabs->setCurrency("USD");
dd($paytabs->ipn_response());

```

## 2.0 Setup For BillPlz
[Checkout BillPlz Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/how-to-setup-api-for-billplz-payment-gateway/)

>> Billplz supported currency list ['MYR]


#### Billplz ipn route example
````php
Route::post('/billplz-ipn', [\App\Http\Controllers\PaymentLogController::class,'billplz_ipn'] )->name('payment.billplz.ipn');
````

##### Api Credentials for Billplz
```phpregexp
[
'key' => 'b2ead199-e6f3-4420-ae5c-c94f1b1e8ed6',
'version' => 'v4',
'x_signature' => 'S-HDXHxRJB-J7rNtoktZkKJg',
'collection_name' => 'kjj5ya006'
]
```

#### charge_customer method example
```php
$billplz = XgPaymentGateway::billplz();
$billplz->setKey('b2ead199-e6f3-4420-ae5c-c94f1b1e8ed6');
$billplz->setVersion('v4');
$billplz->setXsignature('S-HDXHxRJB-J7rNtoktZkKJg');
$billplz->setCollectionName('kjj5ya006');
$billplz->setCurrency("MYR");
$billplz->setEnv(true);
$billplz->setExchangeRate(50); // if ['MYR'] not set as currency
$response =  $billplz->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('payment.post.ipn'),
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
return $response;
```
#### ipn_response method example for Billplz

```php
$billplz = XgPaymentGateway::billplz();
$billplz->setKey('b2ead199-e6f3-4420-ae5c-c94f1b1e8ed6');
$billplz->setVersion('v4');
$billplz->setXsignature('S-HDXHxRJB-J7rNtoktZkKJg');
$billplz->setCollectionName('kjj5ya006');
$billplz->setCurrency("MYR");
$billplz->setEnv(true);
dd($billplz->ipn_response());

```
## 2.0 Setup For Zitopay
[Checkout Zitopay Setup Documentation](https://xgenious.com/docs/nexelit/payment-gateway-settings/zitopay-payment-gateway-setup)

>> Zitopay supported currency list [
"USD",
"EUR",
"GBP",
"AED",
"AFN",
"ALL",
"AMD",
"ANG",
"AOA",
"ARS",
"AUD",
"AWG",
"AZN",
"BAM",
"BBD",
"BDT",
"BGN",
"BHD",
"BIF",
"BMD",
"BND",
"BOB",
"BRL",
"BSD",
"BTN",
"BWP",
"BYN",
"BZD",
"CAD",
"CDF",
"CHF",
"CLP",
"CNY",
"COP",
"CRC",
"CUP",
"CVE",
"CZK",
"DJF",
"DKK",
"DOP",
"DZD",
"EGP",
"ERN",
"ETB",
"FJD",
"GEL",
"GHS",
"GMD",
"GNF",
"GTQ",
"GYD",
"HNL",
"HRK",
"HTG",
"HUF",
"IDR",
"ILS",
"INR",
"IQD",
"IRR",
"ISK",
"JMD",
"JOD",
"JPY",
"KES",
"KGS",
"KHR",
"KMF",
"KPW",
"KRW",
"KWD",
"KZT",
"LAK",
"LBP",
"LKR",
"LRD",
"LSL",
"LTL",
"LVL",
"LYD",
"MAD",
"MDL",
"MGA",
"MKD",
"MMK",
"MNT",
"MRO",
"MUR",
"MVR",
"MWK",
"MXN",
"MYR",
"MZN",
"NAD",
"NGN",
"NIO",
"NOK",
"NPR",
"NZD",
"OMR",
"PAB",
"PEN",
"PGK",
"PHP",
"PKR",
"PLN",
"PYG",
"QAR",
"RON",
"RSD",
"RUB",
"RWF",
"SAR",
"SCR",
"SDG",
"SEK",
"SGD",
"SLL",
"SOS",
"SRD",
"STD",
"SVC",
"SYP",
"SZL",
"THB",
"TJS",
"TMT",
"TND",
"TOP",
"TRY",
"TTD",
"TWD",
"TZS",
"UAH",
"UGX",
"UYU",
"UZS",
"VEF",
"VND",
"VUV",
"WST",
"XCD",
"XOF",
"YER",
"ZAR",
"ZMW",
"ZWD",
"XAF",
]

#### Zitopay ipn route example
````php
Route::post('/zitopay-ipn', [\App\Http\Controllers\PaymentLogController::class,'zitopay_ipn'] )->name('payment.zitopay.ipn'); //need to exclude from csrf token varification
````
you must have to excluded Zitopay ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'zitopay-ipn'
    ];
}
````

#### charge_customer method example
```php
$zitopay = XgPaymentGateway::zitopay();
$zitopay->setUsername('dvrobin4');
$zitopay->setCurrency("USD");
$zitopay->setEnv(true);
$zitopay->setExchangeRate(50); // if INR not set as currency
$args = [
    'amount' => 250,
    'title' => 'this is test title',
    'description' => 'description',
    'ipn_url' => route('payment.post.ipn'),
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'email@mgil.com',
    'name' => 'sharifur',
    'payment_type' => 'order',
];
$response =  $zitopay->charge_customer($args);
return $response;
```
#### ipn_response method example for Zitopay

```php
$zitopay = XgPaymentGateway::zitopay();
$zitopay->setUsername('dvrobin4');
$zitopay->setCurrency("USD");
$zitopay->setEnv(true);
$zitopay->setExchangeRate(50); // if INR not set as currency
dd($zitopay->ipn_response());
```

## 3.0 Setup For Toyyibpay
[Checkout Toyyibpay Setup Documentation](https://docs.xgenious.com/docs/nexelit/payment-gateway-settings/toyyibpay-payment-gateway-setup)
```php
>> Toyyibpay supported currency list ["MYR"]
````
#### Toyyibpay ipn route example
````php
Route::post('/toyyibpay-ipn', [\App\Http\Controllers\PaymentLogController::class,'toyyibpay_ipn'] )->name('payment.toyyibpay.ipn'); //need to exclude from csrf token varification
````
you must have to excluded Toyyibpay ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'toyyibpay-ipn'
    ];
}
````

#### charge_customer method example
```php
$toyyibpay = XgPaymentGateway::toyyibpay();
$toyyibpay->setUserSecretKey('wnbtrqle-9t9l-m02j-e2bz-iaj2tkp52sfo');
$toyyibpay->setCategoryCode('0m0j9yc4');
$toyyibpay->setEnv(true);
$toyyibpay->setCurrency("MYR");
$toyyibpay->setExchangeRate(74); //only support MYR Currency
return $toyyibpay->charge_customer([
    'amount' => 10, 
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('post.ipn'), //post route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
    'phone' => 12345678
]);
```
#### ipn_response method example for Toyyibpay

```php
$toyyibpay = XgPaymentGateway::toyyibpay();
$toyyibpay->setUserSecretKey('wnbtrqle-9t9l-m02j-e2bz-iaj2tkp52sfo');
$toyyibpay->setCategoryCode('0m0j9yc4');
$toyyibpay->setEnv(true);
$toyyibpay->ipn_response();
```



## Setup For Pagali
[Checkout Pagali Setup Documentation](https://docs.xgenious.com/docs/nexelit/payment-gateway-settings/pagali-payment-gateway-setup)
```php
>> Pagali supported currency list ['MYR','USD','EUR','CVE']
````
#### Pagali ipn route example
````php
Route::post('/pagali-ipn', [\App\Http\Controllers\PaymentLogController::class,'pagali_ipn'] )->name('payment.pagali.ipn'); //need to exclude from csrf token varification
````
you must have to excluded Pagali ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'pagali-ipn'
    ];
}
````

#### charge_customer method example
```php
$pagali = XgPaymentGateway::pagalipay();
$pagali->setPageId('');
$pagali->setEntityId('');
$pagali->setCurrency("MYR");
$pagali->setEnv(true); // this must be type of boolean , string will not work
$pagali->setExchangeRate(74); // if INR not set as currency

$response =  $pagali->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('post.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
```
#### ipn_response method example for Pagali

```php
$pagali = XgPaymentGateway::pagalipay();
$pagali->setPageId('');
$pagali->setEntityId('');
$pagali->setCurrency("MYR");
$pagali->setEnv(true); // this must be type of boolean , string will not work
dd($pagali->ipn_response());
```


## Setup For Authorize.Net
[Checkout Authorize.nnt Setup Documentation](https://docs.xgenious.com/docs/nexelit/payment-gateway-settings/authorize-payment-gateway-setup)
```php
>>  Authorize.Net supported currency list ['AUD', 'CAD', 'CHF', 'DKK', 'EUR', 'GBP', 'JPY', 'NOK', 'NZD', 'SEK', 'USD', 'ZAR'];
````
####  Authorize.Net ipn route example
````php
Route::get('/authorize-ipn', [\App\Http\Controllers\PaymentLogController::class,'authorize_ipn'] )->name('payment.authorize.ipn'); //need to exclude from csrf token varification
````

#### charge_customer method example
```php

$authorize = XgPaymentGateway::authorizenet();
$authorize->setMerchantLoginId('2e8yjNL89kV2');
$authorize->setMerchantTransactionId('65968Gb3DU2ntX2v');
$authorize->setCurrency("USD");
$authorize->setEnv(true); // this must be type of boolean , string will not work
$authorize->setExchangeRate(74); // if INR not set as currency

$response =  $authorize->charge_customer([
    'amount' => 10,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('get.ipn'), //get route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rhamna',
    'payment_type' => 'order',
]);
```
#### ipn_response method example

```php
    $authorizenet = XgPaymentGateway::authorizenet();
    $authorizenet->setMerchantLoginId('2e8yjNL89kV2');
    $authorizenet->setMerchantTransactionId('65968Gb3DU2ntX2v');
    $authorizenet->setEnv(true); // this must be type of boolean , string will not work
    dd($authorizenet->ipn_response());
```

## Setup For SitesWay
no documentation available
```php
>> it support all currency 
````
#### SitesWay ipn route example
````php
Route::post('/siteways-ipn', [\App\Http\Controllers\PaymentLogController::class,'siteways_ipn'] )->name('payment.siteways.ipn'); //need to exclude from csrf token verification
````
you must have to excluded SitesWay ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'siteways-ipn'
    ];
}
````

#### charge_customer method example
```php
$sitesway = XgPaymentGateway::sitesway();
        $sitesway->setBrandId("-enter-brand-id-");
        $sitesway->setApiKey("--enter-api-key--");
        $sitesway->setCurrency("USD");
        $sitesway->setEnv(true); // this must be type of boolean , string will not work


        $response =  $sitesway->charge_customer([
            'amount' => 10,
            'title' => 'this is test title',
            'description' => 'this is test description',
            'ipn_url' => route('post.siteways.ipn'), //post route
            'order_id' => 56,
            'track' => 'asdfasdfsdf',
            'cancel_url' => route('payment.failed'),
            'success_url' => route('payment.success'),
            'email' => 'dvrobin4@gmail.com',
            'name' => 'sharifur rhamna',
            'payment_type' => 'order',
        ]);
        return $response;
```
#### ipn_response method example for Siteways

```php
    $sitesway = XgPaymentGateway::sitesway();
    $sitesway->setBrandId("-enter-brand-id-");
    $sitesway->setApiKey("--enter-api-key--");
    $sitesway->setCurrency("USD");
    $payment_data = $sitesway->ipn_response();
```


## Setup For WiPay
```php
>>  Wipay supported currency list  ['JMD', 'TTD', 'USD']
````
#### Wipay ipn route example
````php
Route::get('/wipay-ipn', [\App\Http\Controllers\PaymentLogController::class,'wipay_ipn'] )->name('payment.wipay.ipn'); 

````

#### charge_customer method example
```php
    $wipay = XgPaymentGateway::wipay();
    $wipay->setAccountNumber("1234567890");
    $wipay->setAccountApi("123");
    $wipay->setFeeStructure("customer_pay");
    $wipay->setCountryCode("TT");
    $wipay->setCurrency("USD");
    $wipay->setEnv(true); // this must be type of boolean , string will not work
    $wipay->setExchangeRate(74); // if INR not set as currency

    $response =  $wipay->charge_customer([
        'amount' => 10.5,
        'title' => 'this is test title',
        'description' => 'this is test description',
        'ipn_url' => route('get.ipn'), //post route
        'order_id' => 56,
        'track' => 'asdfasdfsdf',
        'cancel_url' => route('payment.failed'),
        'success_url' => route('payment.success'),
        'email' => 'dvrobin4@gmail.com',
        'name' => 'sharifur rahman',
        'payment_type' => 'order',
    ]);
    return $response;
```
#### ipn_response method example for WiPay

```php
    $wipay = XgPaymentGateway::wipay();
    $wipay->setAccountNumber("1234567890");
    $wipay->setAccountApi("123");
    $wipay->setFeeStructure("customer_pay");
    $wipay->setCountryCode("TT");
    $wipay->setCurrency("USD");
    $wipay->setEnv(true); // this must be type of boolean , string will not work
    $wipay->setExchangeRate(74); // if INR not set as currency
    $payment_data = $wipay->ipn_response();
    dd($payment_data);
```



## Setup For TransactionCloud
[Checkout TransactionCloud Setup Documentation](https://docs.xgenious.com/docs/nexelit/payment-gateway-settings/transaction-cloud-payment-gateway-setup)
```php
>>  TransactionCloud supported currency list  ['USD','EUR','PLN','INR','CAD','CNY','AUD','JPY','NOK','GBP','CHF','SGD','BRL','RUB','BGN','CZK','DKK','HUF','RON','SEK','GEL']
````
#### TransactionCloud ipn route example
````php
Route::get('/transactioncloud-ipn', [\App\Http\Controllers\PaymentLogController::class,'siteways_ipn'] )->name('payment.transactioncloud.ipn'); 

````
please note, TransactionCloud send all the ipn response to one single route which need to configure in TransactionCloud merchant panel as prodcut return url. you have to manage all the payment success process from one single route you will get a product_type param to get idea which kind of product payment ipn response it is

#### charge_customer method example
```php
    $transactionclud = XgPaymentGateway::transactionclud();
    $transactionclud->setApiLogin("API_QWGW6TO2N1I5A2L40W");
    $transactionclud->setApiPassword("EPKUZU6L7HR8BU5WHH");
    $transactionclud->setProductID("TC-PR_APo7g7R");
    $transactionclud->setCurrency("USD");
    $transactionclud->setEnv(true); // this must be type of boolean , string will not work
    $transactionclud->setExchangeRate(74); // if INR not set as currency
    
    $response =  $transactionclud->charge_customer([
        'amount' => 10.5,
        'title' => 'this is test title',
        'description' => 'this is test description',
        'ipn_url' => route('get.ipn'), //post route
        'order_id' => 56,
        'track' => 'asdfasdfsdf',
        'cancel_url' => route('payment.failed'),
        'success_url' => route('payment.success'),
        'email' => 'dvrobin4@gmail.com',
        'name' => 'sharifur rahman',
        'payment_type' => 'order',
    ]);
    return $response;
```
#### ipn_response method example for TransactionCloud

```php
    $transactionclud = XgPaymentGateway::transactionclud();
    $transactionclud->setApiLogin("API_QWGW6TO2N1I5A2L40W");
    $transactionclud->setApiPassword("EPKUZU6L7HR8BU5WHH");
    $transactionclud->setProductID("TC-PR_APo7g7R");
    $transactionclud->setEnv(true); // this must be type of boolean , string will not work
    $transactionclud->ipn_response();
```


## Setup For KineticPay
```php
>>  KineticPay supported currency list  ['MYR']
````
#### KineticPay ipn route example
````php
Route::post('/kineticpay-ipn', [\App\Http\Controllers\PaymentLogController::class,'KineticPay_ipn'] )->name('payment.KineticPay.ipn'); 

````
you must have to excluded KineticPay ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'kineticpay-ipn'
    ];
}
````

#### charge_customer method example
```php
    $kineticpay = XgPaymentGateway::kineticpay();
    $kineticpay->setMerchantKey("ede1c5e9f81c9d12bf418629f56a7870");
    $kineticpay->setBank("ABMB0212");
    $kineticpay->setCurrency("MYR");
    $kineticpay->setEnv(true); // this must be type of boolean , string will not work
    $kineticpay->setExchangeRate(74); // if INR not set as currency

    $response =  $kineticpay->charge_customer([
        'amount' => 10.5,
        'title' => 'this is test title',
        'description' => 'this is test description',
        'ipn_url' => route('post.ipn'), //post route
        'order_id' => 56,
        'track' => 'asdfasdfsdf',
        'cancel_url' => route('payment.failed'),
        'success_url' => route('payment.success'),
        'email' => 'dvrobin4@gmail.com',
        'name' => 'sharifur rahman',
        'payment_type' => 'order',
    ]);
    return $response;
```
#### ipn_response method example for kineticpay

```php
    $kineticpay = XgPaymentGateway::kineticpay();
    $kineticpay->setMerchantKey("ede1c5e9f81c9d12bf418629f56a7870");
    $kineticpay->setCurrency("MYR");
    $kineticpay->setEnv(true); // this must be type of boolean , string will not work
    $kineticpay->setExchangeRate(74); // if INR not set as currency
    $payment_data = $kineticpay->ipn_response();
```


## Setup For Senangpay
[Senangpay Documentation](https://docs.xgenious.com/docs/nexelit/payment-gateway-settings/how-to-configure-senangpay/)

```php
>>  Senangpay supported currency list  ['MYR']
````
#### Senangpay ipn route example
````php
Route::get('/senangpay-ipn', [\App\Http\Controllers\PaymentLogController::class,'senangpay_ipn'] )->name('payment.senangpay.ipn'); 

````
you must have to add this url to senangpay merchant panel as return url, you can use only one ipn because, senangpay does not support return url, or ipn url, you can manage multiple payment by pass payment_type, then filter it in single ipn route and manage it.



#### charge_customer method example
```php
    $senangpay = XgPaymentGateway::senangpay();
    $senangpay->setMerchantId('');
    $senangpay->setSecretKey('');
    $senangpay->setEnv(true);
    $senangpay->setHashMethod('sha256');
    $senangpay->setCurrency('MYR');
    $response =   $senangpay->charge_customer([
        'amount' => 10.5,
        'title' => 'this is test title',
        'description' => 'this is test description',
        'ipn_url' => route('get.ipn'), //post route
        'order_id' => 56,
        'track' => 'asdfasdfsdf',
        'cancel_url' => route('payment.failed'),
        'success_url' => route('payment.success'),
        'email' => 'dvrobin4@gmail.com',
        'name' => 'sharifur rahman',
        'payment_type' => 'order',
    ]);
    
    return $response;
```
#### ipn_response method example for Senangpay

```php
    $senangpay = XgPaymentGateway::senangpay();
    $senangpay->setMerchantId('');
    $senangpay->setSecretKey('');
    $senangpay->setEnv(true);
    $senangpay->setHashMethod('sha256');
    $senangpay->setCurrency('MYR');
    $payment_data = $senangpay->ipn_response();

    dd($payment_data);
```


#### charge_customer_recurring method example
```php
    $senangpay = XgPaymentGateway::senangpay();
    $senangpay->setMerchantId('');
    $senangpay->setSecretKey('');
    $senangpay->setRecurringId('169217592513'); //need to create product first in senangpay merchant panel and have to enable customer amount change option 
    $senangpay->setEnv(true);
    $senangpay->setHashMethod('sha256');
    $senangpay->setCurrency('MYR');
    $response =   $senangpay->charge_customer_recurring([
    'amount' => 10.5,
    'title' => 'this is test title',
    'description' => 'this is test description',
    'ipn_url' => route('get.ipn'), //post route
    'order_id' => 56,
    'track' => 'asdfasdfsdf',
    'cancel_url' => route('payment.failed'),
    'success_url' => route('payment.success'),
    'email' => 'dvrobin4@gmail.com',
    'name' => 'sharifur rahman',
    'payment_type' => 'order',
]);

return $response;

```

#### ipn_response_recurring method example for Senangpay

```php
    $senangpay = XgPaymentGateway::senangpay();
    $senangpay->setMerchantId('');
    $senangpay->setSecretKey('');
    $senangpay->setEnv(true);
    $senangpay->setHashMethod('sha256'); //need to set hash method in senangpay merchant panel
    $senangpay->setCurrency('MYR');
    $payment_data = $senangpay->ipn_response_recurring();
    dd($payment_data);
```

#### Test Card for Senangpay
````
Number:	5111111111111118
Expiry Month:	May
Expiry Year:	2025
CVV:	100
Card Name: anything

````



## Setup For SaltPay

```php
>>  Salt supported currency list  ['ISK', 'USD', 'EUR', 'GBP', 'DKK', 'NOK', 'SEK', 'CHF', 'JPY', 'CAD', 'HUF']
````
#### Salt ipn route example
````php
Route::post('/salt-ipn', [\App\Http\Controllers\PaymentLogController::class,'salt_ipn'] )->name('payment.saltpay.ipn'); 

````

you must have to excluded Salt ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'salt-ipn'
    ];
}
````


#### charge_customer method example
```php
    $saltpay = XgPaymentGateway::saltpay();
    $saltpay->setMerchantId('');
    $saltpay->setSecretKey('');
    $saltpay->setPaymentGatewayId(16);
    $saltpay->setEnv(true);
    $saltpay->setCurrency('USD');
    $response =   $saltpay->charge_customer([
        'amount' => 5,
        'title' => 'this is test title',
        'description' => 'this is test description',
        'ipn_url' => route('post.ipn'), //post route
        'order_id' => 56,
        'track' => 'asdfasdfsdf',
        'cancel_url' => route('payment.failed'),
        'success_url' => route('payment.success'),
        'email' => 'dvrobin4@gmail.com',
        'name' => 'sharifur rahman',
        'payment_type' => 'order',
    ]);
    return $response;
```
#### ipn_response method example for Saltpay

```php
$saltpay = XgPaymentGateway::saltpay();
$saltpay->setMerchantId('');
$saltpay->setSecretKey('');
$saltpay->setPaymentGatewayId(16);
$saltpay->setEnv(true);
$saltpay->setCurrency('USD');
$payment_data = $saltpay->ipn_response();

dd($payment_data);
```



## Setup For Iyzipay

```php
>>  Salt supported currency list  ['TRY', 'USD', 'EUR', 'GBP','IRR','NOK','RUB','CHF']
````
#### Iyzipay ipn route example
````php
Route::post('/iyzipay-ipn', [\App\Http\Controllers\PaymentLogController::class,'iyzipay_ipn'] )->name('payment.iyzipay.ipn'); 

````

you must have to excluded Iyzipay ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'iyzipay-ipn'
    ];
}
````


#### charge_customer method example
```php
    $iyzipay = XgPaymentGateway::iyzipay();
    $iyzipay->setSecretKey('sandbox-QsgXTUpizlCZzHaypMJwkL8YTMGsYMBM');
    $iyzipay->setApiKey('sandbox-wtyih1LNnlN1FtCei29rVjbZRKfqVeUC');
    $iyzipay->setEnv(false);
    $iyzipay->setCurrency('TRY');
    $response =   $iyzipay->charge_customer([
        'amount' => 5,
        'title' => 'this is test title',
        'description' => 'this is test description',
        'ipn_url' => route('post.ipn'), //post route
        'order_id' => 56,
        'track' => 'asdfasdfsdf',
        'cancel_url' => route('payment.failed'),
        'success_url' => route('payment.success'),
        'email' => 'dvrobin4@gmail.com',
        'name' => 'sharifur rahman',
        'payment_type' => 'order',
    ]);
    return $response;
```
#### ipn_response method example for Iyzipay

```php
$iyzipay = XgPaymentGateway::iyzipay();
$iyzipay->setSecretKey('sandbox-QsgXTUpizlCZzHaypMJwkL8YTMGsYMBM');
$iyzipay->setApiKey('sandbox-wtyih1LNnlN1FtCei29rVjbZRKfqVeUC');
$iyzipay->setEnv(true);
$iyzipay->setCurrency('TRY');
$payment_data = $iyzipay->ipn_response();

dd($payment_data);
```


## Setup For Paymob


```php
>>  paymob supported currency list  ['EGP', 'USD', 'EUR', 'GBP']
````
#### Paymob ipn route example
````php
Route::match(['get','post'],'/paymob-ipn', [\App\Http\Controllers\PaymentLogController::class,'paymob_ipn'] )->name('payment.paymob.ipn'); 

````

you must have to excluded Paymob ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'paymob-ipn'
    ];
}
````


#### charge_customer method example
```php
        $paymob = XgPaymentGateway::paymob();
        $paymob->setApiKey('=');
        $paymob->setIntegrationId('');
        $paymob->setIframeId('');
        //this payment gateway support mulple payment option. here is example of 4, 
//        $paymob->setGatewayType('accept-valu');
        $paymob->setGatewayType('accept-online');
//        $paymob->setGatewayType('accept-kiosk');
//        $paymob->setGatewayType('accept-wallet');
//        $paymob->setWalletMobileNumber('01010101010'); //require wallet mobile number, is you set gateway type "accept-wallet", this is user wallet number;

        $paymob->setSecretKey('');
        $paymob->setPublicKey('');
        $paymob->setHmacSecret('');
        $paymob->setEnv(true);
        $paymob->setCurrency('EGP'); 
        $response =   $paymob->charge_customer([
            'amount' => 5,
            'title' => 'this is test title',
            'description' => 'this is test description',
            'ipn_url' => route('post.ipn'), //post route
            'order_id' => 56,
            'track' => 'asdfasdfsdf',
            'cancel_url' => route('payment.failed'),
            'success_url' => route('payment.success'),
            'email' => 'dvrobin4@gmail.com',
            'name' => 'sharifur rahman',
            'payment_type' => 'order',
        ]);
        return $response;
```
#### ipn_response method example for Paymob

```php
    $paymob = XgPaymentGateway::paymob();
    $paymob->setApiKey('ZXlKaGJHY2lPaUpJVXpVeE1pSXNJblI1Y0NJNklrcFhWQ0o5LmV5SmpiR0Z6Y3lJNklrMWxjbU5vWVc1MElpd2ljSEp2Wm1sc1pWOXdheUk2T0RVNU5UY3pMQ0p1WVcxbElqb2lhVzVwZEdsaGJDSjkuSzZ3WUliNDN3MzdfNVpLVm9yQjdkYXo5bmh3UGtiVGNUUnlfNGhoVXVzWmYyYzJyMnpEb2VMWVRuMXZDSmtPcE1NWkdpNURmYU5mdHBmc3ZtdGlUeEE=');
    $paymob->setIntegrationId('4036562');
    $paymob->setIframeId('775086');
//        $paymob->setGatewayType('accept-valu');
    $paymob->setGatewayType('accept-online');
//        $paymob->setGatewayType('accept-kiosk');
//        $paymob->setGatewayType('accept-wallet');
//        $paymob->setWalletMobileNumber('01010101010'); //require wallet mobile number, is you set gateway type "accept-wallet", this is user wallet number;

    $paymob->setSecretKey('egy_sk_live_fccc02d55ad9719c077a8344b83d87a45a2babfadd750fd64ecc22e023196f9b');
    $paymob->setPublicKey('egy_pk_live_9ojAlERxBdcEuO7bZDyzx00xJNvi12Q5');
    $paymob->setHmacSecret('02D16CFDC2F224AE0E12416CC7FFEF9F');
    $paymob->setEnv(true);
    $paymob->setCurrency('EGP');
    $payment_data = $paymob->ipn_response();
    dd($payment_data);
```


## Setup For Powertranz


```php
>>  Powertranz supported currency list  ['EGP', 'USD', 'EUR', 'GBP']
````
#### Powertranz ipn route example
````php
Route::post('/powertranz-ipn', [\App\Http\Controllers\PaymentLogController::class,'powertranz_ipn'] )->name('payment.powertranz.ipn'); 

````

you must have to excluded Powertranz ipn route from csrf token verify, go to `app/Http/Middleware` ``VerifyCsrfToken`` Middleware add your route path here in ``$except`` array

````php
namespace App\Http\Middleware;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        'powertranz-ipn'
    ];
}
````


#### charge_customer method example for Powertranz
```php
    $powertranz = XgPaymentGateway::powertranz();
    $powertranz->setMerchantId('88803448');
    $powertranz->setMerchantProcessingPassword('SqroVVlPemN4gvlAKCbl7l5tvHzjOypnfqdYXMYv9ze4GsW3OaCABO');
    $powertranz->setGatewayKey('');
    $powertranz->setEnv(true);
    $powertranz->setCurrency('USD');
    $response =   $powertranz->charge_customer([
        'amount' => 5.2,
        'title' => 'this is test title',
        'description' => 'this is test description',
        'ipn_url' => route('post.ipn'), //post route
        'order_id' => 56,
        'track' => 'asdfasdfsdf',
        'cancel_url' => route('payment.failed'),
        'success_url' => route('payment.success'),
        'email' => 'dvrobin4@gmail.com',
        'name' => 'sharifur rahman',
        'payment_type' => 'order',
    ]);

    return $response;
```
#### ipn_response method example for Powertranz

```php
    $powertranz = XgPaymentGateway::powertranz();
    $powertranz->setMerchantId('88803448');
    $powertranz->setMerchantProcessingPassword('SqroVVlPemN4gvlAKCbl7l5tvHzjOypnfqdYXMYv9ze4GsW3OaCABO');
    $powertranz->setGatewayKey('');
    $powertranz->setEnv(true);
    $powertranz->setCurrency('USD');
    $payment_data = $powertranz->ipn_response();
    dd($payment_data);
```




## Using this package

Information about using this package

## Contributing
Information about contributing to this package.
Owner Of Package @sharifur
Bug Fix and minor Contributor
