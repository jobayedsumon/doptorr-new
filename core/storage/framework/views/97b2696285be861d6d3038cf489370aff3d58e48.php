<?php if($projects_or_jobs->count() >= 1): ?>
    <?php if($search_type == 'project'): ?>
        <div class="global-search-result-inner">
            <?php $__currentLoopData = $projects_or_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $project): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('project.details', ['username' => $project?->project_creator?->username, 'slug' => $project->slug])); ?>"
                   class="global-search-result-inner-item">
                    <div class="global-search-result-inner-item-thumb">
                        <img src="<?php echo e(asset('assets/uploads/project/' . $project->image) ?? ''); ?>"
                             alt="<?php echo e($project->image ?? ''); ?>">
                    </div>
                    <div class="global-search-result-inner-item-contents">
                        <h6 class="global-search-result-inner-title"><?php echo e($project->title); ?></h6>
                        <span class="global-search-result-inner-contents mt-1">
                            <span
                                    class="global-search-result-inner-price"><?php echo e(float_amount_with_currency_symbol($project->basic_regular_charge)); ?></span>
                        </span>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
    <?php if($search_type == 'job'): ?>
        <div class="global-search-result-inner">
            <?php $__currentLoopData = $projects_or_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $job): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="global-search-result-inner-item global-job-item">
                    <div class="global-search-result-inner-item-contents">
                        <h6 class="global-search-result-inner-title">
                            <a href="<?php echo e(route('job.details', ['username' => $job?->job_creator?->username, 'slug' => $job->slug])); ?>"><?php echo e($job->title); ?></a>
                        </h6>
                        <span class="global-search-result-inner-contents mt-1">
                            <span class="global-search-result-inner-price"><?php echo e(float_amount_with_currency_symbol($job->budget)); ?></span>
                        </span>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>

    <?php if($search_type == 'talent'): ?>
        <div class="global-search-result-inner">
            <?php $__currentLoopData = $projects_or_jobs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $talent): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <a href="<?php echo e(route('freelancer.profile.details', $talent->username)); ?>"
                   class="global-search-result-inner-item">
                    <div class="global-search-result-inner-item-thumb">
                        <?php if($talent->image): ?>
                            <img src="<?php echo e(asset('assets/uploads/profile/' . $talent->image) ?? ''); ?>" alt="<?php echo e($talent->image ?? ''); ?>">
                        <?php else: ?>
                            <img src="<?php echo e(asset('assets/static/img/author/author.jpg')); ?>" alt="talent-image">
                        <?php endif; ?>
                    </div>
                    <div class="global-search-result-inner-item-contents">
                        <h6 class="global-search-result-inner-title"><?php echo e($talent->fullname); ?></h6>
                        <span class="global-search-result-inner-contents mt-1">
                            <span class="global-search-result-inner-price"><?php echo e($talent?->user_introduction->title); ?></span>
                        </span>
                    </div>
                </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    <?php endif; ?>
<?php else: ?>
    <div class="">
        <p class="text-danger"><?php echo e(__('Nothing found')); ?></p>
    </div>
<?php endif; ?>
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/pages/frontend-home-job-search-result.blade.php ENDPATH**/ ?>