<style>
    .queue-order {
        border-color: #f2f2f2;
        border-left: 3px solid #e0a800;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 0;
        padding: 5px;
    }
    .active-order, .complete-order {
        border-color: #f2f2f2;
        border-left: 3px solid #3aad3a;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 0;
        padding: 5px;
    }
    .deliver-order {
        border-color: #f2f2f2;
        border-left: 3px solid #33BBC5;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 0;
        padding: 5px;
    }
    .cancel-order, .decline-order {
        border-color: #f2f2f2;
        border-left: 3px solid #dd0000;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 0;
        padding: 5px;
    }
    .cancel-order {
        border-color: #f2f2f2;
        border-left: 3px solid #cb801e;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 0;
        padding: 5px;
    }
</style>

<?php if($status === 0): ?>
    <span class="queue-order" ><?php echo e(__('Queue')); ?></span>
<?php elseif($status === 1): ?>
    <span class="active-order" ><?php echo e(__('Active')); ?></span>
<?php elseif($status === 2): ?>
    <span class="deliver-order" ><?php echo e(__('Delivered')); ?></span>
<?php elseif($status === 3): ?>
    <span class="complete-order" ><?php echo e(__('Complete')); ?></span>
<?php elseif($status === 4): ?>
    <span class="cancel-order" ><?php echo e(__('Cancel')); ?></span>
<?php elseif($status === 5): ?>
    <span class="decline-order" ><?php echo e(__('Decline')); ?></span>
<?php elseif($status === 7): ?>
    <span class="hold-order" ><?php echo e(__('Hold')); ?></span>
<?php endif; ?>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/status/table/order-status.blade.php ENDPATH**/ ?>