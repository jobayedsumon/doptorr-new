<div class="modal fade" id="paymentGatewayModal" tabindex="-1" aria-labelledby="paymentGatewayModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo e(route('subscriptions.buy')); ?>" method="post" enctype="multipart/form-data">
            <input type="hidden" name="subscription_id" id="subscription_id">
            <?php echo csrf_field(); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <?php if(Auth::guard('web')->check()): ?>
                        <?php if(Auth::guard('web')->user()->user_type == 1 ): ?>
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.notice.general-notice','data' => ['description' => __('Notice: Please login as a freelancer to buy a subscription.')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('notice.general-notice'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['description' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Notice: Please login as a freelancer to buy a subscription.'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php else: ?>
                            <h4><?php echo e(__('Buy Subscription')); ?></h4>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
                <div class="modal-body">
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
                                    <?php echo \App\Helper\PaymentGatewayList::renderPaymentGatewayForForm(false); ?>

                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-profile btn-outline-gray btn-hover-danger"
                        data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type == 2): ?>
                        <button type="submit" class="btn-profile btn-bg-1 buy_subscription" id="confirm_buy_subscription_load_spinner"><?php echo e(__('Buy Now')); ?> <span id="buy_subscription_load_spinner"></span></button>
                    <?php endif; ?>
                </div>
            </div>
        </form>
    </div>
</div>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/Subscription/Resources/views/frontend/subscriptions/gateway-markup.blade.php ENDPATH**/ ?>