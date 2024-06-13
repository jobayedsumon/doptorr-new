<?php if($image): ?>
    <a href="javascript:void(0)">
        <img src="<?php echo e(asset('assets/uploads/profile/'.$image)); ?>" alt="<?php echo e(__('AuthorImg')); ?>">
    </a>
<?php else: ?>
    <a href="javascript:void(0)"><img src="<?php echo e(asset('assets/static/img/author/author.jpg')); ?>" alt="<?php echo e(__('AuthorImg')); ?>"></a>
<?php endif; ?>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/order/profile-image.blade.php ENDPATH**/ ?>