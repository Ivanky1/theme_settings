<?php

/**
 * @param $page
 * theme_page_alter
 */
function my_theme_page_alter($page) {
    if (drupal_is_front_page()) {
        $meta_img = array(
            '#type' => 'html_tag',
            '#tag' => 'meta',
            '#attributes' => array(
                'name' => 'yandex-verification',
                'content' => '54644a407165f879'
            )
        );
        drupal_add_html_head( $meta_img, 'meta_img' );
    }
}


/**
 * Override of theme_breadcrumb().
 */
function my_theme_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Override or insert variables into the maintenance page template.
 */
function my_theme_preprocess_maintenance_page(&$vars) {
  // While markup for normal pages is split into page.tpl.php and html.tpl.php,
  // the markup for the maintenance page is all in the single
  // maintenance-page.tpl.php template. So, to have what's done in
  // my_theme_preprocess_html() also happen on the maintenance page, it has to be
  // called here.

  my_theme_preprocess_html($vars);
}

/**
 * Override or insert variables into the html template.
 */
function my_theme_preprocess_html(&$vars) {
    if (arg(0) == 'node' && !arg(1)) {
        drupal_goto(drupal_is_front_page());
    }
  // Toggle fixed or fluid width.
  if (theme_get_setting('my_theme_width') == 'fluid') {
    $vars['classes_array'][] = 'fluid-width';
  }
  if ( ($vars['is_front'] != 1  && isset($vars['page']['content']['system_main']['nodes']) && !array_key_exists(16, $vars['page']['content']['system_main']['nodes'])) || !isset($vars['page']['content']['system_main']['nodes'])) {
      $vars['classes_array'][] = 'wrapper-2col';
  }
  // Add conditional CSS for IE6.

  drupal_add_css(path_to_theme() . '/fix-ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));

  //if ($_GET['q'] == 'node/447' || $_GET['q'] == 'node/465') {
    //drupal_add_css(path_to_theme().'/js/chat/chat.css');
      /*     drupal_add_css(path_to_theme().'/js/chat/chat.css');
           drupal_add_js('https://c.la1-c1-lon.salesforceliveagent.com/content/g/js/35.0/deployment.js', 'external');
           if (!drupal_is_front_page()) {
               (in_array('i18n-ru',$vars['classes_array']))
                   ?drupal_add_js(path_to_theme().'/js/chat/chat_script.js')
                   :drupal_add_js(path_to_theme().'/js/chat/chat_script_en.js');
           }
      */
   //}

 //if ($_GET['q'] == 'node/447' || $_GET['q'] == 'node/465' || drupal_is_front_page() ) {

 if ($_GET['q'] == 'node/493' || $_GET['q'] == 'node/494' ) {
    drupal_add_js('https://c.la1-c1-lon.salesforceliveagent.com/content/g/js/35.0/deployment.js', 'external');
    drupal_add_js(path_to_theme().'/js/chat/chat_script_webform.js');
 }

  drupal_add_js(path_to_theme().'/js/jquery_cookie/jquery.cookie.js');
  drupal_add_js(path_to_theme().'/js/script.js');
  if ($_GET['q'] == 'node/491') {
   // drupal_add_js(path_to_theme().'/js/web_to_case.js');
  }




}

/**
 * Override or insert variables into the html template.
 */
function my_theme_process_html(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_html_alter($vars);
  }
}

/**
 * Override or insert variables into the page template.
 */
function my_theme_preprocess_page(&$vars) {
  // Move secondary tabs into a separate variable.
  $vars['tabs2'] = array(
    '#theme' => 'menu_local_tasks',
    '#secondary' => $vars['tabs']['#secondary'],
  );
  unset($vars['tabs']['#secondary']);

  if (isset($vars['main_menu'])) {
    $vars['primary_nav'] = theme('links__system_main_menu', array(
      'links' => $vars['main_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'main-menu'),
      ),
      'heading' => array(
        'text' => t('Main menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['primary_nav'] = FALSE;
  }
  if (isset($vars['secondary_menu'])) {
    $vars['secondary_nav'] = theme('links__system_secondary_menu', array(
      'links' => $vars['secondary_menu'],
      'attributes' => array(
        'class' => array('links', 'inline', 'secondary-menu'),
      ),
      'heading' => array(
        'text' => t('Secondary menu'),
        'level' => 'h2',
        'class' => array('element-invisible'),
      )
    ));
  }
  else {
    $vars['secondary_nav'] = FALSE;
  }

  // Prepare header.
  $site_fields = array();
  if (!empty($vars['site_name'])) {
    $site_fields[] = $vars['site_name'];
  }
  if (!empty($vars['site_slogan'])) {
    $site_fields[] = $vars['site_slogan'];
  }
  $vars['site_title'] = implode(' ', $site_fields);
  if (!empty($site_fields)) {
    $site_fields[0] = '<span>' . $site_fields[0] . '</span>';
  }
  $vars['site_html'] = implode(' ', $site_fields);

  // Set a variable for the site name title and logo alt attributes text.
  $slogan_text = $vars['site_slogan'];
  $site_name_text = $vars['site_name'];
  $vars['site_name_and_slogan'] = $site_name_text . ' ' . $slogan_text;

}

/**
 * Override or insert variables into the node template.
 */
function my_theme_preprocess_node(&$vars) {
  $vars['submitted'] = $vars['date'] . ' — ' . $vars['name'];
}

/**
 * Override or insert variables into the comment template.
 */
function my_theme_preprocess_comment(&$vars) {
  $vars['submitted'] = $vars['created'] . ' — ' . $vars['author'];
}

/**
 * Override or insert variables into the block template.
 */
function my_theme_preprocess_block(&$vars) {
  $vars['title_attributes_array']['class'][] = 'title';
  $vars['classes_array'][] = 'clearfix';
}

/**
 * Override or insert variables into the page template.
 */
function my_theme_process_page(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}

/**
 * Override or insert variables into the region template.
 */
function my_theme_preprocess_region(&$vars) {
  if ($vars['region'] == 'content' && (arg(0) == 'bonus' || $_GET['q'] == 'node/17') ) {
      $vars['classes_array'][] = 'bonus';
   // $vars['classes_array'][] = 'clearfix';
  }
}

/**
 * @param $variables
 * @return string
 */
function my_theme_menu_link($variables) {
    global $user;
    if ($variables['element']['#title'] == 'Персональное меню') {
       //$variables['element']['#localized_options']['html'] = TRUE;
            // redefinition_menu() - пользовательская функция, возвращающая переопределенное название пункта меню
        if (!is_null(mytheme_redefinition_menu($variables['element']['#title'], $user, 'head'))) {
            $variables['element']['#attributes']['class'][]  = mytheme_redefinition_menu($variables['element']['#title'], $user, 'head');
        }
    }
    if (isset($variables['element']) && $variables['element']['#below']) {
        foreach($variables['element']['#below'] as $key=>$variable) {
            if (isset($variable['#theme']) && $variable['#theme'] == 'menu_link__menu_person_menu_head') {
                if (($variable['#title'] == 'Login' || $variable['#title'] == 'Войти')
                    && $user->uid != 0   ) {
                    $variables['element']['#below'][$key]['#title'] = ''.$user->name;
                    $variables['element']['#below'][$key]['#attributes']['class'][] = 'li_bott_persmenu user_bl';
                } elseif ( ($variable['#title'] == 'Exit' || $variable['#title'] == 'Выход')
                    && $user->uid != 0   ) {
                    $variables['element']['#below'][$key]['#attributes']['class'][] = 'li_bott_persmenu logout_bl';
                } elseif (isset($variable['#href']) && $variable['#href'] == 'bonus/request/manage' && $user->uid != 0) {
                    if (!is_null(mytheme_redefinition_menu($variables['element']['#below'][$key]['#title'], $user))) {
                        $variables['element']['#below'][$key]['#localized_options']['html'] = TRUE;
                        $variables['element']['#below'][$key]['#title'] = mytheme_redefinition_menu($variables['element']['#below'][$key]['#title'], $user);
                    }
                }
                if (strstr(drupal_get_path_alias($_GET['q']), $variable['#href']) ) {
                    $variables['element']['#below'][$key]['#attributes']['class'][] = 'active-trails';
                }
            }
        }
    } elseif (isset($variables['element']['#theme']) && $variables['element']['#theme'] == 'menu_link__menu_menu_head'
              && strstr(drupal_get_path_alias($_GET['q']), drupal_get_path_alias($variables['element']['#original_link']['link_path']) )
              && drupal_get_path_alias($_GET['q']) != drupal_get_path_alias($variables['element']['#original_link']['link_path']) ) {
        $variables['element']['#attributes']['class'][] = 'active-trails-parent';
    }

    if ($variables['element']['#href']  == 'lead/partners/user') {
        $variables['element']['#href'] = 'lead/partners/'.$user->uid;
    }

    $element = $variables['element'];
    $sub_menu = '';

    if ($element['#below']) {
        $sub_menu = drupal_render($element['#below']);
    }
    $output = l($element['#title'], $element['#href'], $element['#localized_options']);
    return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

/**
 * @param $name
 * @param $user
 * @param null $menu
 * @return null|string
 */
function mytheme_redefinition_menu($name, $user, $menu = null) {
    $query = db_select('iw_bonus_requests', 'requests');
    $query->innerJoin('iw_bonus_participant', 'participant', 'requests.uid = participant.uid');
    $query->innerJoin('iw_bonus_managers', 'managers', 'participant.manager = managers.uid');
    $result = $query
        ->fields('requests', array('num', 'uid', 'summary', 'deal', 'connect'))
        ->condition('managers.uid', $user->uid)
        ->condition('requests.status', 1)
        ->execute();
    if ($result->rowCount() != 0 && $menu == 'head') {
        return 'head-count-bonus';
    } elseif ($result->rowCount() != 0) {
        $count = $result->rowCount();
        return t($name)." <span class='messages-count-bonus'>{$count}</span>";
    } else {
        return null;
    }

}

/**
 * @param array $params
 * @return bool
 */
function check_roles_users($params = array(), $all=null) {
    global $user;
    foreach($params as $param) {
        if ( array_key_exists($param, $user->roles)  || array_key_exists(8, $user->roles) || array_key_exists(3, $user->roles) || $all == 1) {
            return true;
        }
    }
}

/**
 * @param string $cond
 * @return string
 * custom filter callback
 */
function custom_filter_views_activity($cond = 'noo') {
    $nids = (arg(2) == 'export') ? array() : array(1);
    if ($cond != 'noo') {
        global $user;
        $q = db_select('node', 'n');
        $q->innerJoin('field_data_field_link_activity_client_lead', 'link_activity', 'link_activity.entity_id = n.nid');
        $q->innerJoin('field_data_field_date_activity_lead', 'date_activity', 'date_activity.entity_id = link_activity.field_link_activity_client_lead_target_id');
        $q->innerJoin('field_data_field_status_activity_lead', 'status_activity', 'status_activity.entity_id = date_activity.entity_id');
        //$q->condition('n.uid', $user->uid);
        if (!array_key_exists(3, $user->roles) && !array_key_exists(23, $user->roles)) {
            $q->condition('n.uid', arg(2));
        }
        $q->condition('status_activity.field_status_activity_lead_value', 'Закрыто', '<>');
        $q->fields('n', array('nid'));
        $q->fields('date_activity', array('field_date_activity_lead_value'));
        $res = $q->execute();
        $rows = array();
        foreach($res as $r) {
            if (array_key_exists($r->nid, $rows)) {
                if ($r->field_date_activity_lead_value < $rows[$r->nid]) {
                    $rows[$r->nid] = $r->field_date_activity_lead_value;
                }
            } else {
                $rows[$r->nid] = $r->field_date_activity_lead_value;
            }
        }
        foreach($rows as $nid => $dt) {
            if ($cond == 'new' && $dt > time()) {
                $nids[] = $nid;
            } elseif($cond == 'old' && $dt < time()) {
                $nids[] = $nid;
            }
        }

    } else {
        $nids = db_activity_noo_return();
    }

    return implode('+', $nids);
}

/**
 * @return array
 */
function db_activity_noo_return() {
    global $user;
    if (!array_key_exists(3, $user->roles) && !array_key_exists(23, $user->roles)) {
        $res = db_query("
        select nid from node where uid = :uid and nid not in (
          select entity_id from field_data_field_link_activity_client_lead where  field_link_activity_client_lead_target_id  in (
            select entity_id from  field_data_field_status_activity_lead where field_status_activity_lead_value != :status or field_status_activity_lead_value = NULL
            )
          ) and type = :type" , array(':uid' => arg(2), ':status' => 'Закрыто', ':type' => 'client_lead') );
    } else {
        $res = db_query("
        select nid from node where nid not in (
          select entity_id from field_data_field_link_activity_client_lead where  field_link_activity_client_lead_target_id  in (
            select entity_id from  field_data_field_status_activity_lead where field_status_activity_lead_value != :status or field_status_activity_lead_value = NULL
            )
          ) and type = :type" , array(':status' => 'Закрыто', ':type' => 'client_lead') );
    }

    $rows = array();
    foreach($res as $r) {
        $rows[] = $r->nid;
    }

    return $rows;
}

/**
 * @param $nid
 * @return mixed
 */
function date_view_custom_return($nid) {
    $q = db_select('field_data_field_date_activity_lead', 'dt_activity');
    $q->innerJoin('field_data_field_link_client_activity_lead', 'link','dt_activity.entity_id = link.entity_id');
    $q->innerJoin('field_data_field_status_activity_lead', 'status','status.entity_id = link.entity_id');
    $q->condition('link.field_link_client_activity_lead_target_id', $nid);
    $q->condition('status.field_status_activity_lead_value', 'Закрыто', '<>');
    $q->orderBy('dt_activity.field_date_activity_lead_value');
    $q->range(0, 1);
    $q->fields('dt_activity', array('field_date_activity_lead_value'));
    $row = $q->execute()->fetchField();
    return $row;
}

/**
 * @param $manager_name
 * @return array
 */
function custom_filter_views_manager($manager_name) {
    $uids = array();
    $q = db_select('field_data_field_partner_link_user', 'link');
    $q->innerJoin('field_data_field_fio', 'fio', 'fio.entity_id = link.entity_id');
    $q->condition('fio.field_fio_value', '%'.$manager_name.'%', 'LIKE');
    $q->fields('link', array('field_partner_link_user_target_id'));
    $res = $q->execute();
    while($row = $res->fetchField()) {
        $uids[] = $row;
    }
    return implode('+', $uids);
}