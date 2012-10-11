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
        $('.chart-info').addClass('chart-info-close');
        $('.node .content').addClass('content-close');
        $('.node-chart').addClass('content-close');
        $('.change-box').addClass('change-box-close');
        $('.share-box').addClass('share-box-close');
        $('h3.aside').addClass('asideclose');
        $('a.sidebar-close').hide();
        $('a.sidebar-open').show();
        $(window).resize();
        return false;
      });
    }
      $('a.sidebar-open').click(function(){
        $('.chart-info').removeClass('chart-info-close');
        $('.node .content').removeClass('content-close');
        $('.node-chart').removeClass('content-close');
        $('.change-box').removeClass('change-box-close');
        $('.share-box').removeClass('share-box-close');
        $('h3.aside').removeClass('asideclose');
        $('a.sidebar-open').hide();
        $('a.sidebar-close').show();
        $(window).resize();
        return false;
      });
    };
    
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
    
    //Remove teaser script
    
    //Main Menu Dropdown
    var openText = 'Open Menu';
    var closeText = 'Close Menu';
    $('a.handle').html(openText);
    function menuDropdown(){
      $('a.handle').click(function(){
        $('.toggle-nav').slideToggle('fast');
      });
      $('a.handle').toggle(function (){
        $(this).text(closeText).stop();
        $(this).addClass('handle-close');
        }, function(){
        $(this).text(openText).stop();
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
    
    var share = $('.share-box');
    function moveShare(){
      $('.share-box').remove().insertAfter('.field-name-body');
    }
    function moveShareBack(){
      $('.share-box').remove().insertAfter('.change-box');
    }

})(jQuery);