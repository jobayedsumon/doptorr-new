<script>
    (function($){
        "use strict";
        $(document).ready(function(){

            // add country
            $(document).on('click','.add_level',function(e){
                let level = $('#level').val();
                if(level == ''){
                    toastr_warning_js("{{ __('Please enter level name !') }}");
                    return false;
                }
            });

            // show level in edit modal
            $(document).on('click','.edit_level_modal',function(){
                let level = $(this).data('level');
                let level_id = $(this).data('level_id');
                let image = $(this).data('img_url');
                let image_id = $(this).data('img_id');

                $('#edit_level').val(level);
                $('#level_id').val(level_id);

                $('#editLevelModal').find('.media-upload-btn-wrapper .img-wrap').html('');
                $('#editLevelModal').find('.media-upload-btn-wrapper input').val('');

                if (image_id != '') {
                    $('#editLevelModal').find('.media-upload-btn-wrapper .img-wrap').html('<div class="attachment-preview"><div class="thumbnail"><div class="centered"><img class="avatar user-thumb" src="' + image + '" > </div></div></div>');
                    $('#editLevelModal').find('.media-upload-btn-wrapper input').val(image_id);
                    $('#editLevelModal').find('.media-upload-btn-wrapper .media_upload_form_btn').text('Change Image');
                }
            });

            // update level
            $(document).on('click','.update_level',function(){
                let level = $('#edit_level').val();
                if(level == ''){
                    toastr_warning_js("{{ __('Please enter level name !') }}");
                    return false;
                }
            });

            // pagination
            $(document).on('click', '.level_rules_modal', function(e){
                e.preventDefault();
                let level_id = $(this).data('level-id');
                let rule_id = $(this).data('rule-id');
                let period = $(this).data('period');
                let avg_rating = $(this).data('avg-rating');
                let earning = $(this).data('earning');
                let total_order = $(this).data('complete-order');

                $('#LevelRulesModal #level_id').val(level_id);
                $('#LevelRulesModal #rule_id').val(rule_id);
                $('#LevelRulesModal #period').val(period);
                $('#LevelRulesModal #avg_rating').val(avg_rating);
                $('#LevelRulesModal #earning').val(earning);
                $('#LevelRulesModal #complete_order').val(total_order);
            });

            //setup confirmation
            $(document).on('click','.setup_level_rules',function(){
                let period = $('#LevelRulesModal #period').val();
                let avg_rating = $('#LevelRulesModal #avg_rating').val();
                let earning = $('#LevelRulesModal #earning').val();
                let total_order = $('#LevelRulesModal #complete_order').val();


                if(period == '' || avg_rating == '' || earning == '' || total_order == ''){
                    toastr_warning_js("{{ __('Please fill all fields') }}");
                    return false;
                }
                if(avg_rating < 1 || avg_rating > 5){
                    toastr_warning_js("{{ __('Average rating must be  between 1 to 5') }}");
                    return false;
                }
                if(earning <= 1){
                    toastr_warning_js("{{ __('Total earning must be greater than 1') }}");
                    return false;
                }
                if(total_order < 1){
                    toastr_warning_js("{{ __('Freelancer must have at least 1 complete order') }}");
                    return false;
                }
            })

        });
    }(jQuery));

    //toastr warning
    function toastr_warning_js(msg){
        Command: toastr["warning"](msg, "Warning !")
        toastr.options = {
            "closeButton": true,
            "debug": false,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
    }

</script>
