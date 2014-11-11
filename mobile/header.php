<?php if (nuovo_options('general', 'top-menu')) {?>
	<!--Begin Top Menu-->
	<div id="mobile-top-menu">
		<p class="mobile-menu-text"><a href="#" id="showhidestopmenu">Go to...</a></p>
		<div class="mobile-top-menu-area">
			<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' =>  'top-menu' ) ); ?>
		</div>
	</div>
	<!--End Top Menu-->
<?php } ?>
<!--Begin Header Area-->
<div id="mobile-branding-background" style="<?php if (nuovo_options('general', 'top-menu')) { ?>padding-top:20px;<?php } else { ?>padding-top:0px; <?php } ?>" class="clearfix">
	<div id="mobile-branding">
		<?php if (get_header_image()) { ?>
			<!--Header Logo-->
			<div id="mobile-header" class="clearfix">
				<a href="<?php echo home_url(); ?>"><img src="<?php header_image(); ?>" width="300" alt="" /></a>
			</div>
		<?php } else { ?>
			<!--Header Text-->
			<div class="mobile-header-text">
				<h2 class="mobile-site-title"><a href="<?php echo home_url(); ?>"><?php echo bloginfo('name'); ?></a></h2>
				<h3 class="mobile-site-description"><a href="<?php echo home_url(); ?>"><?php echo bloginfo('description'); ?></a></h3>
			</div>
		<?php } ?>
	</div>
	<!--Begin Social Area-->
	<div id="mobile-social-area" class="clearfix">
		<?php if (nuovo_options('social', 'facebook')) { ?>
			<div class="mobile-social-icon">
				<a href="<?php echo nuovo_options('social', 'facebook'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/facebook.png" width="100%" alt="<?php echo bloginfo('name'); ?> on Facebook" />
				</a>
			</div>
		<?php } ?>
		<?php if (nuovo_options('social', 'twitter')) {?>
			<div class="mobile-social-icon">
				<a href="<?php echo nuovo_options('social', 'twitter'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/twitter.png" width="100%" alt="<?php echo bloginfo('name'); ?> on Twitter" />
				</a>
			</div>
		<?php } ?>
		<div class="mobile-social-icon">
		<a href="<?php if (nuovo_options('general', 'rss_feed')) { echo nuovo_options('general', 'rss_feed'); } else { echo get_feed_link( 'rss' ); }?>">
			<img src="<?php echo get_template_directory_uri(); ?>/images/rss.png" width="100%" alt="<?php echo bloginfo('name'); ?>'s RSS Feed" />
		</a>
		</div>
		<?php if (nuovo_options('social', 'youtube')) { ?>
			<div class="mobile-social-icon">
				<a href="<?php echo nuovo_options('social', 'youtube'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/youtube.PNG" width="100%" alt="<?php echo bloginfo('name'); ?> on Youtube" />
				</a>
			</div>
		<?php } ?>
		<?php if (nuovo_options('social', 'googleplus')) { ?>
			<div class="mobile-social-icon">
				<a href="<?php echo nuovo_options('social', 'googleplus'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/googleplus.png" width="100%" alt="<?php echo bloginfo('name'); ?> on Google+" />
				</a>
			</div>
		<?php } ?>
		<?php if (nuovo_options('social', 'linkedin')) { ?>
			<div class="mobile-social-icon">
				<a href="<?php echo nuovo_options('social', 'linkedin'); ?>">
					<img src="<?php echo get_template_directory_uri(); ?>/images/linkedin.png" width="100%" alt="<?php echo bloginfo('name'); ?> on LinkedIn" />
				</a>
			</div>
		<?php } ?>
	</div>
	<!--End Social Area-->
</div>
<!--End Header Area-->
<!--Begin Main Menu-->
<div id="mobile-main-menu">
	<p class="mobile-menu-text"><a href="#" id="showhidesmainmenu">Go to...</a></p>
	<div class="mobile-main-menu-area">
		<?php wp_nav_menu( array( 'sort_column' => 'menu_order', 'theme_location' =>  'main-menu' ) ); ?>
	</div>
</div>
<!--End Main Menu-->