<?php if(Cache::has('user_is_online_'.$userID)): ?>
    <span class="single-freelancer-author-status"> <?php echo e(__('Active')); ?> </span>
<?php else: ?>
    <span class="single-freelancer-author-status-ofline"> <?php echo e(__('Inactive')); ?> </span>
<?php endif; ?><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/status/user-active-inactive-check.blade.php ENDPATH**/ ?>