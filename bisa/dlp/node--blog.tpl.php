<?php
    //print_r($node);
//field_marker_record_add
	$surname=db_query("SELECT `field_surname_value` FROM `field_data_field_surname` WHERE `entity_id`='".$node->uid."'; ")->fetchField();
 	$name=db_query("SELECT `field_name_value` FROM `field_data_field_name` WHERE `entity_id`='".$node->uid."'; ")->fetchField();
 	$company=db_query("SELECT `field_company_value` FROM `field_data_field_company` WHERE `entity_id`='".$node->uid."'; ")->fetchField();

    $q = db_select('field_data_field_flag_country_user', 'user');
    $q->innerJoin('file_managed', 'file', 'user.field_flag_country_user_fid  = file.fid');
    $q->condition('user.entity_id', $node->uid);
    $q->fields('file', array('uri'));
    $flag = $q->execute()->fetchField();

    $q = db_select('field_data_field_img_marker_record', 'img_marker');
    $q->innerJoin('file_managed', 'file', 'img_marker.field_img_marker_record_fid  = file.fid');
    if (isset($node->field_marker_record_add[LANGUAGE_NONE])) {
        $q->condition('img_marker.entity_id', $node->field_marker_record_add[LANGUAGE_NONE][0]['tid']);
    }
    $q->fields('file', array('uri'));
    $img_marker = $q->execute()->fetchField();

    $q = db_select('field_data_field_about_user', 'about_user');
    $q->innerJoin('users_roles', 'ur', 'ur.uid = about_user.entity_id');
    $q->condition('about_user.entity_id', $node->uid);
    $q->condition('ur.rid', 14);
    $q->fields('about_user', array('field_about_user_value'));
    $about = $q->execute()->fetchField();

 	$login=db_query("SELECT `name` FROM `users` WHERE `uid`='".$node->uid."'; ")->fetchField();
 	$blog_alias=db_query("SELECT `alias` FROM `url_alias` WHERE `source`='user/".$node->uid."';")->fetchField();
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
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?> taxonomy_blog"<?php print $attributes; ?>>

  <?php if ($page=='0') {?>

  <h2<?php print $title_attributes; ?> class="h2-title"><a href="<?php print $node_url; ?>"><?php print $title; ?></a></h2>
  <?php print render($title_suffix); ?>
	<div id="user-blog-info">
		<?php print $user_picture; ?>
		<div id="user-info">
    		<span class="submitted"><?php print $submitted ?></span>
    		<?php
    			$link_name=" <a href=\"/".$blog_alias."\">".$surname.' '.$name."</a>";
    		?>
    		<span class="user-name"><?php print t('Author').':'?><?php print $link_name?>, <?php print $company;?></span>
    		<div>

    			<?php if (!empty($node->field_blog_term) || !empty($node->field_type)) {?>
    				<span class="publish"><span><?php print t('Themes2').': '?></span>
    					<?php if (!empty($node->field_blog_term)){ print render($content['field_blog_term']);
    								if(!empty($node->field_type)) print('<span>, </span>');
    							}
    					print render($content['field_type']); ?>
    				</span>
    			<?php }?>
				<span class="comment-count"><a href="<?php print($url.'#comments')?>">(<?php print $comment_count?>)</a></span>
				<div class="fb-comments"><a href="<?php print($url.'#fb-comments')?>">(<span class="fb-comments-count" data-href="<?php print $url;?>"></span>)</a></div>
				<div class="rate">
                    <?php print rate_embed($node, '5star', RATE_COMPACT); ?>
                </div>

    		</div>
            <?php if($flag) : ?>
                <div class="flag_blogger"><?php print theme('image', array(
                        'path'       => $flag,
                    ));?></div>
            <?php endif ?>
            <?php if($img_marker) : ?>
                <div class="flag_blogger"><?php print theme('image', array(
                        'path'       => $img_marker,
                    ));?></div>
            <?php endif ?>
		</div>

	</div>
  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
      $new_content =  trim(strip_tags(preg_replace("/<img.*? \/>/","",render($content))));
      strlen($new_content);
      if ($new_content) {
          print $new_content;
      } elseif ($node->body['und'][0]['safe_summary']) {
            echo $node->body['und'][0]['safe_summary'];
      } else {
            $str = strip_tags($node->body['und'][0]['safe_value']);
            $str = substr($str,0,250);
            echo substr($str,0,strrpos($str,' '))."...";
      }


    ?>
  </div>
<?php }?>
  <?php if ($page=='1') {

  ?>
  <div class="node_blog_full">
  <?php print render($title_suffix); ?>
   <div id="user-blog-info">
		<?php print $user_picture; ?>
		<div id="user-info">
    		<span class="submitted"><?php print $submitted ?></span>
    		<?php

    			$link_name=" <a href=\"/".$blog_alias."\">".$surname.' '.$name."</a>";
    		?>
    		<span class="user-name"><?php print t('Author').':'?><?php print $link_name?>, <?php print $company;?></span>
    		<div>
    			<span class="comment-count"><span>(<?php print $comment_count?>)</span></span>
				<div class="fb-comments">(<span class="fb-comments-count" data-href="<?php print $url;?>"></span>)</div>
    			<?php if (!empty($node->field_blog_term) || !empty($node->field_type)) {?>
    				<span class="publish"><span><?php print t('Published in').': '?></span>
    					<?php if (!empty($node->field_blog_term)){ print render($content['field_blog_term']);
    								if(!empty($node->field_type)) print('<span>, </span>');
    							}
    					print render($content['field_type']);  ?>
    				</span>
    			<?php }?>
    		</div>
		</div>
       <?php if($flag) : ?>
           <div class="flag_blogger"><?php print theme('image', array(
                   'path'       => $flag,
                   'width'      => '70',
               ));?></div>
       <?php endif ?>
	</div>
  <div class="content clearfix"<?php print $content_attributes; ?>>
    <?php
      // We hide the comments and links now so that we can render them later.
      hide($content['comments']);
      hide($content['links']);
	  hide($content['field_tags_blog']);
      if ($about) {
          echo "<div class='about-node-author'> <div class='field-label'><b>Об авторе:&nbsp;</b></div>$about</div>";
      }
      if ($node->uid == 9816) {
          hide($content['field_blog_source']);
          echo '<div class="field field-name-field-blog-source field-type-text field-label-inline clearfix">
          <div class="field-label"><a href="'.$node->field_blog_source[LANGUAGE_NONE][0]['value'].'">Оригинал</a></div>
          </div><br/>';
      }
	  print render($content);

    ?>
      <div class="tags"><?php if ($node->field_tags_blog) print render($content['field_tags_blog']); ?></div>

  </div>

<div class="clearfix">
    <?php if ($node->status == 1) : ?>
        <?php if (!empty($content['links']['blog'])): ?>
          <div class="links-blog"><?php print render($content['links']['blog']); ?></div>
        <?php endif; ?>
        <?php if (!empty($content['links']['statistics'])): ?>
            <div class="links-statistics"><?php print render($content['links']['statistics']) ; ?></div>
        <?php endif; ?>

        <!-- Комментарии FB -->
        <div id="soc_link"></div>
        <?php //$block = module_invoke('block', 'block_view',107 );
              // echo render($block['content']); ?>

        <?php if (!empty($content['links']['comment'])): ?>
          <div class="links-comment"><?php print render($content['links']['comment']); ?></div>
        <?php endif; ?>
        <?php $block = module_invoke('block', 'block_view',14 );
              echo render($block['content']); ?>
    <?php endif ?>


</div>

      <script>
          (function($) {
              Drupal.behaviors.block_custom_ajax = {
                  attach: function() {
                      $(window).bind("load", function() {
                          var myUrl = '/ajax-block-custom/nojs'
                          var ajax = new Drupal.ajax(false, '#soc_link', {url : myUrl});
                          ajax.eventResponse(ajax, {});
                      })
                  }
              }
          }) (jQuery);
      </script>
</div>
  <?php }?>
</div>
