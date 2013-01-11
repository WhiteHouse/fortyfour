<?php
/**
 * Implements hook_form_system_theme_settings_alter().
 *
 * @param $form
 *   Nested array of form elements that comprise the form.
 * @param $form_state
 *   A keyed array containing the current state of the form.
 */
function fortyfour_form_system_theme_settings_alter(&$form, &$form_state, $form_id = NULL)  {
  // Work-around for a core bug affecting admin themes. See issue #943212.
  if (isset($form_id)) {
    return;
  }

  // Create the form using Forms API: http://api.drupal.org/api/7
  $form['fortyfour'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('Forty Four settings'),
  );
  $form['fortyfour']['fortyfour_president'] = array(
    '#type'          => 'textfield',
    '#title'         => t('President\'s Name'),
    '#default_value' => theme_get_setting('fortyfour_president'),
    '#description'   => t("This option sets the President's name next to the flag."),
  );

  $form['learn_more_video'] = array(
    '#type'          => 'fieldset',
    '#title'         => t('More Info Video Settings'),
  );
  $form['learn_more_video']['learn_more_video_url'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Video URL'),
    '#default_value' => theme_get_setting('learn_more_video_url'),
    '#description'   => t("The video url to load."),
  );
  $form['learn_more_video']['learn_more_video_title'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Video Title'),
    '#default_value' => theme_get_setting('learn_more_video_title'),
    '#description'   => t("The title of the video."),
  );
  $form['learn_more_video']['learn_more_video_description'] = array(
    '#type'          => 'textarea',
    '#title'         => t('Video Description'),
    '#default_value' => theme_get_setting('learn_more_video_description'),
    '#description'   => t("The description of the video."),
  );
  $form['learn_more_video']['learn_more_video_subtext'] = array(
    '#type'          => 'textarea',
    '#title'         => t('Video Subtext'),
    '#default_value' => theme_get_setting('learn_more_video_subtext'),
    '#description'   => t("The text shown after or below the video."),
  );
  $form['learn_more_video']['learn_more_video_link_text'] = array(
    '#type'          => 'textfield',
    '#title'         => t('Video Link'),
    '#default_value' => theme_get_setting('learn_more_video_link_text'),
    '#description'   => t("The text for the link to the video."),
  );

  // Remove some of the base theme's settings.
  /* -- Delete this line if you want to turn off this setting.
  unset($form['themedev']['zen_wireframes']); // We don't need to toggle wireframes on this site.
  // */

  // We are editing the $form in place, so we don't need to return anything.
}
