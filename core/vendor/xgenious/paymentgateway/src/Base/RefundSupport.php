<?php
namespace Xgenious\Paymentgateway\Base;
interface RefundSupport {
    public function refund(array $args);
    public function ipn_response_refund(array $args = []);
}

