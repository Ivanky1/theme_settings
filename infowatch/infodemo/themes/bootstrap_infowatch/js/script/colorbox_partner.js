(function ($) {
    Drupal.behaviors.partners = {
        attach:function (context, settings) {
        $(".partners-nid").on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            var body = '';
            $(this).parents('.partners-row').find('>div').each(function() {
                 if (!$(this).hasClass('views-field-nid') && !$(this).hasClass('views-field-body')) {
                     body += $(this).html()
                 }
            });
            $.colorbox({
                html: body,
                width: '50%'
            });

            });

        }
    }

})(jQuery);