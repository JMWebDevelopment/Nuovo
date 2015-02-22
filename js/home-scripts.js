jQuery(document).ready(function() { 
	jQuery('#slideshow').cycle({
		fx: 'scrollHorz',
		pause: 1,
		prev: '.prev',
		next: '.next',
		timeout: 6000
	});
});
jQuery(document).ready(function() { 
	jQuery('#tablet-slideshow').cycle({
		fx: 'scrollHorz',
		pause: 1,
		prev: '.tablet-prev',
		next: '.tablet-next',
		timeout: 6000
	});
});
jQuery(document).ready(function() {	
	jQuery('#mobile-slideshow').cycle({
		fx: 'scrollHorz',
		pause: 1,
		prev: '.mobile-prev',
		next: '.mobile-next',
		timeout: 6000
	});
});
jQuery(function(){
	var mySwiper1 = jQuery('.mobile-swiper-container1').swiper({
		mode:'horizontal',
		loop: true,
		freeMode: true,
		freeModeFluid: true,
		simulateTouch: true,
		calculateHeight: true,
	});
});
jQuery(function(){
	var mySwiper2 = jQuery('.mobile-swiper-container2').swiper({
		mode:'horizontal',
		loop: true,
		freeMode: true,
		freeModeFluid: true,
		simulateTouch: true,
		calculateHeight: true,
	});
});
jQuery(function(){
	var mySwiper3 = jQuery('.mobile-swiper-container3').swiper({
		mode:'horizontal',
		loop: true,
		freeMode: true,
		freeModeFluid: true,
		simulateTouch: true,
		calculateHeight: true,
	});
});
jQuery(function(){
	var mySwiper4 = jQuery('.mobile-swiper-container4').swiper({
		mode:'horizontal',
		loop: true,
		freeMode: true,
		freeModeFluid: true,
		simulateTouch: true,
		calculateHeight: true,
	});
});