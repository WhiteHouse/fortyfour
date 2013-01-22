/**
 * @file
 * Theme javascript for responsive version of the site.
 */

(function ($) {

    //Desktop only breakpoint
    qry1 = Harvey.attach('all and (min-width: 976px)', {

      setup: function() {
      },
      on: function() {
        addClicks();
        resizeSidebar();
      },
      off: function() {
        removeClicks();
      }
    });
    
    //ipad and up breakpoint
    qry2 = Harvey.attach('all and (min-width: 481px)', {

      setup: function() {
      },
      on: function() {
        embedLink();
        socialLinks();
        teaserText();
        menuDropdown();
        secondaryDropdown();
      },
      off: function() {
        //removeTeaser();
        destroyDropdown();
        destroySecondary();
      }
    });
    
    //below desktop breakpoint
    qry3 = Harvey.attach('all and (max-width: 975px)', {

      setup: function() {
      },
      on: function() {
        resizeTablet();
      },
      off: function() {
        //showButtons(button);
      }
    });

    //iphone landscape and below breakpoint
    qry4 = Harvey.attach('all and (max-width: 480px)', {

      setup: function() {
      },
      on: function() {
        isAPhone();
        moveShare();
      },
      off: function() {
        moveShareBack();
        notAPhone();
      }
    });
       //hide side bar buttons entirely at widths < 976px
    function buttonState(button) {
      if ($('a.sidebar-close').is(":visible")){
        button = "closed";
      } else {
        button = "open";
      }
    }
     
    function hideButtons(){
    //check for button state
      $('a.sidebar-close').hide();
      $('a.sidebar-open').hide();
    }

    function showButtons(button){
      if (button === "closed"){
        $('a.sidebar-close').show();
      } else {
       $('a.sidebar-open').show();
      }
    }
    
    //add click handlers and resize content when hiding/showing sidebar
    function addClicks(){
      $('a.sidebar-close').click(function(){
        $('.chart-info').hide();
        $('.node .content').addClass('content-close');
        $('.node-chart').addClass('content-close');
        $('a.sidebar-close').hide();
        $('a.sidebar-open').show();
        $(window).resize();
        return false;
      });
    }
      $('a.sidebar-open').click(function(){
        $('.chart-info').show();
        $('.node .content').removeClass('content-close');
        $('.node-chart').removeClass('content-close');
        $('a.sidebar-open').hide();
        $('a.sidebar-close').show();
        $(window).resize();
        return false;
      });
    
    //remove click handler for sidebar hiding
    function removeClicks(){
      $('a.sidebar-close').unbind('click');
      $('a.sidebar-open').unbind('toggle');
    }
    
    //Teaser about text
    function teaserText(){
      $('.field-name-body').expander({
        slicePoint: 680,
        widow: 2,
        expandEffect: 'slideDown',
        expandText: 'More',
        expandPrefix: '',
        userCollapseText: 'Less'
      });
    }

    function removeTeaser(){
    }
    
    //Main Menu Dropdown
    function menuDropdown(){
      $('a.handle').click(function(){
        $('.toggle-nav').slideToggle('fast');
      });
      $('a.handle').toggle(function (){
        $(this).text('Close').stop();
        $(this).addClass('handle-close');
        }, function(){
        $(this).text('Main Menu').stop();
        $(this).removeClass('handle-close');
      });
    }

    function destroyDropdown(){
      $('a.handle').unbind('click');
      $('a.handle').unbind('toggle');
    }
    
    function destroySecondary(){
      $('#secondary-menu h2').unbind('click');
    }

    //Seconday Links Dropdown
    function secondaryDropdown(){
      $('#secondary-menu h2').click(function(){
        $('#secondary-menu ul').slideToggle('fast');
        $(this).toggleClass('arrow-up').toggleClass('arrow-down');
      });
    }
    
    function isAPhone(){
      window.Drupal.settings.charting.chartNode.chartHeight = '220';
      var menuHtml = '<ul id="phone-nav" role="navigation"><li class="active"><a href="#chart">Chart</a></li><li><a href="#about">About</a></li><li><a href="#share">Share</a></li></ul>';
      $('.banner-bg').append(menuHtml);
      $('.region-banner').append('<div class="phone-title phone-logo">White House Economic Indicators</div>');
      if (!($('body').hasClass('page-frontpage'))){
      }
    }
    
    function notAPhone(){
      $('div.phone-title').remove();
      $('#phone-nav').remove();
    }
    
    var share = $('.share-box');
    function moveShare(){
      $('.share-box').remove().insertAfter('.field-name-body');
    }

    function moveShareBack(){
      $('.share-box').remove().insertAfter('.change-box');
    }

    function resizeSidebar(){
      $(window).ready(function(){
        contentHeight = $('#content').outerHeight();
        $('.chart-info').css('height' , contentHeight + 'px');
      });
    }

    function resizeTablet(){
      $('.chart-info').css('height' , '100%');
    }

    function embedLink(){
      $('a.embed-btn').toggle(function(){
        $(this).addClass('active');
        $('.embed-code').slideDown();
        $('.embed-code').focus().select();
      } , function(){
        $(this).removeClass('active');
        $('.embed-code').slideUp();
      });
    }

    function socialLinks(){
      $('.share-btn:not(.embed-btn)').click(function(){
        alert('Sharing disabled until site launch.');
      });
    }

    //front page phone view list of chart
    function phoneList(){
      if (!($('body').hasClass('page-frontpage'))){
      }
    }

    //embed handling
    $(function(){
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
    });

})(jQuery);
