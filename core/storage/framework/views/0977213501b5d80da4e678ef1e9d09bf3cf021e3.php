<?php if($status === 1): ?>
    <span class="job-progress"><?php echo e(__('Active Order')); ?></span>
<?php else: ?>
    <?php if($status === 0): ?>
        <span class="pending-approval"><?php echo e(__('Queue Order')); ?></span>
    <?php endif; ?>
    <?php if($status === 2): ?>
        <span class="pending-approval"><?php echo e(__('Deliver Order')); ?></span>
    <?php endif; ?>
    <?php if($status=== 3): ?>
        <span class="pending-approval"><?php echo e(__('Complete Order')); ?></span>
    <?php endif; ?>
    <?php if($status === 4): ?>
         <span class="pending-approval"><?php echo e(__('Cancel Order')); ?></span>
    <?php endif; ?>
    <?php if($status === 5): ?>
         <span class="pending-approval"><?php echo e(__('Decline Order')); ?></span>
    <?php endif; ?>
    <?php if($status === 6): ?>
         <span class="pending-approval"><?php echo e(__('Suspend Order')); ?></span>
    <?php endif; ?>
    <?php if($status === 7): ?>
        <span class="pending-approval"><?php echo e(__('Hold Order')); ?></span>
    <?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/order/order-status.blade.php ENDPATH**/ ?>