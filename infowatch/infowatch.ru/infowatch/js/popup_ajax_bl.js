(function ($) {
  Drupal.behaviors.Livedemo = {
    attach: function (context, settings) {
    	console.log("1");
        setTimeout(function(){
            $.colorbox({inline:true, href:'.ajax_rlm_block'});
        }, 10000);
    }
  };
})(jQuery);