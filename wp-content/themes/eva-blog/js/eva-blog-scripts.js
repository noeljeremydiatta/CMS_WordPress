(function ($, root, undefined) {
	
	$(function () {
		
		'use strict';
		
		// DOM ready, take it away

		// Mobile menu button
		$('#show-mobile-menu-btn').on('click', function (e){
			e.preventDefault();
			var menu = $('.main-menu');
			menu.toggleClass('visible');
		});

		// Hide mobile menu when resizing
		$( window ).resize(function() {
			var vpWidth = $( window ).width();

			if (vpWidth > 768) {
				var menu = $('.main-menu');
				if(menu.hasClass('visible')) {
					menu.removeClass('visible');
				}
			}
		});

		//  Show scroll to top on scroll
		$(document).scroll(function() {
			var y = $(this).scrollTop();
			
			if (y > 800) {
			  $('.to-top-btn').fadeIn();
			} else {
			  $('.to-top-btn').fadeOut();
			}
		});


		// Trap focus on mobile menu when onpen
		const menuDiv = $('#main-site-menu'); // select the menu div by it's id
		const menuButton = $('#show-mobile-menu-btn');
		const focusableMenuElements = menuDiv.find('.menu-item a'); // select menu options

		const firstFocusableElement = focusableMenuElements[0]; // get first menu option to be focused 
		const lastFocusableElement = focusableMenuElements[focusableMenuElements.length - 1]; // get last menu option to be focused

		$(document).keydown(function(e) {
			let isTabPressed = e.key === 'Tab' || e.keyCode === 9;

			if (!isTabPressed) {
				return;
			}
		  	
		  	if ( menuButton.is(":visible")){ // if we are on mobile view
			    if (document.activeElement === lastFocusableElement) { // if last menu option is focused
			      firstFocusableElement.focus(); // add focus for the first menu option
			      e.preventDefault();
			    }
		    }	
		});
	});
	
})(jQuery, this);
