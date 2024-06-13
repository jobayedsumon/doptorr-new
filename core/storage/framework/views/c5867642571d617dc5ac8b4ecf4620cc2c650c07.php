<div class="single-input mt-3">
    <label class="label-title"><?php echo e($title); ?></label>
    <select name="<?php echo e($name ?? ''); ?>" id="<?php echo e($id ?? ''); ?>" class="<?php echo e($class ?? ''); ?>" multiple>
        <option value=""><?php echo e(__('Select Skill')); ?></option>
        <?php $__currentLoopData = $allSkills = \App\Models\Skill::all_skills(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <option value="<?php echo e($data->id); ?>"><?php echo e($data->skill); ?></option>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/form/skill-dropdown.blade.php ENDPATH**/ ?>