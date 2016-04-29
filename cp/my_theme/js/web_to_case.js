(function($) {
    Drupal.behaviors.WebToCaseJs = {
        attach:function (context, settings) {
            $('#web_to_case').on('submit', function(e) {
                var description = text = msg = '';
                $('#web_to_case div.form-item').each(function() {
                    msg = ($.trim($(this).find('textarea').length) > 0) ? "\n" :'';
                    msg += $.trim($(this).find('label').text().replace('*', ''));
                    text = ($(this).find('input').length)
                        ? $.trim($(this).find('input').val())
                        : ($(this).find('option:selected').val()) ? $.trim($(this).find('option:selected').text()) : '';
                    text += ($(this).find('textarea').length > 0 ) ? "\n\n"+ ($(this).find('textarea').val()) :'';
                    description += msg +': '+ text +"\n";
                });
                if (description != '') {
                    $('#web_to_case div.form-item textarea').val(description);
                    return;
                }
                e.preventDefault();
            })
        }
    }
})(jQuery);