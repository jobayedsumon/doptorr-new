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
                    toastr_warning_js("{{ __('Please fill all fields') }}");
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
                    toastr_warning_js("{{ __('Please fill all fields') }}");
                    return false;
                }
            });

            // pagination
            $(document).on('click', '.pagination a', function(e){
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                settings(page);
            });
            function settings(page){
                $.ajax({
                    url:"{{ route('admin.project.promote.settings.paginate').'?page='}}" + page,
                    success:function(res){
                        $('.search_result').html(res);
                    }
                });
            }

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
