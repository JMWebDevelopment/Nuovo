<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
<title><?php wp_title('|', true, 'right'); ?></title>
<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<?php nuovo_menu_container(); ?>
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>
<?php if (nuovo_options('top-menu') == 1) { ?>
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
	<!--Begin Top Menu-->
	<div id="mobile-top-menu">
		<p class="mobile-menu-text"><a href="#" id="showhidestopmenu"><?php _e('Go to...' ,'nuovo'); ?></a></p>
		<div class="mobile-top-menu-area">
			<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' =>  'top-menu' ) ); ?>
		</div>
	</div>
	<!--End Top Menu-->
<?php } ?>
<!--Begin Header Logo Area-->
<div id="branding-background" class="clearfix" style="<?php if (nuovo_options('top-menu') == 1) { ?>padding-top:40px;<?php } else { ?>padding-top:0px; <?php } ?>">
	<div id="branding">
			<?php if (get_header_image()) { ?>
				<!--Logo Header-->
				<div id="header">
					<a href="<?php echo esc_url(home_url()); ?>"><img src="<?php header_image(); ?>" height="<?php echo get_custom_header()->height; ?>" width="<?php echo get_custom_header()->width; ?>" alt="" /></a>
				</div>
			<?php } else { ?>
				<!--Text Header-->
				<div class="header-text clearfix">
					<h2 class="site-title"><a href="<?php echo esc_url(home_url()); ?>"><?php echo bloginfo('name'); ?></a></h2>
					<h3 class="site-description"><a href="<?php echo esc_url(home_url()); ?>"><?php echo bloginfo('description'); ?></a></h3>
				</div>
			<?php } ?>
		<!--Begin Social Area-->
		<div id="social-area">
			<?php if (nuovo_options('facebook')) { ?>
				<div class="social-icon">
					<a href="<?php echo nuovo_options('facebook'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" alt="<?php echo bloginfo('name'); ?> on Facebook" />
					</a>
				</div>
			<?php } ?>
			<?php if (nuovo_options('twitter')) {?>
				<div class="social-icon">
					<a href="<?php echo nuovo_options('twitter'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" alt="<?php echo bloginfo('name'); ?> on Twitter" />
					</a>
				</div>
			<?php } ?>
			<div class="social-icon">
				<a href="<?php if (nuovo_options('rss-feed')) { echo nuovo_options('rss-feed'); } else { echo get_feed_link( 'rss' ); }?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" alt="<?php echo bloginfo('name'); ?>'s RSS Feed" />
				</a>
			</div>
			<?php if (nuovo_options('youtube')) { ?>
				<div class="social-icon">
					<a href="<?php echo nuovo_options('youtube'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/youtube.PNG" alt="<?php echo bloginfo('name'); ?> on YouTube" />
					</a>
				</div>
			<?php } ?>
			<?php if (nuovo_options('googleplus')) { ?>
				<div class="social-icon">
					<a href="<?php echo nuovo_options('googleplus'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/googleplus.png" alt="<?php echo bloginfo('name'); ?> on Google+" />
					</a>
				</div>
			<?php } ?>
			<?php if (nuovo_options('linkedin')) { ?>
				<div class="social-icon">
					<a href="<?php echo nuovo_options('linkedin'); ?>">
						<img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" alt="<?php echo bloginfo('name'); ?> on LinkedIn" />
					</a>
				</div>
			<?php } ?>
		</div>
		<!--End Social Area-->
	</div>
</div>
<!--End Header Logo Area-->
<!--Begin Header Area-->
<div id="mobile-branding-background" style="<?php if (nuovo_options('top-menu') == 1) { ?>padding-top:20px;<?php } else { ?>padding-top:0px; <?php } ?>" class="clearfix">
	<div id="mobile-branding">
		<?php if (get_header_image()) { ?>
			<!--Header Logo-->
			<div id="mobile-header" class="clearfix">
				<a href="<?php echo esc_url(home_url()); ?>"><img src="<?php header_image(); ?>" width="300" alt="" /></a>
			</div>
		<?php } else { ?>
			<!--Header Text-->
			<div class="mobile-header-text">
				<h2 class="mobile-site-title"><a href="<?php echo esc_url(home_url()); ?>"><?php echo bloginfo('name'); ?></a></h2>
				<h3 class="mobile-site-description"><a href="<?php echo esc_url(home_url()); ?>"><?php echo bloginfo('description'); ?></a></h3>
			</div>
		<?php } ?>
	</div>
	<!--Begin Social Area-->
	<div id="mobile-social-area" class="clearfix">
		<?php if (nuovo_options('facebook')) { ?>
			<div class="mobile-social-icon">
				<a href="<?php echo nuovo_options('facebook'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" width="100%" alt="<?php echo bloginfo('name'); ?> on Facebook" />
				</a>
			</div>
		<?php } ?>
		<?php if (nuovo_options('twitter')) {?>
			<div class="mobile-social-icon">
				<a href="<?php echo nuovo_options('twitter'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" width="100%" alt="<?php echo bloginfo('name'); ?> on Twitter" />
				</a>
			</div>
		<?php } ?>
		<div class="mobile-social-icon">
		<a href="<?php if (nuovo_options('rss-feed')) { echo nuovo_options('rss-feed'); } else { echo get_feed_link( 'rss' ); }?>">
			<img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" width="100%" alt="<?php echo bloginfo('name'); ?>'s RSS Feed" />
		</a>
		</div>
		<?php if (nuovo_options('youtube')) { ?>
			<div class="mobile-social-icon">
				<a href="<?php echo nuovo_options('youtube'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/youtube.PNG" width="100%" alt="<?php echo bloginfo('name'); ?> on Youtube" />
				</a>
			</div>
		<?php } ?>
		<?php if (nuovo_options('googleplus')) { ?>
			<div class="mobile-social-icon">
				<a href="<?php echo nuovo_options('googleplus'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/googleplus.png" width="100%" alt="<?php echo bloginfo('name'); ?> on Google+" />
				</a>
			</div>
		<?php } ?>
		<?php if (nuovo_options('linkedin')) { ?>
			<div class="mobile-social-icon">
				<a href="<?php echo nuovo_options('linkedin'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" width="100%" alt="<?php echo bloginfo('name'); ?> on LinkedIn" />
				</a>
			</div>
		<?php } ?>
	</div>
	<!--End Social Area-->
</div>
<!--End Header Area-->
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
<!--Begin Main Menu-->
<div id="mobile-main-menu">
	<p class="mobile-menu-text"><a href="#" id="showhidesmainmenu"><?php _e('Go to...', 'nuovo'); ?></a></p>
	<div class="mobile-main-menu-area">
		<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' =>  'main-menu' ) ); ?>
	</div>
</div>
<!--End Main Menu-->
<div id="wrapper" class="clearfix">