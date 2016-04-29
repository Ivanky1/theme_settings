(function ($) {
  Drupal.behaviors.MenuTME = {
    attach: function (context, settings) {
        $(document).ready(function(){
                $('.menu_tme_future').onePageNav({
                                                /*begin: function() {
                                                console.log('start')
                                                },
                                                end: function() {
                                                console.log('stop')
                                                }*/
                                        });
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

            $('.bl_tme_buttton').on("click", function(){
                $(this).find(".bl_on").toggleClass('active');
                return false;
            });
        });
    }
  };
})(jQuery);