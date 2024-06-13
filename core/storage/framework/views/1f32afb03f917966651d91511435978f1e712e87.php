<div class="profile-wrapper-item add-project-parent radius-10 project_wrapper_area">
    <div class="profile-wrapper-item-flex flex-between align-items-center profile-border-bottom">
        <h4 class="profile-wrapper-item-title"> <?php echo e(__('Project Catalogues')); ?> </h4>
        <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type == 2  && Auth::guard('web')->user()->username==$username): ?>
            <div class="profile-wrapper-item-plus create_project_show_hide">
               <a href="<?php echo e(route('freelancer.project.create')); ?>"><i class="fas fa-plus"></i></a>
            </div>
        <?php endif; ?>
    </div>
    <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type == 2 && Auth::guard('web')->user()->username==$username): ?>
            <div class="single-project project-catalogue">
                <div class="project-catalogue-flex">
                    <div class="single-project-thumb project-catalogue-thumb">
                        <a href="<?php echo e(route('project.details', ['username' => $project->project_creator?->username, 'slug' => $project->slug])); ?>">
                            <img src="<?php echo e(asset('assets/uploads/project/'.$project->image)); ?>" alt="project">
                        </a>
                    </div>
                    <div class="single-project-content project-catalogue-contents mt-0">
                        <div class="single-project-content-top align-items-center flex-between">
                            <?php echo project_rating($project->id); ?>

                        </div>
                        <h4 class="single-project-content-title">
                            <a href="<?php echo e(route('project.details',['username'=>$project->project_creator?->username,'slug'=>$project->slug])); ?>"> <?php echo e($project->title); ?> </a>
                        </h4>

                        <div class="project-catalogue-bottom flex-between mt-3">
                            <?php if($project->basic_discount_charge != null && $project->basic_discount_charge > 0): ?>
                                <span class="single-project-content-price"> <?php echo e(amount_with_currency_symbol($project->basic_discount_charge) ?? ''); ?> <s><?php echo e(amount_with_currency_symbol($project->basic_regular_charge) ?? ''); ?></s> </span>
                            <?php else: ?>
                                <span class="single-project-content-price"> <?php echo e(amount_with_currency_symbol($project->basic_regular_charge) ?? ''); ?></span>
                            <?php endif; ?>
                            <div class="single-project-delivery">
                            <span class="single-project-delivery-icon">
                                <i class="fa-regular fa-clock"></i> <?php echo e(__('Delivery')); ?>

                            </span>
                                <span class="single-project-delivery-days"> <?php echo e($project->basic_delivery ?? 0); ?> </span>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="profile-wrapper-item-bottom profile-border-top">
                    <div class="profile-wrapper-item-bottom-flex flex-between align-items-center">
                        <?php if($project->status === 1): ?>
                            <div class="profile-wrapper-right-flex flex-btn order_availability_show_hide">
                                <span class="profile-wrapper-switch-title"> <?php echo e(__('Available for order')); ?> </span>
                                <div class="profile-wrapper-switch-custom display_availability_for_order_or_not_<?php echo e($project->id); ?>">
                                    <label class="custom_switch">
                                        <input type="checkbox" id="available_for_order_or_not" data-id="<?php echo e($project->id); ?>" data-project_on_off="<?php echo e($project->project_on_off); ?>" <?php if($project->project_on_off == 1): ?>checked <?php endif; ?>>
                                        <span class="slider round"></span>
                                    </label>
                                </div>
                            </div>
                        <?php else: ?>
                            <div class="flex-btn">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.status.table.active-inactive','data' => ['status' => $project->status]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('status.table.active-inactive'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['status' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($project->status)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                                <?php if($project->project_approve_request == 2): ?>
                                    <span class="btn-profile btn-outline-1 mb-3 view_project_reject_reason_details"
                                          data-bs-target="#rejectProjectReason"
                                          data-bs-toggle="modal"
                                          data-project-reject-description="<?php echo e($project?->project_history?->reject_reason ?? __('No Description')); ?>"
                                    >
                                          <?php echo e(__('View Reject Reason')); ?>

                                    </span>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>
                        <div class="profile-wrapper-item-btn flex-btn">
                            <?php if($project?->orders_count == 0): ?>
                            <a href="javascript:void(0)" class="btn-profile btn-outline-cancel delete_project edit_info_show_hide" data-project-id="<?php echo e($project->id); ?>"> <?php echo e(__('Delete')); ?> </a>
                            <?php endif; ?>
                            <?php if(moduleExists('SecurityManage')): ?>
                                <?php if(Auth::guard('web')->user()->freeze_project == 'freeze'): ?>
                                    <a href="#" class="btn-profile btn-bg-1 <?php if(Auth::guard('web')->user()->freeze_project == 'freeze'): ?> disabled-link <?php endif; ?>"> <?php echo e(__('Edit Project')); ?> </a>
                                <?php else: ?>
                                    <a href="<?php echo e(route('freelancer.project.edit',$project->id)); ?>" class="btn-profile btn-bg-1 edit_info_show_hide"> <?php echo e(__('Edit Project')); ?> </a>
                                <?php endif; ?>
                            <?php else: ?>
                               <a href="<?php echo e(route('freelancer.project.edit',$project->id)); ?>" class="btn-profile btn-bg-1 edit_info_show_hide"> <?php echo e(__('Edit Project')); ?> </a>
                            <?php endif; ?>

                            <?php if(moduleExists('PromoteFreelancer')): ?>
                                <?php
                                       $current_date = \Carbon\Carbon::now()->toDateTimeString();
                                       $is_promoted = \Modules\PromoteFreelancer\Entities\PromotionProjectList::where('identity',$project->id)->where('type','project')->where('expire_date','>',$current_date)->where('payment_status','complete')->first();
                                ?>

                                <?php if(!empty($is_promoted)): ?>
                                    <button type="button" class="btn btn-outline-primary" disabled><?php echo e(__('Promoted')); ?></button>
                                <?php else: ?>
                                    <a href="javascript:void(0)"
                                       class="btn-profile btn-bg-1 open_project_promote_modal"
                                       data-bs-target="#openProjectPromoteModal"
                                       data-bs-toggle="modal"
                                       data-project-id="<?php echo e($project->id); ?>">
                                        <?php echo e(__('Promote Project')); ?>

                                    </a>
                                <?php endif; ?>
                           <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <?php if($project->project_on_off == 1 && $project->status == 1 && $project->project_approve_request == 1): ?>
                <div class="single-project project-catalogue">
                <div class="project-catalogue-flex">
                    <div class="single-project-thumb project-catalogue-thumb">
                        <a href="<?php echo e(route('project.details',['username'=>$project->project_creator?->username,'slug'=>$project->slug])); ?>">
                            <img src="<?php echo e(asset('assets/uploads/project/'.$project->image)); ?>" alt="project">
                        </a>
                    </div>
                    <div class="single-project-content project-catalogue-contents mt-0">
                        <h4 class="single-project-content-title">
                            <a href="<?php echo e(route('project.details',['username'=>$project->project_creator?->username,'slug'=>$project->slug])); ?>"> <?php echo e($project->title); ?> </a>
                        </h4>

                        <div class="project-catalogue-bottom flex-between mt-3">
                            <?php if($project->basic_discount_charge != null && $project->basic_discount_charge > 0): ?>
                                <span class="single-project-content-price"> <?php echo e(amount_with_currency_symbol($project->basic_discount_charge) ?? ''); ?> <s><?php echo e(amount_with_currency_symbol($project->basic_regular_charge) ?? ''); ?></s> </span>
                            <?php else: ?>
                                <span class="single-project-content-price"> <?php echo e(amount_with_currency_symbol($project->basic_regular_charge) ?? ''); ?></span>
                            <?php endif; ?>
                            <div class="single-project-delivery">
                            <span class="single-project-delivery-icon">
                                <i class="fa-regular fa-clock"></i> <?php echo e(__('Delivery')); ?>

                            </span>
                                <span class="single-project-delivery-days"> <?php echo e($project->basic_delivery ?? 0); ?></span>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <?php endif; ?>
        <?php endif; ?>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php echo $__env->make('frontend.profile-details.project-reject-reason', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php if(moduleExists('PromoteFreelancer')): ?>
    <?php echo $__env->make('frontend.profile-details.promotion.project-promote-modal', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/profile-details/project.blade.php ENDPATH**/ ?>