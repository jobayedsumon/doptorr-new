<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        //client order
        'order/paytabs-ipn',

         //client deposit
        'client/wallet/payfast-ipn',
        'client/wallet/cashfree-ipn',
        'client/wallet/zitopay-ipn',
        'client/wallet/toyyibpay-ipn',
        'client/wallet/pagali-ipn',
        'client/wallet/siteways-ipn',
        'client/wallet/iyzipay-ipn',

        //freelancer deposit
        'freelancer/wallet/payfast-ipn',
        'freelancer/wallet/cashfree-ipn',
        'freelancer/wallet/zitopay-ipn',
        'freelancer/wallet/toyyibpay-ipn',
        'freelancer/wallet/pagali-ipn',
        'freelancer/wallet/siteways-ipn',
        'freelancer/wallet/iyzipay-ipn',
    ];
}
