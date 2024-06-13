<!-- About What area starts -->
<section class="aboutWhat-area pat-100 pab-50" data-padding-top="<?php echo e($padding_top ?? ''); ?>" data-padding-bottom="<?php echo e($padding_bottom ?? ''); ?>" style="background-color:<?php echo e($section_bg ?? ''); ?>">
    <div class="container">
        <div class="section-title text-center">
            <h2 class="title"><?php echo e($title ?? __('What We Do')); ?></h2>
            <p class="section-para"><?php echo e($description ?? ''); ?></p>
        </div>
        <div class="row g-4 mt-4">
            <div class="col-lg-12">
                <div class="aboutWhat-wrapper">
                    <div class="aboutWhat-wrapper-thumb remove_image_and_play_video">
                        <?php echo render_image_markup_by_attachment_id($image) ?? ''; ?>

                        <a href="<?php echo e($video_url); ?>" class="aboutWhat-wrapper-icon about-video video_play">
                            <i class="fa-solid fa-play"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About What area end --><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/app/Providers/../../plugins/PageBuilder/views/about/what-we-do.blade.php ENDPATH**/ ?>