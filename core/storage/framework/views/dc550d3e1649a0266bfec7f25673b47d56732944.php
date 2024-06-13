<div class="modal fade" id="paymentGatewayModal" tabindex="-1" aria-labelledby="paymentGatewayModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo e(route('order.user.confirm')); ?>" method="post" enctype="multipart/form-data" id="prevent_multiple_order_submit">
            <input type="hidden" name="project_id" id="project_id_for_order">
            <input type="hidden" name="basic_standard_premium_type" id="basic_standard_premium_type">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="set_basic_standard_premium_type"></h3>
                </div>
                <div class="modal-body">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.notice.general-notice','data' => ['description' => __(
                        'Notice: Before create an order we encourage to contact the seller so that seller can not decline your order. Keep in mind your milestone price must be equal to original price',
                    )]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notice.general-notice'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__(
                        'Notice: Before create an order we encourage to contact the seller so that seller can not decline your order. Keep in mind your milestone price must be equal to original price',
                    ))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <div class="confirm-payment payment-border">
                        <div class="single-checkbox">
                            <div class="checkbox-inlines">
                                <label class="checkbox-label load_after_login" for="choose">
                                    <?php if(Auth::check() && Auth::user()->user_wallet?->balance > 0): ?>
                                        <?php echo \App\Helper\PaymentGatewayList::renderWalletForm(); ?>

                                        <span class="wallet-balance mt-2 d-block"><?php echo e(__('Wallet Balance:')); ?>

                                            <strong
                                                class="main-balance"><?php echo e(float_amount_with_currency_symbol(Auth::user()->user_wallet?->balance)); ?></strong></span>
                                        <br>
                                        <span class="display_balance"></span>
                                        <br>
                                        <span class="deposit_link"></span>
                                    <?php endif; ?>
                                    <p class="d-none show_hide_transaction_section">
                                        <strong><?php echo e(__('Transaction Fee')); ?></strong>
                                        <span class="currency_symbol"></span>
                                        <span class="transaction_fee_amount"></span>
                                    </p>
                                    <br>

                                    <?php echo \App\Helper\PaymentGatewayList::renderPaymentGatewayForForm(false); ?>

                                </label>
                                <div id="show_hide_description_btn" class="mt-2">
                                    <input type="checkbox" name="order_description_btn" id="order_description_btn">
                                    <strong><?php echo e(__('Description')); ?></strong>
                                </div>

                                <div class="description_wrapper d-none">
                                    <textarea name="order_description" id="order_description" rows="5" class="form-control mt-3"
                                        placeholder="<?php echo e(__('Enter a description')); ?>"></textarea>
                                </div>

                                <div id="show_hide_milestone_btn" class="mt-3">
                                    <input type="checkbox" name="pay_by_milestone" id="pay_by_milestone">
                                    <strong class=""><?php echo e(__('Pay by Milestones')); ?></strong>
                                    <span
                                        class="d-block mt-2"><?php echo e(__('Pay an amount you fixed when a portion of the whole project is completed')); ?></span>
                                </div>

                                <div class="myJob-wrapper-single milestone_wrapper d-none">
                                    <div class="myJob-wrapper-single-header profile-border-bottom">
                                        <h4 class="myJob-wrapper-single-title"><?php echo e(__('Milestone')); ?></h4>
                                    </div>
                                    <div class="myJob-wrapper-single-milestone milestone-contractor-parent">
                                        <div class="myJob-wrapper-single-milestone-item">
                                            <div class="myJob-wrapper-single-flex flex-between align-items-start">
                                                <div class="myJob-wrapper-single-contents">
                                                    <label><?php echo e(__('Title')); ?></label>
                                                    <input type="text" class="form-control" name="milestone_title[]"
                                                        placeholder="<?php echo e(__('Enter Title')); ?>">
                                                    <br>
                                                    <label><?php echo e(__('Description')); ?></label>
                                                    <textarea id="" cols="30" rows="5" class="form-control" name="milestone_description[]"
                                                        placeholder="<?php echo e(__('Enter Description')); ?>"></textarea>
                                                    <br>
                                                    <label><?php echo e(__('Price')); ?></label>
                                                    <input type="number" class="form-control" name="milestone_price[]"
                                                        placeholder="<?php echo e(__('Enter Price')); ?>">
                                                    <br>
                                                    <label><?php echo e(__('Revision')); ?></label>
                                                    <input type="number" min="1" max="100"
                                                        class="form-control" name="milestone_revision[]"
                                                        placeholder="<?php echo e(__('Enter Revision')); ?>">
                                                    <br>
                                                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.duration.delivery-time','data' => ['class' => 'single-input','selectClass' => 'form-control set_dead_line','title' => __('Delivery Time'),'name' => 'milestone_deadline[]']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('duration.delivery-time'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('single-input'),'selectClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control set_dead_line'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Delivery Time')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('milestone_deadline[]')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="btn-wrapper remove-milestone-contractor mt-4">
                                                <a href="#"
                                                    class="btn-profile btn-bg-cancel"><?php echo e(__('Remove')); ?></a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="btn-wrapper mt-4">
                                        <a href="javascript:void(0)"
                                            class="btn-profile btn-outline-gray add-contract-milestone"><i
                                                class="fa-solid fa-plus"></i> <?php echo e(__('Add Milestone')); ?></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-profile btn-outline-gray btn-hover-danger"
                        data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type == 1): ?>
                        <button type="submit" class="btn-profile btn-bg-1" id="order_now_only_for_load_spinner"><?php echo e(__('Order Now')); ?><span id="order_create_load_spinner"></span></button>

                    <?php else: ?>
                        <a href="<?php echo e(route('user.register')); ?>" target="_blank"
                            class="btn-profile btn-bg-1"><?php echo e(__('Register as a client to continue')); ?></a>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/pages/order/gateway-markup.blade.php ENDPATH**/ ?>