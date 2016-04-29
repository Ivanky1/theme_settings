<?php foreach($rows as $row) : ?>
    <div class="white_shadow p48">
        <span style="font-size:18px; color:#444444; line-height:20px; margin:12px 0 12px; float:left; width:100%;">
            <a style="font-size:18px; color:#444444; line-height:20px; margin:12px 0 12px; float:left; width:100%;" href="<?php echo $row['path'] ?>"><?php echo $row['title'] ?></a></span>
            <a href="<?php echo $row['path'] ?>"><img style="float: left; margin:0 24px 10px 0;" src="/sites/default/files/miscellaneous/webinar/web_page_28_05_14.jpg"></a>
        <p style="color: #777; font-style: italic;"><strong><?php echo $row['field_date_webinar'] ?> (МСК)</strong></p>
        <p><strong><?php echo $row['field_fio_webinar'] ?></strong>, <?php echo $row['field_desc_head_webinar']; ?></p>
        <div style="overflow: hidden;clear:both" class="ptop12 pbot12 clear">
            <a href="<?php echo $row['path'] ?>" class="highlighted_link">Подробнее</a></div>
    </div>
<?php endforeach ?>