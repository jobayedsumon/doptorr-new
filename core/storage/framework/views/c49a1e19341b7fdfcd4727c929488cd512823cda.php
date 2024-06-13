<?php $__env->startSection('title', __('SMTP Settings')); ?>

<?php $__env->startSection('content'); ?>
    <div class="dashboard__body">
        <div class="row">
            <div class="col-lg-7">
                <div class="customMarkup__single">
                    <div class="customMarkup__single__item">
                        <h4 class="customMarkup__single__title"><?php echo e(__('SMTP Settings')); ?></h4>
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
                            <form action="<?php echo e(route('admin.general.settings.smtp')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="single-input mb-3">
                                    <label for="site_smtp_mail_mailer" class="label-title"><?php echo e(__('SMTP Mailer')); ?></label>
                                    <select name="site_smtp_mail_mailer" class="form-control">
                                        <option value="smtp" <?php if(get_static_option('site_smtp_mail_mailer') == 'smtp'): ?> selected <?php endif; ?>><?php echo e(__('SMTP')); ?></option>
                                        <option value="sendmail" <?php if(get_static_option('site_smtp_mail_mailer') == 'sendmail'): ?> selected <?php endif; ?>><?php echo e(__('SendMail')); ?></option>
                                        <option value="mailgun" <?php if(get_static_option('site_smtp_mail_mailer') == 'mailgun'): ?> selected <?php endif; ?>><?php echo e(__('Mailgun')); ?></option>
                                        <option value="postmark" <?php if(get_static_option('site_smtp_mail_mailer') == 'postmark'): ?> selected <?php endif; ?>><?php echo e(__('Postmark')); ?></option>
                                    </select>
                                </div>
                                <div class="single-input mb-3">
                                    <label for="site_smtp_mail_host" class="label-title"><?php echo e(__('SMTP Mail Host')); ?></label>
                                    <input type="text" name="site_smtp_mail_host"  class="form-control" value="<?php echo e(get_static_option('site_smtp_mail_host')); ?>">
                                </div>
                                <div class="single-input mb-3">
                                    <label for="site_smtp_mail_port" class="label-title"><?php echo e(__('SMTP Mail Port')); ?></label>
                                    <select name="site_smtp_mail_port" class="form-control">
                                        <option value="587" <?php if(get_static_option('site_smtp_mail_port') == '587'): ?> selected <?php endif; ?>><?php echo e(__('587')); ?></option>
                                        <option value="465" <?php if(get_static_option('site_smtp_mail_port') == '465'): ?> selected <?php endif; ?>><?php echo e(__('465')); ?></option>
                                    </select>
                                </div>
                                <div class="single-input mb-3">
                                    <label for="site_smtp_mail_username" class="label-title"><?php echo e(__('SMTP Mail Username')); ?></label>
                                    <input type="text" name="site_smtp_mail_username"  class="form-control" value="<?php echo e(get_static_option('site_smtp_mail_username')); ?>" id="site_smtp_mail_username">
                                </div>
                                <div class="single-input mb-3">
                                    <label for="site_smtp_mail_password" class="label-title"><?php echo e(__('SMTP Mail Password')); ?></label>
                                    <input type="password" name="site_smtp_mail_password"  class="form-control" value="<?php echo e(get_static_option('site_smtp_mail_password')); ?>" id="site_smtp_mail_password">
                                    <span id="show_password"><i class="fa fa-eye"></i></span>
                                </div>
                                <div class="single-input mb-3">
                                    <label for="site_smtp_mail_encryption" class="label-title"><?php echo e(__('SMTP Mail Encryption')); ?></label>
                                    <select name="site_smtp_mail_encryption" class="form-control">
                                        <option value="ssl" <?php if(get_static_option('site_smtp_mail_encryption') == 'ssl'): ?> selected <?php endif; ?>><?php echo e(__('SSL')); ?></option>
                                        <option value="tls" <?php if(get_static_option('site_smtp_mail_encryption') == 'tls'): ?> selected <?php endif; ?>><?php echo e(__('TLS')); ?></option>
                                    </select>
                                </div>
                                <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Changes')); ?></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="customMarkup__single">
                    <div class="customMarkup__single__item">
                        <h4 class="customMarkup__single__title"><?php echo e(__('SMTP Test')); ?></h4>

                        <?php if($errors->EmailSend->any()): ?>
                            <div class="alert alert-danger">
                                <ul class="list-none">
                                    <button type="button btn-sm" class="close" data-bs-dismiss="alert">×</button>
                                    <?php $__currentLoopData = $errors->EmailSend->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <li> <?php echo e($error); ?></li>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </ul>
                            </div>
                        <?php endif; ?>

                        <div class="customMarkup__single__inner mt-4">
                            <form action="<?php echo e(route('admin.general.settings.smtp.test')); ?>" method="POST" enctype="multipart/form-data">
                                <?php echo csrf_field(); ?>
                                <div class="single-input mb-3">
                                    <label for="email" class="label-title"><?php echo e(__('Email')); ?></label>
                                    <input type="email" name="email"  class="form-control" >
                                </div>
                                <div class="single-input mb-3">
                                    <label for="subject" class="label-title"><?php echo e(__('Subject')); ?></label>
                                    <input type="text" name="subject" value="<?php echo e(__('Test Email Subject')); ?>" class="form-control" >
                                </div>
                                <div class="single-input mb-3">
                                    <label for="message" class="label-title"><?php echo e(__('Message')); ?></label>
                                    <textarea name="message" class="form-control" cols="30" rows="7"><?php echo e(__('Test Email Message')); ?></textarea>
                                </div>
                                <button type="submit" id="update" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Send Mail')); ?></button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
    <script>
        (function($){
            "use strict";
            $(document).ready(function(){
                $(document).on('click','#show_password',function(){
                    let password = $("#site_smtp_mail_password");
                    if (password.attr("type") === "password") {
                        password.attr("type","text")
                    } else {
                        password.attr("type","password")
                    }
                })
            })
        }(jQuery));
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/GeneralSettings/Resources/views/smtp-settings.blade.php ENDPATH**/ ?>