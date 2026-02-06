/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can
 * always reference jQuery with $, even when in .noConflict() mode.
 * ======================================================================== */
import $ from 'jquery';
import 'foundation-sites';
import 'slick-carousel';
import SimpleLightbox from "simplelightbox";
import AOS from 'aos';
import { CountUp } from 'countup.js';

// If you only need specific modules:
// import { Foundation, Accordion, Tabs } from 'foundation-sites';
(function($) {

  // Use this variable to set up the common and page specific functions. If you
  // rename this variable, you will also need to rename the namespace below.
  var Sage = {
    // All pages
    'common': {
      init: function() {
        
        $(document).foundation(); // Foundation JavaScript

        AOS.init({
          duration: 1000,
          once: true,
        });


        if( document.querySelector('.petro-animated-number') ) {
          const animatedNumbers = document.querySelectorAll('.petro-animated-number .number-span');
          //var delay = 100; // initial delay in milliseconds

          animatedNumbers.forEach( (element) => {

            let targetNumber = element.getAttribute('data-target');
            let delayMs = element.getAttribute('data-delay');
            let startVal = element.getAttribute('data-start') || 0;
            let countUp = new CountUp(element, targetNumber, {
              duration: 2,
              separator: ',',
              enableScrollSpy: true,
              scrollSpyOnce: true,
              startVal: startVal,
            });
            setTimeout( () => {
              if (!countUp.error) {
                countUp.start();
              } else {
                console.error(countUp.error);
              }
            }, delayMs);

          });
        }


        new SimpleLightbox('.some-element a', { /* options */ });
      
      },
      finalize: function() {
      }
    },
    // Home page
    'home': {
      init: function() {
        // JavaScript to be fired on the home page
      },
      finalize: function() {
        // JavaScript to be fired on the home page, after the init JS
      }
    },
    // All Other Pages.
    'page': {
      init: function() {
        
        // Accordion
        $('.accordion-topic').click(function(){
          $(this).next('.accordion-response').slideToggle(500).toggleClass('current');
          $(this).toggleClass('current');
          $(this).parents('.accordion').siblings().find('.accordion-topic').slideUp(500);
          $(this).parents('.accordion').siblings().find('.accordion-response').removeClass('current');
        });
        

      }
    },
  };

  // The routing fires all common scripts, followed by the page specific scripts.
  // Add additional events for more control over timing e.g. a finalize event
  var UTIL = {
    fire: function(func, funcname, args) {
      var fire;
      var namespace = Sage;
      funcname = (funcname === undefined) ? 'init' : funcname;
      fire = func !== '';
      fire = fire && namespace[func];
      fire = fire && typeof namespace[func][funcname] === 'function';

      if (fire) {
        namespace[func][funcname](args);
      }
    },
    loadEvents: function() {
      // Fire common init JS
      UTIL.fire('common');

      // Fire page-specific init JS, and then finalize JS
      $.each(document.body.className.replace(/-/g, '_').split(/\s+/), function(i, classnm) {
        UTIL.fire(classnm);
        UTIL.fire(classnm, 'finalize');
      });

      // Fire common finalize JS
      UTIL.fire('common', 'finalize');
    }
  };

  // Load Events
  $(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.