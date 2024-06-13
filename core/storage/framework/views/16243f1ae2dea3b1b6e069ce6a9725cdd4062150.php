<script>
    (function($){
        "use strict";
        $(document).ready(function(){
            // add ticket
            $(document).on('click','.add_ticket',function(e){
                let title = $('#title').val();
                let department = $('#department').val();
                let priority = $('#priority').val();
                let description = $('#description').val();

                if(title == '' || department == '' || priority == '' || description == ''){
                    toastr_warning_js("<?php echo e(__('All fields are required !')); ?>");
                    return false;
                }
            });

            // pagination
            $(document).on('click', '.pagination a', function(e){
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                let string_search = $('#string_search').val();
                $.ajax({
                    url:"<?php echo e(route('freelancer.ticket.paginate.data').'?page='); ?>" + page,
                    data:{string_search:string_search},
                    success:function(res){
                        $('.search_result').html(res);
                    }
                });
            });

            // search category
            $(document).on('keyup','#string_search',function(){
                let string_search = $(this).val();
                $.ajax({
                    url:"<?php echo e(route('freelancer.ticket.search')); ?>",
                    method:'POST',
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

        });
    }(jQuery));
</script>
<?php /**PATH /home/doptorr/public_html/core/Modules/SupportTicket/Resources/views/freelancer/ticket-js.blade.php ENDPATH**/ ?>