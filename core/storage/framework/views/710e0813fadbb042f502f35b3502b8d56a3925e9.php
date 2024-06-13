<script>
    $('.icp-dd').iconpicker();
    $('.icp-dd').on('iconpickerSelected', function(e) {
        var selectedIcon = e.iconpickerValue;
        $(this).parent().parent().children('input').val(selectedIcon);
    });
    $('.icp-dd').iconpicker();
    $('body').on('iconpickerSelected', '.icp-dd', function(e) {
        var selectedIcon = e.iconpickerValue;
        $(this).parent().parent().children('input').val(selectedIcon);
        $('body .dropdown-menu.iconpicker-container').removeClass('show');
    });
</script>
<?php /**PATH /home/1279107.cloudwaysapps.com/hkvzvsqtvn/public_html/core/resources/views/components/icon-picker/icon-picker.blade.php ENDPATH**/ ?>