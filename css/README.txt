ZEN'S STYLESHEETS
-----------------

Don't panic!

There are 11 CSS files in this sub-theme, but it's not as bad as it first seems:
- There are 5 CSS files whose names end in "-rtl.css". Those are CSS files
  needed to style content written in Right-to-Left languages, such as Arabic and
  Hebrew. If your website doesn't use such languages, you can safely delete all
  of those CSS files.
- There are 2 example layout stylesheets inside the "layouts" folder,
  "responsive.css" and "fixed.css", but only one of them is used at any time.
- One is just a print stylesheet!

That leaves just 4 CSS files!
- styles.css
- normalize.css
- layouts/responsive.css
- components/misc.css

Now go look in the styles.css file. That file simply includes (via @import) the
other files. It also shows how the files in your sub-theme can be categorized
with the SMACSS technique. http://smacss.com


Why not just one stylesheet?

- For performance reasons you should always have all of your CSS in a single
  file to minimize the number of HTTP requests the user's browser needs to do.
  Fortunately, Drupal has a "Aggregate and compress CSS" feature that will
  automatically combine all the CSS files from its modules and themes into one
  file. You can turn on that feature under "Bandwidth Optimization" on the page:
    Administration > Configuration > Development > Performance
  So Drupal allows us (if we want) to use more than one stylesheet file, but
  still serves all the styles in one file to our users.
- When developing a site using a single stylesheet, it can become unwieldy to
  scroll and find the place you need to edit. As a deadline becomes imminent,
  developers often start stuffing new styles at the bottom of the stylesheet,
  completely destroying any stylesheet organization.
- Instead of one monolithic stylesheet, Zen sub-themes' CSS files are organized
  into several smaller stylesheets. Once you learn the organization (described
  below) it becomes easier to find the right place to add new styles.
- Stylesheets are added in the order specified in the styles.css file. The
  default order of the stylesheets is designed to allow CSS authors to use the
  lowest specificity possible to achieve the required styling, with more general
  stylesheets being added first and more specific stylesheets added later.


ORDER AND PURPOSE OF DEFAULT STYLESHEETS
----------------------------------------

First off, if you find you don't like this organization of stylesheets, you are
free to change it; simply edit the @import declarations in your sub-theme's
styles.css file. This structure was crafted based on several years of experience
theming Drupal websites.

- styles.css:
  This is the only CSS file listed in your sub-theme's .info file. Its purpose
  is to @include all the other stylesheets in your sub-theme. When CSS
  aggregation is off, this file will be loaded by web browsers first before they
  begin to load the @include'd stylesheets; this results in a delay to load all
  the stylesheets, a serious front-end performance problem. However, it does
  make it easy to debug your website during development. To remove this
  performance problem, turn on Drupal's CSS aggregation after development is
  completed. See the note above about "Bandwidth Optimization".

- normalize.css:
  This is the place where you should set the default styling for all HTML
  elements and standardize the styling across browsers. If you prefer a specific
  HTML reset method, feel free to use it instead of normalize; just make sure
  you set all the styles for all HTML elements after you reset them. In SMACSS,
  this file contains all the "base rules". http://smacss.com/book/type-base

- layouts/responsive.css:
  Zen's default layout is based on the Zen Grids layout method. Despite the
  name, it is an independent project from the Zen theme. Zen Grids is an
  intuitive, flexible grid system that leverages the natural source order of
  your content to make it easier to create fluid responsive designs. You can
  learn more about Zen Grids at http://zengrids.com

  The responsive.css file is used by default, but these files are
  designed to be easily replaced. If you are more familiar with a different CSS
  layout method, such as GridSetApp, 960.gs, etc., you can replace the default
  layout with your choice of layout CSS file.

  In SMACSS, this file contains the "layout rules".
  http://smacss.com/book/type-layout

- layouts/fixed.css:
  This layout is based on the Zen Grids layout method, but uses a fixed pixel
  width. It is not included by default in your theme's .info file, but is
  provided as an option.

  In SMACSS, this file contains the "layout rules".
  http://smacss.com/book/type-layout

- components/misc.css:
  This file contains some common component styles needed for Drupal, such as:
  - Tabs: contains actual styling for Drupal tabs, a common Drupal element that
    is often neglected by site designers. Zen provides some basic styling which
    you are free to use or to rip out and replace.
  - Various page elements: page styling for the markup in page.tpl.php.
  - Blocks: styling for the markup in block.tpl.php.
  - Menus: styling for your site's menus.
  - Comments: styling for the markup in comment-wrapper.tpl.php and
    comments.tpl.php.
  - forms: styling for the markup in various Drupal forms.
  - fields: styling for the markup produced by theme_field().

  In SMACSS, this file contains "module rules". You can add additional files
  if you'd like to further refine your stylesheet organization. Just add them
  to the styles.css file. http://smacss.com/book/type-layout

- print.css:
  The print styles for all markup.

  In SMACSS, this file contains a media query state that overrides modular
  styles. This means it most closely related to "module rules".
  http://smacss.com/book/type-module

In these stylesheets, we have included just the classes and IDs needed to apply
a minimum amount of styling. To learn many more useful Drupal core selectors,
check Zen's online documentation: https://drupal.org/node/1707736


STYLES FOR INTERNET EXPLORER
----------------------------

Zen allows IE-specific styles using a method first described by Paul Irish at:
http://paulirish.com/2008/conditional-stylesheets-vs-css-hacks-answer-neither/

If you look at Zen's templates/html.tpl.php file, you will see the HTML tag that
will be used by your site. Using Microsoft's conditional comment syntax,
different HTML tags will be used for different versions of Internet Explorer.

For example, IE6 will see the HTML tag that has these classes: lt-ie7 lt-ie8
lt-ie9. If you need to write an IE6-specific rule, you can simply prefix the
selector with ".lt-ie7 " (should be read as "less than IE 7"). To write a rule
that applies to both IE6 and IE7, use ".lt-ie8 ":
  .someRule { /* Styles for all browsers */ }
  .lt-ie8 .someRule { /* Styles for IE6 and IE7 only. */ }

Many CSS authors prefer using IE "conditional stylesheets", which are
stylesheets added via conditional comments. If you would prefer that method, you
should check out the Conditional Stylesheets module:
https://drupal.org/project/conditional_styles


DRUPAL CORE'S STYLESHEETS
-------------------------

Note: Many of Zen's styles are overriding Drupal's core stylesheets, so if you
remove a declaration from them, the styles may still not be what you want since
Drupal's core stylesheets are still styling the element.
