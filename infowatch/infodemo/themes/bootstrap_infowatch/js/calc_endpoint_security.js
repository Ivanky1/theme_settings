(function ($) { 
  Drupal.behaviors.Calc2_leacks = {
    attach: function (context, settings) {
        modul_end=1;
            modul=[0, 0, 0, 0, 0, 1];
        mdul_val=0;
        var mail_href;
        $(".help").on("click", function () {
            $(".help_block").append($(".itogo .cbox.active").removeClass("active"));
            $(".itogo .cbox.active").remove();
            $(".help_block").append($(".btn_holder .cbox.active").removeClass("active"));
            $(".btn_holder .cbox.active").remove();
            link_help = $(this).attr("href");
            $(link_help).addClass("active");
            $(".itogo").append($(link_help));
            return false;
        });
        $(".itogo").on("click", ".cbox.active", function () {
            $(".help_block").append($(".itogo .cbox.active").removeClass("active"));
            $(".itogo .cbox.active").remove();
            return false;
        });
        $(".btn_holder").on("click", ".close", function () {
            $(".help_block").append($(".btn_holder .cbox.active").removeClass("active"));
            $(".btn_holder .cbox.active").remove();
            return false;
        });
        $("#mail_for").on("click", ".close", function () {
            $("#mail_for.cbox.active").removeClass("active");
            return false;
        });
        $("#mod").on("click", ".why_box", function () {
            $(this).toggleClass("active");
            $(this).next().slideToggle();
            return false;
        });
        $(".title_raz").click(function () {
            $(".error").removeClass("error");
            $(".help_mee").removeClass("active");
            $(".itogo .cbox1.active .moduls_this").filter(".active").removeClass("active").hide();
            $(".help_block").append($(".itogo .cbox1.active").removeClass("active"));
            $(".itogo .cbox1.active").remove();
            $("#Itogo").hide();
            $(".more").addClass("active");
            $(this).addClass("active");
            $('html, body').animate({
                scrollTop: $("#body_calc").offset().top
                }, 500);
            return false;
        });
        $("#again").click(function () {
            $(".error").removeClass("error");
            $(".help_mee").removeClass("active");
            $(".help_block").append($(".btn_holder .cbox.active").removeClass("active"));
            $(".btn_holder .cbox.active").remove();
            $(".itogo .cbox1.active .moduls_this").filter(".active").removeClass("active").hide();
            $(".help_block").append($(".itogo .cbox1.active").removeClass("active"));
            $(".itogo .cbox1.active").remove();
            $("#mod").addClass("active");
            $("#Itogo").hide();
            return false;
        });
        $(".moduls_ul .name_modul").on("click", function () {
            modul_end=1;
            $(".error").removeClass("error");
            $(this).parent("li").toggleClass("checked");
            tid_this = $(this).attr("tid");
            if ($(this).parent("li").hasClass("checked")) {
                    znk = 1;
                } else {
                    znk = -1;
                }
            if (0 < tid_this && tid_this <= 2) {
                modul[0] = modul[0]+(1*znk);
            } else if (2 < tid_this && tid_this <= 5) {
                modul[1] = modul[1]+(1*znk);
            }  else if (5 < tid_this && tid_this < 8) {
                modul[2] = modul[2]+(1*znk);
            }  else if (8 < tid_this && tid_this <= 11) {
                modul[3] = modul[3]+(1*znk);
            }  else if (tid_this == 12) {
                modul[4] = modul[4]+(1*znk);
            }   else if (tid_this == 8) {
                modul[5] = modul[5]-(1*znk);
            } 
            for (var j = 0; j < 6; j++) {
              if(modul[j] != 0) {
              } else {                
                modul_end=0;
              }
            }
        });                 
        $(".raschet").click(function () {
            $(".help_block").append($(".itogo .cbox1.active").removeClass("active"));
            $(".itogo .cbox1.active").remove();
            $(".itogo .nothing").remove();
            var bottom_bl = 0;  
            var mass_this = [];
            var mass_this2 = "";
            tesss = $(".moduls_ul li.checked .name_modul");
            $(tesss).each(function(){
                mass_this[mass_this.length] = $(this).attr("tid");
            });
            for_email = mass_this;
            if(
                mass_this.toString() == (["1", "2", "5"]).toString() 
                || 
                mass_this.toString() == (["1", "2", "4", "5"]).toString() 
                || 
                mass_this.toString() == (["2", "4", "5"]).toString() 
                || 
                mass_this.toString() == (["1", "2", "4"]).toString()
                ) 
            {
                $("#bs_block").addClass("active");
                $(".itogo").append($("#bs_block"));
                for_email3 = ["99"];
            } else if (
                modul_end == 1
                || 
                mass_this.toString() == (["1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"]).toString()
                ) 
            {
                $("#ts_block").addClass("active");
                $(".itogo").append($("#ts_block"));
                for_email3 = ["88"];
            } else if (
                mass_this.toString() == ([]).toString()
                ) 
            {
                $(".itogo").append("<p class='nothing'>Выберите хотя бы один модуль</p>");
                bottom_bl = 1;
            } else {  
                $(".help_block").append($(".itogo .cbox1.active").removeClass("active")); 
                $(".itogo .cbox1.active").remove();
                $(".itogo").append($("#moduls_block"));
                $("#moduls_block").addClass("active");
                var schot = 0;
                var schot2 = 0;
                for_email3 = [];
                if($.inArray("1", mass_this) != -1 || $.inArray("8", mass_this) != -1 || $.inArray("9", mass_this) != -1 || $.inArray("10", mass_this) != -1 || $.inArray("11", mass_this) != -1) {
                    for_email3[for_email3.length] = "1";
                } 
                if($.inArray("2", mass_this) != -1 || $.inArray("3", mass_this) != -1 || $.inArray("5", mass_this) != -1) {
                    for_email3[for_email3.length] = "2";
                } 
                if($.inArray("4", mass_this) != -1) {
                    for_email3[for_email3.length] = "4";
                } 
                if($.inArray("6", mass_this) != -1) {
                    for_email3[for_email3.length] = "6";
                } 
                if($.inArray("7", mass_this) != -1) {
                    for_email3[for_email3.length] = "7";
                } 
                if($.inArray("12", mass_this) != -1) {
                    for_email3[for_email3.length] = "12";
                }
                $(for_email3).each(function(index){
                    var i = $(this)[0].toString();
                    $("#mod"+i).addClass("active");
                });
                $("#moduls_block p.moduls_this").hide().filter($(".active")).show();
            }
        for(var i=0; i<for_email3.length; i++) {
            if (i == 0) {
                mass_this2 = "/products/endpoint_security/calculation2?paket=" + for_email3[i];
            } else {
                mass_this2 = mass_this2 + "," + for_email3[i];
            }
        }
        $("#paket").attr("href", mass_this2.toString());
        mail_href = mass_this2.toString();
        $(".link_razdel .more").filter(".active").removeClass("active");
        $(".itogo").addClass("active");
        if(bottom_bl != 0){
            $("#Itogo .btn_holder").hide();
        } else {
            $("#Itogo .btn_holder").show();
        }
        $("#Itogo").show();
        $('html, body').animate({
            scrollTop: $("#body_calc").offset().top
            }, 500);
        return false;
        });
        $("#for_email").on("click", function () {
            $(".help_me").addClass("active");
            $(".help_mee").removeClass("active");
            $(".help_me2").removeClass("active");
            $(".help_me3").removeClass("active");
            $("#this_email").val("");
            link_help = $(this).attr("href");
            $(link_help).addClass("active");
            return false;
        });
        $(".go_email").on("click", function () {
            $(".help_me").removeClass("active");
            $(".help_mee").removeClass("active");
            $(".help_me2").removeClass("active");
            $(".help_me3").removeClass("active");
            var email = $("#this_email")[0].value;
            var mail_valid = /.+@.+\..+/i;
            /*for_email = for_email.replace(/\"+(.*?)\"|\'+(.*?)\'/g,'!$1!');*/
            if(mail_valid.test(email)) {
                var for_email2 = {
                    mail_calc:email,
                    number_calc:JSON.stringify(for_email3),
                    href_calc:mail_href
                };           
               $.ajax({
                      url: "/email/ajax",
                      type: "POST",
                      data: for_email2,
                      dataType: "text",
                      success: function(msg){
                         if (msg == "1") {
                            $(".help_me").removeClass("active");
                            $(".help_me2").addClass("active");
                         } else if (msg == "2") {
                            $(".help_me").removeClass("active");
                            $(".help_me1").addClass("active");
                         } else {
                            $(".help_me").removeClass("active");
                            $(".help_me3").addClass("active");
                         }
                       }
                    });
            } else {
                $(".help_me").removeClass("active");
                $(".help_mee").addClass("active");
            }
            return false;
        });
        $("#printit").on("click", function () {
                productDesc = $(".itogo .cbox1.active").html();
                var PopupPage= "<style type=\'text/css\'> p.h3_citate {font-size: 15pt;text-transform: uppercase;line-height: 120%;font-family: Arial,sans-serif;color: #434343;} p.h3_citate span {font-size: 13pt;display: inline;text-transform: none;font-family: Arial,sans-serif;color: #434343;} .citats span {display:none;} </style><div class=\'WordSection1\'><div align=\'center\'><table class=\'MsoNormalTable\' border=\'0\' cellspacing=\'0\' cellpadding=\'0\' width=\'100%\' style=\'width:100.0%;background:#FAFAFA\'><tr><td valign=\'top\' style=\'padding:0cm 0cm 0cm 0cm\'><p class=\'MsoNormal\' align=\'center\' style=\'text-align:center\'><span style=\'font-size:10.5pt;font-family:Arial,sans-serif;color:#505050\'>&nbsp;</span></p><div align=\'center\'><table class=\'MsoNormalTable\' border=\'0\' cellspacing=\'0\' cellpadding=\'0\' width=\'600\' style=\'width:600px;background-color:white;border: 1px solid #DDDDDD;\' id=\'templateContainer\'><tr style=\'background-color: #FFFFFF;\'><td align=\'center\' valign=\'top\' style=\'border-collapse: collapse;border: 0;\'><table border=\'0\' cellpadding=\'0\' cellspacing=\'0\' width=\'600\' id=\'templateHeader\' style=\'background-color: #FFFFFF;border: 0;\'><tr style=\'background-color: #FFFFFF;\'><td class=\'headerContent\' style=\'background-color: #FFFFFF; border-collapse: collapse;color: #202020;font-family: Arial;font-size: 34px;font-weight: bold;line-height: 100%;padding: 0;text-align: center;vertical-align: middle;border: 0;\'><img src=\'http://gallery.mailchimp.com/b7d4a44789f3cbd1a428a19bf/images/header.jpg\' alt=\'\' border=\'0\' style=\'margin: 0;padding: 0;max-width: 600px;border: 0;height: auto;line-height: 100%;outline: none;text-decoration: none;\' id=\'headerImage campaign-icon\'></td></tr></table></td></tr><tr><td valign=\'top\' style=\'border:none;padding:0cm 0cm 0cm 0cm\'><div align=\'center\'><table class=\'MsoNormalTable\' border=\'0\' cellspacing=\'0\' cellpadding=\'0\' width=\'600\' style=\'width:450.0pt\' id=\'templateBody\'><tr><td valign=\'top\' style=\'background:white;padding:0cm 0cm 0cm 0cm\'><table class=\'MsoNormalTable\' border=\'0\' cellspacing=\'0\' cellpadding=\'0\' width=\'100%\' style=\'width:100.0%\'><tr><td valign=\'top\' style=\'padding:15.0pt 15.0pt 15.0pt 15.0pt\'><p class=\'MsoNormal\' style=\'line-height:150%\'><span style=\'font-size:11.0pt;line-height:150%;font-family:Arial,sans-serif;color:#505050\'><strong>Система защиты информации InfoWatch EndPoint Security</strong></span></p><p class=\'MsoNormal\' style=\'line-height:150%\'><span style=\'font-size:11.0pt;line-height:150%;font-family:Arial,sans-serif;color:#505050\'>Вы воспользовались конструктором продукта InfoWatch EndPoint Security на сайте InfoWatch. В соответствии с указанными вами задачами, мы предлагаем рассмотреть конфигурацию продукта, которая наиболее им соответствует. Обращаем внимание, что данная конфигурация не содержит лишних модулей и, соответственно, вы не будете переплачивать за ненужный функционал.</span></p></td></tr></table><table class=\'MsoNormalTable\' border=\'0\' cellspacing=\'0\' cellpadding=\'0\' width=\'100%\' style=\'width:100.0%\'><tr><td valign=\'top\' style=\'padding:15.0pt 15.0pt 15.0pt 15.0pt\'><p class=\'MsoNormal\' style=\'line-height:150%\'><span style=\'font-size:11.0pt;line-height:150%;font-family:Arial,sans-serif;color:#505050\'><strong>Рекомендованный пакет поставки продукта</strong></span></p>";
                PopupPage+=productDesc;
                PopupPage+="<hr><p class=\'MsoNormal\'><span style=\'font-size:10.5pt;font-family:Arial,sans-serif;color:#505050;display:none\'>&nbsp;</span></p><p class=\'MsoNormal\' style=\'line-height:150%\'><span style=\'font-size:10.5pt;font-weight:bold;line-height:150%;font-family:Arial,sans-serif;color:#505050\'>Спасибо за интерес к продуктам InfoWatch!</span></p><p class=\'MsoNormal\'><span style=\'font-size:10.5pt;font-family:Arial,sans-serif;color:#505050;display:none\'>&nbsp;</span></p><p class=\'MsoNormal\' style=\'line-height:150%\'><span style=\'font-size:10.5pt;font-weight:normal;line-height:150%;font-family:Arial,sans-serif;color:#505050\'>По вопросам цены, а также за дополнительными консультациями обращайтесь в наш отдел продаж: +7 (495) 22-900-22, <a href=\'mailto:info@infowatch.com\'>info@infowatch.com</a></span></p></td></tr></table><p class=\'MsoNormal\'><span style=\'font-size:10.5pt;font-family:Arial,sans-serif;color:#505050;display:none\'>&nbsp;</span></p><p class=\'MsoNormal\'><span style=\'font-size:10.5pt;font-family:Arial,sans-serif;color:#505050;display:none\'>&nbsp;</span></p><table class=\'MsoNormalTable\' border=\'0\' cellspacing=\'0\' cellpadding=\'0\' width=\'100%\' style=\'width:100.0%\'><tr><td valign=\'top\' style=\'padding:0cm 0cm 0cm 0cm\'><p class=\'MsoNormal\' align=\'center\' style=\'text-align:center\'><span style=\'font-size:10.5pt;font-family:Arial,sans-serif;color:#505050\'><img border=\'0\' id=\'_x0000_i1030\' src=\'http://gallery.mailchimp.com/b7d4a44789f3cbd1a428a19bf/images/iw_line.jpg\'></span></p></td></tr></table></div></td></tr><tr><td valign=top style=\'border:none;padding:0cm 0cm 0cm 0cm\'><div align=\'center\'><table class=\'MsoNormalTable\' border=\'0\' cellspacing=\'0\' cellpadding=\'0\' width=\'600\' style=\'width:450.0pt;background:white\' id=\'templateFooter\'><tr><td valign=\'top\' style=\'padding:7.5pt 7.5pt 7.5pt 7.5pt\'><table class=\'MsoNormalTable\' border=\'0\' cellspacing=\'0\' cellpadding=\'0\' width=\'100%\' style=\'width:100.0%\'><tr><td valign=\'top\' style=\'padding:7.5pt 7.5pt 7.5pt 7.5pt\'><p class=\'MsoNormal\' style=\'line-height:125%\'><span style=\'font-size:11.0pt;line-height:150%;font-family:Arial,sans-serif;color:#505050\'>Группа компаний InfoWatch объединяет ряд российских и зарубежных разработчиков программных продуктов и решений для обеспечения информационной безопасности организаций, противодействия внешним и внутренним угрозам.<span style=\'font-size:9.0pt;line-height:125%;font-family:Arial,sans-serif;color:#707070\'><br><a href=\'http://www.infowatch.ru\'>www.infowatch.ru</a></span></span></p></td><td style=\'padding:7.5pt 7.5pt 7.5pt 7.5pt\'></td></tr></table></td></tr></table></td></tr></table></div></td></tr></table></div></td></tr></table></div><p class=\'MsoNormal\' align=\'center\' style=\'margin-bottom:12.0pt;text-align:center\'>&nbsp;</p></div>";
                var printWin = window.open('','','toolbar,width=650,height=950,scrollbars,resizable,menubar');
                printWin.document.write(PopupPage);
                printWin.document.close();
                printWin.focus();
                printWin.print();
                return false;
            });
    }
  };
})(jQuery);