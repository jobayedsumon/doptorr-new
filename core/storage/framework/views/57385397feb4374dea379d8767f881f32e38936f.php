<script>
    $(document).on('click','#bulk_delete_btn',function (e) {
        e.preventDefault();
        let bulkOption = $('#bulk_option').val();
        let allCheckbox =  $('.bulk-checkbox:checked');
        let allIds = [];
        allCheckbox.each(function(index,value){
            allIds.push($(this).val());
        });
        if(allIds != '' && bulkOption == 'delete'){
            $(this).html('<i class="fas fa-spinner fa-spin mr-1"></i><?php echo e(__("Deleting")); ?>');
            $.ajax({
                'type' : "POST",
                'url' : "<?php echo e($url); ?>",
                'data' : {
                    _token: "<?php echo e(csrf_token()); ?>",
                    ids: allIds
                },
                success:function (data) {
                    location.reload();
                }
            });
        }
    });
    $('.all-checkbox').on('change',function (e) {
        e.preventDefault();
        let value = $('.all-checkbox').is(':checked');
        let allChek = $(this).parent().parent().parent().parent().parent().find('.bulk-checkbox');
        if( value == true){
            allChek.prop('checked',true);
        }else{
            allChek.prop('checked',false);
        }
    });
</script>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/bulk-action/bulk-delete-js.blade.php ENDPATH**/ ?>