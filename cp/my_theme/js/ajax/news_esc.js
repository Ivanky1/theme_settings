(function($) {
    Drupal.behaviors.WebinarAjax = {
        attach:function (context, settings) {
            $('.download_webinar').on('click', function(e) {
                e.preventDefault();
                $.ajax({
                    url: "http://www.infowatch.ru/webinar/cp/ajax",
                    crossDomain: true,
                    type: "POST",
                    data: 'news_escape='+$(this).attr('href').replace('http://www.infowatch.ru/', ''),
                    success: function(msg){
                        $("#news_esc").html(msg);
                    },
                    error: function () {
                        console.log('POST FAILED');
                    }
                });
            })
        }
    }
})(jQuery);