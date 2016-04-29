		var COOKIE_NAME = 'iwab1';
        var options = { path: '/', expires: 10 };  
        var cookie_now = getCookie(COOKIE_NAME);
        var cont_num;
        if(cookie_now)
        	{ 
                
        		cookie_now = cookie_now.toString();
        		document.getElementById(cookie_now).style.display="block";
        		cookielink = document.getElementById('edit-submitted-cookie');
            cookielink.value = cookie_now;
                /*for(var i=0; i < cookielink.length; i++) { 
                  cookiehref = cookielink[i].href;
                  cookienewhref = cookiehref+"?cookie="+cookie_now;
                  cookielink[i].href=cookienewhref;
                }
        		$.cookie(COOKIE_NAME, null, options);*/
            cont_num = cookie_now;
        	}
        else
        	{
        		numblock = Math.floor(Math.random() * 2)+1;
				    abcont = "cookie" + numblock;
        		document.cookie = COOKIE_NAME+"="+abcont+"; path=/; expires=10";
				    document.getElementById(abcont).style.display="block";
            cookielink = document.getElementById('edit-submitted-cookie');
            cookielink.value = abcont;
               /* cookielink = document.getElementsByClassName("cookieid");
                for(var i=0; i < cookielink.length; i++) { 
                  cookiehref = cookielink[i].href;
                  cookienewhref = cookiehref+"?cookie="+abcont;
                  cookielink[i].href=cookienewhref;
                }*/
            cont_num = abcont;
        	}
          _gaq.push(['_trackEvent', 'content_number', cont_num]);
          
    function getCookie(name) {
      var matches = document.cookie.match(new RegExp(
        "(?:^|; )" + name.replace(/([\.$?*|{}\(\)\[\]\\\/\+^])/g, '\\$1') + "=([^;]*)"
      ));
      return matches ? decodeURIComponent(matches[1]) : undefined;
    }



 /*
        // установить cookie
        $('#setCookies').click(function() {
        $.cookie(COOKIE_NAME, 'infowatch.ru', options);
			return false;
         });
 
        // получить cookie
        $('#getCookies').click(function() {
            alert($.cookie(COOKIE_NAME));
            return false;
         });
 
        // удалить cookie
        $('#delCookies').click(function() {
            $.cookie(COOKIE_NAME, null, options);
            return false;
        });

function randomblock () {
	numblock = Math.floor(Math.random() * 2)+1;
	div2 = "cookie"+numblock;
	document.getElementById(div2).style.display="block";
	return 0;
}
randomblock();*/