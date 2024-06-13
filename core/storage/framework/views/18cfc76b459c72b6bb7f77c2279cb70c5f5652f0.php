<div class="row g-4">
    <?php $current_date = \Carbon\Carbon::now()->toDateTimeString() ?>
    <?php if($projects->count() > 0): ?>
        <?php $__currentLoopData = $projects; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-xxl-6">
            <div class="project-category-item radius-10">
                <div class="single-project project-catalogue">
                    <div class="single-project-thumb">
                        <a href="<?php echo e(route('project.details', ['username' => $project->project_creator?->username, 'slug' => $project->slug])); ?>">
                            <img src="<?php echo e(asset('assets/uploads/project/'.$project->image) ?? ''); ?>" alt="<?php echo e($project->title ?? ''); ?>">
                        </a>
                    </div>
                    <div class="single-project-content">
                        <div class="single-project-content-top align-items-center flex-between">
                            <?php if(moduleExists('PromoteFreelancer')): ?>
                                <?php if($project->pro_expire_date >= $current_date  && $project->is_pro === 'yes'): ?>
                                    <?php if($is_pro == 1): ?>
                                        
                                        <?php Session::put('is_pro',$is_pro) ?>
                                        <div class="single-project-content-review pro-profile-badge">
                                            <div class="pro-icon-background">
                                                <i class="fas fa-check"></i>
                                            </div>
                                            <small><?php echo e(__('Pro')); ?></small>
                                        </div>
                                    <?php endif; ?>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php echo project_rating($project->id); ?>

                        </div>
                        <h4 class="single-project-content-title">
                            <a href="<?php echo e(route('project.details', ['username' => $project->project_creator?->username, 'slug' => $project->slug])); ?>"> <?php echo e($project->title); ?> </a>
                        </h4>
                    </div>
                    <div class="single-project-bottom flex-between">
                        <span class="single-project-content-price">
                            <?php if($project->basic_discount_charge): ?>
                                <?php echo e(float_amount_with_currency_symbol($project->basic_discount_charge)); ?>

                                <s><?php echo e(float_amount_with_currency_symbol($project->basic_regular_charge)); ?></s>
                            <?php else: ?>
                                <?php echo e(float_amount_with_currency_symbol($project->basic_regular_charge)); ?>

                            <?php endif; ?>
                        </span>
                        <div class="single-project-delivery">
                            <span class="single-project-delivery-icon"> <i class="fa-regular fa-clock"></i><?php echo e(__('Delivery')); ?></span>
                            <span class="single-project-delivery-days"> <?php echo e(__($project->basic_delivery)); ?> </span>
                        </div>
                    </div>
                    <div class="project-category-item-bottom profile-border-top">
                        <div class="project-category-item-bottom-flex flex-between align-items-center">
                            <div class="project-category-right-flex flex-btn">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.frontend.bookmark','data' => ['identity' => $project->id,'type' => 'project']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('frontend.bookmark'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['identity' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($project->id),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('project')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                            <div class="project-category-item-btn flex-btn">
                                <?php if(moduleExists('SecurityManage')): ?>
                                    <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->freeze_order_create == 'freeze'): ?>
                                        <a href="#" class="btn-profile btn-outline-1 <?php if(Auth::guard('web')->user()->freeze_order_create == 'freeze'): ?> disabled-link <?php endif; ?>"> <?php echo e(__('Order Now')); ?> </a>
                                    <?php else: ?>
                                        <a href="<?php echo e(route('project.details', ['username' => $project->project_creator?->username, 'slug' => $project->slug])); ?>" class="btn-profile btn-outline-1"> <?php echo e(__('Order Now')); ?> </a>
                                    <?php endif; ?>
                                <?php else: ?>
                                    <a href="<?php echo e(route('project.details', ['username' => $project->project_creator?->username, 'slug' => $project->slug])); ?>" class="btn-profile btn-outline-1"> <?php echo e(__('Order Now')); ?> </a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <div class="col-12">
            <div class="notFoundParent project-category-item radius-10 text-center">
                <div class="notFound-wrapper">
                    <div class="notFoundThumb">
                        <img src="<?php echo e(asset('assets/static/img/no-jobs-projects/no-project.svg')); ?>" alt="">
                    </div>
                    <div class="notFound-contents mt-3">
                        <h4 class="notFoundTitle"><?php echo e(__('No Projects')); ?></h4>
                        <p class="notFoundPara mt-3"><?php echo e(__("Sorry, We couldn't find any projects in this category try checking on other categories")); ?></p>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.pagination.laravel-paginate','data' => ['allData' => $projects]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pagination.laravel-paginate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['allData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($projects)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/frontend/pages/subcategory-projects/search-subcategory-result.blade.php ENDPATH**/ ?>