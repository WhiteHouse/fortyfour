<?php
/**
 * @file
 * views-view-unformatted.tpl.php
 * Default simple view template to display a list of rows.
 *
 * Additional Varialbles:
 * - $path_to_fortyfour: Dynamically generates path to fortyfour theme.
 *
 * @ingroup views_templates
 */
?>
<?php if (!empty($title)): ?>
  <h3><?php print $title; ?></h3>
<?php endif; ?>
<?php foreach ($rows as $id => $row): ?>
  <?php print $row; ?>
<?php endforeach; ?>
