<?php if ($page=='1'){ ?>

    <?php print render($title_suffix); ?>

    <?php if ($display_submitted): ?>
        <span class="submitted"><?php print $submitted ?></span>
    <?php endif; ?>

    <div class="content clearfix"<?php print $content_attributes; ?>>
        <?php
        $options = array(
            'label' => 'hidden', // 'inline', 'above' and 'hidden', defaults to 'above'
            //'type' => 'text_summary_or_trimmed',
        );
        $body = field_view_field('node', $node, 'body', $options);
        $body = render($body);

        $field_date_activity_lead = field_view_field('node', $node, 'field_date_activity_lead', array('label' => 'hidden'));
        $dateActivity = render($field_date_activity_lead);

        $field_type_activity_lead = field_view_field('node', $node, 'field_type_activity_lead', array('label' => 'hidden'));
        $type = render($field_type_activity_lead);

        $field_status_activity_lead = field_view_field('node', $node, 'field_status_activity_lead', array('label' => 'hidden'));
        $status = render($field_status_activity_lead);

        ?>
        <h3>ИНФОРМАЦИЯ ОБ АКТИВНОСТИ</h3>
        <table>
            <tr>
                <td>Тип активности:</td>
                <td><?=$type?></td>
            </tr>
            <tr>
                <td>Дата</td>
                <td><?=$dateActivity ?></td>
            </tr>
            <tr>
                <td>Статус</td>
                <td><?=$status ?></td>
            </tr>
            <tr>
                <td>Описание</td>
                <td><?=$body ?></td>
            </tr>
        </table>
        <?php if (array_key_exists(22, $user->roles) && !strstr($status, 'Закрыто') ) : ?>
            <div>
                <?=l('<button>Изменить</button>',"lead/activity/edit/{$node->nid}", array('html' => TRUE,));?>
                <?=l('<button>Закрыть активность</button>',"lead/activity/remove/{$node->nid}", array('html' => TRUE,));?>
            </div>
        <?php endif ?>
        <div style="clear: both; padding-top:24px;"></div><br>
        <h3>Журнал действий</h3>
        <?=views_embed_view('journal', 'block_1'); ?>
        <div style="clear: both"></div>
    </div>

    <div class="clearfix">
        <?php if (!empty($content['links'])): ?>
            <div class="links"><?php print render($content['links']); ?></div>
        <?php endif; ?>
    </div>
<?php }?>


