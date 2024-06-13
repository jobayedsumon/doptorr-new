<div class="single-input">
    <label class="label-title"><?php echo e($title); ?></label>
    <select name="<?php echo e($name ?? ''); ?>" id="<?php echo e($id ?? ''); ?>" class="form-control get_state_city city_select2">
        <option value=""><?php echo e(__('Select City')); ?></option>
        <?php $__currentLoopData = $all_cities = \Modules\CountryManage\Entities\City::all_cities(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $city): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($city->id); ?>" <?php if($city->id == Auth::guard('web')->user()->city_id): ?> selected <?php endif; ?>><?php echo e($city->city); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <span class="city_info"></span>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/form/city-dropdown.blade.php ENDPATH**/ ?>