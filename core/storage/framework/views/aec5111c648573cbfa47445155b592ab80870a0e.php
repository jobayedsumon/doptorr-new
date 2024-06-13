<div class="shop-sidebar-content">
    <div class="shop-close-content">
        <div class="shop-close-content-icon"> <i class="fas fa-times"></i> </div>
        <div class="single-shop-left bg-white radius-10">
            <div class="single-shop-left-filter">
                <div class="single-shop-left-filter-flex flex-between">
                    <div class="single-shop-left-filter-title">
                        <h5 class="title">
                            <?php echo e(__('Jobs Filter')); ?>

                        </h5>
                    </div>
                    <a href="javascript:void(0)" class="single-shop-left-filter-reset" id="subcategory_job_filter_reset"><?php echo e(__('Reset Filter')); ?></a>
                </div>
            </div>
        </div>
        <div class="single-shop-left bg-white radius-10 mt-4">
            <div class="single-shop-left-title open">
                <h5 class="title"> <?php echo e(__('Search by Country')); ?> </h5>
                <div class="single-shop-left-inner margin-top-15">
                    <div class="single-shop-left-select">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.filter-project-job-country','data' => ['innerTitle' => __('Select'),'name' => 'category','id' => 'country']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.filter-project-job-country'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['innerTitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Select')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('category'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('country')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.filter-job-type','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.filter-job-type'); ?>
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

        <div class="single-shop-left bg-white radius-10 mt-4">
            <div class="single-shop-left-title open">
                <h5 class="title"><?php echo e(__('Experience Level')); ?></h5>
                <div class="single-shop-left-inner margin-top-15">
                    <div class="single-shop-left-select">
                        <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.experience-level-dropdown','data' => ['class' => 'form-control','name' => 'level','id' => 'level']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.experience-level-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('level'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('level')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-shop-left bg-white radius-10 mt-4">
            <div class="single-shop-left-title open">
                <h5 class="title"><?php echo e(__('Budget')); ?></h5>
                <div class="single-shop-left-inner margin-top-15">
                    <div class="price-range-input">
                        <div class="price-range-input-flex">
                            <div class="price-range-input-min">
                                <input type="number" placeholder="<?php echo e(__('Min')); ?>" name="min_price" id="min_price">
                            </div>
                            <span class="price-range-separator">-</span>
                            <div class="price-range-input-min">
                                <input type="number" placeholder="<?php echo e(__('Max')); ?>" name="max_price" id="max_price">
                            </div>
                        </div>
                        <div class="price-range-input-btn">
                            <button class="btn-profile btn-outline-1" id="set_price_range"><i class="fas fa-angle-right"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="single-shop-left bg-white radius-10 mt-4">
            <div class="single-shop-left-title open">
                <h5 class="title"><?php echo e(__('Job Lengths')); ?></h5>
                <div class="single-shop-left-inner margin-top-15">
                    <div class="single-shop-left-select">
                        <select class="form-control" name="duration" id="duration">
                            <option value=""><?php echo e(__('Select')); ?></option>
                            <option value="1 Days"><?php echo e(__('1 Days')); ?></option>
                            <option value="1 Days"><?php echo e(__('2 Days')); ?></option>
                            <option value="1 Days"><?php echo e(__('3 Days')); ?></option>
                            <option value="less than a week"><?php echo e(__('Less than a week')); ?></option>
                            <option value="less than a month"><?php echo e(__('Less than a month')); ?></option>
                            <option value="less than 2 month"><?php echo e(__('Less than 2 month')); ?></option>
                            <option value="less than 3 month"><?php echo e(__('Less than 3 month')); ?></option>
                            <option value="More than 3 month"><?php echo e(__('More than 2 month')); ?></option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/pages/subcategory-jobs/sidebar.blade.php ENDPATH**/ ?>