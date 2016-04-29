<?php
echo $widgets['filter-tid']->widget;
preg_match_all("/<option.*?value=\"(.*?)\".*?>/",$widgets['filter-tid']->widget,$m1);
preg_match_all("/<option.*?>(.*?)<\/option>/",$widgets['filter-tid']->widget,$m2);
unset($m1[1][0]);
unset($m2[1][0]);
echo '<ul style="padding: 0; margin:0px;overflow: hidden;background: #e1e1e1;border-bottom: 1px solid #fff;" id="strana">';
$classActive = '';
$classLiActive = '';
foreach($m2[1] as $k=>$v) {
   if ((isset($_GET['tid']) && $_GET['tid'] == $m1[1][$k]) || !isset($_GET['tid'])) $classActive = ' active';
   else  $classActive = ' noactive';
   if (isset($_GET['tid']) && $_GET['tid'] == $m1[1][$k]) $classLiActive = 'active';
   else  $classLiActive = '';
   if ($k != 6) $flag = 'flag';
   else $flag = '';
    echo '<li class="'.$classLiActive.'">
             <a rel="nofollow" target="_blank" href="s'.$k.'" class="'.$flag.' f'.$k.''.$classActive.'" data-item="'.$m1[1][$k].'">'.$v.'</a>
         </li>';
}
echo "</ul>";

if (isset($_GET['tid']) && $_GET['tid'] == 38) {
    echo "<div class='region_block'>";
        echo "<div class='city_block'>";
            echo "Выберите город:";
            echo $widgets['filter-field_country_rus_partners_value']->widget;
        echo "</div>";
        echo "<div class='okrug_block'>";
            echo "Выберите округ:";
            echo $widgets['filter-field_okrugs_rus_partners_value']->widget;
        echo "</div>";
    echo "</div>";
}
?>
<div class='search_block'>
    <div style=" float: left; text-align: center; padding-left: 50px; line-height: 26px; ">
       <?php echo $widgets['filter-title']->label; ?>
    </div>
    <div style=" float: left; text-align: center; padding-left: 50px; line-height: 26px; ">
        <?php echo $widgets['filter-title']->widget; ?>
    </div>
    <div style=" float: left; text-align: center; padding-left: 50px; line-height: 26px; ">
        <?php echo $button; ?>
    <a rel="nofollow" class='search_block_reset' href='/<?php echo $_GET['q']?>'>Сбросить</a>
    </div>
</div>
<?php
$link = '';
$link .= (isset($_POST['tid']) && $_POST['tid'] != '' && $_POST['tid'] != 'All')  ?'tid='.$_POST['tid']."&" :'';
$link .= (isset($_POST['title']) && $_POST['title'] != '' && $_POST['title'] != 'All')  ?'title='.$_POST['title']."&" :'';
$link .= (isset($_POST['country_rus']) && $_POST['country_rus'] != '' && $_POST['country_rus'] != 'All')  ?'country_rus='.$_POST['country_rus']."&" :'';
$link .= (isset($_POST['okrugs_rus']) && $_POST['okrugs_rus'] != '' && $_POST['okrugs_rus'] != 'All')  ?'okrugs_rus='.$_POST['okrugs_rus']."&" :'';


?>

<script>

    (function($) {
        Drupal.behaviors.citypartners = {
            attach : function(context, settings) {
                $("#edit-tid").hide();
                $("#strana li").click(function() {
                    $(this).find('>a').click();
                })
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
                selectTid = $("#edit-tid").find("option:selected").index();
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
                        //selectTid = $("#edit-tid").find("option:selected").index();
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
