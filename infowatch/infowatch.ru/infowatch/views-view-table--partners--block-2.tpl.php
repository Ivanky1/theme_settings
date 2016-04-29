<table>
    <tbody>
<?php foreach($rows as $row) : ?>
        <tr>
            <td width="40%" valign="top" align="center" style="border-bottom: 1px solid rgb(204, 204, 204); padding-top: 15px; padding-bottom: 15px;">
                <?php //echo $row['field_img_partners'] ?>
                <?php echo preg_replace('/(.*)<a(.*)(href="|\'http.*"|\'.*)/',"$1<a rel='nofollow' target='_blank' $2$3", $row['field_img_partners'])  ?>
            </td>
            <td width="40%" valign="top" align="left" style="border-bottom: 1px solid rgb(204, 204, 204); padding-top: 15px; padding-bottom: 15px;" class="title_partners_name">
                <h3 style=" padding-bottom: 15px; "><?php echo $row['title'] ?></h3>

                <?php if ($row['field_contacts_partners']) : ?>
                    <a rel='nofollow' class="contacts" style="padding: 5px; background-color: rgb(238, 238, 238); color: rgb(102, 102, 102);" href="javascript:void(0)">Контакты</a>
                    <div class="сom" style="padding: 15px 5px 5px 15px; background-color: rgb(238, 238, 238);">
                        <?php echo preg_replace('/(.*)<a(.*)(href="|\'http.*"|\'.*)/',"$1<a rel='nofollow' target='_blank' $2$3", $row['field_contacts_partners'])  ?>
                        <?php //echo $row['field_contacts_partners'] ?>
                        <div style="text-align: right;">
                            <a rel='nofollow' class="close_contacts" style="padding: 5px; background-color: rgb(238, 238, 238); color: rgb(102, 102, 102);" href="javascript:void(0)">Закрыть</a>
                        </div>
                    </div>
                <?php endif ?>
            </td>
            <td width="20%" align="center" style="border-bottom: 1px solid rgb(204, 204, 204); padding-top: 15px; padding-bottom: 15px;">
                <?=($row['field_status_partners']) ? "<div id='{$row['field_status_partners']}'></div>"  :''; ?>
            </td>
        </tr>
<?php endforeach; ?>
    </tbody>
</table>


<script>
    (function($) {
        Drupal.behaviors.citypartnersviews = {
            attach : function(context, settings) {
                $(".contacts").bind('click',function() {
                    $(this).siblings('div.сom').slideDown();
                    $(this).hide();
                })
                $(".close_contacts").bind('click',function() {
                    $(this).parents("div.сom").siblings('a.contacts').fadeIn(1000);
                    $(this).parents("div.сom").slideUp(500);
                })
                $('div.сom').hide()

            }
        }
    }) (jQuery);

</script>