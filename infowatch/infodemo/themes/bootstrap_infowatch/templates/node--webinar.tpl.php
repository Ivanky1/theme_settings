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

<?php if ($page=='1'){  ?>
  
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
                echo l('Посмотреть количество зарегистрированных','webs/list/listener/'.$node->nid, array('attributes'=>array('target'=>'_blank'))).'<br/><br/>';
            }
        }

  ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
          <?php 
          $options = array(
              'label' => 'hidden', // 'inline', 'above' and 'hidden', defaults to 'above'
              'type' => 'full',
          );
          echo '<div id="clear" style="clear: both;"></div><h3>Описание вебинара</h3>';
          $output = field_view_field('node', $node, 'field_body_webinar', $options);
          echo render($output);
          ?>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12 web3_autor_block">
          <h3>
              <?php echo (isset($node->field_desc_head_webinar[LANGUAGE_NONE]) && preg_match('/second_author/', $node->field_desc_head_webinar[LANGUAGE_NONE][0]['value']))
                ? "Ведущии" : "Ведущий";
              ?>

          </h3>
          <div style="margin-top: 35px; margin-bottom: 35px;">
              <div class="web_autor_img_block">
                    <?php
                      echo theme('image_style', array(
                          'style_name' => 'webinar',
                          'path'       => $node->field_photo_webinar['und'][0]['uri'],
                          'width'      => '100',
                      ));
                    ?>
              </div>
              <div class="web_autor_name_block"><strong><?=$node->field_fio_webinar[LANGUAGE_NONE][0]['value']; ?></strong><br><span><?=$node->field_profession_webinar[LANGUAGE_NONE][0]['value']; ?></span></div>
              <?php  if (isset($node->field_desc_head_webinar['und'])) : ?>
                  <div class="web_autor_bio_block">
                      <?php
                          $options = array(
                              'label' => 'hidden', // 'inline', 'above' and 'hidden', defaults to 'above'
                              'type' => 'full',
                          );
                          $output= field_view_field('node', $node, 'field_desc_head_webinar', $options);
                          echo render($output);
                      ?>
                  </div>
              <?php endif ?>
          </div>
      </div>

      <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12 web3_reg_block">
          <h3>
              <a name="registr"></a><?php $zapis = (($node->field_date_webinar['und'][0]['value']+3600) > time()) ? 'Регистрация:' : 'Получить запись:';
              echo $zapis; ?>
          </h3>

<?php
   // if ($node->field_date_webinar['und'][0]['value'] > time()) {
        if ($user->uid == 0) {
            global $variables;
            $block = module_invoke('webinar_register_module', 'block_view','webinar-register-user-all' );
            print theme_status_messages($variables);
            echo render($block['content']);
        } else {
            global $variables;
            $block = module_invoke('webinar_register_module', 'block_view','webinar-register-user-auto' );
            print theme_status_messages($variables);
            echo render($block['content']);
        }

    if (array_key_exists(3, $user->roles) || array_key_exists(8, $user->roles) && $node->field_date_webinar['und'][0]['value']+3600 < time()) {
        echo l("Ссылка на запись вебинара", "http://my.webinar.ru/record/{$node->field_event_id_webinar['und'][0]['value']}", array('attributes' => array('target'=>'_blank')) );
    }

/* } else {
      if ($node->field_link_write_webinar['und'][0]['value'])
          echo "<div><a href='{$node->field_link_write_webinar['und'][0]['value']}'>Скачать вебинар</a> </div>";
      echo "<div style='clear:both;color:#ff0000;text-align: center;'><strong>Вебинар закончился!</strong></div>";
  } */


?>
  </div>

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




