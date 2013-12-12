<?php

/**
 * @file
 * Template file for the fortyfour base theme.
 */

/**
 * Override or insert variables into the page template.
 */
function fortyfour_process_page(&$variables) {
  _fortyfour_primary_layout_setup($variables);
}

/**
 * Override or insert variables into the maintenace page template.
 */
function fortyfour_process_maintenance_page(&$variables) {
  _fortyfour_primary_layout_setup($variables);
}

/**
 * Load template asset variables from theme_settings if locally modified.
 */
function _fortyfour_primary_layout_setup(&$variables) {
  $variables['fortyfour_use_microsite_banner'] = _fortyfour_get_use_microsite_banner();

  $variables['fortyfour_page_wrapper_class'] = _fortyfour_get_page_wrapper();

  if (theme_get_setting('fortyfour_use_whitehouse_header')) {
    $variables['fortyfour_header']['#theme'] = 'fortyfour_header';
  }
  else {
    $variables['fortyfour_header'] = FALSE;
  }

  if (theme_get_setting('fortyfour_use_whitehouse_mainnav')) {
    $variables['fortyfour_mainnav']['#theme'] = 'fortyfour_mainnav';
  }
  else {
    $variables['fortyfour_mainnav'] = FALSE;
  }

  if (theme_get_setting('fortyfour_use_whitehouse_footer')) {
    $variables['fortyfour_footer']['#theme'] = 'fortyfour_footer';
  }
  else {
    $variables['fortyfour_footer'] = FALSE;
  }

  if (theme_get_setting('fortyfour_use_whitehouse_subfooter')) {
    $variables['fortyfour_subfooter']['#theme'] = 'fortyfour_subfooter';
  }
  else {
    $variables['fortyfour_subfooter'] = FALSE;
  }
}

/**
 * Provided default fortyfour_header.
 *
 * @return HTML
 *   Returns HTML.
 */
function _fortyfour_get_page_wrapper() {
  // Check for user-defined page wrapper.
  if (!$fortyfour_page_wrapper = theme_get_setting('fortyfour_page_wrapper')) {

    // If no user-defined page wrapper exists, check to see if an included...
    // module is proving defaults (this is useful for implementations like...
    // petitions)
    !$fortyfour_page_wrapper = variable_get('fortyfour_page_wrapper', 'whitehouse');
  }

  return $fortyfour_page_wrapper;
}

/**
 * Provided default fortyfour_get_use_microsite_banner.
 *
 * @return HTML
 *   Returns HTML.
 */
function _fortyfour_get_use_microsite_banner() {
  // Check for user-defined header.
  if (!$fortyfour_use_microsite_banner = theme_get_setting('fortyfour_use_microsite_banner')) {
    // If no user-defined header exists, check to see if an included module is
    // providing defaults (this is useful for implmentations like petitions).
    $fortyfour_use_microsite_banner = variable_get('fortyfour_use_microsite_banner', FALSE);
  }
  return $fortyfour_use_microsite_banner;
}

/**
 * Implements hook_theme().
 */
function fortyfour_theme($existing, $type, $theme, $path) {
  return array(
    'fortyfour_header' => array(
      'template' => 'fortyfour-header',
      'variables' => array(),
      'path' => $path . '/templates',
    ),
    'fortyfour_mainnav' => array(
      'template' => 'fortyfour-mainnav',
      'variables' => array(),
      'path' => $path . '/templates',
    ),
    'fortyfour_footer' => array(
      'template' => 'fortyfour-footer',
      'variables' => array(),
      'path' => $path . '/templates',
    ),
    'fortyfour_subfooter' => array(
      'template' => 'fortyfour-subfooter',
      'variables' => array(),
      'path' => $path . '/templates',
    ),
  );
}

/**
 * Implement theme_preprocess_hook ().
 *
 * Add path_to_fortyfour variable to all template files.
 */
function fortyfour_preprocess(&$variables, $hook) {
  global $base_url;
  $variables['path_to_fortyfour'] = $base_url . '/' . drupal_get_path('theme', 'fortyfour');
}
