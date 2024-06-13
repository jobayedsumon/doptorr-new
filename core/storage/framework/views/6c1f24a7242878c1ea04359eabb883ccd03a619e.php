<div class="single-input <?php echo e($divClass ?? 'mb-3'); ?>">
    <label for="<?php echo e($id ?? ''); ?>" class="<?php echo e($labelClass ?? 'label-title'); ?>"><?php echo e($title ?? ''); ?></label>
    <input type="<?php echo e($type ?? ''); ?>" name="<?php echo e($name ?? ''); ?>" id="<?php echo e($id ?? ''); ?>" value="<?php echo e($value ?? ''); ?>" step="<?php echo e($step ?? ''); ?>" placeholder="<?php echo e($placeholder ?? ''); ?>" class="<?php echo e($class ?? 'form-control'); ?>" >
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/form/text.blade.php ENDPATH**/ ?>