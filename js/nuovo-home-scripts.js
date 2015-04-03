jQuery(document).ready(function() { 
	jQuery('#slideshow').cycle({
		fx: 'scrollHorz',
		pause: 1,
		prev: '.prev',
		next: '.next',
		timeout: 6000
	});
});