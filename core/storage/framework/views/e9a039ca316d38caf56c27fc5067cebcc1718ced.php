<!-- Level Add Modal -->
<div class="modal fade" id="openProjectPromoteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 heading_title_for_promotion_modal" id="exampleModalLabel"><?php echo e(__('Promotion Project')); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('freelancer.package.buy')); ?>" method="POST" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>
                <input type="hidden" name="set_package_budget" id="set_package_budget">
                <input type="hidden" name="set_project_id_for_promote" id="set_project_id_for_promote" value="0">
                <input type="hidden" name="transaction_fee" id="transaction_fee" value="0">
                <?php
                    $all_package = \Modules\PromoteFreelancer\Entities\ProjectPromoteSettings::select('id','title','budget','duration')->where('status',1)->get();
                ?>

                <div class="modal-body">
                    <div class="alert alert-warning mb-5" role="alert">
                        <p class="warning_for_promotion_modal"><?php echo e(__("Notice: Days refers to the number of days a freelancer project will be displayed in the promotional area after he buy a package.")); ?></p>
                    </div>
                    <div class="single-input mb-3">
                        <label class="label-title mt-3"><?php echo e(__('Choose Package')); ?></label>
                            <select id="get_package_budget" name="package_id" class="form-control get_package_budget">
                                <option><?php echo e(__('Choose Package')); ?></option>
                                <?php $__currentLoopData = $all_package; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $package): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($package->id); ?>" data-budget="<?php echo e($package->budget); ?>"><?php echo e($package->title); ?> (<strong><?php echo e(__('Price:')); ?></strong><?php echo e(float_amount_with_currency_symbol($package->budget)); ?>/<strong><?php echo e(__('Duration:')); ?></strong><?php echo e($package->duration); ?> <?php echo e(__('days')); ?>)</option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                    </div>
                    <label class="checkbox-label" for="choose">
                        <?php if(Auth::check() && Auth::user()->user_wallet?->balance > 0): ?>
                            <?php echo \App\Helper\PaymentGatewayList::renderWalletForm(); ?>

                            <span class="wallet-balance mt-2 d-block"><?php echo e(__('Wallet Balance:')); ?>

                                <strong class="main-balance"><?php echo e(float_amount_with_currency_symbol(Auth::user()->user_wallet?->balance)); ?></strong>
                            </span>
                            <span class="display_wallet_shortage_balance py-3"></span>
                        <?php endif; ?>
                        <p class="d-none show_hide_transaction_section">
                            <strong><?php echo e(__('Transaction Fee')); ?></strong>
                            <span class="currency_symbol"></span>
                            <span class="transaction_fee_amount"></span>
                        </p>
                        <br>
                        <?php echo \App\Helper\PaymentGatewayList::renderPaymentGatewayForForm(false); ?>

                    </label>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button class="btn btn-primary mt-4 pr-4 pl-4 confirm_promote_project"><?php echo e(__('Promote Now')); ?> <span id="promote_project_load_spinner"></span></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/profile-details/promotion/project-promote-modal.blade.php ENDPATH**/ ?>