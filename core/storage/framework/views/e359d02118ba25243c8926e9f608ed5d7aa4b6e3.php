<div class="single-input">
    <label class="label-title mt-3"><?php echo e($title); ?></label>
        <select name="<?php echo e($name); ?>" id="<?php echo e($id ?? ''); ?>" class="form-control country_select2">
            <option value=""><?php echo e($title); ?></option>
            <?php $__currentLoopData = $allData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($data->id); ?>"><?php echo e($data->country); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </select>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/form/select2-country-dropdown.blade.php ENDPATH**/ ?>