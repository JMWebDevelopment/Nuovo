<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<title><?php wp_title('|', true, 'right'); ?></title>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_uri(); ?>" />
<?php if (get_header_image() == '') { ?>
	<style type="text/css">
		.header-text{
			width: 530px;
			float: left;
			display: table-cell;
			vertical-align: middle;
			position: relative;
			margin: auto 0px;
		}
		h2.site-title, h2.site-title a, h2.site-title a:link, h2.site-title a:hover, h2.site-title a:visited {
			color: #<?php echo get_header_textcolor(); ?>;
			font-size: 24px;
			font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
		}
		
		h3.site-description, h3.site-description a, h3.site-description a:link, h3.site-description a:hover, h3.site-description a:visited {
			color: #<?php echo get_header_textcolor(); ?>;
			font-size: 18px;
			font-family: Georgia;
		}
		.mobile-header-text{
			width: 300px;
			float: left;
			position: relative;
			margin-top: 20px;
			margin-bottom: 20px;
		}
		h2.mobile-site-title, h2.mobile-site-title a, h2.mobile-site-title a:link, h2.mobile-site-title a:hover, h2.mobile-site-title a:visited {
			color: #<?php echo get_header_textcolor(); ?>;
			font-size: 18px;
			font-family: "Lucida Sans Unicode", "Lucida Grande", sans-serif;
		}
		
		h3.mobile-site-description, h3.mobile-site-description a, h3.mobile-site-description a:link, h3.mobile-site-description a:hover, h3.mobile-site-description a:visited {
			color: #<?php echo get_header_textcolor(); ?>;
			font-size: 14px;
			font-family: Georgia;
		}
	</style>
<?php } ?>
<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/images/nuovologo.ico" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' ); ?>
<link rel="alternate" type="application/rss+xml" href="<?php get_feed_link( 'rss' ) ?>" title="<?php printf( __('%s Latest Posts', 'nuovo'), esc_html__( get_bloginfo('name') ) ); ?>" />
<link rel="alternate" type="application/rss+xml" href="<?php get_feed_link( 'comments_rss' ); ?>" title="<?php printf( __('%s Latest Comments', 'nuovo'), esc_html__( get_bloginfo('name') ) ); ?>" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<?php wp_head(); ?>
<?php if (is_home()) { ?>
	<script type="text/javascript">
		$(document).ready(function() { 
			$('#slideshow').cycle({
				fx: 'scrollHorz',
				pause: 1,
				prev: '.prev',
				next: '.next',
				timeout: 6000
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() { 
			$('#tablet-slideshow').cycle({
				fx: 'scrollHorz',
				pause: 1,
				prev: '.tablet-prev',
				next: '.tablet-next',
				timeout: 6000
			});
		});
	</script>
	<script type="text/javascript">
		$(document).ready(function() {	
			$('#mobile-slideshow').cycle({
				fx: 'scrollHorz',
				pause: 1,
				prev: '.mobile-prev',
				next: '.mobile-next',
				timeout: 6000
			});
		});
	</script>
	<script type="text/javascript">
		$(function(){
			var mySwiper1 = $('.mobile-swiper-container1').swiper({
				mode:'horizontal',
				loop: true,
				freeMode: true,
				freeModeFluid: true,
				simulateTouch: true,
				calculateHeight: true,
				slidesPerGroup: <?php if (nuovo_options('homepage', 'category-one-count')) { echo nuovo_options('homepage', 'category-one-count'); } else { echo 10; } ?>
			});
		});
	</script>
	<script type="text/javascript">
		$(function(){
			var mySwiper2 = $('.mobile-swiper-container2').swiper({
				mode:'horizontal',
				loop: true,
				freeMode: true,
				freeModeFluid: true,
				simulateTouch: true,
				calculateHeight: true,
				slidesPerGroup: <?php if (nuovo_options('homepage', 'category-two-count')) { echo nuovo_options('homepage', 'category-two-count'); } else { echo 10; } ?>
			});
		});
	</script>
	<script type="text/javascript">
		$(function(){
			var mySwiper3 = $('.mobile-swiper-container3').swiper({
				mode:'horizontal',
				loop: true,
				freeMode: true,
				freeModeFluid: true,
				simulateTouch: true,
				calculateHeight: true,
				slidesPerGroup: <?php if (nuovo_options('homepage', 'category-three-count')) { echo nuovo_options('homepage', 'category-three-count'); } else { echo 10; } ?>
			});
		});
	</script>
	<script type="text/javascript">
		$(function(){
			var mySwiper4 = $('.mobile-swiper-container4').swiper({
				mode:'horizontal',
				loop: true,
				freeMode: true,
				freeModeFluid: true,
				simulateTouch: true,
				calculateHeight: true,
				slidesPerGroup: <?php if (nuovo_options('homepage', 'category-four-count')) { echo nuovo_options('homepage', 'category-four-count'); } else { echo 10; } ?>
			});
		});
	</script>
<?php } ?>
<?php if (nuovo_options('general', 'top-menu')) { ?>
	<script type="text/javascript">
        $(document).ready(function () {
            $('.mobile-top-menu-area').hide();
			$('a#showhidestopmenu').click(function () {
				$('.mobile-top-menu-area').slideToggle(400, "linear");
			});
		});
	</script>
<?php } ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('.mobile-main-menu-area').hide();
		$('a#showhidesmainmenu').click(function () {
            $('.mobile-main-menu-area').slideToggle(400, "linear");
        });
    });
</script>
<?php nuovo_menu_container(); ?>
<?php echo nuovo_options('general', 'google-analytics'); ?>
</head>
<body <?php body_class(); ?>>
<?php if (nuovo_options('general', 'top-menu')) { ?>
	<!--Begin Top Menu-->
	<div id="top-menu">
		<?php wp_nav_menu(
			array(
				'sort_column' => 'menu_order',
				'theme_location' => 'top-menu'
			)
		); ?>
	</div>
	<!--End Top Menu-->
<?php } ?>
<!--Begin Header Logo Area-->
<div id="branding-background" class="clearfix" style="<?php if (nuovo_options('general', 'top-menu')) { ?>padding-top:40px;<?php } else { ?>padding-top:0px; <?php } ?>">
	<div id="branding">
			<?php if (get_header_image()) { ?>
				<!--Logo Header-->
				<div id="header">
					<a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></a>
				</div>
			<?php } else { ?>
				<!--Text Header-->
				<div class="header-text clearfix">
					<h2 class="site-title"><a href="<?php echo home_url(); ?>"><?php echo bloginfo('name'); ?></a></h2>
					<h3 class="site-description"><a href="<?php echo home_url(); ?>"><?php echo bloginfo('description'); ?></a></h3>
				</div>
			<?php } ?>
		<!--Begin Social Area-->
		<div id="social-area">
			<?php if (nuovo_options('social', 'facebook')) { ?>
				<div class="social-icon">
					<a href="<?php echo nuovo_options('social', 'facebook'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="<?php echo bloginfo('name'); ?> on Facebook" />
					</a>
				</div>
			<?php } ?>
			<?php if (nuovo_options('social', 'twitter')) {?>
				<div class="social-icon">
					<a href="<?php echo nuovo_options('social', 'twitter'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="<?php echo bloginfo('name'); ?> on Twitter" />
					</a>
				</div>
			<?php } ?>
			<div class="social-icon">
				<a href="<?php if (nuovo_options('general', 'rss_feed')) { echo nuovo_options('general', 'rss_feed'); } else { echo get_feed_link( 'rss' ); }?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="<?php echo bloginfo('name'); ?>'s RSS Feed" />
				</a>
			</div>
			<?php if (nuovo_options('social', 'youtube')) { ?>
				<div class="social-icon">
					<a href="<?php echo nuovo_options('social', 'youtube'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/youtube.PNG" alt="<?php echo bloginfo('name'); ?> on YouTube" />
					</a>
				</div>
			<?php } ?>
			<?php if (nuovo_options('social', 'googleplus')) { ?>
				<div class="social-icon">
					<a href="<?php echo nuovo_options('social', 'googleplus'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/googleplus.png" alt="<?php echo bloginfo('name'); ?> on Google+" />
					</a>
				</div>
			<?php } ?>
			<?php if (nuovo_options('social', 'linkedin')) { ?>
				<div class="social-icon">
					<a href="<?php echo nuovo_options('social', 'linkedin'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="<?php echo bloginfo('name'); ?> on LinkedIn" />
					</a>
				</div>
			<?php } ?>
		</div>
		<!--End Social Area-->
	</div>
</div>
<!--End Header Logo Area-->
<!--Main Menu-->
<div id="main-menu" class="clearfix">
	<?php wp_nav_menu(
		array(
			'sort_column' => 'menu_order',
			'theme_location' => 'main-menu'
		)
	); ?>
</div>
<!--End Main Menu-->
<?php get_nuovo_mobile_template('header'); ?>
<div id="wrapper" class="clearfix">