<style>
    .alert-warning {
        border-color: #f2f2f2;
        border-left: 3px solid #e0a800;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 0;
        padding: 5px;
    }
    .alert-success {
        border-color: #f2f2f2;
        border-left: 3px solid #319a31;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 0;
        padding: 5px;
    }
    .alert-danger {
        border-color: #f2f2f2;
        border-left: 3px solid #dd0000;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 0;
        padding: 5px;
    }
</style>

<?php if($status === 0): ?>
    <span class="alert alert-warning"><?php echo e(__('Pending')); ?></span>
<?php elseif($status === 1): ?>
    <span class="alert alert-success" ><?php echo e(__('Approved')); ?></span>
<?php elseif($status === 2): ?>
    <span class="alert alert-danger" ><?php echo e(__('Rejected')); ?></span>
<?php endif; ?>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/status/table/active-inactive.blade.php ENDPATH**/ ?>