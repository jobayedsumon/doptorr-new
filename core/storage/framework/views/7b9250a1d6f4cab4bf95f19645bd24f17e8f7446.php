<table>
    <thead>
    <tr>
        <th><?php echo e(__('ID')); ?></th>
        <th><?php echo e(__('Title')); ?></th>
        <th><?php echo e(__('Priority')); ?></th>
        <th><?php echo e(__('Status')); ?></th>
        <th><?php echo e(__('Action')); ?></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $tickets; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ticket): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($ticket->id); ?></td>
            <td><?php echo e($ticket->title); ?></td>
            <td><?php echo e($ticket->priority); ?></td>
            <td>
                <?php if($ticket->status === 'open'): ?>
                    <span class="btn btn-sm btn-success" ><?php echo e(__('Open')); ?></span>
                <?php else: ?>
                    <span class="btn btn-sm btn-danger" ><?php echo e(__('Close')); ?></span>
                <?php endif; ?>
            </td>
            <td>
                <a class="btn-sm btn-profile btn-bg-1" href="<?php echo e(route('freelancer.ticket.details',$ticket->id)); ?>"><?php echo e(__('View Details')); ?></a>
            </td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
<div class="deposit-history-pagination mt-4">
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.pagination.laravel-paginate','data' => ['allData' => $tickets]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pagination.laravel-paginate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['allData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($tickets)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
</div>
<?php /**PATH /home/doptorr/public_html/core/Modules/SupportTicket/Resources/views/freelancer/search-result.blade.php ENDPATH**/ ?>