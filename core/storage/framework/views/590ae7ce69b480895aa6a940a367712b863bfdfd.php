<?php $__env->startSection('site_title',__('Live Chat')); ?>

<?php $__env->startSection('style'); ?>
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
                    <?php if($freelancer_chat_list->count() > 0): ?>
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
                                            <?php $__currentLoopData = $freelancer_chat_list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $freelancer_chat): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'chat::components.freelancer.client-list','data' => ['freelancerChat' => $freelancer_chat]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('chat::freelancer.client-list'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['freelancerChat' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($freelancer_chat)]); ?>
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

                                    <div class="chat-wrapper-details-header d-none flex-between" id="chat_header">

                                    </div>

                                    <div class="chat-wrapper-details-inner client-chat-body" id="chat_body">

                                    </div>

                                    <div class="chat-wrapper-details-footer profile-border-top d-none" id="freelancer-message-footer">
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
                                                        <a href="javascript:void(0)" class="btn-profile btn-bg-1" id="freelancer-send-message-to-client"><?php echo e(__('Send Message')); ?></a>
                                                    <?php endif; ?>
                                                <?php else: ?>
                                                    <a href="javascript:void(0)" class="btn-profile btn-bg-1" id="freelancer-send-message-to-client"><?php echo e(__('Send Message')); ?></a>
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

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <form action="<?php echo e(route('freelancer.offer.send')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="client_id" id="client_id">
                    <input type="hidden" name="pay_by_milestone" id="pay_by_milestone">
                    <input type="hidden" name="pay_at_once" id="pay_at_once" value="pay-at-once">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h3><?php echo e(__('Send Offer')); ?></h3>
                        </div>
                        <div class="modal-body">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.notice.general-notice','data' => ['description' => __('Notice: Please discuss project requirements and budget with the client before sending an offer to prevent misunderstandings.'),'description1' => __('Notice: If pay by milestone you can skip description section')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notice.general-notice'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Notice: Please discuss project requirements and budget with the client before sending an offer to prevent misunderstandings.')),'description1' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Notice: If pay by milestone you can skip description section'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <div class="offer_total_price mt-5 setup-bank-form-item setup-bank-form-item-icon">
                                <labe><strong><?php echo e(__('Offer Price')); ?></strong></labe>
                                <input type="number" class="form-control" name="offer_price" id="offer_price" placeholder="<?php echo e(__('Enter Price')); ?>">
                                <span class="input-icon"><?php echo e(get_static_option('site_global_currency') ?? ''); ?></span>
                            </div>
                            <br>

                            <div class="d-flex flex-wrap gap-4 mb-4">

                                <div id="pay_at_once_btn" class="identity-verifying-list active">
                                    <strong><?php echo e(__('Pay at Once')); ?></strong>
                                    <span><?php echo e(__('You will get the amount after complete the job.')); ?></span>
                                </div>

                                <div id="pay_by_milestone_btn" class="identity-verifying-list">
                                    <strong><?php echo e(__('Pay by Milestones')); ?></strong>
                                    <span><?php echo e(__('You will get the amount after complete each milestone.')); ?></span>
                                </div>

                            </div>

                            <div class="description_wrapper">
                                <div class="row g-4">
                                    <div class="col-sm-6">
                                        <div class="single-input">
                                            <label class="label-title"><?php echo e(__('Revision')); ?></label>
                                            <input type="number" min="1" max="200" class="form-control" name="offer_revision" id="offer_revision" placeholder="<?php echo e(__('Enter Revision')); ?>">
                                        </div>
                                    </div>

                                    <div class="col-sm-6">
                                        <div class="single-input">
                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.duration.delivery-time','data' => ['class' => 'single-input set_dead_line','title' => __('Delivery Time'),'name' => 'offer_deadline','id' => 'offer_deadline']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('duration.delivery-time'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('single-input set_dead_line'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Delivery Time')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('offer_deadline'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('offer_deadline')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <div class="single-input">
                                            <label class="label-title"><?php echo e(__('Description')); ?></label>
                                            <textarea name="offer_description" id="offer_description" rows="5" class="form-control summernote" placeholder="<?php echo e(__('Enter a description')); ?>"></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="myJob-wrapper-single milestone_wrapper d-none">
                                <div class="myJob-wrapper-single-header profile-border-bottom">
                                    <h4 class="myJob-wrapper-single-title"><?php echo e(__('Milestone')); ?></h4>
                                </div>
                                <div class="myJob-wrapper-single-milestone milestone-contractor-parent">
                                    <div class="myJob-wrapper-single-milestone-item">
                                        <div class="myJob-wrapper-single-flex flex-between align-items-start">
                                            <div class="myJob-wrapper-single-contents">
                                                <div class="row g-4">
                                                    <div class="col-sm-12">
                                                        <div class="single-input">
                                                            <label class="label-title"><?php echo e(__('title')); ?></label>
                                                            <input type="text" class="form-control milestone_title" name="milestone_title[]" placeholder="<?php echo e(__('Enter Title')); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="single-input">
                                                            <label class="label-title"><?php echo e(__('Description')); ?></label>
                                                            <textarea cols="30" rows="5" class="form-control milestone_description" name="milestone_description[]" placeholder="<?php echo e(__('Enter Description')); ?>"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-12">
                                                        <div class="single-input">
                                                            <label class="label-title"><?php echo e(__('Price')); ?></label>
                                                            <input type="number" class="form-control milestone_price" name="milestone_price[]" placeholder="<?php echo e(__('Enter Price')); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="single-input">
                                                            <label class="label-title"><?php echo e(__('Revision')); ?></label>
                                                            <input type="number" min="1" max="100" class="form-control milestone_revision" name="milestone_revision[]" placeholder="<?php echo e(__('Enter Revision')); ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-6">
                                                        <div class="single-input">
                                                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.duration.delivery-time','data' => ['class' => 'single-input','selectClass' => 'form-control milestone_deadline set_dead_line','title' => __('Delivery Time'),'name' => 'milestone_deadline[]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('duration.delivery-time'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('single-input'),'selectClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control milestone_deadline set_dead_line'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Delivery Time')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('milestone_deadline[]')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="btn-wrapper remove-milestone-contractor mt-4">
                                            <a href="#" class="btn-profile btn-bg-cancel"><?php echo e(__('Remove')); ?></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="btn-wrapper mt-4">
                                    <a href="javascript:void(0)" class="btn-profile btn-outline-gray add-contract-milestone"><i class="fa-solid fa-plus"></i><?php echo e(__('Add Milestone')); ?></a>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn-profile btn-outline-gray btn-hover-danger" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                            <button type="submit" class="btn-profile btn-bg-1 send_offer_realtime_validation"><?php echo e(__('Send Offer')); ?></button>
                        </div>
                    </div>
                </form>
            </div>

        </div>
        <audio id="chat-alert-sound" style="display: none">
            <source src="<?php echo e(asset('assets/uploads/chat_image/sound/facebook_chat.mp3')); ?>" />
        </audio>
    </main>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/common/js/helpers.js')); ?>"></script>
    <script>
        let client_list = { <?php echo e($arr); ?> };
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'chat::components.freelancer.freelancer-chat-js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('chat::freelancer.freelancer-chat-js'); ?>
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

    <script>
        //:get_client_id
        $(document).on('click','.get_client_id',function(){
            $('#client_id').val($(this).data('client-id'));
        });

        //pay by milestone
        $(document).on('click','#pay_by_milestone_btn',function(){
            $('.milestone_wrapper').removeClass('d-none');
            $('.description_wrapper').addClass('d-none');

            $('#pay_by_milestone').val('pay-by-milestone');
            $('#pay_at_once').val('');

            $( "#pay_by_milestone_btn").addClass( "active" );
            $( "#pay_at_once_btn").removeClass( "active" );
        });

        //pay at once
        $(document).on('click','#pay_at_once_btn',function(){
            $('.description_wrapper').removeClass('d-none');
            $('.milestone_wrapper').addClass('d-none');

            $('#pay_at_once').val('pay-at-once');
            $('#pay_by_milestone').val('');

            $( "#pay_at_once_btn").addClass( "active" );
            $( "#pay_by_milestone_btn").removeClass( "active" );

        });

        //send_offer_realtime_validation
        $(document).on('click','.send_offer_realtime_validation',function(){

            let pay_by_milestone = $('#pay_by_milestone').val();
            let pay_at_once = $('#pay_at_once').val();
            let offer_price = $('#offer_price').val();
            let offer_revision = $('#offer_revision').val();
            let offer_deadline = $('#offer_deadline').val();

            if(offer_price == ''){
                toastr_warning_js("<?php echo e(__('Please fill price field')); ?>")
                return false;
            }

            if(pay_at_once == 'pay-at-once'){
                if(offer_revision == '' || offer_deadline == ''){
                    toastr_warning_js("<?php echo e(__('Please fill all fields')); ?>")
                    return false;
                }
            }

            if(pay_by_milestone == 'pay-by-milestone'){

                let milestone_title = [], milestone_description = [], milestone_price = [], milestone_revision = [], milestone_deadline = [], total_milestone_price = 0;

                $('.milestone_title').each(function() {
                    let value = $(this).val();
                    if (value) {
                        milestone_title.push(value);
                    }
                });

                $('.milestone_description').each(function() {
                    let value = $(this).val();
                    if (value) {
                        milestone_description.push(value);
                    }
                });


                $('.milestone_price').each(function() {
                    let value = $(this).val();
                    if (value) {
                        milestone_price.push(value);
                        total_milestone_price = parseInt(total_milestone_price) + parseInt(value);
                    }
                });

                $('.milestone_revision').each(function() {
                    let value = $(this).val();
                    if (value) {
                        milestone_revision.push(value);
                    }
                });

                $('.milestone_deadline').each(function() {
                    let value = $(this).val();
                    if (value) {
                        milestone_deadline.push(value);
                    }
                });

                if(offer_price != total_milestone_price){
                    toastr_warning_js("<?php echo e(__('Total milestone price must be equal to offer price')); ?>")
                    return false;
                }

                if (offer_price == '' || milestone_title.length === 0 || milestone_description.length === 0 || milestone_price.length === 0 || milestone_revision.length === 0 || milestone_deadline.length === 0) {
                    toastr_warning_js("<?php echo e(__('Please fill all fields')); ?>")
                    return false;
                }
            }
        })
    </script>

    <script>
        <?php if(count($errors) > 0): ?>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        toastr.warning("<?php echo e($error); ?>");
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php endif; ?>
    </script>
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

<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/doptorr/public_html/core/Modules/Chat/Resources/views/freelancer/index.blade.php ENDPATH**/ ?>