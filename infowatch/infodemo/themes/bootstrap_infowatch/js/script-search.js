(function ($) {
  Drupal.behaviors.Search = {
    attach: function (context, settings) {
			$("#search_pls").click(function(){
				$('.top_search').toggleClass('active');
				return false;
			});
    }
  };
})(jQuery);