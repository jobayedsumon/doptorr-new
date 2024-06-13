<!-- About Team area starts -->
<section class="aboutTeam-area pat-100 pab-100" data-padding-top="<?php echo e($padding_top ?? ''); ?>" data-padding-bottom="<?php echo e($padding_bottom ?? ''); ?>" style="background-color:<?php echo e($section_bg ?? ''); ?>">
    <div class="container">
        <div class="section-title text-left append-flex">
            <h2 class="title"><?php echo e($title ?? __('Meet our hardworking team')); ?></h2>
            <div class="append-team"></div>
        </div>
        <div class="row g-4 mt-4">
            <div class="col-lg-12">
                <div class="global-slick-init attraction-slider nav-style-one slider-inner-margin"
                     data-rtl="<?php echo e(get_user_lang_direction() == 'rtl' ? 'true' : ''); ?>"
                     data-appendArrows=".append-team" data-arrows="true" data-infinite="true" data-dots="false"
                     data-slidesToShow="4" data-swipeToSlide="true" data-autoplay="false" data-autoplaySpeed="2500"
                     data-prevArrow='<div class="prev-icon"><i class="fa-solid fa-arrow-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="fa-solid fa-arrow-right"></i></div>'
                     data-responsive='[{"breakpoint": 1400,"settings": {"slidesToShow": 4}},{"breakpoint": 1200,"settings": {"slidesToShow": 3}},{"breakpoint": 992,"settings": {"slidesToShow": 2}},{"breakpoint": 768,"settings": {"slidesToShow": 2}},{"breakpoint": 576, "settings": {"slidesToShow": 1} }]'>
                    <?php $__currentLoopData = $repeater_data['image_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $image): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div class="slider-item">
                            <div class="aboutTeam-item">
                                <div class="aboutTeam-item-thumb">
                                    <?php echo render_image_markup_by_attachment_id($image) ?? ''; ?>

                                </div>
                                <div class="aboutTeam-item-contents mt-3">
                                    <h6 class="aboutTeam-item-title"><?php echo e($repeater_data['name_'][$key] ?? ''); ?></h6>
                                    <p class="aboutTeam-item-para"><?php echo e($repeater_data['designation_'][$key] ?? ''); ?></p>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Team area end --><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/app/Providers/../../plugins/PageBuilder/views/about/team.blade.php ENDPATH**/ ?>