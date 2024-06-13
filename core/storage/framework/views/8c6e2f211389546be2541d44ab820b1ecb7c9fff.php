<?php $__env->startSection('site_title',__('Forget Password')); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .verify-form input{
            height:50px;
            padding-left: 5px;
        }
        button.close {
            width: 30px;
            height: 30px;
            border: none;
            background: #000;
            color: #fff;
            border-radius: 3px;
            float: right;
            font-size: 20px;
        }
        .verify-form .verify-account{
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <!-- login Area Starts -->
    <section class="login-area pat-100 pab-100">
        <div class="container custom-container-one">
            <div class="login-wrapper">
                <div class="login-wrapper-contents margin-inline login-shadow login-padding">
                    <h2 class="single-title"> <?php echo e(__('Forgot Password!')); ?> </h2>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation.error','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('validation.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <form class="login-wrapper-form custom-form" method="post" action="<?php echo e(route('user.forgot.password')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="single-input mt-4">
                            <label class="label-title mb-3"> <?php echo e(__('Email')); ?> </label>
                            <input class="form--control" name="email" type="text" placeholder="<?php echo e(__('Enter email')); ?>">
                        </div>
                        <button class="submit-btn w-100 mt-4" type="submit"> <?php echo e(__('Submit Now')); ?> </button>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- login Area end -->
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/frontend/user/forgot-password.blade.php ENDPATH**/ ?>