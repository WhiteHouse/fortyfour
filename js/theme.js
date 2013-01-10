/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - http://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth

(function ($) {
  Drupal.behaviors.theme = {};
  Drupal.behaviors.theme.attach = function(context) {
  themePath = Drupal.settings.basePath + Drupal.settings.fortyfour.themePath;
  Modernizr.load({
    test: Modernizr.mq('only all'),
    yep : [themePath + '/js/harvey.js' , themePath + '/js/themeResponsive.js'],
    nope: [themePath + '/js/themeFixed.js' , themePath + '/css/layouts/dashboard-fixed.css']
  });
  $('.dash-info').click(function(){
    video='<iframe width="461" height="260" src="http://www.youtube.com/embed/jpkt6khfiK4?rel=0&showinfo=0&controls=1&wmode=opaque frameborder="0" allowfullscreen></iframe>';
    subVideo = '<p class="sub-video">Alan Krueger on the Economic Dashboard</p>';
    title = '<h2>The White House <span>Economic Dashboard</span></h2>';
    text = '<p>The Economic Indicators Dashboard gives people everywhere access to a collection of key economic measurements that the President and his advisors rely on to assess the state of the economy. The data, provided through from the Federal Reserve, is updated as it gets released.</p>';
        modal = '<div class="intro-modal">' + title + text + video + subVideo + '</div>';
    $.colorbox({html:modal});
  });
    };
})(jQuery);
