<form id="profile_photo_change" method="post" enctype="multipart/form-data">
    <?php echo csrf_field(); ?>
    <!-- Modal -->
    <div class="modal fade" id="profilePhotoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle"><?php echo e(__('Profile Photo Preview')); ?></h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="error_msg_container"></div>
                    <div class="modal-body file-wrapper text-center">
                        <img src="" alt="" class="profile_photo_preview">
                        <input type="file" name="image" class="d-none profile_photo_upload">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><?php echo e(__('Update')); ?></button>
                </div>
            </div>
        </div>
    </div>
</form>
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/user/freelancer/profile/profile-preview-modal.blade.php ENDPATH**/ ?>