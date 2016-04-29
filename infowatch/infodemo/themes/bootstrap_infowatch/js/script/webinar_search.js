(function ($) {
    Drupal.behaviors.WebinarSearch = {
        attach:function (context, settings) {

            $('#edit-field-theme-webinar-value').on('change', function() {
                $("#edit-submit-webinars").click();

            })

            var selectTheme = $('#edit-field-theme-webinar-value option:selected').index();

            $("#edit-title").on('focus', function() {
                $("#edit-field-theme-webinar-value option").removeAttr('selected');
            })

            $("#edit-title").on('blur', function() {
                if ($(this).val() == '') {
                    if (selectTheme != 0)
                        $("#edit-field-theme-webinar-value option").eq(selectTheme).attr("selected","selected");
                } else {
                    $("#edit-field-theme-webinar-value option").removeAttr('selected');
                }
            })

        }
    };
})(jQuery);

