<div class="row g-4">
    <?php if($blogs->count() > 0): ?>
        <?php $__currentLoopData = $blogs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $blog): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-xxl-6">
                <div class="project-category-item radius-10">
                    <div class="single-project project-catalogue">
                        <div class="single-project-thumb">
                            <a href="<?php echo e(route('blog.details',$blog->slug)); ?>">
                                <?php echo render_image_markup_by_attachment_id($blog->image); ?>

                            </a>
                        </div>
                        <div class="single-project-content">
                            <h4 class="single-project-content-title">
                                <a href="<?php echo e(route('blog.details',$blog->slug)); ?>"> <?php echo e($blog->title); ?> </a>
                            </h4>
                        </div>
                        <div class="project-category-item-bottom profile-border-top">
                            <div class="project-category-item-bottom-flex flex-between align-items-center">
                                <div class="project-category-right-flex flex-btn">
                                    <p><?php echo e($blog->created_at->toFormattedDateString()); ?></p>
                                </div>
                                <div class="project-category-item-btn flex-btn">
                                    <a href="<?php echo e(route('blog.details',$blog->slug)); ?>" class="btn-profile btn-outline-1"> <?php echo e(__('View Details')); ?> </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php else: ?>
        <div class="col-12">
            <h4 class="text-danger text-center"><?php echo e(__('No Blogs Found')); ?></h4>
        </div>
    <?php endif; ?>
</div>
<?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.pagination.laravel-paginate','data' => ['allData' => $blogs]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('pagination.laravel-paginate'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['allData' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute($blogs)]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?><?php /**PATH /home/doptorr/public_html/core/Modules/Blog/Resources/views/frontend/blogs/search-result.blade.php ENDPATH**/ ?>