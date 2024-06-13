<div class="credit-area">
    <div class="container">
        <div class="credit-wrapper border-bottom pat-50 pab-100" data-padding-top="<?php echo e($padding_top ?? ''); ?>" data-padding-bottom="<?php echo e($padding_bottom ?? ''); ?>" style="background-color:<?php echo e($section_bg ?? ''); ?>">
            <div class="row g-4">
                <?php $__currentLoopData = $repeater_data['title_']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $title): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div class="col-lg-4 col-sm-6">
                        <div class="credit-item text-center">
                            <h3 class="credit-item-title">
                                <span class="credit-item-title-heading"><?php echo e($title ?? ''); ?></span>
                            </h3>
                            <p class="credit-item-para"> <?php echo e($repeater_data['description_'][$key] ?? ''); ?></p>
                        </div>
                    </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/app/Providers/../../plugins/PageBuilder/views/about/credit.blade.php ENDPATH**/ ?>