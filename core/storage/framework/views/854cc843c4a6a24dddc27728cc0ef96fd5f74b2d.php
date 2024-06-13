<?php $__env->startSection('site_title'); ?> <?php echo e($ticket_details->title ?? __('Support Tickets')); ?> <?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .text_style_manege{white-space: pre-line}
        .supportTicket-messages-body {
            max-height: 400px;
            overflow-y: auto;
        }
    </style>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.summernote.summernote-css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('summernote.summernote-css'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>
        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.breadcrumb.user-profile-breadcrumb','data' => ['title' => __('Tickets'),'innerTitle' => __('Tickets')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('breadcrumb.user-profile-breadcrumb'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Tickets')),'innerTitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Tickets'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
        <!-- Profile Settings area Starts -->
        <div class="responsive-overlay"></div>
        <div class="profile-settings-area pat-50 pab-50 section-bg-2">
            <div class="container">
                <div class="row g-4">
                    <?php echo $__env->make('frontend.user.layout.partials.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                    <div class="col-xl-9 col-lg-8">
                        <div class="profile-settings-wrapper">
                            <div class="single-profile-settings">
                                <div class="supportTicket-single radius-10">
                                    <div class="supportTicket-single-item">
                                        <div class="supportTicket-single-flex">
                                            <div class="supportTicket-single-content">
                                                <div class="supportTicket-single-content-header d-flex align-items-center gap-3">
                                                    <span class="supportTicket-single-content-id">#<?php echo e($ticket_details->id); ?></span>
                                                    <div class="supportTicket-single-content-btn gap-2 flex-btn">
                                                        <?php if($ticket_details->status == 'close'): ?>
                                                            <a href="javascript:void(0)" class="pending-closed"><?php echo e(__('Closed')); ?></a>
                                                        <?php else: ?>
                                                            <a href="javascript:void(0)" class="pending-progress completed"><?php echo e(__('Open')); ?></a>
                                                        <?php endif; ?>
                                                        <a href="javascript:void(0)" class="pending-progress cancel"><?php echo e($ticket_details->priority); ?></a>
                                                    </div>
                                                </div>
                                                <h4 class="supportTicket-single-content-title mt-2"><?php echo e($ticket_details->title); ?></h4>
                                            </div>
                                            <span class="supportTicket-single-content-time"><?php echo e(__('Last update')); ?> <?php echo e($ticket_details?->get_ticket_latest_message?->updated_at->diffForHumans() ?? $ticket_details->updated_at->diffForHumans()); ?> </span>
                                        </div>
                                    </div>
                                    <div class="supportTicket-single-item supportTicket-messages-body">
                                        <?php $__currentLoopData = $ticket_details->message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($message->type == 'admin'): ?>
                                                <div class="supportTicket-single-chat">
                                                    <div class="supportTicket-single-chat-flex">
                                                        <div class="supportTicket-single-chat-thumb">
                                                            <img src="<?php echo e(asset('assets/static/img/admin/admin.jpg')); ?>" alt="<?php echo e(__('admin')); ?>">
                                                        </div>
                                                        <div class="supportTicket-single-chat-contents">
                                                            <div class="supportTicket-single-chat-box">
                                                                <p class="supportTicket-single-chat-message text_style_manege">
                                                                    <?php echo e($message->message); ?>

                                                                </p>
                                                                <?php if($message->attachment): ?>
                                                                    <a href="<?php echo e(asset('assets/uploads/ticket/chat-messages/'.$message->attachment)); ?>" class="single-refundRequest-item-uploads">
                                                                        <i class="fa-solid fa-cloud-arrow-down"></i> <?php echo e(__('Download Attachment')); ?>

                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                            <p class="supportTicket-single-chat-time mt-2"><?php echo e($message->created_at->diffForHumans()); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="supportTicket-single-chat reply">
                                                    <div class="supportTicket-single-chat-flex">
                                                        <div class="supportTicket-single-chat-thumb">
                                                            <img src="<?php echo e(asset('assets/uploads/profile/'.$ticket_details->freelancer?->image)); ?>" alt="<?php echo e(__('freelancer')); ?>">
                                                        </div>
                                                        <div class="supportTicket-single-chat-contents">
                                                            <div class="supportTicket-single-chat-box">
                                                                <p class="supportTicket-single-chat-message text_style_manege">
                                                                    <?php echo e($message->message); ?>

                                                                </p>
                                                                <?php if($message->attachment): ?>
                                                                    <a href="<?php echo e(asset('assets/uploads/ticket/chat-messages/'.$message->attachment)); ?>" class="single-refundRequest-item-uploads">
                                                                        <i class="fa-solid fa-cloud-arrow-down"></i> <?php echo e(__('Download Attachment')); ?>

                                                                    </a>
                                                                <?php endif; ?>
                                                            </div>
                                                            <p class="supportTicket-single-chat-time mt-2"><?php echo e($message->created_at->diffForHumans()); ?></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="supportTicket-single-item">
                                        <div class="supportTicket-single-chat-replyForm">
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation.error','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('validation.error'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                            <form action="<?php echo e(route('freelancer.ticket.details',$ticket_details->id)); ?>" method="post" enctype="multipart/form-data">
                                                <?php echo csrf_field(); ?>
                                                <div class="supportTicket-single-chat-replyForm-input">
                                                    <textarea name="message" id="message" class="form-message" placeholder="<?php echo e(__('Write your reply....')); ?>"></textarea>
                                                </div>
                                                <div class="supportTicket-single-chat-replyForm-submit flex-between align-items-center mt-3">
                                                    <div>
                                                        <div class="supportTicket_single__attachment mt-3">
                                                            <input type="file" name="attachment" id="attachment">
                                                        </div>
                                                        <div class="supportTicket-single-chat-replyForm-input">
                                                            <label for="email_notify"><input type="checkbox" name="email_notify" id="email_notify"> <?php echo e(__('Email Notify')); ?></label>
                                                        </div>
                                                    </div>
                                                    <div class="btn-wrapper d-flex flex-wrap gap-2">
                                                        <button type="submit" class="btn-profile btn-bg-1 send_reply"><?php echo e(__('Send Reply')); ?></button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Profile Settings area end -->
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php echo $__env->make('supportticket::freelancer.ticket-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.summernote.summernote-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('summernote.summernote-js'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/doptorr/public_html/core/Modules/SupportTicket/Resources/views/freelancer/details.blade.php ENDPATH**/ ?>