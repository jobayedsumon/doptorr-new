<a tabindex="0" class="btn dropdown-item status_dropdown__list__link swal_email_verify_button"><?php echo e($title); ?></a>
<form method='post' action='<?php echo e($url); ?>' class="d-none">
    <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
    <br>
    <button type="submit" class="swal_form_submit_btn d-none"></button>
</form>
<?php /**PATH /home/doptorr/public_html/core/resources/views/components/status/table/email-verify.blade.php ENDPATH**/ ?>