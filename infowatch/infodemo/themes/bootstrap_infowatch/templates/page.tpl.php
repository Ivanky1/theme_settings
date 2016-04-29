<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * The doctype, html, head and body tags are not in this template. Instead they
 * can be found in the html.tpl.php template in this directory.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/bartik.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to access administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see bootstrap_preprocess_page()
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see bootstrap_process_page()
 * @see template_process()
 * @see html.tpl.php
 *
 * @ingroup themeable
 */
?>

<header id="navbar" role="banner" class="<?php //print $navbar_classes; ?>">
  <div class="container">
    <div class="navbar-collapse collapse" id="personal" style="padding-right:0;padding-left:0;">
      <nav role="navigation">
          <?php
          global $user;
          if ($user->uid !=0 ) {
              $menu = menu_navigation_links('menu-user-menu2');
              print theme('links', array(
                  'links' => $menu,
                  'attributes' => array('class' => array('menu','nav', 'navbar-nav')),
              ));
          }
          ?>
        <?php if (!empty($secondary_nav)): ?>
          <?php print render($secondary_nav); ?>
        <?php else : ?>
            <?php
              $links = [
                  'items1' => ['title'=>'Регистрация', 'href'=>'user/register'],
                  'items2' => ['title'=>'Вход','fragment' => 'myModalWindow', 'href'=> "", 'attributes' => ['class' => 'btn', 'data-toggle'=> 'modal'] ]
              ];
              print theme('links', array(
                'links' => $links,
                'attributes' => array('class' => array('menu','nav', 'navbar-nav','secondary')))
              );
            ?>
        <?php endif; ?>
        <?php if (!empty($page['navigation'])): ?>
          <?php  print render($page['navigation']); ?>
        <?php endif; ?>
      </nav>
    </div>
  </div>
  </header>

<div class="container">
  <div class="row">
    <div class="bl_logo_all col-md-5">
        <?php if ($logo): ?>
            <a class="logo pull-left" href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>">
                <img src="<?php print $logo; ?>" alt="<?php print t('Home'); ?>" />
            </a>
        <?php endif; ?>
    </div>
    <div class="col-md-7">
        <?php print render($page['top_logo']);  ?>
    </div>
  </div>
</div>
<div class="top_nav_my_might">
  <div class="container">
    <div class="row top_menu1">
      <?php print render($page['top_search_bl']);  ?>
      <nav class = "navbar navbar-default" role = "navigation">
          <div class = "navbar-header">
              <button type = "button" class = "navbar-toggle"
                      data-toggle = "collapse" data-target = "#top_menu_custom">
                  <span class = "sr-only">Toggle navigation</span>
                  <span class = "icon-bar"></span>
                  <span class = "icon-bar"></span>
                  <span class = "icon-bar"></span>
              </button>
          </div>
          <div class="collapse navbar-collapse" id="top_menu_custom">
              <?php print render($page['top_menu']);  ?>
          </div>
      </nav>
    </div>
  </div>
  <div class="top_search">
    <div class="container">
      <?php print render($page['top_search']);  ?>
    </div>
  </div>
</div>

<div>
  <div class="top_header_block">
    <div class="container">
      <?php if (!empty($title) ): ?>
          <h1 class="page-header"><?php print $title; ?></h1>
      <?php endif; ?>
        <?php if (isset($page['top_annotation']) && !empty($page['top_annotation']) ) :?>
            <div class='top_annotation'><?=render($page['top_annotation'])?></div>
        <?php elseif(isset($top_annotation)) : ?>
            <div class='top_annotation'><?=render($top_annotation);?></div>
        <?php endif ?>
     </div>
  </div>
    <?php print render($page['header']); ?>
</div>

<div class="container">
    <header role="banner" id="header-block" class="navbar navbar-default">
        <?php print render($page['header_block']); ?>
    </header> <!-- /#page-header -->
</div>
<div>
    <?php print render($page['top_content']); ?>
</div>
<?php if (!empty($page['highlighted'])): ?>
    <div class="highlighted jumbotron"><?php print render($page['highlighted']); ?></div>
<?php endif; ?>
<div class="main-container container">
    <section class="col-sm">
      <?php // if (!empty($breadcrumb)): print $breadcrumb; endif;?>
      <a id="main-content"></a>
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
    </section>
</div>

<div>
    <?php print render($page['bottom_content']); ?>
</div>
<footer class="footer">
  <?php print render($page['footer']); ?>
</footer>
<?php if (!empty($page['popup'])): ?>
    <div class="modal fade" id="myModalWindow">
        <?php echo render($page['popup']); ?>
    </div>
<?php endif; ?>
