<?php

	$surname=db_query("SELECT `field_surname_value` FROM `field_data_field_surname` WHERE `entity_id`='".$node->uid."'; ")->fetchField();
 	$name=db_query("SELECT `field_name_value` FROM `field_data_field_name` WHERE `entity_id`='".$node->uid."'; ")->fetchField(); 
	$node_alias=db_query("SELECT `alias` FROM `url_alias` WHERE `source` = 'node/".$node->nid."'; ")->fetchField();
	$url="http://bis-expert.ru/".$node_alias; 	
 	if (isset($node->comment_count)){
		$comment_count = $node->comment_count;
	}
	else{
		$comment_count='0';
	}
 	global $user;
 	
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php if ($page=='0') {?>
  
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
     // print render($content['links']['flag']);
	  print render($content);	  
    ?>
  </div>

  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links"><?php print render($content['links']); ?></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
 </div>
<?php }?>
  <?php if ($page=='1') {

  ?>
  <?php print render($title_suffix); ?>
   <div id="user-presentation-info">		
		<div id="presentation-info1">		
    		<?php print render($content['field_presentations_type']);?>
			<?php print render($content['field_presentations_author']);?>
			<?php print render($content['field_presentations_event']); ?>
		</div>
    	<div id="presentation-info2">
			<?php print render($content['field_presentations_time']);?>
    		<span class="comment-count">(<?php print $comment_count?>)</span>
			<div class="fb-comments">(<span class="fb-comments-count" data-href="<?php print $url;?>"></span>)</div>
    	</div>
	</div>
  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);	
	  hide($content['field_tags_blog']);
	  print render($content);	  
    ?>
  </div>

<div class="clearfix">	
	<?php if (!empty($content['links']['comment'])): ?>
      <div class="links-comment"><?php print render($content['links']['comment']); ?></div>
    <?php endif; ?>
	
	<div class="tags"><?php print render($content['field_tags_blog']); ?></div>
	
	<?php if (!empty($content['links']['statistics'])): ?>
      <div class="links-statistics"><?php print render($content['links']['statistics']); ?></div>
    <?php endif; ?>
	
	</div>	 
  
  <?php }?>

