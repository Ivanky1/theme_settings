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

<?php if ($page=='1'){ ?>  
  
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
   <!--span class="submitted"><?php print $submitted ?></span-->
  <?php endif; ?>

  <?php  if ($user->uid == 1 || array_key_exists(3,$user->roles)  )  {
            if (!isset($node->field_event_id_webinar['und'])) {
                echo "<a href='/webinar/create/new/{$node->nid}'>Создать вебинар на Webinar.ru</a><br/>";
            }
            $path = variable_get('file_public_path', conf_path() . '/files');
            if (file_exists($_SERVER['DOCUMENT_ROOT'].'/'.$path.'/save_user/'.$node->nid.".csv")) {
                echo "<a href='/{$path}/save_user/{$node->nid}.csv'>Скачать список записавшихся</a><br/>";
            }
        }

  ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
      <?php
      if (isset($node->field_center_img_webinar[LANGUAGE_NONE])) {
          $options = array(
              'type' => 'image',
          );
          $images = field_get_items('node', $node, 'field_center_img_webinar');
          $field_image = field_view_value('node', $node, 'field_center_img_webinar', $images[0], $options);
          echo render($field_image);
      }


      ?>
      <p> <span class="event_date"><?php echo format_date($node->field_date_webinar['und'][0]['value'], $type = 'medium', 'd M Y - H:i'); ?>(МСК)</span>
          <?php if ( ($node->field_date_webinar['und'][0]['value']+3600) > time()) :
                echo '<div id="add_calendar">Добавить мероприятие в календарь ';
                echo l('Outlook', "http://www.bis-expert.ru/outlook/add/{$node->nid}").' или ';
                echo l('Google', "http://www.bis-expert.ru/google/add/{$node->nid}", array('attributes' => array('target' => 'blank')));
                echo '</div>';
           endif?>
      </p>
      <h2 style="margin-bottom:15px;"> Анонс:</h2>
      <?php echo $node->body['und'][0]['value']; ?>
      <?php if (isset($node->field_fio_webinar['und'])) : ?>
          <div class="for_img" style=" overflow: hidden; ">
          <h2 style="margin-top:0px; margin-bottom:15px;">Автор:</h2>
              <?php
                if ($node->field_photo_webinar)
                  echo theme('image_style', array(
                      'style_name' => 'webinar',
                      'path'       => $node->field_photo_webinar['und'][0]['uri'],
                      'alt'        => 'Image alt',
                      'title'      => 'Image title',
                  ));
               ?>
              <span><strong><?php echo $node->field_fio_webinar['und'][0]['value']  ?></strong>
              </span><br />
              <span><?php echo $node->field_profession_webinar['und'][0]['value']  ?></span><br />
              <span><?php echo $node->field_company_webinar['und'][0]['value']  ?></span><br />
              <?php echo $node->field_desc_head_webinar['und'][0]['value'] ?>
          </div>
      <?php else : ?>
            <div class="for_img" style=" overflow: hidden; ">
                <?php echo $node->field_anons_webinar['und'][0]['value'] ?>
            </div>
      <?php endif; ?>
      <?php
    if ( ($node->field_date_webinar['und'][0]['value']+3600) > time()) {
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

    } else {

        echo "<div style='clear:both;color:#ff0000;text-align: center;'><strong>Вебинар закончился!</strong></div>";

        if (isset($node->field_link_write_webinar['und'])) {
            echo "<div style=' clear: both; padding: 30px 0;'><a href='{$node->field_link_write_webinar['und'][0]['value']}' class='more'>Запись вебинара</a> </div>";
        } else {
            $n =  node_load($node->nid);
            $n->field_link_write_webinar['und'][0]['value'] = 'http://my.webinar.ru/record/'.$node->field_event_id_webinar['und'][0]['value'].'/';
            node_save($n);
            drupal_goto($_GET['q']);
        }
    }

    if ($user->uid == 1 || array_key_exists(3,$user->roles) || array_key_exists(8,$user->roles) )  {
      echo "<a target='_blank' href='/webin/list/listener/{$node->nid}'>Посмотреть количество зарегистрированных</a><br/>";
    }

  ?>
  </div>

  <div class="clearfix" style="clear: both;">
    <?php if (!empty($content['links'])): ?>
        <?php $block = module_invoke('block', 'block_view',107 );
        echo render($block['content']);
        ?>
        <div class="links"><?php print render($content['links']); ?></div>
        <?php $block = module_invoke('block', 'block_view',14 );
        echo render($block['content']);
        ?>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
<?php }?>
</div>
