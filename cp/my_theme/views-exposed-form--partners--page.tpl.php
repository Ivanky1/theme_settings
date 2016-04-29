<?php

echo '<div class="left_fl_me"><label>'. $widgets['filter-field_fio_value']->label .'</label>';
echo $widgets['filter-field_fio_value']->widget .'</div>';

echo '<div class="left_fl_me mneed clearfix"><label>'. $widgets['filter-mail']->label .'</label>';
echo $widgets['filter-mail']->widget .'</div>';

echo '<div class="left_fl_me" style="clear:both"><label>'. $widgets['filter-field_company_user_value']->label .'</label>';
echo $widgets['filter-field_company_user_value']->widget .'</div>';

$partners = array(
    '#type' => 'textfield',
    '#attributes' => array('id' => 'manager_name', 'name' => 'manager_name'),
    '#title' => 'Менеджер',
    '#value'=> (isset($_GET['manager_name'])) ?$_GET['manager_name'] : '' ,
);

$q = db_select('users', 'u');
$q->innerJoin('users_roles', 'r', 'r.uid = u.uid');
$q->innerJoin('field_data_field_fio', 'fio', 'fio.entity_id = u.uid');
$q->condition('r.rid', 24);
$q->fields('fio', array('field_fio_value'));
$res = $q->execute();
$rows = array('all' => '- Любой -');
while($row = $res->fetchField()) {
    $rows[$row] = $row;
}
$partners_options =  $rows;
$partners = array(
    '#type' => 'select',
    '#attributes' => array('name' => 'manager_name'),
    '#title' => 'Менеджеры',
    '#options' => $partners_options,
    '#value'=> (isset($_GET['manager_name']) && array_key_exists($_GET['manager_name'], $partners_options))
            ?$_GET['manager_name'] : 'all' ,
);

echo '<div class="left_fl_me mneed clearfix">'. drupal_render($partners) .'</div>';

echo '<div style="clear:both;">'. $button;
echo "&nbsp;&nbsp;";
echo $reset_button .'</div>';

