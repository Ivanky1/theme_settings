$(document).ready(function() {
    for_news_esc = [];
    if (news_esc_elem["news_esc_width"]) {
    	for_news_esc[0] = news_esc_elem["news_esc_width"]
    } else {
    	for_news_esc[0] = 0;
    }
    if (news_esc_elem["news_esc_nomber"]) {
    	for_news_esc[1] = news_esc_elem["news_esc_nomber"]
    } else {
    	for_news_esc[1] = 5;
    }
    if (news_esc_elem["news_esc_color"]) {
    	for_news_esc[2] = news_esc_elem["news_esc_color"]
    } else {
    	for_news_esc[2] = "006a1c";
    }
    if (news_esc_elem.hasOwnProperty('news_esc_body') && news_esc_elem.news_esc_body == 1) {
        for_news_esc[3] = 'body';
    }
    $.ajax({
      url: "http://www.infowatch.ru/iframe/news/callback",
      crossDomain: true,
      type: "POST",
      data: 'news_escape='+JSON.stringify(for_news_esc),
      success: function(msg){
         $("#news_esc").html(msg);
        },
       error: function () {
          console.log('POST FAILED');
        }
    });
});