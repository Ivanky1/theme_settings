<?php
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($page=='0'){ ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.  
	hide($content['links']);	  
	  print render($content);	  
    ?>
  </div>
  
<?php }?>

<?php if ($page=='1'){   ?>
  
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
   <!--span class="submitted"><?php print $submitted ?></span-->
  <?php endif; ?>

  <?php if ($user->uid == 1 || array_key_exists(3,$user->roles) || array_key_exists(8,$user->roles) )  {
            if (!$node->field_event_id_webinar) {
                echo "<a href='/webinar/create/new/{$node->nid}'>Создать вебинар на Webinar.ru</a><br/>";
            }
            $path = variable_get('file_public_path', conf_path() . '/files');
            if (file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$path.'/save_user/'.$node->nid.".csv")) {
                echo l('Скачать список записавшихся', $path.'/save_user/'.$node->nid.'.csv').'<br/>';
                echo l('Посмотреть количество зарегистрированных','webs/list/listener/'.$node->nid, array('attributes'=>array('target'=>'_blank')));
            }
        }

  ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
      <div>
          <a href="#registr">
              <?php
              if (isset($node->field_img_webinar['und'])) {
                  echo theme('image_style', array(
                      'style_name' => 'webinar2',
                      'path'       => $node->field_img_webinar['und'][0]['uri'],
                      'alt'        => $node->title,
                      'title'      => $node->title,
                  ));
              }

              ?>
          </a></div>
      <div class="side48 bb" style="height: 70px;">
          <div class="social-blocks" style="width: 600px;">
              <div class="soc-block" style="float:left;">
                  <script charset="utf-8" src="//yandex.st/share/share.js" type="text/javascript"></script>
                  <div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="vkontakte,lj,linkedin" data-yasharetype="icon">
                      <span class="b-share"><a class="b-share__handle" data-hdirection="" data-vdirection="" id="ya-share-0.5163214536836552-1330440540967"><img alt="" class="b-share-icon" src="//yandex.st/share/static/b-share.png" /></a></span></div>
              </div>
              <div class="soc-block twitter-soc-block" style="float:left;">
                  <a class="twitter-share-button" data-lang="ru" href="https://twitter.com/share">Твитнуть</a> <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script></div>
              <div class="soc-block fb-soc-block" style="margin-top: 13px;  float:left;">
                <div id="fb-root">&nbsp;</div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/ru_RU/sdk.js#xfbml=1&version=v2.0";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));</script>
                <div class="fb-share-button" data-href="/<?php echo drupal_get_path_alias($_GET['q']); ?>" data-layout="button_count"></div>
              </div>
          </div>
      </div>
      <div class="side48 bb mtop24 mbot24 pbot24">
          <?php
          $options = array(
              'label' => 'hidden', // 'inline', 'above' and 'hidden', defaults to 'above'
              'type' => 'full',
          );
          echo "<div id='webinar_date_start'><strong>".format_date($node->field_date_webinar[LANGUAGE_NONE][0]['value'], 'medium', 'd F h:i')." (МСК)".
               "</strong></div>";
          if ( ($node->field_date_webinar['und'][0]['value']+3600) > time()) {
              echo '<div id="add_calendar">Добавить мероприятие в календарь ';
              echo l('Outlook', "http://www.infowatch.ru/outlook/add/{$node->nid}").' или ';
              echo l('Google', "http://www.infowatch.ru/google/add/{$node->nid}", array('attributes' => array('target' => 'blank')));
              echo '</div>';
          }
          echo '<div id="clear" style="clear: both;"></div>';
          $output = field_view_field('node', $node, 'field_body_webinar', $options);
          echo render($output);
          ?>
      </div>
      <?php  if (isset($node->field_desc_head_webinar['und'])) : ?>
      <div class="side48 clearfix bb mtop24 mbot24 pbot24">
          <h2 class="cg mtop24">
              Ведущий вебинара:</h2>  
          <div style="margin-top: 35px; margin-bottom: 35px;">
              <div class="photo_comment">
                    <?php
                      echo theme('image_style', array(
                          'style_name' => 'webinar',
                          'path'       => $node->field_photo_webinar['und'][0]['uri'],
                         // 'alt'        => $node->title,
                         // 'title'      => $node->title,
                          'width'      => '100',
                      ));
                    ?>
                 </div>
                  <div class="text_comment">
                      <?php
                          $options = array(
                              'label' => 'hidden', // 'inline', 'above' and 'hidden', defaults to 'above'
                              'type' => 'full',
                          );
                          $output= field_view_field('node', $node, 'field_desc_head_webinar', $options);
                          echo render($output);
                      ?>
                  </div>
          </div>
      </div>
      <?php endif ?>
      <div class="side48 pbot12">
          <h2 class="cg mtop24">
              <a name="registr"></a><?php $zapis = (($node->field_date_webinar['und'][0]['value']+3600) > time()) ? 'Регистрация:' : 'Получить запись:';
              echo $zapis; ?>
          </h2>
      </div>

<?php
   // if ($node->field_date_webinar['und'][0]['value'] > time()) {
        if ($user->uid == 0) {
            global $variables;
            $block = module_invoke('webinar_register_module', 'block_view','webinar-register-user-all' );
            print theme_status_messages($variables);
            echo render($block['content']);
            /*
             $formHtml = render(drupal_get_form("register_all_form"));
                echo  $formHtml;
            */
        } else {
            global $variables;
            $block = module_invoke('webinar_register_module', 'block_view','webinar-register-user-auto' );
            print theme_status_messages($variables);
            echo render($block['content']);
            /*
            $formHtml = render(drupal_get_form("register_auto_form"));
            echo  $formHtml;
            */
        }


    if (array_key_exists(3, $user->roles) || array_key_exists(8, $user->roles) && $node->field_date_webinar['und'][0]['value']+3600 < time()) {
        echo l("Ссылка на запись вебинара", "http://my.webinar.ru/record/{$node->field_event_id_webinar['und'][0]['value']}", array('attributes' => array('target'=>'_blank')) );
    }

    if ($node->field_date_webinar[LANGUAGE_NONE][0]['value']+3600 < time() && !isset($node->field_link_write_webinar[LANGUAGE_NONE])) {
        $n =  node_load($node->nid);
        $n->field_link_write_webinar['und'][0]['value'] = 'http://my.webinar.ru/record/'.$node->field_event_id_webinar['und'][0]['value'].'/';
        node_save($n);
        drupal_goto($_GET['q']);
    }




?>
  </div>

  <div class="clearfix" style="clear: both;">

    <?php print render($content['comments']); ?>
  </div>
<?php }?>
</div>

<?php

/*

*/

?>




