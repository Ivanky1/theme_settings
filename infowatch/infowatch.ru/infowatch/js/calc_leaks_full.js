(function ($) {
  Drupal.behaviors.Calc_leacks = {
    attach: function (context, settings) { 
        var numbersonly = /^\d+$/;
        var numbersonly2 = /^[+-]?((\d+(\.\d*)?)|(\.\d+))([Ee][+-]?\d+)?$/;
        var info = [];
        var in_default = [
        "finans", //0 Отрасль
        500, //1 Количество работников
        10000, //2 Количество клиентов (физ.лица)
        1000, //3 Количество клиентов (юр.лица)
        10, //4 Сканы паспортов и паспортные данные
        0, //5 ПДн работников
        0, //6 Номера пластиковых карт
        0, //7 ПДн Клиентов (тип 1) - "не критичные данные"
        10, //8 ПДн Клиентов (тип 2) - "критичные данные"
        0, //9 БД Клиентов (юр.лица)
        0, //10 Логины и пароли
        10000, //11 Средняя выручка на 1 клиента (физ.лицо) в год
        100000, //12 Средняя выручка на 1 клиента (юр.лицо) в год
        1, //13 Уровень конкуренции (субъективный)
        0.05, //14 Ориентировочный прирост клиентов (физ.лица) в год (%)
        0.05, //15 Ориентировочный прирост клиентов (юр.лица) в год (%)
        0.01, //16 Процент клиентов (физ.лица), прекративших пользоваться услугами компании из-за утечки информации
        0.001, //17 Процент клиентов (юр.лица), прекративших пользоваться услугами компании из-за утечки информации
        0.1, //18 Процент потенциальных клиентов (физ.лица), передумавших пользоваться услугами команиииз-за утечки информации
        0.1, //19 Процент потенциальных клиентов (юр.лица), передумавших пользоваться услугами команиииз-за утечки информации
        0.25, //20 Процент клиентов (физ.лица), которых могут переманить конкуренты, делая конкретные целевые предложения
        0.05, //21 Процент клиентов (юр.лица), которых могут переманить конкуренты, делая конкретные целевые предложения        
        ]; //входные данные с формы   
       $("#form_0_1").val(in_default[1]);
       $("#form_0_2").val(in_default[2]);
       $("#form_0_4").val(in_default[3]);
       $("#form_0_3").val(in_default[11]);
       $("#form_0_5").val(in_default[12]);
       $("#form_1_1").val(in_default[4]);
       $("#form_1_2").val(in_default[5]);
       $("#form_1_3").val(in_default[6]);
       $("#form_1_4").val(in_default[7]);
       $("#form_1_5").val(in_default[8]);
       $("#form_1_6").val(in_default[9]);
       $("#form_1_7").val(in_default[10]);
       $("#form_2_1").val(in_default[14]*100);
       $("#form_2_2").val(in_default[15]*100);
       $("#form_2_3").val(in_default[16]*100);
       $("#form_2_4").val(in_default[17]*100);
       $("#form_2_5").val(in_default[18]*100);
       $("#form_2_6").val(in_default[19]*100);
       $("#form_2_7").val(in_default[20]*100);
       $("#form_2_8").val(in_default[21]*100);
        var ex_koof = [
            50000,  //0 зп специалиста по ИБ руб./месяц
            50000,  //1 зп специалиста по ИТ руб./месяц
            50000,  //2 зп специалиста по PR руб./месяц
            50000,  //3 зп юриста руб./месяц
            50000,  //4 зп специалиста HR руб./месяц
            50000,  //5 зп руководителя HR руб./месяц
            500000,  //6 Стоимость консалтинговых услуг руб./месяц
            50000,  //7 Стоимость мониторинга СМИ руб./месяц
            50000,  //8 Стоимость организации Call-центр руб./месяц
            500000,  //9 Стоимость СЗИ для мониторинга, анализа и расследования инцидентов руб.
            500 //10 Стоимость перевыпуска, уведомления и доставки 1й пластиковой карты
        ]; //эксп. коэффициенты
        var korect_koof_kolvo = [2,0,0,0,2,0,0]; //Корректирующий коэф.по количеству записей
       var koof_konkyr = [ 1, 0.75, 0.5];//in_default[13]
        var reag ={"bank":[], "dont_int":[], "health":[], "tvcom":[], "others":[]}; //реагирования
       var vibor_otrasl =["finans","gos","obrazovanie","zdravohranenie","razvrat","riteil","tv_it","promishl","transports","drugie"];        
        otr_naz=$("#vibor option:selected").text();
         var otrasl_now = $("#vibor option:selected").val();
        $("#vibor").change(function(){
           otrasl_now = $("#vibor option:selected").val();
           in_default[0]=vibor_otrasl[otrasl_now];
           otr_naz=$("#vibor option:selected").text();
        });      
        $("#form_0_6").change(function(){
           var koof_konkyr_now = $("#form_0_6 option:selected").val();
           in_default[13]=koof_konkyr[koof_konkyr_now];
        });
$("#go_baby").click(function(){
        var flag=0;
        $(".error_here").removeClass(".error_here").css("border", "1px solid #466d8a")
        var t1 = $(".label_for_this.tip1 input");
        for (var i = 0; i < t1.length; i++) {
            if(t1[i].value>1000000000){
                $(t1[i]).css("border", "1px solid red").addClass("error_here");
                flag=1;            
            } else  if (!numbersonly.test(t1[i].value)) {
                $(t1[i]).css("border", "1px solid red").addClass("error_here");
                flag=2;
            }
        };
        var t2 = $(".label_for_this.tip2 input");
        for (var i = 0; i < t2.length; i++) {
            if(t2[i].value>7000000000){
                $(t2[i]).css("border", "1px solid red").addClass("error_here");
                flag=1;            
            } else  if (!numbersonly.test(t2[i].value)) {
                $(t2[i]).css("border", "1px solid red").addClass("error_here");
                flag=2;
            }
        };
        var t3 = $(".label_for_this.tip3 input");
        for (var i = 0; i < t3.length; i++) {
            if(t3[i].value>100){
                $(t3[i]).css("border", "1px solid red").addClass("error_here");
                flag=1;            
            } else  if (!numbersonly2.test(t3[i].value)) {
                $(t3[i]).css("border", "1px solid red").addClass("error_here");
                flag=3;
            }
        };
        if(flag==1) {
           $(".help_block").append($(".clerix .cbox.active").removeClass("active"));
                $(".clerix .cbox.active").remove();
                link_help = "#error_bl1";
                $(link_help).addClass("active");
                var here_er = $(".error_here");
                $(here_er[0]).parent().parent().parent(".clerix").append($(link_help));
                $.scrollTo("#error_bl");
                return false;
        } else if (flag==2) {
            $(".help_block").append($(".clerix .cbox.active").removeClass("active"));
            $(".clerix .cbox.active").remove();
            link_help = "#error_bl2";
            $(link_help).addClass("active");
            var here_er = $(".error_here");
            $(here_er[0]).parent().parent().parent(".clerix").append($(link_help));
            return false; 
        } else if (flag==3) {
            $(".help_block").append($(".clerix .cbox.active").removeClass("active"));
            $(".clerix .cbox.active").remove();
            link_help = "#error_bl3";
            $(link_help).addClass("active");
            var here_er = $(".error_here");
            $(here_er[0]).parent().parent().parent(".clerix").append($(link_help));
            return false; 
            }                 
        in_default[1] = Math.abs(parseInt($("#form_0_1").val()));
        in_default[2] = Math.abs(parseInt($("#form_0_2").val()));
        in_default[3] = Math.abs(parseInt($("#form_0_4").val()));
        in_default[4] = Math.abs(parseInt($("#form_1_1").val()));
        in_default[5] = Math.abs(parseInt($("#form_1_2").val()));
        in_default[6] = Math.abs(parseInt($("#form_1_3").val()));
        in_default[7] = Math.abs(parseInt($("#form_1_4").val()));
        in_default[8] = Math.abs(parseInt($("#form_1_5").val()));
        in_default[9] = Math.abs(parseInt($("#form_1_6").val()));
        in_default[10] = Math.abs(parseInt($("#form_1_7").val()));
        in_default[11] = Math.abs(parseInt($("#form_0_3").val()));
        in_default[12] = Math.abs(parseInt($("#form_0_5").val()));
        in_default[14] = Math.abs(parseFloat($("#form_2_1").val()))/100;
        in_default[15] = Math.abs(parseFloat($("#form_2_2").val()))/100;
        in_default[16] = Math.abs(parseFloat($("#form_2_3").val()))/100;
        in_default[17] = Math.abs(parseFloat($("#form_2_4").val()))/100;
        in_default[18] = Math.abs(parseFloat($("#form_2_5").val()))/100;
        in_default[19] = Math.abs(parseFloat($("#form_2_6").val()))/100;
        in_default[20] = Math.abs(parseFloat($("#form_2_7").val()))/100;
        in_default[21] = Math.abs(parseFloat($("#form_2_8").val()))/100;
        var reag_arr_ib_it={
            "bank": [
            ((ex_koof[0]*2+ex_koof[1]*2)*0.5),
            ((ex_koof[0]*2+ex_koof[1]*2)*0.25),
            ((ex_koof[0]*2+ex_koof[1]*2)*0.75),
            ((ex_koof[0]*2+ex_koof[1]*2)*0.5),
            ((ex_koof[0]*2+ex_koof[1]*2)*0.75),
            ((ex_koof[0]*2+ex_koof[1]*2)*0.75),
            ((ex_koof[0]*2+ex_koof[1]*2)*0.75)],
            "dont_int": [
            ((ex_koof[0]*2+ex_koof[1]*2)*0.25),
            ((ex_koof[0]*2+ex_koof[1]*2)*0.25)],
            "health": [
            ((ex_koof[0]*2+ex_koof[1]*2)*0.75),
            ((ex_koof[0]*2+ex_koof[1]*2)*0.75)],
            "tvcom": [
            ((ex_koof[0]*2+ex_koof[1]*2)*0.75),
            ((ex_koof[0]*2+ex_koof[1]*2)*0.75)],
            "others": [
            ((ex_koof[0]*2+ex_koof[1]*2)*0.5),
            ((ex_koof[0]*2+ex_koof[1]*2)*0.5)]
        }; //Трудозатраты сотрудников ИБ и ИТ
        var reag_arr_kadr_lawyer={
            "bank": [
            ((ex_koof[3]*2+ex_koof[4]*2)*0.25),
            ((ex_koof[3]*2+ex_koof[4]*2)*0.25),
            ((ex_koof[3]*2+ex_koof[4]*2)*0.5),
            ((ex_koof[3]*2+ex_koof[4]*2)*0.25),
            ((ex_koof[3]*2+ex_koof[4]*2)*0.5),
            ((ex_koof[3]*2+ex_koof[4]*2)*0.5),
            ((ex_koof[3]*2+ex_koof[4]*2)*0.5)],
            "dont_int": [
            ((ex_koof[3]*2+ex_koof[4]*2)*0.125),
            ((ex_koof[3]*2+ex_koof[4]*2)*0.125)],
            "health": [
            ((ex_koof[3]*2+ex_koof[4]*2)*0.5),
            ((ex_koof[3]*2+ex_koof[4]*2)*0.5)],
            "tvcom": [
            ((ex_koof[3]*2+ex_koof[4]*2)*0.5),
            ((ex_koof[3]*2+ex_koof[4]*2)*0.5)],
            "others": [
            ((ex_koof[3]*2+ex_koof[4]*2)*0.25),
            ((ex_koof[3]*2+ex_koof[4]*2)*0.25)]
        }; //Трудозатраты сотрудников кадровых служб и юристов
        var reag_arr_ceo={
            "bank": [
            (ex_koof[5]*5*0.05),
            (ex_koof[5]*5*0.05),
            (ex_koof[5]*5*0.2),
            (ex_koof[5]*5*0.1),
            (ex_koof[5]*5*0.2),
            (ex_koof[5]*5*0.2),
            (ex_koof[5]*5*0.1)],
            "dont_int": [
            (ex_koof[5]*5*0.05),
            (ex_koof[5]*5*0.05)],
            "health": [
            (ex_koof[5]*5*0.2),
            (ex_koof[5]*5*0.1)],
            "tvcom": [
            (ex_koof[5]*5*0.2),
            (ex_koof[5]*5*0.1)],
            "others": [
            (ex_koof[5]*5*0.1),
            (ex_koof[5]*5*0.05)]
        }; //Трудозатраты руководителей бизнес-подразделений
        var reag_arr_hr_off={
            "bank": [
            0,
            0,
            (ex_koof[2]*0.25),
            (ex_koof[2]*0.5),
            (ex_koof[2]*0.5),
            (ex_koof[2]*0.5),
            (ex_koof[2]*0.5)],
            "dont_int": [
            0,
            0],
            "health": [
            (ex_koof[2]*0.5),
            (ex_koof[2]*0.5)],
            "tvcom": [
            (ex_koof[2]*0.5),
            (ex_koof[2]*0.5)],
            "others": [
            (ex_koof[2]*0.25),
            0]
        }; //Трудозатраты PR-службы
        var reag_arr_smi_soc={
            "bank": [
            0,
            0,
            (ex_koof[7]*6),
            0,
            (ex_koof[7]*6),
            (ex_koof[7]*6),
            (ex_koof[7]*6)],
            "dont_int": [
            0,
            0],
            "health": [
            (ex_koof[7]*6),
            (ex_koof[7]*6)],
            "tvcom": [
            (ex_koof[7]*6),
            (ex_koof[7]*6)],
            "others": [
            (ex_koof[7]*6),
            0]
        }; //Мониторинг СМИ и соц.сетей 
        var reag_arr_analiz={
            "bank": [
            0,
            0,
            (ex_koof[6]*2),
            0,
            (ex_koof[6]*2),
            (ex_koof[6]*1.5),
            (ex_koof[6]*0.5)],
            "dont_int": [
            0,
            0],
            "health": [
            (ex_koof[6]*1),
            (ex_koof[6]*1)],
            "tvcom": [
            (ex_koof[6]*2),
            (ex_koof[6]*1.5)],
            "others": [
            (ex_koof[6]*0.5),
            0]
        }; //Привлечение внешних консультантов (анализ, рекомендации, расследование)
        var reag_arr_call={
            "bank": [
            0,
            0,
            (ex_koof[8]*6),
            0,
            (ex_koof[8]),
            0,
            0],
            "dont_int": [
            0,
            0],
            "health": [
            (ex_koof[8]),
            0],
            "tvcom": [
            (ex_koof[8]),
            0],
            "others": [
            0,
            0]
        }; //Организация call-центра
        var reag_arr_new_analiz={
            "bank": [
            0,
            0,
            (ex_koof[9]),
            0,
            (ex_koof[9]),
            (ex_koof[9]),
            0],
            "dont_int": [
            0,
            0],
            "health": [
            0,
            0],
            "tvcom": [
            (ex_koof[9]),
            0],
            "others": [
            0,
            0]
        }; //Использование новых средств мониторинга и анализа
        var reag_arr_lost_items={
            "bank": [30000,30000,30000,30000,30000,30000,30000],
            "dont_int": [30000,30000],
            "health": [30000,30000],
            "tvcom": [30000,30000],
            "others": [30000,30000]
        }; //Восстановление оборудования (если кража, утеря)
        for (var i=0; i<7; i++) {
            reag["bank"][i] = (parseInt(reag_arr_ib_it["bank"][i])+parseInt(reag_arr_kadr_lawyer["bank"][i])+parseInt(reag_arr_ceo["bank"][i])+parseInt(reag_arr_hr_off["bank"][i])+parseInt(reag_arr_smi_soc["bank"][i])+parseInt(reag_arr_analiz["bank"][i])+parseInt(reag_arr_call["bank"][i])+parseInt(reag_arr_new_analiz["bank"][i])+parseInt(reag_arr_lost_items["bank"][i]));
        } 
        for (var i=0; i<2; i++) {
            reag["dont_int"][i] = (parseInt(reag_arr_ib_it["dont_int"][i])+parseInt(reag_arr_kadr_lawyer["dont_int"][i])+parseInt(reag_arr_ceo["dont_int"][i])+parseInt(reag_arr_hr_off["dont_int"][i])+parseInt(reag_arr_smi_soc["dont_int"][i])+parseInt(reag_arr_analiz["dont_int"][i])+parseInt(reag_arr_call["dont_int"][i])+parseInt(reag_arr_new_analiz["dont_int"][i])+parseInt(reag_arr_lost_items["dont_int"][i]));
        }
        for (var i=0; i<2; i++) {
            reag["health"][i] = (parseInt(reag_arr_ib_it["health"][i])+parseInt(reag_arr_kadr_lawyer["health"][i])+parseInt(reag_arr_ceo["health"][i])+parseInt(reag_arr_hr_off["health"][i])+parseInt(reag_arr_smi_soc["health"][i])+parseInt(reag_arr_analiz["health"][i])+parseInt(reag_arr_call["health"][i])+parseInt(reag_arr_new_analiz["health"][i])+parseInt(reag_arr_lost_items["health"][i]));
        }
        for (var i=0; i<2; i++) {
            reag["tvcom"][i] = (parseInt(reag_arr_ib_it["tvcom"][i])+parseInt(reag_arr_kadr_lawyer["tvcom"][i])+parseInt(reag_arr_ceo["tvcom"][i])+parseInt(reag_arr_hr_off["tvcom"][i])+parseInt(reag_arr_smi_soc["tvcom"][i])+parseInt(reag_arr_analiz["tvcom"][i])+parseInt(reag_arr_call["tvcom"][i])+parseInt(reag_arr_new_analiz["tvcom"][i])+parseInt(reag_arr_lost_items["tvcom"][i]));
        }
        for (var i=0; i<2; i++) {
            reag["others"][i] = (parseInt(reag_arr_ib_it["others"][i])+parseInt(reag_arr_kadr_lawyer["others"][i])+parseInt(reag_arr_ceo["others"][i])+parseInt(reag_arr_hr_off["others"][i])+parseInt(reag_arr_smi_soc["others"][i])+parseInt(reag_arr_analiz["others"][i])+parseInt(reag_arr_call["others"][i])+parseInt(reag_arr_new_analiz["others"][i])+parseInt(reag_arr_lost_items["others"][i]));
        } 

/*Вывод Затраты на реагирование, устранение и расследование
        $("#vivod").append("<div style='color:green;text-align:center'>Затраты на реагирование, устранение и расследование</div>");
        for (var a=0; a<7; a++) {
            $("#vivod").append("<div class='block_bl'>"+ reag["bank"][a] +"</div>");
        }
        for (var b=0; b<2; b++) {
            $("#vivod").append("<div class='block_bl'>"+ reag["dont_int"][b] +"</div>");
        }
        for (var c=0; c<2; c++) {
            $("#vivod").append("<div class='block_bl'>"+ reag["health"][c] +"</div>");
        }
        for (var d=0; d<2; d++) {
            $("#vivod").append("<div class='block_bl'>"+ reag["tvcom"][d] +"</div>");
        }
        for (var f=0; f<2; f++) {
            $("#vivod").append("<div class='block_bl'>"+ reag["others"][f] +"</div>");
        }        
Конец вывода Затраты на реагирование, устранение и расследование*/           
       var kol_vo = [in_default[4],in_default[5],in_default[6],in_default[7],in_default[8],in_default[9],in_default[10]];
       var koof_xz2 = [];
       for (t=0;t<7;t++) {
           if (kol_vo[t]<1000) {
               koof_xz2[t]=kol_vo[t]/1000;
           } else if (kol_vo[t]>1000000) {
              koof_xz2[t]=2+kol_vo[t]/1000000000;
           } else {
                koof_xz2[t]=1+kol_vo[t]/1000000;
           }
       }           
var finans_reag={
    "reag1": [
    (reag["bank"][0]),
    (reag["bank"][1]),
    (reag["bank"][2]),
    (reag["bank"][3]),
    (reag["bank"][4]),
    (reag["bank"][5]),
    (reag["bank"][6])
    ],//Затраты на реагирование, устранение и расследование
    "shtraf1": [
    10000,
    10000,
    10000,
    10000,
    10000,
    0,
    10000
    ],//Штрафы и другие санкции регуляторов
    "reputacia1": [
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    (in_default[17]*in_default[12]*in_default[3]+in_default[15]*in_default[3]*in_default[12]*in_default[19]),
    ((in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]))*0.05
    ],//Репутационные потери и упущенная выгода
    "ur_presledovanie1": [
    0,
    0,
    0,
    0,
    0,
    0,
    0    
    ]//Юр.преследование со стороны 3х лиц
}; //Финансы
    finans_reag["ur_itogo1"]=[
    ((finans_reag["reag1"][0]+finans_reag["shtraf1"][0]+finans_reag["reputacia1"][0]+finans_reag["ur_presledovanie1"][0])),
    ((finans_reag["reag1"][1]+finans_reag["shtraf1"][1]+finans_reag["reputacia1"][1]+finans_reag["ur_presledovanie1"][1])),
    ((finans_reag["reag1"][2]+finans_reag["shtraf1"][2]+finans_reag["reputacia1"][2]+finans_reag["ur_presledovanie1"][2])),
    ((finans_reag["reag1"][3]+finans_reag["shtraf1"][3]+finans_reag["reputacia1"][3]+finans_reag["ur_presledovanie1"][3])),
    ((finans_reag["reag1"][4]+finans_reag["shtraf1"][4]+finans_reag["reputacia1"][4]+finans_reag["ur_presledovanie1"][4])),
    ((finans_reag["reag1"][5]+finans_reag["shtraf1"][5]+finans_reag["reputacia1"][5]+finans_reag["ur_presledovanie1"][5])),
    ((finans_reag["reag1"][6]+finans_reag["shtraf1"][6]+finans_reag["reputacia1"][6]+finans_reag["ur_presledovanie1"][6]))  
    ];//Итого  
var gos_reag={
    "reag1": [
    (reag["dont_int"][0]),
    (reag["bank"][1]),
    0,
    (reag["bank"][3]),
    0,
    (reag["bank"][5]),
    (reag["dont_int"][1])
    ],//Затраты на реагирование, устранение и расследование
    "shtraf1": [
    10000,
    10000,
    0,
    10000,
    0,
    0,
    10000
    ],//Штрафы и другие санкции регуляторов
    "reputacia1": [
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    0,
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    (in_default[17]*in_default[12]*in_default[3]+in_default[15]*in_default[3]*in_default[12]*in_default[19]),
    ((in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]))*0.05
    ],//Репутационные потери и упущенная выгода
    "ur_presledovanie1": [
    0,
    0,
    0,
    0,
    0,
    0,
    0    
    ]//Юр.преследование со стороны 3х лиц 
}; //Органы гос.власти
gos_reag["ur_itogo1"]= [
    ((gos_reag["reag1"][0]+gos_reag["shtraf1"][0]+gos_reag["reputacia1"][0]+gos_reag["ur_presledovanie1"][0])),
    ((gos_reag["reag1"][1]+gos_reag["shtraf1"][1]+gos_reag["reputacia1"][1]+gos_reag["ur_presledovanie1"][1])),
    ((gos_reag["reag1"][2]+gos_reag["shtraf1"][2]+gos_reag["reputacia1"][2]+gos_reag["ur_presledovanie1"][2])),
    ((gos_reag["reag1"][3]+gos_reag["shtraf1"][3]+gos_reag["reputacia1"][3]+gos_reag["ur_presledovanie1"][3])),
    ((gos_reag["reag1"][4]+gos_reag["shtraf1"][4]+gos_reag["reputacia1"][4]+gos_reag["ur_presledovanie1"][4])),
    ((gos_reag["reag1"][5]+gos_reag["shtraf1"][5]+gos_reag["reputacia1"][5]+gos_reag["ur_presledovanie1"][5])),
    ((gos_reag["reag1"][6]+gos_reag["shtraf1"][6]+gos_reag["reputacia1"][6]+gos_reag["ur_presledovanie1"][6]))  
    ];//Итого   
var obrazovanie_reag={
    "reag1": [
    (reag["dont_int"][0]),
    (reag["bank"][1]),
    0,
    (reag["bank"][3]),
    0,
    (reag["bank"][5]),
    (reag["dont_int"][1])
    ],//Затраты на реагирование, устранение и расследование
    "shtraf1": [
    10000,
    10000,
    0,
    10000,
    0,
    0,
    0
    ],//Штрафы и другие санкции регуляторов
    "reputacia1": [
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    0,
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    (in_default[17]*in_default[12]*in_default[3]+in_default[15]*in_default[3]*in_default[12]*in_default[19]),
    0
    ],//Репутационные потери и упущенная выгода
    "ur_presledovanie1": [
    0,
    0,
    0,
    0,
    0,
    0,
    0    
    ]//Юр.преследование со стороны 3х лиц   
};//Образование
obrazovanie_reag["ur_itogo1"]= [
    ((obrazovanie_reag["reag1"][0]+obrazovanie_reag["shtraf1"][0]+obrazovanie_reag["reputacia1"][0]+obrazovanie_reag["ur_presledovanie1"][0])),
    ((obrazovanie_reag["reag1"][1]+obrazovanie_reag["shtraf1"][1]+obrazovanie_reag["reputacia1"][1]+obrazovanie_reag["ur_presledovanie1"][1])),
    ((obrazovanie_reag["reag1"][2]+obrazovanie_reag["shtraf1"][2]+obrazovanie_reag["reputacia1"][2]+obrazovanie_reag["ur_presledovanie1"][2])),
    ((obrazovanie_reag["reag1"][3]+obrazovanie_reag["shtraf1"][3]+obrazovanie_reag["reputacia1"][3]+obrazovanie_reag["ur_presledovanie1"][3])),
    ((obrazovanie_reag["reag1"][4]+obrazovanie_reag["shtraf1"][4]+obrazovanie_reag["reputacia1"][4]+obrazovanie_reag["ur_presledovanie1"][4])),
    ((obrazovanie_reag["reag1"][5]+obrazovanie_reag["shtraf1"][5]+obrazovanie_reag["reputacia1"][5]+obrazovanie_reag["ur_presledovanie1"][5])),
    ((obrazovanie_reag["reag1"][6]+obrazovanie_reag["shtraf1"][6]+obrazovanie_reag["reputacia1"][6]+obrazovanie_reag["ur_presledovanie1"][6]))  
    ];//Итого    
var zdravohranenie_reag={
     "reag1": [
    (reag["dont_int"][0]),
    (reag["bank"][1]),
    0,
    (reag["bank"][3]),
    0,
    (reag["bank"][5]),
    (reag["health"][1])
    ],//Затраты на реагирование, устранение и расследование
    "shtraf1": [
    10000,
    10000,
    0,
    10000,
    10000,
    0,
    10000
    ],//Штрафы и другие санкции регуляторов
    "reputacia1": [
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    0,
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    (in_default[17]*in_default[12]*in_default[3]+in_default[15]*in_default[3]*in_default[12]*in_default[19]),
    ((in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]))*0.05
    ],//Репутационные потери и упущенная выгода
    "ur_presledovanie1": [
    0,
    0,
    0,
    0,
    0,
    0,
    0    
    ]//Юр.преследование со стороны 3х лиц   
}; //Здравоохранение
zdravohranenie_reag["ur_itogo1"]= [
    ((zdravohranenie_reag["reag1"][0]+zdravohranenie_reag["shtraf1"][0]+zdravohranenie_reag["reputacia1"][0]+zdravohranenie_reag["ur_presledovanie1"][0])),
    ((zdravohranenie_reag["reag1"][1]+zdravohranenie_reag["shtraf1"][1]+zdravohranenie_reag["reputacia1"][1]+zdravohranenie_reag["ur_presledovanie1"][1])),
    ((zdravohranenie_reag["reag1"][2]+zdravohranenie_reag["shtraf1"][2]+zdravohranenie_reag["reputacia1"][2]+zdravohranenie_reag["ur_presledovanie1"][2])),
    ((zdravohranenie_reag["reag1"][3]+zdravohranenie_reag["shtraf1"][3]+zdravohranenie_reag["reputacia1"][3]+zdravohranenie_reag["ur_presledovanie1"][3])),
    ((zdravohranenie_reag["reag1"][4]+zdravohranenie_reag["shtraf1"][4]+zdravohranenie_reag["reputacia1"][4]+zdravohranenie_reag["ur_presledovanie1"][4])),
    ((zdravohranenie_reag["reag1"][5]+zdravohranenie_reag["shtraf1"][5]+zdravohranenie_reag["reputacia1"][5]+zdravohranenie_reag["ur_presledovanie1"][5])),
    ((zdravohranenie_reag["reag1"][6]+zdravohranenie_reag["shtraf1"][6]+zdravohranenie_reag["reputacia1"][6]+zdravohranenie_reag["ur_presledovanie1"][6]))   
    ];//Итого 
var razvrat_reag={
     "reag1": [
    (reag["bank"][0]),
    (reag["bank"][1]),
    (reag["bank"][2]),
    (reag["bank"][3]),
    0,
    (reag["bank"][5]),
    0
    ],//Затраты на реагирование, устранение и расследование
    "shtraf1": [
    10000,
    10000,
    10000,
    10000,
    0,
    0,
    0
    ],//Штрафы и другие санкции регуляторов
    "reputacia1": [
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    (in_default[17]*in_default[12]*in_default[3]+in_default[15]*in_default[3]*in_default[12]*in_default[19]),
    0
    ],//Репутационные потери и упущенная выгода
    "ur_presledovanie1": [
    0,
    0,
    0,
    0,
    0,
    0,
    0    
    ],//Юр.преследование со стороны 3х лиц   
}; //Сфера обслуживания и развлечений
razvrat_reag["ur_itogo1"]= [
    ((razvrat_reag["reag1"][0]+razvrat_reag["shtraf1"][0]+razvrat_reag["reputacia1"][0]+razvrat_reag["ur_presledovanie1"][0])),
    ((razvrat_reag["reag1"][1]+razvrat_reag["shtraf1"][1]+razvrat_reag["reputacia1"][1]+razvrat_reag["ur_presledovanie1"][1])),
    ((razvrat_reag["reag1"][2]+razvrat_reag["shtraf1"][2]+razvrat_reag["reputacia1"][2]+razvrat_reag["ur_presledovanie1"][2])),
    ((razvrat_reag["reag1"][3]+razvrat_reag["shtraf1"][3]+razvrat_reag["reputacia1"][3]+razvrat_reag["ur_presledovanie1"][3])),
    ((razvrat_reag["reag1"][4]+razvrat_reag["shtraf1"][4]+razvrat_reag["reputacia1"][4]+razvrat_reag["ur_presledovanie1"][4])),
    ((razvrat_reag["reag1"][5]+razvrat_reag["shtraf1"][5]+razvrat_reag["reputacia1"][5]+razvrat_reag["ur_presledovanie1"][5])),
    ((razvrat_reag["reag1"][6]+razvrat_reag["shtraf1"][6]+razvrat_reag["reputacia1"][6]+razvrat_reag["ur_presledovanie1"][6]))   
    ];//Итого 
var riteil_reag={
    "reag1": [
    (reag["dont_int"][0]),
    (reag["bank"][1]),
    (reag["bank"][2]),
    (reag["bank"][3]),
    0,
    (reag["bank"][5]),
    (reag["dont_int"][1])
    ],//Затраты на реагирование, устранение и расследование
    "shtraf1": [
    10000,
    10000,
    10000,
    10000,
    0,
    0,
    10000
    ],//Штрафы и другие санкции регуляторов
    "reputacia1": [
   (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    (in_default[17]*in_default[12]*in_default[3]+in_default[15]*in_default[3]*in_default[12]*in_default[19]),
    ((in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]))*0.05
    ],//Репутационные потери и упущенная выгода
    "ur_presledovanie1": [
    0,
    0,
    0,
    0,
    0,
    0,
    0    
    ]//Юр.преследование со стороны 3х лиц
}; //Ритейл
riteil_reag["ur_itogo1"]= [
    ((riteil_reag["reag1"][0]+riteil_reag["shtraf1"][0]+riteil_reag["reputacia1"][0]+riteil_reag["ur_presledovanie1"][0])),
    ((riteil_reag["reag1"][1]+riteil_reag["shtraf1"][1]+riteil_reag["reputacia1"][1]+riteil_reag["ur_presledovanie1"][1])),
    ((riteil_reag["reag1"][2]+riteil_reag["shtraf1"][2]+riteil_reag["reputacia1"][2]+riteil_reag["ur_presledovanie1"][2])),
    ((riteil_reag["reag1"][3]+riteil_reag["shtraf1"][3]+riteil_reag["reputacia1"][3]+riteil_reag["ur_presledovanie1"][3])),
    ((riteil_reag["reag1"][4]+riteil_reag["shtraf1"][4]+riteil_reag["reputacia1"][4]+riteil_reag["ur_presledovanie1"][4])),
    ((riteil_reag["reag1"][5]+riteil_reag["shtraf1"][5]+riteil_reag["reputacia1"][5]+riteil_reag["ur_presledovanie1"][5])),
    ((riteil_reag["reag1"][6]+riteil_reag["shtraf1"][6]+riteil_reag["reputacia1"][6]+riteil_reag["ur_presledovanie1"][6]))  
    ];//Итого    
var tv_it_reag={
    "reag1": [
    (reag["bank"][0]),
    (reag["bank"][1]),
    0,
    (reag["bank"][3]),
    (reag["tvcom"][0]),
    (reag["bank"][5]),
    (reag["tvcom"][1])
    ],//Затраты на реагирование, устранение и расследование
    "shtraf1": [
    10000,
    10000,
    0,
    10000,
    10000,
    0,
    10000
    ],//Штрафы и другие санкции регуляторов
    "reputacia1": [
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    0,
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    ((in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]))
    ],//Репутационные потери и упущенная выгода
    "ur_presledovanie1": [
    0,
    0,
    0,
    0,
    0,
    0,
    0    
    ]//Юр.преследование со стороны 3х лиц
}; //Телеком и ИТ
tv_it_reag["ur_itogo1"]= [
    ((tv_it_reag["reag1"][0]+tv_it_reag["shtraf1"][0]+tv_it_reag["reputacia1"][0]+tv_it_reag["ur_presledovanie1"][0])),
    ((tv_it_reag["reag1"][1]+tv_it_reag["shtraf1"][1]+tv_it_reag["reputacia1"][1]+tv_it_reag["ur_presledovanie1"][1])),
    ((tv_it_reag["reag1"][2]+tv_it_reag["shtraf1"][2]+tv_it_reag["reputacia1"][2]+tv_it_reag["ur_presledovanie1"][2])),
    ((tv_it_reag["reag1"][3]+tv_it_reag["shtraf1"][3]+tv_it_reag["reputacia1"][3]+tv_it_reag["ur_presledovanie1"][3])),
    ((tv_it_reag["reag1"][4]+tv_it_reag["shtraf1"][4]+tv_it_reag["reputacia1"][4]+tv_it_reag["ur_presledovanie1"][4])),
    ((tv_it_reag["reag1"][5]+tv_it_reag["shtraf1"][5]+tv_it_reag["reputacia1"][5]+tv_it_reag["ur_presledovanie1"][5])),
    ((tv_it_reag["reag1"][6]+tv_it_reag["shtraf1"][6]+tv_it_reag["reputacia1"][6]+tv_it_reag["ur_presledovanie1"][6]))  
    ];//Итого    
var promishl_reag={
    "reag1": [
    (reag["dont_int"][0]),
    (reag["bank"][1]),
    0,
    0,
    0,
    (reag["bank"][5]),
    0
    ],//Затраты на реагирование, устранение и расследование
    "shtraf1": [
    10000,
    10000,
    0,
    0,
    0,
    0,
    0
    ],//Штрафы и другие санкции регуляторов
    "reputacia1": [
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    0,
    0,
    0,
    (in_default[17]*in_default[12]*in_default[3]+in_default[15]*in_default[3]*in_default[12]*in_default[19]),
    0
    ],//Репутационные потери и упущенная выгода
    "ur_presledovanie1": [
    0,
    0,
    0,
    0,
    0,
    0,
    0    
    ]//Юр.преследование со стороны 3х лиц
}; //Промышленность
promishl_reag["ur_itogo1"]= [
    ((promishl_reag["reag1"][0]+promishl_reag["shtraf1"][0]+promishl_reag["reputacia1"][0]+promishl_reag["ur_presledovanie1"][0])),
    ((promishl_reag["reag1"][1]+promishl_reag["shtraf1"][1]+promishl_reag["reputacia1"][1]+promishl_reag["ur_presledovanie1"][1])),
    ((promishl_reag["reag1"][2]+promishl_reag["shtraf1"][2]+promishl_reag["reputacia1"][2]+promishl_reag["ur_presledovanie1"][2])),
    ((promishl_reag["reag1"][3]+promishl_reag["shtraf1"][3]+promishl_reag["reputacia1"][3]+promishl_reag["ur_presledovanie1"][3])),
    ((promishl_reag["reag1"][4]+promishl_reag["shtraf1"][4]+promishl_reag["reputacia1"][4]+promishl_reag["ur_presledovanie1"][4])),
    ((promishl_reag["reag1"][5]+promishl_reag["shtraf1"][5]+promishl_reag["reputacia1"][5]+promishl_reag["ur_presledovanie1"][5])),
    ((promishl_reag["reag1"][6]+promishl_reag["shtraf1"][6]+promishl_reag["reputacia1"][6]+promishl_reag["ur_presledovanie1"][6]))  
    ];//Итого    
var transports_reag={
    "reag1": [
    (reag["bank"][0]),
    (reag["bank"][1]),
    (reag["bank"][2]),
    (reag["bank"][3]),
    0,
    (reag["bank"][5]),
    0
    ],//Затраты на реагирование, устранение и расследование
    "shtraf1": [
    10000,
    10000,
    10000,
    10000,
    0,
    0,
    0
    ],//Штрафы и другие санкции регуляторов
    "reputacia1": [
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    (in_default[17]*in_default[12]*in_default[3]+in_default[15]*in_default[3]*in_default[12]*in_default[19]),
    0
    ],//Репутационные потери и упущенная выгода
    "ur_presledovanie1": [
    0,
    0,
    0,
    0,
    0,
    0,
    0    
    ],//Юр.преследование со стороны 3х лиц
    "ur_moshenichestvo1": [
    0,
    0,
    0,
    0,
    0,
    0,
    0    
    ],//Мошенничество
}; //Транспорт
transports_reag["ur_itogo1"]=[
    ((transports_reag["reag1"][0]+transports_reag["shtraf1"][0]+transports_reag["reputacia1"][0]+transports_reag["ur_presledovanie1"][0]+transports_reag["ur_moshenichestvo1"][0])),
    ((transports_reag["reag1"][1]+transports_reag["shtraf1"][1]+transports_reag["reputacia1"][1]+transports_reag["ur_presledovanie1"][1]+transports_reag["ur_moshenichestvo1"][1])),
    ((transports_reag["reag1"][2]+transports_reag["shtraf1"][2]+transports_reag["reputacia1"][2]+transports_reag["ur_presledovanie1"][2]+transports_reag["ur_moshenichestvo1"][2])),
    ((transports_reag["reag1"][3]+transports_reag["shtraf1"][3]+transports_reag["reputacia1"][3]+transports_reag["ur_presledovanie1"][3]+transports_reag["ur_moshenichestvo1"][3])),
    ((transports_reag["reag1"][4]+transports_reag["shtraf1"][4]+transports_reag["reputacia1"][4]+transports_reag["ur_presledovanie1"][4]+transports_reag["ur_moshenichestvo1"][4])),
    ((transports_reag["reag1"][5]+transports_reag["shtraf1"][5]+transports_reag["reputacia1"][5]+transports_reag["ur_presledovanie1"][5]+transports_reag["ur_moshenichestvo1"][5])),
    ((transports_reag["reag1"][6]+transports_reag["shtraf1"][6]+transports_reag["reputacia1"][6]+transports_reag["ur_presledovanie1"][6]+transports_reag["ur_moshenichestvo1"][6]))  
    ];//Итого    
var drugie_reag={
    "reag1": [
    (reag["dont_int"][0]),
    (reag["bank"][1]),
    (reag["bank"][2]),
    (reag["bank"][3]),
    (reag["others"][0]),
    (reag["bank"][5]),
    (reag["others"][1])
    ],//Затраты на реагирование, устранение и расследование
    "shtraf1": [
    10000,
    10000,
    10000,
    10000,
    10000,
    0,
    10000
    ],//Штрафы и другие санкции регуляторов
    "reputacia1": [
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    0,
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    (in_default[16]*in_default[11]*in_default[2]+in_default[14]*in_default[2]*in_default[11]*in_default[18]),
    (in_default[17]*in_default[12]*in_default[3]+in_default[15]*in_default[3]*in_default[12]*in_default[19]),
    0
    ],//Репутационные потери и упущенная выгода
    "ur_presledovanie1": [
    0,
    0,
    0,
    0,
    0,
    0,
    0    
    ]//Юр.преследование со стороны 3х лиц 
}; //Другое
drugie_reag["ur_itogo1"]= [
    ((drugie_reag["reag1"][0]+drugie_reag["shtraf1"][0]+drugie_reag["reputacia1"][0]+drugie_reag["ur_presledovanie1"][0])),
    ((drugie_reag["reag1"][1]+drugie_reag["shtraf1"][1]+drugie_reag["reputacia1"][1]+drugie_reag["ur_presledovanie1"][1])),
    ((drugie_reag["reag1"][2]+drugie_reag["shtraf1"][2]+drugie_reag["reputacia1"][2]+drugie_reag["ur_presledovanie1"][2])),
    ((drugie_reag["reag1"][3]+drugie_reag["shtraf1"][3]+drugie_reag["reputacia1"][3]+drugie_reag["ur_presledovanie1"][3])),
    ((drugie_reag["reag1"][4]+drugie_reag["shtraf1"][4]+drugie_reag["reputacia1"][4]+drugie_reag["ur_presledovanie1"][4])),
    ((drugie_reag["reag1"][5]+drugie_reag["shtraf1"][5]+drugie_reag["reputacia1"][5]+drugie_reag["ur_presledovanie1"][5])),
    ((drugie_reag["reag1"][6]+drugie_reag["shtraf1"][6]+drugie_reag["reputacia1"][6]+drugie_reag["ur_presledovanie1"][6]))  
    ];//Итого     
    $('.calc_bottom').hide();    
    $("#vivod").empty();
    $("#infoblock").empty();
    var vrem_reag1 =[];
    var vrem_shtraf1 =[];
    var vrem_shtraf_0 = [in_default[4],in_default[5],in_default[6],in_default[7],in_default[8],in_default[9],in_default[10]];
    var vrem_reputacia1 =[];
    var vrem_ur_presledovanie1 =[];
        otr= in_default[0]+"_reag";  
        $(".calc_body3").show();
        /*$("#vivod").append("<div style='color:green;text-align:center'><h2>"+otr_naz+"</h2></div>");*/
        for (var a=0; a<7; a++) {  
            vrem_reag1[a] = Math.round(eval(otr)["reag1"][a]*koof_xz2[a]);
        }
        if (otrasl_now==0 || otrasl_now==9) {           
                var koof_real_bred = in_default[6]*ex_koof[10];
            } else {               
                var koof_real_bred = 0;
         }
        reag1_max = Math.max.apply(Math, vrem_reag1);
        var summa = (reag1_max+koof_real_bred);
         $("#vivod").append("<div class='block_bl'>Затраты на реагирование, устранение и расследование </div><!--a href='#vivod11' class='block_bl quest'>&nbsp;</a--><div class='block_bl result_nombers'><strong>"+ (reag1_max+koof_real_bred) +"</strong> руб.</div>");
         $("#vivod").append("<div style='clear:both'></div>"); 
        for (var a=0; a<7; a++) {           
            if (vrem_shtraf_0[a]>0) {
                vrem_shtraf_0[a]=1;
            } else {
                 vrem_shtraf_0[a]=0;
            }
            vrem_shtraf1[a] = (Math.round(eval(otr)["shtraf1"][a]))*vrem_shtraf_0[a];
        } 
        shtraf1_max = Math.max.apply(Math, vrem_shtraf1);        
        summa = summa+ shtraf1_max;
         $("#vivod").append("<div class='block_bl'>Штрафы и другие санкции регуляторов </div><!--a href='#vivod12' class='block_bl quest'>&nbsp;</a--><div class='block_bl result_nombers'><strong>"+ shtraf1_max  +"</strong> руб.<a class='block_bl quest' href='#pole141' style='margin-right: -17px;margin-top: 0;margin-left: 10px;'>&nbsp;</a></div>");       
         $("#vivod").append("<div style='clear:both'></div>");      
        for (var a=0; a<7; a++) {  
            vrem_reputacia1[a] = Math.round(eval(otr)["reputacia1"][a]*koof_xz2[a]*in_default[13]); 
        } 
        reputacia1_alone= vrem_reputacia1[5];  
        vrem_reputacia1.splice(5,1);
        reputacia1_max = Math.max.apply(Math, vrem_reputacia1); 
        summa = summa+ ((reputacia1_max+reputacia1_alone)+(in_default[11]*in_default[20]*in_default[8]+in_default[12]*in_default[21]*in_default[9])*in_default[13]);
            $("#vivod").append("<div class='block_bl'>Репутационные потери и упущенная выгода </div><!--a href='#vivod13' class='block_bl quest'>&nbsp;</a--><div class='block_bl result_nombers'><strong>"+ ((reputacia1_max+reputacia1_alone)+(in_default[11]*in_default[20]*in_default[8]+in_default[12]*in_default[21]*in_default[9])*in_default[13])  +"</strong> руб.</div>");        
         $("#vivod").append("<div style='clear:both;padding-top:40px;'></div>"); 
         $("#vivod").append("<div class='block_bl result_summa'><strong>Всего:</strong> </div><div class='block_bl result_summa'><strong>"+ summa +"</strong> руб.</div><!--a href='#vivod14' class='block_bl quest q4'>&nbsp;</a-->");
       /* $("#vivod").append("<div style='clear:both'></div>"); 
         for (var a=0; a<7; a++) {  
            vrem_ur_presledovanie1[a] = (eval(otr)["ur_presledovanie1"][a]*koof_xz2[a]);
        } 
        ur_presledovanie1_max = Math.max.apply(Math, vrem_ur_presledovanie1); 
        $("#vivod").append("<div class='block_bl'>"+ ur_presledovanie1_max +"</div>");   */ 
        if (in_default[5]>in_default[1] || in_default[6]>in_default[2] || in_default[7]>in_default[2] || in_default[8]>in_default[2] || in_default[9]>in_default[3]) {
            $(".calc_body4").show();
            var trer= "<ul>";
            var trer2= "</ul>";
            /*$("#infoblock").append(trer); */ 
            if (in_default[5]>in_default[1]) {
                trer = trer + " <li>Значение <span style='font-weight:bold'>Персональные данные сотрудников</span> не должно превышать значение <span style='font-weight:bold'>Количество сотрудников</span>.</li>";
            }
            if (in_default[6]>in_default[2]) {
                trer = trer + " <li>Значение <span style='font-weight:bold'>Номера банковских карт</span> не должно превышать значение <span style='font-weight:bold'>Количество клиентов (физ. лица)</span>.</li>";
            }
            if (in_default[7]>in_default[2]) {
                trer = trer + " <li>Значение <span style='font-weight:bold'>Персональные данные клиентов (не критичные данные)</span> не должно превышать значение <span style='font-weight:bold'>Количество клиентов (физ. лица)</span>.</li>";
            }
            if (in_default[8]>in_default[2]) {
                trer = trer + " <li>Значение <span style='font-weight:bold'>Персональные данные клиентов (критичные данные)</span> не должно превышать значение <span style='font-weight:bold'>Количество клиентов (физ. лица)</span>.</li>";
            }
            if (in_default[9]>in_default[3]) {
                trer = trer + " <li>Значение <span style='font-weight:bold'>Записи о клиентах (юр. лица)</span> не должно превышать значение <span style='font-weight:bold'>Количество клиентов (юр. лица)</span>.</li>";
            }
           if (in_default[5]>in_default[1] || in_default[6]>in_default[2] || in_default[7]>in_default[2] || in_default[8]>in_default[2] || in_default[9]>in_default[3]) {
                trer = trer + trer2;
                $("#infoblock").append(trer);
            }
        }
        return false;
});


        $("#open_calc").click(function(){
            $(".calc_body1").hide();
            $(".calc_body2").show();
            return false;
        });
        $("#open_calc2").click(function(){
            $(".calc_body3").hide();
            $(".calc_body4").hide();
            $('.calc_bottom').show(); 
            $(".calc_body2").show();
            $('html,body').scrollTop(0);
            return false;
        });
        $("#vivod").on("click", "a.quest", function () {
            $(".help_block").append($(".clerix .cbox.active").removeClass("active"));
            $(".clerix .cbox.active").remove();
            link_help = $(this).attr("href");
            $(link_help).addClass("active");
            $(this).parent().parent().parent(".clerix").append($(link_help));
            return false;
        }); 
        $(".label_for_this").on("click", "a.quest", function () {
            $(".help_block").append($(".clerix .cbox.active").removeClass("active"));
            $(".clerix .cbox.active").remove();
            link_help = $(this).attr("href");
            $(link_help).addClass("active");
            $(this).parent().parent().parent(".clerix").append($(link_help));
            return false;
        });    
        $(".clerix").on("click", ".cbox.active", function () {   
            $(".help_block").append($(".clerix .cbox.active").removeClass("active"));
            $(".clerix .cbox.active").remove();
            return false;
        });
    }
  };
})(jQuery);