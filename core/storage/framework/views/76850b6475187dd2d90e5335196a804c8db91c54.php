<div class="single-flex-input">
    <div class="single-input">
        <label class="label-title"><?php echo e($title ?? ''); ?></label>
        <select name="level" id="level" class="<?php echo e($class ?? 'form-control'); ?>">
            <option value=""><?php echo e(__('Select')); ?></option>
            <option value="junior"><?php echo e(__('Junior')); ?></option>
            <option value="midLevel"><?php echo e(__('MidLevel')); ?></option>
            <option value="senior"><?php echo e(__('Senior')); ?></option>
            <option value="not mandatory"><?php echo e(__('Not Mandatory')); ?></option>
        </select>
    </div>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/form/experience-level-dropdown.blade.php ENDPATH**/ ?>