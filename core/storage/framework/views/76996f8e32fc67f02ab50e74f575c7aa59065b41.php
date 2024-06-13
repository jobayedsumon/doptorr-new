<!-- Country Edit Modal -->
<div class="modal fade" id="editPaymentGatewayModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo e(__('Complete Payment Status')); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('admin.order.update.manual.payment')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="order_id" id="order_id">
                <input type="hidden" name="user_firstname" id="user_firstname">
                <input type="hidden" name="user_email" id="user_email">

                <div class="modal-body">
                    <h4 class="pb-2"><?php echo e(__('Customer Details')); ?></h4>
                    <p class="pb-1" ><?php echo e(__('Full Name:')); ?> <span class="user_fullname"></span></p>
                    <p class="pb-1" ><?php echo e(__('Email:')); ?> <span class="user_email"></span></p>
                    <p class="pb-1" ><?php echo e(__('Order Price:')); ?> <span class="order_price"></span></p>
                    <p class="manual_payment_image_display"><?php echo e(__('Payment Image:')); ?>

                        <img class="manual_payment_img" src="" alt="<?php echo e(__('Manual Payment Image')); ?>">
                    </p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.btn.submit','data' => ['title' => __('Update'),'class' => 'btn btn-primary mt-4 pr-4 pl-4 update_category']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('btn.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Update')),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('btn btn-primary mt-4 pr-4 pl-4 update_category')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/backend/pages/orders/manual-payment-modal.blade.php ENDPATH**/ ?>