(function ($) {
  Drupal.behaviors.responseDev = {};
  Drupal.behaviors.responseDev.attach = function(context) {
    var heightOnLoad = $(window).height();
    var widthOnLoad = $(window).width();
    var resultsBox = '<div class="response-dev" style="border: 1px solid #336699; background: #EAEFF5; position: fixed; left: 0px; bottom: 0px; padding:10px; z-index:1"></div>';
    var closedBox = '<a href="#" id="resp-open" style="color:red; text-decoration:none;font-weight:bold"> &#8599;</a>';
    var resultsContent = '<b style="padding-left:5px">Width:</b><span class ="response-width"></span><span>px</span><br /><b style="padding-left:5px">Height:</b><span class ="response-height"></span><span>px</span><a href="#" id="resp-close" style="color:red; text-decoration:none; position: absolute; top:0; right:0; line-height: 0.5em">x</a>';
    $('body').append(resultsBox);
    $('.response-dev').append(resultsContent);
    function dimensionsOnLoad(){
      $('.response-width').html(widthOnLoad);
      $('.response-height').html(heightOnLoad);
    };
    dimensionsOnLoad();
    var monitorWindow = 
    $(window).resize(function(){
        $('.width').empty();
        $('.height').empty();
        $('.response-width').html($(window).width());
        $('.response-height').html($(window).height());
    });
    function emptyBox(){
      $('.response-dev').empty().css('padding' , '5px').append(closedBox);
      $('a#resp-open').on('click' , unemptyBox);
      return false;
    }
    function unemptyBox(){
      $('.response-dev').css('padding' , '10px').html(resultsContent);
      $('a#resp-close').on('click' , emptyBox);
      dimensionsOnLoad();
      return false;
    }
    $('a#resp-close').on('click' , emptyBox);
    
    //workaround to chrome not resizing < 400px. Needs Work.
    //http://stackoverflow.com/questions/8681903/browser-doesnt-scale-below-400px
    //('.user-info').append('<a href="javascript:window.open(\'http://d7dashboard:8082/\', \'\',\'width=320,height=480\')">Open!</a>')
    //var currUrl = window.location.href;
  };
})(jQuery);