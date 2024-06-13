<style>
    .alert-success {
        border-color: #f2f2f2;
        border-left: 5px solid #319a31;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 0;
        padding: 5px;
    }
    .alert-danger {
        border-color: #f2f2f2;
        border-left: 5px solid #c69500;
        background-color: #f2f2f2;
        color: #333;
        border-radius: 0;
        padding: 5px;
    }
</style>

<?php if($status === 0): ?>
    <span class="alert alert-danger" ><?php echo e(__('Not Verified')); ?></span>
<?php elseif($status === 1): ?>
    <span class="alert alert-success" ><?php echo e(__('Verified')); ?></span>
<?php endif; ?>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/status/table/verified-status.blade.php ENDPATH**/ ?>