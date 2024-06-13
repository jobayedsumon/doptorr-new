<?php $__env->startSection('title', __('Import States')); ?>
<?php $__env->startSection('style'); ?>
    <?php if (isset($component)) { $__componentOriginalc254754b9d5db91d5165876f9d051922ca0066f4 = $component; } ?>
<?php $component = Illuminate\View\AnonymousComponent::resolve(['view' => 'components.data-table.data-table-css','data' => []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('data-table.data-table-css'); ?>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="dashboard__body">
        <div class="row">
            <div class="col-lg-8">
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
                <div class="customMarkup__single">
                    <div class="customMarkup__single__item">
                        <h4 class="customMarkup__single__title"><?php echo e(__('Import State (only csv file)')); ?></h4>
                        <div class="customMarkup__single__inner mt-4">
                            <?php if(empty($import_data)): ?>
                                <form action="<?php echo e(route('admin.state.import.csv.update.settings')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <div class="form-group">
                                        <label for="#" class="label-title"><?php echo e(__('File')); ?></label>
                                        <input type="file" name="csv_file" accept=".csv" class="form-control" required>
                                        <div class="info-text"><?php echo e(__('only csv file are allowed with separate by (,) comma.')); ?></div>
                                    </div>
                                    <button type="submit" class="btn btn-primary loading-btn"><?php echo e(__('Submit')); ?></button>
                                </form>
                            <?php else: ?>
                                <?php
                                    $option_markup = '';
                                        foreach(current($import_data) as $map_item ){
                                            $option_markup .= '<option value="'.trim($map_item).'">'.$map_item.'</option>';
                                        }
                                ?>

                                <form action="<?php echo e(route('admin.state.import.database')); ?>" method="post" enctype="multipart/form-data">
                                    <?php echo csrf_field(); ?>
                                    <table class="table table-striped">
                                        <thead>
                                        <th style="width: 200px"><?php echo e(__('Field Name')); ?></th>
                                        <th><?php echo e(__('Set Field')); ?></th>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <td><h6><?php echo e(__('Country')); ?></h6></td>
                                            <?php $all_countries = \Modules\CountryManage\Entities\Country::all_countries(); ?>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control" name="country_id" id="country_id">
                                                        <option value=""><?php echo e(__('Select Country')); ?></option>
                                                        <?php $__currentLoopData = $all_countries; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                                            <option value="<?php echo e($country->id); ?>"><?php echo e($country->country); ?></option>
                                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                    </select>
                                                </div>
                                                <p class="text-info"><?php echo e(__('Select your states country')); ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h6><?php echo e(__('State')); ?></h6></td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control mapping_select">
                                                        <option value=""><?php echo e(__('Select Field')); ?></option>
                                                        <?php echo $option_markup; ?>

                                                    </select>
                                                    <input type="hidden" name="state">
                                                </div>
                                                <p class="text-info"><?php echo e(__('Select state and only unique states added automatically according to the selected country.')); ?></p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td><h6><?php echo e(__('Status')); ?></h6></td>
                                            <td>
                                                <div class="form-group">
                                                    <select class="form-control mapping_select">
                                                        <option value="1"><?php echo e(__('Publish')); ?></option>
                                                        <option value="0"><?php echo e(__('Draft')); ?></option>
                                                    </select>
                                                    <input type="hidden" name="status" value="1">
                                                </div>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-primary loading-btn"><?php echo e(__('Import')); ?></button>
                                </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

    <script>
        (function($){
            "use strict";
            $(document).ready(function(){

                $(document).on('click','.loading-btn',function (){
                    $(this).append('<i class="ml-2 fas fa-spinner fa-spin"></i>')
                });

                $(document).on('change','.mapping_select',function (){

                    $('.mapping_select option').attr('disabled',false);
                    $(this).next('input').val($(this).val());
                    var allValue = $('.mapping_select');
                    $.each(allValue,function (index,item){
                        $('.mapping_select option[value="'+$(this).val()+'"]').attr('disabled',true);
                    });

                })

            });
        }(jQuery));
    </script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.layout.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/doptorr/public_html/core/Modules/CountryManage/Resources/views/state/import-state.blade.php ENDPATH**/ ?>