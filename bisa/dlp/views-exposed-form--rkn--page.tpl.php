<div style="margin-top:15px;overflow:hidden; height:30px;"><label for="edit-field-number-state-plan-value">
<?php
echo $widgets['filter-field_number_state_plan_value']->label;
?></label>
<?php
echo $widgets['filter-field_number_state_plan_value']->widget;
?>
</div>
<div style="margin-top:15px;overflow:hidden; height:30px;">
<label for="filter-field_number_inn_plan_value">
<?php
echo $widgets['filter-field_number_inn_plan_value']->label;
?></label>
<?php
echo $widgets['filter-field_number_inn_plan_value']->widget;
?>
</div>
<div style="margin-top:15px;overflow:hidden; height:30px;">
<label for="filter-title">
<?php
echo $widgets['filter-title']->label;
?></label>
<?php
echo $widgets['filter-title']->widget;
?>
</div>
<div style="margin-top:15px;overflow:hidden; height:30px;">
<label for="filter-field_date_check_value">
<?php
echo $widgets['filter-field_date_check_value']->label;
?></label>
<?php
$widgets['filter-field_date_check_value']->widget = preg_replace('/(<option.*)>.*\-Month(<\/option>)/',
    '$1 >Выберите месяц$2',$widgets['filter-field_date_check_value']->widget);
echo preg_replace('/<div.*?form\-item\-field\-date\-check\-value\-value\-year.*>\n.*\n.*<\/div>.*\n<\/div>/m',
    '<input class="year_hidden" type="hidden" name="field_date_check_value[value][year]" value="'.date('Y').'">', $widgets['filter-field_date_check_value']->widget);

?>
</div>
<div class="more_text" style="margin-top:15px;overflow:hidden;">
<label for="filter-field_org_title_plan_value">
<?php
echo $widgets['filter-field_org_title_plan_value']->label;
?></label>
<?php
echo $widgets['filter-field_org_title_plan_value']->widget;
?>
</div>
<div style="margin-top:15px;overflow:hidden; height:30px;">
<?php
echo $button;
?>
</div>
<script>
    (function($) {
        Drupal.behaviors.rkn = {
            attach : function(context, settings) {
                $('#views-exposed-form-rkn-page').on('submit', function() {
                    if ($("select.date-month option:selected").val() == "") {
                        $(".year_hidden").val('');
                    }
                })

            }
        }
    }) (jQuery)

</script>
