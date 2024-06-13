<?php $__env->startSection('site_title', __('Email Verify')); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .verify-form input {
            height: 50px;
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

        .verify-form .verify-account {
            border-radius: 5px;
            font-size: 16px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="signup-area pat-100 pab-100">
        <div class="container">
            <div class="signup-wrapper verify-account-wrapper">
                <div class="signup-contents">
                    <h3 class="signup-title"> <?php echo e(__('Verify Your Account')); ?> </h3>
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
                    <div class="alert alert-info alert-bs-dismissible fade show mt-5 mb-1" role="alert">
                        <?php echo e(__('Please check email inbox/spam for verification code')); ?>

                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="verify-form" method="post" action="<?php echo e(route('email.verify')); ?>">
                        <?php echo csrf_field(); ?>
                        <div class="single-input mt-4">
                            <label class="label-title mb-3"><?php echo e(__('Enter verification code*')); ?></label>
                            <input class="form--control" type="text" name="email_verify_token"
                                placeholder="<?php echo e(__('Enter code')); ?>">
                        </div>
                        <button class="submit-btn mt-4 verify-account" type="submit"><?php echo e(__('Verify Account')); ?></button>
                    </form>
                    <div class="resend-verify-code-wrap mt-3">
                        <a class="text-center"
                            href="<?php echo e(route('resend.verify.code')); ?>"><strong><?php echo e(__('Resend Code')); ?></strong></a>
                    </div>
                </div>
                <br>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/frontend/user/email-verify.blade.php ENDPATH**/ ?>