<script>
    (function($){
        "use strict";
        $(document).ready(function(){
            // pagination
            $(document).on('click', '.pagination a', function(e){
                e.preventDefault();
                let page = $(this).attr('href').split('page=')[1];
                let string_search = $(this).val();
                subscriptions(page,string_search);
            });
            function subscriptions(page,string_search){
                $.ajax({
                    url:"<?php echo e(route('freelancer.subscriptions.paginate.data').'?page='); ?>" + page,
                    data:{string_search:string_search},
                    success:function(res){
                        $('.search_result').html(res);
                    }
                });
            }

            // search category
            $(document).on('keyup','#string_search',function(){
                let string_search = $(this).val();
                $.ajax({
                    url:"<?php echo e(route('freelancer.subscriptions.search')); ?>",
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
        });
    }(jQuery));
</script>
<?php /**PATH /home/doptorr/public_html/core/Modules/Subscription/Resources/views/frontend/freelancer/subscription/subscription-js.blade.php ENDPATH**/ ?>