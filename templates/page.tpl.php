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
 * Fortyfour theme specific defined theme settings (see README.txt in fortyfour
 * theme for more details)
 * - $fortyfour_page_wrapper: CSS class id to use when creating the page
 *   wrappers
 * - $fortyfour_header: Fortyfour header elements
 * - $fortyfour_header_menu: Fortyfour header navigation menu
 * - $fortyfour_subfooter_menu: Fortyfour subfooter navigation menu
 * - $fortyfour_footer_menu: Fortyfour theme footer navigation menu
 * - $fortyfour_use_microsite_banner: whether or not to use the microsite banner
 * - $path_to_fortyfour: Dynamically generates path to fortyfour theme.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see zen_preprocess_page()
 * @see template_process()
 */
?>

<?php if ($fortyfour_use_microsite_banner): ?>
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
	<span class="flag">President Barack Obama</span>
	</div><!--end banner-->
</div><!--End banner-bg-->
<?php endif; ?> <!-- endif fortyfour_use_microsite_banner -->

<div id="<?php echo $fortyfour_page_wrapper_class ?>-page" class="page-wrapper">
  <div class="center-on-page clearfix" id="page-inner">
<div id="wh-header" class="clearfix">
  <?php if ($fortyfour_header): ?>
    <?php print render($fortyfour_header); ?>
  <?php endif; ?>
  <?php if ($fortyfour_mainnav): ?>
    <?php print render($fortyfour_mainnav); ?>
  <?php endif; ?>
<?php if ($page['takeover']): ?>
  <div class="takeover"><?php print render($page['takeover']); ?></div>
<?php endif; ?>
<?php if ($page['header']): ?>
  <?php print render($page['header']); ?>
<?php endif; ?>
</div><!--wh-header-->

<?php if ($page['dropnav']): ?>
  <div id="drop-nav" class="collapse">
    <div id="navigation" class="toggle-nav hidden">
      <?php print render($page['dropnav']); ?>
    </div>
    <div class="handle-wrap"><a class="handle"></a></div>
  </div><!--drop-nav-->
<?php endif; ?>

  <div id="main">
    <?php if (user_is_logged_in()): ?>
      <?php print $messages; ?>
      <?php print render($tabs); ?>
      <?php print render($page['help']); ?>
      <?php if ($action_links): ?>
        <ul class="action-links"><?php print render($action_links); ?></ul>
      <?php endif; ?>
    <?php endif; ?>

    <div class="clear" id="<?php echo $fortyfour_page_wrapper_class ?>-outer">
      <div class="clearfix" id="<?php echo $fortyfour_page_wrapper_class ?>-inner">

        <?php if ($page['left_rail']): ?>
          <aside class="left-rail">
            <?php print render($page['left_rail']); ?>
          </aside><!-- /.left-rail -->
        <?php endif; ?>

        <div id="content" class="column clearfix main-content" role="main">
          <?php # Print render($page['highlighted']); ?>
          <a id="main-content"></a>
          <?php print render($page['content']); ?>
        </div><!-- /#content -->

        <?php if ($page['right_rail']): ?>
          <aside class="right-rail">
            <?php print render($page['right_rail']); ?>
          </aside><!-- /.right-rail -->
        <?php endif; ?>

      </div><!-- /#$fortyfour_page_wrapper-inner -->
    </div><!-- /#$fortyfour_page_wrapper-outer -->
  </div><!-- /#main -->

<div class="bottom-divider"></div>
<div class="footer-wrap">
  <div class="footer-inner">
  <?php print render($page['footer']); ?>
  <div class="footer-bottom">
    <?php print render($page['bottom']); ?>
    <?php if ($fortyfour_footer): ?>
      <?php print render($fortyfour_footer); ?>
    <?php endif; ?>
    <?php if ($fortyfour_subfooter): ?>
      <?php print render($fortyfour_subfooter); ?>
    <?php endif; ?>
  </div>
  </div>
</div>

  </div><!--/center on page-->
</div><!--/petition-page -->
