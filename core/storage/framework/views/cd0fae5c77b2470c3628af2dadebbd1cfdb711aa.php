<li class="chat-wrapper-contact-list-item chat_item" data-freelancer-id="<?php echo e($clientChat?->freelancer?->id); ?>">
    <div class="chat-wrapper-contact-list-flex">
        <div class="chat-wrapper-contact-list-thumb">
            <a href="javascript:void(0)">
                <?php if($clientChat?->freelancer?->image): ?>
                    <img src="<?php echo e(asset('assets/uploads/profile/'.$clientChat?->freelancer?->image)); ?>" alt="<?php echo e($clientChat?->freelancer?->fullname); ?>">
                <?php else: ?>
                    <img src="<?php echo e(asset('assets/static/img/author/author.jpg')); ?>" alt="<?php echo e(__('author')); ?>">
                <?php endif; ?>
            </a>
            <div class="notification-dots <?php echo e(Cache::has('user_is_online_' . $clientChat->freelancer?->id) ? "active" : ""); ?>"></div>
        </div>
        <div class="chat-wrapper-contact-list-contents">
            <div class="chat-wrapper-contact-list-contents-flex flex-between">
                <h4 class="chat-wrapper-contact-list-contents-title"><a href="javascript:void(0)"><?php echo e($clientChat->freelancer?->fullname); ?></a></h4>
                <span class="chat-wrapper-contact-list-time"><?php echo e($clientChat?->freelancer?->check_online_status?->diffForHumans()); ?></span>
            </div>
            <div>
                <p class="chat-wrapper-contact-list-contents-para"><?php echo e($clientChat?->freelancer?->user_introduction?->title); ?></p>
                <div class ="unseen_message_count_<?php echo e($clientChat?->freelancer?->id); ?>">
                    <?php if($clientChat->client_unseen_msg_count > 0): ?>
                        <span class="badge bg-danger text-right"><?php echo e($clientChat->client_unseen_msg_count); ?></span>
                    <?php endif; ?>
                </div>

            </div>
        </div>
    </div>
</li>

<?php /**PATH /home/doptorr/public_html/core/Modules/Chat/Resources/views/components/client/freelancer-list.blade.php ENDPATH**/ ?>