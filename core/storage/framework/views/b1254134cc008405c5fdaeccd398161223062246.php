<?php $__env->startSection('site_title',__('Profile Details')); ?>
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select2.select2-css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select2.select2-css'); ?>
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
        .rating_profile_details {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        .level-badge-wrapper {
            top: 10px;
            right: 14px;
        }
        .disabled-link {
            background-color: #ccc !important;
            pointer-events: none;
            cursor: default;
        }
        [data-star] {
            text-align:left;
            font-style:normal;
            display:inline-block;
            position: relative;
            unicode-bidi: bidi-override;
        }
        [data-star]::before {
            display:block;
            content: "\f005" "\f005" "\f005" "\f005" "\f005";
            width: 100%;
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 15px;;
            color: var(--body-color);
        }
        [data-star]::after {
            white-space:nowrap;
            position:absolute;
            top:0;
            left:0;
            content: "\f005" "\f005" "\f005" "\f005" "\f005";
            width: 100%;
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 15px;;
            width: 0;
            color: var(--secondary-color);
            overflow:hidden;
            height:100%;
        }

        [data-star^="0.1"]::after{width:2%}
        [data-star^="0.2"]::after{width:4%}
        [data-star^="0.3"]::after{width:6%}
        [data-star^="0.4"]::after{width:8%}
        [data-star^="0.5"]::after{width:10%}
        [data-star^="0.6"]::after{width:12%}
        [data-star^="0.7"]::after{width:14%}
        [data-star^="0.8"]::after{width:16%}
        [data-star^="0.9"]::after{width:18%}
        [data-star^="1"]::after{width:20%}
        [data-star^="1.1"]::after{width:22%}
        [data-star^="1.2"]::after{width:24%}
        [data-star^="1.3"]::after{width:26%}
        [data-star^="1.4"]::after{width:28%}
        [data-star^="1.5"]::after{width:30%}
        [data-star^="1.6"]::after{width:32%}
        [data-star^="1.7"]::after{width:34%}
        [data-star^="1.8"]::after{width:36%}
        [data-star^="1.9"]::after{width:38%}
        [data-star^="2"]::after{width:40%}
        [data-star^="2.1"]::after{width:42%}
        [data-star^="2.2"]::after{width:44%}
        [data-star^="2.3"]::after{width:46%}
        [data-star^="2.4"]::after{width:48%}
        [data-star^="2.5"]::after{width:50%}
        [data-star^="2.6"]::after{width:52%}
        [data-star^="2.7"]::after{width:54%}
        [data-star^="2.8"]::after{width:56%}
        [data-star^="2.9"]::after{width:58%}
        [data-star^="3"]::after{width:60%}
        [data-star^="3.1"]::after{width:62%}
        [data-star^="3.2"]::after{width:64%}
        [data-star^="3.3"]::after{width:66%}
        [data-star^="3.4"]::after{width:68%}
        [data-star^="3.5"]::after{width:70%}
        [data-star^="3.6"]::after{width:72%}
        [data-star^="3.7"]::after{width:74%}
        [data-star^="3.8"]::after{width:76%}
        [data-star^="3.9"]::after{width:78%}
        [data-star^="4"]::after{width:80%}
        [data-star^="4.1"]::after{width:82%}
        [data-star^="4.2"]::after{width:84%}
        [data-star^="4.3"]::after{width:86%}
        [data-star^="4.4"]::after{width:88%}
        [data-star^="4.5"]::after{width:90%}
        [data-star^="4.6"]::after{width:92%}
        [data-star^="4.7"]::after{width:94%}
        [data-star^="4.8"]::after{width:96%}
        [data-star^="4.9"]::after{width:98%}
        [data-star^="5"]::after{width:100%}

        .project_reject_reason_description
        {
            white-space: pre-line
        }
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb.user-profile-breadcrumb','data' => ['title' => __('Profile Details'),'innerTitle' => __('Profile Details')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb.user-profile-breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Profile Details')),'innerTitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Profile Details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

        <!-- Profile Details area Starts -->
        <div class="profile-area pat-100 pab-100 section-bg-2">
            <div class="container">
                <div class="row gy-4 justify-content-center">
                    <div class="col-xl-7">
                        <div class="profile-wrapper">

                            <?php echo $__env->make('frontend.profile-details.profile', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

                            <div class="profile-wrapper-item radius-10">
                                <div class="profile-wrapper-details">
                                    <div class="profile-wrapper-details-single">
                                        <div class="profile-wrapper-details-single-flex">
                                            <div class="profile-wrapper-details-single-thumb">
                                                <?php echo e(site_currency_symbol() ?? ''); ?>

                                            </div>
                                            <div class="profile-wrapper-details-single-contents">
                                                <h4 class="profile-wrapper-details-single-contents-title"> <?php echo e(float_amount_with_currency_symbol($total_earning->total_earning ?? 0)); ?> </h4>
                                                <p class="profile-wrapper-details-single-contents-para"> <?php echo e(__('Total Earned')); ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-wrapper-details-single">
                                        <div class="profile-wrapper-details-single-flex">
                                            <div class="profile-wrapper-details-single-thumb"><img
                                               src="<?php echo e(asset('assets/static/icons/project_complete.svg')); ?>" alt="<?php echo e(__('complete order')); ?>"></div>
                                            <div class="profile-wrapper-details-single-contents">
                                                <h4 class="profile-wrapper-details-single-contents-title"> <?php echo e($complete_orders->count()); ?> </h4>
                                                <p class="profile-wrapper-details-single-contents-para"> <?php echo e(__('Order Completed')); ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="profile-wrapper-details-single">
                                        <div class="profile-wrapper-details-single-flex">
                                            <div class="profile-wrapper-details-single-thumb"><img
                                               src="<?php echo e(asset('assets/static/icons/active_order.svg')); ?>" alt="<?php echo e(__('active order')); ?>"></div>
                                            <div class="profile-wrapper-details-single-contents">
                                                <h4 class="profile-wrapper-details-single-contents-title"> <?php echo e($active_orders_count ?? __('No Active Orders')); ?> </h4>
                                                <p class="profile-wrapper-details-single-contents-para"> <?php echo e(__('Active Orders')); ?> </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php if(get_static_option('project_enable_disable') != 'disable'): ?>
                            <?php echo $__env->make('frontend.profile-details.project', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php endif; ?>
                            <?php echo $__env->make('frontend.profile-details.experience', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('frontend.profile-details.education', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                            <?php echo $__env->make('frontend.profile-details.skill', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                    <div class="col-xl-5">
                        <div class="profile-details-widget sticky_top">

                            <?php if($complete_orders->count() >= 1): ?>
                            <div class="profile-details-widget-single radius-10">
                                <div
                                    class="profile-wrapper-item-flex flex-between align-items-center profile-border-bottom">
                                    <h4 class="profile-wrapper-item-title"> <?php echo e(__('Reviews')); ?> </h4>
                                </div>
                                <?php $__currentLoopData = $complete_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                   <?php $rating = \App\Models\Rating::where('order_id',$order->id)->where('sender_type',1)->first() ?>
                                    <?php if($rating): ?>
                                        <div class="profile-details-widget-inner">
                                            <div class="profile-details-widget-review">
                                                <div class="rating_profile_details">
                                                    <div class="rating_profile_details_icon">
                                                        <i data-star="<?php echo e($rating->rating); ?>"></i>
                                                    </div>
                                                    <span class="rating_profile_details-para"><?php echo e($rating->rating); ?></span>
                                                </div>
                                                <?php if($rating?->order?->project): ?>
                                                   <h4 class="profile-details-widget-review-title mt-3"><?php echo e($rating?->order?->project?->title); ?></h4>
                                                <?php else: ?>
                                                    <h4 class="profile-details-widget-review-title mt-3"><?php echo e($rating?->order?->job?->title); ?></h4>
                                                <?php endif; ?>
                                            </div>
                                            <div class="profile-wrapper-details profile-border-top">
                                                <div class="profile-wrapper-details-single">
                                                    <span class="profile-wrapper-details-para"> <?php echo e(__('Earned')); ?> </span>
                                                    <h5 class="profile-wrapper-details-single-title mt-1"> <?php echo e(float_amount_with_currency_symbol($rating->order?->payable_amount)); ?> </h5>
                                                </div>
                                                <div class="profile-wrapper-details-single">
                                                    <span class="profile-wrapper-details-para"> <?php echo e(__('Reviewed by')); ?> </span>
                                                    <h5 class="profile-wrapper-details-single-title mt-1"> <?php echo e($rating->order?->user?->fullname); ?> </h5>
                                                </div>
                                                <div class="profile-wrapper-details-single">
                                                    <span class="profile-wrapper-details-para"> <?php echo e(__('Reviewed')); ?> </span>
                                                    <h5 class="profile-wrapper-details-single-title mt-1"> <?php echo e($rating->created_at->toFormattedDateString()); ?> </h5>
                                                </div>
                                            </div>
                                            <div class="profile-details-widget-single-bottom profile-border-top">
                                                <p class="profile-details-widget-single-bottom-para"><?php echo e($rating->review_feedback); ?> </p>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php endif; ?>

                            <?php echo $__env->make('frontend.profile-details.all-portfolio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile Details area end -->

        <!-- Change Portfolio Popup Starts -->
        <div class="popup-fixed change-portfolio-popup">
            <div class="popup-contents"></div>
        </div>
        <!-- Change Portfolio Popup Ends -->

    <?php echo $__env->make('frontend.profile-details.add-portfolio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.profile-details.edit-portfolio', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

</main>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.select2.select2-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('select2.select2-js'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.payment-gateway.gateway-select-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend.payment-gateway.gateway-select-js'); ?>
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
    <?php echo $__env->make('frontend.profile-details.profile-details-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/profile-details/profile-details.blade.php ENDPATH**/ ?>