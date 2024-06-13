<?php $__env->startSection('title', __('Payment Info Settings')); ?>

<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media.css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media.css'); ?>
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
    <div class="dashboard__body">
        <div class="row">
            <div class="col-lg-12">
                <div class="customMarkup__single">
                    <div class="customMarkup__single__item">
                        <h4 class="customMarkup__single__title"><?php echo e(__('Payment Info Settings')); ?></h4>
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
                        <div class="customMarkup__single__inner mt-4">
                            <form action="<?php echo e(route('admin.payment.settings.info')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="single-input">
                                    <label for="site_global_currency" class="label-title mt-3"><?php echo e(__('Site Global Currency')); ?></label>
                                    <select name="site_global_currency" class="form-control" id="site_global_currency">
                                        <?php $__currentLoopData = getAllCurrency(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cur => $symbol): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cur); ?>"
                                                    <?php if(get_static_option('site_global_currency') == $cur): ?> selected <?php endif; ?>
                                            >
                                                <?php echo e($cur.' ( '.$symbol.' )'); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>

                                <div class="single-input">
                                    <label for="enable_disable_decimal_point" class="label-title mt-3"><?php echo e(__('Enable/Disable Decimal Point')); ?></label>
                                    <select name="enable_disable_decimal_point" class="form-control" id="enable_disable_decimal_point">
                                        <option value="enable" <?php if(get_static_option('enable_disable_decimal_point') == 'enable'): ?> selected <?php endif; ?>><?php echo e(__('Enable')); ?></option>
                                        <option value="disable" <?php if(get_static_option('enable_disable_decimal_point') == 'disable'): ?> selected <?php endif; ?>><?php echo e(__('Disable')); ?></option>
                                    </select>
                                </div>

                                <div class="single-input">
                                    <label for="site_currency_symbol_position" class="label-title mt-3"><?php echo e(__('Currency Symbol Position')); ?></label>
                                    <?php $all_currency_position = ['left','right']; ?>
                                    <select name="site_currency_symbol_position" class="form-control" id="site_currency_symbol_position">
                                        <?php $__currentLoopData = $all_currency_position; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $cur): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($cur); ?>"
                                                    <?php if(get_static_option('site_currency_symbol_position') == $cur): ?> selected <?php endif; ?>><?php echo e(ucwords($cur)); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="single-input">
                                    <label for="site_currency_thousand_separator" class="label-title mt-3"><?php echo e(__('Currency Thousand Separator')); ?></label>
                                    <input type="text" class="form-control"
                                           name="site_currency_thousand_separator"
                                           value="<?php echo e(get_static_option('site_currency_thousand_separator')); ?>">
                                </div>
                                <div class="single-input">
                                    <label for="site_currency_decimal_separator" class="label-title mt-3"><?php echo e(__('Currency Decimal Separator')); ?></label>
                                    <input type="text" class="form-control"
                                           name="site_currency_decimal_separator"
                                           value="<?php echo e(get_static_option('site_currency_decimal_separator')); ?>">
                                </div>
                                <div class="single-input">
                                    <label for="site_default_payment_gateway" class="label-title mt-3"><?php echo e(__('Default Payment Gateway')); ?></label>
                                    <select name="site_default_payment_gateway" class="form-control" >
                                        <?php
                                            $all_gateways = \App\Helper\PaymentGatewayList::listOfPaymentGateways();
                                        ?>
                                        <?php $__currentLoopData = $all_gateways; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $gateway): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if(!empty(get_static_option($gateway.'_gateway'))): ?>
                                                <option value="<?php echo e($gateway); ?>" <?php if(get_static_option('site_default_payment_gateway') == $gateway): ?> selected <?php endif; ?>><?php echo e(ucwords(str_replace('_',' ',$gateway))); ?></option>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <?php $global_currency = strtolower(get_static_option('site_global_currency')) ?? '';?>

                                <?php if($global_currency != 'USD'): ?>
                                    <div class="single-input">
                                        <label for="site_<?php echo e(strtolower($global_currency)); ?>_to_usd_exchange_rate" class="label-title mt-3"><?php echo e(__($global_currency.' to USD Exchange Rate')); ?></label>
                                        <input type="text" class="form-control"
                                               name="site_<?php echo e(strtolower($global_currency)); ?>_to_usd_exchange_rate"
                                               value="<?php echo e(get_static_option('site_'.$global_currency.'_to_usd_exchange_rate')); ?>">
                                        <span class="info-text"><?php echo e(sprintf(__('enter %s to USD exchange rate. eg: 1 %s = ? USD'),$global_currency,$global_currency)); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if($global_currency != 'IDR'): ?>
                                    <div class="single-input">
                                        <label for="site_<?php echo e(strtolower($global_currency)); ?>_to_idr_exchange_rate" class="label-title mt-3"><?php echo e(__($global_currency.' to IDR Exchange Rate')); ?></label>
                                        <input type="text" class="form-control"
                                               name="site_<?php echo e(strtolower($global_currency)); ?>_to_idr_exchange_rate"
                                               value="<?php echo e(get_static_option('site_'.$global_currency.'_to_idr_exchange_rate')); ?>">
                                        <span class="info-text"><?php echo e(sprintf(__('enter %s to USD exchange rate. eg: 1 %s = ? IDR'),$global_currency,$global_currency)); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if($global_currency != 'INR' && !empty(get_static_option('paytm_gateway') || !empty(get_static_option('razorpay_gateway')))): ?>
                                    <div class="single-input">
                                        <label for="site_<?php echo e(strtolower($global_currency)); ?>_to_inr_exchange_rate" class="label-title mt-3"><?php echo e(__($global_currency.' to INR Exchange Rate')); ?></label>
                                        <input type="text" class="form-control"
                                               name="site_<?php echo e(strtolower($global_currency)); ?>_to_inr_exchange_rate"
                                               value="<?php echo e(get_static_option('site_'.$global_currency.'_to_inr_exchange_rate')); ?>">
                                        <span class="info-text"><?php echo e(__('enter '.$global_currency.' to INR exchange rate. eg: 1'.$global_currency.' = ? INR')); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if($global_currency != 'NGN' && !empty(get_static_option('paystack_gateway') )): ?>
                                    <div class="single-input">
                                        <label for="site_<?php echo e(strtolower($global_currency)); ?>_to_ngn_exchange_rate" class="label-title mt-3"><?php echo e(__($global_currency.' to NGN Exchange Rate')); ?></label>
                                        <input type="text" class="form-control"
                                               name="site_<?php echo e(strtolower($global_currency)); ?>_to_ngn_exchange_rate"
                                               value="<?php echo e(get_static_option('site_'.$global_currency.'_to_ngn_exchange_rate')); ?>">
                                        <span class="info-text"><?php echo e(__('enter '.$global_currency.' to NGN exchange rate. eg: 1'.$global_currency.' = ? NGN')); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if($global_currency != 'ZAR'): ?>
                                    <div class="single-input">
                                        <label for="site_<?php echo e(strtolower($global_currency)); ?>_to_zar_exchange_rate" class="label-title mt-3"><?php echo e(__($global_currency.' to ZAR Exchange Rate')); ?></label>
                                        <input type="text" class="form-control"
                                               name="site_<?php echo e(strtolower($global_currency)); ?>_to_zar_exchange_rate"
                                               value="<?php echo e(get_static_option('site_'.$global_currency.'_to_zar_exchange_rate')); ?>">
                                        <span class="info-text"><?php echo e(sprintf(__('enter %s to USD exchange rate. eg: 1 %s = ? ZAR'),$global_currency,$global_currency)); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if($global_currency != 'BRL'): ?>
                                    <div class="single-input">
                                        <label for="site_<?php echo e(strtolower($global_currency)); ?>_to_brl_exchange_rate" class="label-title mt-3"><?php echo e(__($global_currency.' to BRL Exchange Rate')); ?></label>
                                        <input type="text" class="form-control"
                                               name="site_<?php echo e(strtolower($global_currency)); ?>_to_brl_exchange_rate"
                                               value="<?php echo e(get_static_option('site_'.$global_currency.'_to_brl_exchange_rate')); ?>">
                                        <span class="info-text"><?php echo e(__('enter '.$global_currency.' to BRL exchange rate. eg: 1'.$global_currency.' = ? BRL')); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if($global_currency != 'MYR'): ?>
                                    <div class="single-input">
                                        <label for="site_<?php echo e(strtolower($global_currency)); ?>_to_myr_exchange_rate" class="label-title mt-3"><?php echo e(__($global_currency.' to MYR Exchange Rate')); ?></label>
                                        <input type="text" class="form-control"
                                               name="site_<?php echo e(strtolower($global_currency)); ?>_to_myr_exchange_rate"
                                               value="<?php echo e(get_static_option('site_'.$global_currency.'_to_myr_exchange_rate')); ?>">
                                        <span class="info-text"><?php echo e(__('enter '.$global_currency.' to MYR exchange rate. eg: 1'.$global_currency.' = ? MYR')); ?></span>
                                    </div>
                                <?php endif; ?>

                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment-info-settings')): ?>
                                <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Changes')); ?></button>
                                <?php endif; ?>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media.markup','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media.markup'); ?>
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

<?php $__env->startSection('script'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.media.js','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('media.js'); ?>
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
        (function($){
            "use strict";
            $(document).ready(function () {
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.btn.update','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('btn.update'); ?>
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
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.icon-picker.icon-picker','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('icon-picker.icon-picker'); ?>
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
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/PaymentGatewaySettings/Resources/views/payment-info.blade.php ENDPATH**/ ?>