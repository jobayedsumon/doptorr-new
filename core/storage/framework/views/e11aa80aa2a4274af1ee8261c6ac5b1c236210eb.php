<div class="single-input">
    <label for="title" class="label-title"><?php echo e($title); ?></label>
    <input type="<?php echo e($type); ?>" name="<?php echo e($name); ?>" id="<?php echo e($id ?? ''); ?>" value="<?php echo e($value ?? old($name)); ?>" placeholder="<?php echo e($placeholder); ?>" class="form-control" >
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/form/email.blade.php ENDPATH**/ ?>