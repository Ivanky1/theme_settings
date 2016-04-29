(function($) {
    Drupal.behaviors.SupportJs = {
        attach:function (context, settings) {
            window.onload = function() {
                $('.types_select').hide();
                $('#support_bl_more').hide();
                $('.relations').hide();
                $('.type_questions_help').change();
                $('.type_questions_help').on('change', function() {
                    $('.types_select').hide();
                    $('.relations').hide();
                    $('#support_bl_more').hide();
                    if ($(this).find('option:selected').val() != '') {
                        $('.types_select').eq(($(this).find('option:selected').index()-1)).show();
                        $('.types_select').eq(($(this).find('option:selected').index()-1)).change();
                    }
                })

                $('.types_select').on('change', function() {
                    //$('#support_bl_more').hide();
                    $('.relations').hide();
                    if ($(this).find('option:selected').val() != '' && $(this).is(':visible')) {
                        if ($(this).find('option:selected').val() == 'Я использую полную версию' && $('#my-block-login').length) {

                            // $('body').append('<div style="position: absolute; width: 9999px;opacity: 0.85; cursor: pointer; visibility: visible;"></div>')
                          //  $('#block-block-login-my-block-login h2').click()
                        } else {
                            $('.relations').show();
                        }
                    }
                })

                $('.chat_button').live('click', function() {
                    //$.colorbox.close();
                    //  $('#forma_request_help').hide()
                    $( this).unbind( "click" );
                    $('.chat_in').click();
                    // $.colorbox.close()
                })

                $('#forma_request_help .chat_request_form').on('click', function() {
                    var params = ($('.types_select[style="display: block;"] option:selected').val().length)
                        ?'?theme='+$('.types_select[style="display: block;"] option:selected').val()
                        :'';
                    location.href='/request'+params;
                })
            }
        }
    }
})(jQuery);