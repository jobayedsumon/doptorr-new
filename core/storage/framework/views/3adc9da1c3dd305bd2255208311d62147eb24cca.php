<!-- Project Introduction Start -->
<div class="setup-wrapper-contents active">
    <div class="create-project-wrapper-item">
        <div class="create-project-wrapper-item-top profile-border-bottom">
            <h4 class="create-project-wrapper-title"><?php echo e(__('Project Intro')); ?></h4>
        </div>
        <div class="create-project-intro-contents">
            <div class="create-project-intro-contents-form custom-form">
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.category-dropdown','data' => ['title' => __('Select Category'),'name' => 'category','id' => 'category','class' => 'form-control category_select2']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.category-dropdown'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Select Category')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('category'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('category'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form-control category_select2')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>

                <div class="single-input">
                    <label class="label-title"><?php echo e(__('Select Subcategory')); ?></label>
                    <select name="subcategory[]" id="subcategory" class="form-control get_subcategory subcategory_select2" multiple>
                    </select>
                    <span id="subcategory_info"></span>
                </div>


               <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['title' => __('What are you offering to clients?'),'type' => 'text','id' => 'project_title','name' => 'project_title','divClass' => 'mb-0','class' => 'form--control','value' => old('project_title'),'placeholder' => __('You’ll get a Mobile application designed')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('What are you offering to clients?')),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('text'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('project_title'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('project_title'),'divClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('mb-0'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form--control'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('project_title')),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('You’ll get a Mobile application designed'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <span id="project_title_char_length_check"></span>
                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.text','data' => ['title' => __('Slug'),'type' => 'text','id' => 'slug','name' => 'slug','value' => old('slug'),'divClass' => 'mb-0','class' => 'form--control d-none','labelClass' => 'd-none display_label_title','placeholder' => __('Slug')]] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.text'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Slug')),'type' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('text'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('slug'),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('slug'),'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('slug')),'divClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('mb-0'),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('form--control d-none'),'labelClass' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('d-none display_label_title'),'placeholder' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Slug'))]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <div class="mb-4">
                    <strong><?php echo e(__('Slug:')); ?></strong>
                    <span class="full-slug-show"></span>
                    <span class="edit_project_slug"><i class="fas fa-edit"></i></span>
                </div>


                <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.form.summernote','data' => ['title' => __('Write a description about your service'),'name' => 'project_description','id' => 'project_description','rows' => '10','cols' => 30,'value' => old('project_description'),'class' => 'description']] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('form.summernote'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(Illuminate\View\AnonymousComponent::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes(['title' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(__('Write a description about your service')),'name' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('project_description'),'id' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('project_description'),'rows' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('10'),'cols' => 30,'value' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute(old('project_description')),'class' => \Illuminate\View\Compilers\BladeCompiler::sanitizeComponentAttribute('description')]); ?>
<?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4)): ?>
<?php $component = $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4; ?>
<?php unset($__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4); ?>
<?php endif; ?>
                <span id="project_description_char_length_check"></span>

            </div>
        </div>
    </div>
</div>
<!-- Project Introduction Ends -->
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/user/freelancer/project/create/project-introduction.blade.php ENDPATH**/ ?>