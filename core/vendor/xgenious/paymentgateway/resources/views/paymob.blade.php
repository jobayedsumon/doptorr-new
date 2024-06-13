<html>
<head>
    <title> {{__('Paymob Payment Gateway')}}</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        iframe{
            width: 100%;
            height: 100%;
        }

    </style>
</head>
<body>
<div class="paymob-payment-wrapper">
    <div class="paymob-payment-inner-wrapper">
        <iframe src="{{$payment_url}}" frameborder="0"></iframe>
    </div>
</div>
</body>
</html>
