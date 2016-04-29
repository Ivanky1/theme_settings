(function ($) {
  Drupal.behaviors.Livedemo = {
    attach: function (context, settings) {
    	var isMobile = { 
		Android: function() { 
			return navigator.userAgent.match(/Android/i); 
		}, 
		BlackBerry: function() { 
			return navigator.userAgent.match(/BlackBerry/i); 
		}, 
		iOS: function() { 
			return navigator.userAgent.match(/iPhone|iPad|iPod/i); 
		},
		Opera: function() { 
			return navigator.userAgent.match(/Opera Mini/i); 
		}, 
		Windows: function() { 
			return navigator.userAgent.match(/IEMobile/i); 
		}, 
		any: function() { 
			return (isMobile.Android() || isMobile.BlackBerry() || isMobile.iOS() || isMobile.Opera() || isMobile.Windows()); 
		} 
	};
    	var cookies = $.cookie('cookie_ajax_rlm_block');    	
		if(isMobile.any())
		{}
		else
		{
			if (!cookies) {
	    		setTimeout(function(){   
	    			$("#in-block-198").show("scale");
				}, 3000);
	    	}
		}
    	
    	$(".close").click(function(){
    		$("#in-block-198").hide();
    		$.cookie('cookie_ajax_rlm_block', '2', {expires: 30, path: '/'});
    	});
    	$(".before_ajax_rlm_block").click(function(){
    		$("#in-block-198").hide();
    		$.cookie('cookie_ajax_rlm_block', '2', {path: '/'});
    	});

		$("#input_ajax_rlm_block").on("click", function(){
			$(".block_email_style").hide();
			$(".block_vanga_style").hide();
			$("#email_ajax_rlm_block").css("border-color", "#b4c179");
			var e_mail = $("#email_ajax_rlm_block").val();
			var reG = /@/;
			if (reG.test(e_mail)) {
				$("#email_ajax_rlm_block").css("color", "green");
			} else {
				$("#email_ajax_rlm_block").css("border-color", "#ff0000");
		        return false;
			}
			if (e_mail) {
				$.ajax({
			        type: 'POST',
			        url: '/send/mail/add',
			        data: "mail_add=" + e_mail,
			        success: function(msg) {
			           otvet = msg;
			           if (otvet == 1) {
    						$("#in-block-198").hide();
    						$.cookie('cookie_ajax_rlm_block', '2', {expires: 35000, path: '/'});
			           } else if (otvet == 2) {
    						$("#in-block-198").hide();
    						$.cookie('cookie_ajax_rlm_block', '2', {expires: 35000, path: '/'});
		        			return false;
			           } else if (otvet == 3) {
			           		$(".block_email_style").show();	
		       				 return false;
			           }

			        }
		    	});
			}
		        return false;
		});
    }
  }
})
(jQuery);