<?php if ($page=='1'){ ?>
  
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
          if (array_key_exists(24, $user->roles)) {
              echo l('Перейти на лиды партнера','lead/partners/'.$user->uid,
                  array('query' =>
                      array('field_link_user_client_lead_target_id' => $node->field_link_user_client_lead[LANGUAGE_NONE][0]['target_id']))
              );
          }

          $options = array(
              'label' => 'hidden', // 'inline', 'above' and 'hidden', defaults to 'above'
              'type' => 'text_summary_or_trimmed',
          );
          $body = field_view_field('node', $node, 'body', $options);
          $summary_text = render($body);

          $field_fio_client_lead = field_view_field('node', $node, 'field_fio_client_lead', array('label' => 'hidden'));
          //$fio = render($field_fio_client_lead);

          $field_contacts_client_lead = field_view_field('node', $node, 'field_contacts_client_lead', array('label' => 'hidden'));
          $contacts = render($field_contacts_client_lead);

          $field_status_client_lead = field_view_field('node', $node, 'field_status_client_lead', array('label' => 'hidden'));
          $status = render($field_status_client_lead);
     ?>
      <table id="table_new_cl">
          <tr>
              <th>Контакты</th>
              <th>Краткая информация</th>
          </tr>
          <tr>
              <td class="bl50_50">
                  <!--<h3><?//=$fio?></h3>-->
                  <span><?=$contacts?></span>
              </td>
              <td><?=$summary_text?></td>
          </tr>
      </table>
      <?php if ($status) : ?>
          <div id="block-iw-bonus-iw-bonus-deals-list2">
          <h3>ТЕКУЩИЙ СТАТУС</h3>
          <table  id="table_status_new_cl">
              <tr>
                  <td class="status_new_cl"><?=$status?></td>
                  <?php if (array_key_exists(22, $user->roles)) : ?>
                    <td><?=l('Сменить статус', 'lead/edit/status/'.$node->nid,array('attributes'=>array('class'=>'def_button')))?></td>
                  <?php endif ?>
              </tr>
          </table>
          </div>
      <?php else : ?>
          <div>Лид еще не принят в работу</div>
          <?php if (array_key_exists(22, $user->roles)) : ?>
              <br/>
              <?=l('Принять в работу', 'lead/add/status/'.$node->nid,array('attributes'=>array('class'=>'def_button')))?>
           <?php endif ?>
      <?php endif ?>
    <?php if ($status) : ?>
      <h2 class="title">Запланированные активности</h2>
      <?=views_embed_view('you_client_lead', 'block_3', $node->nid); ?>
      <?php  if (array_key_exists(3, $user->roles) && $status) : ?>
        <?=l('Создать активность',"lead/activity/add/{$node->nid}",array('attributes'=>array('class'=>'def_button')));?>
      <?php endif ?>
      <div style="clear: both; margin-top:50px;"></div>
      <h2 class="title">Журнал действий</h2>
      <?=views_embed_view('journal', 'block'); ?>
      <div style="clear: both"></div>
    <?php endif ?>
  </div>

  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links"><?php print render($content['links']); ?></div>
    <?php endif; ?>
  </div>
<?php }?>
