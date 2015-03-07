jQuery(document).ready(function () {
    jQuery('.mobile-top-menu-area').hide();
	jQuery('a#showhidestopmenu').click(function () {
		jQuery('.mobile-top-menu-area').slideToggle(400, "linear");
	});
});