jQuery(document).ready(function() {

  "use strict";

  // Horizon
  jQuery( '.horizon' ).horizon();

  //play button script
  jQuery('#play-btn').click(function(){
    jQuery('#click-video')[0].src += 'autoplay=1';
    jQuery(this).unbind('click');//or some other way to make sure that this only happens once
    jQuery('.redl-video').addClass('active');
  });

  //back top script
  jQuery('.redl-back-top');
  	jQuery(window).scroll(function () {
  		if (jQuery(this).scrollTop() > 250) {
  			jQuery('.redl-back-top').addClass('active');
  		} else {
  			jQuery('.redl-back-top').removeClass('active');
  		}
  	});
  	jQuery('.redl-back-top a').click(function () {
  		jQuery('body,html').animate({
  			scrollTop: 0
  		}, 800);
  		return false;
  });

  //hover script
  jQuery('.member-list').hover(
    function(){jQuery(this).addClass('ishover');
    },
    function(){jQuery(this).removeClass('ishover');
    }
  );

});

/**
 * Smooth Scroll
 */
jQuery(document).ready(function($) {

  "use strict";

  // Var
  var app_nav = $('header');
  var app_nav_height = app_nav.outerHeight();

  $('.navbar-nav > li > a, .redl-header-right > a, .smooth-button').bind('click', function(event) {
    var $anchor = $(this);
    $('html, body').stop().animate({
        scrollTop: $($anchor.attr('href')).offset().top - 74
    }, 800);
    event.preventDefault();
  });

  /**
   * Smooth Scroll - Section Active
   */
  var sections = $('.redl-row-section');
  jQuery(window).on('scroll', function () {
    "use strict";
    var cur_pos = $(this).scrollTop();
    sections.each(function() {
      var sec_top = $(this).offset().top - app_nav_height,
          sec_bottom = sec_top + $(this).outerHeight();
      if (cur_pos >= sec_top && cur_pos <= sec_bottom) {
        app_nav.find('a').removeClass('redl-current');
        app_nav.find('a[href="#'+$(this).attr('id')+'"]').addClass('redl-current');
      }
    });
  });

});

//add remove script
jQuery('.subscribe-link a').on('click', function() {
  "use strict";
  jQuery(".redl-banner").addClass('active');
});
jQuery('.close-btn a').on('click', function() {
  "use strict";
  jQuery('.redl-banner').removeClass('active');
});

//parallax scroll nav script
if (jQuery('body').hasClass('admin-bar')) {
  jQuery('.sidebar-nav ul li a').on('click', function() {
    "use strict";
    var scrollAnchor = jQuery(this).attr('data-scroll'),
        scrollPoint = jQuery('.data-scroll[data-anchor="' + scrollAnchor + '"]').offset().top - 52;
    jQuery('body,html').animate({
      scrollTop: scrollPoint
    }, 500);
    return false;
  });
} else {
  jQuery('.sidebar-nav ul li a').on('click', function() {
    "use strict";
    var scrollAnchor = jQuery(this).attr('data-scroll'),
        scrollPoint = jQuery('.data-scroll[data-anchor="' + scrollAnchor + '"]').offset().top - 20;
    jQuery('body,html').animate({
      scrollTop: scrollPoint
    }, 500);
    return false;
  });
}

jQuery(window).scroll(function() {
  "use strict";
  var windscroll = jQuery(window).scrollTop();
  if (windscroll >= 620) {
    jQuery('.data-scroll').each(function(i) {
      if (jQuery(this).position().top <= windscroll) {
        jQuery('.sidebar-nav ul li a.active').removeClass('active');
        jQuery('.sidebar-nav ul li a').eq(i).addClass('active');
      }
    });
  } else {
    jQuery('.sidebar-nav ul li .active').removeClass('active');
    jQuery('.sidebar-nav ul li a:first').addClass('active');
  }
}).scroll();

//social media tooltip script
jQuery('[data-toggle="tooltip"]').tooltip();

//popup image script
jQuery('.blog-picture').magnificPopup({
  delegate: 'a',
  type: 'image',
  closeOnContentClick: false,
  closeBtnInside: false,
  mainClass: 'mfp-with-zoom mfp-img-mobile',
  image: {
    verticalFit: true,
    titleSrc: function(item) {
      return item.el.attr('title') + ' &middot; <a class="image-source-link" href="'+item.el.attr('data-source')+'" target="_blank">image source</a>';
    }
  },
  gallery: {
    enabled: true
  },
  zoom: {
    enabled: true,
    duration: 300, // don't foget to change the duration also in CSS
    opener: function(element) {
      return element.find('img');
    }
  }
});

//popup video script (plugins.js)
jQuery('.popup-video').magnificPopup({
  type: 'iframe',
  iframe: {
    patterns: {
      dailymotion: {
        index: 'dailymotion.com',
        id: function(url) {
          var m = url.match(/^.+dailymotion.com\/(video|hub)\/([^_]+)[^#]*(#video=([^_&]+))?/);
          if (m !== null) {
              if(m[4] !== undefined) {
                  return m[4];
              }
              return m[2];
          }
          return null;
        },
        src: 'http://www.dailymotion.com/embed/video/%id%'
      }
    }
  }
});

//redl video height script
// jQuery(document).ready(function($) {
//   "use strict";

//   var jQueryelems = $('.animateblock');
//   var winheight = $(window).height();
//   var fullheight = $(document).height();
//   $(window).scroll(function(){
//     animate_elems();
//   });
//   function animate_elems() {
//     wintop = $(window).scrollTop(); // calculate distance from top of window
//     // loop through each item to check when it animates
//     jQueryelems.each(function(){
//       jQueryelm = $(this);
//       if(jQueryelm.hasClass('animated')) { return true; } // if already animated skip to the next item
//       topcoords = jQueryelm.offset().top; // element's distance from top of page in pixels
//       if(wintop > (topcoords - (winheight*.75))) {
//         // animate when top of the window is 3/4 above the element
//         jQueryelm.addClass('animated');
//       }
//     });
//   } // end animate_elems()
// });

//default sliders script
jQuery(window).load(function() {
  "use strict";

  //mobile slider script
  jQuery('.carousel-sync').carousel('cycle');
    jQuery('.carousel-sync').on('click', '.carousel-control[data-slide]', function (ev) {
      ev.preventDefault();
      jQuery('.carousel-sync').carousel(jQuery(this).data('slide'));
    });
  jQuery('.carousel-sync').on('mouseover', function(ev) {
      ev.preventDefault();
      jQuery('.carousel-sync').carousel('pause');
    });
  jQuery('.carousel-sync').on('mouseleave', function(ev) {
    ev.preventDefault();
    jQuery('.carousel-sync').carousel('cycle');
  });

jQuery('.redl-default-slider').each( function() {
  "use strict";

  var jQuerycarousel = jQuery(this);
  var jQueryitems = (jQuerycarousel.data("items") !== undefined) ? jQuerycarousel.data("items") : 1;
  var jQueryitems_tablet = (jQuerycarousel.data("items-tablet") !== undefined) ? jQuerycarousel.data("items-tablet") : 1;
  var jQueryitems_mobile_landscape = (jQuerycarousel.data("items-mobile-landscape") !== undefined) ? jQuerycarousel.data("items-mobile-landscape") : 1;
  var jQueryitems_mobile_portrait = (jQuerycarousel.data("items-mobile-portrait") !== undefined) ? jQuerycarousel.data("items-mobile-portrait") : 1;
      jQuerycarousel.owlCarousel({
      loop : (jQuerycarousel.data("loop") !== undefined) ? jQuerycarousel.data("loop") : true,
      items : jQuerycarousel.data("items"),
      margin : (jQuerycarousel.data("margin") !== undefined) ? jQuerycarousel.data("margin") : 0,
      dots : (jQuerycarousel.data("dots") !== undefined) ? jQuerycarousel.data("dots") : true,
      nav : (jQuerycarousel.data("nav") !== undefined) ? jQuerycarousel.data("nav") : false,
      navText : ["<div class='slider-no-current'><span class='current-no'></span><span class='total-no'></span></div><span class='current-monials'></span>", "<div class='slider-no-next'></div><span class='next-monials'></span>"],
      autoplay : (jQuerycarousel.data("autoplay") !== undefined) ? jQuerycarousel.data("autoplay") : false,
      autoplayTimeout : (jQuerycarousel.data("autoplay-timeout") !== undefined) ? jQuerycarousel.data("autoplay-timeout") : 5000,
      animateOut : (jQuerycarousel.data("animateout") !== undefined) ? jQuerycarousel.data("animateout") : false,
      mouseDrag : (jQuerycarousel.data("mouse-drag") !== undefined) ? jQuerycarousel.data("mouse-drag") : true,
      autoWidth : (jQuerycarousel.data("auto-width") !== undefined) ? jQuerycarousel.data("auto-width") : false,
      autoHeight : (jQuerycarousel.data("auto-height") !== undefined) ? jQuerycarousel.data("auto-height") : false,
      responsiveClass: true,
      responsive : {
        0 : {
          items : jQueryitems_mobile_portrait,
        },
        480 : {
          items : jQueryitems_mobile_landscape,
        },
        768 : {
          items : jQueryitems_tablet,
        },
        960 : {
          items : jQueryitems,
        }
      }
    });
   //adding slide nav and slide numbers script
  var totLength = jQuery(".owl-dot", jQuerycarousel).length;
    jQuery(".total-no", jQuerycarousel).html(totLength);
    jQuery(".current-no", jQuerycarousel).html(totLength);
    jQuerycarousel.owlCarousel();
    jQuery(".current-no", jQuerycarousel).html(1);
   //owl event nav slide current and total numbers script
  jQuerycarousel.on('changed.owl.carousel', function(event) {
    var total_items = event.page.count;
    var currentNum = event.page.index + 1;
      jQuery(".total-no", jQuerycarousel ).html(total_items);
      jQuery(".current-no", jQuerycarousel).html(currentNum);
    });
  });
});

//div outside click remove script
jQuery(document).on('click', function(e) {
  "use strict";
  if (jQuery(e.target).is('.redl-header-right, .redl-header-right *') === false) {
    jQuery('.redl-header-right').removeClass('in');
}

//parallax script
if ( jQuery('.redl-parallax-bg').length > 0 ) {
  jQuery.parallax( {
    scrollProperty: 'scroll',
    verticalOffset: 0,
    horizontalOffset: 0,
    horizontalScrolling: false,
    responsive: true
 });
}

//bootstrap tabs script
jQuery('.nav-tabs').tab();

//parallax video script
jQuery('.parallax-video').backgroundVideo({
   pauseVideoOnViewLoss: false,
   parallaxOptions: {
   effect: 0
    }
});

//custom map script
jQuery('#redl-contact-map').mapit();
jQuery('#redl-contact-map').trigger('show', '2');
});

//login form placeholder script<br>
// jQuery(document).ready(function() {
// jQuery('#user_login').attr( 'placeholder', 'Your Email' );
// jQuery('#user_pass').attr( 'placeholder', 'Your Password' );
// });

//counter script
jQuery(window).scroll(function() {
  "use strict";
  if (jQuery('.redl-status-info')[0]){
  var hT = jQuery('.redl-status-info').offset().top,
    hH = jQuery('.redl-status-info').outerHeight(),
    wH = jQuery(window).height(),
    wS = jQuery(this).scrollTop();

      if (wS > (hT + hH - wH)) {
       jQuery('.count').each(function() {
          jQuery(this).prop('Counter', 0).animate({
              Counter: jQuery(this).text()
          }, {
              duration: 3000,
              easing: 'swing',
              step: function(now) {
                  jQuery(this).text(Math.ceil(now));
              }
          });
      }); {
          jQuery('.count').removeClass('count').addClass('counted');
      }
    }
  }
});

jQuery(document).ready(function($) {
  "use strict";
  //video script
  if ($('.video-class')[0]){
      $(".video-class").fitVids();
  }
  //nice select script
  $('.wpcf7 select, .widget_archive_select select, .widget_categories_select select, .widget_text_select select').niceSelect();

  if ($('header').hasClass('redl-banner-special')) {
    $('body').addClass('redl-banner-special-page');
  }

});

//on scroll fixed sidebarnav script
function sidebarScroll() {
  if (jQuery('.sidebar-nav')[0]){
    var tmpWindow = jQuery(window),
        wrapper = jQuery('.redl-primary').height(),
        sidebar = jQuery('.sidebar-nav'),
        offsetTop = sidebar.offset().top,
        offsetBottom;
        tmpWindow.scroll(function(){
        offsetBottom = (wrapper) - sidebar.height();
      if (tmpWindow.scrollTop() < offsetTop) {
        sidebar.removeClass('fixed bottom');
      } else {
        sidebar.addClass('fixed');
      }
    });
  }
}
sidebarScroll();