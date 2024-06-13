<div class="single-input">
    <label class="label-title"><?php echo e($title ?? ''); ?></label>
    <select name="<?php echo e($name ?? ''); ?>" id="<?php echo e($id ?? ''); ?>" class="form-control country_select2">
        <option value=""><?php echo e(__('Select Country')); ?></option>
        <?php $__currentLoopData = $all_countries = \Modules\CountryManage\Entities\Country::all_countries(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($country->id); ?>" <?php if(Auth::guard('web')->check() && $country->id == Auth::guard('web')->user()->country_id): ?> selected <?php endif; ?>><?php echo e($country->country); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    <span class="country_info"></span>
</div>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/form/country-dropdown.blade.php ENDPATH**/ ?>