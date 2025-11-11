/*
 * Category Carousel Script using Owl Carousel
 *
 * Initializes Owl carousel for category list and featured projects
 */
(function ($) {
	'use strict';
	$(function () {
		// Category carousel
		if ($('#category-swiper').length) {
			$('#category-swiper').owlCarousel({
				items: 3,
				margin: 32,
				loop: false,
				dots: true,
				nav: false,
				responsive: {
					0: { items: 1, margin: 16 },
					768: { items: 2, margin: 16 },
					1024: { items: 3, margin: 20 },
				},
			});
		}
	});
}(jQuery));
