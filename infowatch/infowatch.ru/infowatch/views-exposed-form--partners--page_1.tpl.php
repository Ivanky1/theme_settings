<?php

echo $widgets['filter-title']->label;
echo $widgets['filter-title']->widget;
echo "Округа России";
echo $widgets['filter-field_okrugs_rus_partners_value']->widget;
echo '<a rel="nofollow" class="reset" href="/'.$_GET['q'].'">Сбросить</a>';
echo $button;


?>



<script>

    (function($) {
        Drupal.behaviors.cmbpartners = {
            attach : function(context, settings) {

                $('#edit-okrugs-rus option').eq(0).text('Все округа');
                $("#edit-okrugs-rus").bind("change", function() {
                    $("#edit-title").val('');
                    $("#edit-submit-partners").click();

                });

                var selectOkrug;
                $("#edit-title").bind("focus", function() {
                    selectOkrug = $("#edit-okrugs-rus").find("option:selected").index();
                    $("#edit-okrugs-rus option").removeAttr('selected');
                })

                $('#edit-title').blur(function() {
                    if ($(this).val() == '') {
                        if (selectOkrug != 0)
                            $("#edit-okrugs-rus option").eq(selectOkrug).attr("selected","selected");
                    }
                });



            }
        }

    }) (jQuery)

</script>

