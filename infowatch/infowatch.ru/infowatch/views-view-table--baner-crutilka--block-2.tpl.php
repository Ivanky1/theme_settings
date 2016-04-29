<?php
drupal_add_js('sites/all/themes/infowatch/js/bond_slider/1.7/jquery.bondSlider-1.7.min.js', 'file');
drupal_add_css('sites/all/themes/infowatch/js/bond_slider/1.7/main_slider.css', 'file');
?>
<script type = "text/javascript">
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
<style>
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
#slidebox .content #rsh_ban {
  background: url('/sites/default/files/roadshow15/roadshow_980_15.jpg') no-repeat left top;
  padding: 36px 20px 0 649px;
  height: 284px;
  width: 311px;
}
#slidebox .content #rsh_ban .ban_title {
  font-size: 26px;
  color: #565656;
  font-family: "Arial";
  text-shadow: none;
  line-height: 120%;
  font-weight: bold;
  margin-bottom: 35px;
}
#slidebox .content #rsh_ban .ban_subtitle {
  font-size: 14px;
  color: #565656;
  font-family: "Arial";
  line-height: 19px;
  margin-bottom: 30px;
}
#slidebox .content #rsh_ban .ban_link.download_report a {
  width: 120px;
  background-color: #7b2879;
  color: #fff;
  background-position: right top;
}
#slidebox .content #rsh_ban .ban_link.download_report a:hover {
  width: 120px;
  background-color: #fff;
  color: #222;
  background-position: right center;
} 
#slidebox .content #dlp_ban {
  background: url('/sites/default/files/main_slider/dlp_bg.png') no-repeat left top;
padding-left:44px;
width:936px;
}
#slidebox .content #dlp_ban .ban_title{
  margin-bottom:20px;
}
#slidebox .content #dlp_ban .ban_subtitle{
  margin-bottom:33px;
font-size:22px;
}
#slidebox .content #dlp_ban .ban_link.download_report a{
  background-color:#fff;
}
#slidebox .content #dlp_ban .ban_link.download_report a:hover{
  background-color: #F1AD42;
    background-position: right center;
}
a.livedemo, a:hover.livedemo {text-decoration: none;}
.p_front1 {
  background: url(/sites/default/files/main_slider/online_demo2.jpg) no-repeat left top; height: 320px; width: 980px;
}
.p_front1 a.livedemo {
  display: block;height: 320px;width: 980px;
}
.p_front2 {
  background: url(/sites/default/files/main_slider/online_demo2.jpg) no-repeat left top; height: 320px; width: 980px;
}
.p_front3 {
  border:0; height: 360px; width: 640px;
}
/*    r2013   */
#slidebox .content #r2013 {
  background: url('/sites/default/files/images/main_page/report_2013_main.jpg') no-repeat left top;
padding-left:44px;
width:936px;
}
#slidebox .content #r2013 .ban_title{
  margin-bottom:65px;
  margin-top:7px;
  font-size:26px;
  line-height: 30px;
  font-weight: bold;
  text-transform: none;

}
#slidebox .content #r2013 .ban_subtitle{
  margin-bottom:33px;
font-size:22px;
}
#slidebox .content #r2013 .ban_link.download_report a{
  background-color:#d77f2f;
  color:#fff;
    background-position: right top;
}
#slidebox .content #r2013 .ban_link.download_report a:hover{
  background-color: #fff;
  color:#d77f2f;
    background-position: right bottom;
}

/*    tme_ban   */
#slidebox .content #tme_ban {
background: url("/sites/default/files/images/main_page/banner_main_tme.jpg") no-repeat left top;
padding: 80px 0 0 70px;
height: 240px;
width: 924px;
}
#slidebox .content #tme_ban .ban_title {
font-size: 24px;
font-family: Arial, sans-serif;
text-transform: uppercase;
color: #fff;
text-shadow: none;
margin-bottom: 12px;
font-weight: normal;
line-height: 120%;
}
#slidebox .content #tme_ban .ban_subtitle {
font-size: 15px;
font-family: Arial, sans-serif;
color: #fff;
margin-bottom: 25px;
line-height: 120%;
}
#slidebox .content #tme_ban .ban_link.download_report a {
font-size: 18px;
font-family: Arial, sans-serif;
width: 105px;
background-color: #fff;
color: #344437;
background-position: right center;
line-height: 40px;
text-decoration: none;
}
#slidebox .content #tme_ban .ban_link.download_report a:hover {
font-size: 18px;
font-family: Arial, sans-serif;
width: 105px;
background-color: #344437;
color: #fff;
background-position: right top;
line-height: 40px;
}
/*    tms_ban   */
#slidebox .content #tms_ban {
background: url("/sites/default/files/images/main_page/bg_main_tms.jpg") no-repeat left top;
padding: 65px 0 0 70px;
height: 255px;
width: 924px;
}
#slidebox .content #tms_ban .ban_title {
font-size: 25px;
font-family: DINPro, Arial, sans-serif;
text-transform: uppercase;
color: #3b3b3b;
text-shadow: none;
margin-bottom: 28px;
font-weight: normal;
line-height: 120%;
}
#slidebox .content #tms_ban .ban_subtitle {
font-size: 20px;
font-family: DINPro, Arial, sans-serif;
color: #3b3b3b;
margin-bottom: 40px;
line-height: 120%;
}
#slidebox .content #tms_ban .ban_subtitle span {
font-size: 20px;
font-family: DINPro, Arial, sans-serif;
text-transform: uppercase;
color: #861f7e;
}
#slidebox .content #tms_ban .ban_link.download_report a {
font-size: 18px;
font-family: Arial, sans-serif;
width: 155px;
background-color: #861f7e;
color: #ffffff;
background-position: right top;
line-height: 40px;
text-decoration: none;
}
#slidebox .content #tms_ban .ban_link.download_report a:hover {
font-size: 18px;
font-family: Arial, sans-serif;
width: 155px;
background-color: #ffffff;
color: #344437;
background-position: right center;
line-height: 40px;
}
/*    iw_webinar120215   */
#slidebox .content #iw_webinar120215 {
background: url("/sites/default/files/images/main_page/bgmain_120215.jpg") no-repeat left top;
padding: 50px 0 0 70px;
height: 270px;
width: 910px;
}
#slidebox .content #iw_webinar120215 .ban_title {
font-size: 24px;
font-family: DINPro, Arial, sans-serif;
text-transform: uppercase;
color: #ffffff;
text-shadow: none;
margin-bottom: 19px;
font-weight: normal;
line-height: 120%;
}
#slidebox .content #iw_webinar120215 .ban_subtitle {
font-size: 16px;
font-family: DINPro,Arial,sans-serif;
color: #fff;
margin-bottom: 33px;
line-height: 120%;
}
#slidebox .content #iw_webinar120215 .ban_link.download_report a {
font-size: 18px;
font-family: Arial,sans-serif;
width: 170px;
background-color: #b82a2c;
color: #ffffff;
background-position: right top;
line-height: 40px;
text-decoration: none;
}
#slidebox .content #iw_webinar120215 .ban_link.download_report a:hover {
font-size: 18px;
font-family: Arial, sans-serif;
width: 170px;
background-color: #ffffff;
color: #344437;
background-position: right center;
line-height: 40px;
}
/*    iw_webinar120215   */
/*    iw_webinar240315   */
#slidebox .content #ban_240315 {
background: url('/sites/default/files/images/main_page/web_240315_main.jpg') no-repeat left top;
padding-top: 50px;
padding-left: 80px;
height: 270px;
width: 900px;
}
#wrapper #container #center #squeeze #slidebox .content #ban_240315 h1.ttl {
font-size: 24px;
font-family: DINPro, Arial, sans-serif;
color: #000000;
margin-bottom: 10px;
line-height: 120%;
padding: 0;
font-weight: bold;
background-color: transparent;
}
#slidebox .content #ban_240315 .ban_subtitle {
font-size: 18px;
font-family: DINPro, Arial, sans-serif;
color: #000000;
margin-bottom: 24px;
line-height: 120%;
}
#slidebox .content #ban_240315 .ban_subtitle2 {
font-size: 16px;
font-family: DINPro, Arial, sans-serif;
color: #000000;
margin-bottom: 12px;
line-height: 120%;
}
#slidebox .content #ban_240315 .ban_link a {
  font-size: 18px;
  font-family: Arial, sans-serif;
  width: 170px;
  background-color: #fff;
  color: #344437;
  background-position: right center;
  line-height: 40px;
  text-decoration: none;
}
#slidebox .content #ban_240315 .ban_link a:hover {
  font-size: 18px;
  font-family: Arial, sans-serif;
  width: 170px;
  background-color: #344437;
  color: #fff;
  background-position: right top;
  line-height: 40px;
}
/*    iw_webinar240315   */
    .body_isset_crutilka {
        position: relative;
    }
    .body_enclosure {
        position: absolute;
        top:1px;
    }
    .test1_crut {
        left: 90px;
        position: relative;
        top: 75px;
    }
    #slidebox .content .ban_link a {
        width: 160px;
    }

</style>
<div id="slidebox">
  <div class="next">
    &nbsp;</div>
  <div class="previous">
    &nbsp;</div>
  <div class="thumbs">
      <?php foreach(range(1, count($rows)) as $i) : ?>
        <a class="thumb <?= ($i==1) ?' selected_thumb' :''  ?>" href="#">&nbsp;</a>
      <?php endforeach ?>

  </div>
  <div class="wrapContainer" style="position: relative; overflow: hidden;">
    <div class="container">
		<?php
        foreach($rows as $row) :  ?>
			<div class="content" style="float: left;">
                <?php if ($row['body']) : ?>
                    <div class="body_isset_crutilka">
                        <?=$row['field_img_baner']?>
                        <div class="body_enclosure"><?=$row['body']?></div>
                    </div>
                <?php else : ?>
				<div>
				    <a href="<?=$row['field_link_baner']?>">
				        <?=$row['field_img_baner']?>
				    </a>
				</div>
                <?php endif ?>
      		</div>
		<?php endforeach; ?>
  	</div>
  </div>
</div>