<div class="profile-wrapper-item radius-10 display_profile_info">
    <div class="profile-wrapper-flex flex-between">
        <div class="profile-wrapper-author">
            <div class="profile-wrapper-author-flex d-flex gap-3">
                <div class="profile-wrapper-author-thumb position-relative">
                    <?php if($user->image): ?>
                        <a href="javascript:void(0)"><img src="<?php echo e(asset('assets/uploads/profile/'.$user->image)); ?>" alt=""></a>
                        <?php if(moduleExists('FreelancerLevel')): ?>
                            <?php if(get_static_option('profile_page_badge_settings') == 'enable'): ?>
                                <div class="freelancer-level-badge position-absolute">
                                    <?php echo freelancer_level($user->id,'talent') ?? ''; ?>

                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php else: ?>
                        <a href="javascript:void(0)"><img src="<?php echo e(asset('assets/static/img/author/author.jpg')); ?>" alt="<?php echo e(__('AuthorImg')); ?>"></a>
                        <?php if(moduleExists('FreelancerLevel')): ?>
                            <?php if(get_static_option('profile_page_badge_settings') == 'enable'): ?>
                                <div class="freelancer-level-badge position-absolute">
                                    <?php echo freelancer_level($user->id,'talent') ?? ''; ?>

                                </div>
                            <?php endif; ?>
                        <?php endif; ?>
                    <?php endif; ?>

                </div>
                <div class="profile-wrapper-author-cotents">
                    <h4 class="single-freelancer-author-name">
                        <a href="javascript:void(0)" tabindex="0">
                            <?php echo e($user->first_name .' '.$user->last_name); ?><?php if(moduleExists('FreelancerLevel')): ?><small><?php echo e(freelancer_level($user->id)); ?></small><?php endif; ?>
                        </a>
                        <?php if(Cache::has('user_is_online_' . $user->id)): ?>
                            <span class="single-freelancer-author-status"> <?php echo e(__('Active')); ?> </span>
                        <?php else: ?>
                            <span class="single-freelancer-author-status-ofline"> <?php echo e(__('Inactive')); ?> </span>
                        <?php endif; ?>
                    </h4>
                    <span class="single-freelancer-author-para mt-2">
                        <?php echo e(optional($user->user_introduction)->title ?? ''); ?> <?php if($user->user_verified_status == 1): ?> <i class="fas fa-circle-check"></i><?php endif; ?>
                    </span>
                    <?php echo freelancer_rating_for_profile_details_page($user->id); ?>

                </div>
            </div>
        </div>
        <div class="profile-wrapper-right">
            <div class="profile-wrapper-right-flex flex-btn">
                <?php if($user->check_work_availability == 1): ?>
                <span class="profile-wrapper-switch-title"> <?php echo e(__('Available for Work')); ?></span>
                <?php endif; ?>
                    <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type == 2 && Auth::guard('web')->user()->username==$username): ?>

                <div class="profile-wrapper-switch-custom display_work_availability">
                    <label class="custom_switch">
                            <input type="checkbox" id="check_work_availability" data-user_id="<?php echo e($user->id); ?>" data-check_work_availability="<?php echo e($user->check_work_availability); ?>" <?php if($user->check_work_availability == 1): ?>checked <?php endif; ?>>
                            <span class="slider round"></span>

                    </label>
                </div>
                    <?php endif; ?>
            </div>
        </div>
    </div>

    <?php if($user?->user_country?->country): ?>
        <div class="profile-wrapper-details profile-border-top">
        <?php
            $hourly = 'feature will come later';
        ?>
        <?php if($hourly != 'feature will come later'): ?>
        <div class="profile-wrapper-details-single">
            <div class="profile-wrapper-details-single-flex">
                <h4 class="profile-wrapper-details-single-price display_hourly_rate"> <?php echo e(amount_with_currency_symbol($user->hourly_rate ?? '')); ?> <sub><?php echo e(__('hour')); ?></sub></h4>
                <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type == 2 && Auth::guard('web')->user()->username==$username): ?>
                    <span class="profile-wrapper-details-edit price_edit_show_hide" data-bs-toggle="modal" data-bs-target="#priceModal"><i class="fas fa-edit"></i></span>
                <?php endif; ?>
            </div>
        </div>
        <?php endif; ?>

        <div class="profile-wrapper-details-single">
            <div class="profile-wrapper-details-single-flex">
                <div class="profile-wrapper-details-single-flag">
                    <i class="flag flag-<?php echo e(strtolower(optional($user->user_country)->country)); ?>"></i>
                </div>
                <span class="profile-wrapper-details-para"> <?php if($user?->user_state?->state != null): ?> <?php echo e(optional($user->user_state)->state); ?>, <?php endif; ?> <?php echo e(optional($user->user_country)->country); ?> </span>
            </div>
        </div>

        <?php if(!empty($user->user_state->timezone)): ?>
        <div class="profile-wrapper-details-single">
            <div class="profile-wrapper-details-single-flex">
                <span class="profile-wrapper-details-single-icon"><i class="fa-regular fa-clock"></i></span>
                <span class="profile-wrapper-details-para">
                    <?php
                    if(!empty($user->user_state->timezone)){
                        date_default_timezone_set(optional($user->user_state)->timezone ?? '');
                        echo date('h:i:a');
                    }
                    ?>
                </span>
                    <span>(<?php echo e(__('Local Time')); ?>)</span>
            </div>
        </div>
        <?php endif; ?>

    </div>
    <?php endif; ?>

    <?php if($user?->user_introduction?->description): ?>
    <div class="profile-wrapper-about profile-border-top">
        <h4 class="profile-wrapper-about-title"> <?php echo e(__('About Me')); ?> </h4>
        <p class="profile-wrapper-about-para mt-2"><?php echo e(optional($user->user_introduction)->description ?? ''); ?></p>
    </div>
   <?php endif; ?>
    <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type == 2 && Auth::guard('web')->user()->username==$username): ?>
        <div class="d-flex">
            <div class="profile-wrapper-item-btn flex-btn profile-border-top">
                <div class="change_client_view">
                    <a href="javascript:void(0)" class="btn-profile btn-outline-gray view_as_a_client"> <?php echo e(__('View as Client')); ?> </a>
                </div>
                <a href="javascript:void(0)" class="btn-profile btn-bg-1 edit_info_show_hide" data-bs-toggle="modal" data-bs-target="#profileModal"> <?php echo e(__('Edit info')); ?> </a>
            </div>
            <div class="promote_profile profile-border-top">

                <?php if(moduleExists('PromoteFreelancer')): ?>
                    <?php
                        $current_date = \Carbon\Carbon::now()->toDateTimeString();
                        $is_promoted = \Modules\PromoteFreelancer\Entities\PromotionProjectList::where('identity',auth()->user()->id)
                        ->where('type','profile')
                        ->where('expire_date','>',$current_date)
                        ->where('payment_status','complete')
                        ->first();
                    ?>

                    <?php if(!empty($is_promoted)): ?>
                        <button type="button" class="btn btn-outline-primary" disabled><?php echo e(__('Profile Promoted')); ?></button>
                    <?php else: ?>
                        <a href="javascript:void(0)"
                           class="btn-profile btn-bg-1 open_project_promote_modal"
                           data-bs-target="#openProjectPromoteModal"
                           data-bs-toggle="modal"
                           data-project-id="0">
                            <?php echo e(__('Promote Profile')); ?>

                        </a>
                    <?php endif; ?>

                <?php endif; ?>

            </div>
        </div>
    <?php endif; ?>
</div>

<!--price update modal-->
<div class="modal fade" id="priceModal" tabindex="-1" aria-labelledby="PriceModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="PriceModalLabel"><?php echo e(__('Edit Price')); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="single-profile-settings-form custom-form">
                    <div class="error_msg_container"></div>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['type' => 'number','min' => '1','max' => '300','title' => __('Enter Price'),'id' => 'hourly_rate','class' => 'form-control','value' => ''.e($user->hourly_rate ?? '').'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('number'),'min' => '1','max' => '300','title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Enter Price')),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('hourly_rate'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control'),'value' => ''.e($user->hourly_rate ?? '').'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                <button type="button" class="btn btn-primary edit_public_hourly_rate"><?php echo e(__('Save')); ?></button>
            </div>
        </div>
    </div>
</div>

<!--Update info Modal -->
<div class="modal fade" id="profileModal" tabindex="-1" aria-labelledby="profileModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="profileModalLabel"><?php echo e(__('Edit Profile Info')); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="single-profile-settings-form custom-form">
                    <div class="error_msg_container"></div>
                    <div class="single-flex-input">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['type' => 'text','title' => __('First Name'),'id' => 'first_name','class' => 'form-control','value' => ''.e($user->first_name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('text'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('First Name')),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('first_name'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control'),'value' => ''.e($user->first_name).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['type' => 'text','title' => __('Last Name'),'id' => 'last_name','class' => 'form-control','value' => ''.e($user->last_name).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('text'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Last Name')),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('last_name'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control'),'value' => ''.e($user->last_name).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['type' => 'text','title' => __('Professional Title'),'id' => 'professional_title','class' => 'form-control','value' => ''.e(optional($user->user_introduction)->title).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('text'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Professional Title')),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('professional_title'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control'),'value' => ''.e(optional($user->user_introduction)->title).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <span id="professional_title_char_length_check"></span>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.textarea','data' => ['type' => 'text','title' => __('Intro About Yourself'),'id' => 'professional_description','class' => 'form-control','value' => ''.e(optional($user->user_introduction)->description).'']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('text'),'title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Intro About Yourself')),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('professional_description'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control'),'value' => ''.e(optional($user->user_introduction)->description).'']); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <span id="professional_description_char_length_check"></span>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.country-dropdown','data' => ['title' => __('Your Country'),'id' => 'country_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.country-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Your Country')),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('country_id')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.state-dropdown','data' => ['title' => __('Your State'),'id' => 'state_id']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.state-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Your State')),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('state_id')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                <button type="button" class="btn btn-primary edit_public_profile_info"><?php echo e(__('Save')); ?></button>
            </div>
        </div>
    </div>
</div>

<?php if(moduleExists('PromoteFreelancer')): ?>
    <?php echo $__env->make('frontend.profile-details.promotion.project-promote-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php endif; ?>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/frontend/profile-details/profile.blade.php ENDPATH**/ ?>