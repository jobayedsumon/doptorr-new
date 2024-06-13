<?php $__env->startSection('title', __('Payment Gateway Settings')); ?>

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
        .accordion-wrapper .card {margin-bottom: 20px;}
        .card {
            border: none;
            border-radius: 4px;
            background-color: #fff;
            -webkit-transition: all 0.3s ease 0s;
            transition: all 0.3s ease 0s;
        }
        .summernote-wrapper .note-editing-area {height: 400px;}
        .note-editor.note-airframe .note-editing-area .note-editable, .note-editor.note-frame .note-editing-area .note-editable {
            height: 100%;
        }
    </style>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
    <div class="dashboard__body">
        <div class="row">
            <div class="col-lg-12">
                <div class="customMarkup__single">
                    <div class="customMarkup__single__item">
                        <h4 class="customMarkup__single__title"><?php echo e(__('Payment Gateway Settings')); ?></h4>
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
                            <form action="<?php echo e(route('admin.payment.settings.gateway')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="accordion-wrapper">
                                    <div id="accordion-payment">

                                        <div class="card">
                                            <div class="card-header" id="paypal_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#paypal_settings_content"
                                                            aria-expanded="false">
                                                        <span class="page-title"> <?php echo e(__('Paypal Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="paypal_settings_content" class="collapse show"
                                                 data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="payment-notice alert alert-warning">
                                                        <p><?php echo e(__('Notice: If PayPal does not support your currency, it will convert the value of your currency to USD based on the current exchange rate of your currency.')); ?></p>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable Paypal')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="paypal_gateway" name="paypal_gateway" <?php if(!empty(get_static_option('paypal_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="paypal_gateway"><?php echo e(__('Enable Paypal')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable Test Mode For Paypal')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="paypal_test_mode" name="paypal_test_mode" <?php if(!empty(get_static_option('paypal_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="paypal_test_mode"><?php echo e(__('Enable Test Mode For Paypal')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Paypal Logo'),'name' => 'paypal_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Paypal Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('paypal_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="paypal_sandbox_client_id" class="label-title mt-3"><?php echo e(__('Paypal Sandbox Client ID')); ?></label>
                                                        <input type="text" name="paypal_sandbox_client_id"
                                                               class="form-control"
                                                               value="<?php echo e(get_static_option('paypal_sandbox_client_id')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="paypal_sandbox_client_secret" class="label-title mt-3"><?php echo e(__('Paypal Sandbox Client Secret')); ?></label>
                                                        <input type="text" name="paypal_sandbox_client_secret"
                                                               class="form-control"
                                                               value="<?php echo e(get_static_option('paypal_sandbox_client_secret')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="paypal_sandbox_app_id" class="label-title mt-3"><?php echo e(__('Paypal Sandbox App ID')); ?></label>
                                                        <input type="text" name="paypal_sandbox_app_id"
                                                               class="form-control"
                                                               value="<?php echo e(get_static_option('paypal_sandbox_app_id')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="paypal_live_client_id" class="label-title mt-3"><?php echo e(__('Paypal Live Client ID')); ?></label>
                                                        <input type="text" name="paypal_live_client_id"
                                                               class="form-control"
                                                               value="<?php echo e(get_static_option('paypal_live_client_id')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="paypal_live_client_secret" class="label-title mt-3"><?php echo e(__('Paypal Live Client Secret')); ?></label>
                                                        <input type="text" name="paypal_live_client_secret"
                                                               class="form-control"
                                                               value="<?php echo e(get_static_option('paypal_live_client_secret')); ?>">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="paypal_live_app_id" class="label-title mt-3"><?php echo e(__('Paypal Live App ID')); ?></label>
                                                        <input type="text" name="paypal_live_app_id"
                                                               class="form-control"
                                                               value="<?php echo e(get_static_option('paypal_live_app_id')); ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="paytm_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#paytm_settings_content"
                                                            aria-expanded="false">
                                                        <span class="page-title"> <?php echo e(__('Paytm Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="paytm_settings_content" class="collapse"
                                                 data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="single-input">
                                                        <div class="payment-notice alert alert-warning">

                                                            <p><?php echo e(__('if your currency is not available in paytm, it will convert you currency value to INR value based on your currency exchange rate.')); ?></p>
                                                        </div>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Paytm')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="paytm_gateway" name="paytm_gateway" <?php if(!empty(get_static_option('paytm_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="paytm_gateway"><?php echo e(__('Enable/Disable Paytm')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable Test Mode For Paytm')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="paytm_test_mode" name="paytm_test_mode" <?php if(!empty(get_static_option('paytm_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="paytm_test_mode"><?php echo e(__('Enable Test Mode For Paytm')); ?></label>
                                                    </div>

                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Paytm Logo'),'name' => 'paytm_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Paytm Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('paytm_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>

                                                    <div class="single-input">
                                                        <label for="paytm_merchant_key" class="label-title mt-3"><?php echo e(__('Paytm Merchant Key')); ?></label>
                                                        <input type="text" name="paytm_merchant_key" id="paytm_merchant_key" value="<?php echo e(get_static_option('paytm_merchant_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="paytm_merchant_mid" class="label-title mt-3"><?php echo e(__('Paytm Merchant ID')); ?></label>
                                                        <input type="text" name="paytm_merchant_mid" id="paytm_merchant_mid"  value="<?php echo e(get_static_option('paytm_merchant_mid')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="paytm_merchant_website" class="label-title mt-3"><?php echo e(__('Paytm Merchant Website')); ?></label>
                                                        <input type="text" name="paytm_merchant_website" id="paytm_merchant_website"  value="<?php echo e(get_static_option('paytm_merchant_website')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="paytm_channel" class="label-title mt-3"><?php echo e(__('Paytm channel')); ?></label>
                                                        <input type="text" name="paytm_channel" value="<?php echo e(get_static_option('paytm_channel')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="paytm_industry_type" class="label-title mt-3"><?php echo e(__('Paytm Industry Type')); ?></label>
                                                        <input type="text" name="paytm_industry_type" value="<?php echo e(get_static_option('paytm_industry_type')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="stripe_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#stripe_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Stripe Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="stripe_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="payment-notice alert alert-warning">
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Stripe')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="stripe_gateway" name="stripe_gateway" <?php if(!empty(get_static_option('stripe_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="stripe_gateway"><?php echo e(__('Enable/Disable Stripe')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable Test Mode For Stripe')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="stripe_test_mode" name="stripe_test_mode" <?php if(!empty(get_static_option('stripe_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="stripe_test_mode"><?php echo e(__('Enable Test Mode For Stripe')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Stripe Logo'),'name' => 'stripe_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Stripe Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('stripe_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="stripe_public_key" class="label-title mt-3"><?php echo e(__('Stripe Public Key')); ?></label>
                                                        <input type="text" name="stripe_public_key" id="stripe_public_key" value="<?php echo e(get_static_option('stripe_public_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <label for="stripe_secret_key" class="label-title mt-3"><?php echo e(__('Stripe Secret')); ?></label>
                                                        <input type="text" name="stripe_secret_key" id="stripe_secret_key"  value="<?php echo e(get_static_option('stripe_secret_key')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="razorpay_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#razorpay_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Razorpay Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="razorpay_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="payment-notice alert alert-warning">
                                                        <p><?php echo e(__("Available Currency For Razorpay is, ['INR']")); ?></p>
                                                        <p><?php echo e(__('if your currency is not available in Razorpay, it will convert you currency value to INR value based on your currency exchange rate.')); ?></p>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Razorpay')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="razorpay_gateway" name="razorpay_gateway" <?php if(!empty(get_static_option('razorpay_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="razorpay_gateway"><?php echo e(__('Enable/Disable Razorpay')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable Test Mode For Razorpay')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="razorpay_test_mode" name="razorpay_test_mode" <?php if(!empty(get_static_option('razorpay_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="razorpay_test_mode"><?php echo e(__('Enable Test Mode For Paypal')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Razorpay Logo'),'name' => 'razorpay_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Razorpay Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('razorpay_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="razorpay_api_key" class="label-title mt-3"><?php echo e(__('Razorpay Key')); ?></label>
                                                        <input type="text" name="razorpay_api_key" id="razorpay_api_key" value="<?php echo e(get_static_option('razorpay_api_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="razorpay_api_secret" class="label-title mt-3"><?php echo e(__('Razorpay Secret')); ?></label>
                                                        <input type="text" name="razorpay_api_secret" id="razorpay_api_secret"  value="<?php echo e(get_static_option('razorpay_api_secret')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="paystack_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#paystack_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('PayStack Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="paystack_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="payment-notice alert alert-warning">
                                                        <p><?php echo e(__('if your currency is not available in Paystack, it will convert you currency value to NGN value based on your currency exchange rate.')); ?></p>
                                                    </div>
                                                    <p class="margin-bottom-30 margin-top-20 info-paragraph">
                                                        <?php echo e(__('Don\'t forget to put below url to "Settings > API Key & Webhook > Callback URL" in your paystack admin panel')); ?>

                                                        <br>
                                                        <span class="bg-gray mt-3 p-3">https://xilancer.com/frontend/payments/paystack-ipn</span>
                                                    </p>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable PayStack')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="paystack_gateway" name="paystack_gateway" <?php if(!empty(get_static_option('paystack_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="paystack_gateway"><?php echo e(__('Enable/Disable PayStack')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable Test Mode For PayStack')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="paystack_test_mode" name="paystack_test_mode" <?php if(!empty(get_static_option('paystack_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="paystack_test_mode"><?php echo e(__('Enable Test Mode For PayStack')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('PayStack Logo'),'name' => 'paystack_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('PayStack Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('paystack_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="paystack_public_key" class="label-title mt-3"><?php echo e(__('PayStack Public Key')); ?></label>
                                                        <input type="text" name="paystack_public_key" id="paystack_public_key" value="<?php echo e(get_static_option('paystack_public_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="paystack_secret_key" class="label-title mt-3"><?php echo e(__('PayStack Secret Key')); ?></label>
                                                        <input type="text" name="paystack_secret_key" id="paystack_secret_key"  value="<?php echo e(get_static_option('paystack_secret_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="paystack_merchant_email" class="label-title mt-3"><?php echo e(__('PayStack Merchant Email')); ?></label>
                                                        <input type="text" name="paystack_merchant_email" id="paystack_merchant_email"  value="<?php echo e(get_static_option('paystack_merchant_email')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="mollie_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#mollie_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Mollie Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="mollie_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="payment-notice alert alert-warning">

                                                        <p><?php echo e(__('if your currency is not available in mollie, it will convert you currency value to USD value based on your currency exchange rate.')); ?></p>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Mollie')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="mollie_gateway" name="mollie_gateway" <?php if(!empty(get_static_option('mollie_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="mollie_gateway"><?php echo e(__('Enable/Disable Mollie')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable Test Mode For Mollie')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="mollie_test_mode" name="mollie_test_mode" <?php if(!empty(get_static_option('mollie_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="mollie_test_mode"><?php echo e(__('Enable Test Mode For Mollie')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Mollie Logo'),'name' => 'mollie_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Mollie Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('mollie_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="mollie_public_key" class="label-title mt-3"><?php echo e(__('Mollie Public Key')); ?></label>
                                                        <input type="text" name="mollie_public_key" id="mollie_public_key" value="<?php echo e(get_static_option('mollie_public_key')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="flluterwave_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#flutterwave_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Flutterwave Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="flutterwave_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="payment-notice alert alert-warning">

                                                        <p><?php echo e(__('if your currency is not available in flutterwave, it will convert you currency value to USD value based on your currency exchange rate.')); ?></p>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Flutterwave')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="flutterwave_gateway" name="flutterwave_gateway" <?php if(!empty(get_static_option('flutterwave_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="flutterwave_gateway"><?php echo e(__('Enable/Disable Flutterwave')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode Flutterwave')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="flutterwave_test_mode" name="flutterwave_test_mode" <?php if(!empty(get_static_option('flutterwave_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="flutterwave_test_mode"><?php echo e(__('Enable/Disable Test Mode Flutterwave')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Flutterwave Logo'),'name' => 'flutterwave_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Flutterwave Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('flutterwave_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="flw_public_key" class="label-title mt-3"><?php echo e(__('Flutterwave Public Key')); ?></label>
                                                        <input type="text" name="flw_public_key" id="flw_public_key" value="<?php echo e(get_static_option('flw_public_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="flw_secret_key" class="label-title mt-3"><?php echo e(__('Flutterwave Secret Key')); ?></label>
                                                        <input type="text" name="flw_secret_key" id="flw_secret_key" value="<?php echo e(get_static_option('flw_secret_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="flw_secret_hash" class="label-title mt-3"><?php echo e(__('Flutterwave Secret Hash')); ?></label>
                                                        <input type="text" name="flw_secret_hash" id="flw_secret_hash" value="<?php echo e(get_static_option('flw_secret_hash')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="midtrans_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#midtrans_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('MIdtranse Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="midtrans_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">

                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Midtrans')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="midtrans_gateway" name="midtrans_gateway" <?php if(!empty(get_static_option('midtrans_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="midtrans_gateway"><?php echo e(__('Enable/Disable Midtrans')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode Midtrans')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="midtrans_test_mode" name="midtrans_test_mode" <?php if(!empty(get_static_option('midtrans_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="midtrans_test_mode"><?php echo e(__('Enable/Disable Test Mode Midtrans')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Midtranse Logo'),'name' => 'midtrans_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Midtranse Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('midtrans_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="midtrans_merchant_id" class="label-title mt-3"><?php echo e(__('Midtranse Merchant ID (optional)')); ?></label>
                                                        <input type="text" name="midtrans_merchant_id" id="midtrans_merchant_id" value="<?php echo e(get_static_option('midtrans_merchant_id')); ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="midtrans_server_key" class="label-title mt-3"><?php echo e(__('Midtranse Server Key')); ?></label>
                                                        <input type="text" name="midtrans_server_key" id="midtrans_server_key" value="<?php echo e(get_static_option('midtrans_server_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="midtrans_client_key" class="label-title mt-3"><?php echo e(__('Midtranse Client Key')); ?></label>
                                                        <input type="text" name="midtrans_client_key" id="midtrans_client_key" value="<?php echo e(get_static_option('midtrans_client_key')); ?>" class="form-control">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="payfast_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#payfast_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Payfast Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="payfast_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">

                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Payfast')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="payfast_gateway" name="payfast_gateway" <?php if(!empty(get_static_option('payfast_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="payfast_gateway"><?php echo e(__('Enable/Disable Payfast')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/disable Test Mode Payfast')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="payfast_test_mode" name="payfast_test_mode" <?php if(!empty(get_static_option('payfast_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="payfast_test_mode"><?php echo e(__('Enable/disable Test Mode Payfast')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Payfast Logo'),'name' => 'payfast_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Payfast Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('payfast_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="midtrans_merchant_id" class="label-title mt-3"><?php echo e(__('Payfast Merchant ID')); ?></label>
                                                        <input type="text" name="payfast_merchant_id" id="payfast_merchant_id" value="<?php echo e(get_static_option('payfast_merchant_id')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="midtrans_server_key" class="label-title mt-3"><?php echo e(__('Payfast Merchant Key')); ?></label>
                                                        <input type="text" name="payfast_merchant_key" id="payfast_merchant_key" value="<?php echo e(get_static_option('payfast_merchant_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="midtrans_client_key" class="label-title mt-3"><?php echo e(__('Payfast Passphrase')); ?></label>
                                                        <input type="text" name="payfast_passphrase" id="payfast_passphrase" value="<?php echo e(get_static_option('payfast_passphrase')); ?>" class="form-control">
                                                    </div>

                                                    <div class="single-input">
                                                        <label for="midtrans_environment" class="label-title mt-3"><?php echo e(__('Payfast ITN URL')); ?></label>
                                                        <input type="text" name="payfast_itn_url" id="payfast_itn_url" value="<?php echo e(get_static_option('payfast_itn_url')); ?>" class="form-control">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="cashfree_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#cashfree_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Cashfree Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="cashfree_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Cashfree')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="cashfree_gateway" name="cashfree_gateway" <?php if(!empty(get_static_option('cashfree_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="cashfree_gateway"><?php echo e(__('Enable/Disable Cashfree')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode Cashfree')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="cashfree_test_mode" name="cashfree_test_mode" <?php if(!empty(get_static_option('cashfree_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="cashfree_test_mode"><?php echo e(__('Enable/Disable Test Mode Cashfree')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Cashfree Logo'),'name' => 'cashfree_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Cashfree Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('cashfree_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="cashfree_app_id" class="label-title mt-3"><?php echo e(__('Cashfree App ID')); ?></label>
                                                        <input type="text" name="cashfree_app_id" id="cashfree_app_id" value="<?php echo e(get_static_option('cashfree_app_id')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="cashfree_secret_key" class="label-title mt-3"><?php echo e(__('Cashfree Secret Key')); ?></label>
                                                        <input type="text" name="cashfree_secret_key" id="cashfree_secret_key" value="<?php echo e(get_static_option('cashfree_secret_key')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="instamojo_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#instamojo_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Instamojo Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="instamojo_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Instamojo')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="instamojo_gateway" name="instamojo_gateway" <?php if(!empty(get_static_option('instamojo_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="instamojo_gateway"><?php echo e(__('Enable/Disable Instamojo')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/disable Test Mode Instamojo')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="instamojo_test_mode" name="instamojo_test_mode" <?php if(!empty(get_static_option('instamojo_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="instamojo_test_mode"><?php echo e(__('Enable/disable Test Mode Instamojo')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Instamojo Logo'),'name' => 'instamojo_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Instamojo Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('instamojo_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="instamojo_client_id" class="label-title mt-3"><?php echo e(__('Instamojo Client ID')); ?></label>
                                                        <input type="text" name="instamojo_client_id" id="instamojo_client_id" value="<?php echo e(get_static_option('instamojo_client_id')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="instamojo_client_secret" class="label-title mt-3"><?php echo e(__('Instamojo Client Secret')); ?></label>
                                                        <input type="text" name="instamojo_client_secret" id="instamojo_client_secret" value="<?php echo e(get_static_option('instamojo_client_secret')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="instamojo_username" class="label-title mt-3"><?php echo e(__('Instamojo Username (optional)')); ?></label>
                                                        <input type="text" name="instamojo_username" id="instamojo_username" value="<?php echo e(get_static_option('instamojo_username')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="instamojo_password" class="label-title mt-3"><?php echo e(__('Instamojo Password (optional)')); ?></label>
                                                        <input type="text" name="instamojo_password" id="instamojo_password" value="<?php echo e(get_static_option('instamojo_password')); ?>" class="form-control">
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header" id="marcado_pago_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#marcado_pago_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Marcado Pago Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="marcado_pago_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Marcado Pago')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="marcadopago_gateway" name="marcadopago_gateway" <?php if(!empty(get_static_option('marcadopago_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="marcadopago_gateway"><?php echo e(__('Enable/Disable Marcado Pago')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode Marcado Pago')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="marcadopago_test_mode" name="marcadopago_test_mode" <?php if(!empty(get_static_option('marcadopago_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="marcadopago_test_mode"><?php echo e(__('Enable/Disable Test Mode Marcado Pago')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Marcado Pago Logo'),'name' => 'marcadopago_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Marcado Pago Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('marcadopago_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="marcado_pago_client_id" class="label-title mt-3"><?php echo e(__('Marcado Pago Client ID')); ?></label>
                                                        <input type="text" name="marcadopago_client_id" id="marcadopago_client_id" value="<?php echo e(get_static_option('marcadopago_client_id')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="marcado_pago_client_secret" class="label-title mt-3">
                                                            <?php if(!empty(get_static_option('marcadopago_test_mode'))): ?>
                                                                <?php echo e(__('Marcedo Pago Client Secret')); ?>

                                                            <?php else: ?>
                                                                <?php echo e(__('Marcedo Pago Access Token')); ?>

                                                            <?php endif; ?>

                                                        </label>
                                                        <input type="text" name="marcadopago_client_secret" id="marcadopago_client_secret" value="<?php echo e(get_static_option('marcadopago_client_secret')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        

                                        <div class="card">
                                            <div class="card-header" id="squareup_pago_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#squareup_pago_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Squareup Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="squareup_pago_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Squareup')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="squareup_gateway" name="squareup_gateway" <?php if(!empty(get_static_option('squareup_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="squareup_gateway"><?php echo e(__('Enable/Disable Squareup')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode Squareup')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="squareup_test_mode" name="squareup_test_mode" <?php if(!empty(get_static_option('squareup_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="squareup_test_mode"><?php echo e(__('Enable/Disable Test Mode Squareup')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Squareup Logo'),'name' => 'squareup_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Squareup Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('squareup_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="squareup_access_token" class="label-title mt-3"><?php echo e(__('Squareup Access Token')); ?></label>
                                                        <input type="text" name="squareup_access_token"  value="<?php echo e(get_static_option('squareup_access_token')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="squareup_location_id" class="label-title mt-3"><?php echo e(__('Squareup Location ID')); ?></label>
                                                        <input type="text" name="squareup_location_id" value="<?php echo e(get_static_option('squareup_location_id')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="squareup_application_id" class="label-title mt-3"><?php echo e(__('Squareup Application ID (optional)')); ?></label>
                                                        <input type="text" name="squareup_application_id" value="<?php echo e(get_static_option('squareup_application_id')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        
                                        <div class="card">
                                            <div class="card-header" id="cinetpay_pago_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#cinetpay_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Cinetpay Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="cinetpay_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Cinetpay')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="cinetpay_gateway" name="cinetpay_gateway" <?php if(!empty(get_static_option('cinetpay_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="cinetpay_gateway"><?php echo e(__('Enable/Disable Cinetpay')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode Cinetpay')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="cinetpay_test_mode" name="cinetpay_test_mode" <?php if(!empty(get_static_option('cinetpay_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="cinetpay_test_mode"><?php echo e(__('Enable/Disable Test Mode Cinetpay')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Cinetpay Logo'),'name' => 'cinetpay_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Cinetpay Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('cinetpay_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="cinetpay_app_key" class="label-title mt-3"><?php echo e(__('Cinetpay App Key')); ?></label>
                                                        <input type="text" name="cinetpay_app_key"  value="<?php echo e(get_static_option('cinetpay_app_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="cinetpay_site_id" class="label-title mt-3"><?php echo e(__('Cinetpay Site ID')); ?></label>
                                                        <input type="text" name="cinetpay_site_id" value="<?php echo e(get_static_option('cinetpay_site_id')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        
                                        <div class="card">
                                            <div class="card-header" id="paytabs_pago_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#paytabs_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Paytabs Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="paytabs_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">

                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Paytabs')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="paytabs_gateway" name="paytabs_gateway" <?php if(!empty(get_static_option('paytabs_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="paytabs_gateway"><?php echo e(__('Enable/Disable Paytabs')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode Paytabs')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="paytabs_test_mode" name="paytabs_test_mode" <?php if(!empty(get_static_option('paytabs_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="paytabs_test_mode"><?php echo e(__('Enable/Disable Test Mode Paytabs')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Paytabs Logo'),'name' => 'paytabs_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Paytabs Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('paytabs_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>

                                                    <div class="single-input">
                                                        <label for="paytabs_server_key" class="label-title mt-3"><?php echo e(__('Paytabs Server Key')); ?></label>
                                                        <input type="text" name="paytabs_server_key"  value="<?php echo e(get_static_option('paytabs_server_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="paytabs_profile_id" class="label-title mt-3"><?php echo e(__('Paytabs Profile ID')); ?></label>
                                                        <input type="text" name="paytabs_profile_id" value="<?php echo e(get_static_option('paytabs_profile_id')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="paytabs_profile_id" class="label-title mt-3"><?php echo e(__('Region')); ?></label>
                                                        <?php
                                                            $paytabs_region = ['GLOBAL','ARE','EGY','SAU','OMN','JOR'];
                                                        ?>
                                                        <select name="paytabs_region" class="form-control">
                                                            <?php $__currentLoopData = $paytabs_region; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reg): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                                <option <?php if($reg === get_static_option('paytabs_region')): echo 'checked'; endif; ?> value="<?php echo e($reg); ?>"><?php echo e($reg); ?></option>
                                                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        


                                        
                                        <div class="card">
                                            <div class="card-header" id="billplz_pago_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#billplz_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('BillPlz Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="billplz_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">

                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable BillPlz')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="billplz_gateway" name="billplz_gateway" <?php if(!empty(get_static_option('billplz_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="billplz_gateway"><?php echo e(__('Enable/Disable Paytabs')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode BillPlz')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="billplz_test_mode" name="billplz_test_mode" <?php if(!empty(get_static_option('billplz_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="billplz_test_mode"><?php echo e(__('Enable/Disable Test Mode Paytabs')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('BillPlz Logo'),'name' => 'billplz_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('BillPlz Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('billplz_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="billplz_key" class="label-title mt-3"><?php echo e(__('BillPlz Key')); ?></label>
                                                        <input type="text" name="billplz_key"  value="<?php echo e(get_static_option('billplz_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="billplz_xsignature" class="label-title mt-3"><?php echo e(__('BillPlz xSignature')); ?></label>
                                                        <input type="text" name="billplz_xsignature" value="<?php echo e(get_static_option('billplz_xsignature')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="billplz_collection_name" class="label-title mt-3"><?php echo e(__('BillPlz Collection Name')); ?></label>
                                                        <input type="text" name="billplz_collection_name" value="<?php echo e(get_static_option('billplz_collection_name')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        
                                        <div class="card">
                                            <div class="card-header" id="zitopay_pago_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#zitopay_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Zitopay Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="zitopay_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">

                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable BillPlz')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="zitopay_gateway" name="zitopay_gateway" <?php if(!empty(get_static_option('zitopay_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="zitopay_gateway"><?php echo e(__('Enable/Disable Zitopay')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode Zitopay')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="zitopay_test_mode" name="zitopay_test_mode" <?php if(!empty(get_static_option('zitopay_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="zitopay_test_mode"><?php echo e(__('Enable/Disable Test Mode Zitopay')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('BillPlz Logo'),'name' => 'zitopay_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('BillPlz Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('zitopay_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="zitopay_username" class="label-title mt-3"><?php echo e(__('Zitopay Username')); ?></label>
                                                        <input type="text" name="zitopay_username"  value="<?php echo e(get_static_option('zitopay_username')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        
                                        <div class="card">
                                            <div class="card-header" id="toyyibpay_pago_content">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#toyyibpay_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Toyyibpay Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="toyyibpay_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">

                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Toyyibpay')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="toyyibpay_gateway" name="toyyibpay_gateway" <?php if(!empty(get_static_option('toyyibpay_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="toyyibpay_gateway"><?php echo e(__('Enable/Disable Toyyibpay')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode Toyyibpay')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="toyyibpay_test_mode" name="toyyibpay_test_mode" <?php if(!empty(get_static_option('toyyibpay_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="toyyibpay_test_mode"><?php echo e(__('Enable/Disable Test Mode Toyyibpay')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Toyyibpay Logo'),'name' => 'toyyibpay_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Toyyibpay Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('toyyibpay_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="toyyibpay_secrect_key" class="label-title mt-3"><?php echo e(__('Toyyibpay Secrect Key')); ?></label>
                                                        <input type="text" name="toyyibpay_secrect_key"  value="<?php echo e(get_static_option('toyyibpay_secrect_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="toyyibpay_secrect_key" class="label-title mt-3"><?php echo e(__('Toyyibpay Category Code')); ?></label>
                                                        <input type="text" name="toyyibpay_category_code"  value="<?php echo e(get_static_option('toyyibpay_category_code')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        
                                        <div class="card">
                                            <div class="card-header" id="pagali_pago_content">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#pagali_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Pagali Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="pagali_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">

                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Pagali')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="pagali_gateway" name="pagali_gateway" <?php if(!empty(get_static_option('pagali_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="pagali_gateway"><?php echo e(__('Enable/Disable Pagali')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode Pagali')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="pagali_test_mode" name="pagali_test_mode" <?php if(!empty(get_static_option('pagali_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="pagali_test_mode"><?php echo e(__('Enable/Disable Test Mode Pagali')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Pagali Logo'),'name' => 'pagali_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Pagali Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('pagali_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="pagali_page_id" class="label-title mt-3"><?php echo e(__('Pagali Page ID')); ?></label>
                                                        <input type="text" name="pagali_page_id"  value="<?php echo e(get_static_option('pagali_page_id')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="pagali_entity_id" class="label-title mt-3"><?php echo e(__('Pagali Entity ID')); ?></label>
                                                        <input type="text" name="pagali_entity_id"  value="<?php echo e(get_static_option('pagali_entity_id')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        
                                        <div class="card">
                                            <div class="card-header" id="authorize_dot_net_pago_content">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#authorize_dot_net_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Authorize.Net Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="authorize_dot_net_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">

                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Authorize.Net')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="authorize_dot_net_gateway" name="authorize_dot_net_gateway" <?php if(!empty(get_static_option('authorize_dot_net_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="authorize_dot_net_gateway"><?php echo e(__('Enable/Disable Authorize.Net')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode Authorize.Net')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="authorize_dot_net_test_mode" name="authorize_dot_net_test_mode" <?php if(!empty(get_static_option('authorize_dot_net_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="authorize_dot_net_test_mode"><?php echo e(__('Enable/Disable Test Mode Authorize.Net')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Authorize.Net Logo'),'name' => 'authorize_dot_net_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Authorize.Net Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('authorize_dot_net_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="pagali_page_id" class="label-title mt-3"><?php echo e(__('Authorize.Net Login ID')); ?></label>
                                                        <input type="text" name="authorize_dot_net_login_id"  value="<?php echo e(get_static_option('authorize_dot_net_login_id')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="pagali_entity_id" class="label-title mt-3"><?php echo e(__('Authorize.Net Transaction ID')); ?></label>
                                                        <input type="text" name="authorize_dot_net_transaction_id"  value="<?php echo e(get_static_option('authorize_dot_net_transaction_id')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        
                                        <div class="card">
                                            <div class="card-header" id="authorize_dot_net_pago_content">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#sitesway_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('SitesWay Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="sitesway_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">

                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable SitesWay')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="sitesway_gateway" name="sitesway_gateway" <?php if(!empty(get_static_option('sitesway_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="sitesway_gateway"><?php echo e(__('Enable/Disable SitesWay')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode SitesWay')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="sitesway_test_mode" name="sitesway_test_mode" <?php if(!empty(get_static_option('sitesway_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="sitesway_test_mode"><?php echo e(__('Enable/Disable Test Mode SitesWay')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('SitesWay Logo'),'name' => 'sitesway_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('SitesWay Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('sitesway_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="sitesway_brand_id" class="label-title mt-3"><?php echo e(__('SitesWay Brand ID')); ?></label>
                                                        <input type="text" name="sitesway_brand_id"  value="<?php echo e(get_static_option('sitesway_brand_id')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="sitesway_api_key" class="label-title mt-3"><?php echo e(__('SitesWay API Key')); ?></label>
                                                        <input type="text" name="sitesway_api_key"  value="<?php echo e(get_static_option('sitesway_api_key')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        
                                        <div class="card">
                                            <div class="card-header" id="iyzipay_pago_content">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button" data-bs-toggle="collapse" data-bs-target="#iyzipay_settings_content" aria-expanded="false" >
                                                        <span class="page-title"> <?php echo e(__('Iyzipay Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>

                                            <div id="iyzipay_settings_content" class="collapse"  data-parent="#accordion-payment">
                                                <div class="card-body">

                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Iyzipay')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="iyzipay_gateway" name="iyzipay_gateway" <?php if(!empty(get_static_option('iyzipay_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="iyzipay_gateway"><?php echo e(__('Enable/Disable Iyzipay')); ?></label>
                                                    </div>
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Test Mode Iyzipay')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="iyzipay_test_mode" name="iyzipay_test_mode" <?php if(!empty(get_static_option('iyzipay_test_mode'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="iyzipay_test_mode"><?php echo e(__('Enable/Disable Test Mode Iyzipay')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Iyzipay Logo'),'name' => 'iyzipay_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Iyzipay Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('iyzipay_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="iyzipay_secret_key" class="label-title mt-3"><?php echo e(__('Iyzipay secret Key')); ?></label>
                                                        <input type="text" name="iyzipay_secret_key"  value="<?php echo e(get_static_option('iyzipay_secret_key')); ?>" class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="iyzipay_api_key" class="label-title mt-3"><?php echo e(__('Iyzipay API Key')); ?></label>
                                                        <input type="text" name="iyzipay_api_key"  value="<?php echo e(get_static_option('iyzipay_api_key')); ?>" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                        
                                        <div class="card">
                                            <div class="card-header" id="manual_payment_settings">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link" type="button"
                                                            data-bs-toggle="collapse"
                                                            data-bs-target="#manual_payment_settings_content"
                                                            aria-expanded="false">
                                                        <span class="page-title"> <?php echo e(__('Manual Payment Settings')); ?></span>
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="manual_payment_settings_content" class="collapse" data-parent="#accordion-payment">
                                                <div class="card-body">
                                                    <div class="switch">
                                                        <label class="label-title mt-3"><strong><?php echo e(__('Enable/Disable Manual Payment')); ?></strong></label>
                                                        <input class="custom-switch" type="checkbox" id="manual_payment_gateway" name="manual_payment_gateway" <?php if(!empty(get_static_option('manual_payment_gateway'))): ?> checked <?php endif; ?>>
                                                        <label class="switch-label" for="manual_payment_gateway"><?php echo e(__('Enable/Disable Manual Payment')); ?></label>
                                                    </div>
                                                    <div class="single-input mt-3">
                                                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.backend.image','data' => ['title' => __('Manual Payment Logo'),'name' => 'manual_payment_preview_logo','dimentions' => '160x50']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('backend.image'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Manual Payment Logo')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('manual_payment_preview_logo'),'dimentions' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('160x50')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="manual_payment_gateway_name" class="label-title mt-3"><?php echo e(__('Manual Payment Name')); ?></label>
                                                        <input type="text" name="manual_payment_gateway_name"
                                                               id="manual_payment_gateway_name"
                                                               value="<?php echo e(get_static_option('manual_payment_gateway_name')); ?>"
                                                               class="form-control">
                                                    </div>
                                                    <div class="single-input">
                                                        <label for="site_manual_payment_description" class="label-title mt-3"><?php echo e(__('Manual Payment Description')); ?></label>
                                                        <div class="summernote-wrapper">
                                                           <textarea class="summernote form-control" name="site_manual_payment_description" id="site_manual_payment_description"><?php echo e(get_static_option('site_manual_payment_description')); ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        

                                    </div>
                                </div>
                                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('payment-gateway-settings')): ?>
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
    <script>
        (function($){
            "use strict";
            $(document).ready(function () {
                $('#site_manual_payment_description').summernote();
            });
        })(jQuery);
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/PaymentGatewaySettings/Resources/views/payment-gateway.blade.php ENDPATH**/ ?>