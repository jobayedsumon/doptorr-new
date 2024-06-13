<div class="single-input mt-3">
    <label class="label-title"><?php echo e($title); ?></label>
    <select name="<?php echo e($name ?? ''); ?>" id="<?php echo e($id ?? ''); ?>" class="<?php echo e($class ?? ''); ?>">
        <option value=""><?php echo e(__('Select Category')); ?></option>
        <?php $__currentLoopData = $allCategories = \Modules\Service\Entities\Category::all_categories(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($data->id); ?>"><?php echo e($data->category); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/form/category-dropdown.blade.php ENDPATH**/ ?>