<a tabindex="0" class="<?php echo e($class ?? 'btn dropdown-item status_dropdown__list__link swal_status_change_button'); ?>"><?php echo e($title); ?></a>
<form method='post' action='<?php echo e($url); ?>' class="d-none">
    <input type='hidden' name='_token' value='<?php echo e(csrf_token()); ?>'>
    <input type='hidden' name='cancel_or_decline_order' value="<?php echo e($value ?? ''); ?>">
    <br>
    <button type="submit" class="swal_form_submit_btn d-none"></button>
</form>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/status/table/status-change.blade.php ENDPATH**/ ?>