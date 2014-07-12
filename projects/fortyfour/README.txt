BUILD A THEME WITH ZEN
----------------------

The base Zen theme is designed to be easily extended by its sub-themes. You
shouldn't modify any of the CSS or PHP files in the zen/ folder; but instead you
should create a sub-theme of zen which is located in a folder outside of the
root zen/ folder. The examples below assume zen and your sub-theme will be
installed in sites/all/themes/, but any valid theme directory is acceptable
(read the sites/default/default.settings.php for more info.)

  Why? To learn why you shouldn't modify any of the files in the zen/ folder,
  see https://drupal.org/node/245802


*** IMPORTANT NOTE ***
*
* In Drupal 7, the theme system caches which template files and which theme
* functions should be called. This means that if you add a new theme,
* preprocess or process function to your template.php file or add a new template
* (.tpl.php) file to your sub-theme, you will need to rebuild the "theme
* registry." See https://drupal.org/node/173880#theme-registry
*
* Drupal 7 also stores a cache of the data in .info files. If you modify any
* lines in your sub-theme's .info file, you MUST refresh Drupal 7's cache by
* simply visiting the Appearance page at admin/appearance.
*


 1. Setup the location for your new sub-theme.

    Copy the STARTERKIT folder out of the zen/ folder and rename it to be your
    new sub-theme. IMPORTANT: The name of your sub-theme must start with an
    alphabetic character and can only contain lowercase letters, numbers and
    underscores.

    For example, copy the sites/all/themes/zen/STARTERKIT folder and rename it
    as sites/all/themes/foo.

      Why? Each theme should reside in its own folder. To make it easier to
      upgrade Zen, sub-themes should reside in a folder separate from the base
      theme.

 2. Setup the basic information for your sub-theme.

    In your new sub-theme folder, rename the STARTERKIT.info.txt file to include
    the name of your new sub-theme and remove the ".txt" extension. Then edit
    the .info file by editing the name and description field.

    For example, rename the foo/STARTERKIT.info file to foo/foo.info. Edit the
    foo.info file and change "name = Zen Sub-theme Starter Kit" to "name = Foo"
    and "description = Read..." to "description = A Zen sub-theme".

      Why? The .info file describes the basic things about your theme: its
      name, description, features, template regions, CSS files, and JavaScript
      files. See the Drupal 7 Theme Guide for more info:
      https://drupal.org/node/171205

    Then, visit your site's Appearance page at admin/appearance to refresh
    Drupal 7's cache of .info file data.

 3. Choose your preferred page layout method or grid system.

    By default your new sub-theme is using a responsive layout. If you want a
    fixed layout for your theme, delete the unneeded "responsive" and
    "responsive-rtl" css/sass files and edit your sub-theme's styles.css
    or styles.scss file and replace the reference to "responsive" with
    "fixed".

    For example, edit foo/sass/styles.scss and change this line:
      @import "layouts/responsive";
    to:
      @import "layouts/fixed";

    Alternatively, if you are more familiar with a different CSS layout method,
    such as GridSetApp or 960.gs, etc., you can replace the
    "layouts/responsive" line in your styles.scss file with a line
    pointing at your choice of layout CSS file.

    Then, visit your site's Appearance page at admin/appearance to refresh
    Drupal 7's theme cache.

 4. Edit your sub-theme to use the proper function names.

    Edit the template.php and theme-settings.php files in your sub-theme's
    folder; replace ALL occurrences of "STARTERKIT" with the name of your
    sub-theme.

    For example, edit foo/template.php and foo/theme-settings.php and replace
    every occurrence of "STARTERKIT" with "foo".

    It is recommended to use a text editing application with search and
    "replace all" functionality.

 5. Set your website's default theme.

    Log in as an administrator on your Drupal site, go to the Appearance page at
    admin/appearance and click the "Enable and set default" link next to your
    new sub-theme.


Optional steps:

 6. Modify the markup in Zen core's template files.

    If you decide you want to modify any of the .tpl.php template files in the
    zen folder, copy them to your sub-theme's folder before making any changes.
    And then rebuild the theme registry.

    For example, copy zen/templates/page.tpl.php to foo/templates/page.tpl.php.

 7. Modify the markup in Drupal's search form.

    Copy the search-block-form.tpl.php template file from the modules/search/
    folder and place it in your sub-theme's template folder. And then rebuild
    the theme registry.

    You can find a full list of Drupal templates that you can override in the
    templates/README.txt file or https://drupal.org/node/190815

      Why? In Drupal 7 theming, if you want to modify a template included by a
      module, you should copy the template file from the module's directory to
      your sub-theme's template directory and then rebuild the theme registry.
      See the Drupal 7 Theme Guide for more info: https://drupal.org/node/173880

 8. Further extend your sub-theme.

    Discover further ways to extend your sub-theme by reading Zen's
    documentation online at:
      https://drupal.org/documentation/theme/zen
    and Drupal 7's Theme Guide online at:
      https://drupal.org/theme-guide
