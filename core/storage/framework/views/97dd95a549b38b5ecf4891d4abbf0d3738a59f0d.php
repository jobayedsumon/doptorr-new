<?php $id = isset($id) ? $id : null; ?>
<?php $class = isset($class) ? $class : null; ?>

<div class="single-input mb-3 <?php echo e($class); ?>">
    <label class="label-title mb-3" for="<?php echo e($name); ?>"><?php echo e(__($title ?? '')); ?></label>
    <?php $signature_image_upload_btn_label = __('Upload Image'); ?>
    <div class="media-upload-btn-wrapper">
        <div class="img-wrap">
            <?php
                if (is_null($id)){
                    $id = get_static_option($name);
                }
                $signature_img = get_attachment_image_by_id($id,null,false);
            ?>
            <?php if(!empty($signature_img)): ?>
                <div class="rmv-span"><i class="<?php echo e(isset($type) && $type === 'user' ? 'fas fa-times' : 'fas fa-times'); ?>"></i></div>
                <div class="attachment-preview">
                    <div class="thumbnail">
                        <div class="centered">
                            <img class="avatar user-thumb" src="<?php echo e($signature_img['img_url']); ?>" >
                        </div>
                    </div>
                </div>
                <?php $signature_image_upload_btn_label = __('Change Image'); ?>
            <?php endif; ?>
        </div>
        <br>
        <input type="hidden" name="<?php echo e($name); ?>" value="<?php echo e($id); ?>">
        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e($id ?? ''); ?>" data-bs-toggle="modal" data-bs-target="#media_upload_modal">
            <?php echo e(__($signature_image_upload_btn_label)); ?>

        </button>
    </div>
    <?php if(isset($dimentions) && !empty($dimentions)): ?> <small><?php echo e(__('recommended image size is')); ?> <?php echo e($dimentions ?? ''); ?></small> <?php endif; ?>
</div>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/backend/image.blade.php ENDPATH**/ ?>