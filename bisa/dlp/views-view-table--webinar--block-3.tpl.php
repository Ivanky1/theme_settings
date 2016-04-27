<p>&nbsp;</p>
<h2>
  Записи предыдущих вебинаров</h2>
<ul>
<?php foreach ($rows as $row) : ?>
    <li style="margin-bottom:25px;">
         <div><strong><a target="_blank" href="<?php echo $row['field_link_write_webinar']; ?>"><?php echo $row['title'] ?></a></strong></div>
        <div style="float: left;line-height: 36px;"><?php echo $row['field_date_webinar']; ?></div>
        <div class="soc_bl_item"><a class="soc_bl_elem vkontakte" onclick="Share.vkontakte('http://bis-expert.ru<?=$row['path']?>', '<?=$row['title']?>')">&nbsp;</a>
            <a class="soc_bl_elem facebook" onclick="Share.facebook('http://bis-expert.ru<?=$row['path']?>', '<?=$row['title']?>')">&nbsp;</a>
            <a class="soc_bl_elem odnoklassniki" onclick="Share.odnoklassniki('http://bis-expert.ru<?=$row['path']?>', '<?=$row['title']?>')">&nbsp;</a>
            <a class="soc_bl_elem twitter" onclick="Share.twitter('http://bis-expert.ru<?=$row['path']?>', '<?=$row['title']?>')">&nbsp;</a>
            <a class="soc_bl_elem in" onclick="Share.in('http://bis-expert.ru<?=$row['path']?>', '<?=$row['title']?>')">&nbsp;</a></div>
        <div style="clear:both;">Ведущий: <strong><?php echo $row['field_fio_webinar'] ?></strong>, <?php echo $row['field_profession_webinar'] ?></div>

    </li>
<?php endforeach ?>
</ul>