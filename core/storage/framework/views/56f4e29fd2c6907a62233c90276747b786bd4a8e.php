<div class="single-profile-settings" id="display_freelancer_profile_info">
    <div class="single-profile-settings-header">
        <div class="single-profile-settings-header-flex">
            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.form-title','data' => ['title' => __('Personal Information'),'class' => 'single-profile-settings-header-title']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.form-title'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Personal Information')),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('single-profile-settings-header-title')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            <div class="btn-wrapper">
                <a href="javascript:void(0)" class="btn-profile btn-outline-gray profile-click"><i
                        class="fa-regular fa-edit"></i><?php echo e(__('Edit Info')); ?></a>
            </div>
        </div>
    </div>
    <div class="single-profile-settings-inner profile-border-top">
        <div class="single-profile-settings-form custom-form">
            <div class="single-flex-input">
                <div class="single-input">
                    <label for="title" class="label-title"><?php echo e(__('First Name')); ?></label>
                    <input value="<?php echo e(Auth::guard('web')->user()->first_name ?? ''); ?>" class="form-control" readonly
                        disabled>
                </div>
                <div class="single-input">
                    <label for="title" class="label-title"><?php echo e(__('Last Name')); ?></label>
                    <input value="<?php echo e(Auth::guard('web')->user()->last_name ?? ''); ?>" class="form-control" readonly
                        disabled>
                </div>
            </div>
            <div class="single-input">
                <label for="title" class="label-title"><?php echo e(__('Your Email')); ?></label>
                <input value="<?php echo e(Auth::guard('web')->user()->email ?? ''); ?>" class="form-control" readonly disabled>
            </div>
            <div class="single-input">
                <label for="title" class="label-title"><?php echo e(__('Your Country')); ?></label>
                <input value="<?php echo e(optional(Auth::guard('web')->user()->user_country)->country ?? ''); ?>"
                    class="form-control" readonly disabled>
            </div>
            <div class="single-input">
                <label for="title" class="label-title"><?php echo e(__('Your State')); ?></label>
                <input value="<?php echo e(optional(Auth::guard('web')->user()->user_state)->state ?? ''); ?>" class="form-control"
                    readonly disabled>
            </div>
            <div class="single-input">
                <label for="title" class="label-title"><?php echo e(__('Your City')); ?></label>
                <input value="<?php echo e(optional(Auth::guard('web')->user()->user_city)->city ?? ''); ?>" class="form-control"
                    readonly disabled>
            </div>
            <div class="single-input">
                <label for="title" class="label-title"><?php echo e(__('Your Experience Level')); ?></label>
                <input value="<?php echo e(ucfirst(Auth::guard('web')->user()->experience_level) ?? ''); ?>" class="form-control"
                    readonly disabled>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/user/freelancer/profile/profile-info.blade.php ENDPATH**/ ?>