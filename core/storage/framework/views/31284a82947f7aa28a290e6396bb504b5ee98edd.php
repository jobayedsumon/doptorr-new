<!DOCTYPE html>
<html lang="<?php echo e(get_user_lang()); ?>" dir="<?php echo e(get_user_lang_direction()); ?>">
<head>
    <title><?php echo e(__('Order Invoice')); ?></title>
    <?php
        $site_favicon = get_attachment_image_by_id(get_static_option('site_favicon'),"full",false);
    ?>
    <?php if($site_favicon): ?>
        <link rel="icon" href="<?php echo e($site_favicon['img_url'] ?? ''); ?>" sizes="40x40" type="icon/png">
    <?php endif; ?>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <style type="text/css" media="screen">
        html {
            font-family: sans-serif;
            line-height: 1.15;
            margin: 0;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
            font-size: 10px;
            margin: 36pt;
        }

        h4 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        strong {
            font-weight: bolder;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        table {
            border-collapse: collapse;
        }

        th {
            text-align: inherit;
        }

        h4, .h4 {
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        h4, .h4 {
            font-size: 1.5rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
        }

        .table.table-items td {
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }
        * {
            font-family: "DejaVu Sans";
        }
        body, h1, h2, h3, h4, h5, h6, table, th, tr, td, p, div {
            line-height: 1.1;
        }
        .party-header {
            font-size: 1.5rem;
            font-weight: 400;
        }
        .total-amount {
            font-size: 12px;
            font-weight: 700;
        }
        .border-0 {
            border: none !important;
        }
        .cool-gray {
            color: #6B7280;
        }
        .invoice-logo img{
            width: 200px;
            height: 40px;
        }

    </style>
</head>

<body>

<?php if(get_static_option('site_logo')): ?>
    <div class="invoice-logo">
        <?php echo render_image_markup_by_attachment_id(get_static_option('site_logo')); ?>

    </div>
<?php endif; ?>

<table class="table mt-5">
    <tbody>
    <tr>
        <td class="border-0 pl-0" width="70%">
            <h4 class="text-uppercase">
                <strong><?php echo e(__('Order Invoice')); ?></strong>
            </h4>
        </td>
        <td class="border-0 pl-0">
            <p><?php echo e(__('Order ID')); ?> <strong>#000<?php echo e($order->id); ?></strong></p>
            <p><?php echo e(__('Invoice Date')); ?>: <strong><?php echo e(\Carbon\Carbon::now()->toDateString()); ?></strong></p>
        </td>
    </tr>
    </tbody>
</table>


<table class="table">
    <thead>
    <tr>
        <th class="border-0 pl-0 party-header" width="48.5%">
            <?php echo e(__('Freelancer')); ?>

        </th>
        <th class="border-0" width="3%"></th>
        <th class="border-0 pl-0 party-header">
            <?php echo e(__('Client')); ?>

        </th>
    </tr>
    </thead>
    <tbody>
    <tr>
        <td class="px-0">
            <?php if($order?->freelancer->fullname): ?>
                <p class="seller-name">
                    <strong><?php echo e($order?->freelancer->fullname); ?></strong>
                </p>
            <?php endif; ?>
        </td>
        <td class="border-0"></td>
        <td class="px-0">
            <?php if($order?->user->fullname): ?>
                <p class="buyer-name">
                    <strong><?php echo e($order?->user->fullname); ?></strong>
                </p>
            <?php endif; ?>
        </td>
    </tr>
    </tbody>
</table>


<table class="table table-items">
    <thead>
    <tr>
        <th scope="col" class="border-0 pl-0"><?php echo e(__('Description')); ?></th>
        <th scope="col" class="border-0 pl-0"><?php echo e(__('Quantity')); ?></th>
        <th scope="col" class="border-0 pl-0"><?php echo e(__('Price')); ?></th>
        <th scope="col" class="text-right border-0 pr-0"><?php echo e(__('Sub total')); ?></th>
    </tr>
    </thead>
    <tbody>
    
    <tr>
        <td class="pl-0">
            <p class="cool-gray">
                <?php echo e(__('Order Date:')); ?> <?php echo e($order->created_at->toFormattedDateString()); ?> <br>
                <?php echo e(__('Payment Gateway:')); ?>

                <?php if($order->payment_gateway == 'manual_payment'): ?>
                    <?php echo e(ucfirst(str_replace('_',' ',$order->payment_gateway))); ?>

                <?php else: ?>
                    <?php echo e($order->payment_gateway == 'authorize_dot_net' ? __('Authorize.Net') : ucfirst($order->payment_gateway)); ?>

                <?php endif; ?>
            </p>
        </td>
        <td class="pl-0">1</td>
        <td class="pl-0"><?php echo e(float_amount_with_currency_symbol($order->price - ($order->transaction_amount + $order->commission_amount))); ?></td>
        <td class="text-right"><?php echo e(float_amount_with_currency_symbol($order->price - ($order->transaction_amount + $order->commission_amount))); ?></td>
    </tr>
    
    <tr>
        <td colspan="2" class="border-0"></td>
        <td class="text-left pl-0"><?php echo e(__('Transaction fee')); ?></td>
        <td class="text-right pr-0"><?php echo e(float_amount_with_currency_symbol($order->transaction_amount)); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="border-0"></td>
        <td class="text-left pl-0"><?php echo e(__('Commission amount')); ?></td>
        <td class="text-right pr-0"><?php echo e(float_amount_with_currency_symbol($order->commission_amount)); ?></td>
    </tr>
    <tr>
        <td colspan="2" class="border-0"></td>
        <td class="text-left pl-0"><?php echo e(__('Total amount')); ?></td>
        <td class="text-right pr-0 total-amount"><?php echo e(float_amount_with_currency_symbol($order->price)); ?></td>
    </tr>
    </tbody>
</table>

<br>
<p>
    <?php echo e(__('Amount in words')); ?>: <?php echo e(\Terbilang::make($order->price)); ?>

</p>
<?php if($order->description): ?>
    <p>
        <?php echo e(__('Notes')); ?>: <?php echo e(__(Str::limit($order->description,300)) ?? ''); ?>

    </p>
<?php endif; ?>
</body>
</html>
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/user/client/order/order-invoice.blade.php ENDPATH**/ ?>