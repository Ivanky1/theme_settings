<?php
drupal_add_js('sites/all/themes/infowatch/js/bond_slider/1.7/jquery.bondSlider-1.7.min.js', 'file');
drupal_add_css('sites/all/themes/infowatch/js/bond_slider/1.7/main_slider2.css', 'file');
?><script type = "text/javascript">
(function ($) {
  Drupal.behaviors.bondSlidersmall = {
    attach: function (context, settings) {
    $("#slidebox").once(function () {
            $(this).bondSlider({
                autoPlay: true,
                autoPlaySuspend: true,
                /* автоматическое листание
                 autoPlayTime: 7000, интервал между листаниями
                autoPlaySuspend: true, /*приостанавливает слайдер, когда курсор над слайдером*/
                navi: "thumbs",
                thumb : "thumb",
                next: "next",
                prev: "previous",
                wrapFrames: "wrapContainer",
                activeThumb:  "selected_thumb",
                frames: "container",
                frame: "content"
               // hideBtn: true

            });
    });
    }
  };
})(jQuery);
</script>
<style type="text/css">
<!--
#slidebox, #slidebox .container, #slidebox .content {
height: 180px;
}
#slidebox .content a,
  #slidebox .content a,:hover  {
  text-decoration: none;
  }
#slidebox .content.webinar .ban_link.download_report a {
  font-size: 18px;
  font-family: DINPro, Arial, sans-serif;
  width: 100px;
  background-color: #f0782c;
  color: #fff;
  background-position: right top;
  line-height: 40px;
  }
#slidebox .content.webinar .ban_link.download_report a:hover {
  font-size: 18px;
  font-family: DINPro, Arial, sans-serif;
  width: 100px;
  background-color: #fff;
  color: #f39000;
  background-position: right bottom;
  line-height: 40px;
} 
#slidebox .content.webinar .ban_title {
  font-size: 38px;
  font-family: DINPro, Arial, sans-serif;
  text-transform: uppercase;
  color: #33322f;
  text-shadow: none;
  margin-bottom: 34px;
  font-weight: bold;
  line-height: 40px;
}
#slidebox .content.webinar .ban_subtitle {
  font-size: 18px;
  font-family: DINPro, Arial, sans-serif;
  color: #444;
  margin-bottom: 34px;
  line-height: 28px;
} 
#slidebox .content.rsh a {
  background: url('/sites/default/files/images/page_banners/page_ban_rsh.jpg') no-repeat left -165px; 
  height: 165px; 
  width: 732px;
  display: block;
  text-decoration: none;
}
#slidebox .content.rsh a:hover {
  background: url('/sites/default/files/images/page_banners/page_ban_rsh.jpg') no-repeat left top; 
  height: 165px; 
  width: 732px;
  display: block;
  text-decoration: none;
}--></style>
<div id="slidebox">
  <div class="next">
    &nbsp;</div>
  <div class="previous">
    &nbsp;</div>
  <div class="thumbs">
    <a class="thumb" href="#">&nbsp;</a><a class="thumb selected_thumb" href="#">&nbsp;</a><a class="thumb" href="#">&nbsp;</a><a class="thumb" href="#" style="display: none;">&nbsp;</a></div>
  <div class="wrapContainer" style="position: relative; overflow: hidden;">
    <div class="container">
		<?php foreach($rows as $row) : ?>
			<div class="content" style="float: left;">
				<div style="height: 180px; width: 732px;">
				    <a href="<?=$row['field_link_baner']?>">
				        <?=$row['field_img_baner']?>
				    </a>
				</div>
      		</div>
		<?php endforeach; ?>
  	</div>
  </div>
</div>