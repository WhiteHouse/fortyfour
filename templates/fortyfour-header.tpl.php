<?php
/**
 * @file
 * petitions44 header static HTML storage file. This file houses the HTML that
 * is being used to generate the $fortyfour_header variable in the page.tpl.php
 * file.
 *
 * Available variables:
 * $path_to_fortyfour: Dynamically generates path to fortyfour theme.
 */

/**
 * @file
 * Petitions 44 theme's implementation to display header content within the
 * page.tpl.php file.
 */
 ?>

<div id="wh-header-title" class="clearfix">
  <span><a href="https://wwws.whitehouse.gov/">The White House. President Barack Obama</a></span>
</div>
<!--/#wh-header-title-->
<div id="hdr-emblem">
  <a href="https://wwws.whitehouse.gov/" class="active">
    <img src="<?php print $path_to_fortyfour; ?>/images/clear.gif" alt="" title="" width="1" height="1">
  </a>
</div>
<!--/#hdr emblem-->
<div id="hdr-links" class="clearfix">
  <ul>
    <li id="wh-header-link-get-email-updates"><a href="https://wwws.whitehouse.gov/get-email-updates">Get Email Updates</a></li>
    <li class="line" id="wh-header-link-contact-us"><a href="https://wwws.whitehouse.gov/contact">Contact Us</a></li>
  </ul>
</div>
<!--/#hdr links-->
