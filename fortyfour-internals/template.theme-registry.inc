<?php
/**
 * @file
 * Contains the theme implementations provided by fortyfour.
 */

/**
 * Implementation of HOOK_theme().
 */
function _fortyfour_theme(&$existing, $type, $theme, $path) {
  $theme_hooks = array(
    'president_header' => array(
      'variables' => array('president' => NULL),
    ),
    'learn_more_video' => array(
      'variables' => array('url' => NULL, 'title' => NULL, 'description' => NULL, 'subtext' => NULL, 'link_text' => NULL),
    ),
  );

  return $theme_hooks;
}

/**
 * Implementation of theme_president_header().
 *
 * @param $variables
 *   An array of variables to pass to the the theme template.
 * @return string
 *   The HTML result of the themeing.
 */
function fortyfour_president_header($variables) {
  return "<span class='flag'>" . $variables['president'] . "</span>";
}


function fortyfour_learn_more_video($variables) {
  // Setup the colorbox JS Settings.
  $title = '<h2>' . $variables['title'] . '</h2>';
  $description = '<p>' . $variables['description'] . '</p>';
  $video = '<iframe width="461" height="260" src="' .  $variables['url'] . '"></iframe>';
  $subtext = '<p class="sub-video">'. $variables['subtext'] .'</p>';
  $modal = '<div class="intro-modal">' . $title . $description . $video . $subtext . '</div>';

  // Add the settings for the click handler.
  watchdog('ben', $modal);
  drupal_add_js(array('learnMoreVideo' => array('data' => $modal)), 'setting');

  // Add the click handler.
  drupal_add_js(drupal_get_path('theme', 'fortyfour') . '/js/learn-more-video.js', array('group' => JS_THEME));

  // Return the html that will actually appear on the page.
  return '<a class="dash-info" href="#">' . $variables['link_text'] . '</a>';
}
