$( document ).ready(function() {
		var price_olds = {"sale1":1, "sale2":2, "sale3":3};
		var price_base = {"price1":900, "price2":1710, "price3":2430, "sale1":1, "sale2":0.95, "sale3":0.9};
		var price_total = {"price1":1700, "price2":3000, "price3":4500, "sale1":1, "sale2":0.95, "sale3":0.9};
		var sale_moduls = {"sale":0.9, "sale1":1, "sale2":0.85, "sale3":0.83};
		var price_for = {"au_modul":400, "acc_modul":400, "pm_modul":400, "fe_modul":800, "de_modul":400, "apc_modul":400};
	    var intRegex = /^[1-9][0-9]*$/;
	    modul=0;
	    mdul_val=0;
	    $(".users").on('keyup', function(e) {
	    	$(".helpblock_users .warr").remove();
	    	var users = $(this).val();
	    	if(users > 999) {
	    		$(this).parent(".helpblock_users").append("<a href='#helpblock_users' class='warr'>&nbsp;</a>");
	    		$(this).val("0");
	    	} else {
	    	$(".helpblock_users .warr").remove();
	    	}
	    });	    
	    $(".helpblock_users").on("click", 'a.warr', function () {
	    	$(".help_block").append($(".moduls_ul .cbox.active").removeClass("active"));
	    	$(".moduls_ul .cbox.active").remove();
	    	$(".help_block").append($(".moduls_bl .cbox.active").removeClass("active"));
	    	$(".moduls_bl .cbox.active").remove();
	    	$(".help_block").append($(".helpblock_users .cbox.active").removeClass("active"));
	    	$(".helpblock_users .cbox.active").remove();
	    	link_help = $(this).attr("href");
	    	$(link_help).addClass("active");
	    	$(this).parent(".helpblock_users").append($(link_help));
	    	return false;
	    });
	    $("#helpblock_users").on("click", function () {
	    	$(".help_block").append($(".helpblock_users .cbox.active").removeClass("active"));
	    	$(".helpblock_users .cbox.active").remove();
	    	return false;
	    });	
	    $(".help").on("click", function () {
	    	$(".help_block").append($(".helpblock_users .cbox.active").removeClass("active"));
	    	$(".helpblock_users .cbox.active").remove();
	    	$(".help_block").append($(".moduls_ul .cbox.active").removeClass("active"));
	    	$(".moduls_ul .cbox.active").remove();
	    	$(".help_block").append($(".moduls_bl .cbox.active").removeClass("active"));
	    	$(".moduls_bl .cbox.active").remove();
	    	link_help = $(this).attr("href");
	    	$(link_help).addClass("active");
	    	$(this).parent("li").append($(link_help));
	    	return false;
	    });
	    $("li").on("click", ".cbox.active", function () {	
	    	$(".help_block").append($(".moduls_ul .cbox.active").removeClass("active"));
	    	$(".moduls_ul .cbox.active").remove();
	    	$(".help_block").append($(".moduls_bl .cbox.active").removeClass("active"));
	    	$(".moduls_bl .cbox.active").remove();
	    	return false;
	    });	    
	    $(".link_razdel").click(function () {
	    	$(".error").removeClass("error");
	    	$(".link_razdel").removeClass("active").addClass("noact");
	    	$(this).addClass("active").removeClass("noact");
	    	var link = $(this).attr("uid");
	    	link2 = $("#"+link);
	    	$(".more").filter(".active").removeClass("active");
	    	link2.addClass("active");
	    	return false;
	    });
	    $(".ppls4_no").click(function () {
	    if (mdul_val==0) {
	    	$(".error").removeClass("error");
	    	$(this).parent().addClass("check");
	     	$(".modul_box").attr("readonly","readonly"); 
	     	$(".checked .right_td").css("opacity", "0.3");
	     	$(".ppls4_it").show(); 
	     	$("#moduls_bl li").addClass("nomore");
	   		mdul_val=1;
	    } else {  	    	   	
	    	$(".error").removeClass("error");
	    	$(this).parent().removeClass("check");
	     	$(".ppls4_it").hide();
	     	$(".modul_box").removeAttr("readonly");
	     	$(".checked .right_td").css("opacity", "1");
	     	$("#moduls_bl li").removeClass("nomore");
	   		mdul_val=0;
	    }	
	    });
	    $(".select_all").click(function () {
	    if (modul<6) {
	    	$(".error").removeClass("error");
	    	$(this).addClass("check");
	    	$("#moduls_bl .name_modul").parent("li").not(".checked").children(".name_modul").click();
	   		modul=6;
	    } else {  	    	   	
	    	$(".error").removeClass("error");
	    	$(this).removeClass("check");	     	
	    	$("#moduls_bl .name_modul").parent("li").filter(".checked").children(".name_modul").click();
	   		modul=0;
	    }	
	    });
	    $( "#ppls_all").change(function() {	
	    	$(".error").removeClass("error");
	     	var ppls = parseInt($(this).val());
				if (intRegex.test(ppls)) {
					$(".modul_box").val(ppls);
				} else {
					$(this).addClass("error");
					return false;
				}
		});
		$("#moduls_bl .name_modul").on("click", function () {
	    	$(".error").removeClass("error");		 	
		 	$(this).parent("li").toggleClass("checked");
		 	if($(this).parent("li").hasClass("nomore")){
		 		if ($(this).parent("li").hasClass("checked")) {	
	     		$(this).next().next(".right_td").css("opacity", "0.3");
	     			modul=modul+1;
				} else {
	     		$(this).next().next(".right_td").css("opacity", "0");
					modul=modul-1;	
				}
		 	} else {
		 	if ($(this).parent("li").hasClass("checked")) {		
	     		$(this).next().next(".right_td").css("opacity", "1");
	     			modul=modul+1;
				} else {
	     		$(this).next().next(".right_td").css("opacity", "0");
					modul=modul-1;	
				}
			} 			
			if (modul==6) {
	    		$(".select_all").addClass("check");
			} else {				
	    		$(".select_all").removeClass("check");
			}
	    });
	    $(".raschet").click(function () {
	   		$("#Itogo").hide(); 
	    	$("#itogo_body").html("");
	    	var Summa=0; var Summa_ob = 0;var poz_last;
	    	link = $(this).attr("href");
	    	$(".error").removeClass("error");
	    	if (link == "bs") {
	    		poz_last = "Base Solution";
	    		var ppls = parseInt($("#ppls1").val());
	    		var sale = $("#sale1 option:selected").val();
	    		var sale2 = $("#sale1 option:selected").text();
	    		var price_sum = (price_base)["price"+price_olds[sale]];
	    		if (intRegex.test(ppls)) {
	    		document.getElementById("ppls1").value = ppls;
	    			Summa = price_sum*ppls;
					sale_gr_html = 100 - (price_base[sale]*100);
	   				 $("#itogo_body").append("<tr><td>"+ poz_last + "</td><td class='title'>"+ ppls + "</td><td class='title'>"+ sale2 + "</td><td class='title'>"+ price_sum + " руб.</td><td class='title'>"+ Summa + " руб. </td></tr>");
	    			 if(sale_gr_html>0){$("#itogo_body").append("<tr><td colspan='5' style='font-style:italic;text-align:right;'>Скидка на пакет "+ poz_last + " на "+ sale2 + " составила "+ sale_gr_html + "%</td></tr>");}
	    		} else {
	    			$("#ppls1").addClass("error");
	    			return false;
	    		}
	    		Summa = Math.round(Summa);
	    		$("#summa_ob").text(Summa+" руб.");
	    		
	    	} else
	    	if (link == "ts") {
	    		poz_last = "Total Solution";
	    		var ppls = parseInt($("#ppls2").val());
	    		var sale = $("#sale2 option:selected").val();
	    		var sale2 = $("#sale2 option:selected").text();	    		
	    		var price_sum = (price_total)["price"+price_olds[sale]];
	    		if (intRegex.test(ppls)) {
	    		document.getElementById("ppls2").value = ppls;
	    			Summa = price_sum*ppls;
					sale_gr_html = 100 - (price_base[sale]*100);
	   				 $("#itogo_body").append("<tr><td>"+ poz_last + "</td><td class='title'>"+ ppls + "</td><td class='title'>"+ sale2 + "</td><td class='title'>"+ price_sum + " руб.</td><td class='title'>"+ Summa + " руб. </td></tr>");
					 if(sale_gr_html>0){$("#itogo_body").append("<tr><td colspan='5' style='font-style:italic;text-align:right;'>На пакет Total Solution на "+ sale2 + " предоставляется скидка</td></tr>");}
	    		} else {
	    			$("#ppls2").addClass("error");
	    			return false;
	    		}
	    		Summa = Math.round(Summa);
	    		$("#summa_ob").text(Summa+" руб.");
	    	} else
	    	if (link == "mod") {
	    		var sale1_for = {"au_modul1":1, "acc_modul1":1, "pm_modul1":1, "fe_modul1":1, "de_modul1":1, "apc_modul1":1, "au_modul2":0.95, "acc_modul2":0.95, "pm_modul2":0.95, "fe_modul2":0.95, "de_modul2":0.95, "apc_modul2":0.95, "au_modul3":0.9, "acc_modul3":0.9, "pm_modul3":0.9, "fe_modul3":0.9, "de_modul3":0.9, "apc_modul3":0.9};
	    		var sale_group = {"sale1":0.9, "sale2":0.85, "sale3":0.83};
	    		var ppls = parseInt($("#ppls2").val());
	    		var sale = $("#sale3 option:selected").val();
	    		var sale2 = $("#sale3 option:selected").text();	
				if(modul==0) {	
	    			$("#moduls_bl").addClass("error");
	    			return false;
	    		} else {
	    			if(modul==2){
	    				var sale_gr = sale_group["sale1"];
	    				modul_text = "2 модуля";
	    			} else if (modul==3) {	
	    				var sale_gr = sale_group["sale2"];
	    				modul_text = "3 модуля";
	    			} else if (modul==4) {
	    				var sale_gr = sale_group["sale3"];	    				
	    				modul_text = "4 модуля";
	    			} else if (modul>4) {
	    				var sale_gr = sale_group["sale3"];	    				
	    				modul_text = modul + " модулей";
	    			} else {
	    				var sale_gr = 1;
	    			};
	    			if(mdul_val!=0){
		    			test2 = $("#ppls_all")[0].value;		    				
	    				if (!(intRegex.test(test2))) {
			    			$("#ppls_all").addClass("error");
			    			return false;
			    		}
		    			$("#moduls_bl li.checked").each(function() {
	    					poz_last = $(this).children(".name_modul").text();
		    				total_i = $(this).attr("ID");
		    				test = price_olds[sale];
		    				test4 = (sale1_for)[total_i + "_modul" + test];
		    				test3 = ((price_for)[total_i+"_modul"])*(test4)*test;
		    				Summa = (test3*test2);
		    				$("#itogo_body").append("<tr><td>"+ poz_last + "</td><td class='title'>"+ test2 + "</td><td class='title'>"+ sale2 + "</td><td class='title'>"+ test3 + " руб.</td><td class='title'>"+ Summa + " руб. </td></tr>");
		    				Summa_ob = Summa_ob + (Summa*sale_gr);
		    			});
		    		sale_gr_text = 100 - (sale_gr*100);	
	    			if(modul>1){$("#itogo_body").append("<tr><td colspan='5' style='font-style:italic;text-align:right;'>Пакетная скидка на "+ modul_text + " составила "+ sale_gr_text + " %</td></tr>");} 
	    			Summa_ob = Math.round(Summa_ob);
			 		$("#summa_ob").text(Summa_ob+" руб.");
	    			}
	    			if(mdul_val==0){
	    				var chertov_flag = 0; var html_blocks = "";
		    			$("#moduls_bl li.checked").each(function() {
	    					poz_last = $(this).children(".name_modul").text(); //наименование модуля
		    				total_i = $(this).attr("ID"); 
		    				test = price_olds[sale];
		    				test2 = $("#ppls_"+total_i)[0].value;  //количество лицензий
		    				if (!(intRegex.test(test2))) {
				    			$("#ppls_"+total_i).addClass("error");
				    			chertov_flag = 1;
				    		}
		    				test4 = (sale1_for)[total_i + "_modul" + test];  //скидка на модуль от лицензии
		    				test3 = ((price_for)[total_i+"_modul"])*(test4)*test;  //цена одного модуля
		    				Summa = (test3*test2);  //сумма на модуль от лицензии и кол-во
		    				html_blocks = html_blocks + ("<tr><td>"+ poz_last + "</td><td class='title'>"+ test2 + "</td><td class='title'>"+ sale2 + "</td><td class='title'>"+ test3 + " руб.</td><td class='title'>"+ Summa + " руб. </td></tr>");		
		    				Summa_ob = Summa_ob + (Summa*sale_gr);	
		    			});
		    			if (chertov_flag==1) {
			    			return false;
			    		} else {  				 		
	   				 		$("#itogo_body").append(html_blocks);
				    		sale_gr_text = 100 - (sale_gr*100);	
			    			if(modul>1){$("#itogo_body").append("<tr><td colspan='5' style='font-style:italic;text-align:right;'>Пакетная скидка на "+ modul_text + " составила "+ sale_gr_text + " %</td></tr>");} 
			    			Summa_ob = Math.round(Summa_ob);
					 		$("#summa_ob").text(Summa_ob+" руб.");			    			
			    		}
		    		}
		    	}
	    	};
	    $("#Itogo").show(); 
	    $('html, body').animate({
			scrollTop: $("#Itogo").offset().top
			}, 500);
	    return false;
		});
});