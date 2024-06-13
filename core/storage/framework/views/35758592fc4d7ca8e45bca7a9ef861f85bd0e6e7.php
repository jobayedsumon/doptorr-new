<?php $__env->startSection('title', __('Ticket Details')); ?>
<?php $__env->startSection('style'); ?>
    <style>
        .text_style_manege{white-space: pre-line}
        .supportTicket-messages-body {
            max-height: 380px;
            overflow-y: auto;
        }
        .supportTicket_single__attachment {
            display: flex;
        }
        .text-end.margin-reverse-30 {
            margin-top: -38px;
        }
    </style>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="dashboard__body">
        <div class="row">
            <div class="col-xxl-8">
                <div class="supportTicket bg-white padding-20 radius-10">
                    <div class="supportTicket_single radius-10">
                        <div class="supportTicket_single__item">
                            <div class="supportTicket_single__flex">
                                <div class="supportTicket_single__content">
                                    <div class="supportTicket-single-content-header d-flex align-items-center gap-3">
                                        <span class="supportTicket_single__content__id">#<?php echo e($ticket_details->id); ?></span>
                                        <div class="supportTicket_single__content__btn gap-2 flex-btn">
                                            <?php if($ticket_details->status == 'open'): ?>
                                                <a href="javascript:void(0)" class="pending-progress completed"><?php echo e(__('Open')); ?></a>
                                            <?php else: ?>
                                                <a href="javascript:void(0)" class="pending-progress closed"><?php echo e(__('Closed')); ?></a>

                                            <?php endif; ?>
                                            <a href="javascript:void(0)" class="pending-progress cancel"><?php echo e($ticket_details->priority); ?></a>
                                        </div>
                                    </div>
                                    <h4 class="supportTicket_single__content__title mt-2"><?php echo e($ticket_details->title); ?></h4>
                                </div>
                                <span class="supportTicket_single__content__time"> <?php echo e(__('Last update')); ?> <?php echo e($ticket_details?->get_ticket_latest_message?->updated_at->diffForHumans() ?? $ticket_details->updated_at->diffForHumans()); ?> </span>
                            </div>
                        </div>

                        <div class="supportTicket_single__item supportTicket-messages-body">
                            <?php $__currentLoopData = $ticket_details->message; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($message->type == 'admin'): ?>
                                    <div class="supportTicket_single__chat">
                                    <div class="supportTicket_single__chat__flex">
                                        <div class="supportTicket_single__chat__thumb">
                                            <img src="<?php echo e(asset('assets/static/img/admin/admin.jpg')); ?>" alt="<?php echo e(__('admin')); ?>">
                                        </div>
                                        <div class="supportTicket_single__chat__contents">
                                            <div class="supportTicket_single__chat__box">
                                                <p class="supportTicket_single__chat__message text_style_manege">
                                                    <?php echo e($message->message); ?>

                                                </p>
                                                <?php if($message->attachment): ?>
                                                    <a href="<?php echo e(asset('assets/uploads/ticket/chat-messages/'.$message->attachment)); ?>" download class="supportTicket_single__uploads">
                                                        <i class="fa-solid fa-cloud-arrow-down"></i> <?php echo e(__('Download Attachment')); ?>

                                                    </a>
                                                <?php endif; ?>
                                            </div>
                                            <p class="supportTicket_single__chat__time mt-2"><?php echo e($message->created_at->diffForHumans()); ?></p>
                                        </div>
                                    </div>
                                </div>
                                <?php else: ?>
                                    <div class="supportTicket_single__chat reply">
                                        <div class="supportTicket_single__chat__flex">
                                            <div class="supportTicket_single__chat__thumb">
                                                <?php if($ticket_details->freelancer?->image): ?>
                                                    <img src="<?php echo e(asset('assets/uploads/profile/'.$ticket_details->freelancer?->image)); ?>" alt="<?php echo e(__('freelancer')); ?>">
                                                <?php else: ?>
                                                    <img src="<?php echo e(asset('assets/uploads/profile/'.$ticket_details->client?->image)); ?>" alt="<?php echo e(__('client')); ?>">
                                                <?php endif; ?>
                                            </div>
                                            <div class="supportTicket_single__chat__contents">
                                                <div class="supportTicket_single__chat__box">
                                                    <p class="supportTicket_single__chat__message text_style_manege">
                                                        <?php echo e($message->message); ?>

                                                    </p>
                                                    <?php if($message->attachment): ?>
                                                        <a href="<?php echo e(asset('assets/uploads/ticket/chat-messages/'.$message->attachment)); ?>" download class="supportTicket_single__uploads">
                                                            <i class="fa-solid fa-cloud-arrow-down"></i> <?php echo e(__('Download Attachment')); ?>

                                                        </a>
                                                    <?php endif; ?>
                                                </div>
                                                <p class="supportTicket_single__chat__time mt-2"><?php echo e($message->created_at->diffForHumans()); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>

                        <div class="supportTicket_single__item">
                            <div class="supportTicket_single__chat__replyForm">
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
                                <form action="<?php echo e(route('admin.ticket.details',$ticket_details->id)); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="supportTicket_single__chat__replyForm__input">
                                        <textarea name="message" id="message" class="form-message" placeholder="<?php echo e(__('Write your reply....')); ?>"></textarea>
                                    </div>

                                    <div class="supportTicket_single__attachment mt-3">
                                        <span class="supportTicket_single__attachment__para"><i class="fa-solid fa-paperclip"></i></span>
                                        <input type="file" name="attachment" id="attachment">
                                    </div>

                                    <div class="supportTicket-single-chat-replyForm-input">
                                        <label for="email_notify" class="label-title"><input type="checkbox" name="email_notify" id="email_notify"> <?php echo e(__('Email Notify')); ?></label>
                                    </div>
                                    <div class="btn-wrapper d-flex flex-between profile-border-top">
                                        <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('support-ticket-reply')): ?>
                                            <div class="btn-wrapper flex-btn gap-2">
                                                <button type="submit" class="btn-profile btn-bg-1 send_reply"><?php echo e(__('Send Reply')); ?></button>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </form>
                            </div>
                            <div class="text-end margin-reverse-30">
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('support-ticket-close')): ?>
                                    <?php if($ticket_details->status === 'open'): ?>
                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status.table.status-change','data' => ['title' => __('Close Ticket'),'class' => 'btn btn-danger swal_status_change_button','url' => route('admin.ticket.status',$ticket_details->id)]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status.table.status-change'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Close Ticket')),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('btn btn-danger swal_status_change_button'),'url' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(route('admin.ticket.status',$ticket_details->id))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                    <?php endif; ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-4">
                <div class="supportTicket bg-white padding-20 radius-10">
                    <div class="supportTicket_single radius-10">
                        <div class="supportTicket_single__item">
                            <div class="supportTicket_single__flex">
                                <div class="supportTicket_single__content">
                                    <h4 class="supportTicket_single__content__title mt-2"><?php echo e(__('Ticket Details')); ?></h4>
                                    <div class="supportTicket_single__content__btn gap-2 flex-btn mt-3">
                                        <p><?php echo $ticket_details->description ?? __('No Details'); ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.sweet-alert.sweet-alert2-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('sweet-alert.sweet-alert2-js'); ?>
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
    <?php echo $__env->make('supportticket::backend.ticket.ticket-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/doptorr/public_html/core/Modules/SupportTicket/Resources/views/backend/ticket/details.blade.php ENDPATH**/ ?>