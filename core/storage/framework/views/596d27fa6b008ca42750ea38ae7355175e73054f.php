<?php if($isFunded == 'complete'): ?>
    <span class="myJob-wrapper-single-fixed active"><?php echo e(__('Funded')); ?></span>
<?php else: ?>
    <?php if($paymentGateway != 'manual_payment' && $isFunded == 'pending'): ?>
        <span class="myJob-wrapper-single-fixed danger"><?php echo e(__('Payment Failed')); ?></span>
    <?php else: ?>
        <span class="myJob-wrapper-single-fixed danger"><?php echo e(__('Not Funded')); ?></span>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/order/is-funded.blade.php ENDPATH**/ ?>