<div class="single-input mb-3">
    <label class="label-title mt-3"><?php echo e($title); ?></label>
    <?php if(!empty($status)): ?>
        <select name="status" class="form-control">
            <option value="1" <?php if($status == 1): ?>selected <?php endif; ?>><?php echo e(__('Active')); ?></option>
            <option value="0" <?php if($status == 0): ?>selected <?php endif; ?>><?php echo e(__('Inactive')); ?></option>
        </select>
        <small class="text-info"><?php echo e($info ?? ''); ?></small>
    <?php else: ?>
        <select name="status" id="status" class="form-control">
            <option value="1"><?php echo e(__('Active')); ?></option>
            <option value="0"><?php echo e(__('Inactive')); ?></option>
        </select>
        <small class="<?php echo e($class ?? 'text-warning'); ?>"><?php echo e($info ?? ''); ?></small>
    <?php endif; ?>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/form/active-inactive.blade.php ENDPATH**/ ?>