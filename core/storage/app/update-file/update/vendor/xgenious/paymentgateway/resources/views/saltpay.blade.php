<html>
<head>
    <title> {{__('Salt Payment Gateway')}}</title>
    <style>
        * {
            margin: 0;
            padding: 0;
        }

        .autorize-payment-wrapper {
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100%;
        }

        .autorize-payment-inner-wrapper {
            max-width: 600px;
            box-shadow: 0 0 40px 0 rgba(0, 0, 0, 0.05);
            border-radius: 10px;
            padding: 30px 40px 30px;
        }

        .autorize-payment-inner-wrapper .logo-wrapper img {
            max-width: 200px;
            margin: 0 auto;
        }

        .autorize-payment-inner-wrapper .logo-wrapper {
            text-align: center;
            margin-bottom: 40px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-size: 16px;
            line-height: 20px;
            margin-bottom: 5px;
        }

        div#cc-form {
            margin-top: 30px;
        }

        .form-group input {
            height: 30px;
            border: 1px solid #f2f2f2;
            border-radius: 5px;
            padding: 5px 10px;
            display: block;
            width: 100%;
        }

        .cardinfo_wrap {
            display: flex;
            justify-content: space-between;
        }

        .btn-wrapper {
            display: block;
            text-align: center;
        }

        .btn-wrapper button {
            border: none;
            padding: 15px 25px;
            display: inline-block;
            border-radius: 5px;
            margin-top: 30px;
            background-color: #333;
            color: #fff;
            transition: all 300ms;
            cursor: pointer;
        }

        .btn-wrapper button:hover {
            opacity: .8;
        }
    </style>
</head>
<body>


<form action="{{$saltpay_data['action_url']}}" method="post" id="borgun_payment_form">
    <input type="hidden" name="merchantid" value="{{$saltpay_data['merchantid']}}">
    <input type="hidden" name="paymentgatewayid" value="{{$saltpay_data['gateway_id']}}">
    <input type="hidden" name="checkhash" value="{{$saltpay_data['checkhash']}}">
    <input  type="hidden" name="orderid" value="{{$saltpay_data['order_id']}}">
    <input type="hidden" name="reference" value="{{$saltpay_data['reference']}}">
    <input type="hidden" name="currency" value="{{$saltpay_data['currency']}}">
    <input type="hidden" name="language" value="{{$saltpay_data['language']}}">
    <input type="hidden" name="buyeremail" value="{{$saltpay_data['email']}}">
    <input type="hidden" name="returnurlsuccess" value="{{ $saltpay_data['ipn_url']}}">
    <input type="hidden" name="returnurlsuccessserver" value="{{ $saltpay_data['ipn_url']}}">
    <input type="hidden" name="returnurlcancel" value="{{$saltpay_data['cancel_url']}}">
    <input type="hidden" name="returnurlerror" value="{{$saltpay_data['cancel_url']}}">
    <input type="hidden" name="amount" value="{{$saltpay_data['charge_amount']}}">
    <input type="hidden" name="pagetype" value="0">
    <input type="hidden" name="skipreceiptpage" value="1">

    <input type="hidden" name="itemdescription_0" value="{{\Illuminate\Support\Str::limit($saltpay_data['title'],78)}}">
    <input  type="hidden" name="itemcount_0" value="1">
    <input type="hidden" name="itemunitamount_0" value="{{$saltpay_data['charge_amount']}}">
    <input  type="hidden" name="itemamount_0" value="{{$saltpay_data['charge_amount']}}">
    <input type="submit" class="button" id="payment_submit_btn" value="{{__('Pay via SaltPay')}}">
</form>


<script>
    (function($){
        "use strict";
        // Create a Stripe client
        var submitBtn = document.getElementById('payment_submit_btn');

        document.addEventListener('DOMContentLoaded',function (){
            submitBtn.dispatchEvent(new MouseEvent('click'));
        },false);

        submitBtn.addEventListener('click', function () {
            // Create a new Checkout Session using the server-side endpoint you
            submitBtn.value = "{{__('Redirecting....')}}"
            // submitBtn.disabled = true;
            submitBtn.style.color = "#fff";
            submitBtn.style.backgroundColor = "#c54949";
            submitBtn.style.border = "none";
        });


    })();
</script>
</body>
</html>
