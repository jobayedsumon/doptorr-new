<!-- Modal -->
<div class="modal fade" id="feedbackModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel"><?php echo e(__('Submit Feedback')); ?></h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?php echo e(route('freelancer.submit.feedback')); ?>" method="post" id="reviewForm">
                <?php echo csrf_field(); ?>
                <div class="modal-body">
                    <div class="error-message"></div>
                    <div class="single-input">
                        <label><?php echo e(__('Title')); ?></label>
                        <input type="text" name="title" class="form-control" placeholder="<?php echo e(__('Enter title')); ?>">
                    </div>
                    <div class="single-input mt-3">
                        <label><?php echo e(__('Description')); ?></label>
                        <textarea cols="30" rows="5" name="description" class="form-control"
                            placeholder="<?php echo e(__('Enter description')); ?>"></textarea>
                    </div>
                    <div class="single-input mt-3">
                        <label><?php echo e(__('Rating')); ?></label>
                        <input type="number" name="rating" class="form-control"
                            placeholder="<?php echo e(__('Enter rating')); ?>">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-bs-dismiss="modal"><?php echo e(__('Close')); ?></button>
                    <button type="button" class="btn btn-primary submit_your_review"><?php echo e(__('Submit')); ?></button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php /**PATH /home/doptorr/public_html/core/resources/views/frontend/user/freelancer/profile/feedback-modal.blade.php ENDPATH**/ ?>