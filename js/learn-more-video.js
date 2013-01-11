/**
 * @file
 * JS to support the more info video popup.
 */

(function ($) {
    Drupal.behaviors.learnMoreVideo = {};
    Drupal.behaviors.learnMoreVideo.attach = function(context) {
        $('.dash-info').click(function(){
            modal = Drupal.settings.learnMoreVideo.data;
            $.colorbox({html:modal});
        });
    };
})(jQuery);
