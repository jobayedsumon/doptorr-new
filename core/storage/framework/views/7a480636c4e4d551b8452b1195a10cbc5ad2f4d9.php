<!-- Brand logo area starts -->
<div class="brand-area pat-50 pab-100" data-padding-top="<?php echo e($padding_top ?? ''); ?>" data-padding-bottom="<?php echo e($padding_bottom ?? ''); ?>" style="background-color:<?php echo e($section_bg ?? ''); ?>">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="global-slick-init attraction-slider slider-inner-margin" data-rtl="<?php echo e(get_user_lang_direction() == 'rtl' ? 'true' : ''); ?>" data-slidesToShow="6" data-infinite="true" data-arrows="false" data-dots="false" data-swipeToSlide="true" data-autoplay="true" data-autoplaySpeed="2500" data-prevArrow='<div class="prev-icon"><i class="fas fa-angle-left"></i></div>'
                     data-nextArrow='<div class="next-icon"><i class="fas fa-angle-right"></i></div>' data-responsive='[{"breakpoint": 1400,"settings": {"slidesToShow": 6}},{"breakpoint": 1200,"settings": {"slidesToShow": 4}},{"breakpoint": 992,"settings": {"slidesToShow": 4}},{"breakpoint": 768,"settings": {"slidesToShow": 3}},{"breakpoint": 576, "settings": {"slidesToShow": 2} }]'>
                    <?php $__currentLoopData = $repeater_data['brand_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $logo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> {
                        <div class="single-brand">
                            <a href="javascript:void(0)" class="single-brand-thumb">
                                <?php echo render_image_markup_by_attachment_id($logo); ?>

                            </a>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- Brand Logo area end -->
<?php /**PATH /home/doptorr/public_html/core/app/Providers/../../plugins/PageBuilder/views/brand/brand-one.blade.php ENDPATH**/ ?>