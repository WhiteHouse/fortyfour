/**
 * @file
 * A JavaScript file for the theme.
 *
 * In order for this JavaScript to be loaded on pages, see the instructions in
 * the README.txt next to this file.
 */

// JavaScript should be made compatible with libraries other than jQuery by
// wrapping it with an "anonymous closure". See:
// - https://drupal.org/node/1446420
// - http://www.adequatelygood.com/2010/3/JavaScript-Module-Pattern-In-Depth
(function ($, Drupal, window, document, undefined) {


// To understand behaviors, see https://drupal.org/node/756722#behaviors
    Drupal.behaviors.my_custom_behavior = {
        attach: function(context, settings) {

            // Search box -- Clear default value.
            $('.searchbox, .block-search input').val('Search');
            $('.searchbox, .block-search input').focus(function() {
                var value = $(this).val();
                if(value == 'Search') {
                    $(this).val('');
                }
            });
            $('.searchbox, .block-search input').blur(function() {
                var value = $(this).val();
                if(value === "") {
                    $(this).val('Search');
                }
            });

        }
    };

    /*
     * This behavior is intended to make the social links sticky on the side of
     * the page.
     * */
    Drupal.behaviors.sticky_social_links = {
        attach: function(context, settings) {
            // Loading the selectors here so that we don't need to repeat
            // DOM traversals each time a scroll event fires.
            var shareSection = $("#section-share-wrapper");

            // If the page doesn't have a share section don't waste time with
            // additional processing.
            if (shareSection.length < 1){
                return;
            }

            var contentSection = $('.panel-col-section-content');
            var footerSection = $('.sitewide-footer');
            var navBarHeight = $('#navbar-bar').height();
            var socialSectionHeight = shareSection.outerHeight()+navBarHeight;
            $(window).scroll(function (_this) {
                var contentSectionPos = contentSection.offset().top;
                var footerSectionPos = footerSection.offset().top;

                // The number of pixels offset from the #footer.
                var footerOffset = -38 - socialSectionHeight;
                var scrollTop = $(window).scrollTop();

                var scrollHeaderLevelOrAbove = scrollTop <= contentSectionPos;
                var scrollBetweenHeaderAndFooter = scrollTop > contentSectionPos
                    && (footerSectionPos + footerOffset) > scrollTop;
                var scrollPastTheFooter =  (footerSectionPos + footerOffset) < scrollTop;


                if(isBelowMobileBreakPoint()){
                    shareSection.removeClass('menu-fixed-top');
                    shareSection.removeClass('menu-at-footer');
                    return;
                }

                if (scrollHeaderLevelOrAbove) {
                    shareSection.removeClass('menu-fixed-top');
                    return;
                }

                // Between the header and footer
                else if(scrollBetweenHeaderAndFooter) {
                    shareSection.addClass('menu-fixed-top');
                    shareSection.removeClass('menu-at-footer');
                    return;
                }

                // If we have hit the footer
                else if (scrollPastTheFooter){
                    shareSection.addClass('menu-at-footer');
                    shareSection.removeClass('menu-fixed-top');
                    return;
                }

            });


            // If the window is resized when we have a fixed class set we need
            // to be able to remove the fixed class when dropping below the
            // mobile breakpoint.
            $(window).resize(function () {

                socialSectionHeight = shareSection.outerHeight()+navBarHeight;
                if(isBelowMobileBreakPoint()) {
                    shareSection.removeClass('menu-fixed-top');
                    shareSection.removeClass('menu-at-footer');

                }
            });

            // JS and css width measurements don't always align.
            // This discrepancy can cause serious headaches right around the
            // breakpoints. So checking a known css value that changes at
            // the mobile breakpoint.
            function isBelowMobileBreakPoint(){
                var belowMobileBreakPoint =
                    $('.pane-page-logo').css('width') == '70px'
                    && $('.pane-page-logo').css('position') == 'absolute';

                return belowMobileBreakPoint;
            }
        }
    };

})(jQuery, Drupal, this, this.document);
