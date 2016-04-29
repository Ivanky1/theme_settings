(function($) {
    Drupal.behaviors.analytics = {
        attach : function(context, settings) {
            $('#node-7262 #ui-id-3' ).on('click', function() {
                ga('send', 'event', 'smb_company', 'click');
            });
            $('#node-7262 .step3').on('click', function() {
                ga('send', 'event', 'select_desc', 'click');
            });
            $('#node-7262 .step2').on('click', function() {
                if ($(this).attr('href') == 5 || $(this).attr('href') == 6 || $(this).attr('href') == 7) {
                    ga('send', 'event', 'select_desc', 'click');
                }
            });
            $('#mod .raschet' ).on('click', function() {
                ga('send', 'event', 'select_calc_eps', 'click');
            });
            $('#video_tme_open .video_tme' ).on('click', function() {
                ga('send', 'event', 'select_video_tme', 'click');
            });
            $('#in-block-198 .close' ).on('click', function() {
                ga('send', 'event', 'close_ajax_rlm_block', 'click');
            });
            $('#input_ajax_rlm_block' ).on('click', function() {
                ga('send', 'event', 'input_ajax_rlm_block', 'click');
            });
        }
    }
}) (jQuery);