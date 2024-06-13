<?php $__env->startSection('title', __('Cache Settings')); ?>
<?php $__env->startSection('style'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="dashboard__body">
        <div class="row">
            <div class="col-lg-12">
                <div class="customMarkup__single">
                    <div class="customMarkup__single__item">
                        <h4 class="customMarkup__single__title"><?php echo e(__('Cache Settings')); ?></h4>
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
                            <form action="<?php echo e(route('admin.general.settings.cache')); ?>" method="POST" id="cache_settings_form" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="single-input mb-3">
                                    <input type="hidden" name="cache_type" id="cache_type" class="form-control">
                                    <button class="btn btn-primary mt-4 pr-4 pl-4 clear-cache-submit-btn" id="view" data-value="view"><?php echo e(__('Clear View Cache')); ?></button><br>
                                    <button class="btn btn-info mt-4 pr-4 pl-4 clear-cache-submit-btn" id="route" data-value="route"><?php echo e(__('Clear Route Cache')); ?></button><br>
                                    <button class="btn btn-dark mt-4 pr-4 pl-4 clear-cache-submit-btn" id="config" data-value="config"><?php echo e(__('Clear Configure Cache')); ?></button><br>
                                    <button class="btn btn-success mt-4 pr-4 pl-4 clear-cache-submit-btn" id="clear" data-value="cache"><?php echo e(__('Clear Cache')); ?></button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        (function($) {
            "use strict";
            $(document).ready(function (){
                $(document).on('click','.clear-cache-submit-btn',function(e){
                    e.preventDefault();
                    $(this).addClass("disabled")
                    $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i> <?php echo e(__("Cleaning Cache")); ?>');
                    $('#cache_type').val($(this).data('value'));
                    $('#cache_settings_form').trigger('submit');
                });
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/doptorr/public_html/core/Modules/GeneralSettings/Resources/views/cache-settings.blade.php ENDPATH**/ ?>