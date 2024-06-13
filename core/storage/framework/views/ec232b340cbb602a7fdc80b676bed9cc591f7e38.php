<div class="single-input mb-3">
    <label class="label-title"><?php echo e($title ?? ''); ?></label>
    <div class="single-input-inner">
        <input type="<?php echo e($type ?? ''); ?>" name="<?php echo e($name ?? ''); ?>" id="<?php echo e($id ?? ''); ?>" class="<?php echo e($class ?? 'form-control'); ?>" placeholder="<?php echo e($placeholder ?? ''); ?>">
        <div class="toggle-password">
            <span class="show-icon"><i class="fa-solid fa-eye-slash"></i></span>
            <span class="hide-icon"><i class="fa-solid fa-eye"></i></span>
        </div>
    </div>
</div>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/form/password.blade.php ENDPATH**/ ?>