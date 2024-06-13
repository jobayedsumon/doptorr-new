<div class="contact-area section-bg-2 pat-100 pab-100" data-padding-top="<?php echo e($padding_top ?? ''); ?>" data-padding-bottom="<?php echo e($padding_bottom ?? ''); ?>" style="background-color:<?php echo e($section_bg ?? ''); ?>">
    <div class="container">
            <div class="row gy-5 justify-content-between flex-column-reverse flex-lg-row">
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h4 class="contact-question-top-title"><?php echo e($contact_info_heading ?? __('Contact Info')); ?></h4>
                        <p class="contact-question-top-para mt-2"><?php echo e($contact_info_des ?? ''); ?></p>
                        <div class="contact-info-inner mt-4">
                            <?php $__currentLoopData = $repeater_data['icon_'] ?? []; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=> $icon): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="contact-info-item">
                                <div class="contact-info-item-flex">
                                    <div class="contact-info-item-icon"><i class="<?php echo e($icon); ?>"></i></div>
                                    <div class="contact-info-item-contents">
                                        <h6 class="contact-info-item-title"><?php echo e($repeater_data['title_'][$key] ?? ''); ?></h6>
                                        <p class="contact-info-item-para"><span><?php echo e($repeater_data['description_'][$key] ?? ''); ?></span></p>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="contact-question">
                        <h4 class="contact-question-top-title"><?php echo e($heading ?? ''); ?></h4>
                        <p class="contact-question-top-para mt-2"><?php echo e($contact_form_des ?? ''); ?></p>
                        <div class="contact-question-search contact-question-search-padding mt-4">
                            <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.validation.error','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('validation.error'); ?>
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
                            <div class="contact-question-search-form custom-form mt-4">
                                <?php echo $form_details; ?>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
</div>
<?php /**PATH /home/doptorr/public_html/core/app/Providers/../../plugins/PageBuilder/views/contact-page/form.blade.php ENDPATH**/ ?>