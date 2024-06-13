<div class="chat-wrapper-details-header profile-border-bottom flex-between" id="livechat-message-header"
    data-client-id="<?php echo e($data->client->id); ?>">
    <div class="chat-wrapper-details-header-left d-flex gap-2 align-items-center">
        <div class="chat-wrapper-details-header-left-author d-flex gap-2 align-items-center">
            <?php if($data->client?->image): ?>
                <div class="chat-wrapper-contact-list-thumb-main chat-wrapper-contact-list-thumb">
                    <img src="<?php echo e(asset('assets/uploads/profile/' . $data->client?->image)); ?>"
                        alt="<?php echo e($data->client?->fullname); ?>">
                </div>
            <?php else: ?>
                <div class="chat-wrapper-contact-list-thumb-main chat-wrapper-contact-list-thumb">
                    <img src="<?php echo e(asset('assets/static/img/author/author.jpg')); ?>" alt="<?php echo e(__('author')); ?>">
                </div>
            <?php endif; ?>
            <div class="chat-wrapper-contact-list-thumb-contents">
                <h5 class="chat-wrapper-details-header-title"><?php echo e($data->client?->fullname); ?></h5>
            </div>
        </div>
    </div>
    <div class="chat-wrapper-details-header-right">
        <div class="flex-btn gap-2">
            <button class="btn-profile btn-outline-1 color-one get_client_id" data-client-id="<?php echo e($data->client?->id); ?>"
                data-bs-toggle="modal" data-bs-target="#exampleModal"><?php echo e(__('Send Offer')); ?>

            </button>
        </div>
    </div>
</div>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/Chat/Resources/views/freelancer/message-header.blade.php ENDPATH**/ ?>