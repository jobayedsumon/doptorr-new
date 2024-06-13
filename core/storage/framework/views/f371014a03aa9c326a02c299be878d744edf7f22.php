<?php $__env->startSection('site_title',__('Live Chat')); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset("assets/css/vendor-chat.css")); ?>" />
    <style>
        .disabled-link {
            background-color: #ccc !important;
            pointer-events: none;
            cursor: default;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <main>

        <!-- Profile Details area Starts -->
        <div class="responsive-overlay"></div>
        <div class="profile-area pat-20 pab-20 section-bg-2">
            <div class="container">
                <div class="row g-4">
                    <?php if($client_chat_list->count() > 0): ?>
                        <div class="col-lg-12">
                            <div class="chat-wrapper">
                                <div class="chat-wrapper-flex">
                                    <div class="chat-sidebar chatText d-lg-none">
                                        <?php echo e(__('View Chat List')); ?>

                                    </div>
                                    <div class="chat-wrapper-contact">
                                        <div class="chat-wrapper-contact-close">
                                            <div class="close-chat d-lg-none"> <i class="fas fa-times"></i> </div>
                                            <ul class="chat-wrapper-contact-list">
                                                <?php $__currentLoopData = $client_chat_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $client_chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'chat::components.client.freelancer-list','data' => ['clientChat' => $client_chat]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('chat::client.freelancer-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['clientChat' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($client_chat)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="chat-wrapper-details">

                                        <div class="chat-wrapper-details-header d-none flex-between" id="chat_header" data-freelancer-id="<?php echo e(request()->freelancer_id); ?>">
                                        </div>
                                        <div class="chat-wrapper-details-inner client-chat-body" id="chat_body">
                                        </div>

                                        <div class="chat-wrapper-details-footer profile-border-top d-none" id="client-message-footer">
                                            <div class="chat-wrapper-details-footer-form custom-form">
                                                <form action="#">
                                                    <div class="single-input">
                                                        <textarea name="message" id="message" class="form--control form-message" placeholder="Write your message"></textarea>
                                                    </div>
                                                </form>
                                                <div class="chat-wrapper-details-footer-btn flex-btn justify-content-end mt-3">
                                                    <div class="position-relative">
                                                        <input class="photo-uploaded-file inputTag" id="message-file" type="file">
                                                        <span class="show_uploaded_file"></span>
                                                        <span class="dropMedia__file" id="uploadImage">
                                                            <i class="fa-solid fa-paperclip"></i> <?php echo e(__("Attach Files")); ?>

                                                        </span>
                                                    </div>
                                                    <?php if(moduleExists('SecurityManage')): ?>
                                                        <?php if(Auth::guard('web')->user()->freeze_chat == 'freeze'): ?>
                                                            <a href="javascript:void(0)" class="btn-profile btn-bg-1 <?php if(Auth::guard('web')->user()->freeze_chat == 'freeze'): ?> disabled-link <?php endif; ?>"><?php echo e(__('Send Message')); ?></a>
                                                        <?php else: ?>
                                                            <a href="javascript:void(0)" class="btn-profile btn-bg-1" id="client-send-message-to-freelancer"><?php echo e(__('Send Message')); ?></a>
                                                        <?php endif; ?>
                                                    <?php else: ?>
                                                        <a href="javascript:void(0)" class="btn-profile btn-bg-1" id="client-send-message-to-freelancer"><?php echo e(__('Send Message')); ?></a>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="chat-wrapper-details-footer-btn-right">
                                                    <small><?php echo e(__('Supported file: jpeg,jpg,png,pdf,gif')); ?></small>
                                                </div>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-lg-12">
                            <div class="chat-wrapper">

                                <div class="chat-wrapper-flex">
                                    <div class="chat-sidebar d-lg-none">
                                        <i class="fas fa-bars"></i>
                                    </div>

                                    <div class="chat-wrapper-contact">
                                        <div class="chat-wrapper-contact-close">
                                            <div class="close-chat d-lg-none"> <i class="fas fa-times"></i> </div>
                                            <ul class="chat-wrapper-contact-list">
                                                <h4 class="text-danger text-center mt-5"><?php echo e(__('No Contacts Yet.')); ?></h4>
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="chat-wrapper-details"> </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>

            </div>
        </div>
        <!-- Profile Details area end -->
        <audio id="chat-alert-sound" style="display: none">
            <source src="<?php echo e(asset('assets/uploads/chat_image/sound/facebook_chat.mp3')); ?>" />
        </audio>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/common/js/helpers.js')); ?>"></script>
    <script>
        let freelancer_list = { <?php echo e($arr); ?> };
    </script>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'chat::components.livechat-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('chat::livechat-js'); ?>
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
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'chat::components.client.client-chat-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('chat::client.client-chat-js'); ?>
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

<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/Chat/Resources/views/client/index.blade.php ENDPATH**/ ?>