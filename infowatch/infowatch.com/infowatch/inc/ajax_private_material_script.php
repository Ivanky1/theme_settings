<?php

/**
 * @param $nid
 * @param $uid
 * @param $email
 * @return string
 */
function statistic_ajax_script($nid, $uid, $email, $profile_podpiska ='') {
        $scripts = "<script>
                           (function ($) {
                                Drupal.behaviors.statistics_ajax = {
                                         attach: function(context, settings) {
                                                    var email = '".$email."';
                                                    var profile_podpiska = '".$profile_podpiska."';
                                                    $('.file a').bind('click', function() {
                                                                var nid = parseInt(".$nid.");
                                                                var uid = parseInt(".$uid.");
                                                                $.ajax({
                                                                  type: 'POST',
                                                                  url: '/statistics/upload',
                                                                  data: 'nid='+nid+'&uid='+uid+'&email='+email+'&profile_podpiska='+profile_podpiska,
                                                                  async: false,
                                                                  success: function(file) {
                                                                      window.location = file;
                                                                      ga('send', 'event', 'privatedoc', 'download');
                                                                  }
                                                                });
                                                        return false;
                                                    })
                                         }
                                }
                           })(jQuery);

                    </script>";

        return $scripts;

}

/**
 * @param $fileType
 * @return string
 */
function returnClassFile ($fileType) {
    $classFile = '';
    switch($fileType) {
        case "docx": $classFile = 'files_docx'; break;
        case "doc": $classFile = 'files_docx'; break;
        case "txt": $classFile = 'files_txt'; break;
        case "pdf": $classFile = 'files_pdf'; break;
        case "xlsx": $classFile = 'files_xlsx'; break;
        case "pptx": $classFile = 'files_pptx'; break;
        case "ppt": $classFile = 'files_pptx'; break;
    }
    return $classFile;
}