<?php
$project_complete_orders = \App\Models\Order::select('id','identity','status','is_project_job')->where('identity',$project_id)
    ->where('status',3)
    ->where('is_project_job','project')
    ->paginate($pagination_limit);
?>
<?php $__currentLoopData = $project_complete_orders; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $order): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <?php $rating = \App\Models\Rating::with('order')->where('order_id',$order->id)->where('sender_type',1)->first(); ?>
    <?php if($rating): ?>
        <?php $fullname = $rating->order?->user?->fullname; ?>
        <div class="project-feedback profile-border-bottom">
            <div class="project-feedback-flex">
                <div class="project-feedback-thumb">
                    <?php if($rating->order?->user?->image): ?>
                        <img src="<?php echo e(asset('assets/uploads/profile/'.$rating->order?->user?->image)); ?>" alt="">
                    <?php else: ?>
                        <img src="<?php echo e(asset('assets/static/img/author/author.jpg')); ?>" alt="<?php echo e(__('author')); ?>">
                     <?php endif; ?>
                </div>
                <div class="project-feedback-contents">
                    <div class="project-feedback-contents-flex">
                        <div class="project-feedback-contents-name">
                            <h4 class="project-feedback-contents-title"><?php echo e($fullname); ?></h4>
                            <?php if($rating->order?->user?->user_state?->state): ?>
                                <p class="project-feedback-contents-subtitle mt-2"><span><?php echo e($rating->order?->user?->user_state?->state); ?>, <?php echo e($rating->order?->user?->user_country?->country); ?></span> </p>
                            <?php else: ?>
                                <p class="project-feedback-contents-subtitle mt-2"><span><?php echo e($rating->order?->user?->user_country?->country); ?></span> </p>
                            <?php endif; ?>
                        </div>
                        <div class="project-feedback-contents-right">
                            <p class="project-feedback-contents-time"><?php echo e($rating->created_at->toFormattedDateString() ?? ''); ?></p>
                        </div>
                    </div>
                    <div class="project-feedback-contents-review mt-2">
                        <div class="rating_profile_details">
                            <div class="rating_profile_details_icon">
                                <i data-star="<?php echo e($rating->rating); ?>"></i>
                            </div>
                            <span class="rating_profile_details-para"><?php echo e($rating->rating); ?></span>
                        </div>
                    </div>
                    <p class="project-feedback-contents-para mt-3"><?php echo e($rating->review_feedback); ?></p>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/pages/project-details/reviews.blade.php ENDPATH**/ ?>