<?php
/**
 * @file
 * Zen theme's implementation to display a single Drupal page.
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
 * - $secondary_menu_heading: The title of the menu used by the secondary links.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $fortyfour_president: The theme setting for the president's name.
 * - $learn_more_video: The html for a link to a video or link for a model.
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
 * - $page['header']: Items for the header region.
 * - $page['navigation']: Items for the navigation region, below the main menu (if any).
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['highlighted']: Items for the highlighted content region.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['footer']: Items for the footer region.
 * - $page['bottom']: Items to appear at the bottom of the page below the footer.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

<?php
  // Regions that needs rendered first so we know if it exists or not.
  $sidebar_first  = render($page['sidebar_first']);
  $sidebar_second = render($page['sidebar_second']);
  $takeover  = render($page['takeover']);
  $navigation = render($page['navigation']);
?>

<div class="banner-bg">
  <div id ="banner" role="banner" class="region-banner clearfix">
    
    <!-- Use Secondary Links for external Links to other WH.gov sites-->
    <!--<a id="return" href="#">Whitehouse.gov</a>-->
      <?php if ($secondary_menu): ?>
      <nav id="secondary-menu" role="navigation">
        <?php print theme('links__system_secondary_menu', array(
          'links' => $secondary_menu,
          'attributes' => array(
            'class' => array('links' , 'clearfix'),
          ),
          'heading' => array(
            'text' => $secondary_menu_heading,
            'level' => 'h2',
            'class' => array('menu-title', 'arrow-down'),
          ),
        )); ?>
    </nav>
    <?php endif; ?>
    <!-- /external links menu-->

    <!-- Name of the President -->
    <?php print theme('president_header', array('president' => $fortyfour_president)); ?>
  </div>
</div>
<div class="header-wrap">
<?php if ($takeover): ?>
<div class="takeover">
  <?php print $takeover; ?>
</div>
<?php endif; ?>
  <header id="header" role="banner">
    <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home" id="logo" class="logo">Economic Dashboard</a>
    <?php if ($site_name || $site_slogan): ?>
      <hgroup id="name-and-slogan">
        <?php if ($site_name): ?>
          <h1 id="site-name">
            <a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>" rel="home"><span><?php print $site_name; ?></span></a>
          </h1>
        <?php endif; ?>

        <?php if ($site_slogan): ?>
          <h2 id="site-slogan"><?php print $site_slogan; ?></h2>
        <?php endif; ?>
      </hgroup><!-- /#name-and-slogan -->
    <?php endif; ?>
    <div class="seal"><img src="<?php print $theme_path; ?>/images/seal.png"/></div>
    <!-- Learn more video -->
    <?php print $learn_more_video; ?>
  </header>
</div>
<div id="main-nav" class="collapse">
  
  <div id="navigation" class="toggle-nav hidden">
    <?php if ($main_menu): ?>
      <nav id="main-menu" role="navigation">
        <?php
        // This code snippet is hard to modify. We recommend turning off the
        // "Main menu" on your sub-theme's settings form, deleting this PHP
        // code block, and, instead, using the "Menu block" module.
        // @see http://drupal.org/project/menu_block
        print theme('links__system_main_menu', array(
          'links' => $main_menu,
          'attributes' => array(
            'class' => array('links', 'inline', 'clearfix'),
          ),
          'heading' => array(
            'text' => t('Main menu'),
            'level' => 'h2',
            'class' => array('element-invisible'),
          ),
        )); ?>
      </nav>
    <?php endif; ?>
    <?php if ($navigation): ?>
      <?php print $navigation; ?>
    <?php endif; ?>
  </div>
  
  <div class="handle-wrap"><a class="handle">Menu</a></div>
</div><!--main nav-->
<div id="page">  
  <?php print render($page['header']); ?>
  
  <div id="main" class="clearfix">
    <?php if (user_is_logged_in()): ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
    <?php endif; ?>
  <div id="content" class="column clearfix" role="main">
    <?php print render($page['highlighted']); ?>
    <a id="main-content"></a>
    <?php print render($page['content']); ?>
  </div><!-- /#content -->

  <?php if ($sidebar_first || $sidebar_second): ?>
    <aside class="sidebars">
      <?php print $sidebar_first; ?>
      <?php print $sidebar_second; ?>
    </aside><!-- /.sidebars -->
  <?php endif; ?>

  </div><!-- /#main -->
</div><!-- /#page -->
<div class="bottom-divider"></div>
<div class="footer-wrap">
  <div class="footer-inner">
  <?php print render($page['footer']); ?>
  <div class="footer-bottom">
    <?php print render($page['bottom']); ?>
  </div>
  </div>
</div>
