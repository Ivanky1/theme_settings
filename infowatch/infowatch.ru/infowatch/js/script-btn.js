(function ($) {
    Drupal.behaviors.bondSlider = {
        attach:function (context, settings) {
            var active_class = "active_btn";
            var selector_btn = ".link_btn_expanded_holder .btn_exp";
            $(selector_btn).once(function () {
                $(this).click(function (e) {
                    $this = $(this);
                    $siblings = $this.siblings();
                    if ($siblings.css("display") == "block")
                        hide($siblings);
                    else {
                        $other_div = $this.parent().siblings().children().filter("div");
                        $other_div.each(function (e) {
                            if ($(this).css("display") == "block")
                                hide($(this));
                        });
                        show($siblings);
                    }
                    return false;
                });
            });
			$(window).click(function (e) {
				$(selector_btn).siblings().each(function(){
					$this = $(this);
					if ( $this.css("display") == "block" )
						hide($this);
				});
			});				
			function hide($obj) {
				$obj.data({height:$obj.height()});
				$obj.animate({height:0}, "fast", function (e) {
					$(this).css({display:"none"});
					//$(this).siblings().toggleClass(active_class);
				}).siblings().toggleClass(active_class);
			}

			function show($obj) {
				if ($obj.data("height") == null) {
					//узнаем высоту, когда блок не был еще показан ни разу
					var visibility = $obj.css("visibility");
					var display = $obj.css("display");
					var height = $obj.css({visibility:"hidden", display:"fixed"}).height();
					$obj.data({height:height });
					$obj.css({visibility:visibility, display:display });
					if (height >= 0) $obj.css({height:0});
				}
				$obj.css({display:"block"}).animate({height:$obj.data("height")}, "fast", function (e) {
					$(this).css({height:""});
					//$(this).siblings().toggleClass(active_class);
				}).siblings().toggleClass(active_class);
			}
        }
    };
})(jQuery);

function hideshowclass(showclass,hideclass) {
	if(hideclass!=showclass){
		jQuery('.'+hideclass).hide();
		jQuery('.'+showclass).show();		
	}
	else
	{
		jQuery('.'+hideclass).show();
	}
 }