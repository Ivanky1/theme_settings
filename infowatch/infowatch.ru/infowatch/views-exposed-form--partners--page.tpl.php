<?php

echo $widgets['filter-tid']->widget;
preg_match_all("/<option.*?value=\"(.*?)\".*?>/",$widgets['filter-tid']->widget,$m1);
preg_match_all("/<option.*?>(.*?)<\/option>/",$widgets['filter-tid']->widget,$m2);
unset($m1[1][0]);
unset($m2[1][0]);
echo '<ul style="padding: 0; margin:0px;" id="strana">';
$classActive = '';
foreach($m2[1] as $k=>$v) {
   if ($_GET['tid'] == $m1[1][$k]) $classActive = ' active';
   else  $classActive = '';
    echo '<li>
             <a rel="nofollow" target="_blank" href="s'.$k.'" class="flag f'.$k.''.$classActive.'" data-item="'.$m1[1][$k].'">'.$v.'</a>
          </li>';
}
echo "</ul>";
echo $widgets['filter-title']->label;
echo $widgets['filter-title']->widget;

if ($_GET['tid'] == 38) {
    echo "Выберите город:";
    echo $widgets['filter-field_country_rus_partners_value']->widget;
    echo "Выберите округ:";
    echo $widgets['filter-field_okrugs_rus_partners_value']->widget;
}

echo '<a rel="nofollow" class="reset" href="/'.$_GET['q'].'">Сбросить</a>';
echo $button;


?>

<script>

    (function($) {
        Drupal.behaviors.citypartners = {
            attach : function(context, settings) {
                $("#edit-tid").hide();
             //   $("#edit-submit-partners").hide();
                $("#strana li a").click(function() {
                    var clickLink = $(this).data('item');
                    $("#edit-tid option").each(function() {
                        if ( $(this).val() == clickLink ) {
                            $(this).attr("selected","selected");
                            if ($(this).val() != 38) {
                                $("#edit-country-rus option").removeAttr('selected');
                                $("#edit-okrugs-rus option").removeAttr('selected');
                            }
                            $("#edit-title").val('');
                            $("#edit-submit-partners").click();
                        }

                    })

                    return false;
                })

                $('#edit-country-rus option').eq(0).text('Все города');
                $('#edit-okrugs-rus option').eq(0).text('Все округа');

                var selectCountry;
                var selectOkrug;
                var selectTid;

                $("#edit-country-rus").bind("change", function() {
                    $("#edit-okrugs-rus option").removeAttr('selected');
                    $("#edit-title").val('');
                    $("#edit-tid option").eq(selectTid).attr("selected","selected");
                    $("#edit-submit-partners").click();
                });
                $("#edit-okrugs-rus").bind("change", function() {
                    $("#edit-country-rus option").removeAttr('selected');
                    $("#edit-title").val('');
                    $("#edit-tid option").eq(selectTid).attr("selected","selected");
                    $("#edit-submit-partners").click();

                });

                $("#edit-title").bind("focus", function() {
                        selectCountry = $("#edit-country-rus").find("option:selected").index();
                        selectOkrug = $("#edit-okrugs-rus").find("option:selected").index();
                        selectTid = $("#edit-tid").find("option:selected").index();
                        $("#edit-okrugs-rus option").removeAttr('selected');
                        $("#edit-country-rus option").removeAttr('selected');
                       // $("#edit-tid option").removeAttr('selected');

                })

                $('#edit-title').blur(function() {
                    if ($(this).val() == '') {
                        if (selectCountry != 0)
                            $("#edit-country-rus option").eq(selectCountry).attr("selected","selected");
                        if (selectOkrug != 0)
                            $("#edit-okrugs-rus option").eq(selectOkrug).attr("selected","selected");
                        if (selectTid != 0)
                            $("#edit-tid option").eq(selectTid).attr("selected","selected");
                    } else {
                        $("#edit-tid option").removeAttr('selected');
                    }
                });

            }
        }

    }) (jQuery)

</script>







