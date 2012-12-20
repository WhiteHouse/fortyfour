ZEN'S STYLESHEETS
-----------------

Don't panic!

There are 22 CSS files in this sub-theme, but its not as bad as it first seems:
- The drupal7-reference.css is just a reference file and isn't used directly by
  your sub-theme. See below.
- There are 7 CSS files whose names end in "-rtl.css". Those are CSS files
  needed to style content written in Right-to-Left languages, such as Arabic and
  Hebrew. If your website doesn't use such languages, you can safely delete all
  of those CSS files.
- There are 2 example layout stylesheets in the layouts/ folder, but only one of
  them is used at any time.
- If you aren't using this sub-theme while doing wireframes of your site's
  functionality, you can remove wireframes.css from your sub-theme's .info file
  and delete the file as well.
- One is just a print stylesheet!

That leaves just 11 CSS files. (Okay, still quite a few, but better than 22.)

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
- Stylesheets are added in the order specified in your sub-theme's .info file.
  The default order of the stylesheets is designed to allow CSS authors to use
  the lowest specificity possible to achieve the required styling, with more
  general stylesheets being added first and more specific stylesheets added
  later.
- In addtion to following the normal CSS cascade, stylesheets are also organized
  relative to common Drupal template files. The most commonly used Drupal
  template files also have a corresponding stylesheet.


ORDER AND PURPOSE OF DEFAULT STYLESHEETS
----------------------------------------

First off, if you find you don't like this organization of stylesheets, you are
free to change it; simply edit the stylesheet declarations in your sub-theme's
.info file. This structure was crafted based on several years of experience
theming Drupal websites.

- normalize.css:
  This is the place where you should set the default styling for all HTML
  elements and standardize the styling across browsers. If you prefer a specific
  HTML reset method, feel free to use it instead of normalize.

- layouts/responsive-sidebars.css:
  Zen's default layout is based on the Zen Grids layout method. Despite the
  name, it is an independent project from the Zen theme. Zen Grids is an
  intuitive, flexible grid system that leverages the natural source order of
  your content to make it easier to create fluid responsive designs. You can
  learn more about Zen Grids at http://zengrids.com

  The responsive-sidebars.css file is used by default, but these files are
  designed to be easily replaced. If you are more familiar with a different CSS
  layout method, such as GridSetApp, 960.gs, etc., you can replace the default
  layout with your choice of layout CSS file.

- layouts/fixed-width.css:
  This layout is based on the Zen Grids layout method, but uses a fixed pixel
  width. It is not included by default in your theme's .info file, but is
  provided as an option.

- tabs.css:
  While most of the CSS rulesets in your sub-theme are guidelines without any
  actual properties, the tabs stylesheet contains actual styling for Drupal
  tabs, a common Drupal element that is often neglected by site desiners. Zen
  provides some basic styling which you are free to use or to rip out and
  replace.

- pages.css:
  Page styling for the markup in the page.tpl.php template.

- blocks.css:
  Block styling for the markup in the block.tpl.php template.

- navigation.css:
  The styling for your site's menus can get quite bulky and its easier to see
  all the styles if they are grouped together rather then across the
  header/footer sections of pages.css and in blocks.css.

- views-styles.css:
  Views styling for the markup in various views templates. You'll notice this
  stylesheet isn't called "views.css" as that would override (remove) the Views
  module's stylesheet.

- nodes.css:
  Node styling for the markkup in the node.tpl.php template.

- comments.css:
  Comment styling for the markup in the comment-wrapper.tpl.php and
  comments.tpl.php templates.

- forms.css:
  Form styling for the markup in various Drupal forms.

- fields.css:
  Field styling for the markup produced by theme_field().

- print.css:
  The print styles for all markup.

In these stylesheets, we have included all of the classes and IDs from this
theme's tpl.php files. We have also included many of the useful Drupal core
selectors to make it easier for theme developers to discover them.


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
http://drupal.org/project/conditional_styles


DRUPAL CORE'S STYLESHEETS
-------------------------

Many of Zen's styles are overriding Drupal's core stylesheets, so if you remove
a declaration from them, the styles may still not be what you want since
Drupal's core stylesheets are still styling the element. See the
drupal7-reference.css file for a complete list of all Drupal 7.x core styles.
