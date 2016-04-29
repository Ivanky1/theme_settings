<?php
// $Id: page.tpl.php,v 1.48 2010/11/20 04:03:51 webchick Exp $
?>

<div id="wrapper">
	<link href="/taxonomy/term/2/feed" title="RSS - News" type="application/rss+xml" rel="alternate">
	<link href="/taxonomy/term/3/feed" title="RSS - Leaks News" type="application/rss+xml" rel="alternate">    
	<link href="/taxonomy/term/4/feed" title="RSS - Analytics News" type="application/rss+xml" rel="alternate"> 
	<div id="header-out">
		 <?php print render($page['header']); ?>
			<div id="header">
				<div id="logo-floater">
	        		<?php if ($logo || $site_title): ?>
	          			<?php if ($title): ?>
	            			<div id="branding"><strong><a href="<?php print $front_page ?>">
	            				<?php if ($logo): ?>
	              					<img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
	            				<?php endif; ?>
	            				<?php print $site_html ?>
	            				</a></strong>
	           				</div>
	          			<?php else: /* Use h1 when the content title is empty */ ?>
	            			<h1 id="branding"><a href="<?php print $front_page ?>">
	           				<?php if ($logo): ?>
	             				<img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
	           				<?php endif; ?>
	           				<?php print $site_html ?>
	            			</a></h1>
	        			<?php endif; ?>
	        		<?php endif; ?>
				</div>
			<?php if ($page['header_block']): ?><div id="header-block"><?php print render($page['header_block']); ?></div><?php endif; ?>
	       	<?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>       
			</div> <!-- /#header -->
	</div>  
    <div id="container" class="clearfix">
	   
	
		<?php if ($page['sidebar_first']): ?>
			<div id="sidebar-first" class="sidebar">
				<?php print render($page['sidebar_first']); ?>
			</div>
		<?php endif; ?>
	
		<div id="center" class="front"><div id="squeeze">          
			<a id="main-content"></a>
			<?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
			<?php print render($title_prefix); ?>       
			<?php print render($title_suffix); ?>
			<?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
			<?php print render($tabs2); ?>
			<?php print $messages; ?>
			<?php print render($page['help']); ?>
			<?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
			<?php print render($page['top_content']);?>
			<div class="clearfix">
				<?php print render($page['content']); ?>
			</div>
			<?php print $feed_icons ?>
		</div></div> <!-- /#squeeze, /#center -->
	  
		<?php if ($page['sidebar_second']): ?>
			<div id="sidebar-second" class="sidebar">
				<?php print render($page['sidebar_second']); ?>
			</div>
		<?php endif; ?>
	</div> <!-- /#container -->
	<div id="footer-blocks">
		<?php print render($page['bottom_content']); ?>
    </div>
    <div id="footer-blocks-rss">
		<?php print render($page['rss_blocks']); ?>
    </div>
     <?php print render($page['footer']); ?>
</div> <!-- /#wrapper -->
<!-- Yandex.Metrika counter -->
<div style="display:none;"><script type="text/javascript">
(function(w, c) {
    (w[c] = w[c] || []).push(function() {
        try {
            w.yaCounter5647981 = new Ya.Metrika({id:5647981,
                    clickmap:true,
                    trackLinks:true});
        }
        catch(e) { }
    });
})(window, "yandex_metrika_callbacks");
</script></div>
<script src="//mc.yandex.ru/metrika/watch_visor.js" type="text/javascript" defer="defer"></script>
<noscript><div><img src="//mc.yandex.ru/watch/5647981" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->