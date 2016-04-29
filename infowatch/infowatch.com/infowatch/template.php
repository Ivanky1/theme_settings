<?php
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

  // Toggle fixed or fluid width.
  if (theme_get_setting('infowatch_width') == 'fluid') {
    $vars['classes_array'][] = 'fluid-width';
  }
  // Add conditional CSS for IE6.
  drupal_add_css(path_to_theme() . '/fix-ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  
  //add js for expanded btn
  drupal_add_js ('sites/all/themes/infowatch/js/script-btn.js','file');
  global $user;
  if ($user->uid == 0) {
    drupal_add_js('misc/jquery.cookie.js', 'file');
  }

    if (strstr(drupal_get_path_alias($_GET['q']), 'analytics')) {
        drupal_add_js("https://www.google.com/jsapi", 'external');
        drupal_add_js("google.load('visualization', '1', {packages: ['corechart', 'bar']});",
            array('type' => 'inline', 'scope' => 'footer')
        );
        if (strstr(drupal_get_path_alias($_GET['q']), 'analytics/reports/5184')) {
            drupal_add_js(path_to_theme().'/js/google_diagramms/reports_all.js');
        } elseif (strstr(drupal_get_path_alias($_GET['q']), 'analytics/reports/5312')) {
            drupal_add_js(path_to_theme().'/js/google_diagramms/reports_all_deutch.js');
        }

    }
    drupal_add_js(path_to_theme().'/js/script.js');

    if ($_GET['q'] == 'node/5211' || $_GET['q'] == 'partners') {
        drupal_add_js(path_to_theme().'/js/maps_partners/lib/amcharts.js');
        drupal_add_js(path_to_theme().'/js/maps_partners/lib/ammap_amcharts_extension.js');
        drupal_add_js(path_to_theme().'/js/maps_partners/lib/worldLow.js');
        drupal_add_js(path_to_theme().'/js/maps_partners/maps_custom.js');
    }

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
	if (isset($data['components']['job_title'])){
		$post=$data['components']['job_title']['value'][0];
	}
	else {
		$post='';
	}	
	if (isset($data['components']['company'])){
		$company=$data['components']['company']['value'][0];
	}
	else {
		$company='';
	}	
	if (isset($data['components']['email'])){
		$email=$data['components']['email']['value'][0];
	}
	else {
		$email='';
	}	
	//$email=$data['components']['email']['value'][0];		
	$alias=drupal_lookup_path('alias',"node/".$nodeinfo->nid);
	$link_to_form=l($nodeinfo->title,$alias);
	$body='';
	
	if(isset($data['components']['phone']['value'][0])){
		$body.="<b>".$data['components']['phone']['component']['name'].": </b>".$data['components']['phone']['value'][0]."<br>";
	}
	
	if(isset($data['components']['country']['value'][0])){
		$body.="<b>".$data['components']['country']['component']['name'].": </b>".$data['components']['country']['value'][0]."<br>";
	}
		
	if(isset($data['components']['industry']['value'][0])){
		$ortasl= _webform_select_options_from_text($data['components']['industry']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['industry']['component']['name'].": </b>".$ortasl[$data['components']['industry']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['your_main_business']['value'][0])){
		$vopros_s= _webform_select_options_from_text($data['components']['your_main_business']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['your_main_business']['component']['name'].": </b>".$vopros_s[$data['components']['your_main_business']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['message']['value'][0])){
		$body.="<b>".$data['components']['message']['component']['name'].":</b> ".$data['components']['message']['value'][0]."<br>";
	}
	
	if(isset($data['components']['area_of_interest']['value'][0])){
		$vash_interes= _webform_select_options_from_text($data['components']['area_of_interest']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['area_of_interest']['component']['name'].":</b> ".$vash_interes[$data['components']['area_of_interest']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['interest']['value'][0])){
		$interest= _webform_select_options_from_text($data['components']['interest']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['interest']['component']['name'].":</b> ".$interest[$data['components']['interest']['value'][0]]."<br>";
	}
	
	if(isset($data['components']['product_of_interest']['value'][0])){
		$product= _webform_select_options_from_text($data['components']['product_of_interest']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['product_of_interest']['component']['name'].":</b> ".$product[$data['components']['product_of_interest']['value'][0]]."<br>";
	}   
	
	
	
	if(isset($data['components']['number_of']['value'][0])){
		$razmer_kompanii= _webform_select_options_from_text($data['components']['number_of']['component']['extra']['items'],$flat = FALSE, $filter = TRUE);
		$body.="<b>".$data['components']['number_of']['component']['name'].":</b> ".$razmer_kompanii[$data['components']['number_of']['value'][0]]."<br>";
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
	$node->field_fio['und'][0]['value']=$fio;
	$node->field_company['und'][0]['value']=$company;
	$node->field_jobtitle['und'][0]['value']=$post;
	$node->field_worksheet_news['und'][0]['value']=$news;
	$node->body[$nodeinfo->language][0]['value'] = $body;
	$node->body[$nodeinfo->language][0]['summary'] ='';
	$node->body[$nodeinfo->language][0]['format'] = 'full_html'; 
	
	node_save($node);
}

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

function views_custom_filters_callback($tid) {
    if (arg(0) == 'taxonomy' && arg(1) == 'term' && is_numeric(arg(2))) {

    }
}

