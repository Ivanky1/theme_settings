<?php

function my_theme_page_alter($page) {
    $meta_description = array(
        '#type' => 'html_tag',
        '#tag' => 'meta',
        '#attributes' => array(
            'name' => 'description',
            'content' => 'Оцените свои знания законодательства в области защиты коммерческой тайны в игре "Веселый садовник!"'
        )
    );
    drupal_add_html_head( $meta_description, 'meta_description' );
    if (drupal_is_front_page() || drupal_get_path_alias($_GET['q']) == 'games/sadovnik') {
        $meta_img = array(
            '#type' => 'html_tag',
            '#tag' => 'meta',
            '#attributes' => array(
                'property' => 'og:image',
                'content' => 'http://project.bis-expert.ru/sites/default/files/images/sadovnik_zastavka.jpg'
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
  // Toggle fixed or fluid width.
  if (theme_get_setting('my_theme_width') == 'fluid') {
    $vars['classes_array'][] = 'fluid-width';
  }

  $title = 'Игра';
  if (isset($vars['page']['content']['system_main']['description'])) {
    $title = $vars['page']['content']['system_main']['description']['#markup'];
  }
  switch($title) {
      case mb_strstr($title, "<h2 class='result'>Идеально"): $vars['head_title'] = 'Я идеальный садовник'; break;
      case mb_strstr($title, "<h2 class='result'>Отличный"): $vars['head_title'] = 'Я отличный садовник'; break;
      case mb_strstr($title, "<h2 class='result'>Нормальный"): $vars['head_title'] = 'Я нормальный садовник'; break;
      case mb_strstr($title, "<h2 class='result'>Плохой"): $vars['head_title'] = 'Я плохой садовник'; break;
      case mb_strstr($title, "<h2 class='result'>Ужасный"): $vars['head_title'] = 'Я ужасный садовник'; break;
      default: $vars['head_title'] = 'Игра для знатоков законодательства "Веселый садовник"'; break;
  }


  // Add conditional CSS for IE6.
  drupal_add_css(path_to_theme() . '/fix-ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lt IE 7', '!IE' => FALSE), 'preprocess' => FALSE));

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
  if ($vars['region'] == 'header') {
    $vars['classes_array'][] = 'clearfix';
  }
}

/**
 * Implements hook_form_BASE_FORM_ID_alter(): webform_client_form_123.
 */
function my_theme_form_webform_client_form_1_alter(&$form, &$form_state) {
    $form['actions']['submit']['#ajax'] = array(
        'callback' => 'my_theme_form_webform_client_form_1_ajax_submit',
        'wrapper' => 'webform-client-form-1',
    );
    // Удаляем #pre_render, иначе не будет работать ajax
    unset($form['actions']['submit']['#pre_render']);
}

/**
 * Ajax submit.
 */
function my_theme_form_webform_client_form_1_ajax_submit($form, &$form_state) {
    if (form_get_errors()) {
        return $form;
    }
    else {
        $webform = $form['#node']->webform;
        $form['fields'] = array(
            '#prefix' => '<div id="fields">Усё отправилось',
            '#suffix' => '</div>',
        );
        //return drupal_render($form['fields']);
        return check_markup($webform['confirmation'], $webform['confirmation_format']);

    }
}

