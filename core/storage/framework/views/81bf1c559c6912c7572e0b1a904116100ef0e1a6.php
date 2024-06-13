<?php if($all_proposals->total() < 1): ?>
    <div class="myOrder-single bg-white padding-20 radius-10">
        <div class="myOrder-single-item">
            <h4 class="text-danger"><?php echo e(__('No Proposals Found')); ?></h4>
        </div>
    </div>
<?php else: ?>
    <?php $__currentLoopData = $all_proposals; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proposal): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="myOrder-single bg-white padding-20 radius-10">
            <div class="myOrder-single-item">
                <div class="myOrder-single-flex">
                    <div class="myOrder-single-content">
                        <span class="myOrder-single-content-id">#000<?php echo e($proposal->id); ?></span>
                        <div class="myOrder-single-content-btn flex-btn mt-3">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.job.job-proposal-view','data' => ['isView' => $proposal->is_view]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('job.job-proposal-view'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isView' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($proposal->is_view)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            <div class="job-proposal-btn-item">
                                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.job.hire-short-list-check','data' => ['isHired' => $proposal->is_hired,'isShortListed' => $proposal->is_short_listed]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('job.hire-short-list-check'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['isHired' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($proposal->is_hired),'isShortListed' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($proposal->is_short_listed)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                            </div>
                            <?php if($proposal->is_interview_take == 1): ?>
                                <span class="shortlisted-item seen"><?php echo e(__('Interviewed')); ?></span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <span class="myOrder-single-content-time"><?php echo e($proposal->created_at->diffForHumans()); ?> </span>
                </div>
            </div>
            <div class="myOrder-single-item">
                <div class="myOrder-single-block">
                    <div class="myOrder-single-block-item">
                        <div class="myOrder-single-block-item-content">
                            <span class="myOrder-single-block-subtitle"><?php echo e(__('Offer Price')); ?></span>
                            <h6 class="myOrder-single-block-title mt-2"><?php echo e(float_amount_with_currency_symbol($proposal->amount)); ?>

                            </h6>
                        </div>
                    </div>
                    <?php if($proposal->duration): ?>
                        <div class="myOrder-single-block-item">
                            <div class="myOrder-single-block-item-content">
                                <span class="myOrder-single-block-subtitle"><?php echo e(__('Delivery Time')); ?></span> <br>
                                <h6 class="myOrder_single__block__title mt-2">
                                    <?php echo e($proposal->duration); ?>

                                </h6>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="myOrder-single-block-item">
                        <div class="myOrder-single-block-item-content">
                            <span class="myOrder-single-block-subtitle"><?php echo e(__('Create Date')); ?></span><br>
                            <h6 class="myOrder_single__block__title mt-2">
                                <?php echo e($proposal->created_at->toFormattedDateString() ?? ''); ?>

                            </h6>
                        </div>
                    </div>

                    <?php if($proposal->attachment): ?>
                        <div class="myJob-wrapper-single">
                            <div class="myJob-wrapper-single-contents">
                                <a href="<?php echo e(asset('assets/uploads/jobs/proposal/'.$proposal->attachment)); ?>" download class="single-refundRequest-item-uploads">
                                    <i class="fa-solid fa-cloud-arrow-down"></i>
                                    <?php echo e(__('Download Attachment')); ?>

                                </a>
                            </div>
                        </div>
                    <?php endif; ?>

                </div>
                <p class="mt-4"><?php echo e(Str::limit($proposal->cover_letter,250 ?? '')); ?></p>
            </div>
            <div class="myOrder-single-item">
                <div class="myOrder-single-flex flex-between">
                    <div class="btn-wrapper flex-btn">
                        <button
                           class="btn-profile btn-outline-1 cover_letter_details"
                           data-bs-target="#CoverLetterModal"
                           data-bs-toggle="modal"
                           data-cover-letter="<?php echo e($proposal->cover_letter); ?>"
                        >
                            <?php echo e(__('Proposal Details')); ?>

                        </button>
                    </div>
                    <div class="btn-wrapper flex-btn">
                        <a href="<?php echo e(route('job.details', ['username' => $proposal?->job?->job_creator?->username, 'slug' => $proposal?->job->slug])); ?>"
                           class="btn-profile btn-bg-1"
                           target="_blank">
                            <?php echo e(__('Job Details')); ?>

                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.pagination.laravel-paginate','data' => ['allData' => $all_proposals]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pagination.laravel-paginate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['allData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($all_proposals)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
<?php endif; ?>
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/user/freelancer/proposal/search-result.blade.php ENDPATH**/ ?>