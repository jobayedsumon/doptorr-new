<a href="<?php echo e(route('freelancer.profile.details', $data?->freelancer?->username)); ?>" target="_blank">
    <div class="chat-wrapper-details-header profile-border-bottom flex-between" id="livechat-message-header"
        data-freelancer-id="<?php echo e($data->freelancer->id); ?>">
        <div class="chat-wrapper-details-header-left d-flex gap-2 align-items-center">
            <div class="chat-wrapper-details-header-left-author d-flex gap-2 align-items-center">
                <?php if($data->freelancer?->image): ?>
                    <div class="chat-wrapper-contact-list-thumb-main chat-wrapper-contact-list-thumb">
                        <img src="<?php echo e(asset('assets/uploads/profile/' . $data->freelancer?->image)); ?>"
                            alt="<?php echo e($data->freelancer?->fullname); ?>">
                    </div>
                <?php else: ?>
                    <div class="chat-wrapper-contact-list-thumb-main chat-wrapper-contact-list-thumb">
                        <img src="<?php echo e(asset('assets/static/img/author/author.jpg')); ?>" alt="<?php echo e(__('author')); ?>">
                    </div>
                <?php endif; ?>
                <div class="chat-wrapper-contact-list-thumb-contents">
                    <h5 class="chat-wrapper-details-header-title"><?php echo e($data->freelancer?->fullname); ?></h5>
                    <p class="chat-wrapper-details-header-para"><?php echo e($data->freelancer?->user_introduction?->title); ?></p>
                </div>
            </div>
        </div>
    </div>
</a>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/Chat/Resources/views/client/message-header.blade.php ENDPATH**/ ?>