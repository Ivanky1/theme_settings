(function ($) {
  Drupal.behaviors.Livedemo = {
    attach: function (context, settings) {
			var month=new Array();
			month[0]="января";
			month[1]="февраля";
			month[2]="марта";
			month[3]="апреля";
			month[4]="мая";
			month[5]="июня";
			month[6]="июля";
			month[7]="августа";
			month[8]="сентября";
			month[9]="октября";
			month[10]="ноября";
			month[11]="декабря";
			/*var new_eayrs = new Date(1390226400000);/*Mon Feb 03 2014 18:00:00 GMT+0400 (Московское время (зима))*/
			var new_eayrs = 1391522400000;
			var selectedDate =  new Date();
			var timeMos = selectedDate.getTime() + (selectedDate.getTimezoneOffset() + 240) * 60000;
			selectedDate = selectedDate.setTime(timeMos);
			selectedDate =  new Date(selectedDate);
			var selectedDatetme = selectedDate.valueOf();
			var prime;
			var week_tme=0;
			var week_eps=0;
			var selectedDateeps =  selectedDatetme;
			var Dateday = selectedDate.getDay();/*число дня недели воскресенье-0  1391495400000 - Tue Feb 04 2014 10:30:00 GMT+0400 (Московское время (зима))*/	
			var Datedate = selectedDate.getDate();/*число числа месяца*/
			var Datefullyear = selectedDate.getFullYear();/*число год*/	
			var Datehours = selectedDate.getHours();/*час*/
			var Datemonth = selectedDate.getMonth();/*число месяца январь-0*/
			var Datetuesdays, Datethursdays, nextuesday, nexthursday;
			var daymilli = [0, 1209600000, 2419200000, 3628800000];
			var chet = (Math.floor((selectedDatetme - new_eayrs)/604800000))%2;
			if (chet==0) {week_tme=604800000}else{week_eps=604800000};	
			var Tuesday_tme = [];
			var Tuesday_eps = [];	
			switch (Dateday){
			case 0:
				selectedDatetme = selectedDatetme + 86400000*3+week_tme;	
				selectedDateeps = selectedDateeps + 86400000*3+week_eps;
				break
			case 1:	
				selectedDatetme = selectedDatetme + 86400000*2+week_tme;	
				selectedDateeps = selectedDateeps + 86400000*2+week_eps;
				break
			case 2:
				if(Datehours >= 16){
				selectedDatetme = selectedDatetme + 86400000*7*2+86400000+week_tme;
				selectedDateeps = selectedDateeps + 86400000*7*2+86400000+week_eps;	
						} else {
				selectedDatetme = selectedDatetme + 86400000+week_tme;				
				selectedDateeps = selectedDateeps + 86400000+week_eps;
				}		
				break
			case 3:
				selectedDatetme = selectedDatetme + 86400000*7+week_tme;
				selectedDateeps = selectedDateeps + 86400000*7+week_eps;
				break
			case 4:
				selectedDatetme = selectedDatetme + 86400000*6+week_tme;
				selectedDateeps = selectedDateeps + 86400000*6+week_eps;
				break
			case 5:
				selectedDatetme = selectedDatetme + 86400000*5+week_tme;
				selectedDateeps = selectedDateeps + 86400000*5+week_eps;
				break
			case 6:
				selectedDatetme = selectedDatetme + 86400000*4+week_tme;	
				selectedDateeps = selectedDateeps + 86400000*4+week_eps;	
				break
			}
			for (var ch=0; ch < 4; ch++) {
				Tuesday_tme[ch] = selectedDatetme+daymilli[ch];
				Tuesday_eps[ch] = selectedDateeps+daymilli[ch];
			}
			Datetuesdays_tme = new Date(Tuesday_tme[0]);
			if (Datetuesdays_tme.getDate()<9){
				nextuesday = "0" + Datetuesdays_tme.getDate();
			} else {
				nextuesday = Datetuesdays_tme.getDate();
			}
				nextuesday = nextuesday +" "+ (month[Datetuesdays_tme.getMonth()]);
				$("#forDatetme").html(nextuesday);
			
			Datetuesdays_eps = new Date(Tuesday_eps[0]);
			if (Datetuesdays_eps.getDate()<9){
				nexthursday = "0" + Datetuesdays_eps.getDate();
			} else {
				nexthursday = Datetuesdays_eps.getDate();
			}			
				nexthursday = nexthursday +" "+ (month[Datetuesdays_eps.getMonth()]);
			$("#forDateeps").html(nexthursday);
			for (var pr=0; pr < 4; pr++) {
				prime = new Date(Tuesday_tme[pr]);
				if (prime.getDate()<9 && prime.getMonth()<9){
				$("#edit-submitted-data-day-tme").append("<option value='" + prime.valueOf() + "'>0" + prime.getDate() + ".0" + (prime.getMonth()+1) + "." + prime.getFullYear() + "</option>");
				} else if (prime.getDate()<9 && prime.getMonth()>=10){
					$("#edit-submitted-data-day-tme").append("<option value='" + prime.valueOf() + "'>0" + prime.getDate() + "." + (prime.getMonth()+1) + "." + prime.getFullYear() + "</option>");
				}	else if (prime.getDate()>=10 && prime.getMonth()<9){
					$("#edit-submitted-data-day-tme").append("<option value='" + prime.valueOf() + "'>" + prime.getDate() + ".0" + (prime.getMonth()+1) + "." + prime.getFullYear() + "</option>");
				}	else {
					$("#edit-submitted-data-day-tme").append("<option value='" + prime.valueOf() + "'>" + prime.getDate() + "." + (prime.getMonth()+1) + "." + prime.getFullYear() + "</option>");
				}
				prime = new Date(Tuesday_eps[pr]);
				if (prime.getDate()<9 && prime.getMonth()<9){
				$("#edit-submitted-data-day-eps").append("<option value='" + prime.valueOf() + "'>0" + prime.getDate() + ".0" + (prime.getMonth()+1) + "." + prime.getFullYear() + "</option>");
				} else if (prime.getDate()<9 && prime.getMonth()>=10){
					$("#edit-submitted-data-day-eps").append("<option value='" + prime.valueOf() + "'>0" + prime.getDate() + "." + (prime.getMonth()+1) + "." + prime.getFullYear() + "</option>");
				}	else if (prime.getDate()>=10 && prime.getMonth()<9){
					$("#edit-submitted-data-day-eps").append("<option value='" + prime.valueOf() + "'>" + prime.getDate() + ".0" + (prime.getMonth()+1) + "." + prime.getFullYear() + "</option>");
				}	else {
					$("#edit-submitted-data-day-eps").append("<option value='" + prime.valueOf() + "'>" + prime.getDate() + "." + (prime.getMonth()+1) + "." + prime.getFullYear() + "</option>");
				}
			}
			var url_block = window.location.href.slice(window.location.href.indexOf('#') + 1);
			var url = window.location.href;
			if (url != url_block) {
				$(".livedeo-link[href="+url_block+"]").click();
			}
			$("#edit-submit-tme").click(function(event){
			event.preventDefault();				
				$(".dialog-block").remove();
				for (var i=0; i < $("#form-tme input.obz").size(); i++) {
					if((($("#form-tme input.obz"))[i]).value == "") {	
						$("#edit-actions-tme").append("<span class=\"dialog-block\" style=\"color:red\">Все поля обязательны для заполнения</span>");
						return false;
					}
				}
				if(($("#edit-submitted-vasha-kompaniya-tme option:selected")[0]).value == "0") {	
						$("#edit-actions-tme").append("<span class=\"dialog-block\" style=\"color:red\">Все поля обязательны для заполнения</span>");
						return false;
					}	else {
						var vasha_kompanii = ($("#edit-submitted-vasha-kompaniya-tme option:selected")[0]).value;
					}	
				 var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
				if (pattern.test($("#edit-submitted-email-tme").val())) {} else {
					$("#edit-actions-tme").append("<span class=\"dialog-block\" style=\"color:red\">Введите правильный E-mail</span>");
						return false;
				}
				$("#edit-submitted-last-name").attr("value", $("#edit-submitted-last-name-tme").val());
				$("#edit-submitted-first-name").attr("value", $("#edit-submitted-first-name-tme").val());
				$("#edit-submitted-gorod").attr("value", $("#edit-submitted-gorod-tme").val());
				$("#edit-submitted-kompaniya").attr("value", $("#edit-submitted-kompaniya-tme").val());
				$("#edit-submitted-dolzhnost").attr("value", $("#edit-submitted-dolzhnost-tme").val());
				$("#edit-submitted-email").attr("value", $("#edit-submitted-email-tme").val());
				$("#edit-submitted-telefon").attr("value", $("#edit-submitted-telefon-tme").val());				
				$("#edit-submitted-vasha-kompaniya option[value="+ vasha_kompanii +"]").attr("selected", "selected");
				selectedDate = parseInt($("#edit-submitted-data-day-tme").val());
				var selectedDatetme2 = new Date(selectedDate);
				var selectedDatetme3 = selectedDatetme2.getDate();	
				$("#edit-submitted-data-day option[value="+ selectedDatetme3 +"]").attr("selected", "selected");
				selectedDatetme3 = selectedDatetme2.getMonth() + 1;				
				$("#edit-submitted-data-month option[value="+ selectedDatetme3 +"]").attr("selected", "selected");
				selectedDateeps3 = selectedDatetme2.getFullYear();
				$("#edit-submitted-data-yea option[value="+ selectedDatetme3 +"]").attr("selected", "selected");
				$("#edit-submitted-demonstraciya-2").click();
					$("#webform-client-form-3120").submit();
			});
			$("#edit-submit-eps").click(function(event){
			event.preventDefault();		
				$(".dialog-block").remove();		
				for (var i=0; i < $("#form-eps input.obz").size(); i++) {
					if((($("#form-eps input.obz"))[i]).value == "") {	
						$("#edit-actions-eps").append("<span class=\"dialog-block\" style=\"color:red\">Все поля обязательны для заполнения</span>");
						return false;
					}
				}
				if(($("#edit-submitted-vasha-kompaniya-eps option:selected")[0]).value == "0") {	
						$("#edit-actions-eps").append("<span class=\"dialog-block\" style=\"color:red\">Все поля обязательны для заполнения</span>");
						return false;
					}	else {
						var vasha_kompanii = ($("#edit-submitted-vasha-kompaniya-eps option:selected")[0]).value;
					}
				 var pattern = new RegExp(/^(("[\w-\s]+")|([\w-]+(?:\.[\w-]+)*)|("[\w-\s]+")([\w-]+(?:\.[\w-]+)*))(@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$)|(@\[?((25[0-5]\.|2[0-4][0-9]\.|1[0-9]{2}\.|[0-9]{1,2}\.))((25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\.){2}(25[0-5]|2[0-4][0-9]|1[0-9]{2}|[0-9]{1,2})\]?$)/i);
				if (pattern.test($("#edit-submitted-email-eps").val())) {} else {
					$("#edit-actions-eps").append("<span class=\"dialog-block\" style=\"color:red\">Введите правильный E-mail</span>");
						return false;
				}
				$("#edit-submitted-last-name").attr("value", $("#edit-submitted-last-name-eps").val());
				$("#edit-submitted-first-name").attr("value", $("#edit-submitted-first-name-eps").val());
				$("#edit-submitted-gorod").attr("value", $("#edit-submitted-gorod-eps").val());
				$("#edit-submitted-kompaniya").attr("value", $("#edit-submitted-kompaniya-eps").val());
				$("#edit-submitted-dolzhnost").attr("value", $("#edit-submitted-dolzhnost-eps").val());
				$("#edit-submitted-email").attr("value", $("#edit-submitted-email-eps").val());
				$("#edit-submitted-telefon").attr("value", $("#edit-submitted-telefon-eps").val());
				$("#edit-submitted-vasha-kompaniya option[value="+ vasha_kompanii +"]").attr("selected", "selected");
				selectedDate = parseInt($("#edit-submitted-data-day-eps").val());
				var selectedDateeps2 = new Date(selectedDate);
				var selectedDateeps3 = selectedDateeps2.getDate();	
				$("#edit-submitted-data-day option[value="+ selectedDateeps3 +"]").attr("selected", "selected");
				selectedDateeps3 = selectedDateeps2.getMonth() + 1;				
				$("#edit-submitted-data-month option[value="+ selectedDateeps3 +"]").attr("selected", "selected");
				selectedDateeps3 = selectedDateeps2.getFullYear();
				$("#edit-submitted-data-yea option[value="+ selectedDateeps3 +"]").attr("selected", "selected");				
				$("#edit-submitted-demonstraciya-1").click();
					$("#webform-client-form-3120").submit();
			});
    }
  };
})(jQuery);