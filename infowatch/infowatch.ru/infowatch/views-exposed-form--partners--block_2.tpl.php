<?php
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



<script>

    (function($) {
        Drupal.behaviors.cmbpartners = {
            attach : function(context, settings) {

                $('#edit-okrugs-rus option').eq(0).text('Все округа');
                $("#edit-okrugs-rus").bind("change", function() {
                    $("#edit-field-country-rus-partners-value option").removeAttr('selected');
                    $("#edit-title").val('');
                    $("#edit-submit-partners").click();

                });

                var selectOkrug;
                var selectCountry;
                $("#edit-field-country-rus-partners-value").bind("change", function() {
                    $("#edit-okrugs-rus option").removeAttr('selected');
                    $("#edit-title").val('');
                    $("#edit-submit-partners").click();
                });

                $("#edit-title").bind("focus", function() {
                    selectOkrug = $("#edit-okrugs-rus").find("option:selected").index();
                    selectCountry = $("#edit-field-country-rus-partners-value").find("option:selected").index();
                    $("#edit-okrugs-rus option").removeAttr('selected');
                    $("#edit-field-country-rus-partners-value option").removeAttr('selected');
                })

                $('#edit-title').blur(function() {
                    if ($(this).val() == '') {
                        if (selectCountry != 0)
                            $("#edit-field-country-rus-partners-value option").eq(selectCountry).attr("selected","selected");
                        if (selectOkrug != 0)
                            $("#edit-okrugs-rus option").eq(selectOkrug).attr("selected","selected");
                    }
                });



            }
        }

    }) (jQuery)

</script>

