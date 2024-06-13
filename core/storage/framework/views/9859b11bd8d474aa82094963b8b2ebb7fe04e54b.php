<div class="<?php echo e($class ?? 'single-input'); ?>">
    <label class="label-title"><?php echo e($title ?? __('Delivery Time')); ?></label>
    <select name="<?php echo e($name ?? 'duration'); ?>" id="<?php echo e($id ?? 'duration'); ?>" class="<?php echo e($selectClass ?? 'form-control'); ?> ">
        <option value=""><?php echo e(__('Select Delivery Time')); ?></option>
        <option value="1 Days"><?php echo e(__('1 Days')); ?></option>
        <option value="2 Days"><?php echo e(__('2 Days')); ?></option>
        <option value="3 Days"><?php echo e(__('3 Days')); ?></option>
        <option value="Less than a week"><?php echo e(__('Less than a Week')); ?></option>
        <option value="Less than a month"><?php echo e(__('Less than a month')); ?></option>
        <option value="Less than 2 month"><?php echo e(__('Less than 2 month')); ?></option>
        <option value="Less than 3 month"><?php echo e(__('Less than 3 month')); ?></option>
        <option value="More than 3 month"><?php echo e(__('More than 3 month')); ?></option>
    </select>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/duration/delivery-time.blade.php ENDPATH**/ ?>