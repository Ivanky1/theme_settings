(function ($) {
    Drupal.behaviors.calendarEvents = {
        attach:function (context, settings) {
            $('.calendar_events').datepicker({ minDate: -20, maxDate: "+2M +10D" })
            $('.ui-datepicker-calendar').addClass('asfasf')

        }
    };
})(jQuery);

