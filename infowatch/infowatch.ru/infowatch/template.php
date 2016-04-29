<?php
//print_r($_SESSION);
// $Id: template.php,v 1.45 2010/12/01 00:18:15 webchick Exp $

/**
 * Return a themed breadcrumb trail.
 *
 * @param $breadcrumb
 *   An array containing the breadcrumb links.
 * @return a string containing the breadcrumb output.
 */
function infowatch_breadcrumb($variables) {
  $breadcrumb = $variables['breadcrumb'];

  if (!empty($breadcrumb)) {
    // Provide a navigational heading to give context for breadcrumb links to
    // screen-reader users. Make the heading invisible with .element-invisible.
    $output = '<h2 class="element-invisible">' . t('You are here') . '</h2>';

    $output .= '<div class="breadcrumb">' . implode('  ', $breadcrumb) . '</div>';
    return $output;
  }
}

/**
 * @param $vars
 * @param $hook
 */
function infowatch_preprocess(&$variables, $hook) {
    if (arg(0) == 'node' && is_numeric(arg(1)) && !arg(2)) {
        $image_center = image_center_find_custom(arg(1));
        switch($hook){
            case 'html':
            case 'page':
                $variables['image_center'] =   ($image_center) ? $image_center :'';
                break;
        }
    }
}

/**
 * Override or insert variables into the maintenance page template.
 */
function infowatch_preprocess_maintenance_page(&$vars) {
  // While markup for normal pages is split into page.tpl.php and html.tpl.php,
  // the markup for the maintenance page is all in the single
  // maintenance-page.tpl.php template. So, to have what's done in
  // garland_preprocess_html() also happen on the maintenance page, it has to be
  // called here.
  infowatch_preprocess_html($vars);
}

/**
 * Override or insert variables into the html template.
 */
function infowatch_preprocess_html(&$vars) {
   //views_baners_random_sort();
  if ($_GET['q'] == 'node') {
    drupal_goto('<front>');
  }
  // Toggle fixed or fluid width.
  if (theme_get_setting('infowatch_width') == 'fluid') {
    $vars['classes_array'][] = 'fluid-width';
  }
  // Add conditional CSS for IE6.
  drupal_add_css(path_to_theme() . '/fix-ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));

  if (drupal_is_front_page()) {
      drupal_add_css(path_to_theme() . '/js/bond_slider/1.7/main_slider.css');
  }

  drupal_add_js(path_to_theme().'/js/script/ajax_turbo.js', array('scope' => 'footer'));

  drupal_add_js('https://c.la1c1.salesforceliveagent.com/content/g/js/32.0/deployment.js', 'external');
  //add js for expanded btn
  drupal_add_js (path_to_theme() .'/js/analytics/analytics.js', array('type' => 'file', 'scope' => 'footer'));
  drupal_add_js (path_to_theme().'/js/script-btn.js','file');
  drupal_add_js(path_to_theme().'/js/chat_script.js' );
  if (!strstr($_GET['q'], 'admin')) {
     // drupal_add_js('sites/all/modules/jquery_update/replace/ui/ui/minified/jquery-ui.min.js', 'file');
      global $user;
      if ($user->uid == 0) {
          drupal_add_js('misc/jquery.cookie.js', 'file');
      }
  }

    if (strstr(drupal_get_path_alias($_GET['q']), 'analytics')) {
        drupal_add_js("https://www.google.com/jsapi", 'external');
        drupal_add_js("google.load('visualization', '1', {packages: ['corechart', 'bar']});",
            array('type' => 'inline', 'scope' => 'footer')
        );
        drupal_add_js(path_to_theme().'/js/google_diagramms/circle.js');
        drupal_add_js(path_to_theme().'/js/google_diagramms/canal.js');
        drupal_add_js(path_to_theme().'/js/google_diagramms/colums.js');
        drupal_add_js(path_to_theme().'/js/google_diagramms/maps.js');
        drupal_add_js(path_to_theme().'/js/google_diagramms/year_diagr.js');
    }

    if (strstr($_GET['q'],'webs/partner/listener')) {
        drupal_add_js(path_to_theme().'/js/webinar/webinar_close.js');
    }
    utm_metka_save_session();

 // drupal_add_js('sites/all/modules/jquery_update/replace/ui/ui/minified/jquery-ui.min.js', 'file');
 // drupal_add_js(path_to_theme().'/js/chat_script.js' );

}
/**
 * Override or insert variables into the html template.
 */
function infowatch_process_html(&$vars) {
  // Hook into color.module
  if (module_exists('color')) {
    _color_html_alter($vars);
  }

}

/**
 * Override or insert variables into the page template.
 */
function infowatch_preprocess_page(&$vars) {
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
    if (variable_get('site_slogan', '')) {
 $slogan_text = variable_get('site_slogan', '');
 }
 
 if (variable_get('site_name', '')) {
 $site_name_text = variable_get('site_name', '');
 }
 
 
 $vars['site_name_and_slogan'] = $site_name_text . ' - ' . $slogan_text;
}

/**
 * Override or insert variables into the node template.
 */
function infowatch_preprocess_node(&$vars) {
  $vars['submitted'] = $vars['date'];
}

/**
 * Override or insert variables into the comment template.
 */
function infowatch_preprocess_comment(&$vars) {
  $vars['submitted'] = $vars['created'];
}

/**
 * Override or insert variables into the block template.
 */
function infowatch_preprocess_block(&$vars) {
  $vars['title_attributes_array']['class'][] = 'title';
  $vars['classes_array'][] = 'clearfix';
}

/**
 * Override or insert variables into the page template.
 */
function infowatch_process_page(&$variables,$hook) {
if (module_exists('color')) {
    _color_page_alter($vars);
  }
}
/**
 * Override or insert variables into the region template.
 */
function infowatch_preprocess_region(&$vars) {
  if ($vars['region'] == 'header') {
    $vars['classes_array'][] = 'clearfix';
  }
}

function save_worksheet($data,$nodeinfo){
	if (isset($data['components']['fio'])){
		$fio=$data['components']['fio']['value'][0];
	}
	else {
		$fio='';
	}
	if (isset($data['components']['podpiska'])){
		$news=$data['components']['podpiska']['value'][0];
	}
	else {
		$news='';
	}
	
	$email=$data['components']['email']['value'][0];
	$post=$data['components']['dolzhnost']['value'][0];
	$company=$data['components']['kompaniya']['value'][0];	
	$alias=drupal_lookup_path('alias',"node/".$nodeinfo->nid);
	$link_to_form=l($nodeinfo->title,$alias);
	$body='';
	
	if(isset($data['components']['last_name']['value'][0])){
		$fio=$data['components']['last_name']['value'][0]." ".$data['components']['first_name']['value'][0];
	}
	if(isset($data['components']['telefon']['value'][0])){
		$body.="<b>".$data['components']['telefon']['component']['name'].": </b>".$data['components']['telefon']['value'][0]."<br>";
	}
	
	if(isset($data['components']['strana']['value'][0])){
		$body.="<b>".$data['components']['strana']['component']['name'].": </b>".$data['components']['strana']['value'][0]."<br>";
	}
	
	if(isset($data['components']['gorod']['value'][0])){
		$body.="<b>".$data['components']['gorod']['component']['name'].": </b>".$data['components']['gorod']['value'][0]."<br>";
	}
	
	if(isset($data['components']['otrasl']['value'][0])){
		$ortasl= _webform_select_options_from_text($data['components']['otrasl']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['otrasl']['component']['name'].": </b>".$ortasl[$data['components']['otrasl']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['s_chem_svyazan_vash_vopros']['value'][0])){
		$vopros_s= _webform_select_options_from_text($data['components']['s_chem_svyazan_vash_vopros']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['s_chem_svyazan_vash_vopros']['component']['name'].": </b>".$vopros_s[$data['components']['s_chem_svyazan_vash_vopros']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['vopros']['value'][0])){
		$body.="<b>".$data['components']['vopros']['component']['name'].":</b> ".$data['components']['vopros']['value'][0]."<br>";
	}
	
	if(isset($data['components']['vash_interes']['value'][0])){
		$vash_interes= _webform_select_options_from_text($data['components']['vash_interes']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['vash_interes']['component']['name'].":</b> ".$vash_interes[$data['components']['vash_interes']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['interest']['value'][0])){
		$interest= _webform_select_options_from_text($data['components']['interest']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['interest']['component']['name'].":</b> ".$interest[$data['components']['interest']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['kakoy_iz_produktov_infowatch_vy_ispolzuete']['value'][0])){
		$product= _webform_select_options_from_text($data['components']['kakoy_iz_produktov_infowatch_vy_ispolzuete']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['kakoy_iz_produktov_infowatch_vy_ispolzuete']['component']['name'].":</b> ".$product[$data['components']['kakoy_iz_produktov_infowatch_vy_ispolzuete']['value'][0]]."<br>";
	}
   
    if(isset($data['components']['opisanie_problemy']['value'][0])){
		$body.="<b>".$data['components']['opisanie_problemy']['component']['name'].": </b>".$data['components']['opisanie_problemy']['value'][0]."<br>";
	}
	
	if(isset($data['components']['kolichestvo_kopyuterov']['value'][0])){
		$body.="<b>".$data['components']['kolichestvo_kopyuterov']['component']['name'].": </b>".$data['components']['kolichestvo_kopyuterov']['value'][0]."<br>";
	}
	
	if(isset($data['components']['neobhodimye_moduli']['value'][0])){
		$count=count($data['components']['neobhodimye_moduli']['value']);
		$body.="<b>".$data['components']['neobhodimye_moduli']['component']['name'].":</b> ";
		for($i=0;$i<$count;$i++){
			$neobhodimye_moduli= _webform_select_options_from_text($data['components']['neobhodimye_moduli']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
			$body.=$neobhodimye_moduli[$data['components']['neobhodimye_moduli']['value'][$i]]."<br>";
		}
	}
	
	if(isset($data['components']['svyaz']['value'][0])){
		$svyaz= _webform_select_options_from_text($data['components']['svyaz']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['svyaz']['component']['name'].": </b>".$svyaz[$data['components']['svyaz']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['demonstraciya']['value'][0])){
		$demonstraciya= _webform_select_options_from_text($data['components']['demonstraciya']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['demonstraciya']['component']['name'].": </b>".$demonstraciya[$data['components']['demonstraciya']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['produkt']['value'][0])){
		$produkt= _webform_select_options_from_text($data['components']['produkt']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['produkt']['component']['name'].": </b>".$produkt[$data['components']['produkt']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['tema_voprosa']['value'][0])){
		$tema_voprosa= _webform_select_options_from_text($data['components']['tema_voprosa']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['tema_voprosa']['component']['name'].":</b> ".$tema_voprosa[$data['components']['tema_voprosa']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['onlayn_ili_v_ofise']['value'][0])){
		$onlayn_ili_v_ofise= _webform_select_options_from_text($data['components']['onlayn_ili_v_ofise']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['onlayn_ili_v_ofise']['component']['name'].": </b>".$onlayn_ili_v_ofise[$data['components']['onlayn_ili_v_ofise']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['kommentariy']['value'][0])){
		$body.="<b>".$data['components']['kommentariy']['component']['name'].": </b>".$data['components']['kommentariy']['value'][0]."<br>";
	}

	if(isset($data['components']['otzyv']['value'][0])){
		$body.="<b>".$data['components']['otzyv']['component']['name'].":</b> ".$data['components']['otzyv']['value'][0]."<br>";
	}
	
	if(isset($data['components']['kakoy_vebinar_vy_hotite_posetit']['value'])){
		$count=count($data['components']['kakoy_vebinar_vy_hotite_posetit']['value']);
		$body.="<b>".$data['components']['kakoy_vebinar_vy_hotite_posetit']['component']['name'].":</b> ";
		for($i=0;$i<$count;$i++){
			$kakoy_vebinar_vy_hotite_posetit= _webform_select_options_from_text($data['components']['kakoy_vebinar_vy_hotite_posetit']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
			$body.=$kakoy_vebinar_vy_hotite_posetit[$data['components']['kakoy_vebinar_vy_hotite_posetit']['value'][$i]]."<br>";
		}
	}
	
	if(isset($data['components']['ukazhite_kolichestvo_licenziy_kotoroe_vam_neobhodimo']['value'][0])){
		$body.="<b>".$data['components']['ukazhite_kolichestvo_licenziy_kotoroe_vam_neobhodimo']['component']['name'].": </b>".$data['components']['ukazhite_kolichestvo_licenziy_kotoroe_vam_neobhodimo']['value'][0]."<br>";
	}
	
	if(isset($data['components']['razmer_kompanii']['value'][0])){
		$razmer_kompanii= _webform_select_options_from_text($data['components']['razmer_kompanii']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['razmer_kompanii']['component']['name'].":</b> ".$razmer_kompanii[$data['components']['razmer_kompanii']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['products']['value'])){
		$count=count($data['components']['products']['value']);
		$body.="<b>".$data['components']['products']['component']['name'].":</b> ";
		for($i=0;$i<$count;$i++){
			$products= _webform_select_options_from_text($data['components']['products']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
			$body.=$products[$data['components']['products']['value'][$i]]."<br>";
		}
	}
	
	
	if(isset($data['components']['solutions']['value'])){
		$count=count($data['components']['solutions']['value']);
		$body.="<b>".$data['components']['solutions']['component']['name'].":</b> ";
		for($i=0;$i<$count;$i++){
			$solutions= _webform_select_options_from_text($data['components']['solutions']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
			$body.=$solutions[$data['components']['solutions']['value'][$i]]."<br>";
		}
	}
	
	if(isset($data['components']['kolichestvo_sotrudnikov']['value'][0])){
		$kolichestvo_sotrudnikov= _webform_select_options_from_text($data['components']['kolichestvo_sotrudnikov']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['kolichestvo_sotrudnikov']['component']['name'].": </b>".$kolichestvo_sotrudnikov[$data['components']['kolichestvo_sotrudnikov']['value'][0]]."<br>";
	}
	
	$node = new stdClass(); 
	$node->type = "worksheet"; 
	$node->title = t('Worksheet')." ".$fio." ".t('for form')." ".$nodeinfo->title;
	$node->language = $nodeinfo->language;
	$node->uid = $nodeinfo->uid; 	
	$node->path = array('alias' => 'node/'.$nodeinfo->nid.'/'.$data['sid'].'/estimate'); 
	
	node_object_prepare($node); 	
	$node->field_worksheet_form['und'][0]['value']=$link_to_form;
	$node->field_worksheet_form['und'][0]['format'] = 'filtered_html'; 
	$node->field_worksheet_email['und'][0]['value']=$email;
	$node->field_fio[$nodeinfo->language][0]['value']=$fio;
	$node->field_copmany[$nodeinfo->language][0]['value']=$company;
	$node->field_jobtitle[$nodeinfo->language][0]['value']=$post;
	$node->field_worksheet_news['und'][0]['value']=$news;
	$node->body[$nodeinfo->language][0]['value'] = $body;
	$node->body[$nodeinfo->language][0]['summary'] ='';
	$node->body[$nodeinfo->language][0]['format'] = 'full_html'; 
	
	node_save($node);
}

/**
 * submit registration on site
 * @param $form
 * @param $form_state
 * @param $form_id
 */
function infowatch_form_alter(&$form, &$form_state, $form_id) {
    if ('user_register_form' == $form_id) {
        $form['mailchimp_lists']['mailchimp_obchaya_rassylka']['subscribe']['#default_value'] = 1;
        $form['field_personal_checked']['und']['#default_value'] = '';
    }
    if ('user_pass_reset' == $form_id) {
        $form['#submit'][] = 'user_register_form_submit';

        $newUser = user_load($form_state['build_info']['args'][0]);
        if (!$newUser->field_status_email) {
            require 'mail_template.php';
            drupal_mail('system', 'mail', $newUser->mail, language_default(), array(
                'context' => array(
                    'subject' => 'Спасибо за интерес к продуктам и решениям InfoWatch!',
                    'message' => $templateHtmlMail,
                ),
            ));
        }
        $newUser->field_status_email['und']['0']['value'] = 'Отправлено';
        user_save($newUser);
    }
}

/**
 * @param $data
 * @param $router_item
 * @param $root_path
 */
function infowatch_menu_local_tasks_alter(&$data, $router_item, $root_path) {
    if (isset($router_item['page_arguments'][0]) && is_object($router_item['page_arguments'][0]) && !strstr($router_item['path'], 'user/%') )  {
        if (isset($router_item['page_arguments'][0]->type) && $router_item['page_arguments'][0]->type == 'private_material' ) {
            $data['tabs'][0]['output'][] = array(
                '#theme' => 'menu_local_task',
                '#link' => array(
                    'title' => t('Статистика по этому материалу'),
                    'href' => 'statistics/upload/count/'.$router_item['page_arguments'][0]->nid,
                    'localized_options' => array(
                         'attributes' => array(
                             'title' => t('Статистика по этому материалу'),
                         ),
                    ),
                ),
            );
            $data['tabs'][0]['output'][] = array(
                '#theme' => 'menu_local_task',
                '#link' => array(
                    'title' => t('Статистика по всем закрытым материалам'),
                    'href' => 'statistics/upload/count',
                    'localized_options' => array(
                        'attributes' => array(
                            'title' => t('Статистика по всем закрытым материалам'),
                        ),
                    ),
                ),
            );
        }
    }
    if ($root_path == 'statistics/upload/count/%' || $root_path == 'statistics/upload/profile/%') {
        $data['actions']['output'][] = array(
            '#theme' => 'menu_local_task',
            '#link' => array(
                'title' => t('Количество скачиваний'),
                'href' => 'statistics/upload/count',
                'localized_options' => array(
                    'attributes' => array(
                        'title' => t('Количество скачиваний'),
                    ),
                ),
            ),
        );
        $data['actions']['output'][] = array(
            '#theme' => 'menu_local_task',
            '#link' => array(
                'title' => t('Список анкет'),
                'href' => 'statistics/upload/profiles',
                'localized_options' => array(
                    'attributes' => array(
                        'title' => t('Список анкет'),
                    ),
                ),
            ),
        );
    }

}

/**
 * @param $vars
 */
function infowatch_preprocess_views_exposed_form(&$vars) {
    $status = isset($_GET['status']) ?  "status={$_GET['status']}&" : "";
    $company= isset($_GET['company']) ?  "company={$_GET['company']}&" : "";
    $city= isset($_GET['field_city_roadshow_value']) ?  "field_city_roadshow_value={$_GET['field_city_roadshow_value']}&" : "";
    "<a href='/roadshow/export".$status.$company.$city."'>Скачать</a>";
}

/**
 * @param $nodeID
 * @return mixed
 * sort events and webinars views
 */
function get_events_old($nodeID) {
    $res = db_query("(SELECT entity_id, UNIX_TIMESTAMP(field_eventdate_value) as time FROM `field_data_field_eventdate`
                         where entity_id in (select nid from node where promote = 1) and UNIX_TIMESTAMP(field_eventdate_value) < :time
                         order by field_eventdate_value desc limit 5
                        ) union
                     (SELECT entity_id, field_date_webinar_value as time FROM `field_data_field_date_webinar`
                    where entity_id in (select nid from node where promote = 1) and field_date_webinar_value < :time
                    order by field_date_webinar_value desc limit 5)
                    ", array(':time' => time()) );
    $full = array();
    foreach($res as $r) {
        $full[$r->time] = $r->entity_id;
    }
    krsort($full);
    $nids = array();
    $i = 0;
    $weight = 100;
    foreach ($full as $v) {
        $nids[$weight] = $v;
        $weight --;
        $i++;
        if ($i > 4) break;
    }
    if ($w = array_search($nodeID, $nids)) {
        return $w;
    }
}

/**
 * redirect utm metki
 */
function utm_metka_save_session() {
    if (isset($_GET['utm_source']) && isset($_GET['utm_medium']) && isset($_GET['utm_campaign'])  ) {
        $_SESSION['utm']['utm_source'] = htmlspecialchars($_GET['utm_source']);
        $_SESSION['utm']['utm_medium'] = htmlspecialchars($_GET['utm_medium']);
        $_SESSION['utm']['utm_campaign'] = htmlspecialchars($_GET['utm_campaign']);
        $_SESSION['utm']['utm_content'] = htmlspecialchars($_GET['utm_content']);
        //drupal_goto($_GET['q']);
    }
}

/**
 * @param $nid
 * @return mixed
 * views slider sort
 */
function views_baners_random_sort($nid) {
    $q = db_select('node','n');
    $q->innerJoin('field_data_field_add_front_baner', 'front', 'n.nid = front.entity_id');
    $q->condition('front.field_add_front_baner_value','1');
    $q->condition('n.type','baner_crutilka');
    $q->condition('n.status', 1);
    $q->fields('n', array('nid','promote'));
    $q->orderBy('n.promote','DESC');
    $res = $q->execute();
    $nids = array();
    $weight = 100;
    foreach($res as $r) {
        if ($r->promote == 1) {
            $nids[$weight] = $r->nid;
            $weight++;
        } else {
            $index = random_index($nids);
            $nids[$index] = $r->nid;
        }
    }
    if ($w = array_search($nid, $nids)) {
        return $w;
    }
}

/***
 * @param $nids
 * @return int
 */
function random_index($nids) {
    $index = rand(1,99);
    if (array_key_exists($index, $nids)) {
        random_index($nids);
    } else {
        return $index;
    }
}

/**
 * @param $nid
 * @return mixed
 */
function image_center_find_custom($nid) {
    $types = ['news'];
    $nid = (int) abs($nid);
    $q = db_select('node', 'n');
    $q->innerJoin('field_data_field_image', 'img', 'img.entity_id = n.nid');
    $q->innerJoin('file_managed', 'file', 'img.field_image_fid = file.fid');
    $q->condition('n.type', $types, 'IN')
        ->condition('n.nid', $nid)
        ->fields('file', ['uri']);
    $res = $q->execute()->fetchField();
    return $res ?file_create_url($res) :'';
}

/**
 * @return bool
 */
function geo_location_city() {
    $inc = libraries_get_path('geoip');
    require_once $inc."/SxGeo.php";
    $SxGeo = new SxGeo($inc.'/SxGeoCity.dat');
    $ip = $_SERVER['REMOTE_ADDR'];
    $cityFull = $SxGeo->getCityFull($ip);
    $cityFull['region']['name_ru'];
    $citiesRule = array('Тверь', 'Краснодар', 'Ростов-на-Дону', 'Архангельск', 'Мурманск');
    if (in_array($cityFull['region']['name_ru'], $citiesRule)) {
        return true;
    } else {
        return false;
    }
}