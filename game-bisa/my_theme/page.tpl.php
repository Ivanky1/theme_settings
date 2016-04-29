<div id="wrapper-header">
    <div class="top_fon"></div>
    <div class="center_fon">
        <div class="container">
            <a target="_blank" href="http://bis-expert.ru" class="logo_bisa"> <img src="/<?=path_to_theme()?>/images/logo_bisa.gif"></a>
            <a target="_blank" href="http://www.infowatch.ru" class="logo_inf"><img src="/<?=path_to_theme()?>/images/logo_infowatch.gif"></a>
        </div>
    </div>
    <div class="bottom_fon">
        <div class="container">
            <div class="top_description">
                Совместный проект ассоциации <a target="_blank" href="http://bis-expert.ru">BISA</a> и компании <a target="_blank" href="http://www.infowatch.ru">InfoWatch</a>
            </div>
        </div>
    </div>

<?php if (!drupal_is_front_page() &&  drupal_get_path_alias($_GET['q']) != 'games/sadovnik') : ?>
    <div class="top_bg">
        <div class="header">
            <a href="/games/sadovnik"></a>
            <?php print render($page['header']); ?>
        </div>
        <?php if ($title): ?>
            <div class="container">
                <h1 class="title"><?php print $title ?></h1>
            </div>
        <?php endif; ?>
    </div>
<?php endif ?>
    <div class="clearfix"></div>
</div>
<div id="wrapper">

    <div id="container" class="clearfix">
       <div id="center">
           <div id="squeeze">
               <?php print render($title_prefix); ?>
               <?php print render($title_suffix); ?>
               <?php print $messages; ?>
               <?php if (!empty($tabs)): ?>
                   <?php print render($tabs); ?>
               <?php endif; ?>
               <?php if (!empty($action_links)): ?>
                   <ul class="action-links"><?php print render($action_links); ?></ul>
               <?php endif; ?>
               <?php print render($page['content']); ?>
               <div class="clearfix"></div>
      </div>
       </div>

    </div> <!-- /#container -->

    <div class="clearfix"></div>
    <?php if (empty($page['content_bottom'])) : ?>
        <div class="footer_pusher"></div>
    <?php endif ?>

  </div> <!-- /#wrapper -->
<?php if (!empty($page['content_bottom'])) : ?>
    <div id="wrapper-bottom">
        <div class="container" class="clearfix">
            <?php print render($page['content_bottom']); ?>
        </div>
        <div class="clearfix"></div>
        <div class="footer_pusher"></div>
    </div>
<?php endif ?>

  <div class="footer">
      <div class="container">
          <div class="clearfix"></div>
          <?php if (!empty($page['footer'])): ?>
              <?php print render($page['footer']); ?>
          <?php endif; ?>
      </div>
  </div>
<script>
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-71797863-2', 'auto');
    ga('send', 'pageview');

</script>
