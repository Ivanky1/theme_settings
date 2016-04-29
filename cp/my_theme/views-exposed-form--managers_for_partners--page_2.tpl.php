<?php
drupal_add_js(path_to_theme().'/js/ajax/lead_ajax.js');
echo '<div class="left_fl_me"><label>'. $widgets['filter-title']->label .'</label>';
echo $widgets['filter-title']->widget .'</div>';

$options = select_partners_managers('managers');
$managers = array(
    '#type' => 'select',
    '#attributes' => array('id' => 'managers_name', 'name' => 'manager_name'),
    '#title' => 'Менеджеры',
    '#options' => $options,
    '#value'=> (isset($_GET['manager_name']) && array_key_exists($_GET['manager_name'], $options))
            ?$_GET['manager_name'] : '' ,
);
echo '<div class="left_fl_me mneed">'. drupal_render($managers) .'</div>';


if (isset($_GET['manager_name']) && $_GET['manager_name'] ) {
    $manager_name = strip_tags($_GET['manager_name']);
}
$options = isset($manager_name) ?select_partners_managers('partners', $manager_name) :select_partners_managers('partners');
$partners = array(
        '#type' => 'select',
        '#attributes' => array('name' => 'field_link_user_client_lead_target_id'),
        '#title' => 'Партнеры',
        '#options' => $options,
        '#value'=> (isset($_GET['field_link_user_client_lead_target_id']) && array_key_exists($_GET['field_link_user_client_lead_target_id'], $options))
                ?$_GET['field_link_user_client_lead_target_id'] : '' ,
    );
    echo '<div class="left_fl_me mneed" id="partners_name">'. drupal_render($partners) .'</div>';



echo '<div class="left_fl_me clearfix"><label>'. $widgets['filter-field_products_client_lead_value']->label .'</label>';
echo $widgets['filter-field_products_client_lead_value']->widget .'</div>';

echo '<div class="left_fl_me mneed"><label>'.  $widgets['filter-field_status_client_lead_value_1']->label .'</label>';
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
echo '<div class="left_fl_me clearfix">'. drupal_render($activities) .'</div>';

echo '<div style="clear:both;">'. $button;
echo "&nbsp;&nbsp;";
echo $reset_button;
echo "&nbsp;&nbsp;";
echo l('Скачать', 'leads/all/export', array('query' => drupal_get_query_parameters(), 'attributes' => array('class' => array('def_button',))));
echo '</div>';


function select_partners_managers($type, $name = '') {
    $q = db_select('node','n')->distinct();

    if ($type == 'partners') {
        $q->innerJoin('field_data_field_link_user_client_lead','user_link', 'n.nid = user_link.entity_id');
        $q->innerJoin('users', 'users', 'users.uid = user_link.field_link_user_client_lead_target_id');
        $q->fields('users', array('uid', 'name'));
        if ($name) {
            $q->where("users.uid in (select field_partner_link_user_target_id from field_data_field_partner_link_user
                where entity_id in (select uid from users where name = :name)
            )", array(':name' => $name));
        }
    } elseif($type == 'managers') {
        $q->innerJoin('field_data_field_link_user_client_lead','user_link', 'n.nid = user_link.entity_id');
        $q->innerJoin('users', 'users', 'users.uid = n.uid');
        $q->fields('users', array('uid', 'name'));
    }
    $q->innerJoin('field_data_field_fio', 'fio', 'users.uid = fio.entity_id');
    $q->fields('fio', array('field_fio_value'));
    $res = $q->execute();
    $options = array('' => '- Любой -');
    while($r = $res->fetchAssoc()) {
        if ($type == 'partners') {
            $options[$r['uid']] = $r['field_fio_value'];
        } else {
            $options[$r['name']] = $r['field_fio_value'];
        }
    }
    return $options;
}