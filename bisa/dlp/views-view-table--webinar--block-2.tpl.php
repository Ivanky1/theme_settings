<table width="604" border="0" cellspacing="0" cellpadding="0" class="events_list"><tbody>
<?php  foreach ($rows as $row) : ?>
    <tr><td>
                <p><span class="event_date"> <?php echo $row['field_date_webinar']; ?>(МСК)</span></p>
            <p><?=$row['field_center_img_webinar'] ?></p>
            <p class="event_title"><?php echo $row['title'] ?></p>
         </td>
         <?php if ($row['field_fio_webinar']) : ?>
             <td><p class="for_img" style="margin:0;"><?php echo $row['field_photo_webinar']; ?><strong class="anonsauthor"><?php echo $row['field_fio_webinar'] ?></strong>
                        <span class="anonsjob"><?=$row['field_profession_webinar']?> <br/> <?=$row['field_company_webinar']?></span>
                 </p>
             </td>
        <?php else: ?>
             <td><p class="for_img" style="margin:0;"><?php echo $row['field_photo_webinar']; ?>
             <?php if ($row['field_img_dop_webinar']) : ?>
                 <?php echo $row['field_img_dop_webinar'] ?>
             <?php elseif($row['field_dop_link_img_webinar']) : ?>
                 <?php echo theme('image_style', array(
                     'style_name' => 'webinar_list',
                     'path'       =>  $row['field_dop_link_img_webinar'],
                 )); ?>
             <?php endif ?>
                     <?php echo $row['field_head_desc_webinar'] ?></p>
             </td>
        <?php endif; ?>
    </tr>
<?php endforeach ?>
</tbody></table>
