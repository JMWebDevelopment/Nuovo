jQuery(document).ready(function () {
    jQuery('.mobile-main-menu-area').hide();
	jQuery('a#showhidesmainmenu').click(function () {
        jQuery('.mobile-main-menu-area').slideToggle(400, "linear");
    });
});