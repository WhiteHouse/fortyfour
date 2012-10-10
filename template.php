<?php

/**
 * Override or insert variables into the page template.
 */
function fortyfour_process_page(&$variables) {
  _fortyfour_primary_layout_setup(&$variables);
}

function fortyfour_process_maintenance_page(&$variables) {
  _fortyfour_primary_layout_setup(&$variables);
}

function _fortyfour_primary_layout_setup(&$variables) {
  /* Load template asset variables from theme_settings if locally modified,
     otherwise from variable_get / strongarm export */
  
  $variables['fortyfour_use_microsite_banner'] = _fortyfour_get_use_microsite_banner();
  
  $variables['fortyfour_page_wrapper_class'] = _fortyfour_get_page_wrapper();

  $variables['fortyfour_header'] = array(
    '#theme' => 'fortyfour_header'
  );

  $variables['fortyfour_header_menu'] = array(
    '#theme' => 'fortyfour_mainnav'
  );
  
  $variables['fortyfour_footer_menu'] = array(
    '#theme' => 'fortyfour_footer'
  );
  
  $variables['fortyfour_subfooter_menu'] = array(
    '#theme' => 'fortyfour_subfooter'
  );
}

/**
 * Provided default fortyfour_header.
 *
 * @return
 *  HTML
 */
function _fortyfour_get_page_wrapper() {
  // Check for user-defined page wrapper
  if (!$fortyfour_page_wrapper = theme_get_setting('fortyfour_page_wrapper')) {

    // If no user-defined page wrapper exists, check to see if an included
    // module is proving defaults (this is useful for implementations like
    // petitions)
    !$fortyfour_page_wrapper = variable_get('fortyfour_page_wrapper', 'whitehouse');
  }

  return $fortyfour_page_wrapper;
}

/**
 * Provided default fortyfour_get_use_microsite_banner.
 *
 * @return
 *  HTML
 */
function _fortyfour_get_use_microsite_banner() {

  // Check for user-defined header.
  if (!$fortyfour_use_microsite_banner = theme_get_setting('fortyfour_use_microsite_banner')) {

    // If no user-defined header exists, check to see if an included module is
    // providing defaults (this is useful for implmentations like petitions).
    if (!$fortyfour_use_microsite_banner = variable_get('fortyfour_use_microsite_banner', FALSE)) {

      // If no module provides defaults, load defaults from default template
      // files and sets the variable
      $fortyfour_use_microsite_banner = FALSE;
      variable_set('fortyfour_use_microsite_banner', $fortyfour_use_microsite_banner);
    }
  }

  return $fortyfour_use_microsite_banner;
}
/**
 * Implementation of hook_theme()
 */
function fortyfour_theme($existing, $type, $theme, $path) {

  return array(
    'fortyfour_header' => array(
      'template' => 'fortyfour-header',
      'variables' => array(),
      'path' => drupal_get_path('theme', 'fortyfour').'/templates'
    ),
    'fortyfour_mainnav' => array(
      'template' => 'fortyfour-mainnav',
      'variables' => array(),
      'path' => drupal_get_path('theme', 'fortyfour').'/templates'
    ),
    'fortyfour_footer' => array(
      'template' => 'fortyfour-footer',
      'variables' => array(),
      'path' => drupal_get_path('theme', 'fortyfour').'/templates'
    ),
    'fortyfour_subfooter' => array(
      'template' => 'fortyfour-subfooter',
      'variables' => array(),
      'path' => drupal_get_path('theme', 'fortyfour').'/templates'
    )
  );
}
