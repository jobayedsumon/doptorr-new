<script>
    (function($){
        "use strict";
        $(document).ready(function(){

            // add settings
            $(document).on('click','.add_project_promote_settings',function(e){
                let title = $('#title').val();
                let duration = $('#duration').val();
                let budget = $('#budget').val();
                if(title == '' || duration == '' || budget == ''){
                    toastr_warning_js("<?php echo e(__('Please fill all fields')); ?>");
                    return false;
                }
            });

            // show settings in edit modal
            $(document).on('click','.edit_project_promote_settings',function(){
                $('#settings_id').val($(this).data('settings-id'));
                $('#edit_title').val($(this).data('title'));
                $('#edit_duration').val($(this).data('duration'));
                $('#edit_budget').val($(this).data('budget'));
            });

            // update settings
            $(document).on('click','.update_project_promote_settings',function(){
                let title = $('#edit_title').val();
                let duration = $('#edit_duration').val();
                let budget = $('#edit_budget').val();
                if(title == '' || duration == '' || budget == ''){
                    toastr_warning_js("<?php echo e(__('Please fill all fields')); ?>");
                    return false;
                }
            });


            // search category
            $(document).on('keyup','#string_search',function(){
                let string_search = $(this).val();
                $.ajax({
                    url:"<?php echo e(route('admin.project.promote.search')); ?>",
                    method:'GET',
                    data:{string_search:string_search},
                    success:function(res){
                        if(res.status=='nothing'){
                            $('.search_result').html('<h3 class="text-center text-danger">'+"<?php echo e(__('Nothing Found')); ?>"+'</h3>');
                        }else{
                            $('.search_result').html(res);
                        }
                    }
                });
            })

            // pagination
            $(document).on('click', '.pagination a', function(e){
                e.preventDefault();
                let string_search = $('#string_search').val();
                let page = $(this).attr('href').split('page=')[1];
                promotion_search(page,string_search);
            });
            function promotion_search(page,string_search){
                $.ajax({
                    url:"<?php echo e(route('admin.project.promote.paginate').'?page='); ?>" + page,
                    data:{string_search:string_search},
                    success:function(res){
                        $('.search_result').html(res);
                    }
                });
            }

            //edit manual payment promotion
            $(document).on('click','.edit_payment_gateway_modal',function(){
                let promoted_project_list_id = $(this).data('promoted-project-list-id');
                let promoted_project_user_id = $(this).data('promoted-project-user-id');
                let img_name = $(this).data('img-url');

                $('#promoted_project_list_id').val(promoted_project_list_id)
                $('#promoted_project_user_id').val(promoted_project_user_id)

                if(img_name == ''){
                    $('.manual_payment_image_display').hide();
                }else{
                    $('.manual_payment_image_display').show();
                    let manual_payment_image = "<?php echo e(url('/assets/uploads/manual-payment/promotion')); ?>/" + img_name;
                    $('.manual_payment_img').attr('src', manual_payment_image);
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
<?php /**PATH /home/doptorr/public_html/core/Modules/PromoteFreelancer/Resources/views/backend/promoted-project/promoted-project-js.blade.php ENDPATH**/ ?>