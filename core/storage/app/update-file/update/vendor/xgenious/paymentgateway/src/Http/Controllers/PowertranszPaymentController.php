<?php

namespace Xgenious\Paymentgateway\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Unicodeveloper\Paystack\Facades\Paystack;
use Xgenious\Paymentgateway\Facades\XgPaymentGateway;

class PowertranszPaymentController extends Controller
{
    public function charge_customer(Request $request){
       $payment_data =  XgPaymentGateway::powertranz()->charge_customer_from_controller();
       return $payment_data;
    }
}
