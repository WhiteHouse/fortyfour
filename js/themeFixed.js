/**
 * @file
 * Theme javascript for the fixed version of the site.
 */

(function ($) {   

//add click handlers and resize content when hiding/showing sidebar
  $('a.sidebar-close').click(function(){
    $('.chart-info').hide();
    $('.node .content').addClass('content-close');
    $('.node-chart').addClass('content-close');
    $('a.sidebar-close').hide();
    $('a.sidebar-open').show();
    $(window).resize();
    return false;
  });

  //Main Menu Dropdown
  $('a.handle').click(function(){
    $('.toggle-nav').slideToggle('fast');
  });
  $('a.handle').toggle(function (){
    $(this).text('Close').stop();
    $(this).addClass('handle-close');
    }, function(){
    $(this).text('Filter Charts').stop();
    $(this).removeClass('handle-close');
  });

  $('a.sidebar-open').click(function(){
    $('.chart-info').show();
    $('.node .content').removeClass('content-close');
    $('.node-chart').removeClass('content-close');
    $('a.sidebar-open').hide();
    $('a.sidebar-close').show();
    $(window).resize();
    return false;
  });
  //$(window).ready(function(){
  //  contentHeight = $('#content').outerHeight();
  //  $('.chart-info').css('height' , contentHeight + 'px');
  //});

  //embed handling
  $('.embedded .chart-info').css('display' , 'none');
  $('a.embed-handle').toggle(function(){
    $('.slide-wrap').animate({width:'70%'},
      function(){
        $('.embedded .chart-info').css('display' , 'block');
      }).animate({opacity: '0.85'})
    .css('background-color' , '#000').css('overflow' , 'visible');
    $('.embed-handle').css('background-color' , '#000');
    return false;
  } , function(){
    $('.slide-wrap').animate({width:'3%'}).css('opacity' , '1').css('background-color' , '#EFEFEF').css('overflow' , 'visible');
    $('.embed-handle').css('background-color' , '#EFEFEF');
    $('.embedded .chart-info').css('display' , 'none');
  });

})(jQuery);