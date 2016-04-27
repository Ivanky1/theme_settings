<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>
    <?php
    // We hide the comments and links now so that we can render them later.
    hide($content['comments']);
    hide($content['links']);
    // print render($content['links']['flag']);
    ?>

<?php if ($page=='0') : ?>
    <?=preg_replace('/<iframe.*<\/iframe>/i', '', render($content)); ?>
<?php endif ?>

<?php if ($page=='1') : ?>
    <div class="content clearfix"<?php print $content_attributes; ?>>


<?php   if($node->type == 'event') {
        // Для мероприятия
        //print_r($node);
        $y = substr($node->field_event_time['und'][0]['value'],0,4);
        $m = substr($node->field_event_time['und'][0]['value'], strpos($node->field_event_time['und'][0]['value'],'-')+1, 2 );
        $d = substr($node->field_event_time['und'][0]['value'], strrpos($node->field_event_time['und'][0]['value'],'-')+1, 2 );
        if (mktime(0,0,0,$m,$d,$y) >= mktime(0,0,0,date('m'),date('d'),date('Y')) ) {
            if ($node->field_presentations_event[LANGUAGE_NONE][0]['tid'] == 474) {
                echo '<div style="margin-bottom: 10px;background: url(http://www.infowatch.ru/sites/default/files/miscellaneous/webinar/calendar_15.jpg) no-repeat scroll 0 0 transparent;display: block;line-height: 26px;padding-left: 36px;" id="add_calendar">Добавить мероприятие в календарь ';
                echo l('Outlook', "bis/outlook/add/{$node->nid}").' или ';
                echo l('Google', "bis/google/add/{$node->nid}", array('attributes' => array('target' => 'blank')));
                echo '</div>';
            }
            print render($content);
           // $block = module_invoke('block', 'block_view',109 );
           // echo render($block['content']);
            if ( !strstr(drupal_get_path_alias($_GET['q']), 'bis-summit-minsk') ) {
                echo '<p>'. l('Программа конференции', 'bis-summit/program', array('attributes' => array('class' => array('more') )) ). '</p>';
            } else {
                echo '<p>'. l('Программа конференции', 'bis-summit-minsk/program', array('attributes' => array('class' => array('more') )) ). '</p>';
            }
        } else {
            $content_old = render($content);
            $content_old = preg_replace('/<div class=".*?field\-name\-field\-event\-time.*">.*<\/div>.*<\/div>.*<\/div>.*<\/div>/','',$content_old);
            print $content_old;
        }
    } else {
        print render($content);
    }

    ?>
  </div>

      <div class="clearfix" style="clear: both;">

        <?php if ($node->type != 'page' && $_GET['q'] != 'node/13251' && $_GET['q'] != 'node/50531' && $node->type != 'webform') : ?>
            <?php $block = module_invoke('block', 'block_view',107 );
                   echo render($block['content']);
            ?>
            <?php if (!empty($content['links'])): ?>
              <div class="links"><?php print render($content['links']); ?></div>

                <?php
                if ($node->type != 'webform') {
                    $block = module_invoke('block', 'block_view',14 );
                    echo render($block['content']);
                }
                ?>


            <?php endif; ?>

        <?php else : ?>
            <?php if (!empty($content['links'])): ?>
                <div class="links"><?php print render($content['links']); ?></div>
            <?php endif; ?>
        <?php endif ?>

        <?php print render($content['comments']); ?>

        <?php
        global $user;
        if ( (!empty($content['links']['statistics']) && $_GET['q'] == 'node/45458'  ) || ( ($_GET['q'] == 'node/45754' || $node->type == 'page') && (array_key_exists(3,$user->roles) || array_key_exists(8,$user->roles) ) ) ): ?>
            <div class="links-statistics-web-form"><?php print render($content['links']['statistics']); ?></div>
        <?php endif; ?>
     </div>
 <?php endif; ?>


</div>

