<table class="DataTable_activation">
    <thead>
    <tr>
        <th><?php echo e(__('User ID')); ?></th>
        <th><?php echo e(__('Type')); ?></th>
        <th><?php echo e(__('Price')); ?></th>
        <th><?php echo e(__('Revision')); ?></th>
        <th><?php echo e(__('Payment Gateway')); ?></th>
        <th><?php echo e(__('Payment Status')); ?></th>
        <th><?php echo e(__('Status')); ?></th>
        <th><?php echo e(__('Order Date')); ?></th>
        <th><?php echo e(__('Action')); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($order->user_id ?? ''); ?></td>
            <td><?php echo e(ucfirst(__($order->is_project_job))); ?></td>
            <td><?php echo e(float_amount_with_currency_symbol($order->price)); ?></td>
            <td><?php echo e($order->revision); ?></td>
            <td>
                <?php if($order->payment_gateway == 'manual_payment'): ?>
                    <?php echo e(ucfirst(str_replace('_',' ',$order->payment_gateway))); ?>

                <?php else: ?>
                    <?php echo e($order->payment_gateway == 'authorize_dot_net' ? __('Authorize.Net') : ucfirst($order->payment_gateway)); ?>

                <?php endif; ?>
            </td>
            <td>
                <?php if($order->payment_gateway != 'manual_payment' && $order->payment_status == 'pending'): ?>
                    <span class="btn btn-danger btn-sm"><?php echo e(__('Payment Failed')); ?></span>
                <?php elseif($order->payment_status == 'pending'): ?>
                    <span class="btn btn-warning btn-sm"><?php echo e(ucfirst(__($order->payment_status))); ?></span>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-manual-payment-status-update')): ?>
                    <a
                        class="btn btn-sm btn-primary edit_payment_gateway_modal"
                        data-bs-toggle="modal"
                        data-bs-target="#editPaymentGatewayModal"
                        data-order_id="<?php echo e($order->id); ?>"
                        data-order_price="<?php echo e(float_amount_with_currency_symbol($order->price)); ?>"
                        data-user_type="<?php echo e($order->user?->user_type == 1 ? 'Client' : 'Freelancer'); ?>"
                        data-user_fullname="<?php echo e($order->user?->first_name); ?> <?php echo e($order->user?->last_name); ?>"
                        data-user_email="<?php echo e($order->user?->email); ?>"
                        data-img_url="<?php echo e($order->manual_payment_image); ?>">
                        <?php echo e(__('Update')); ?>

                    </a>
                <?php endif; ?>
                <?php else: ?>
                    <span class="btn btn-success btn-sm"><?php echo e(ucfirst(__($order->payment_status))); ?></span>
                <?php endif; ?>
            </td>
            <td>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status.table.order-status','data' => ['status' => $order->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status.table.order-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </td>
            <td><?php echo e($order->created_at->format('Y-m-d') ?? ''); ?></td>
            <td>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status.table.select-action','data' => ['title' => __('Select Action')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status.table.select-action'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Select Action'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('order-details')): ?>
                <ul class="dropdown-menu status_dropdown__list">
                    <a href="<?php echo e(route('admin.order.details',$order->id)); ?>" class="btn dropdown-item status_dropdown__list__link"><?php echo e(__('View Details')); ?></a>
                    <?php if($order->status == 3): ?>
                        <a href="<?php echo e(route('admin.order.invoice.generate',$order->id)); ?>" class="btn dropdown-item status_dropdown__list__link"><?php echo e(__('Invoice')); ?></a>
                    <?php endif; ?>
                </ul>
                <?php endif; ?>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.pagination.laravel-paginate','data' => ['allData' => $orders]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pagination.laravel-paginate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['allData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($orders)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/doptorr/public_html/core/resources/views/backend/pages/orders/search-result.blade.php ENDPATH**/ ?>