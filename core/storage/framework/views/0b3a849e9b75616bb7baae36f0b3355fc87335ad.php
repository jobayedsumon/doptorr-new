<div class="myOrder-single-block-item-content">
        <?php if($userType == 2): ?>
            <span class="myOrder-single-block-subtitle"><?php echo e(__('Freelancer')); ?></span>
            <?php if(!empty($isIdentityVerified) && $isIdentityVerified == 1): ?> <i class="fas fa-circle-check"></i><?php endif; ?>
        <?php else: ?>
            <span class="myOrder-single-block-subtitle"><?php echo e(__('Customer')); ?></span>
            <?php if(!empty($isIdentityVerified) && $isIdentityVerified == 1): ?> <i class="fas fa-circle-check"></i><?php endif; ?>
        <?php endif; ?>
        <h6 class="myOrder-single-block-title mt-1"><?php echo e(ucfirst($firstName)); ?> <?php echo e(ucfirst($lastName)); ?>

            <?php if(Cache::has('user_is_online_' . $userId)): ?>
                <span class="single-freelancer-author-status"> <?php echo e(__('Active')); ?> </span>
            <?php else: ?>
                <span class="single-freelancer-author-status-ofline"> <?php echo e(__('Inactive')); ?> </span>
            <?php endif; ?>
            <?php if($orderRating): ?>
                <span class="order-funded-btn order-rating"><i class="fa-solid fa-star"></i> <?php echo e($orderRating ?? ''); ?> </span>
            <?php endif; ?>
        </h6>
    </div>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/order/name-rating.blade.php ENDPATH**/ ?>