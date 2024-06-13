<?php

namespace Xgenious\Paymentgateway\Base\Gateways;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Xgenious\Paymentgateway\Base\PaymentGatewayBase;
use Xgenious\Paymentgateway\Base\PaymentGatewayHelpers;
use Xgenious\Paymentgateway\Base\RecurringSupport;
use Xgenious\Paymentgateway\Facades\XgPaymentGateway;
use Xgenious\Paymentgateway\Traits\ConvertUsdSupport;
use Xgenious\Paymentgateway\Traits\CurrencySupport;
use Xgenious\Paymentgateway\Traits\IndianCurrencySupport;
use Xgenious\Paymentgateway\Traits\MyanmarCurrencySupport;
use Xgenious\Paymentgateway\Traits\PaymentEnvironment;
use CinetPay\CinetPay as CinetPayment;

class Senangpay extends PaymentGatewayBase implements RecurringSupport
{

    use CurrencySupport,PaymentEnvironment,MyanmarCurrencySupport;

    protected $merchant_id;
    protected $secret_key;
    protected $hash_method = "sha256";
    private $recurring_id;


    public function setMerchantId($merchant_id){
        $this->merchant_id = $merchant_id;
        return $this;
    }
    public function getMerchantId(){
        return $this->merchant_id;
    }

    public function setSecretKey($secret_key){
        $this->secret_key = $secret_key;
        return $this;
    }
    public function getSecretKey(){
        return $this->secret_key;
    }

    public function setHashMethod($hash_method){
        $this->hash_method = $hash_method;
        return $this;
    }
    public function getHashMethod(){
        return $this->hash_method;
    }

    public function charge_amount($amount)
    {
        if (in_array($this->getCurrency(), $this->supported_currency_list())){
            return $amount;
        }
        return $this->get_amount_in_myr($amount);
    }

    public function ipn_response(array $args = [])
    {


        
       $response = $this->verifyTransaction();
    //    dd($response,request()->all());
        if ($response->ok()){
            //write code for verify the transaction
            $response = $response->object();
                $data = current($response->data);
                $transaction_reference = $data->payment_info?->transaction_reference;
            if ($data->payment_info?->status !== "failed" && !empty($transaction_reference)){
                $pname = $data->product?->product_name;
                $payment_type = Str::of($pname)->after("##")->trim()->__toString();
                return [
                    'status' => 'complete',
                    "order_id" => XgPaymentGateway::unwrapped_id(request()->get('order_id')),
                    "payment_type" => $payment_type,
                    'transaction_id' => $transaction_reference
                ];
            }
        }

       return ['status' => 'failed',"order_id" => XgPaymentGateway::unwrapped_id(request()->get('order_id'))];
    }

    private function getTransactionStatusCheckApiUrl(){
        return $this->getEnv() ? 'https://sandbox.senangpay.my/apiv1/query_transaction_status/' : 'https://app.senangpay.my/apiv1/query_transaction_status/';
    }

    /**
     * @throws \Exception
     */
    public function charge_customer(array $args)
    {

        $merchant_id = $this->getMerchantId();
        $api_url = $this->getApiBaseUrl();

        # Prepare the data to send to senangPay
        $order_id =  XgPaymentGateway::wrapped_id($args['order_id']);
        $detail = "payment_type_##" . $args["payment_type"]; //here we can append payment_type
        $amount = $this->charge_amount($args['amount']);

        if($amount < 2){
            abort(501,__("minimum amount should be getter than 2RM"));
        }

        $hash_value = $this->getHasKey($detail,$amount,$order_id);;
        $name = $args['name'];
        $email = $args['email'];
        $phone = $args['phone'] ?? " ";

        /* post data */
        $post_args = array(
            'detail'   => $detail,
            'amount'   => $amount,
            'order_id' => $order_id,
            'hash'     => $hash_value,
            'name'     => $name,
            'email'    => $email,
            'phone'    => $phone
        );

        # Format it properly using get
        $senangpay_args = http_build_query($post_args);
        $url = $api_url . $merchant_id . '?' . $senangpay_args;
        return redirect($url);
    }



    public function supported_currency_list()
    {
        return ["MYR"];
    }

    public function charge_currency()
    {
        if (in_array($this->getCurrency(), $this->supported_currency_list())){
            return $this->getCurrency();
        }
        return  "MYR";
    }

    public function gateway_name()
    {
        return 'senangpay';
    }

    private function getApiBaseUrl()
    {
        return $this->getEnv() ? 'https://sandbox.senangpay.my/payment/' : 'https://app.senangpay.my/payment/';
    }


    private function getApiBaseUrlRecurring()
    {
        return $this->getEnv() ? 'https://api.sandbox.senangpay.my/recurring/payment/' : 'https://api.senangpay.my/recurring/payment/';
    }

    private function getHasKey(string $detail, mixed $amount, string $order_id)
    {
        return match ($this->getHashMethod()) {
            'md5' => $this->getMd5Hash($detail, $amount, $order_id),
            default => $this->getSha256Hash($detail, $amount, $order_id)
        };
    }

    private function getMd5Hash(string $detail, mixed $amount, string $order_id)
    {
        return md5($this->getSecretKey() . $detail . $amount . $order_id);
    }

    private function getSha256Hash(string $detail, mixed $amount, string $order_id)
    {
        return hash_hmac('sha256', $this->getSecretKey() . $detail . $amount . $order_id, $this->getSecretKey());
    }

    private function hashKeyForTransactionVerify(string $secretkey, string $hash_type, string $merchant_id, mixed $transaction_reference)
    {
        return match ($hash_type) {
            'md5' => $this->getMd5HashForTransactionVerify($secretkey, $merchant_id, $transaction_reference),
            default => $this->getSha256HashForTransactionVerify($secretkey, $merchant_id, $transaction_reference)
        };
    }

    private function getMd5HashForTransactionVerify(string $secretkey, string $merchant_id, mixed $transaction_reference)
    {
        return md5($merchant_id . $secretkey . $transaction_reference);
    }

    private function getSha256HashForTransactionVerify(string $secretkey, string $merchant_id, mixed $transaction_reference)
    {
        return hash_hmac('sha256', $merchant_id . $secretkey . $transaction_reference, $secretkey);
    }


    public function charge_customer_recurring(array $args)
    {
        $url = $this->getApiBaseUrlRecurring().$this->getMerchantId();


        $order_param = 'payment_type_###'.$args['payment_type'].'##'.XgPaymentGateway::wrapped_id($args['order_id']);
        $amount = $this->charge_amount($args['amount']);

        if($amount < 2){
            abort(501,__("minimum amount should be getter than 2RM"));
        }

        $params = http_build_query([
            'order_id' => $order_param,
            'recurring_id' => $this->getRecurringId(),
            'hash' => $this->getHashForRecurringPayment($order_param,$amount),
            'name' => $args['name'],
            'email' => $args['email'],
            'phone' => $args['phone'] ?? " ",
            'amount' => $amount
        ]);

        // dd($url,$params);
        $url =  $url.'?'.$params;

        return redirect($url);
    }

    public function ipn_response_recurring(array $args = [])
    {
        $response = $this->verifyTransaction();
        if ($response->ok()){
            //write code for verify the transaction
            $response = $response->object();
            $data = current($response->data);
            $transaction_reference = $data->payment_info?->transaction_reference;
            if ($data->payment_info?->status !== "failed" && !empty($transaction_reference)){
                $payment_type = Str::of(request()->get('order_id'))->after('###')->before('##')->__toString();
                $order_id = Str::of(request()->get('order_id'))->after('##')->after('##')->__toString();
                return [
                    'status' => 'complete',
                    "order_id" => XgPaymentGateway::unwrapped_id($order_id),
                    "payment_type" => $payment_type,
                    'transaction_id' => $transaction_reference
                ];
            }
        }

        return ['status' => 'failed',"order_id" => XgPaymentGateway::unwrapped_id(request()->get('order_id'))];
    }

    private function getHashForRecurringPayment(mixed $order_id,$amount)
    {
        return match ($this->getHashMethod()) {
            'md5' => $this->getMd5HashForRecurringPayment($order_id,$amount),
            default => $this->getSha256HashForRecurringPayment($order_id,$amount)
        };
    }

    private function getMd5HashForRecurringPayment(mixed $order_id,float|string|int $amount)
    {
        return md5($this->getSecretKey() . $this->getRecurringId() . $order_id.$amount);
    }

    private function getSha256HashForRecurringPayment(mixed $order_id,float|string|int $amount)
    {
        return hash('sha256', $this->getSecretKey() . $this->getRecurringId() . $order_id.$amount);
    }

    public function setRecurringId($recurring_id)
    {
        $this->recurring_id = $recurring_id;
        return $this;
    }
    public function getRecurringId(){
        return $this->recurring_id;
    }

    private function verifyTransaction()
    {
        $secretkey = $this->getSecretKey();
        $hash_type = $this->getHashMethod();
        $merchant_id = $this->getMerchantId();
        $transaction_reference = request()->get('transaction_id');

        $hash = $this->hashKeyForTransactionVerify($secretkey,$hash_type,$merchant_id,$transaction_reference);
        $url = $this->getTransactionStatusCheckApiUrl().$transaction_reference;

        $response = Http::withBasicAuth($this->getMerchantId(),'')->get($url,[
            'merchant_id' => $this->getMerchantId(),
            'transaction_reference' => $transaction_reference,
            'hash' => $hash
        ]);
        return $response;
    }
}
