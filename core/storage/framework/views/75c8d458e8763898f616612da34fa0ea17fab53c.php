<?php if($notification->type =='Create Project' || $notification->type =='Edit Project'): ?>
    <a href="<?php echo e(route('admin.project.details',$notification->identity)); ?>" class="dashboard__notification__list__item click-notification">
        <div class="dashboard__notification__list__left">
            <div class="dashboard__notification__list__icon decline">
                <i class="fas fa-edit"></i>
            </div>
        </div>
        <div class="dashboard__notification__list__content">
            <span class="dashboard__notification__list__content__title"><?php echo e($notification->message ?? ''); ?> - <strong>#<?php echo e($notification->identity); ?></strong></span> <br>
            <span class="dashboard__notification__list__content__time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
        </div>
    </a>
<?php endif; ?>

<?php if($notification->type =='Deposit Amount'): ?>
    <a href="<?php echo e(route('admin.wallet.history.details',$notification->identity)); ?>" class="dashboard__notification__list__item click-notification">
        <div class="dashboard__notification__list__left">
            <div class="dashboard__notification__list__icon decline">
                <i class="fas fa-dollar"></i>
            </div>
        </div>
        <div class="dashboard__notification__list__content">
            <span class="dashboard__notification__list__content__title"><?php echo e($notification->message ?? ''); ?> - <strong>#<?php echo e($notification->identity); ?></strong></span> <br>
            <span class="dashboard__notification__list__content__time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
        </div>
    </a>
<?php endif; ?>

<?php if($notification->type =='Create Job' || $notification->type =='Edit Job'): ?>
    <a href="<?php echo e(route('admin.job.details',$notification->identity)); ?>" class="dashboard__notification__list__item click-notification">
        <div class="dashboard__notification__list__left">
            <div class="dashboard__notification__list__icon decline">
                <i class="fa-solid fa-file-circle-plus"></i>
            </div>
        </div>
        <div class="dashboard__notification__list__content">
            <span class="dashboard__notification__list__content__title"><?php echo e($notification->message ?? ''); ?> - <strong>#<?php echo e($notification->identity); ?></strong></span> <br>
            <span class="dashboard__notification__list__content__time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
        </div>
    </a>
<?php endif; ?>

<?php if($notification->type =='Buy Subscription'): ?>
    <a href="<?php echo e(route('admin.user.subscription.read.unread',$notification->identity)); ?>" class="dashboard__notification__list__item click-notification">
        <div class="dashboard__notification__list__left">
            <div class="dashboard__notification__list__icon decline">
                <?php echo e(site_currency_symbol()); ?>

            </div>
        </div>
        <div class="dashboard__notification__list__content">
            <span class="dashboard__notification__list__content__title"><?php echo e($notification->message ?? ''); ?> - <strong>#<?php echo e($notification->identity); ?></strong></span> <br>
            <span class="dashboard__notification__list__content__time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
        </div>
    </a>
<?php endif; ?>

<?php if($notification->type =='Order'): ?>
    <a href="<?php echo e(route('admin.order.details',$notification->identity)); ?>" class="dashboard__notification__list__item click-notification">
        <div class="dashboard__notification__list__left">
            <div class="dashboard__notification__list__icon decline">
                <i class="fa-solid fa-clipboard-list"></i>
            </div>
        </div>
        <div class="dashboard__notification__list__content">
            <span class="dashboard__notification__list__content__title"><?php echo e($notification->message ?? ''); ?> - <strong>#<?php echo e($notification->identity); ?></strong></span> <br>
            <span class="dashboard__notification__list__content__time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
        </div>
    </a>
<?php endif; ?>

<?php if($notification->type =='Ticket'): ?>
    <a href="<?php echo e(route('admin.ticket.details',$notification->identity)); ?>" class="dashboard__notification__list__item click-notification">
        <div class="dashboard__notification__list__left">
            <div class="dashboard__notification__list__icon decline">
                <i class="fa-solid fa-ticket"></i>
            </div>
        </div>
        <div class="dashboard__notification__list__content">
            <span class="dashboard__notification__list__content__title"><?php echo e($notification->message ?? ''); ?> - <strong>#<?php echo e($notification->identity); ?></strong></span> <br>
            <span class="dashboard__notification__list__content__time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
        </div>
    </a>
<?php endif; ?>

<?php if($notification->type =='Withdraw'): ?>
    <a href="<?php echo e(route('admin.wallet.withdraw.request',$notification->identity)); ?>" class="dashboard__notification__list__item click-notification">
        <div class="dashboard__notification__list__left">
            <div class="dashboard__notification__list__icon decline">
                <?php echo e(site_currency_symbol()); ?>

            </div>
        </div>
        <div class="dashboard__notification__list__content">
            <span class="dashboard__notification__list__content__title"><?php echo e($notification->message ?? ''); ?> - <strong>#<?php echo e($notification->identity); ?></strong></span> <br>
            <span class="dashboard__notification__list__content__time"><?php echo e($notification->created_at->toFormattedDateString()); ?></span>
        </div>
    </a>
<?php endif; ?>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/backend/admin-notification.blade.php ENDPATH**/ ?>