<!-- About area starts -->
<section class="about-area section-bg-2 pat-100 pab-100" data-padding-top="<?php echo e($padding_top ?? ''); ?>" data-padding-bottom="<?php echo e($padding_bottom ?? ''); ?>" style="background-color:<?php echo e($section_bg == 'rgb(201, 38, 38)' ? '#F5F5F5' : $section_bg); ?>">
    <div class="container">
        <div class="row g-4 justify-content-between">
            <div class="col-xxl-6 col-lg-6">
                <div class="about-wrapper-left">
                    <div class="section-title text-left">
                        <h2 class="title"><?php echo e($title ?? __('About Us')); ?></h2>
                        <p class="section-para"><?php echo $description ?? ''; ?></p>
                    </div>
                        <div class="about-counter mt-5">
                            <?php $__currentLoopData = $repeater_data['title_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="about-counter-item">
                                    <h3 class="about-counter-item-title">
                                        <span class="about-counter-item-title-heading"><?php echo e($title ?? ''); ?></span>
                                    </h3>
                                    <p class="about-counter-item-para"><?php echo e($repeater_data['description_'][$key] ?? ''); ?></p>
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                </div>
            </div>
            <div class="col-xxl-6 col-lg-6">
                <div class="about-wrapper-right">
                    <div class="about-wrapper-thumb">
                        <div class="about-wrapper-thumb-item">
                                                        <?php echo render_image_markup_by_attachment_id($image) ?? ''; ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About area end --><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/app/Providers/../../plugins/PageBuilder/views/about/about-us.blade.php ENDPATH**/ ?>