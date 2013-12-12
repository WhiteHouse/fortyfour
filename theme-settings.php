<?php

/**
 * @file
 * Theme setting callbacks for the fortyfour base theme.
 */

require_once drupal_get_path('theme', 'fortyfour') . '/template.php';

/**
 * Implements hook_form_system_theme_settings_alter().
 */
function fortyfour_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL) {

  // Get headers and footer values.
  // - $fortyfour_page_wrapper
  // - $fortyfour_header
  // - $fortyfour_header_menu
  // - $fortyfour_footer_menu
  // - $fortyfour_subfooter_menu
  // - $fortyfour_use_microsite_banner
  $fortyfour_page_wrapper = _fortyfour_get_page_wrapper();
  $fortyfour_use_microsite_banner = _fortyfour_get_use_microsite_banner();

  $form['fortyfour_general'] = array(
    '#type' => 'fieldset',
    '#title' => t('Forty Four: General Assets'),
    '#collapsible' => TRUE,
    '#weight' => -5,
  );

  $form['fortyfour_general']['description'] = array(
    '#type' => 'markup',
    '#title' => t('Default Settings'),
    '#collapsible' => TRUE,
    '#weight' => -2,
  );

  $form['fortyfour_general']['fortyfour_page_wrapper'] = array(
    '#type' => 'textfield',
    '#title' => t('CSS Class name for the page wrapper'),
    '#description' => t('Check this to default to the built-in configuration for these settings (for migration purposes) - var: $fortyfour_page_wrapper'),
    '#default_value' => $fortyfour_page_wrapper,
    '#weight' => 0,
  );

  $form['fortyfour_menus'] = array(
    '#type' => 'fieldset',
    '#title' => t('Forty Four: Header & Footer Assets'),
    '#collapsible' => TRUE,
    '#weight' => -4,
  );

  $form['fortyfour_menus']['description'] = array(
    '#type' => 'markup',
    '#title' => t('Default Settings'),
    '#collapsible' => TRUE,
    '#weight' => -2,
  );

  $form['fortyfour_menus']['fortyfour_use_whitehouse_header'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use approved White House header asset.'),
    '#default_value' => theme_get_setting('fortyfour_use_whitehouse_header'),
  );

  $form['fortyfour_menus']['fortyfour_use_whitehouse_mainnav'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use approved White House main navigation asset.'),
    '#default_value' => theme_get_setting('fortyfour_use_whitehouse_mainnav'),
  );

  $form['fortyfour_menus']['fortyfour_use_whitehouse_footer'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use approved White House footer asset.'),
    '#default_value' => theme_get_setting('fortyfour_use_whitehouse_footer'),
  );

  $form['fortyfour_menus']['fortyfour_use_whitehouse_subfooter'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use approved White House sub-footer asset.'),
    '#default_value' => theme_get_setting('fortyfour_use_whitehouse_subfooter'),
  );

  $form['fortyfour_shared'] = array(
    '#type' => 'fieldset',
    '#title' => 'Forty Four: Settings for Shared Elements',
    '#collapsible' => TRUE,
    '#weight' => -3,
  );

  $form['fortyfour_shared']['description'] = array(
    '#type' => 'markup',
    '#title' => t('Settings for Shared Elements'),
    '#collapsible' => TRUE,
    '#weight' => 0,
  );

  $form['fortyfour_shared']['fortyfour_use_microsite_banner'] = array(
    '#type' => 'checkbox',
    '#title' => t('Use shared banner on Forty Four site'),
    '#default_value' => $fortyfour_use_microsite_banner,
  );

}
