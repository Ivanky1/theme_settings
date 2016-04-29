<?php
// $Id: node.tpl.php,v 1.24 2010/12/01 00:18:15 webchick Exp $
?>
<div id="node-<?php print $node->nid; ?>" class="<?php print $classes; ?>"<?php print $attributes; ?>>

  <?php print $user_picture; ?>

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
         if (isset($social['und']['0']['value'])){
       if ($social['und']['0']['value']=='1'){
       ?>
       <div class="recomendation-block">
 <div class="recomendation-first">
  <div id="fb-root"></div>
  <script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) {return;}
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/ru_RU/all.js#xfbml=1";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
  <div class="fb-like" data-action="recommend" data-font="arial" data-layout="button_count" data-send="true" data-show-faces="false" data-width="250"></div>
 </div>
 <div class="recomendation-second">
  <a class="twitter-share-button" data-count="vertical" data-lang="ru" href="https://twitter.com/share">Tweet</a><script type="text/javascript" src="//platform.twitter.com/widgets.js"></script></div>
 <div class="recomendation-therd">
  <script type="text/javascript" src="//yandex.st/share/share.js" charset="utf-8"></script>
  <div class="yashare-auto-init" data-yasharel10n="ru" data-yasharequickservices="yaru,vkontakte,lj,friendfeed" data-yasharetype="icon"></div>
 </div>
 <div class="recomendation-bottom"></div>
</div>
       <?php
       }
      }
    ?>

  </div>

  <div class="clearfix">
    <?php if (!empty($content['links'])): ?>
      <div class="links"><?php print render($content['links']); ?></div>
    <?php endif; ?>

    <?php print render($content['comments']); ?>
  </div>

</div>
