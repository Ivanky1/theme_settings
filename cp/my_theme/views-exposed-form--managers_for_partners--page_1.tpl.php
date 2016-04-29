<?php
global $user;
$q = db_select('node','n')->distinct();
$q->innerJoin('field_data_field_link_user_client_lead','user_link', 'n.nid = user_link.entity_id');
$q->innerJoin('users', 'users', 'users.uid = user_link.field_link_user_client_lead_target_id');
$q->innerJoin('field_data_field_fio', 'fio', 'users.uid = fio.entity_id');
if (array_key_exists(3, $user->roles) || array_key_exists(24, $user->roles)) {
    $q->condition('n.uid', arg(2));
} else {
    $q->condition('n.uid', $user->uid);
}
$q->fields('users', array('uid', 'name'));
$q->fields('fio', array('field_fio_value'));
$res = $q->execute();
$options = array('' => '- Любой -');
while($r = $res->fetchAssoc()) {
    $options[$r['uid']] = $r['field_fio_value'];
}

echo '<div class="left_fl_me"><label>'. $widgets['filter-title']->label .'</label>';
echo $widgets['filter-title']->widget .'</div>';

$partners = array(
    '#type' => 'select',
    '#attributes' => array('id' => 'edit-field-link-user-client-lead-target-id', 'name' => 'field_link_user_client_lead_target_id'),
    '#title' => 'Партнеры',
    '#options' => $options,
    '#value'=> (isset($_GET['field_link_user_client_lead_target_id']) && array_key_exists($_GET['field_link_user_client_lead_target_id'], $options))
                ?$_GET['field_link_user_client_lead_target_id'] : '' ,
);
echo '<div class="left_fl_me mneed">'. drupal_render($partners) .'</div>';

echo '<div class="left_fl_me"><label>'. $widgets['filter-field_products_client_lead_value']->label .'</label>';
echo $widgets['filter-field_products_client_lead_value']->widget .'</div>';

echo '<div class="left_fl_me"><label>'.  $widgets['filter-field_status_client_lead_value_1']->label .'</label>';
echo $widgets['filter-field_status_client_lead_value_1']->widget .'</div>';


$activity_options = array(
    '' => '- Любой -',
    'new'=>'Есть запланированные активности',
    'old'=>'Есть просроченные активности',
    'noo'=>'Нет запланированных активностей',
);
$activities = array(
    '#type' => 'select',
    '#attributes' => array('name' => 'activity_status'),
    '#title' => 'Активность',
    '#options' => $activity_options,
    '#value'=> (isset($_GET['activity_status']) && array_key_exists($_GET['activity_status'], $activity_options))
            ?$_GET['activity_status'] : '' ,
);
echo '<div class="left_fl_me mneed clearfix">'. drupal_render($activities) .'</div>';

echo '<div style="clear:both;">'. $button;
echo "&nbsp;&nbsp;";
echo $reset_button .'</div>';

