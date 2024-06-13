<?php if($orders->total() < 1): ?>
    <h4 class="text-danger"><?php echo e(__('Nothing Found')); ?></h4>
<?php else: ?>
    <?php $__currentLoopData = $orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php $rating =  \App\Models\Rating::select('id','order_id','rating')->where('order_id',$order->id)->where('sender_type',2)->first(); ?>

        <div class="myOrder-single bg-white padding-20 radius-10">
            <div class="myOrder-single-item">
                <div class="myOrder-single-flex">
                    <div class="myOrder-single-content">
                        <span class="myOrder-single-content-id">#000<?php echo e($order->id); ?></span>
                        <h4 class="myOrder-single-content-title mt-2">
                            <?php if($order->is_project_job == 'project'): ?>
                                <a href="<?php echo e(route('client.order.details',$order->id)); ?>"> <?php echo e($order?->project->title ?? ''); ?> </a>
                            <?php elseif($order->is_project_job == 'job'): ?>
                                <a href="<?php echo e(route('client.order.details',$order->id)); ?>"><?php echo e($order?->job->title ?? ''); ?></a>
                            <?php else: ?>
                               <?php echo e(__('Custom order')); ?>

                            <?php endif; ?>
                        </h4>
                        <div class="myOrder-single-content-btn flex-btn mt-3">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.order-status','data' => ['status' => $order->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.order-status'); ?>
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
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.is-custom','data' => ['isCustom' => $order->is_project_job]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.is-custom'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isCustom' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->is_project_job)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    </div>
                    <span class="myOrder-single-content-time"><?php echo e($order->created_at->diffForHumans()); ?> </span>
                </div>
            </div>
            <div class="myOrder-single-item">
                <div class="myOrder-single-block">
                    <div class="myOrder-single-block-item">
                        <div class="myOrder-single-block-item-content">
                            <span class="myOrder-single-block-subtitle"><?php echo e(__('Order budget')); ?></span>
                            <h6 class="myOrder-single-block-title mt-2"><?php echo e(float_amount_with_currency_symbol($order->price)); ?>

                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.is-funded','data' => ['isFunded' => $order->payment_status,'paymentGateway' => $order->payment_gateway]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.is-funded'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isFunded' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->payment_status),'paymentGateway' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->payment_gateway)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </h6>
                        </div>
                    </div>
                    <?php if($order->delivery_time): ?>
                    <div class="myOrder-single-block-item">
                        <div class="myOrder-single-block-item-content">
                            <span class="myOrder-single-block-subtitle"><?php echo e(__('Delivery Time')); ?></span> <br>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.deadline','data' => ['deadline' => $order->delivery_time ?? '' ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.deadline'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['deadline' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order->delivery_time ?? '' )]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                    </div>
                    <?php endif; ?>
                    <div class="myOrder-single-block-item">
                        <div class="myOrder-single-block-item-author">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.profile-image','data' => ['image' => $order?->freelancer->image]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.profile-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order?->freelancer->image)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        </div>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.name-rating','data' => ['firstName' => $order?->freelancer->first_name,'lastName' => $order?->freelancer->last_name,'userId' => $order?->freelancer->id,'orderRating' => $rating->rating ?? '' ,'userType' => $order?->freelancer->user_type,'isIdentityVerified' => $order?->freelancer?->user_verified_status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.name-rating'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['firstName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order?->freelancer->first_name),'lastName' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order?->freelancer->last_name),'userId' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order?->freelancer->id),'orderRating' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($rating->rating ?? '' ),'userType' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order?->freelancer->user_type),'isIdentityVerified' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order?->freelancer?->user_verified_status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="myOrder-single-item">
                <div class="myOrder-single-flex flex-between">
                    <div class="btn-wrapper flex-btn">
                        <a href="<?php echo e(route('client.order.details',$order->id)); ?>" class="btn-profile btn-bg-1"><?php echo e(__('View Order')); ?></a>
                        <?php if($order->status == 3): ?>
                            <?php if($order?->user?->is_suspend !=1): ?>
                                <a href="<?php echo e(route('client.order.rating',$order->id)); ?>" class="btn-profile btn-outline-gray"><?php echo e(__('Submit Review')); ?></a>
                                <a href="<?php echo e(route('client.order.invoice.generate',$order->id)); ?>" class="btn-profile btn-outline-gray"><?php echo e(__('Invoice')); ?></a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
<?php endif; ?>
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/user/client/order/search-result.blade.php ENDPATH**/ ?>