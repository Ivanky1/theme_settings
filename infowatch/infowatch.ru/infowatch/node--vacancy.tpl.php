<?php
// $Id: node.tpl.php,v 1.24 2010/12/01 00:18:15 webchick Exp $
?>
<?php if ($page == 0){ ?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if (!$page): ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php endif; ?>
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      print render($content);
    ?>
  </div>
  </div>
  
<?php }?>
<?php if ($page == 1){ ?>
<?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
         hide($content['comments']);
      hide($content['links']);
      $vacancy_href = "/node/2371?vacancy={$node->title}&id={$node->field_vacancy_id[LANGUAGE_NONE][0]['value']}";
      $oldContent = render($content);
      $newContent = preg_replace('/(<a.*href=")\/node\/2371.*(".*>.*<\/a>)/', "$1$vacancy_href$2", $oldContent);
      print $newContent;
    ?>
  </div>
  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links"><?php print render($content['links']); ?></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
<?php }?>
