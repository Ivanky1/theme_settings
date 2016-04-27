<?php

?>
  <div id="wrapper">
    <div id="container" class="clearfix">

      <div id="header">
        <?php print render($page['header_top']); ?>

      </div> <!-- /#header -->
      <?php print render($page['header']); ?>
       <?php if ($page['highlighted']): ?><div id="highlighted">
        <?php print $messages; ?>
          <?php print render($page['help']); ?>
       <?php print render($page['highlighted']); ?></div><?php endif; ?>

      <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="sidebar">
          <?php print render($page['sidebar_first']); ?>
        </div>
      <?php endif; ?>

      <div id="center"><div id="squeeze" class="front">
          <a id="main-content"></a>
          <?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?>
            <h1<?php print $tabs ? ' class="with-tabs"' : '' ?>><?php print $title ?></h1>
          <?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($tabs2); ?>

          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <div class="clearfix">
          <?php if ($page['content_top']): ?><div id="content-top"><?php print render($page['content_top']); ?></div><?php endif; ?>

            <?php if ($page['content_bottom']): ?><div id="content-bottom"><?php print render($page['content_bottom']); ?></div><?php endif; ?>
          </div>


     </div></div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->
            <?php if ($page['sidebar_second']): ?>
        <div id="sidebar-second" class="sidebar">
          <?php print render($page['sidebar_second']); ?>
        </div>
      <?php endif; ?>


		 <div id="page-bottom">
          <?php print render($page['p_bottom']); ?>
        </div>
		</div> <!-- /#container -->
     <?php print render($page['footer']); ?>
  </div> <!-- /#wrapper -->
