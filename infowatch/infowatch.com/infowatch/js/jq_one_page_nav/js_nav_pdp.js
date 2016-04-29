(function ($) {
  Drupal.behaviors.Onenav = {
    attach: function (context, settings) {
	    $(window).scroll(function() {
	        var top = $(document).scrollTop();
	       /* console.log(top);*/
	        if (top > 180) {
	        	$("#nav").addClass("pos_abs");
	        }
	        else {
	        	$("#nav").removeClass("pos_abs");
	        }
	    });
		$(document).ready(function() {
			$('#nav').onePageNav({
				/*begin: function() {
				console.log('start')
				},
				end: function() {
				console.log('stop')
				}*/
			});
			
			/*$('.do').click(function(e) {
				$('#section-4').append('<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p><p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>');
				e.preventDefault();
			});*/
			
		});
	}
  };
})(jQuery);