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
<table class="DataTable_activation">
    <thead>
    <tr>
        <th><?php echo e(__('Project Details')); ?></th>
        <th><?php echo e(__('Package Details')); ?></th>
        <th><?php echo e(__('Payment Details')); ?></th>
        <th><?php echo e(__('Expire Date')); ?></th>
        <th><?php echo e(__('Impression and Click')); ?></th>
        <th><?php echo e(__('Action')); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php if(!empty($promoted_project_packages)): ?>
        <?php $__currentLoopData = $promoted_project_packages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td>
                    <p><strong><?php echo e(__('ID:')); ?></strong> <?php echo e($package?->project?->id); ?></p>
                    <p><strong><?php echo e(__('Title:')); ?></strong> <?php echo e($package?->project?->title); ?></p>
                </td>
                <td>
                    <p><strong><?php echo e(__('ID:')); ?></strong> <?php echo e($package->package_id); ?></p>
                    <p><strong><?php echo e(__('Title:')); ?></strong> <?php echo e($package?->package->title); ?></p>
                    <p><strong><?php echo e(__('Duration:')); ?></strong> <?php echo e($package->duration); ?> <?php echo e(__('days')); ?></p>
                    <p><strong><?php echo e(__('Package Price:')); ?></strong> <?php echo e(float_amount_with_currency_symbol($package?->package->budget)); ?></p>
                </td>
                <td>
                    <p><strong><?php echo e(__('Gateway:')); ?></strong> <?php echo e(ucfirst(str_replace('_', ' ', $package->payment_gateway))); ?></p>
                    <p><strong><?php echo e(__('Status:')); ?></strong>
                        <?php if($package->payment_gateway == 'manual_payment' && $package->payment_status == 'pending'): ?>
                            <span class="text-danger"><?php echo e(ucfirst($package->payment_status)); ?></span>
                        <?php else: ?>
                            <span><?php echo e(ucfirst($package->payment_status)); ?></span>
                        <?php endif; ?>
                    </p>
                    <p><strong><?php echo e(__('Price:')); ?></strong> <?php echo e(float_amount_with_currency_symbol($package->price)); ?></p>
                    <p><strong><?php echo e(__('Transaction Fee')); ?></strong> <?php echo e(float_amount_with_currency_symbol($package->transaction_fee)); ?></p>
                    <?php if($package->payment_gateway == 'manual_payment' && $package->payment_status == 'pending'): ?>
                    <a class="btn btn-sm btn-danger edit_payment_gateway_modal"
                        data-bs-toggle="modal"
                        data-bs-target="#editPaymentGatewayModal"
                        data-promoted-project-list-id="<?php echo e($package->id); ?>"
                        data-promoted-project-user-id="<?php echo e($package->user_id); ?>"
                        data-img-url="<?php echo e($package->manual_payment_image); ?>">
                        <?php echo e(__('Update Payment')); ?>

                    </a>
                     <?php endif; ?>
                </td>
                <td><?php echo e($package->expire_date); ?></td>
                <td>
                    <p><strong><?php echo e(__('Impression:')); ?></strong> <?php echo e($package->impression); ?></p>
                    <p><strong><?php echo e(__('Click:')); ?></strong> <?php echo e($package->click); ?></p>
                </td>
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
                    <ul class="dropdown-menu status_dropdown__list">
                        <?php if($package->payment_gateway == 'manual_payment' && $package->payment_status == 'pending'): ?>
                        <li class="status_dropdown__item"><?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.popup.delete-popup','data' => ['title' => __('Delete'),'url' => route('admin.project.promote.delete',$package->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('popup.delete-popup'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Delete')),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.project.promote.delete',$package->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?></li>
                        <?php else: ?>
                        <li class="status_dropdown__item">
                            <a tabindex="0" class="btn dropdown-item status_dropdown__list__link"><?php echo e(__('No Option')); ?></a>
                        </li>
                        <?php endif; ?>
                    </ul>
                </td>
            </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php endif; ?>
    </tbody>
</table>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.pagination.laravel-paginate','data' => ['allData' => $promoted_project_packages]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pagination.laravel-paginate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['allData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($promoted_project_packages)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/doptorr/public_html/core/Modules/PromoteFreelancer/Resources/views/backend/promoted-project/search-result.blade.php ENDPATH**/ ?>