<div class="single-shop-left bg-white radius-10">
    <div class="single-shop-left-title open">
        <h5 class="title blog-category-title"> <?php echo e(__('Categories')); ?> (<?php echo e($categories->count()); ?>)</h5>
        <div class="single-shop-left-inner mt-4">
            <div class="single-shop-left-select">
                <a href="" data-blog-category="all" class="jobFilter-about-clients filter_blog active">
                    <div class="jobFilter-about-clients-single flex-between">
                        <span class="jobFilter-about-clients-para"><?php echo e(__('All')); ?></span>
                        <span class="jobFilter-about-clients-completed">(<?php echo e($blogs->total()); ?>)</span>
                    </div>
                </a>
                <?php $__currentLoopData = $categories; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a href="" data-blog-category="<?php echo e($category->id); ?>" class="jobFilter-about-clients filter_blog">
                        <div  class="jobFilter-about-clients-single flex-between">
                            <span class="jobFilter-about-clients-para"><?php echo e($category->category); ?></span>
                            <span class="jobFilter-about-clients-completed">(<?php echo e($category->blogs_count); ?>)</span>
                        </div>
                    </a>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>
    </div>
</div>

<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/Modules/Blog/Resources/views/frontend/blogs/sidebar.blade.php ENDPATH**/ ?>