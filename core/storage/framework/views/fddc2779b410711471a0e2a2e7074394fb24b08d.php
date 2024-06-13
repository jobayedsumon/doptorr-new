<table>
    <thead>
    <tr>
        <th><?php echo e(__('Type')); ?></th>
        <th><?php echo e(__('Price')); ?></th>
        <th><?php echo e(__('Connect')); ?></th>
        <th><?php echo e(__('Payment Gateway')); ?></th>
        <th><?php echo e(__('Payment Status')); ?></th>
        <th><?php echo e(__('Status')); ?></th>
        <th><?php echo e(__('Purchase Date')); ?></th>
        <th><?php echo e(__('Expire Date')); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $all_subscriptions; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sub): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($sub->subscription?->subscription_type?->type); ?></td>
            <td><?php echo e(float_amount_with_currency_symbol($sub->price)); ?></td>
            <td><?php echo e($sub->limit); ?></td>
            <td>
                <?php if($sub->payment_gateway == 'manual_payment'): ?>
                    <?php echo e(ucfirst(str_replace('_',' ',$sub->payment_gateway))); ?>

                <?php else: ?>
                    <?php echo e($sub->payment_gateway == 'authorize_dot_net' ? __('Authorize.Net') : ucfirst($sub->payment_gateway)); ?>

                <?php endif; ?>
            </td>
            <td>
                <?php if($sub->payment_status == '' || $sub->payment_status == 'cancel'): ?>
                    <span class="btn btn-danger btn-sm"><?php echo e(__('Cancel')); ?></span>
                <?php else: ?>
                    <span class="btn btn-success btn-sm"><?php echo e(ucfirst($sub->payment_status)); ?></span>
                <?php endif; ?>
            </td>
            <td>
                <?php if($sub->status == 0): ?>
                    <span class="btn btn-danger btn-sm"><?php echo e(__('Inactive')); ?></span>
                <?php else: ?>
                    <?php if(Carbon\Carbon::parse($sub->expire_date) > Carbon\Carbon::now()): ?>
                        <span class="btn btn-success btn-sm"><?php echo e(__('Active')); ?></span>
                    <?php else: ?>
                        <span class="btn btn-warning btn-sm"><?php echo e(__('Expired')); ?></span>
                    <?php endif; ?>
                <?php endif; ?>
            </td>
            <td><?php echo e($sub->created_at->format('Y-m-d') ?? ''); ?></td>
            <td><?php echo e(Carbon\Carbon::parse($sub->expire_date)->format('Y-m-d')); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="deposit-history-pagination mt-4">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.pagination.laravel-paginate','data' => ['allData' => $all_subscriptions]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pagination.laravel-paginate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['allData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($all_subscriptions)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>
<?php /**PATH /home/doptorr/public_html/core/Modules/Subscription/Resources/views/frontend/freelancer/subscription/search-result.blade.php ENDPATH**/ ?>