<!-- Newsletter area starts -->
<div class="newsletter-area pat-50 pab-50" data-padding-top="<?php echo e($padding_top ?? ''); ?>" data-padding-bottom="<?php echo e($padding_bottom ?? ''); ?>" style="background-color:<?php echo e($section_bg ?? ''); ?>">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="newsletter-wrapper newsletter-bg radius-20 newsletter-wrapper-padding wow zoomIn" data-wow-delay=".3s">
                    <div class="newsletter-wrapper-shapes">
                        <?php echo render_image_markup_by_attachment_id($image ?? ''); ?>

                    </div>
                    <div class="newsletter-contents center-text">
                        <h3 class="newsletter-contents-title"><?php echo e($title ?? __('Join the club of hundreds of other Freelancers working with freedom')); ?></h3>
                        <p class="newsletter-contents-para mt-3"><?php echo e($subtitle ?? __('Get discounts and newsletters on our hotels in your email. We promise to not spam. Unsubscribe anytime')); ?></p>
                        <form action="<?php echo e(route('newsletter.subscription')); ?>" method="post" id="newsletter_subscribe_from_addon">
                            <?php echo csrf_field(); ?>
                            <div class="newsletter-contents-form custom-form mt-4">
                                <div class="error-message"></div>
                                <div class="single-input">
                                    <input type="text" name="email" class="form--control" placeholder="<?php echo e(__('Enter Email')); ?>">
                                    <button class="subscription_by_email"> <?php echo e(__('Submit')); ?> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Newsletter area end -->
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/app/Providers/../../plugins/PageBuilder/views/news-letter/news-letter-one.blade.php ENDPATH**/ ?>