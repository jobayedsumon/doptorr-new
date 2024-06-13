<li class="chat-wrapper-contact-list-item chat_item" data-client-id="<?php echo e($freelancerChat?->client?->id); ?>">
    <div class="chat-wrapper-contact-list-flex">
        <div class="chat-wrapper-contact-list-thumb">
            <a href="javascript:void(0)">
                <?php if($freelancerChat?->client?->image): ?>
                    <img src="<?php echo e(asset('assets/uploads/profile/'.$freelancerChat?->client?->image)); ?>" alt="<?php echo e($freelancerChat->client?->fullname); ?>">
                <?php else: ?>
                    <img src="<?php echo e(asset('assets/static/img/author/author.jpg')); ?>" alt="<?php echo e(__('author')); ?>">
                <?php endif; ?>
            </a>
            <div class="notification-dots <?php echo e(Cache::has('user_is_online_' . $freelancerChat?->client?->id) ? "active" : ""); ?>"></div>
        </div>
        <div class="chat-wrapper-contact-list-contents">
            <div class="chat-wrapper-contact-list-contents-flex flex-between">
                <h4 class="chat-wrapper-contact-list-contents-title"><a href="javascript:void(0)"><?php echo e($freelancerChat?->client?->fullname); ?></a></h4>
                <span class="chat-wrapper-contact-list-time"><?php echo e($freelancerChat->client?->check_online_status?->diffForHumans()); ?></span>
            </div>
            <div>
                <p class="chat-wrapper-contact-list-contents-para"><?php echo e($freelancerChat?->client?->user_introduction?->title ?? ''); ?></p>
                <div class="unseen_message_count_<?php echo e($freelancerChat?->client->id); ?>">
                    <?php if($freelancerChat->freelancer_unseen_msg_count > 0): ?>
                        <span class="badge bg-danger text-right"><?php echo e($freelancerChat->freelancer_unseen_msg_count); ?></span>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</li>

<?php /**PATH /home/doptorr/public_html/core/Modules/Chat/Resources/views/components/freelancer/client-list.blade.php ENDPATH**/ ?>