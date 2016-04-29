<?php

echo l('xls export',"webs/list/listener/export/".arg(3)).'<br/>';
if (variable_get('webinar_listener_delete') == 'w_l_delete' && (array_key_exists(3, $user->roles) || $user->uid == 1)) {
    echo l('Обновить список зарегистрировавшихся', 'webinar/update/list/'.arg(3));
} ?>
<?php if(is_numeric(arg(3))) echo '<input class="webinar_nid" type="hidden" data-webinar="'.arg(3).'" />';  ?>
<table class="views-table">
    <tr>
        <th>ФИО</th>
        <th>Электронная почта</th>
        <th>Должность</th>
        <th>Компания</th>
        <th>Получать рассылку</th>
        <?php
        if (array_key_exists(3, $user->roles) || $user->uid == 1)
            echo '<th><button class="delete_button">Удалить</button></th>';
        ?>
        <th>Предположительный город</th>
        <th>Дата</th>
        <th>UTM МЕТКИ</th>
    </tr>
<?php foreach($rows as $key=>$row) : ?>
    <?php
        if ($key % 2 == 0) $classTr = 'even';
        else $classTr = 'odd';
    ?>
    <tr class="<?php echo $classTr ?>">
        <td><?php echo $row['title'] ?></td>
        <td><?php echo $row['field_email_listener'] ?></td>
        <td><?php echo $row['field_profession_listener'] ?></td>
        <td><?php echo $row['field_company_listener'] ?></td>
        <td><?php echo $row['field_add_rss_listener'] ?></td>
        <?php
            if (array_key_exists(3, $user->roles) || $user->uid == 1)
                echo '<td><input name="reason" type="checkbox" class="del_listener_checked" data-delete="'.$row['nid'].'"></td>';
        ?>
        <td><?php echo $row['field_presumable_city_listener'] ?></td>
        <td><?php echo $row['created'] ?></td>
        <td><?php echo $row['php'] ?></td>
    </tr>
<?php endforeach ?>
</table>

<?php if (array_key_exists(3, $user->roles) || $user->uid == 1) : ?>
        <script>
            (function($) {
                Drupal.behaviors.webinar_listener_delete = {
                    attach : function(context, settings) {
                        var group = ':checkbox[name=' + $('.del_listener_checked').attr('name') + ']';
                        $(group).removeAttr("checked");
                        $('button.delete_button').bind('click', function() {
                            var nidsDelete = [];
                            $(".del_listener_checked:checked").each(function() {
                                nidsDelete.push($(this).data('delete'));
                            })
                            var webinarNid =  $('.webinar_nid').data('webinar');
                            if (nidsDelete.length > 0) {
                                if (confirm('Пользователи этого вебинара будут удалены!')) {
                                    $.ajax({
                                        type: 'POST',
                                        url: '/webinar/listener/delete',
                                        data: 'nids_delete='+JSON.stringify(nidsDelete)+'&webinar_nid='+webinarNid,
                                        success: function(str) {
                                            location.reload();
                                        },
                                        async: false
                                    });
                                }
                            }

                        })
                    }
                }

            })(jQuery);


        </script>

<?php endif ?>