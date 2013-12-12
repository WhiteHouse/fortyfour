<?php
/**
 * @file
 * views-view-list.tpl.php
 * Default simple view template to display a list of rows.
 *
 * - $title : The title of this group of rows.  May be empty.
 * - $options['type'] will either be ul or ol.
 *
 * Additional Variables:
 * - $path_to_fortyfour: Dynamically generates path to fortyfour theme.
 * @ingroup views_templates
 */
?>
<?php print $wrapper_prefix; ?>
  <?php if (!empty($title)) : ?>
    <h3><?php print $title; ?></h3>
  <?php endif; ?>
  <?php
    $count = count($rows);
    $per_row = intval($count / 3);
    $remainder = intval($count - ($per_row * 2));
    $first_row = array_slice($rows, 0, ($per_row));
    $second_row = array_slice($rows, $per_row, $per_row);
    $third_row = array_slice($rows, ($per_row * 2), $remainder);
  ?>

<?php print $list_type_prefix; ?>
  <?php foreach ($first_row as $id => $row): ?>
    <li class="<?php print $classes_array[$id]; ?>"><?php print $row; ?></li>
  <?php endforeach; ?>
<?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>

<?php print $list_type_prefix; ?>
  <?php foreach ($second_row as $id => $row): ?>
    <li class="<?php print $classes_array[$id]; ?>"><?php print $row; ?></li>
  <?php endforeach; ?>
<?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>

<?php print $list_type_prefix; ?>
  <?php foreach ($third_row as $id => $row): ?>
    <li class="<?php print $classes_array[$id]; ?>"><?php print $row; ?></li>
  <?php endforeach; ?>
<?php print $list_type_suffix; ?>
<?php print $wrapper_suffix; ?>
