(function ($) {
  Drupal.behaviors.MenuTME = {
    attach: function (context, settings) {
	    $(window).scroll(function() {
            var top = $(document).scrollTop();
           /* console.log(top);*/
            if (top > 475) {
                    $(".menu_tme_future").addClass("pos_abs");
                    $("#block-block-140").show();
            }
            else {
                    $(".menu_tme_future").removeClass("pos_abs");
                    $(".menu_tme_future li").removeClass("current");
                    $("#block-block-140").hide();

            }
        });
        $(document).ready(function(){
                $('.menu_tme_future').onePageNav({
                            /*begin: function() {
                            console.log('start')
                            },
                            end: function() {
                            console.log('stop')
                            }*/
                    });
                });
    }
  };
})(jQuery);