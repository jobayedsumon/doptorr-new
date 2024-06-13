<div class="profile-wrapper-item add-experience-parent radius-10" id="display_user_experience_data">
    <div class="profile-wrapper-item-flex flex-between align-items-center profile-border-bottom">
        <h4 class="profile-wrapper-item-title"><?php echo e(get_static_option('experience_inner_title') ?? __('Experiences')); ?>  </h4>
        <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type == 2 && Auth::guard('web')->user()->username==$username): ?>
           <div class="profile-wrapper-item-plus add-experience add_experience_show_hide"><i class="fas fa-plus"></i></div>
        <?php endif; ?>
    </div>

    <?php $__currentLoopData = $experiences; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $experience): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="setup-wrapper-experience-details">
            <div class="setup-wrapper-experience-details-flex">
                <div class="setup-wrapper-experience-details-left">
                    <h5 class="setup-wrapper-experience-details-title"> <?php echo e($experience->title); ?> </h5>
                    <p class="setup-wrapper-experience-details-subtitle"> <?php echo e($experience->organization); ?> </p>
                </div>
                <?php if(Auth::guard('web')->check() && Auth::guard('web')->user()->user_type == 2 && Auth::guard('web')->user()->username==$username): ?>
                    <a href="javascript:void(0)" class="setup-wrapper-experience-details-edit btn-profile btn-hover-danger delete_experience delete_experience_show_hide" data-id="<?php echo e($experience->id); ?>">
                        <i class="fa-regular fa-trash-can"></i>
                    </a>
                    <a href="javascript:void(0)"
                       class="setup-wrapper-experience-details-edit experience-click edit_single_experience edit_experience_show_hide"
                       data-id="<?php echo e($experience->id); ?>"
                       data-title="<?php echo e($experience->title); ?>"
                       data-organization="<?php echo e($experience->organization); ?>"
                       data-address="<?php echo e($experience->address); ?>"
                       data-short_description="<?php echo e($experience->short_description); ?>"
                       data-country_id="<?php echo e($experience->country_id); ?>"
                       data-state_id="<?php echo e($experience->state_id); ?>"
                       data-start_date="<?php echo e(Carbon\Carbon::parse($experience->start_date)->toFormattedDateString()); ?>"
                       data-end_date="<?php echo e($experience->end_date ? Carbon\Carbon::parse($experience->end_date)->toFormattedDateString() : ''); ?>"
                    > <i class="fa-regular fa-pen-to-square"></i>
                    </a>
                <?php endif; ?>
            </div>
            <ul class="setup-wrapper-experience-details-list">
                <li class="setup-wrapper-experience-details-list-item">
                        <span class="list-inner">
                            <i class="fa-solid fa-calendar-days"></i>
                            <span class="list-inner-para"><?php echo e(__('Duration')); ?></span>
                        </span>
                    <span class="list-inner">
                        <span class="list-inner-para">
                            <?php echo e(Carbon\Carbon::parse($experience->start_date)->toFormattedDateString()); ?> - <a
                                href="javascript:void(0)"><?php echo e($experience->end_date ? Carbon\Carbon::parse($experience->end_date)->toFormattedDateString() : __('Current Position')); ?> </a>
                        </span>
                    </span>
                </li>
                <li class="setup-wrapper-experience-details-list-item">
                        <span class="list-inner"> <i class="fa-solid fa-location-dot"></i> <span
                                class="list-inner-para"><?php echo e(__('Location')); ?></span> </span>
                    <span class="list-inner"> <span
                            class="list-inner-para"><?php echo e($experience->address); ?></span></span>
                </li>
            </ul>
       </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>


<div class="popup-fixed add-experience-popup">
    <div class="popup-contents">
        <span class="popup-contents-close popup-close"> <i class="fas fa-times"></i> </span>
        <h2 class="popup-contents-title"><?php echo e(get_static_option('experience_modal_title') ?? __('Work experience')); ?></h2>
        <p class="popup-contents-para"><?php echo e(__('Fill the form below to add your work experience')); ?></p>
        <div class="popup-contents-form custom-form">
            <form action="#" name="addExperienceForm">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['title' => __('Title'),'type' => __('text'),'name' => 'experience_title','id' => 'experience_title','divClass' => 'mb-0','placeholder' => __('Front-End Developer'),'value' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Title')),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('text')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('experience_title'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('experience_title'),'divClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('mb-0'),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Front-End Developer')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['title' => __('Organization'),'type' => __('text'),'name' => 'organization','id' => 'organization','divClass' => 'mb-0','placeholder' => __('Xgenious'),'value' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Organization')),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('text')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('organization'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('organization'),'divClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('mb-0'),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Xgenious')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['title' => __('Address'),'type' => __('text'),'name' => 'address','id' => 'address','divClass' => 'mb-0','placeholder' => __('8502 Preston Rd. Ingle'),'value' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Address')),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('text')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('address'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('address'),'divClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('mb-0'),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('8502 Preston Rd. Ingle')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.textarea','data' => ['title' => __('Short Description'),'name' => 'short_description','id' => 'short_description','divClass' => 'mb-0','cols' => '30','rows' => '3','placeholder' => __('I am a professional develop...')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Short Description')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('short_description'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('short_description'),'divClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('mb-0'),'cols' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('30'),'rows' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('3'),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('I am a professional develop...'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <div class="single-flex-input mt-0">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['title' => __('Start date'),'type' => __('text'),'name' => 'start_date','id' => 'start_date','divClass' => 'mb-0','class' => 'form-control date-picker','value' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Start date')),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('text')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('start_date'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('start_date'),'divClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('mb-0'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control date-picker'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['title' => __('End date'),'type' => __('text'),'name' => 'end_date','id' => 'end_date','divClass' => 'mb-0','class' => 'form-control date-picker','value' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('End date')),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('text')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('end_date'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('end_date'),'divClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('mb-0'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control date-picker'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.right-info','data' => ['infoTitle' => __('info:'),'info' => __('If you currently working here please leave this field empty')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.right-info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['infoTitle' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('info:')),'info' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('If you currently working here please leave this field empty'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </form>
        </div>
        <div class="popup-contents-btn flex-btn justify-content-end profile-border-top">
            <a href="javascript:void(0)" class="btn-profile btn-outline-gray btn-hover-danger popup-close"> <i class="las la-arrow-left"></i><?php echo e(__('Cancel')); ?></a>
            <a href="javascript:void(0)" class="btn-profile btn-bg-1 add_experience"><?php echo e(__('Save')); ?></a>
        </div>
    </div>
</div>



<div class="popup-overlay"></div>
<div class="popup-fixed experience-popup">
    <div class="popup-contents">
        <span class="popup-contents-close popup-close"> <i class="fas fa-times"></i> </span>
        <h2 class="popup-contents-title"> <?php echo e(get_static_option('experience_edit_modal_title') ?? __('Edit Work experience')); ?> </h2>
        <p class="popup-contents-para"> <?php echo e(__('Fill the form below to add your work experience')); ?> </p>
        <div class="popup-contents-form custom-form">
            <form action="#">
                <input type="hidden" name="edit_id" id="edit_id">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['title' => __('Title'),'type' => __('text'),'name' => 'edit_experience_title','id' => 'edit_experience_title','placeholder' => __('Front-End Developer'),'value' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Title')),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('text')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('edit_experience_title'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('edit_experience_title'),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Front-End Developer')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['title' => __('Organization'),'type' => __('text'),'name' => 'edit_organization','id' => 'edit_organization','placeholder' => __('Xgenious'),'value' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Organization')),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('text')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('edit_organization'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('edit_organization'),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Xgenious')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['title' => __('Address'),'type' => __('text'),'name' => 'edit_address','id' => 'edit_address','placeholder' => __('8502 Preston Rd. Ingle'),'value' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Address')),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('text')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('edit_address'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('edit_address'),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('8502 Preston Rd. Ingle')),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.textarea','data' => ['title' => __('Short Description'),'name' => 'edit_short_description','id' => 'edit_short_description','cols' => '30','rows' => '3','placeholder' => __('I am a professional develop...')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.textarea'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Short Description')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('edit_short_description'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('edit_short_description'),'cols' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('30'),'rows' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('3'),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('I am a professional develop...'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <div class="single-flex-input">
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['title' => __('Start date'),'type' => __('text'),'name' => 'edit_start_date','id' => 'edit_start_date','class' => 'form-control date-picker','value' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Start date')),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('text')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('edit_start_date'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('edit_start_date'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control date-picker'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['title' => __('End date'),'type' => __('text'),'name' => 'edit_end_date','id' => 'edit_end_date','class' => 'form-control date-picker','value' => '']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('End date')),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('text')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('edit_end_date'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('edit_end_date'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control date-picker'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                </div>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.right-info','data' => ['info' => __('If you currently working here please leave this field empty')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.right-info'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['info' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('If you currently working here please leave this field empty'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
            </form>
        </div>
        <div class="popup-contents-btn flex-btn justify-content-end profile-border-top">
            <a href="javascript:void(0)" class="btn-profile btn-outline-gray btn-hover-danger popup-close"> <i class="las la-arrow-left"></i><?php echo e(__('Cancel')); ?> </a>
            <a href="javascript:void(0)" class="btn-profile btn-bg-1 update_single_experience"> <?php echo e(__('Update')); ?> </a>
        </div>
    </div>
</div>

<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/frontend/profile-details/experience.blade.php ENDPATH**/ ?>