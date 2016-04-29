<?php if (search_rows($rows) == 1) :?>
    <div class="status_update">
        <label>Сменить статус</label>
        <select class="status">
            <?php
            $res = db_select('field_config', 'c')
                ->fields('c', array('data'))
                ->condition('c.field_name','field_status_roadshow')
                ->execute()->fetchAssoc();
            $res = unserialize($res['data']);
            foreach($res['settings']['allowed_values'] as $value) {
                    echo '<option value="'.$value.'">'.$value.'</option>';
            }
            ?>
        </select><button class="status_button">Применить</button> <br/>
        <button class="checked_button" data-email="<?=$user->mail?>">Проверить письма</button>
    </div>
    <?php elseif (arg(1) == 'complete') : ?>
        <div class="status_update">
            <label>Выслать повторно</label>
            <select class="status">
                <option value="Не выбрано">Не выбрано</option>
                <option value="Выслать повторное письмо">Выслать повторное письмо</option>
            </select><button class="status_button">Применить</button>
        </div>
<?php endif ?>

<table class="views-table">
    <tr>
        <th>Выбрать все: <input type="checkbox" class="all_mails" name="all_mails"></th>
        <th>ФИО</th>
        <th><?=l('ЕМАЙЛ',$_GET['q'], array('query' => get_parameters()) ) ?> </th>
        <th>Должность</th>
        <th>Компания</th>
        <th>Город</th>
        <th>Телефон</th>
        <th>Статус</th>
        <th>Дата</th>
        <th>Изменить в один клик</th>
        <th><button class="archive_button">В архив</button>
            <input type="checkbox" name="all_nids" class="all_nids">
        <?php
        if (array_key_exists(3, $user->roles) || $user->uid == 1)
            echo '<br><br><button class="delete_button">Удалить</button>';
        ?>
        </th>
    </tr>
<?php foreach($rows as $key=>$row) : ?>
    <?php
        if ($key % 2 == 0) $classTr = 'even';
        else $classTr = 'odd';
    ?>
    <tr class="<?php echo $classTr ?>">
        <?php if ( $row['field_status_roadshow'] == 'Ожидает обработки') : ?>
                    <?php $checked = '<input class="status_checked" type="checkbox" data-nid="'.$row['nid'].'">';
                          $editStatus = '<a class="link_status" href="javascript:void(0)" data-link="'.$row['nid'].'" data-status="Принято с оповещением">Принято с оповещением</a><br>
                                         <a class="link_status" href="javascript:void(0)" data-link="'.$row['nid'].'" data-status="Отказать втихую">Отказать втихую</a>';
                    elseif (arg(1) == 'complete') : $checked = '<input class="status_checked" type="checkbox" data-nid="'.$row['nid'].'">';
                    else : $editStatus = ''; $checked =''; ?>
            <?php endif ?>
                <input class="hide_export" type="hidden" value="<?php echo $row['nid'] ?>">
        <td><?php if ($checked) echo $checked; ?></td>
        <td><?php echo $row['title'] ?></td>
        <td class="roadshow_email_color"><?php echo $row['field_email_roadshow'] ?></td>
        <td><?php echo $row['field_profession_roadshow'] ?></td>
        <td><?php echo $row['field_company_roadshow'] ?></td>
        <td><?php echo $row['field_city_roadshow'] ?></td>
        <td><?php echo $row['field_phone_roadshow'] ?></td>
        <td class="roadshow_status"><?php echo $row['field_status_roadshow'] ?></td>
        <td><?php echo $row['created'] ?></td>
        <td><?php if($editStatus) echo "{$editStatus}"; ?></td>
        <?php
          //  if (array_key_exists(3, $user->roles) || $user->uid == 1)
                echo '<td><input type="checkbox" class="del_checked" data-delete="'.$row['nid'].'">
                </td>';
        ?>
    </tr>
<?php endforeach ?>
</table>

<?php
/**
 * @param $rows
 * @return int
 */
function search_rows($rows) {
   foreach($rows as $row) {
        if ($row['field_status_roadshow'] == 'Ожидает обработки') {
            return 1;
        }
   }
}

/**
 * @return string
 */
function get_parameters() {
    $parameters = drupal_get_query_parameters();
    $str = '';
    foreach($parameters as $key=>$value) {
        if ($key == 'sort') {
            $value = ($value == 'asc') ?'desc' : 'asc';
            $parameters[$key] = $value;
        }
    }
    if (!array_key_exists('sort', $parameters)) {
        $parameters['order'] = 'field_email_roadshow';
        $parameters['sort'] = 'asc';
    }
    return $parameters;
}

?>

<script>

    (function($) {
        Drupal.behaviors.roadshow_users_node = {
            attach : function(context, settings) {
                $(':checkbox').removeAttr('checked');
                    $('button.status_button, .link_status').bind('click',function() {
                        if ($('.status option:selected').val() != 'Не выбрано') {
                        var nids = [];
                        var objStatus = {};
                        if ($(this).hasClass('link_status')) {
                            nids.push($(this).data('link'));
                            objStatus.status = $(this).data('status');
                        } else {
                            $('.status_checked:checked').each(function() {
                                nids.push($(this).data('nid'));
                            })
                        }
                        if (nids.length > 0) {
                            if (confirm('Вы действительно хотите изменить статусы у участников?')) {
                                objStatus.nids = nids;
                                if (!objStatus.status)
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
                    }
                })
            }
        }

    })(jQuery);

    (function($) {
        Drupal.behaviors.roadshow_users_delete = {
            attach : function(context, settings) {
                $('.all_nids, .all_mails').on('click', function() {
                    var className = ($(this).hasClass('all_nids')) ?'.del_checked' : '.status_checked';
                    if ($(this).is(':checked')) {
                        $(className+":checkbox").attr('checked', true);
                    } else {
                        $(className+":checkbox").removeAttr('checked');
                    }
                })

                $('button.delete_button, button.archive_button').bind('click', function() {
                    var nidsDelete = [];
                    $(".del_checked:checked").each(function() {
                        nidsDelete.push($(this).data('delete'));

                    })
                    if (nidsDelete.length > 0) {
                        if ($(this).hasClass('archive_button')) {
                            var url = '/ajax/roadshow/archive/add';
                            var post = 'nids_archive='+JSON.stringify(nidsDelete);
                            var msg = 'Пользователи будут добавлены в архив!'
                        }
                        if ($(this).hasClass('delete_button')) {
                            var url = '/ajax/roadshow/delete';
                            var post = 'nids_delete='+JSON.stringify(nidsDelete);
                            var msg = 'Пользователи будут удалены!';
                        }
                        if (confirm(msg)) {
                            $.ajax({
                                type: 'POST',
                                url: url,
                                data: post,
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
    }) (jQuery);

    (function($) {
        Drupal.behaviors.roadshow_email_color = {
            attach : function(context, settings) {
                var city = getUrlParameter('field_city_roadshow_value');
                //var year = getUrlParameter('date_filter_1[value][year]');
                var newItem = getUrlParameter('field_add_archive_roadshow_value');
                if (city && newItem && city != 'All') {
                    var emailAll = [];
                    var emailPovtor = [];
                    $('td.roadshow_email_color').each(function() {
                        if ($.inArray($(this).text(), emailAll) != -1) {
                            emailPovtor.push($(this).text());
                        }
                        emailAll.push($(this).text());

                    });
                    $('td.roadshow_email_color').each(function() {
                        var status = $(this).parent('tr').find('>td.roadshow_status').text();
                        if ($.inArray($(this).text(), emailPovtor) != -1 && status == 'Ожидает обработки') {
                            $(this).css('color', 'red');
                        }
                    });

                }
                function getUrlParameter(sParam) {
                    var sPageURL = decodeURIComponent(window.location.search.substring(1));
                    var sURLVariables = sPageURL.split('&');
                    for (var i = 0; i < sURLVariables.length; i++)
                    {
                        var sParameterName = sURLVariables[i].split('=');
                        if (sParameterName[0] == sParam)
                        {
                            return sParameterName[1];
                        }
                    }
                }
            }
        }
    }) (jQuery);

    (function($) {
        Drupal.behaviors.roadshow_checked_mail = {
            attach : function(context, settings) {
                $('button.checked_button').bind('click',function() {
                    var obj = {};
                    obj.city = $('#edit-field-city-roadshow-value').val();
                    obj.email = $(this).data('email');
                    if (obj.hasOwnProperty('city') && obj.city != '- Все -') {
                        if (confirm('Проверить письма?')) {
                            $.ajax({
                                type: 'POST',
                                url: '/ajax/roadshow/checked/mail',
                                data: 'object='+JSON.stringify(obj),
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

    /*
    (function($) {
        Drupal.behaviors.select_sort = {
            attach : function(context, settings) {
                var selectElm = $("#edit-field-city-roadshow-value"),
                    selectSorted = selectElm.find("option").toArray().sort(function (a, b) {
                        return (a.innerHTML.toLowerCase() > b.innerHTML.toLowerCase()) ? 1 : -1;
                    });
                $("#edit-field-city-roadshow-value").remove();
                $('.form-item-field-city-roadshow-value').append('<select name="field_city_roadshow_value"></select>');
                var div = document.createElement("div");
                $.each(selectSorted, function (key, value) {
                    div.appendChild(value);
                });
                $('.form-item-field-city-roadshow-value select').append(div.innerHTML);

            }
        }
    }) (jQuery); */
</script>

</script>

