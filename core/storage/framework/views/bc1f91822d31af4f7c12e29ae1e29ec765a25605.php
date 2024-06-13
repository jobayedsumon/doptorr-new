<!-- Budget, Skills Start -->
<div class="setup-wrapper-contents">
    <div class="setup-wrapper-contents-item">
        <div class="setup-bank-form">
            <div class="setup-bank-form-item">
                <label class="label-title"><?php echo e(__('Job type')); ?></label>
                <select class="form-control" name="type" id="type">
                    <option value="fixed" selected><?php echo e(__('Fixed-Price (Pay a fixed amount for the job)')); ?></option>
                </select>
            </div>
            <div class="setup-bank-form-item setup-bank-form-item-icon">
                <label class="label-title"><?php echo e(__('Enter Budget')); ?></label>
                <input type="number" class="form--control" name="budget" id="budget" placeholder="<?php echo e(__('Enter Your Budget')); ?>">
                <span class="input-icon"><?php echo e(get_static_option('site_global_currency') ?? ''); ?></span>
            </div>
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.skill-dropdown','data' => ['title' => __('Select Skill'),'name' => 'skill[]','id' => 'skill','class' => 'form-control skill_select2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.skill-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Select Skill')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('skill[]'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('skill'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control skill_select2')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <div class="setup-bank-form-item">
                <label class="photo-uploaded center-text w-100">
                    <div class="photo-uploaded-flex d-flex uploadImage">
                        <div class="photo-uploaded-icon"><i class="fa-solid fa-paperclip"></i></div>
                        <span class="photo-uploaded-para"><?php echo e(__('Add attachments')); ?></span>
                    </div>
                    <input class="photo-uploaded-file inputTag" type="file" name="attachment" id="attachment">
                </label>
            </div>
        </div>
    </div>
</div>
<!-- Budget, Skills Ends -->
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/user/client/job/create/job-budget.blade.php ENDPATH**/ ?>