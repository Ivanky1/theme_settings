<div style="margin: 0pt; display: block;" class="rotatebanner">
    <div class="wrap">
      <?php foreach ($rows as $row) : ?>
        <div class="discuss_block">
            <div>
                <?php echo $row['title'] ?>
            <div class="descr">
                <?php if ($row['field_fio_webinar']) : ?>
                <?php echo $row['field_photo_webinar'] ?><p style="padding:0; margin: 0"><?php echo $row['field_date_webinar']; ?>(МСК)<br>
                <strong><?php echo $row['field_fio_webinar'] ?></strong>,<br>
                    <?php echo $row['field_head_desc_webinar'] ?></p>
                <?php else : ?>
                    <?php if ($row['field_img_dop_webinar']) : ?>
                        <?php echo $row['field_img_dop_webinar'] ?>
                    <?php elseif($row['field_dop_link_img_webinar']) : ?>
                        <?php echo theme('image_style', array(
                            'style_name' => 'webinar_mini',
                            'path'       =>  $row['field_dop_link_img_webinar'],
                        )); ?>
                    <?php endif ?>
                    <p style="padding:0; margin: 0"><?php echo $row['field_date_webinar']; ?>(МСК)<br>

                    <?php echo $row['field_head_desc_webinar'] ?></p>
                <?php endif; ?>
            </div>
        </div>
        <div>
            <a href="<?php echo $row['path'] ?>" class="discuss_link">Регистрация</a></div>
        </div>
      <?php endforeach ?>
    </div>
</div>





 <style type="text/css">

     .wrap{
         background: url("/sites/default/files/images/webinar_block_bg.jpg") no-repeat scroll center -6px #fff;
         border-top: medium none;
         margin-bottom: 2px;
         margin-right: 35px;
         overflow: hidden;
         padding: 57px 7px 9px;
         width: 240px;
     }
     .discuss_block{
         border-top: 1px #b1b8c2 solid;
         padding-top: 12px;
         height: 143px;
         font-size: 16px;
         line-height: 18px;
     }
     .discuss_block img{
         margin: 0 10px 5px 0;
         padding: 0;
         float:left;

     }
     .descr{
         font-size:12px;
         line-height: 16px;
         color: #747c87;
         padding: 10px 0 12px;
         overflow: hidden;
         height: 80px;
     }
     .descr img{
         font-size:12px;
         line-height: 16px;
         color: #747c87;
         padding: 0 0 12px;
     }
     .list-title .ul-tabs {
         margin: 0;
         padding: 0;
     }
     .list-title .ul-tabs li.active{
         background: url("/sites/all/themes/dlp/images/border_right_top.gif") no-repeat scroll right top #e6e6e6;
         margin: 0;
         padding: 0;
         line-height: 32px;
         height: 32px;
         display: inline-block;
         zoom: 1;
     }
     .list-title .ul-tabs li a{
         color: #02a5e2;
         padding: 0 19px 0 12px;
     }
     .list-title .ul-tabs li.active a,
     .list-title .ul-tabs li.active a:hover{
         color: #444549;
         padding: 0 19px 0 12px;
         text-decoration: none
     }
     a.discuss_link {
         border: none;
         background: scroll #ffb069 url("/sites/all/themes/dlp/images/icons_links/discussion_icon.jpg") top left no-repeat;
         float: left;
         padding: 8px 12px 8px 45px;
         font: normal normal normal 14px/16px Arial, Helvetica, sans-serif;
         color: #45474b;
         text-decoration: none;
         outline: none;
         margin: 0 0 5px;
     }
     .rotatebanner { display:none; }
 </style>