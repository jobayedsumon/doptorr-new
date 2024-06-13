<button class="order_sort btn-profile btn-bg-1" data-val="all">
    <?php echo e(__('All')); ?> <span> (<?php echo e($orders->total() ?? ''); ?>) </span>
</button>
<button class="order_sort" data-val="active">
    <?php echo e(__('Active')); ?> <span>(<?php echo e($active_orders); ?>) </span>
</button>
<button class="order_sort" data-val="queue">
    <?php echo e(__('Queue')); ?> <span> (<?php echo e($queue_orders); ?>) </span>
</button>
<button class="order_sort" data-val="cancel">
    <?php echo e(__('Cancelled')); ?> <span>(<?php echo e($cancel_orders); ?>) </span>
</button>
<button class="order_sort" data-val="complete">
    <?php echo e(__('Completed')); ?> <span>(<?php echo e($complete_orders); ?>) </span>
</button>

<input type="hidden" id="set_order_type_value" value="all">

<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/user/freelancer/order/order-count.blade.php ENDPATH**/ ?>