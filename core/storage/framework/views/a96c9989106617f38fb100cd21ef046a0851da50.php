<div class="modal fade" id="withdrawModal" tabindex="-1" aria-labelledby="withdrawModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form action="<?php echo e(route('freelancer.wallet.withdraw.request')); ?>" method="post" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <div class="modal-content">

                <div class="modal-header">
                    <h2 class="popup-contents-title"> <?php echo e(__('Withdraw Money')); ?> </h2>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p class="text-danger"><strong><?php echo e(__('Minimum: ')); ?></strong> <?php echo e(float_amount_with_currency_symbol(get_static_option('minimum_withdraw_amount') ?? '')); ?></p>
                    <p class="text-danger"><strong><?php echo e(__('Maximum:')); ?></strong> <?php echo e(float_amount_with_currency_symbol(get_static_option('maximum_withdraw_amount') ?? '')); ?></p>
                    <div class="popup-contents-inner profile-border-top">
                        <div class="withdrawal-single-item">
                            <span class="withdrawal-single-item-subtitle"><?php echo e(__('Available balance')); ?></span>
                            <h2 class="withdrawal-single-item-balance mt-2"><?php echo e(float_amount_with_currency_symbol($total_wallet_balance) ?? ''); ?></h2>
                        </div>
                    </div>
                    <div class="popup-contents-form custom-form profile-border-top">
                        <div class="single-input">
                            <label class="label-title"> <?php echo e(__('Enter amount')); ?> </label>
                            <input type="number" name="amount" class="form--control" id="withdraw_request_amount" placeholder="00">
                        </div>
                        <div class="single-input">
                            <label class="label-title"> <?php echo e(__('Withdraw method')); ?> </label>
                            <select name="gateway_name" class="form-control gateway-name">
                                <option value=""><?php echo e(__("Select gateway")); ?></option>
                                <?php $__currentLoopData = $withdraw_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option  value="<?php echo e($gateway->id); ?>" data-fields="<?php echo e(json_encode(unserialize($gateway->field))); ?>"><?php echo e($gateway->name); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>

                        <div class="gateway-information-wrapper mt-3">

                        </div>

                    </div>

                    <div class="popup-contents-withdraw mt-4 fee_and_receive_amount_container d-none">
                        <div class="popup-contents-withdraw-item">
                            <div class="popup-contents-withdraw-flex">
                                <span class="popup-contents-withdraw-title"><?php echo e(__("Withdraw Fee")); ?></span>
                                <h3 class="popup-contents-withdraw-price withdraw_fee_amount_for_each_transaction"></h3>
                            </div>
                        </div>
                        <div class="popup-contents-withdraw-item">
                            <div class="popup-contents-withdraw-flex">
                                <span class="popup-contents-withdraw-title"><?php echo e(__("Amount you'll receive")); ?></span>
                                <h3 class="popup-contents-withdraw-price"><span class="receiveable_amount"></span></h3>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn-profile btn-outline-gray btn-hover-danger" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.btn.submit','data' => ['title' => __('Submit Now'),'class' => 'btn-profile btn-bg-1 withdraw_amount_from_wallet']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('btn.submit'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Submit Now')),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('btn-profile btn-bg-1 withdraw_amount_from_wallet')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>

        </form>
    </div>
</div>

<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/Wallet/Resources/views/freelancer/wallet/withdraw-modal.blade.php ENDPATH**/ ?>