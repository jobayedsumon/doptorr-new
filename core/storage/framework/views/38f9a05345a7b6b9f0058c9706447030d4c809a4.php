<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="LoginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="#" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <input type="hidden" id="subscription_price">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="LoginModalLabel">
                        <?php echo e(__('Login to buy Subscription')); ?>

                    </h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.notice.general-notice','data' => ['description' => __('Notice: You must login as a freelancer to buy a subscription')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notice.general-notice'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Notice: You must login as a freelancer to buy a subscription'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <div class="error-message"></div>
                    <div class="single-input">
                        <label class="label-title mb-2"><?php echo e(__('Email Or User Name')); ?></label>
                        <input class="form--control" type="text" name="username" id="username"
                            placeholder="<?php echo e(__('Email Or User Name')); ?>">
                    </div>
                    <div class="single-input mt-4">
                        <label class="label-title mb-2"> <?php echo e(__('Password')); ?> </label>
                        <div class="single-input-inner">
                            <input class="form--control" type="password" name="password" id="password"
                                placeholder="<?php echo e(__('Type Password')); ?>">
                            <div class="icon toggle-password">
                                <div class="show-icon"> <i class="fas fa-eye-slash"></i> </div>
                                <span class="hide-icon"> <i class="fas fa-eye"></i> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer flex-column">

                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.btn.submit','data' => ['title' => __('Login'),'class' => 'btn-profile extra-width btn-bg-1 login_to_buy_a_subscription']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('btn.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Login')),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('btn-profile extra-width btn-bg-1 login_to_buy_a_subscription')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/Subscription/Resources/views/frontend/subscriptions/login-markup.blade.php ENDPATH**/ ?>