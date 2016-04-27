<?php
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print render($title_prefix); ?>
  <?php if ($page=='0') {?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>
  <?php
  if ($comment_count!='0'){?>
	<span class="comment-count">(<?php print $comment_count?>)</span>
	<?php }?>
  <div class="rate"><?php
	print rate_embed($node, '5star', RATE_COMPACT);
  ?>
  </div>
  

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);	       
	  print render($content);
    ?>
  </div>  
  <?php }?>
  <?php if ($page=='1') {?>
  
  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);	    
	  hide($content['field_tags_blog']);	  
	  print render($content);	  
    ?>
  </div>
  <div class="tags"><?php if ($node->field_tags_blog) print render($content['field_tags_blog']); ?></div>
<div class="clearfix">

    <?php $block = module_invoke('block', 'block_view',107 );
    echo render($block['content']); ?>

    <?php if (!empty($content['links']['comment'])): ?>
      <div class="links-comment"><?php print render($content['links']['comment']); ?></div>
    <?php endif; ?>

    <?php $block = module_invoke('block', 'block_view',14 );
    echo render($block['content']); ?>
	
	<?php if (!empty($content['links']['statistics'])): ?>
      <div class="links-statistics"><?php print render($content['links']['statistics']); ?></div>
    <?php endif; ?>	
</div>
   
  
  <?php }?>

</div>
