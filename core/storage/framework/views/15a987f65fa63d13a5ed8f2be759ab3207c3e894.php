<?php $__currentLoopData = $subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $subscription): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="col-xxl-4 col-lg-4 col-md-6">
        <div class="single-pricing single-pricing-border radius-10">
            <div class="single-pricing-top d-flex gap-3 flex-wrap align-items-center">
                <div class="single-pricing-brand">
                    <?php echo render_image_markup_by_attachment_id($subscription->logo ?? ''); ?>

                </div>
                <div class="single-pricing-top-contents">
                    <h5 class="single-pricing-title"> <?php echo e($subscription->title ?? ''); ?>

                    </h5>
                    <p class="single-pricing-para"><?php echo e($subscription->limit ?? ''); ?> <?php echo e(__('Connects')); ?></p>
                </div>
            </div>
            <ul class="single-pricing-list list-style-none">
                <?php $__currentLoopData = $subscription->features; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $feature): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php if($feature->status == 'on'): ?>
                        <li class="single-pricing-list-item">
                            <span class="single-pricing-list-item-icon">
                                <i class="fa-solid fa-check"></i>
                            </span> <?php echo e($feature->feature ?? ''); ?>

                        </li>
                    <?php else: ?>
                        <li class="single-pricing-list-item">
                            <span class="single-pricing-list-item-icon cross-icon">
                                <i class="fa-solid fa-xmark"></i>
                            </span><?php echo e($feature->feature ?? ''); ?>

                        </li>
                    <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
            <h3 class="single-pricing-price"> <?php echo e(float_amount_with_currency_symbol($subscription->price ?? '')); ?>

                <sub>/<?php echo e(ucfirst($subscription->subscription_type?->type)); ?></sub>
            </h3>
            <div class="btn-wrapper mt-4">
                <button class="cmn-btn btn-bg-gray btn-small w-100 choose_plan" data-bs-toggle="modal"
                    data-id="<?php echo e($subscription->id); ?>" data-price="<?php echo e($subscription->price); ?>"
                    <?php if(auth::check()): ?> data-bs-target="#paymentGatewayModal" <?php else: ?> data-bs-target="#loginModal" <?php endif; ?>><?php echo e(__('Choose Plan')); ?></button>
            </div>
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php if(empty($type_id)): ?>
    <?php echo $subscriptions->links(); ?>

<?php endif; ?>
<?php /**PATH /home/doptorr/public_html/core/Modules/Subscription/Resources/views/frontend/subscriptions/search-result.blade.php ENDPATH**/ ?>