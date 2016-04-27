<?php
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>
  <?php print render($title_prefix); ?>
  <?php if ($page=='0'){ ?>
    <h2<?php print $title_attributes; ?>><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  
  <?php print render($title_suffix); ?>

  <?php if ($display_submitted): ?>
    <span class="submitted"><?php print $submitted ?></span>
  <?php endif; ?>

  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.  
	hide($content['links']);	  
	  print render($content);	  
    ?>
  </div>
  
<?php }?>

<?php if ($page=='1'){ ?>  
  
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
     if (!$node->field_tags_blog) hide($content['field_tags_blog']);

	 global $user;
	 if ($user->uid=='0'){	 	 
		if(isset($node->field_private['und']['0']['value'])){
			if ($node->field_private['und']['0']['value']=='1'){
				print($node->body['und']['0']['summary']);
				$block = module_invoke('block', 'block_view', '93');
				print render($block['content']);
				$output = drupal_get_form('user_login_block');     
				print render($output);
			}
		}
		else{
				print render($content);	
		}
	 }		
	 else{

		 print render($content);

	 }
    print '<br/>';

    print l('Другие статьи', 'articles', array('attributes' => array('class' => 'more')));

    print '<br/>';
			
    ?>
  </div>

  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
        <?php $block = module_invoke('block', 'block_view',107 );
        echo render($block['content']);
        ?>
      <div class="links"><?php print render($content['links']); ?></div>
        <?php $block = module_invoke('block', 'block_view',14 );
        echo render($block['content']);
        ?>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>
<?php }?>
</div>
