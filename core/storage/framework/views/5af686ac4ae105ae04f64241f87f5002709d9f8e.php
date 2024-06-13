<?php $__env->startSection('site_title', __('User Login')); ?>
<?php $__env->startSection('content'); ?>
    <!-- login Area Starts -->
    <section class="login-area pat-100 pab-100">
        <div class="container">
            <div class="row gy-5 align-items-center justify-content-between">
                <div class="col-lg-5">
                    <div class="login-wrapper">
                        <div class="login-wrapper-contents">
                            <h3 class="login-wrapper-contents-title"><?php echo e(get_static_option('login_page_title') ?? __('Log In ')); ?></h3>
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
                            <div class="error-message"></div>
                            <form class="login-wrapper-contents-form custom-form" method="post" action="<?php echo e(route('user.login')); ?>">
                                <?php echo csrf_field(); ?>
                                <div class="single-input mt-4">
                                    <label class="label-title mb-3"><?php echo e(__('Email Or User Name')); ?></label>
                                    <input class="form--control" type="text" name="username" id="username" placeholder="<?php echo e(__('Email Or User Name')); ?>">
                                </div>
                                <div class="single-input mt-4">
                                    <label class="label-title mb-3"> <?php echo e(__('Password')); ?> </label>
                                    <div class="single-input-inner">
                                        <input class="form--control" type="password" name="password" id="password" placeholder="<?php echo e(__('Type Password')); ?>">
                                        <div class="icon toggle-password">
                                            <div class="show-icon"> <i class="fas fa-eye-slash"></i> </div>
                                            <span class="hide-icon"> <i class="fas fa-eye"></i> </span>
                                        </div>
                                    </div>
                                </div>
                                <button id="signin_form" class="submit-btn w-100 mt-4" type="submit"> <?php echo e(get_static_option('login_page_button_title') ?? __('Sign In Now')); ?> </button>
                                <span class="account color-light mt-3"><?php echo e(__("Don't have an account?")); ?> <a class="color-one" href="<?php echo e(route('user.register')); ?>"> <?php echo e(__('SignUp Now')); ?></a> </span>
                            </form>
                            <div class="single-checkbox mt-3">
                                <div class="checkbox-inline">
                                    <input class="check-input" name="remember"  type="checkbox" id="check15">
                                    <label class="checkbox-label" for="check15"> <?php echo e(__('Remember Me')); ?> </label>
                                </div>
                                <div class="forgot-password">
                                    <a href="<?php echo e(route('user.forgot.password')); ?>" class="forgot-btn color-one"><?php echo e(__('Forgot Password')); ?> </a>
                                </div>
                            </div>
                            <?php if(get_static_option('login_page_social_login_enable_disable') == 'on'): ?>
                                <div class="login-bottom-contents">
                                    <div class="or-contents mb-3">
                                        <span class="or-contents-para"> <?php echo e(__('Or')); ?> </span>
                                    </div>
                                    <div class="login-others">
                                        <div class="login-others-single">
                                            <a href="<?php echo e(route('login.google.redirect')); ?>" class="login-others-single-btn w-100">
                                                <i class="fa-brands fa-google"></i>
                                                <span class="login-para"> <?php echo e(__('Sign In With Google')); ?> </span>
                                            </a>
                                        </div>
                                        <div class="login-others-single">
                                            <a href="<?php echo e(route('login.facebook.redirect')); ?>" class="login-others-single-btn w-100">
                                                <i class="fa-brands fa-facebook"></i>
                                                <span class="login-para"> <?php echo e(__('Sign In With Facebook')); ?> </span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="login-right">
                        <div class="login-right-item">
                            <div class="login-right-shapes">
                                <div class="login-right-thumb">
                                    <?php if(empty(get_static_option('login_page_sidebar_image'))): ?>
                                    <img src="<?php echo e(asset('assets/static/single-page/login_page.png')); ?>" alt="loginImg">
                                    <?php else: ?>
                                        <?php echo render_image_markup_by_attachment_id(get_static_option('login_page_sidebar_image')); ?>

                                    <?php endif; ?>
                                </div>
                            </div>
                            <div class="login-right-contents text-white">
                                <h4 class="login-right-contents-title"> <?php echo e(get_static_option('login_page_sidebar_title') ?? __('Login and start discover')); ?> </h4>
                                <p class="login-right-contents-para"><?php echo e(get_static_option('login_page_sidebar_description') ?? __('Once login you will see the magic of xilancer marketplace.')); ?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- login Area end -->
<?php $__env->stopSection(); ?>



<?php $__env->startSection('script'); ?>
    <script>
        (function ($) {
            "use strict";
            $(document).ready(function () {
                $(document).on('click','#signin_form',function (e){
                    e.preventDefault();
                    let el = $(this);
                    let erContainer = $(".error-message");
                    erContainer.html('');
                    el.text('<?php echo e(__('Please Wait..')); ?>');
                    $.ajax({
                        url: "<?php echo e(route('user.login')); ?>",
                        type: "POST",
                        data: {
                            username : $('#username').val(),
                            password : $('#password').val(),
                            remember : $('#remember').val(),
                        },
                        error:function(data){
                            var errors = data.responseJSON;
                            erContainer.html('<div class="alert alert-danger"></div>');
                            $.each(errors.errors, function(index,value){
                                erContainer.find('.alert.alert-danger').append('<p>'+value+'</p>');
                            });
                            el.text('<?php echo e(__('Login')); ?>');
                        },
                        success:function (data){
                            console.log(data);
                            $('.alert.alert-danger').remove();
                            if (data.status == 'client-login'){
                                el.text('<?php echo e(__('Redirecting')); ?>..');
                                erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                                let redirectPath = "<?php echo e(route('client.dashboard')); ?>";
                                <?php if(!empty(request()->get('return'))): ?>
                                    redirectPath = "<?php echo e(url('/'.request()->get('return'))); ?>";
                                <?php endif; ?>
                                    window.location = redirectPath;
                            }else if (data.status == 'freelancer-login'){
                                el.text('<?php echo e(__('Redirecting')); ?>..');
                                erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                                let redirectPath = "<?php echo e(route('freelancer.dashboard')); ?>";

                                <?php if(!empty(request()->get('return'))): ?>
                                    redirectPath = "<?php echo e(url('/'.request()->get('return'))); ?>";
                                <?php endif; ?>

                                    window.location = redirectPath;
                            }
                            else{
                                erContainer.html('<div class="alert alert-'+data.type+'">'+data.msg+'</div>');
                                el.text('<?php echo e(__('Login')); ?>');
                            }
                        }
                    });
                });
            });
        }(jQuery));
    </script>
<?php $__env->stopSection(); ?>




<?php echo $__env->make('frontend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/user/user-login.blade.php ENDPATH**/ ?>