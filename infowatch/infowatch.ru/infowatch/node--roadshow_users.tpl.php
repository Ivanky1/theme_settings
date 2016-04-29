<?php if ($user->uid == 0) drupal_goto('roadshow'); ?>
<div class="node-roadshow">
    <select class="status">
        <option selected value="none">Укажите статус чтобы сменить</option>
    <?php
        $res = db_select('field_config', 'c')
               ->fields('c', array('data'))
               ->condition('c.field_name','field_status_roadshow')
               ->execute()->fetchAssoc();
        $res = unserialize($res['data']);
        foreach($res['settings']['allowed_values'] as $value) {
            if ($value != $node->field_status_roadshow['und'][0]['value'])  {
                echo '<option value="'.$value.'">'.$value.'</option>';
            }
        }

    ?>
    </select> <button>Применить</button>
    <table class="views-table">
        <tr>
            <th>ФИО</th>
            <th>ЕМАЙЛ</th>
            <th>Должность</th>
            <th>Компания</th>
            <th>Город</th>
            <th>Телефон</th>
            <th>Статус</th>
        </tr>
        <tr class="odd">
            <td><?php   echo $node->title; ?></td>
            <td>
                <?php   $options = array( 'label' => 'hidden');
                        $field_email_roadshow = field_view_field('node', $node, 'field_email_roadshow', $options);
                        echo render($field_email_roadshow); ?>
            </td>
            <td>
                <?php   $field_profession_roadshow = field_view_field('node', $node, 'field_profession_roadshow', $options);
                        echo render($field_profession_roadshow); ?>
            </td>
            <td>
                <?php   $field_company_roadshow = field_view_field('node', $node, 'field_company_roadshow', $options);
                        echo render($field_company_roadshow); ?>
            </td>
            <td>
                <?php   $field_city_roadshow = field_view_field('node', $node, 'field_city_roadshow', $options);
                        echo render($field_city_roadshow); ?>
            </td>
            <td>
                <?php   $field_phone_roadshow = field_view_field('node', $node, 'field_phone_roadshow', $options);
                        echo render($field_phone_roadshow); ?>
            <td>
                <?php   $field_status_roadshow = field_view_field('node', $node, 'field_status_roadshow', $options);
                        echo render($field_status_roadshow); ?>
            </td>
        </tr>
    </table>
    <?php echo l("Вернуться к списку", 'roadshow/admin'); ?>
</div>
<script>

    (function($) {
        Drupal.behaviors.roadshow_users = {
            attach : function(context, settings) {
                $('button').bind('click',function() {
                    var nids = [];
                    nids.push(<?php echo $node->nid ?>);
                    if (nids.length > 0 && $('.status option:selected').val() != 'none') {
                        if (confirm('Вы действительно хотите изменить статус у участника?') ) {
                            var objStatus = {};
                            objStatus.nids = nids;
                            objStatus.status = $('.status option:selected').val();
                            $.ajax({
                                type: 'POST',
                                url: '/ajax/roadshow/status/update',
                                data: 'object='+JSON.stringify(objStatus),
                                success: function(str) {
                                    location.reload();
                                },
                                async: false
                            });
                        };
                    }

                return false;

                })
            }
        }

    })(jQuery);


</script>