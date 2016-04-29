<div class="full_slider">
    <div style="position: relative; width: 100%">
        <?php foreach($rows as $row) :  ?>
            <?php $color =  (strstr($row['field_background_baner'], '#'))  ?$row['field_background_baner'] : "url({$row['field_background_baner']})"  ?>
            <div class="ramka" id="bxslider_<?=$row['nid']?>" style="background: <?=$color?>;"></div>
        <?php endforeach ?>
    </div>

    <div class="container">
        <div style="width: 100%; overflow: hidden; position: relative; height: 504px;">
            <ul class="bxsliders">
                <?php foreach($rows as $row) :  ?>
                    <li class="bxslider_<?=$row['nid']?>">
                        <?=$row['field_img_baner']?>
                        <span><?=$row['body']?></span>
                    </li>
                <?php endforeach ?>
            <div class="bx-wrapper">
                <a class="bx-prev" href="">Prev</a>
                <a class="bx-next" href="">Next</a>
            </div>
            <div class="ss"> </div>
        </div>
    </div>

</div>
<script>
    (function ($) {
        Drupal.behaviors.Slider = {
            attach:function (context, settings) {
                var fWidth = $(window).width();
                var flag = true;
                var contWidth =  $('.full_slider .container').width();

                function positionSlider() {
                    var str = '';
                    var posRamka = 0;
                    var posLi = 0;
                    $('.ramka').each(function() {
                        $(this).css({"left": posRamka+"px"});
                        posRamka += fWidth;

                    })
                    $('.bxsliders li').each(function(i) {
                        $(this).css({"left": posLi+"px"});
                        posLi += contWidth;
                        str += '<a class="bx_nav" href="" data-href="'+$(this).attr('class')+'"><span>'+ i +'</span></a>';
                    })
                    return str;
                }

                var str = positionSlider();
                $('.ss').append(str);
                $('.bx_nav:first').addClass('active');

                $.fn.touchScrolling = function(){
                    var startPos = 0,
                        self = $(this);

                    self.on('touchstart', function(event) {
                        var e = event.originalEvent;
                        startPos = e.touches[0].pageX;
                        e.preventDefault();
                    });
                    var lastMove = null;
                    self.on('touchmove', function(event) {
                        lastMove = event;
                    });
                    self.on('touchend', function(event) {
                        var e = lastMove.originalEvent;

                        if ((startPos - 25) > e.touches[0].pageX) {
                            $(".bx-next").click();
                        }
                        if ( (startPos + 25) < e.touches[0].pageX) {
                            $(".bx-prev").click();
                        }
                    });
                };

                $.fn.sliderClickNav = function(property) {
                    this.on('click', function(e) {
                        e.preventDefault();
                        //positionSlider();
                        if(flag){
                            if (property == 'prev') {
                                $("div.ramka:last").css("left","-"+fWidth+'px');
                                $("div.ramka:first").before($("div.ramka:last"));
                                $("div.ramka").animate({"left":"+="+fWidth+"px"},500);

                                $(".bxsliders li:last").css("left","-"+contWidth+'px');
                                $(".bxsliders li:first").before($(".bxsliders li:last"));
                                $(".bxsliders li").animate({"left":"+="+contWidth+"px"},500);
                            } else {
                                var el = $(".ramka:last").css("left");
                                el = parseInt(el);
                                if (el <= -fWidth) {
                                    positionSlider();
                                }
                                $(".bxsliders li:last").after($(".bxsliders li:first"));
                                $(".bxsliders li").animate({"left":"-="+contWidth+"px"},500);
                                $("div.ramka:last").after($("div.ramka:first"));
                                $("div.ramka").animate({"left":"-="+fWidth+"px"},500);
                            }

                            $(".bx_nav").removeClass('active')
                                        .filter(
                                            function(i) {
                                                return $(this).data('href') == $('.ramka:first').attr('id')
                                            })
                                        .addClass('active');
                            //$(".bx_nav").removeClass('active')
                            //$('.bx_nav[data-href="'+$('.ramka:first').attr('id')+'"]').addClass('active');

                            flag = false;
                            setTimeout(function() {
                                flag = true;
                            },600);
                        }
                    })
                }


                $('.bxsliders li').touchScrolling();
                $(".bx-prev").sliderClickNav('prev');
                $(".bx-next").sliderClickNav('next');

                $(".bx_nav").on('click', function(e){
                    e.preventDefault();
                    if(flag){
                        var index = parseInt($(".bxsliders li."+$(this).data('href')).css('left'));
                        if (index != 0) {
                            positionSlider();
                            $('#'+$(this).data('href')).css("left","-"+fWidth+'px');
                            $("div.ramka:first").before($('#'+$(this).data('href')));
                            $("div.ramka").animate({"left":"+="+fWidth+"px"},500);

                            $('.'+$(this).data('href')).css("left","-"+contWidth+'px');
                            $(".bxsliders li:first").before($('.'+$(this).data('href')));
                            $(".bxsliders li").animate({"left":"+="+contWidth+"px"},500);

                            $(".bx_nav").removeClass('active')
                                .filter(
                                function(i) {
                                    return $(this).data('href') == $('.ramka:first').attr('id')
                                })
                                .addClass('active');

                           // $(".bx_nav").removeClass('active');
                          //  $(this).addClass('active');


                            flag = false;
                            setTimeout(function() {
                                flag = true;
                            },600);
                        }
                    }
                })
            }
        }
    }) (jQuery);


</script>