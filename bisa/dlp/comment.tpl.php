<?php
$surname=db_query("SELECT `field_surname_value` FROM `field_data_field_surname` WHERE `entity_id`='".$comment->uid."'; ")->fetchField();
$name=db_query("SELECT `field_name_value` FROM `field_data_field_name` WHERE `entity_id`='".$comment->uid."'; ")->fetchField();
$user_url=db_query("SELECT `alias` FROM `url_alias` WHERE `source`='user/".$comment->uid."';")->fetchField();
$url="<a href='/".$user_url."'>".$surname." ".$name."</a>";
if (($surname=='') && ($name=='')){
    $surname=t('Anonim');
    $name='';
    $url=$surname;
}

?>
<div class="<?php print $classes . ' ' . $zebra; ?>"<?php print $attributes; ?>>

    <div class="clearfix">
        <?php print $picture ?>
        <span class="submitted"><?php print (date('d.m.y',$comment->created).' - '.$url);  ?></span>

        <?php if ($new): ?>
            <span class="new"><?php print drupal_ucfirst($new) ?></span>
        <?php endif; ?>



        <div class="content"<?php print $content_attributes; ?>>
            <?php hide($content['links']); print render($content); ?>
            <?php if ($signature): ?>
                <div class="clearfix">
                    <div>—</div>
                    <?php print $signature ?>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php print render($content['links']) ?>
</div>
