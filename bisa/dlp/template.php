<?php

/**
 * Override of theme_breadcrumb().
 */
function dlp_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];
  if (!empty($breadcrumb)) {
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';
    $output .= '<div class="breadcrumb">' . implode(' › ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * Override or insert variables into the maintenance page template.
 */
function dlp_preprocess_maintenance_page(&$vars) {
    dlp_preprocess_html($vars);
}

/**
 * Override or insert variables into the html template.
 */
function dlp_preprocess_html(&$vars) {

  if (drupal_get_path_alias($_GET['q']) == 'bis-summit/program') {
    drupal_goto('bis-summit');
  }

 /* if(variable_get('mobile_auth') && preg_match('@(iPad|iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)@', $_SERVER['HTTP_USER_AGENT'])) {
    $path = variable_get('mobile_auth');
    variable_set('mobile_auth', '');
    drupal_goto($path);
  } */
  if ($_GET['q'] == 'node/49624') {
   _drupal_session_delete_cookie('version');
   // unset($_COOKIE['version']);
    $_SESSION['exists'] = 'true';
    drupal_goto('http://m.bis-expert.ru/');
  }

  if (isset($_SESSION['exists']) && $_SESSION['exists'] == 'true') {
      _drupal_session_delete_cookie('version');
    //  unset($_COOKIE['version']);
  }
    mbisa_redirect();
 // if ($vars['is_front'] == 1) {
   /* if (preg_match('@(iPad|iPod|iPhone|Android|BlackBerry|SymbianOS|SCH-M\d+|Opera Mini|Windows CE|Nokia|SonyEricsson|webOS|PalmOS)@', $_SERVER['HTTP_USER_AGENT'])
    && !isset($_COOKIE['version'])
    )

    {
          drupal_goto('node/49624');
    }
  } else {
      cache_clear_all(url('', array('absolute' => TRUE)), 'cache_page');
      cache_clear_all(NULL, 'cache_block');
      // cache disabled css front
      global $conf;
      $conf['preprocess_css'] = FALSE;
  } */

  drupal_add_js(path_to_theme().'/js/script/ajax_turbo.js', ['scope' => 'footer']);
    // Toggle fixed or fluid width.
  if (theme_get_setting('dlp_width') == 'fluid') {
    $vars['classes_array'][] = 'fluid-width';
  }
  drupal_add_css(drupal_get_path('theme', 'dlp') . '/content.css', array('group' => CSS_THEME, 'type' => 'file'));
  drupal_add_css(drupal_get_path('theme', 'dlp') . '/temp.css', array('group' => CSS_THEME, 'type' => 'file'));
  // Add conditional CSS for IE6.
  drupal_add_css(path_to_theme() . '/fix-ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));

  drupal_add_js(path_to_theme().'/js/colorbox_img.js', array('scope' => 'footer'));
/*  if ($vars['is_front'] == 1 || strstr(drupal_get_path_alias($_GET['q']), 'bis-summit') ) {
      cache_clear_all(url('', array('absolute' => TRUE)), 'cache_page');
      cache_clear_all(NULL, 'cache_block');
    //  drupal_add_js(path_to_theme().'/js/clock_bissumit.js');
  } */

  if ($_GET['q'] == 'node/7044') {
    drupal_add_js(path_to_theme().'/js/webinar_soc_network.js');

  }

  if ($_GET['q'] == 'news/archive33') {
    drupal_add_js(path_to_theme().'/js/script/archive_digest.js');
  }

}


 /**
 * Override or insert variables into the html template.
 */
function dlp_process_html(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_html_alter($vars);
  }

}

/**
 * Override or insert variables into the page template.
 */
function dlp_preprocess_page(&$vars) {
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

  $status = drupal_get_http_header("status");


}

/**
 * @param $vars
 * template_preprocess_views_view_unformatted
 */

function dlp_preprocess_views_view_unformatted(&$vars) {
    if ($vars['view']->name == 'events' && $vars['view']->current_display == 'page') {
        foreach ($vars['rows'] as $key => $row) {
            $classes = array();
            if (!empty($vars['classes_array'][$key])) {
                $classes = explode(' ', ($vars['classes_array'][$key]));
            }
            if (!empty($vars['view']->result[$key]->field_field_type_event)) {
                $current = current($vars['view']->result[$key]->field_field_type_event);
                $class_add = '';
                switch(mb_strtolower($current['rendered']['#markup'])) {
                    case 'конференция': $class_add = "views-row-conference"; break;
                    case 'семинар': $class_add = "views-row-seminar"; break;
                    case 'вебинар': $class_add = "views-row-webinar"; break;
                    case 'круглый стол': $class_add = "views-row-circle-table"; break;
                    case 'форум': $class_add = "views-row-forum"; break;
                }
                $classes[] = $class_add;
            }

            if (!empty($classes)) {
                $vars['classes_array'][$key] = implode(' ', $classes);
            }
        }
    }
}

/**
 * Override or insert variables into the node template.
 */
function dlp_preprocess_node(&$vars) {
  $vars['submitted'] = $vars['date'];
}

/**
 * Override or insert variables into the comment template.
 */
function dlp_preprocess_comment(&$vars) {
  $vars['submitted'] = $vars['created'] . ' — ' . $vars['author'];
}

/**
 * Override or insert variables into the block template.
 */
function dlp_preprocess_block(&$vars) {
  $vars['title_attributes_array']['class'][] = 'title';
  $vars['classes_array'][] = 'clearfix';

}

/**
 * Override or insert variables into the page template.
 */
function dlp_process_page(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_page_alter($vars);
  }
}

/**
 * Override or insert variables into the region template.
 */
function dlp_preprocess_region(&$vars) {
  if ($vars['region'] == 'header') {
    $vars['classes_array'][] = 'clearfix';
  }
}

function dlp_form_simplenews_block_form_12_alter(&$form, &$form_state, $form_id) {
    $form['#submit'][] = 'simplenews_mailchimp_submit';
}

/**
 * @param $form
 * @param $form_state
 */
function simplenews_mailchimp_submit(&$form, &$form_state) {
    $path = $_SERVER['DOCUMENT_ROOT'].'/sites/all/libraries/mailchimp/MCAPI.class.php';
    require_once $path;
    $apikey = '9f105d46549f71a4d0780c61da42d7d2-us5';
    $listId = 'ee9a3727b2';
    $api = new MCAPI($apikey);
    $merge_vars = array();
    $api->listSubscribe( $listId, $form_state['values']['mail'], $merge_vars, 'html', false );

}

/**
 * @param $form
 * @param $form_state
 * @param $form_id
 */
function dlp_form_webform_client_form_45458_alter(&$form, &$form_state, $form_id) {
    $form['#submit'][] = 'webform_45458_submit';
}

/**
 * @param $form
 * @param $form_state
 */
function webform_45458_submit(&$form, &$form_state) {
    $obj = new stdClass();
    $arr = array();
    if ($form_state['input']['submitted']['group_contacts_zap']['myform'] == 2) {
        $obj->surname = $form_state['input']['submitted']['group_contacts_zap']['surename2'];
        $obj->firstname = $form_state['input']['submitted']['group_contacts_zap']['name2'];
        $obj->secondname = $form_state['input']['submitted']['group_contacts_zap']['secondname'];

        $obj->surname2 = $form_state['input']['submitted']['anketa_kandidata']['surename'];
        $obj->firstname2 = $form_state['input']['submitted']['anketa_kandidata']['name'];
        $obj->secondname2 = $form_state['input']['submitted']['anketa_kandidata']['secondname2'];
        $obj->kategory = $form_state['input']['submitted']['kategory'];
        $arr['full'] = $obj;
        variable_set('candidate', json_encode($arr));
        $email = $form_state['input']['submitted']['group_contacts_zap']['e_mail'];
       /* drupal_mail('system', 'mail', $email, language_default(), array(
            'context' => array(
                'subject' => 'Данные на вашего кандидата в рейтинге Security CIO, Security CISO получены',
                'message' => "Уважаемый {$obj->surname} {$obj->firstname} {$obj->secondname}! Вы заполнили форму на кандидата {$obj->surname2} {$obj->firstname2} {$obj->secondname2} для участия в рейтинге {$obj->kategory}, о чём он получит отдельное уведомление.
Ваша заявка принята к рассмотрению. 5 декабря 2014 года на сайте www.bis-expert.ru появится полный список кандидатов на голосование, о чём вы и предложенный вами кандидат получат отдельное уведомление в рассылке.
",
            )
        )); */
    } else {
        $obj->surname = $form_state['input']['submitted']['anketa_kandidata']['surename'];
        $obj->firstname = $form_state['input']['submitted']['anketa_kandidata']['name'];
        $obj->secondname = $form_state['input']['submitted']['anketa_kandidata']['secondname2'];
        $obj->kategory = $form_state['input']['submitted']['kategory'];
        $arr['mini'] = $obj;
        variable_set('candidate', json_encode($arr));
    }
    if ($form_state['input']['submitted']['podpiska']['mailchimp_signup'] == 1) {
        $arr['values']['mail'] =  $form_state['input']['submitted']['anketa_kandidata']['e_mail'];
        $a2 = array();
        simplenews_mailchimp_submit($a2, $arr);
    }
}

/**
 *  Redirect mobile version
 */
function mbisa_redirect() {
    $inc = libraries_get_path('mobile_detect');
    include $inc.'/Mobile_Detect.php';
    $detect = new Mobile_Detect(); //or $detect->isTablet()
    if ($detect->isMobile() && !$detect->isTablet() && !isset($_COOKIE['version']) && !isset($_GET['version']) ){
        if (drupal_is_front_page()) {
            drupal_goto('http://m.bis-expert.ru/');
        } elseif (is_numeric(arg(1)) && arg(0) == 'node' ) {
            $url = mbisa_isset_materials(arg(1));
            if ($url)
               drupal_goto('http://m.bis-expert.ru/'.$url);
        } elseif (arg(0) == 'blog' && !arg(1)) {
            drupal_goto('http://m.bis-expert.ru/blog');
        } elseif (arg(0) == 'articles' && !arg(1)) {
            drupal_goto('http://m.bis-expert.ru/articles');
        } elseif (arg(0) == 'news' && !arg(1)) {
            drupal_goto('http://m.bis-expert.ru/news');
        } else {
            drupal_goto('http://m.bis-expert.ru/');
        }
    } elseif(!isset($_COOKIE['version']) && isset($_GET['version']) ) {
        setcookie('version','full');
        unset($_SESSION['exists']);
        if (is_numeric($_GET['version'])) {
            $q = 'node/'.abs($_GET['version']);
            drupal_goto(drupal_get_path_alias($q));
        } else {
            drupal_goto('/');
        }
    }
}

/**
 * @return array
 */
function mbisa_isset_materials($nid) {
    $q = db_select('mobile_dlp','mobile');
    $q->fields('mobile', array('nid_mob','alias_mob'));
    $q->condition('mobile.pid_mob', $nid);
    $res = $q->execute()->fetchAssoc();
    return ($res['alias_mob']) ?$res['alias_mob'] :'node/'.$res['nid_mob'];
}

