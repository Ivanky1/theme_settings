<?php
/**
 * @param $page
 * theme_page_alter
 */
function bootstrap_infowatch_page_alter($page) {
      if (arg(0) == 'node' && is_numeric(arg(1)) && !arg(2) && $imgCenter = image_center_find_custom(arg(1)) ) {
        $meta_img = array(
            '#type' => 'html_tag',
            '#tag' => 'meta',
            '#attributes' => array(
                'property' => 'og:image',
                'content' => $imgCenter
            )
        );
        drupal_add_html_head( $meta_img, 'meta_img' );
    }
}

/**
 * @param $vars
 * @param $hook
 */
function bootstrap_infowatch_preprocess(&$variables, $hook) {
    if (arg(0) == 'node' && is_numeric(arg(1)) && !arg(2)) {
        $top_annotation = (is_array(annotation_find_custom(arg(1)))) ?annotation_find_custom(arg(1))['html'] : annotation_find_custom(arg(1));
        switch($hook){
            case 'html':
            case 'page':
                if ($top_annotation) {
                    $variables['top_annotation'] = $top_annotation;
                }
                break;
        }
    }
}

/**
 * @param $vars
 */
function bootstrap_infowatch_preprocess_page(&$vars) {
    if (isset($vars['node']->type) && $vars['node']->type == 'webinar') {
        drupal_set_title('');
    }
}

/**
 * @param $vars
 */
function bootstrap_infowatch_preprocess_html(&$vars) {

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
        drupal_add_js (path_to_theme() .'/js/analytics/analytics.js', array('type' => 'file', 'scope' => 'footer'));
    }


 //   drupal_add_js(path_to_theme().'/js/libraries/bootstrap-hover-dropdown/bootstrap-hover-dropdown.min.js');
  //  drupal_add_js(path_to_theme().'/js/libraries/touch-events/jquery.mobile-events.min.js');
    //drupal_add_js("jQuery('.dropdown-toggle').dropdownHover();");

    if (drupal_is_front_page()) {
        drupal_add_library('system', 'ui');

    }
    drupal_add_js(path_to_theme().'/js/script/head_menu.js');
    drupal_add_js(path_to_theme().'/js/script/colorbox_partner.js');
    drupal_add_js(path_to_theme().'/js/script/ajax_turbo.js', ['scope' => 'footer']);
    drupal_add_js(path_to_theme().'/js/globalcontent.js');

    switch(drupal_get_path_alias($_GET['q'])) {
        case 'partners' : drupal_add_js(path_to_theme().'/js/script/partners_full.js'); break;
        case 'webinar' : drupal_add_js(path_to_theme().'/js/script/webinar_search.js'); break;
    }


}

/**
 * @param $variables
 */
function bootstrap_infowatch_preprocess_block(&$variables) {
   // $block = $variables['block'];
   // if ($block->module == 'views' && $block->delta == 'webinars-block_2') {
    //    $variables['title_attributes_array']['class'][] = 'container';
   // }
}

/**
 * @param $nodeID
 * @return mixed
 * sort events and webinars views
 */

function get_events_old($nodeID) {
    $res = db_query("(SELECT entity_id, UNIX_TIMESTAMP(field_eventdate_value) as time FROM `field_data_field_eventdate`
                     where entity_id in (select nid from node where promote = 1) and UNIX_TIMESTAMP(field_eventdate_value) > :time
                     order by field_eventdate_value desc limit 5
                    ) union
                 (SELECT nid, created as time FROM `node`
                where promote = 1 and created < :time and type = 'news'
                order by created desc limit 5)
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
 * @param $nid
 * @return mixed
 * views slider sort
 */

function views_baners_random_sorts($nid) {
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


function bootstrap_infowatch_preprocess_menu_link(&$vars) {
    if ($vars['element']['#original_link']['menu_name'] == 'main-menu') {
        switch($vars['element']['#title']) {
            case 'Продукты и решения' :
                $block = module_invoke('block', 'block_view', 27);
                $vars['element']['#below']['content_for_mm']['#markup'] = render($block['content']); break;
            case 'Как приобрести?' :
                $block = module_invoke('block', 'block_view', 31);
                $vars['element']['#below']['content_for_mm']['#markup'] = render($block['content']); break;
            case 'Компания' :
                $block = module_invoke('block', 'block_view', 35);
                $vars['element']['#below']['content_for_mm']['#markup'] = render($block['content']); break;
            case 'Пресс-центр' :
                $block = module_invoke('block', 'block_view', 34);
                $vars['element']['#below']['content_for_mm']['#markup'] = render($block['content']); break;
            case 'Поддержка' :
                $block = module_invoke('block', 'block_view', 78);
                $vars['element']['#below']['content_for_mm']['#markup'] = render($block['content']); break;
            case 'Академия' :
                $block = module_invoke('block', 'block_view', 32);
                $vars['element']['#below']['content_for_mm']['#markup'] = render($block['content']); break;
            case 'Аналитика' :
                $block = module_invoke('block', 'block_view', 33);
                $vars['element']['#below']['content_for_mm']['#markup'] = render($block['content']); break;
        }
        if ($vars['element']['#below']) {
            $vars['element']['#below']['#prefix'] = '<div class="mega-menu">';
            $vars['element']['#below']['#suffix'] = '</div>';
        }
    }
}

function bootstrap_infowatch_menu_tree($variables) {
    return '<ul class="menu nav navbar-nav">' . $variables['tree'] . '</ul>';
}

/**
 * @param $nid
 * @return mixed
 */
function annotation_find_custom($nid) {
    $types = ['news', 'webinar', 'page', 'webform'];
    $nid = (int) abs($nid);
    $q = db_select('node', 'n');
    $q->leftJoin('field_data_body', 'b', 'b.entity_id = n.nid');
    $q->condition('n.type', $types, 'IN')
      ->condition('n.nid', $nid)
      ->fields('b', ['body_summary'])
      ->fields('n', ['nid', 'type']);
    $res = $q->execute()->fetchAssoc();
    if ($res['type'] != 'webinar' && $res['body_summary']) {
        return $res['body_summary'];
    } elseif($res['type'] == 'webinar') {
        $webinar = node_load($res['nid']);
        $html = '<div class="web3_top_blon">';
        $html .= theme('image_style', array(
            'style_name' => 'webinar2',
            'path'       => isset($webinar->field_img_webinar[LANGUAGE_NONE]) ?$webinar->field_img_webinar[LANGUAGE_NONE][0]['uri'] :'',
        ));
        $html .= '<div class="web3_blon">';
        $html .= "<h1><span>Вебинар</span>{$webinar->title}</h1>";
        $timestamp = $webinar->field_date_webinar[LANGUAGE_NONE][0]['value'];
        $html .= '<div class="web3_blon_time">'. format_date($timestamp, 'medium', 'd M');
        $html .= '<span>'. format_date($timestamp, 'medium', 'H:i').' МСК'. '</span></div>';
        if ( ($webinar->field_date_webinar['und'][0]['value']+3600) > time()) {
            $html .= '<div class="ban_link"><a href="#registr" class="btn btn-default btn-lg">ЗАРЕГИСТРИРОВАТЬСЯ</a></div><div id="add_calendar">Добавить в календарь ';
            $html .= l('Outlook', "/outlook/add/{$webinar->nid}").' или ';
            $html .= l('Google', "/google/add/{$webinar->nid}", array('attributes' => array('target' => 'blank')));
            $html .= '</div>';
        }
        $html .= '<div class="head_author"><div class="web_autor_img_block">'.
                       theme('image_style', array(
                          'style_name' => 'webinar_view',
                          'path'       => $webinar->field_photo_webinar['und'][0]['uri'],
                          'width'      => '60',
                      ))."</div><div class='web_autor_name_block'><p><strong>{$webinar->field_fio_webinar['und'][0]['value']}</strong><br><span>{$webinar->field_profession_webinar['und'][0]['value']}</span></p></div>
                  </div>";
        $html .= '</div>';
        $html .= '</div>';
        $returns = ['html' => $html];
        return $returns;
    }
    return '';
}

/**
 * @param $nid
 * @return mixed
 */
function image_center_find_custom($nid) {
    $nid = (int) abs($nid);
    $types = ['news'];
    $q = db_select('node', 'n');
    $q->innerJoin('field_data_field_image', 'img', 'img.entity_id = n.nid');
    $q->innerJoin('file_managed', 'file', 'img.field_image_fid = file.fid');
    $q->condition('n.type', $types, 'IN')
        ->condition('n.nid', $nid)
        ->fields('file', ['uri']);
    $res = $q->execute()->fetchField();
    return $res ?file_create_url($res) :'';
}

