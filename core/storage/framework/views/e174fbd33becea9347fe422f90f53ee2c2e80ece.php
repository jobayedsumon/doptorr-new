<?php $__env->startSection('site_title', __('Order Details')); ?>
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.summernote.summernote-css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('summernote.summernote-css'); ?>
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
    <style>
        .user-details-manage-list {display: flex;flex-direction: column;gap: 10px}
        .myOrder-single-content-para,
        .show_order_submit_description
        {white-space: pre-line}
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <main>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.category.category','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend.category.category'); ?>
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
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb.user-profile-breadcrumb','data' => ['title' => __('Order Details'),'innerTitle' => __('Order Details')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb.user-profile-breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Order Details')),'innerTitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Order Details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        <!-- Profile Details area Starts -->
        <div class="profile-area pat-100 pab-100 section-bg-2">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="myOrder-single bg-white padding-20 radius-10">
                            <div class="myOrder-single-item">
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
                                <div class="myOrder-single-flex">
                                    <div class="myOrder-single-content">
                                        <span class="myOrder-single-content-id">#000<?php echo e($order_details->id); ?></span>
                                        <h4 class="myOrder-single-content-title mt-2">
                                            <?php if($order_details->is_project_job == 'project'): ?>
                                                <a href="javascript:void(0)"> <?php echo e($order_details?->project->title ?? ''); ?> </a>
                                            <?php elseif($order_details->is_project_job == 'job'): ?>
                                                <a href="javascript:void(0)"><?php echo e($order_details?->job->title ?? ''); ?></a>
                                            <?php else: ?>
                                                <?php echo e(__('Custom order')); ?>

                                            <?php endif; ?>
                                        </h4>
                                        <div class="myOrder-single-content-btn flex-btn mt-3">
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.order-status','data' => ['status' => $order_details->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.order-status'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order_details->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.is-custom','data' => ['isCustom' => $order_details->is_project_job]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.is-custom'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isCustom' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order_details->is_project_job)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        </div>
                                    </div>
                                    <span class="myOrder-single-content-time"><?php echo e($order_details->created_at->diffForHumans()); ?> </span>
                                </div>
                            </div>
                            <div class="myOrder-single-item">
                                <div class="myOrder-single-block">
                                    <div class="myOrder-single-block-item">
                                        <div class="myOrder-single-block-item-content">
                                            <span class="myOrder-single-block-subtitle"><?php echo e(__('Order Budget')); ?></span>
                                            <h6 class="myOrder-single-block-title mt-2">
                                                <?php echo e(float_amount_with_currency_symbol($order_details->price)); ?>

                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.is-funded','data' => ['isFunded' => $order_details->payment_status,'paymentGateway' => $order_details->payment_gateway]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.is-funded'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isFunded' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order_details->payment_status),'paymentGateway' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order_details->payment_gateway)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            </h6>
                                        </div>
                                    </div>
                                    <?php if($order_details->delivery_time): ?>
                                    <div class="myOrder-single-block-item">
                                        <div class="myOrder-single-block-item-content">
                                            <span class="myOrder-single-block-subtitle"><?php echo e(__('Delivery Time')); ?></span>
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.deadline','data' => ['deadline' => $order_details->delivery_time ?? '' ]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.deadline'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['deadline' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order_details->delivery_time ?? '' )]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        </div>
                                    </div>
                                    <?php endif; ?>

                                    <?php
                                        $complete_orders = \App\Models\Order::where('user_id',$order_details->user_id)
                                            ->where('status',3)
                                            ->count();
                                    $active_orders = \App\Models\Order::where('user_id',$order_details->user_id)
                                            ->where('status',1)
                                            ->count();
                                    ?>
                                    <div class="myOrder-single-block-item">
                                        <div class="myOrder-single-block-item-content">
                                            <span class="myOrder-single-block-subtitle"><?php echo e(__('Complete Orders')); ?></span>
                                            <h6 class="myOrder-single-block-title mt-2"><?php echo e($complete_orders); ?></h6>
                                        </div>
                                    </div>
                                    <div class="myOrder-single-block-item">
                                        <div class="myOrder-single-block-item-content">
                                            <span class="myOrder-single-block-subtitle"><?php echo e(__('Active Orders')); ?></span>
                                            <h6 class="myOrder-single-block-title mt-2"><?php echo e($active_orders); ?></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="myOrder-single-item">
                                <div class="myOrder-single-flex flex-between">
                                    <div class="btn-wrapper flex-btn">
                                        <?php if($order_details?->freelancer?->is_suspend !=1): ?>
                                            <form action="<?php echo e(route('freelancer.message.send')); ?>" method="post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <input type="hidden" name="client_id" id="client_id" value="<?php echo e($order_details->user_id); ?>">
                                                <input type="hidden" name="from_user" id="from_user" value="1">
                                                <input type="hidden" name="project_id" id="project_id" value="<?php echo e($order_details->identity); ?>">
                                                <input type="hidden" name="order_id" id="order_id" value="<?php echo e($order_details->id); ?>">
                                                <button type="submit" class="btn-profile btn-outline-1"> <?php echo e(__('Send Message')); ?></button>
                                            </form>
                                        <?php if($order_details->status == 3): ?>
                                             <a href="<?php echo e(route('freelancer.order.invoice.generate',$order_details->id)); ?>" class="btn-profile btn-outline-1"><?php echo e(__('Invoice')); ?></a>
                                             <a href="<?php echo e(route('freelancer.order.rating',$order_details->id)); ?>" class="btn-profile btn-bg-1"><?php echo e(__('Submit Review')); ?></a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="myOrder-single bg-white padding-20 radius-10">
                            <div class="row g-4">
                                <div class="col-xxl-3 col-lg-6 col-sm-6 col-md-4">
                                    <div class="myJob-wrapper-single-balance">
                                        <div class="myJob-wrapper-single-balance-contents">
                                            <div class="myJob-wrapper-single-balance-price d-flex gap-2 justify-content-between">
                                                <?php if($order_details->status === 3): ?>
                                                    <h4 class="contract_single__balance-price"><?php echo e(float_amount_with_currency_symbol($order_details->payable_amount)); ?></h4>
                                                <?php else: ?>
                                                    <?php $earnings = \App\Models\OrderMilestone::where('order_id',$order_details->id)->where('status',2)->sum('price'); ?>
                                                    <h4 class="contract_single__balance-price"><?php echo e(float_amount_with_currency_symbol($earnings)); ?></h4>
                                                <?php endif; ?>
                                                <span class="myJob-wrapper-single-balance-icon hover-question">
                                                    <i class="fa-solid fa-question"></i>
                                                    <span class="hover-active-content"><?php echo e(__('Earned balance means how much amount you have received for this order.')); ?></span>
                                                </span>
                                            </div>
                                            <p class="myJob-wrapper-single-balance-para"><?php echo e(__('Earned Balance')); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6 col-md-4">
                                    <div class="myJob-wrapper-single-balance">
                                        <div class="myJob-wrapper-single-balance-contents">
                                            <div class="myJob-wrapper-single-balance-price d-flex gap-2 justify-content-between">
                                                <?php
                                                    $mile_stones = \App\Models\OrderMilestone::where('order_id',$order_details->id)->get();
                                                    $payable_amount = \App\Models\OrderMilestone::where('order_id',$order_details->id)->where('status','!=',3)->sum('price');
                                                ?>
                                                <?php if($mile_stones->count() > 0): ?>
                                                    <?php if($order_details->status !=3): ?>
                                                    <h4 class="contract_single__balance-price"><?php echo e(float_amount_with_currency_symbol($payable_amount - $earnings)); ?> </h4>
                                                    <?php else: ?>
                                                        <h4 class="contract_single__balance-price"><?php echo e(site_currency_symbol()); ?> 0</h4>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <?php if($order_details->status != 3 && $order_details->payment_status != ''): ?>
                                                        <h4 class="contract_single__balance-price"><?php echo e(float_amount_with_currency_symbol($order_details->payable_amount)); ?></h4>
                                                    <?php else: ?>
                                                        <h4 class="contract_single__balance-price"><?php echo e(site_currency_symbol()); ?> 0</h4>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                                <span class="myJob-wrapper-single-balance-icon hover-question">
                                                    <i class="fa-solid fa-question"></i>
                                                    <span class="hover-active-content"><?php echo e(__('Pending amount means how much amount you will get after complete this order.')); ?></span>
                                                </span>
                                            </div>
                                            <p class="myJob-wrapper-single-balance-para"><?php echo e(__('Pending Balance')); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6 col-md-4">
                                    <div class="myJob-wrapper-single-balance">
                                        <div class="myJob-wrapper-single-balance-contents">
                                            <div class="myJob-wrapper-single-balance-price d-flex gap-2 justify-content-between">
                                                <span class="price-title"><?php echo e(float_amount_with_currency_symbol($order_details->commission_amount)); ?></span>
                                                <span class="myJob-wrapper-single-balance-icon hover-question">
                                                    <i class="fa-solid fa-question"></i>
                                                    <span class="hover-active-content"><?php echo e(__('Commission amount means how much amount admin will get from this order.')); ?></span>
                                                </span>
                                            </div>
                                            <p class="myJob-wrapper-single-balance-para"><?php echo e(__('Commission Amount')); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xxl-3 col-lg-6 col-sm-6 col-md-4">
                                    <div class="myJob-wrapper-single-balance">
                                        <div class="myJob-wrapper-single-balance-contents">
                                            <div class="myJob-wrapper-single-balance-price d-flex gap-2 justify-content-between">
                                                <span class="price-title"><?php echo e(float_amount_with_currency_symbol($order_details->price)); ?></span>
                                                <span class="myJob-wrapper-single-balance-icon hover-question">
                                                    <i class="fa-solid fa-question"></i>
                                                    <span class="hover-active-content"><?php echo e(__('Total budget means how much client will pay for this order.')); ?></span>
                                                </span>
                                            </div>
                                            <p class="myJob-wrapper-single-balance-para"><?php echo e(__('Total Budget')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="myJob-tabs mt-5">
                            <ul class="tabs">
                                <?php if($mile_stones->count() > 0): ?>
                                    <li data-tab="Milestones" class="active"><?php echo e(__('Milestones')); ?></li>
                                    <li data-tab="Description"> <?php echo e(__('Description & Requirements')); ?> </li>
                                <?php else: ?>
                                    <li data-tab="Description" class="active"> <?php echo e(__('Description & Requirements')); ?> </li>
                                <?php endif; ?>
                                <li data-tab="Works"> <?php echo e(__('Works Submitted')); ?> </li>
                            </ul>

                            <?php if($mile_stones->count() > 0): ?>
                                <div class="tab-content-item active mt-4" id="Milestones">
                                    <div class="myJob-wrapper-single">
                                    <div class="myJob-wrapper-single-header profile-border-bottom">
                                        <h4 class="myJob-wrapper-single-title"><?php echo e(__('Milestone')); ?></h4>
                                    </div>
                                    <div class="myJob-wrapper-single-milestone milestone-contractor-parent">
                                    <?php $__currentLoopData = $mile_stones; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mile_stone): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="myJob-wrapper-single-milestone-item">
                                            <div class="myJob-wrapper-single-flex flex-between align-items-start">
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.milestone-details','data' => ['id' => $mile_stone->id,'orderID' => $order_details->id,'clientID' => $order_details->user_id,'title' => $mile_stone->title,'price' => $mile_stone->price,'status' => $mile_stone->status,'deadline' => $mile_stone->deadline,'description' => $mile_stone->description]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.milestone-details'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mile_stone->id),'orderID' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order_details->id),'clientID' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order_details->user_id),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mile_stone->title),'price' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mile_stone->price),'status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mile_stone->status),'deadline' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mile_stone->deadline),'description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($mile_stone->description)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                <div class="myJob-wrapper-single-right">
                                                    <div class="myJob-wrapper-single-right-flex">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.is-funded','data' => ['isFunded' => $order_details->payment_status,'paymentGateway' => $order_details->payment_gateway]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.is-funded'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isFunded' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order_details->payment_status),'paymentGateway' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order_details->payment_gateway)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                        <span class="myJob-wrapper-single-fixed danger"><?php echo e(__('Revision:')); ?> <?php echo e($mile_stone->revision ?? ''); ?></span>
                                                        <span class="myJob-wrapper-single-fixed danger"><?php echo e(__('Revision Left:')); ?> <?php echo e($mile_stone->revision_left ?? ''); ?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                </div>
                            </div>
                            <?php endif; ?>

                            <?php if($mile_stones->count() > 0): ?>
                                <div class="tab-content-item mt-4" id="Description">
                            <?php else: ?>
                                <div class="tab-content-item mt-4 active" id="Description">
                            <?php endif; ?>
                                <div class="myOrder-single bg-white padding-20 radius-10">
                                    <div class="myOrder-single-item">
                                        <div class="myOrder-single-content">
                                            <p class="myOrder-single-content-para"><?php echo e($order_details->description ?? __('No description.')); ?></p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="tab-content-item mt-4" id="Works">
                                <div class="pay-now-single">
                                    <h4 class="pay-now-single-title"><?php echo e(__('Work Submitted')); ?></h4>
                                    <div class="pay-now-single-contents profile-border-top">
                                        <?php if($order_details?->order_submit_history?->count() > 0): ?>
                                            <?php $__currentLoopData = $order_details->order_submit_history; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $history): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <div class="pay-now-single-contents-work">
                                                <div class="pay-now-single-contents-work-flex">
                                                    <div class="pay-now-single-contents-work-item">
                                                        <span class="pay-now-single-contents-work-date"><?php echo e($history->created_at->toFormattedDateString()); ?></span>
                                                    </div>
                                                    <div class="pay-now-single-contents-work-item">
                                                        <div class="single-refundRequest-item">
                                                            <a href="<?php echo e(asset('assets/uploads/attachment/order/'.$history->attachment)); ?>" download class="single-refundRequest-item-uploads">
                                                                <i class="fa-solid fa-cloud-arrow-down"></i>
                                                                <?php echo e(__('Download Attachment')); ?>

                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="pay-now-single-contents-work-item">
                                                        <div class="pay-now-single-contents-work-item-status">
                                                            <?php if($history->status === 0): ?>
                                                                <span class="milestone-approved "><?php echo e(__('Pending')); ?></span>
                                                            <?php elseif($history->status === 1): ?>
                                                                <span class="myJob-wrapper-single-fixed active"><?php echo e(__('Approved')); ?></span>
                                                            <?php elseif($history->status === 2): ?>
                                                                <span class="btn myJob-wrapper-single-fixed danger show_revision_details"
                                                                      data-bs-target="#RevisionDetailsModal"
                                                                      data-bs-toggle="modal"
                                                                      data-revision_id="<?php echo e($history->request_revision?->id); ?>"
                                                                      data-revision_description="<?php echo e($history->request_revision?->description); ?>">
                                                                    <?php echo e(__('Revision Details')); ?>

                                                                </span>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    <div class="pay-now-single-contents-work-item">
                                                        <div class="pay-now-single-contents-work-item-btn">
                                                            <a href="javascript:void(0)"
                                                               class="pay-now-single-contents-work-viewMore order_submit_description"
                                                               data-description="<?php echo e($history->description); ?>"
                                                               data-order_milestone_id="<?php echo e($history->order_milestone_id); ?>"
                                                               data-bs-toggle="modal"
                                                               data-bs-target="#OrderSubmitDescriptionModal">
                                                                <?php echo e(__('Description')); ?>

                                                                <i class="fa-solid fa-angle-right"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                        <?php else: ?>
                                            <p><?php echo e(__('No work submitted')); ?></p>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                            <div class="myOrder-single-item mt-4">
                                <div class="myOrder-single-flex flex-between">
                                    <?php
                                        $check_order_has_report_by_freelancer = \App\Models\Report::where('freelancer_id',$order_details->freelancer_id)
                                        ->where('order_id',$order_details->id)
                                        ->where('reporter','freelancer')
                                        ->first();
                                    ?>
                                    <?php if(empty($check_order_has_report_by_freelancer)): ?>
                                        <?php if($order_details->status == 3 || $order_details->status == 4): ?>
                                            <?php if($order_details?->freelancer?->is_suspend !=1): ?>
                                                <a href="javascript:void(0)"
                                                   data-order-id="<?php echo e($order_details->id); ?>"
                                                   data-client-id="<?php echo e($order_details->user_id); ?>"
                                                   class="btn-profile btn-bg-cancel btn-hover-danger open_order_report_modal"
                                                   data-bs-target="#reportModal"
                                                   data-bs-toggle="modal"
                                                ><?php echo e(__('Report Order')); ?>

                                                </a>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    <?php else: ?>
                                       <span class="btn-profile btn-bg-cancel"> <?php echo e(__('Reported')); ?></span>
                                    <?php endif; ?>

                                    <div class="btn-wrapper flex-btn">
                                        <?php if($order_details->status == 0): ?>
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status.table.status-change','data' => ['title' => __('Decline Order'),'class' => 'btn-profile btn-bg-cancel decline_and_change_order_status','value' => __('decline'),'url' => route('freelancer.order.decline',$order_details->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status.table.status-change'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Decline Order')),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('btn-profile btn-bg-cancel decline_and_change_order_status'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('decline')),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('freelancer.order.decline',$order_details->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status.table.status-change','data' => ['title' => __('Accept Order'),'class' => 'btn-profile btn-bg-1 accept_and_change_order_status','url' => route('freelancer.order.accept',$order_details->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status.table.status-change'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Accept Order')),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('btn-profile btn-bg-1 accept_and_change_order_status'),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('freelancer.order.accept',$order_details->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        <?php else: ?>
                                            <?php if($order_details->status != 5 && $order_details->status != 4 && $order_details->status != 3 && $order_details->status != 7): ?>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status.table.status-change','data' => ['title' => __('Cancel Order'),'class' => 'btn-profile btn-bg-cancel cancel_and_change_order_status','value' => __('cancel'),'url' => route('freelancer.order.decline',$order_details->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status.table.status-change'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Cancel Order')),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('btn-profile btn-bg-cancel cancel_and_change_order_status'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('cancel')),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('freelancer.order.decline',$order_details->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            <?php endif; ?>
                                            <?php if($mile_stones->count() <= 0): ?>
                                                <?php if(Auth::guard('web')->user()->user_type == 2 && $order_details->status == 1): ?>
                                                    <a href="javascript:void(0)"
                                                       class="btn-profile btn-bg-1 order_submit"
                                                       data-bs-toggle="modal"
                                                       data-bs-target="#orderSubmitModal"
                                                       data-order_id="<?php echo e($order_details->id); ?>"
                                                       data-order_milestone_id="<?php echo e($id ?? ''); ?>"
                                                       data-client_id="<?php echo e($order_details->user_id); ?>"
                                                    >
                                                        <?php echo e(__('Submit')); ?>

                                                    </a>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>

                        <div class="col-lg-4">
                            <div class="profile-details-widget sticky_top_lg">
                                <div class="jobFilter-wrapper-item">
                                    <div class="jobFilter-about-clients">
                                        <div class="jobFilter-proposal-author-flex">
                                        <span class="user-details-manage-thumb">
                                            <div class="myOrder-single-block-item-author">
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.order.profile-image','data' => ['image' => $order_details?->user->image]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('order.profile-image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['image' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($order_details?->user->image)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            </div>
                                        </span>
                                        <div class="jobFilter-proposal-author-contents">
                                            <h5 class="single-freelancer-author-name">
                                                <?php echo e($order_details?->user->first_name); ?>

                                                <?php echo e($order_details?->user->last_name); ?>

                                                <?php if(Cache::has('user_is_online_' . $order_details?->user->id)): ?>
                                                    <span class="single-freelancer-author-status"> <?php echo e(__('Active')); ?> </span>
                                                <?php else: ?>
                                                    <span class="single-freelancer-author-status-ofline"> <?php echo e(__('Inactive')); ?> </span>
                                                <?php endif; ?>
                                            </h5>
                                            <p class="jobFilter-proposal-author-contents-subtitle mt-2">
                                                <?php if($order_details?->user?->user_state?->state != null): ?>
                                                <?php echo e($order_details?->user?->user_state?->state); ?>,
                                                <?php endif; ?>
                                                <?php echo e($order_details?->user?->user_country?->country); ?>

                                                <?php if($order_details?->user?->user_verified_status == 1): ?> <i class="fas fa-circle-check"></i><?php endif; ?>

                                            </p>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="jobFilter-about-clients">
                                        <div class="jobFilter-about-clients-single flex-between">
                                            <div class="jobFilter-about-clients-flex">
                                        <span class="jobFilter-about-clients-icon">
                                            <img
                                                src="<?php echo e(asset('assets/static/icons/member_since.svg')); ?>" alt="">
                                        </span>
                                                <span class="jobFilter-about-clients-para"> <?php echo e(__('Member since')); ?> </span>
                                            </div>
                                            <h6 class="jobFilter-about-clients-completed">
                                                <?php echo e($order_details?->user->created_at->toFormattedDateString() ?? ''); ?>

                                            </h6>
                                        </div>
                                    </div>
                                    <div class="jobFilter-about-clients">
                                        <div class="jobFilter-about-clients-single flex-between">
                                            <div class="jobFilter-about-clients-flex">
                                    <span class="jobFilter-about-clients-icon">
                                        <img src="<?php echo e(asset('assets/static/icons/job_post.svg')); ?>" alt="">
                                    </span>
                                                <span class="jobFilter-about-clients-para"><?php echo e(__('Total Job')); ?></span>
                                            </div>
                                            <h6 class="jobFilter-wrapper-item-completed"><?php echo e($order_details?->user?->user_jobs?->count()); ?></h6>
                                        </div>
                                    </div>

                                    <?php
                                        $total_job = App\Models\JobPost::where('user_id', $order_details?->user->id)->count();
                                        $total_order = App\Models\Order::where('user_id', $order_details?->user->id)
                                            ->where('status', 3)
                                            ->count();

                                        $hiring_rate = '';
                                         if ($total_job > 0) {
                                           $hiring_rate = ($total_order * 100) / $total_job;
                                        }
                                    ?>

                                    <?php if($hiring_rate >= 1): ?>
                                        <div class="jobFilter-about-clients">
                                            <div class="jobFilter-about-clients-single flex-between">
                                                <div class="jobFilter-about-clients-flex">
                                        <span class="jobFilter-about-clients-icon"> <img
                                                    src="<?php echo e(asset('assets/static/icons/hire_rate.svg')); ?>"
                                                    alt=""> </span>
                                                    <span class="jobFilter-about-clients-para"><?php echo e(__('Hire rate')); ?></span>
                                                </div>
                                                <h6 class="jobFilter-wrapper-item-completed"> <?php if($hiring_rate > 100): ?> 100% <?php else: ?> <?php echo e(round($hiring_rate) ?? 0); ?>% <?php endif; ?>
                                                </h6>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
        </div>
        <!-- Profile Details area end -->
    </main>

    <?php echo $__env->make('frontend.user.freelancer.order.order-submit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.user.freelancer.order.revision-details', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.user.freelancer.order.report-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.user.freelancer.order.order-submit-description', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sweet-alert.sweet-alert2-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sweet-alert.sweet-alert2-js'); ?>
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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.summernote.summernote-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('summernote.summernote-js'); ?>
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
    <?php echo $__env->make('frontend.user.freelancer.order.order-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/frontend/user/freelancer/order/order-details.blade.php ENDPATH**/ ?>