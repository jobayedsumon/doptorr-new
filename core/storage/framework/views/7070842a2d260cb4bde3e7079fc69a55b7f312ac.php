<!-- Package & Charge Start -->
<div class="setup-wrapper-contents">
    <div class="create-project-wrapper-item">
        <div class="create-project-wrapper-item-top profile-border-bottom">
            <h4 class="create-project-wrapper-title"> <?php echo e(__('Package & Charge')); ?> </h4>
            <div class="custom_switch_wrapper">
                <label class="custom_switch">
                    <input class="custom-switch" type="checkbox" name="offer_packages_available_or_not" id="offer_packages_available_or_not" <?php if($project_details->offer_packages_available_or_not != 0): echo 'checked'; endif; ?> value="1">
                    <span class="switch-label slider round" for="offer_packages_available_or_not"></span>
                </label>
                <span><strong><?php echo e(__('info:')); ?></strong> <?php echo e(__('offer package enable disable')); ?></span>
            </div>
        </div>
        <div class="package-contents">
            <div class="package-table">

                <table class="table table-bordered table-responsive create_project_table">
                    <thead>
                    <tr>
                        <th class="package-head">
                        </th>
                        <th class="package-head">
                            <div class="package-head-flex flex-between align-items-center">
                                <span class="package-head-title" id="basic_title"><?php echo e($project_details->basic_title ?? __('Basic')); ?></span>
                                <span class="package-head-edit"></span>
                            </div>
                        </th>
                        <th class="package-head">
                            <div class="package-head-flex flex-between align-items-center">
                                <span class="package-head-title" id="standard_title"><?php echo e($project_details->standard_title ?? __('Standard')); ?></span>
                                <span class="package-head-edit"></span>
                            </div>
                        </th>
                        <th class="package-head">
                            <div class="package-head-flex flex-between align-items-center">
                                <span class="package-head-title" id="premium_title"><?php echo e($project_details->premium_title ?? __('Premium')); ?></span>
                                <span class="package-head-edit"></span>
                            </div>
                        </th>
                    </tr>
                    </thead>
                    <tbody class="add-rows-parent">
                    <tr>
                        <th>
                            <div class="package-head-left">
                                <span class="package-head-left-title"><?php echo e(__('Revisions')); ?></span>
                            </div>
                        </th>
                        <td>
                            <div class="package-field">
                                <div class="package-select">
                                    <select class="form-control" name="basic_revision" id="basic_revision">
                                        <?php for($i = 1; $i<=10; $i++): ?>
                                            <option value="<?php echo e($i); ?>" <?php if($project_details->basic_revision == $i): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                        <option value="1000" <?php if($project_details->basic_revision == '1000'): ?> selected <?php endif; ?>><?php echo e(__('Unlimited')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="package-field">
                                <div class="package-select">
                                    <select class="form-control disabled_or_not" name="standard_revision" id="standard_revision">
                                        <?php for($i = 1; $i<=10; $i++): ?>
                                            <option value="<?php echo e($i); ?>" <?php if($project_details->standard_revision == $i): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                        <option value="1000" <?php if($project_details->standard_revision == '1000'): ?> selected <?php endif; ?>><?php echo e(__('Unlimited')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="package-field">
                                <div class="package-select">
                                    <select class="form-control disabled_or_not" name="premium_revision" id="premium_revision">
                                        <?php for($i = 1; $i<=10; $i++): ?>
                                            <option value="<?php echo e($i); ?>" <?php if($project_details->premium_revision == $i): ?> selected <?php endif; ?>><?php echo e($i); ?></option>
                                        <?php endfor; ?>
                                        <option value="1000" <?php if($project_details->premium_revision == '1000'): ?> selected <?php endif; ?>><?php echo e(__('Unlimited')); ?></option>
                                    </select>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>
                            <div class="package-head-left">
                                <span class="package-head-left-title"><?php echo e(__('Delivery time')); ?></span>
                            </div>
                        </th>
                        <td>
                            <div class="package-select">
                                <select class="form-control" name="basic_delivery" id="basic_delivery">
                                    <option value="1 Days" <?php if($project_details->basic_delivery == '1 Days'): ?> selected <?php endif; ?>><?php echo e(__('1 Days')); ?></option>
                                    <option value="2 Days" <?php if($project_details->basic_delivery == '2 Days'): ?> selected <?php endif; ?>><?php echo e(__('2 Days')); ?></option>
                                    <option value="3 Days" <?php if($project_details->basic_delivery == '3 Days'): ?> selected <?php endif; ?>><?php echo e(__('3 Days')); ?></option>
                                    <option value="Less than a week" <?php if($project_details->basic_delivery == 'Less than a week'): ?> selected <?php endif; ?>><?php echo e(__('Less than a Week')); ?></option>
                                    <option value="Less than a month" <?php if($project_details->basic_delivery == 'Less than a month'): ?> selected <?php endif; ?>><?php echo e(__('Less than a month')); ?></option>
                                    <option value="Less than 2 month" <?php if($project_details->basic_delivery == 'Less than 2 month'): ?> selected <?php endif; ?>><?php echo e(__('Less than 2 month')); ?></option>
                                    <option value="Less than 3 month" <?php if($project_details->basic_delivery == 'Less than 3 month'): ?> selected <?php endif; ?>><?php echo e(__('Less than 3 month')); ?></option>
                                    <option value="More than 3 month" <?php if($project_details->basic_delivery == 'More than 3 month'): ?> selected <?php endif; ?>><?php echo e(__('More than 3 month')); ?></option>
                                </select>
                            </div>
                        </td>
                        <td>
                            <select class="form-control disabled_or_not" name="standard_delivery" id="standard_delivery">
                                <option value="1 Days" <?php if($project_details->standard_delivery == '1 Days'): ?> selected <?php endif; ?>><?php echo e(__('1 Days')); ?></option>
                                <option value="2 Days" <?php if($project_details->standard_delivery == '2 Days'): ?> selected <?php endif; ?>><?php echo e(__('2 Days')); ?></option>
                                <option value="3 Days" <?php if($project_details->standard_delivery == '3 Days'): ?> selected <?php endif; ?>><?php echo e(__('3 Days')); ?></option>
                                <option value="Less than a week" <?php if($project_details->standard_delivery == 'Less than a week'): ?> selected <?php endif; ?>><?php echo e(__('Less than a Week')); ?></option>
                                <option value="Less than a month" <?php if($project_details->standard_delivery == 'Less than a month'): ?> selected <?php endif; ?>><?php echo e(__('Less than a month')); ?></option>
                                <option value="Less than 2 month" <?php if($project_details->standard_delivery == 'Less than 2 month'): ?> selected <?php endif; ?>><?php echo e(__('Less than 2 month')); ?></option>
                                <option value="Less than 3 month" <?php if($project_details->standard_delivery == 'Less than 3 month'): ?> selected <?php endif; ?>><?php echo e(__('Less than 3 month')); ?></option>
                                <option value="More than 3 month" <?php if($project_details->standard_delivery == 'More than 3 month'): ?> selected <?php endif; ?>><?php echo e(__('More than 3 month')); ?></option>
                            </select>
                        </td>
                        <td>
                            <select class="form-control disabled_or_not" name="premium_delivery" id="premium_delivery">
                                <option value="1 Days" <?php if($project_details->premium_delivery == '1 Days'): ?> selected <?php endif; ?>><?php echo e(__('1 Days')); ?></option>
                                <option value="2 Days" <?php if($project_details->premium_delivery == '2 Days'): ?> selected <?php endif; ?>><?php echo e(__('2 Days')); ?></option>
                                <option value="3 Days" <?php if($project_details->premium_delivery == '3 Days'): ?> selected <?php endif; ?>><?php echo e(__('3 Days')); ?></option>
                                <option value="Less than a week" <?php if($project_details->premium_delivery == 'Less than a week'): ?> selected <?php endif; ?>><?php echo e(__('Less than a Week')); ?></option>
                                <option value="Less than a month" <?php if($project_details->premium_delivery == 'Less than a month'): ?> selected <?php endif; ?>><?php echo e(__('Less than a month')); ?></option>
                                <option value="Less than 2 month" <?php if($project_details->premium_delivery == 'Less than 2 month'): ?> selected <?php endif; ?>><?php echo e(__('Less than 2 month')); ?></option>
                                <option value="Less than 3 month" <?php if($project_details->premium_delivery == 'Less than 3 month'): ?> selected <?php endif; ?>><?php echo e(__('Less than 3 month')); ?></option>
                                <option value="More than 3 month" <?php if($project_details->premium_delivery == 'More than 3 month'): ?> selected <?php endif; ?>><?php echo e(__('More than 3 month')); ?></option>
                            </select>
                        </td>
                    </tr>
                    <?php $__currentLoopData = $project_details->project_attributes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $attr): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $attr_value = str_replace(" ", "_",strtolower($attr->check_numeric_title));
                        ?>
                    <tr class="append-include append-remove">
                        <th>
                            <div class="package-head-left">
                                <div class="package-head-left-flex flex-column">
                                    <input class="form-control checkbox_or_numeric_title" type="text" name="checkbox_or_numeric_title[]" value="<?php echo e($attr->check_numeric_title ?? ''); ?>" placeholder="<?php echo e(__('Enter Title')); ?>">
                                    <div class="text-danger validation-error"></div>
                                </div>
                                <div class="package-field">
                                    <div class="package-field-select">
                                        <select class="form-control checkbox_or_numeric_select" name="checkbox_or_numeric_select[]">
                                            <option value="checkbox" <?php if($attr->type == 'checkbox'): ?> selected <?php endif; ?>><?php echo e(__('Check Boxes')); ?></option>
                                            <option value="numeric" <?php if($attr->type == 'numeric'): ?> selected <?php endif; ?>><?php echo e(__('Numeric')); ?></option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </th>

                        <td>
                            <input name="<?php echo e($attr_value); ?>[basic]" <?php if($attr->basic_check_numeric == 'on' || $attr->basic_check_numeric == 'off'): ?> type="checkbox" class="check-input" <?php else: ?> type="number" class="form-control"<?php endif; ?> <?php if($attr->basic_check_numeric == 'on'): ?> checked <?php else: ?> <?php if($attr->basic_check_numeric == 'on' || $attr->basic_check_numeric == 'off'): ?> value="on" <?php else: ?> value="<?php echo e($attr->basic_check_numeric); ?>" <?php endif; ?> <?php endif; ?>>
                        </td>
                        <td>
                            <input name="<?php echo e($attr_value); ?>[standard]" <?php if($attr->standard_check_numeric == 'on' || $attr->standard_check_numeric == 'off'): ?> type="checkbox" class="check-input disabled_or_not"  <?php else: ?> type="number" class="form-control disabled_or_not" <?php endif; ?> <?php if($attr->standard_check_numeric == 'on'): ?> value="on" checked <?php else: ?> <?php if($attr->standard_check_numeric == 'on' || $attr->standard_check_numeric == 'off'): ?> value="on" <?php else: ?> value="<?php echo e($attr->standard_check_numeric); ?>" <?php endif; ?> <?php endif; ?>>
                        </td>
                        <td>
                            <input name="<?php echo e($attr_value); ?>[premium]" <?php if($attr->premium_check_numeric == 'on' || $attr->premium_check_numeric == 'off'): ?> type="checkbox" class="check-input disabled_or_not" <?php else: ?> type="number" class="form-control disabled_or_not"<?php endif; ?> <?php if($attr->premium_check_numeric == 'on'): ?> value="on" checked <?php else: ?> <?php if($attr->premium_check_numeric == 'on' || $attr->premium_check_numeric == 'off'): ?> value="on" <?php else: ?> value="<?php echo e($attr->premium_check_numeric); ?>" <?php endif; ?> <?php endif; ?>>
                            <div class="package-button-wrapper">
                                <div class="package-field-icon add-rows">
                                    <i class="fa-solid fa-plus"></i>
                                </div>
                                <div class="package-field-icon remove-rows remove-icon">
                                    <i class="fa-solid fa-minus"></i>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <tr class="delivery_charge_amount">
                        <th>
                            <div class="package-head-left">
                                <div class="package-head-left-flex">
                                    <span class="package-head-left-title"><?php echo e(__('Charges')); ?></span>
                                </div>
                            </div>
                        </th>
                        <td>
                            <div class="package-field">
                                <div class="package-field-price">
                                    <div class="package-field-price-flex flex-between">
                                        <div class="package-field-price-main">
                                            <h5 class="package-field-price-main-title">
                                                <?php if($project_details->basic_discount_charge): ?>
                                                    <span class="basic_discount_charge"><?php echo e(float_amount_with_currency_symbol($project_details->basic_discount_charge)); ?></span>
                                                    <span class="basic_regular_charge"><s><?php echo e(float_amount_with_currency_symbol($project_details->basic_regular_charge)); ?></s></span>
                                                <?php else: ?>
                                                    <span class="basic_discount_charge"></span>
                                                    <span class="basic_regular_charge"><?php echo e(float_amount_with_currency_symbol($project_details->basic_regular_charge)); ?></span>
                                                <?php endif; ?>
                                            </h5>
                                        </div>
                                        <div class="package-field-price-edit click-edit-basic-price">
                                            <img src="<?php echo e(asset('assets/static/icons/edit_color.svg')); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="package-field">
                                <div class="package-field-price">
                                    <div class="package-field-price-flex flex-between">
                                        <div class="package-field-price-main">
                                            <h5 class="package-field-price-main-title">
                                                <?php if($project_details->standard_discount_charge): ?>
                                                    <span class="standard_discount_charge"><?php echo e(float_amount_with_currency_symbol($project_details->standard_discount_charge)); ?></span>
                                                    <span class="standard_regular_charge"><s><?php echo e(float_amount_with_currency_symbol($project_details->standard_regular_charge)); ?></s></span>
                                                <?php else: ?>
                                                    <span class="standard_discount_charge"></span>
                                                    <span class="standard_regular_charge"><?php echo e(float_amount_with_currency_symbol($project_details->standard_regular_charge)); ?></span>
                                                <?php endif; ?>
                                            </h5>
                                        </div>
                                        <div class="package-field-price-edit click-edit-standard-price">
                                            <img src="<?php echo e(asset('assets/static/icons/edit_color.svg')); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="package-field">
                                <div class="package-field-price">
                                    <div class="package-field-price-flex flex-between">
                                        <div class="package-field-price-main">
                                            <h5 class="package-field-price-main-title">
                                                <?php if($project_details->premium_discount_charge): ?>
                                                    <span class="premium_discount_charge"><?php echo e(float_amount_with_currency_symbol($project_details->premium_discount_charge)); ?></span>
                                                    <span class="premium_regular_charge"><s><?php echo e(float_amount_with_currency_symbol($project_details->premium_regular_charge)); ?></s></span>
                                                <?php else: ?>
                                                    <span class="premium_discount_charge"></span>
                                                    <span class="premium_regular_charge"><?php echo e(float_amount_with_currency_symbol($project_details->premium_regular_charge)); ?></span>
                                                <?php endif; ?>
                                            </h5>
                                        </div>
                                        <div class="package-field-price-edit click-edit-premium-price">
                                            <img src="<?php echo e(asset('assets/static/icons/edit_color.svg')); ?>" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="popup-overlay"></div>

<!-- Basic Popup start -->
<div class="popup-fixed price-popup-basic-charge">
    <div class="popup-contents">
        <span class="popup-contents-close popup-close"> <i class="fas fa-times"></i> </span>
        <h2 class="popup-contents-title"><?php echo e(__('Set Charge')); ?></h2>
        <div class="popup-contents-form custom-form">
            <div class="single-input single-input-icon">
                <label class="label-title"> <?php echo e(__('Regular Charge')); ?> </label>
                <input type="number" name="basic_regular_charge" id="basic_regular_charge" class="form--control" placeholder="00" value="<?php echo e($project_details->basic_regular_charge ?? ''); ?>">
                <span class="input-icon"> <?php echo e(get_static_option('site_global_currency') ?? ''); ?> </span>
            </div>
            <div class="single-input single-input-icon">
                <label class="label-title"><?php echo e(__('Discount Charge(Optional)')); ?></label>
                <input type="number" name="basic_discount_charge" id="basic_discount_charge" class="form--control" placeholder="00" value="<?php echo e($project_details->basic_discount_charge ?? ''); ?>">
                <span class="input-icon"> <?php echo e(get_static_option('site_global_currency') ?? ''); ?></span>
            </div>
        </div>
        <div class="popup-contents-btn flex-btn justify-content-end profile-border-top">
            <a href="javascript:void(0)" class="btn-profile btn-outline-gray btn-hover-danger popup-close"> <i class="las la-arrow-left"></i><?php echo e(__('Cancel')); ?></a>
            <a href="javascript:void(0)" class="btn-profile btn-bg-1 basic_price_setup"><?php echo e(__('Set Price')); ?></a>
        </div>
    </div>
</div>

<!-- Standard Popup start -->
<div class="popup-fixed price-popup-standard-charge">
    <div class="popup-contents">
        <span class="popup-contents-close popup-close"> <i class="fas fa-times"></i> </span>
        <h2 class="popup-contents-title"> <?php echo e(__('Set Charge')); ?> </h2>
        <div class="popup-contents-form custom-form">
            <div class="single-input single-input-icon">
                <label class="label-title"> <?php echo e(__('Regular Charge')); ?> </label>
                <input type="text" name="standard_regular_charge" id="standard_regular_charge" class="form--control" placeholder="00" value="<?php echo e($project_details->standard_regular_charge ?? ''); ?>">
                <span class="input-icon"> <?php echo e(get_static_option('site_global_currency') ?? ''); ?> </span>
            </div>
            <div class="single-input single-input-icon">
                <label class="label-title"> <?php echo e(__('Discount Charge(Optional)')); ?> </label>
                <input type="text" name="standard_discount_charge" id="standard_discount_charge" class="form--control" placeholder="00" value="<?php echo e($project_details->standard_discount_charge ?? ''); ?>">
                <span class="input-icon"> <?php echo e(get_static_option('site_global_currency') ?? ''); ?> </span>
            </div>
        </div>
        <div class="popup-contents-btn flex-btn justify-content-end profile-border-top">
            <a href="javascript:void(0)" class="btn-profile btn-outline-gray btn-hover-danger popup-close"> <i class="las la-arrow-left"></i><?php echo e(__('Cancel')); ?></a>
            <a href="javascript:void(0)" class="btn-profile btn-bg-1 standard_price_setup"><?php echo e(__('Set Price')); ?></a>
        </div>
    </div>
</div>

<!-- Premium Popup start -->
<div class="popup-fixed price-popup-premium-charge">
    <div class="popup-contents">
        <span class="popup-contents-close popup-close"> <i class="fas fa-times"></i> </span>
        <h2 class="popup-contents-title"><?php echo e(__('Set Charge')); ?></h2>
        <div class="popup-contents-form custom-form">
            <div class="single-input single-input-icon">
                <label class="label-title"><?php echo e(__('Regular Charge')); ?></label>
                <input type="text" name="premium_regular_charge" id="premium_regular_charge" class="form--control" placeholder="00" value="<?php echo e($project_details->premium_regular_charge ?? ''); ?>">
                <span class="input-icon"> <?php echo e(get_static_option('site_global_currency') ?? ''); ?> </span>
            </div>
            <div class="single-input single-input-icon">
                <label class="label-title"><?php echo e(__('Discount Charge(Optional)')); ?></label>
                <input type="text" name="premium_discount_charge" id="premium_discount_charge" class="form--control" placeholder="00" value="<?php echo e($project_details->premium_discount_charge ?? ''); ?>">
                <span class="input-icon"> <?php echo e(get_static_option('site_global_currency') ?? ''); ?></span>
            </div>
        </div>
        <div class="popup-contents-btn flex-btn justify-content-end profile-border-top">
            <a href="javascript:void(0)" class="btn-profile btn-outline-gray btn-hover-danger popup-close"> <i class="las la-arrow-left"></i><?php echo e(__('Cancel')); ?></a>
            <a href="javascript:void(0)" class="btn-profile btn-bg-1 premium_price_setup"><?php echo e(__('Set Price')); ?></a>
        </div>
    </div>
</div>
<!-- Package & Charge Ends -->
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/user/freelancer/project/edit/project-package-charge.blade.php ENDPATH**/ ?>