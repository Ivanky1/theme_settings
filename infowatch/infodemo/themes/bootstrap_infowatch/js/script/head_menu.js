(function ($) {
    Drupal.behaviors.head_menu = {
        attach:function (context, settings) {
            $('.date-display-single').each(function() {
                var times = $(this).text().replace(/(.*) (\d+):(\d+)/g, '$1<span class="mini-time">$2:$3 <span>МСК</span></span>');
                $(this).html(times)
            })

            $('ul.dropdown-menu, .mega-menu', '#block-menu-block-23 ul.navbar-nav>li').on('click', function(e) {
                e.stopPropagation();
            })

        }
    };
})(jQuery);

