<!-- State Edit Modal -->
<div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo e(__('User Details')); ?> </h1>
                <a class="user_info_edit btn btn-sm btn-secondary" href=""><i class="fas fa-pencil"></i></a>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
                <?php echo csrf_field(); ?>
                <div class="modal-body" id="user_details">
                    <div class="userDetails__wrapper">
                        <p class="userDetails__wrapper__item"><strong><?php echo e(__('User Type: ')); ?></strong> <span class="user_type"></span></p>
                        
                        <p class="userDetails__wrapper__item"><strong><?php echo e(__('Full Name: ')); ?></strong><span class="full_name"></span></p>
                        
                        <p class="userDetails__wrapper__item"><strong><?php echo e(__('Username: ')); ?></strong><span class="username"></span></p>
                        
                        <p class="userDetails__wrapper__item"><strong><?php echo e(__('Email: ')); ?></strong><span class="email"></span></p>
                        
                        <p class="userDetails__wrapper__item"><strong><?php echo e(__('Phone: ')); ?></strong><span class="phone"></span></p>
                        
                        <p class="userDetails__wrapper__item"><strong><?php echo e(__('Country: ')); ?></strong><span class="country"></span></p>
                        
                        <p class="userDetails__wrapper__item"><strong><?php echo e(__('State: ')); ?></strong><span class="state"></span></p>
                        
                        <p class="userDetails__wrapper__item"><strong><?php echo e(__('City: ')); ?></strong><span class="city"></span></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary mt-4" data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                </div>
        </div>
    </div>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/backend/pages/user/clients/user-details-modal.blade.php ENDPATH**/ ?>