<?php
namespace Xgenious\Paymentgateway\Base;
interface RecurringSupport {
    public function charge_customer_recurring(array $args);
    public function ipn_response_recurring(array $args = []);
}

