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

if ( jQuery(window).width() <= 649){
	jQuery(function(){
		var mySwiper1 = jQuery('#swiper-container-1').swiper({
			mode:'horizontal',
			loop: true,
			freeMode: true,
			freeModeFluid: true,
			simulateTouch: true,
			calculateHeight: true,
		});
	});
}
if(jQuery(window).width() <= 649){
	jQuery(function(){
		var mySwiper2 = jQuery('#swiper-container-2').swiper({
			mode:'horizontal',
			loop: true,
			freeMode: true,
			freeModeFluid: true,
			simulateTouch: true,
			calculateHeight: true,
		});
	});
}
if(jQuery(window).width() <= 649){
	jQuery(function(){
		var mySwiper3 = jQuery('#swiper-container-3').swiper({
			mode:'horizontal',
			loop: true,
			freeMode: true,
			freeModeFluid: true,
			simulateTouch: true,
			calculateHeight: true,
		});
	});
}
if(jQuery(window).width() <= 649){
	jQuery(function(){
		var mySwiper4 = jQuery('#swiper-container-4').swiper({
			mode:'horizontal',
			loop: true,
			freeMode: true,
			freeModeFluid: true,
			simulateTouch: true,
			calculateHeight: true,
		});
	});
}