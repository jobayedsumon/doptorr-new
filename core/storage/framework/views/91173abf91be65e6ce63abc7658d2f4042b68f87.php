<script>
    (function ($) {
        "use strict";
        $(document).ready(function () {

            //prevent multiple submit
            $('#job_proposal_form').on('submit', function () {
                $('.send_job_proposal').attr('disabled', 'true');
            });

            // proposal validate
            $(document).on('click', '.send_job_proposal', function(e){
                let amount = $('#job_proposal_form #amount').val();
                let duration = $('#job_proposal_form #duration').val();
                let revision = $('#job_proposal_form #revision').val();
                let cover_letter = $('#job_proposal_form #cover_letter').val();

                if(amount == '' || duration == '' || cover_letter == '' || revision == ''){
                    toastr_warning_js("<?php echo e(__('Except attachment all fields required!')); ?>")
                    return false;
                }else if(amount<1){
                    toastr_warning_js("<?php echo e(__('Amount must be greater than 1.')); ?>")
                    return false;
                }else if(cover_letter.length<10){
                    toastr_warning_js("<?php echo e(__('Cover letter must be greater than 10 characters.')); ?>")
                    return false;
                }else{
                    $('#send_proposal_load_spinner').html('<i class="fas fa-spinner fa-pulse"></i>')

                }

            });

        });
    }(jQuery));
</script>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/frontend/pages/job-details/job-details-js.blade.php ENDPATH**/ ?>