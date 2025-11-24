/*
 * Banner Carousel Script using Owl Carousel
 *
 * Initializes Owl carousel for banner section with autoplay
 */
(function ($) {
  'use strict';
  $(document).ready(function () {
    const $carousel = $('#banner-carousel');
    if ($carousel.length) {
      // Get slide count from data attribute or count items directly
      const slideCount = parseInt($carousel.attr('data-slide-count'), 10) || $carousel.find('.item').length;

      // Disable loop if there's only one slide (Owl Carousel has issues with loop:true and single items)
      const shouldLoop = slideCount > 1;

      $carousel.owlCarousel({
        items: 1,
        loop: shouldLoop,
        autoplay: shouldLoop, // Also disable autoplay if only one slide
        autoplayTimeout: 5000,
        autoplayHoverPause: true,
        smartSpeed: 1000,
        dots: false,
        nav: false,
        navText: [
          '<i class="fa-solid fa-chevron-left"></i>',
          '<i class="fa-solid fa-chevron-right"></i>',
        ],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
      });
    }
  });
}(jQuery));
