<?php
/**
 * @file
 * Returns the HTML for a single Drupal page.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728148
 *
 * This is a "single region" page template, delegating responsibility for layout
 * to Panels layout plugins, node template files (where not panelized), and custom page callbacks.
 *
 * Available variables provided by ThinSkin:
 * - $page_manager_control: NULL if not under Page Manager (Panels) control. Not
 *   NULL if controlled by Panels. NOTE: The assumption here is that pages under
 *   Page Manager control will include things like $tabs and $messages via
 *   Panels, wherever these elements should be included in the page.
 */
?>

<!-- !$page_manager_control: Only show these things if the page isn't a node under the control of page manager. -->
<?php if(!$page_manager_control): ?>

  <!-- $messages: HTML for status and error messages. Should be displayed prominently. -->
  <?php if($messages): ?>
    <div class="clearfix messages">
      <?php print render($messages); ?>
    </div>
  <?php endif; ?>
  <!-- /$messages -->

  <!-- $tabs (array): Tabs linking to any sub-pages beneath the current page (e.g., the view and edit tabs when displaying a node). -->
  <?php if($tabs): ?>
    <div class="clearfix tabs">
      <?php print render($tabs); ?>
    </div>
  <?php endif; ?>
  <!-- /$tabs -->

<?php endif; ?>
<!-- /!$page_manager_control -->

<!-- Main page content -->
<section id="page">
  <?php print render($page['content']); ?>
</section>
<!-- /Main page content -->
