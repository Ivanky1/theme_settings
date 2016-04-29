jQuery( document ).ready(function() {
    jQuery(".li_left").on("click", "a.norm", function(){
          link_help = jQuery(this).attr("href");
          link_help2 = ".map." + link_help.substr(1) + "_map";
          jQuery(".li_left a").removeClass("active").addClass("norm");
          jQuery(this).removeClass("norm").addClass("active");
          jQuery(".map a.active").removeClass("active").addClass("norm");
          link_help2 = jQuery(link_help2)[0];
          jQuery(link_help2).children("a").addClass("active").removeClass("norm");
          jQuery(".more").append(jQuery(".bl_more.active").removeClass("active"));
          (jQuery(".bl_more.active")).remove();
          jQuery(link_help).addClass("active");
          jQuery("#bl_more").append(jQuery(link_help)).show();
          return false;
      });
      jQuery(".map").on("click", "a.norm", function(){
          link_help = jQuery(this).attr("href");
          link_help2 = ".li_left." + link_help.substr(1) + "_map";
          jQuery(".map a").removeClass("active").addClass("norm");
          jQuery(this).removeClass("norm").addClass("active");
          jQuery(".li_left a.active").removeClass("active").addClass("norm");
          link_help2 = jQuery(link_help2)[0];
          jQuery(link_help2).children("a").addClass("active").removeClass("norm");
          jQuery(".more").append(jQuery(".bl_more.active").removeClass("active"));
          (jQuery(".bl_more.active")).remove();
          jQuery(link_help).addClass("active");
          jQuery("#bl_more").append(jQuery(link_help)).show();
          return false;
      });
      jQuery(".li_left").on("click", "a.active", function(){
          jQuery(this).removeClass("active").addClass("norm");
          jQuery(".map a.active").removeClass("active").addClass("norm");
          jQuery(".more").append(jQuery(".bl_more.active").removeClass("active"));
          jQuery(".bl_more.active").remove();
          jQuery("#bl_more").hide();
          return false;
      });
      jQuery(".map").on("click", "a.active", function(){
          jQuery(this).removeClass("active").addClass("norm");
          jQuery(".li_left a.active").removeClass("active").addClass("norm");
          jQuery(".more").append(jQuery(".bl_more.active").removeClass("active"));
          jQuery(".bl_more.active").remove();
          jQuery("#bl_more").hide();
          return false;
      });

      jQuery(".close2").on("click", function(){
          jQuery(".li_left a.active").removeClass("active").addClass("norm");
          jQuery(".map a.active").removeClass("active").addClass("norm");
          jQuery(".more").append(jQuery(".bl_more.active").removeClass("active"));
          jQuery(".bl_more.active").remove();
          jQuery("#bl_more").hide();
          return false;
      });
});


function Open(e)
	{
	  var href = e.getAttribute("href");
	  var x=document.getElementById(href);
	  if ( x.style.display == 'block' )
	  {
	    jQuery(x).slideUp('slow'); //'fast' 'normal' 'slow';
	    jQuery(x).toggleClass('active');
	  }
	  else {
	    jQuery(x).slideDown('slow'); 
	    jQuery(x).toggleClass('active');
	  }
	  jQuery(e).toggleClass('active');
	  return false;
	};
function Openbl1(e)
	{
	  var href = e.getAttribute("href");
	  var href2 = e.getAttribute("ud");
	  var x=document.getElementById(href);
	  var x1=document.getElementById(href2);
	  var tt="Openbl1_link";  
	  var x2=document.getElementsByClassName(tt);
	  if (jQuery(x).hasClass('active')) {}
	  else
	  {
      jQuery(x1).hide();
      jQuery(x1).removeClass('active');
	  jQuery(x2).removeClass('active');
      jQuery(x).fadeIn();
	  jQuery(x).addClass('active');
	  jQuery(e).addClass('active');
	  }
	  return false;
	};
function Openbl2(e)
	{
	  var href = e.getAttribute("href");
	  var x=document.getElementById(href);
	  var tt="Openbl2_link";  
	  var tt2="white_bl_c6";
	  var x2=document.getElementsByClassName(tt);
	  var x3=document.getElementsByClassName(tt2);
	  if (jQuery(x).hasClass('active')) {}
	    else
	  {
	    jQuery(x2).removeClass('active');
	    jQuery(x3).removeClass('active');
        jQuery('.white_bl_c6').hide();

        //  jQuery(x).fadeIn('slow');
        jQuery(x).fadeIn();
	    jQuery(x).addClass('active');
	    jQuery(e).addClass('active');

	  }
	  return false;
	};

function dynb_open(e)
	{  
	  /*var startbl = "dynb1";
	  var startbl2=document.getElementById(startbl);
	  var startbl3=document.getElementsByClassName(startbl);*/
	  var href = e.getAttribute("href");
	  var x=document.getElementById(href);
	  if ( x.style.display == 'block' )
		{
		    jQuery(x).slideUp('slow');
		    jQuery(x).toggleClass('active');
		}
	  else 
	  	{
		    /*jQuery(startbl2).slideUp('slow');
		    jQuery(startbl2).removeClass('active');
		    jQuery(startbl3).removeClass('active');*/
		    jQuery(x).slideDown('slow'); 
		    jQuery(x).toggleClass('active');
		    startbl = href;
		}
	  jQuery(e).toggleClass('active');
	  return false;
	};
function Opencl(e)
	{
		var href = e.getAttribute("href");
		var x=document.getElementById(href);
		var x2=jQuery(".bl_clients");
		var x3=jQuery(".link_cl_tme_bl");
	if ( x.style.display != 'block' )
	{
	  jQuery(x2).hide();
	  jQuery(x).fadeIn('slow');
	  jQuery(x3).removeClass('active');
	  jQuery(e).addClass('active');
	}
		return false;
	};
	/***** Gde to tyt moi script video *****/
 function change_video(e){
  var href = e.getAttribute('href');
  document.getElementById("tme_bl_video_all").style.display="none";
  document.getElementById("ytPlayer").style.display="block";
  document.getElementById("back_href").style.display="block";
  ga('send', 'event', 'select_anyvideo_tme', 'click');
  document.getElementById("ytPlayer").setAttribute('data', 'http://www.youtube.com/v/' + href);
  /*loadVideo(href);*/
  return false;
  }
  /*function loadVideo(videoID) {
  var params = { allowScriptAccess: "always" };
  var atts = { id: "ytPlayer" };
  swfobject.embedSWF("http://www.youtube.com/v/" + videoID +
             "?version=3&enablejsapi=1&playerapiid=player1",
             "ytPlayer", "640", "480", "9", null, null, params, atts);
  }*/
  function back_video() {
    document.getElementById("ytPlayer").style.display="none";
    document.getElementById("back_href").style.display="none";
    document.getElementById("tme_bl_video_all").style.display="block";
  }
/***** End script video *****/