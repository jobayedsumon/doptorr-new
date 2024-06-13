<?php $__env->startSection('site_title'); ?>
    <?php echo e($project->title ?? __('Project Preview')); ?>

<?php $__env->stopSection(); ?>
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
        .rating_profile_details {
            display: flex;
            align-items: center;
            gap: 5px;
        }
        <?php if(get_static_option('profile_page_badge_settings') == 'enable'): ?>
        .level-badge-wrapper {
            top: 10px;
            right: 10px;
        }
        .jobFilter-proposal-author-contents-subtitle{
            padding-left:10px;
        }
        <?php endif; ?>
        .disabled-link {
            background-color: #ccc !important;
            pointer-events: none;
            cursor: default;
        }

        [data-star] {
            text-align: left;
            font-style: normal;
            display: inline-block;
            position: relative;
            unicode-bidi: bidi-override;
        }

        [data-star]::before {
            display: block;
            content: "\f005" "\f005" "\f005" "\f005" "\f005";
            width: 100%;
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 15px;
            ;
            color: var(--body-color);
        }

        [data-star]::after {
            white-space: nowrap;
            position: absolute;
            top: 0;
            left: 0;
            content: "\f005" "\f005" "\f005" "\f005" "\f005";
            width: 100%;
            font-family: "Font Awesome 6 Free";
            font-weight: 900;
            font-size: 15px;
            ;
            width: 0;
            color: var(--secondary-color);
            overflow: hidden;
            height: 100%;
        }

        [data-star^="0.1"]::after {
            width: 2%
        }

        [data-star^="0.2"]::after {
            width: 4%
        }

        [data-star^="0.3"]::after {
            width: 6%
        }

        [data-star^="0.4"]::after {
            width: 8%
        }

        [data-star^="0.5"]::after {
            width: 10%
        }

        [data-star^="0.6"]::after {
            width: 12%
        }

        [data-star^="0.7"]::after {
            width: 14%
        }

        [data-star^="0.8"]::after {
            width: 16%
        }

        [data-star^="0.9"]::after {
            width: 18%
        }

        [data-star^="1"]::after {
            width: 20%
        }

        [data-star^="1.1"]::after {
            width: 22%
        }

        [data-star^="1.2"]::after {
            width: 24%
        }

        [data-star^="1.3"]::after {
            width: 26%
        }

        [data-star^="1.4"]::after {
            width: 28%
        }

        [data-star^="1.5"]::after {
            width: 30%
        }

        [data-star^="1.6"]::after {
            width: 32%
        }

        [data-star^="1.7"]::after {
            width: 34%
        }

        [data-star^="1.8"]::after {
            width: 36%
        }

        [data-star^="1.9"]::after {
            width: 38%
        }

        [data-star^="2"]::after {
            width: 40%
        }

        [data-star^="2.1"]::after {
            width: 42%
        }

        [data-star^="2.2"]::after {
            width: 44%
        }

        [data-star^="2.3"]::after {
            width: 46%
        }

        [data-star^="2.4"]::after {
            width: 48%
        }

        [data-star^="2.5"]::after {
            width: 50%
        }

        [data-star^="2.6"]::after {
            width: 52%
        }

        [data-star^="2.7"]::after {
            width: 54%
        }

        [data-star^="2.8"]::after {
            width: 56%
        }

        [data-star^="2.9"]::after {
            width: 58%
        }

        [data-star^="3"]::after {
            width: 60%
        }

        [data-star^="3.1"]::after {
            width: 62%
        }

        [data-star^="3.2"]::after {
            width: 64%
        }

        [data-star^="3.3"]::after {
            width: 66%
        }

        [data-star^="3.4"]::after {
            width: 68%
        }

        [data-star^="3.5"]::after {
            width: 70%
        }

        [data-star^="3.6"]::after {
            width: 72%
        }

        [data-star^="3.7"]::after {
            width: 74%
        }

        [data-star^="3.8"]::after {
            width: 76%
        }

        [data-star^="3.9"]::after {
            width: 78%
        }

        [data-star^="4"]::after {
            width: 80%
        }

        [data-star^="4.1"]::after {
            width: 82%
        }

        [data-star^="4.2"]::after {
            width: 84%
        }

        [data-star^="4.3"]::after {
            width: 86%
        }

        [data-star^="4.4"]::after {
            width: 88%
        }

        [data-star^="4.5"]::after {
            width: 90%
        }

        [data-star^="4.6"]::after {
            width: 92%
        }

        [data-star^="4.7"]::after {
            width: 94%
        }

        [data-star^="4.8"]::after {
            width: 96%
        }

        [data-star^="4.9"]::after {
            width: 98%
        }

        [data-star^="5"]::after {
            width: 100%
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb.user-profile-breadcrumb','data' => ['title' => __('Project Details'),'innerTitle' => __('Project Details')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb.user-profile-breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Project Details')),'innerTitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Project Details'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <!-- Project preview area Starts -->
        <div class="preview-area section-bg-2 pat-100 pab-100">
            <div class="container">
                <div class="row g-4">
                    <div class="col-xl-7 col-lg-7">
                        <div class="project-preview">
                            <div class="project-preview-thumb">
                                <img src="<?php echo e(asset('assets/uploads/project/' . $project->image)); ?>"
                                    alt="<?php echo e($project->title); ?>">
                            </div>
                            <div class="project-preview-contents mt-4">
                                <div class="single-project-content-top align-items-center flex-between">
                                    <?php echo project_rating($project->id); ?>

                                </div>
                                <h4 class="project-preview-contents-title mt-3"> <?php echo e($project->title); ?> </h4>
                                <p class="project-preview-contents-para"> <?php echo $project->description; ?> </p>
                            </div>
                        </div>
                        <div class="project-preview">
                            <div class="myJob-wrapper-single-flex flex-between align-items-center">
                                <div class="myJob-wrapper-single-contents">
                                    <div class="jobFilter-proposal-author-flex">
                                        <div class="jobFilter-proposal-author-thumb position-relative">
                                            <?php if($user->image): ?>
                                                <a href="<?php echo e(route('freelancer.profile.details', $user->username)); ?>">
                                                    <img src="<?php echo e(asset('assets/uploads/profile/' . $user->image)); ?>"
                                                        alt="<?php echo e($user->first_name); ?>">
                                                </a>
                                                <?php if(moduleExists('FreelancerLevel')): ?>
                                                    <?php if(get_static_option('profile_page_badge_settings') == 'enable'): ?>
                                                        <div class="freelancer-level-badge position-absolute">
                                                            <?php echo freelancer_level($user->id,'talent') ?? ''; ?>

                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <a href="<?php echo e(route('freelancer.profile.details', $user->username)); ?>">
                                                    <img src="<?php echo e(asset('assets/static/img/author/author.jpg')); ?>"
                                                        alt="<?php echo e(__('AuthorImg')); ?>">
                                                </a>
                                                <?php if(moduleExists('FreelancerLevel')): ?>
                                                    <?php if(get_static_option('profile_page_badge_settings') == 'enable'): ?>
                                                        <div class="freelancer-level-badge position-absolute">
                                                            <?php echo freelancer_level($user->id,'talent') ?? ''; ?>

                                                        </div>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php endif; ?>
                                        </div>
                                        <div class="jobFilter-proposal-author-contents">
                                            <h4 class="single-freelancer-author-name">
                                                <a
                                                    href="<?php echo e(route('freelancer.profile.details', $user->username)); ?>"><?php echo e($user->first_name); ?>

                                                    <?php echo e($user->last_name); ?><?php if(moduleExists('FreelancerLevel')): ?><small><?php echo e(freelancer_level($user->id)); ?></small><?php endif; ?>
                                                </a>
                                                <?php if(Cache::has('user_is_online_' . $user->id)): ?>
                                                    <span class="single-freelancer-author-status"> <?php echo e(__('Active')); ?> </span>
                                                <?php else: ?>
                                                    <span class="single-freelancer-author-status-ofline"> <?php echo e(__('Inactive')); ?> </span>
                                                <?php endif; ?>
                                            </h4>
                                            <p class="jobFilter-proposal-author-contents-subtitle mt-2">
                                                <?php if($user->user_introduction?->title): ?>
                                                <?php echo e($user->user_introduction?->title); ?> ·
                                                <?php endif; ?>
                                                <span>
                                                    <?php if($user->user_state?->state): ?>
                                                    <?php echo e($user->user_state?->state); ?>,
                                                    <?php endif; ?>
                                                    <?php echo e($user->user_country?->country); ?>

                                                </span>
                                                <?php if($user->user_verified_status == 1): ?> <i class="fas fa-circle-check"></i><?php endif; ?>
                                            </p>
                                            <div class="jobFilter-proposal-author-contents-review mt-2">
                                                <?php echo freelancer_rating($user->id); ?>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type == 1): ?>
                                    <div class="btn-wrapper">
                                        <form action="<?php echo e(route('client.message.send')); ?>" method="post"
                                            enctype="multipart/form-data">
                                            <?php echo csrf_field(); ?>
                                            <input type="hidden" name="freelancer_id" id="freelancer_id"
                                                value="<?php echo e($project->user_id); ?>">
                                            <input type="hidden" name="from_user" id="from_user"
                                                value="<?php echo e(Auth::guard('web')->user()->id); ?>">
                                            <input type="hidden" name="project_id" id="project_id"
                                                value="<?php echo e($project->id); ?>">
                                            <button type="submit" class="btn-profile btn-bg-1">
                                                <i class="fa-regular fa-comments"></i>  <?php echo e(__('Contact Me')); ?></button>
                                        </form>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                        <?php if(!empty($project->standard_title) && !empty($project->premium_title)): ?>
                            <div class="project-preview" id="comparePackage">
                                <div class="project-preview-head profile-border-bottom">
                                    <h4 class="project-preview-head-title"> <?php echo e(__('Compare Packages')); ?> </h4>
                                </div>
                                <div class="pricing-wrapper d-flex flex-wrap">
                                    <!-- left wrapper -->
                                    <div class="pricing-wrapper-left">
                                        <div class="pricing-wrapper-card mb-30">
                                            <div class="pricing-wrapper-card-top">
                                            </div>
                                            <div class="pricing-wrapper-card-bottom">
                                                <div class="pricing-wrapper-card-bottom-list">
                                                    <ul class="list-style-none">
                                                        <li><?php echo e(__('Revisions')); ?></li>
                                                        <li><?php echo e(__('Delivery time')); ?></li>
                                                        <?php $__currentLoopData = $project->project_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <li><?php echo e($attr->check_numeric_title); ?></li>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <li><?php echo e(__('Charges')); ?></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-wrapper-right d-flex flex-wrap">
                                        <?php if($project->basic_title): ?>
                                            <div class="pricing-wrapper-card text-center">
                                                <div class="pricing-wrapper-card-top">
                                                    <h2 class="pricing-wrapper-card-top-prices">
                                                        <?php echo e($project->basic_title); ?>

                                                    </h2>
                                                </div>
                                                <div class="pricing-wrapper-card-bottom">
                                                    <div class="pricing-wrapper-card-bottom-list">
                                                        <ul class="list-style-none">
                                                            <li><span class="close-icon"><?php echo e($project->basic_revision); ?>

                                                                </span></li>
                                                            <li><span class="close-icon"><?php echo e(__($project->basic_delivery)); ?>

                                                                </span></li>
                                                            <?php $__currentLoopData = $project->project_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <?php if($attr->basic_check_numeric == 'on'): ?>
                                                                    <li><span class="check-icon"> <i
                                                                                class="fas fa-check"></i>
                                                                        </span></li>
                                                                <?php elseif($attr->basic_check_numeric == 'off'): ?>
                                                                    <li><span class="close-icon"> <i
                                                                                class="fas fa-times"></i>
                                                                        </span></li>
                                                                <?php else: ?>
                                                                    <li><span class="close-icon">
                                                                            <?php echo e($attr->basic_check_numeric); ?> </span></li>
                                                                <?php endif; ?>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                            <li>
                                                                <div class="price">
                                                                    <?php if($project->basic_discount_charge != null && $project->basic_discount_charge > 0): ?>
                                                                        <h6 class="price-main">
                                                                            <?php echo e(amount_with_currency_symbol($project->basic_discount_charge)); ?>

                                                                        </h6>
                                                                        <s class="price-old">
                                                                            <?php echo e(amount_with_currency_symbol($project->basic_regular_charge)); ?></s>
                                                                    <?php else: ?>
                                                                        <h6 class="price-main">
                                                                            <?php echo e(amount_with_currency_symbol($project->basic_regular_charge)); ?>

                                                                        </h6>
                                                                    <?php endif; ?>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                        <div class="pricing-wrapper-card text-center">
                                            <div class="pricing-wrapper-card-top">
                                                <h2 class="pricing-wrapper-card-top-prices">
                                                    <?php echo e($project->standard_title); ?>

                                                </h2>
                                            </div>

                                            <div class="pricing-wrapper-card-bottom">
                                                <div class="pricing-wrapper-card-bottom-list">
                                                    <ul class="list-style-none">
                                                        <li><span class="close-icon">
                                                                <?php echo e($project->standard_revision); ?></span>
                                                        </li>
                                                        <li><span class="close-icon"><?php echo e(__($project->standard_delivery)); ?> </span>
                                                        </li>
                                                        <?php $__currentLoopData = $project->project_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($attr->standard_check_numeric == 'on'): ?>
                                                                <li><span class="check-icon"> <i class="fas fa-check"></i>
                                                                    </span></li>
                                                            <?php elseif($attr->standard_check_numeric == 'off'): ?>
                                                                <li><span class="close-icon"> <i class="fas fa-times"></i>
                                                                    </span></li>
                                                            <?php else: ?>
                                                                <li>
                                                                    <span class="close-icon">
                                                                        <?php echo e($attr->standard_check_numeric); ?>

                                                                    </span>
                                                                </li>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <div class="price">
                                                                <?php if($project->standard_discount_charge != null && $project->standard_discount_charge > 0): ?>
                                                                    <h6 class="price-main">
                                                                        <?php echo e(amount_with_currency_symbol($project->standard_discount_charge)); ?>

                                                                    </h6>
                                                                    <s class="price-old">
                                                                        <?php echo e(amount_with_currency_symbol($project->standard_regular_charge ?? '')); ?></s>
                                                                <?php else: ?>
                                                                    <h6 class="price-main">
                                                                        <?php echo e(amount_with_currency_symbol($project->standard_regular_charge ?? '')); ?>

                                                                    </h6>
                                                                <?php endif; ?>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="pricing-wrapper-card text-center">
                                            <div class="pricing-wrapper-card-top">
                                                <h2 class="pricing-wrapper-card-top-prices"><?php echo e($project->premium_title); ?>

                                                </h2>
                                            </div>
                                            <div class="pricing-wrapper-card-bottom">
                                                <div class="pricing-wrapper-card-bottom-list">
                                                    <ul class="list-style-none">
                                                        <li><span class="close-icon"> <?php echo e($project->premium_revision); ?>

                                                            </span>
                                                        </li>
                                                        <li><span class="close-icon"><?php echo e(__($project->premium_delivery)); ?></span>
                                                        </li>
                                                        <?php $__currentLoopData = $project->project_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <?php if($attr->premium_check_numeric == 'on'): ?>
                                                                <li><span class="check-icon"> <i class="fas fa-check"></i>
                                                                    </span></li>
                                                            <?php elseif($attr->premium_check_numeric == 'off'): ?>
                                                                <li><span class="close-icon"> <i class="fas fa-times"></i>
                                                                    </span></li>
                                                            <?php else: ?>
                                                                <li><span class="close-icon">
                                                                        <?php echo e($attr->premium_check_numeric); ?> </span></li>
                                                            <?php endif; ?>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        <li>
                                                            <div class="price">
                                                                <?php if($project->premium_discount_charge != null && $project->premium_discount_charge > 0): ?>
                                                                    <h6 class="price-main">
                                                                        <?php echo e(amount_with_currency_symbol($project->premium_discount_charge)); ?>

                                                                    </h6>
                                                                    <s class="price-old">
                                                                        <?php echo e(amount_with_currency_symbol($project->premium_regular_charge)); ?>

                                                                    </s>
                                                                <?php else: ?>
                                                                    <h6 class="price-main">
                                                                        <?php echo e(amount_with_currency_symbol($project->premium_regular_charge)); ?>

                                                                    </h6>
                                                                <?php endif; ?>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php
                        $pagination_limit = 10;
                        $project_id = $project->id;
                        $countProjectCompleteOrder = \App\Models\Order::select('id')
                            ->where('identity', $project->id)
                            ->where('is_project_job', 'project')
                            ->where('status', 3)
                            ->count();
                        ?>

                        <?php if($countProjectCompleteOrder >= 1): ?>
                            <div class="project-preview">
                                <div class="project-preview-head profile-border-bottom">
                                    <h4 class="project-preview-head-title"><?php echo e(__('Feedback & Reviews')); ?></h4>
                                </div>
                                <div class="project-reviews">
                                    <?php echo $__env->make('frontend.pages.project-details.reviews', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                                </div>
                                <?php if($countProjectCompleteOrder > $pagination_limit): ?>
                                <a href="javascript:void(0)" data-project-id="<?php echo e($project_id); ?>"
                                    class="btn-profile btn-bg-1 text-center load_more_data"
                                    data-review-count="<?php echo e($countProjectCompleteOrder); ?>" data-page-id="1"
                                    data-pagination-limit="<?php echo e($pagination_limit); ?>"><?php echo e(__('Load More')); ?>

                                </a>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-xl-5 col-lg-5">
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
                        <div class="sticky-sidebar">
                            <div class="project-preview">
                                <div class="project-preview-tab">
                                    <ul class="tabs">
                                        <li data-tab="basic" class="active"><?php echo e($project->basic_title); ?></li>
                                        <li data-tab="standard" class="<?php if(empty($project->standard_title)): ?> pe-none <?php endif; ?>"><?php echo e($project->standard_title); ?></li>
                                        <li data-tab="premium" class="<?php if(empty($project->premium_title)): ?> pe-none <?php endif; ?>"><?php echo e($project->premium_title); ?></li>
                                    </ul>
                                    <div class="project-preview-tab-contents mt-4">

                                        <div class="tab-content-item active" id="basic">
                                            <div class="project-preview-tab-header">
                                                <div class="project-preview-tab-header-item">
                                                    <span class="left"><i class="fa-solid fa-repeat"></i>
                                                        <?php echo e(__('Revisions')); ?></span>
                                                    <strong class="right"><?php echo e($project->basic_revision); ?></strong>
                                                </div>
                                                <div class="project-preview-tab-header-item">
                                                    <span class="left"><i class="fa-regular fa-clock"></i>
                                                        <?php echo e(__('Delivery time')); ?></span>
                                                    <strong class="right"><?php echo e(__($project->basic_delivery)); ?></strong>
                                                </div>
                                            </div>
                                            <div class="project-preview-tab-inner mt-4">
                                                <?php $__currentLoopData = $project->project_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="project-preview-tab-inner-item">
                                                        <span class="left"><?php echo e($attr->check_numeric_title); ?></span>
                                                        <?php if($attr->basic_check_numeric == 'on'): ?>
                                                            <span class="check-icon"> <i class="fas fa-check"></i> </span>
                                                        <?php elseif($attr->basic_check_numeric == 'off'): ?>
                                                            <span class="close-icon"> <i class="fas fa-times"></i> </span>
                                                        <?php else: ?>
                                                            <span class="right"> <?php echo e($attr->basic_check_numeric); ?> </span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="project-preview-tab-inner-item">
                                                    <?php if($project->basic_discount_charge != null && $project->basic_discount_charge > 0): ?>
                                                        <span class="left price-title"><?php echo e(__('Price')); ?></span>
                                                        <span class="right price">
                                                            <s><?php echo e(amount_with_currency_symbol($project->basic_regular_charge ?? '')); ?></s><span><?php echo e(amount_with_currency_symbol($project->basic_discount_charge)); ?></span></span>
                                                    <?php else: ?>
                                                        <span class="left price-title"><?php echo e(__('Price')); ?></span>
                                                        <span
                                                            class="right price"><span><?php echo e(amount_with_currency_symbol($project->basic_regular_charge ?? '')); ?></span></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content-item" id="standard">
                                            <div class="project-preview-tab-header">
                                                <div class="project-preview-tab-header-item">
                                                    <span class="left"><i class="fa-solid fa-repeat"></i>
                                                        <?php echo e(__('Revisions')); ?></span>
                                                    <strong class="right"><?php echo e($project->standard_revision); ?></strong>
                                                </div>
                                                <div class="project-preview-tab-header-item">
                                                    <span class="left"><i class="fa-regular fa-clock"></i>
                                                        <?php echo e(__('Delivery time')); ?></span>
                                                    <strong class="right"><?php echo e(__($project->standard_delivery)); ?></strong>
                                                </div>
                                            </div>
                                            <div class="project-preview-tab-inner mt-4">
                                                <?php $__currentLoopData = $project->project_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="project-preview-tab-inner-item">
                                                        <span class="left"><?php echo e($attr->check_numeric_title); ?></span>
                                                        <?php if($attr->standard_check_numeric == 'on'): ?>
                                                            <span class="check-icon"> <i class="fas fa-check"></i> </span>
                                                        <?php elseif($attr->standard_check_numeric == 'off'): ?>
                                                            <span class="close-close"> <i class="fas fa-times"></i>
                                                            </span>
                                                        <?php else: ?>
                                                            <span class="right"> <?php echo e($attr->standard_check_numeric); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <div class="project-preview-tab-inner-item">
                                                    <?php if($project->standard_discount_charge != null && $project->standard_discount_charge > 0): ?>
                                                        <span class="left price-title"><?php echo e(__('Price')); ?></span>
                                                        <span class="right price">
                                                            <s><?php echo e(amount_with_currency_symbol($project->standard_regular_charge ?? '')); ?></s><span><?php echo e(amount_with_currency_symbol($project->standard_discount_charge)); ?></span></span>
                                                    <?php else: ?>
                                                        <span class="left price-title"><?php echo e(__('Price')); ?></span>
                                                        <span
                                                            class="right price"><span><?php echo e(amount_with_currency_symbol($project->standard_regular_charge ?? '')); ?></span></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-content-item" id="premium">
                                            <div class="project-preview-tab-header">
                                                <div class="project-preview-tab-header-item">
                                                    <span class="left"><i class="fa-solid fa-repeat"></i>
                                                        <?php echo e(__('Revisions')); ?></span>
                                                    <strong class="right"><?php echo e($project->premium_revision); ?></strong>
                                                </div>
                                                <div class="project-preview-tab-header-item">
                                                    <span class="left"><i class="fa-regular fa-clock"></i>
                                                        <?php echo e(__('Delivery time')); ?></span>
                                                    <strong class="right"><?php echo e(__($project->premium_delivery)); ?></strong>
                                                </div>
                                            </div>
                                            <div class="project-preview-tab-inner mt-4">
                                                <?php $__currentLoopData = $project->project_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <div class="project-preview-tab-inner-item">
                                                        <span class="left"><?php echo e($attr->check_numeric_title); ?></span>
                                                        <?php if($attr->premium_check_numeric == 'on'): ?>
                                                            <span class="check-icon"> <i class="fas fa-check"></i> </span>
                                                        <?php elseif($attr->premium_check_numeric == 'off'): ?>
                                                            <span class="close-icon"> <i class="fas fa-times"></i> </span>
                                                        <?php else: ?>
                                                            <span class="right"> <?php echo e($attr->premium_check_numeric); ?>

                                                            </span>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                                                <div class="project-preview-tab-inner-item">
                                                    <?php if($project->premium_discount_charge != null && $project->premium_discount_charge > 0): ?>
                                                        <span class="left price-title"><?php echo e(__('Price')); ?></span>
                                                        <span class="right price">
                                                            <s><?php echo e(amount_with_currency_symbol($project->premium_regular_charge ?? '')); ?></s><span><?php echo e(amount_with_currency_symbol($project->premium_discount_charge)); ?></span></span>
                                                    <?php else: ?>
                                                        <span class="left price-title"><?php echo e(__('Price')); ?></span>
                                                        <span
                                                            class="right price"><span><?php echo e(amount_with_currency_symbol($project->premium_regular_charge ?? '')); ?></span></span>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-wrapper flex-btn justify-content-between mt-4">
                                            <?php if(Auth::guard('web')->check()): ?>
                                                <?php if(Auth::guard('web')->user()->user_type == 1): ?>
                                                    <form action="<?php echo e(route('client.message.send')); ?>" method="post"
                                                        enctype="multipart/form-data">
                                                        <?php echo csrf_field(); ?>
                                                        <input type="hidden" name="freelancer_id" id="freelancer_id"
                                                            value="<?php echo e($project->user_id); ?>">
                                                        <input type="hidden" name="from_user" id="from_user"
                                                            value="1">
                                                        <input type="hidden" name="project_id" id="project_id"
                                                            value="<?php echo e($project->id); ?>">
                                                        <button type="submit" class="btn-profile btn-outline-gray"><i
                                                                class="fa-regular fa-comments"></i>
                                                            <?php echo e(__('Contact Me')); ?></button>
                                                    </form>
                                                    <?php if(moduleExists('SecurityManage')): ?>
                                                        <?php if(Auth::guard('web')->user()->freeze_order_create == 'freeze'): ?>
                                                            <a href="javascript:void(0)" class="btn-profile btn-bg-1 <?php if(Auth::guard('web')->user()->freeze_order_create == 'freeze'): ?> disabled-link <?php endif; ?>">
                                                                <?php echo e(__('Continue to Order')); ?>

                                                            </a>
                                                        <?php else: ?>
                                                            <a href="javascript:void(0)"
                                                               class="btn-profile btn-bg-1 basic_standard_premium"
                                                               data-project_id="<?php echo e($project->id); ?>" data-bs-toggle="modal"
                                                               data-bs-target="#paymentGatewayModal"><?php echo e(__('Continue to Order')); ?>

                                                            </a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <a href="javascript:void(0)"
                                                           class="btn-profile btn-bg-1 basic_standard_premium"
                                                           data-project_id="<?php echo e($project->id); ?>" data-bs-toggle="modal"
                                                           data-bs-target="#paymentGatewayModal"><?php echo e(__('Continue to Order')); ?>

                                                        </a>
                                                    <?php endif; ?>
                                                <?php endif; ?>
                                            <?php else: ?>
                                                <a class="btn-profile btn-outline-gray contact_warning_chat_message">
                                                    <i class="fa-regular fa-comments"></i><?php echo e(__('Contact Me')); ?>

                                                </a>
                                                <a href="javascript:void(0)" class="btn-profile btn-bg-1"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#loginModal"><?php echo e(__('Login to Order')); ?>

                                                </a>
                                            <?php endif; ?>
                                        </div>
                                        <?php if(!empty($project->standard_title) && !empty($project->premium_title)): ?>
                                            <div class="btn-wrapper text-left mt-4">
                                                <a href="#comparePackage" class="compareBtn">
                                                    <?php echo e(__('Compare Package')); ?>

                                                </a>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Project preview area end -->
    </main>

    <?php echo $__env->make('frontend.pages.order.login-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.pages.order.gateway-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
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
    <?php echo $__env->make('frontend.pages.project-details.load-more-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php echo $__env->make('frontend.pages.order.order-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/pages/project-details/project-details.blade.php ENDPATH**/ ?>