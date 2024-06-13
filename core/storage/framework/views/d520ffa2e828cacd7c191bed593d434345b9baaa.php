<?php $__env->startSection('title', __('Social Login Settings')); ?>

<?php $__env->startSection('content'); ?>
    <div class="dashboard__body">
        <div class="row">
            <div class="col-lg-12">
                <div class="customMarkup__single">
                    <div class="customMarkup__single__item">
                        <h4 class="customMarkup__single__title"><?php echo e(__('Social Login Settings')); ?></h4>
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
                        <div class="customMarkup__single__inner mt-4">
                            <form action="<?php echo e(route('admin.general.settings.social.login')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>

                                <div class="single-input mb-3">
                                    <label for="enable_facebook_login" class="label-title"><strong><?php echo e(__('Facebook Login Details')); ?></strong></label>
                                </div>
                                <div class="single-input mb-3">
                                    <label for="facebook_client_id" class="label-title"><?php echo e(__('Facebook Client ID')); ?></label>
                                    <input type="text" name="facebook_client_id"  class="form-control" value="<?php echo e(get_static_option('facebook_client_id')); ?>">
                                </div>
                                <div class="single-input mb-3">
                                    <label for="facebook_client_secret" class="label-title"><?php echo e(__('Facebook Client Secret')); ?></label>
                                    <input type="text" name="facebook_client_secret"  class="form-control" value="<?php echo e(get_static_option('facebook_client_secret')); ?>">
                                </div>
                                <p class="info-text"><?php echo e(__('Facebook callback url for your app')); ?>

                                    <code><?php echo e(url('/')); ?>/facebook/callback</code>
                                </p>

                                <div class="single-input mb-3">
                                    <label for="enable_google_login" class="label-title"><strong><?php echo e(__('Google Login Details')); ?></strong></label>
                                </div>
                                <div class="single-input mb-3">
                                    <label for="google_client_id" class="label-title"><?php echo e(__('Google Client ID')); ?></label>
                                    <input type="text" name="google_client_id"  class="form-control" value="<?php echo e(get_static_option('google_client_id')); ?>">
                                </div>
                                <div class="single-input mb-3">
                                    <label for="google_client_secret" class="label-title"><?php echo e(__('Google Client Secret')); ?></label>
                                    <input type="text" name="google_client_secret"  class="form-control" value="<?php echo e(get_static_option('google_client_secret')); ?>">
                                </div>
                                <p class="info-text"><?php echo e(__('Google callback url for your app')); ?>

                                    <code><?php echo e(url('/')); ?>/google/callback</code>
                                </p>

                                <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Changes')); ?></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media.markup','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media.markup'); ?>
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
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/GeneralSettings/Resources/views/social-login.blade.php ENDPATH**/ ?>