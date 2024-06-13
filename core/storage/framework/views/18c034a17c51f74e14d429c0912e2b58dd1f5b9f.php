<!-- Banner area Starts -->
<div class="banner-area banner-area-padding section-bg-1" data-padding-top="<?php echo e($padding_top ?? ''); ?>" data-padding-bottom="<?php echo e($padding_bottom ?? ''); ?>" style="background-color:<?php echo e($section_bg ?? ''); ?>">
    <div class="container">
        <div class="row gy-5 align-items-center flex-column-reverse flex-lg-row">
            <div class="col-lg-7">
                <div class="banner-single">
                    <div class="banner-single-content">
                        <h1 class="banner-single-content-title"> <?php echo e($title ?? __('Work from anywhere, Get the freedom you deserve')); ?> </h1>
                        <p class="banner-single-content-para"> <?php echo e($subtitle ?? __('Get hired by great clients and businesses around the world and work independently as you want.')); ?> </p>

                        <div class="btn-wrapper flex-btn mt-5">
                            <?php if(get_static_option('job_enable_disable') != 'disable'): ?>
                                <a href="<?php echo e(route('jobs.all') ?? ''); ?>" class="cmn-btn btn-bg-1"> <?php echo e($find_work_button_text ?? __('Find Work')); ?> </a>
                            <?php endif; ?>
                            <?php if(get_static_option('project_enable_disable') != 'disable'): ?>
                                <a href="<?php echo e(route('projects.all') ?? ''); ?>" class="cmn-btn btn-outline-1 color-one"> <?php echo e($find_project_button_text ?? __('Find Project')); ?> </a>
                            <?php endif; ?>
                        </div>
                        <div class="banner-single-content-logo mt-5">
                            <h5 class="banner-single-content-logo-title"> <?php echo e(__('Trusted by:')); ?> </h5>
                            <ul class="banner-single-content-logo-list list-style-none my-4">
                                <?php $__currentLoopData = $repeater_data['logo_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="banner-single-content-logo-list-item">
                                        <a href="javascript:void(0)" class="banner-single-content-logo-list-link">
                                            <?php echo render_image_markup_by_attachment_id($logo) ?? ''; ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="banner-right-content">
                    <?php if($slider_image): ?>
                        <div class="banner-right-content-thumb wow slideInUp" data-wow-delay=".4s">
                            <?php echo render_image_markup_by_attachment_id($slider_image); ?>

                        </div>
                    <?php else: ?>
                        <div class="banner-right-content-thumb wow slideInUp" data-wow-delay=".4s">
                            <img src="<?php echo e(asset('assets/static/img/banner/banner.png')); ?>" alt="img">
                        </div>
                    <?php endif; ?>
                    <div class="banner-right-content-shape">
                        <?php echo render_image_markup_by_attachment_id($shape_image_one); ?>

                        <?php echo render_image_markup_by_attachment_id($shape_image_two); ?>

                    </div>

                    <?php if($top_freelancer?->freelancer_orders_count >= 1): ?>
                    <div class="banner-right-content-bottom">
                        <div class="banner-right-content-profile wow fadeIn" data-wow-delay=".4s">
                            <div class="banner-right-content-profile-flex align-items-center d-flex gap-3">
                                <div class="banner-right-content-profile-thumb">
                                    <img src="<?php echo e(asset('assets/uploads/profile/'.$top_freelancer->image)); ?>" alt="<?php echo e(__('profile')); ?>">
                                </div>
                                <div class="banner-right-content-profile-content">
                                    <h6 class="banner-right-content-profile-content-name"> <?php echo e($top_freelancer?->fullname); ?> </h6>
                                    <p class="banner-right-content-profile-content-para"> <?php echo e($top_freelancer_of_the_month ?? __('Top Freelancer of month')); ?> </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="banner-right-content-top">
                        <div class="banner-right-content-rating wow zoomIn" data-wow-delay=".3s">
                            <div class="banner-right-content-rating-icon">
                                <img src="<?php echo e(asset('assets/static/img/banner/rating.svg')); ?>" alt="<?php echo e(__('rating')); ?>">
                            </div>
                            <p class="banner-right-content-rating-para"> <?php echo e(freelancer_rating($top_freelancer->id, 'header') ?? 4.9); ?> <?php echo e(__('Ratings')); ?> </p>
                        </div>
                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Banner area end --><?php /**PATH /home/doptorr/public_html/core/app/Providers/../../plugins/PageBuilder/views/header/header-one.blade.php ENDPATH**/ ?>