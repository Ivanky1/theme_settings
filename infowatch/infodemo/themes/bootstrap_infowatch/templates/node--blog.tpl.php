<?php
// $Id: node.tpl.php,v 1.24 2010/12/01 00:18:15 webchick Exp $
$surname=db_query("SELECT `field_fio_value` FROM `field_data_field_fio` WHERE `entity_id`='". $uid."'; ")->fetchField();
$jobtitle=db_query("SELECT `field_jobtitle_value` FROM `field_data_field_jobtitle` WHERE `entity_id`='". $uid."'; ")->fetchField();
?>
<?php if ($page == 0){ ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> col-lg-9 col-md-9 col-sm-12 col-xs-12 mbot35"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <?php if ($display_submitted): ?>
      <span class="submitted"><?php print $submitted ?></span>
    <?php endif; ?>
    <h4<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h4>
  <?php endif; ?>
  <?php print render($title_suffix); ?>


  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);  
    ?>
      <div class="views-field views-field-created">
          <span class="field-content"><?=format_date($node->created, 'medium', 'd F') ?></span>
      </div>

  </div>
  </div>
  
<?php }?>
<?php if ($page == 1){ ?>
<div class="clearfix col-lg-9 col-md-9 col-sm-12 col-xs-12">
<?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>
 <div class="author"><a href="/blog/<?php print $uid;?>"><?php print $surname.', '.$jobtitle?></a></div>
  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
         hide($content['comments']);
      hide($content['links']);
      print render($content);
     ?>
      <div class="views-field views-field-created">
          <span class="field-content"><?=format_date($node->created, 'medium', 'd F') ?></span>
      </div>
  </div>
  <div class="clearfix">
  <p>&nbsp;</p><!--
    <?php //if (!empty($content['links'])): ?>
      <div class="links"><?php //print render($content['links']); ?>
      <div><a href="/blog"><?php //print t('Company blog')?></a></div>
      </div>
    <?php //endif; ?>
    -->
    <?php print render($content['comments']); ?>
  </div>
</div>
<?php }?>
