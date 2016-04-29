(function ($) {
    Drupal.behaviors.partners = {
        attach:function (context, settings) {
            $('.views-field-field-contacts-partners span.field-content').hide();
            $('.views-field-field-contacts-partners span.views-label, .contact_close').on('click', function() {
                var self, d;
                if ($(this).hasClass('contact_close')) {
                     self = $(this).parents('.field-content');
                    d = 'inline-block';
                } else {
                     self = $(this);
                    d = 'block';
                }
                if (self.siblings().css('display') == 'none') {
                    if (d == 'block') {
                        self.siblings().slideDown('slow');
                        self.hide();
                    } else {
                        self.slideUp('slow');
                        self.siblings().fadeIn('slow');
                    }
                }

            })
        }
    };
})(jQuery);

