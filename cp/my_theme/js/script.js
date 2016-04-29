(function($) {
    Drupal.behaviors.Js = {
        attach:function (context, settings) {




            /*$("#block-menu-menu-person-menu-head .content .menu li.expanded a").click(function(event) {
                event.preventDefault();
                if ($(this).parent("li.last").hasClass("expanded")) {
                    $(this).parent("li.last").removeClass("expanded");
                    $(this).next("ul.menu").slideUp(200);
                    $(this).removeClass("active");
                } else {
                    $(this).parent("li.last").addClass("expanded");
                    $(this).next("ul.menu").slideDown(200);
                    $(this).addClass("active");
                }
                return false;
            });*/
            $(".deals_bonus_header_li a").on("click", function () {
                if ($(this).parent(".deals_bonus_header_li").hasClass("active")) {
                    
                } else {
                    href = $(this).attr("href");
                    $(".deals_bonus_header_li").removeClass("active");
                    $(".deals_bonus_body_li").removeClass("active");
                    $(this).parent(".deals_bonus_header_li").addClass("active");
                    $(href).addClass("active");
                }
                return false;
            });

            /*Переключалка языков*/
            var language
            $('ul.language-switcher-locale-url li').each(function() {
                if ($(this).hasClass('active')) {
                    if ($(this).hasClass('last')) {
                        $(this).removeClass('last');
                        $(this).addClass('first')
                    }
                    language = $(this);
                    $(this).remove();
                } else {
                    if ($(this).hasClass('first')) {
                        $(this).removeClass('first');
                        $(this).addClass('last')
                    }
                }
            })
            $('ul.language-switcher-locale-url').prepend(language);

            /* Калькулятор Желаний*/
            /*$('body').html("<center><h2 class='title ptop48'>ДАй МНЕ ЦИФРУ !!!!</h2></center>");*/
            if ($('.bonus').length > 0) {
                var calc_money = parseFloat($($("#block-iw-bonus-iw-bonus-profit-calculator .iw_summa_full")[0]).text());
                $("#res_calc").html("<p>До Mercedes C класса Вам нужно продать <strong>" + (Math.floor((2000000-calc_money) / (320000*0.05))) + "</strong> лицензий InfoWatch Traffic Monitor Standard!</p><p style='font-style:italic'>В коридоре 200-300 лицензий!</p>");
                $('#calc_Item').change(function() {
                    if($(".calc_block").hasClass("calc_item1")) {
                        $(".calc_block").removeClass("calc_item1");
                    } else if ($(".calc_block").hasClass("calc_item2")) {
                        $(".calc_block").removeClass("calc_item2");
                    }  else {
                        $(".calc_block").removeClass("calc_item3");
                    }
                    var calc_val = $( this ).val();
                    var calc_text;
                    var calc_res;
                    if(calc_val == 0) {
                        calc_res = Math.floor((2000000-calc_money) / (320000*0.05));
                        calc_text = "<p>До Mercedes C класса Вам нужно продать <strong>" + calc_res + "</strong> лицензий InfoWatch Traffic Monitor Standard!</p><p style='font-style:italic'>В коридоре 200-300 лицензий!</p>"
                    } else if (calc_val == 1) {
                        calc_res = Math.floor((14000000 -calc_money) / (320000*0.05));
                        calc_text = "<p>До дома у моря осталось <strong>" + calc_res + "</strong> лицензий InfoWatch Traffic Monitor Standard!</p><p style='font-style:italic'>В коридоре 200-300 лицензий!</p>"
                    } else {
                        calc_res = Math.floor((1200000 -calc_money) / (200000*0.05));
                        calc_text = "<p>До кругосветного путешествия осталось <strong>" + calc_res + "</strong> лицензий InfoWatch Traffic Monitor Standard!</p><p style='font-style:italic'>В коридоре до 100 лицензий!</p>"
                    }
                    $("#res_calc").html(calc_text);
                    $(".calc_block").addClass("calc_item" + calc_val);
                });
            }


            window.onload = function() {
                if (!$('#my-block-login').length) {
                    $("#block-menu-menu-person-menu-head li.expanded>a").click(function() {
                        ths2 = $(this).parent('li.expanded');
                        if ($(this).hasClass("active")) {
                            $(this).parent('li.expanded').find('>ul').slideUp(200);
                            $(this).removeClass("active");
                        } else {
                            $(this).parent('li.expanded').find('>ul').slideDown(200);
                            $(this).addClass("active");
                        }
                        return false;
                    });
                } else {
                    $("#block-block-login-my-block-login h2.title").click(function() {
                        if ($(this).hasClass("active")) {
                            $('#my-block-login').slideUp(200);
                            $(this).removeClass("active");
                        } else {
                            $('#my-block-login').slideDown(200);
                            $(this).addClass("active");
                        }
                    });
                }

                $('.types_select').hide();
                $('#support_bl_more').hide();
                $('.relations').hide();

                $('.type_questions_help').change();
                $('.type_questions_help').on('change', function() {
                    $('.types_select').hide();
                    $('.relations').hide();
                    $('#support_bl_more').hide();
                    if ($(this).find('option:selected').val() != '') {
                        $('.types_select').eq(($(this).find('option:selected').index()-1)).show();
                        $('.types_select').eq(($(this).find('option:selected').index()-1)).change();
                    }
                })

                $('.types_select').on('change', function() {
                    //$('#support_bl_more').hide();
                    $('.support_block').remove();
                    $('.relations').hide();
                    if ($(this).find('option:selected').val() != '' && $(this).is(':visible')) {
                        if ($(this).find('option:selected').val() == 'full' && $('#my-block-login').length) {
                            $('body').append("<div class='support_block'>"+$('#my-block-login').html()+"</div>")
                            $.colorbox({html: $('.support_block'), width: 350})
                        } else {
                            $('.relations').show();
                        }
                    }
                })

                $('.chat_button').live('click', function() {
                    $( this).unbind( "click" );

                    window.location = ($('body.i18n-en').length) ?'/en/support/contact-us/chat' :'/support/contact-us/chat';
                    //$('.chat_in').click();
                })

                $('#forma_request_help .chat_request_form').on('click', function() {
                    var params = ($('.types_select[style="display: block;"] option:selected').val().length)
                        ?'?theme='+$('.types_select[style="display: block;"] option:selected').val()
                        :'';
                    location.href= ($('.i18n-ru').length) ?'/support/request'+params :'/en/support/request'+params;
                })

                if ($.cookie('chat') && $.cookie('chat') === 'start' ) {
                    $('.type_questions_help option').eq(1).attr('selected', 'selected');
                    $('.types_select').eq(0).show();
                    $('.types_select').eq(0).find('select option').eq(1).attr('selected', 'selected');
                    $('.relations').show();
                    $.removeCookie('chat');
                }
            }
        }
    }
})(jQuery);