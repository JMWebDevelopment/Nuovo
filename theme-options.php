<?php
	
function nuovo_create_theme_page() {
	add_theme_page('Nuovo Theme Options', 'Theme Options', 'edit_theme_options', 'nuovo_options', 'nuovo_build_options_page');
}

add_action('admin_menu', 'nuovo_create_theme_page');

function nuovo_build_options_page() { 
?>
	<div class="wrap">
		<div id="icon-themes" class="icon32"></div>
		<h2>Nuovo Theme Options</h2>
		
		<?php settings_errors(); ?>
		<?php if (isset($_GET['tab'])){
			$active_tab = $_GET['tab'];
		}
		else {
			$active_tab = 'general_options';
		}?>
		
		<h2 class="nav-tab-wrapper">
			<a href="?page=nuovo_options&tab=general_options" class="nav-tab <?php echo $active_tab == 'general_options' ? 'nav-tab-active' : ''; ?>">General Options</a>
			<a href="?page=nuovo_options&tab=social_options" class="nav-tab <?php echo $active_tab == 'social_options' ? 'nav-tab-active' : ''; ?>">Social Options</a>
			<a href="?page=nuovo_options&tab=homepage_options" class="nav-tab <?php echo $active_tab == 'homepage_options' ? 'nav-tab-active' : ''; ?>">Homepage Options</a>
		</h2>
		
		<form method="post" action="options.php">
			<?php
				if ($active_tab == 'general_options'){
					settings_fields('nuovo_theme_general_options');
					do_settings_sections('nuovo_theme_general_options');
				}
				elseif ($active_tab == 'social_options') {
					settings_fields('nuovo_theme_social_options');
					do_settings_sections('nuovo_theme_social_options');
				}
				else {
					settings_fields('nuovo_theme_homepage_options');
					do_settings_sections('nuovo_theme_homepage_options');
				}
				submit_button();
			?>
		</form>
	</div>
<?php	
}

function nuovo_initialize_theme_options() {
	if (false == get_option('nuovo_theme_general_options')) {
		add_option('nuovo_theme_general_options');
	}
	
	// Add the General Settings Section
	add_settings_section('general_settings_section', 'General Settings', 'nuovo_general_settings_callback', 'nuovo_theme_general_options');
	
	// Add Google Analytics Field
	add_settings_field('google-analytics', 'Google Analytics Code', 'nuovo_google_analytics_callback', 'nuovo_theme_general_options', 'general_settings_section', array('Put your Google Analytics tracking code here.'));
	
	// Add Field to Input RSS Feed
	add_settings_field('rss-feed', 'RSS Feed', 'nuovo_rss_feed_callback', 'nuovo_theme_general_options', 'general_settings_section');
	
	// Add the Color Theme Option
	add_settings_field('color-theme', 'Color Theme', 'nuovo_color_theme_callback', 'nuovo_theme_general_options', 'general_settings_section');
	
	// Add the Top Menu Option
	add_settings_field('top-menu', 'Display Top Menu', 'nuovo_top_menu_callback', 'nuovo_theme_general_options', 'general_settings_section', array('Display the top menu.'));
	
	// Add the Author Bio Option
	add_settings_field('author-bio', 'Display Author Bio', 'nuovo_author_bio_callback', 'nuovo_theme_general_options', 'general_settings_section', array('Display the author bio on single posts.'));
	
	// Register the Fields
	register_setting('nuovo_theme_general_options', 'nuovo_theme_general_options');
	
	
}
add_action('admin_init', 'nuovo_initialize_theme_options');

function nuovo_general_settings_callback() {
	echo '<p>Here are the general settings.</p>';
}

function nuovo_google_analytics_callback($args) {
	$options = get_option('nuovo_theme_general_options');
	if (isset($options['google-analytics'])) { $opt = $options['google-analytics']; } else { $opt = ''; }
	$html = '<textarea cols="50" rows="8" name="nuovo_theme_general_options[google-analytics]" id="google-analytics">' . $opt . '</textarea>';
	echo $html;
}

function nuovo_rss_feed_callback() {
	$options = get_option('nuovo_theme_general_options');
	if (isset($options['rss-feed'])) { $opt = $options['rss-feed']; } else { $opt = ''; }
	$html = '<input type="text" name="nuovo_theme_general_options[rss-feed]" id="rss-feed" value="' . $opt . '" size="70" />';
	echo $html;
}

function nuovo_color_theme_callback() {
	$options = get_option('nuovo_theme_general_options');
	if (isset($options['color-theme'])) { $opt = $options['color-theme']; } else { $opt = ''; }
	$html = '<select id="color-theme" name="nuovo_theme_general_options[color-theme]">';
	$html .= '<option value="default"' . nuovo_selected( $opt, 'default') . '>' . __( 'Default', 'sandbox' ) . '</option>';
	$html .= '<option value="blue"' . nuovo_selected( $opt, 'blue') . '>' . __( 'Blue', 'sandbox' ) . '</option>';
	$html .= '<option value="green"' . nuovo_selected( $opt, 'green') . '>' . __( 'Green', 'sandbox' ) . '</option>';
	$html .= '<option value="orange"' . nuovo_selected( $opt, 'orange') . '>' . __( 'Orange', 'sandbox' ) . '</option>';
	$html .= '<option value="purple"' . nuovo_selected( $opt, 'purple') . '>' . __( 'Purple', 'sandbox' ) . '</option>';
	$html .= '<option value="red"' . nuovo_selected( $opt, 'red') . '>' . __( 'Red', 'sandbox' ) . '</option>';
	$html .= '<option value="yellow"' . nuovo_selected( $opt, 'yellow') . '>' . __( 'Yellow', 'sandbox' ) . '</option>';
	$html .= '</select>';
	echo $html;
	
}

function nuovo_top_menu_callback($args) {
	$options = get_option('nuovo_theme_general_options');
	if (isset($options['top-menu'])) { $opt = $options['top-menu']; } else { $opt = '';}
	$html = '<input type="checkbox" id="top-menu" name="nuovo_theme_general_options[top-menu]" value="1" ' . nuovo_checked($opt) . '>';
	$html .= '<label for="nuovo_theme_general_options[top-menu]">' . $args[0] . '</label>';
	echo $html;
}

function nuovo_author_bio_callback($args) {
	$options = get_option('nuovo_theme_general_options');
	if (isset($options['author-bio'])) { $opt = $options['author-bio']; } else { $opt = '';}
	$html = '<input type="checkbox" id="author-bio" name="nuovo_theme_general_options[author-bio]" value="1" ' . nuovo_checked($opt) . '>';
	$html .= '<label for="nuovo_theme_general_options[author-bio]">' . $args[0] . '</label>';
	echo $html;
}

function nuovo_initialize_social_options() {
	if (false == get_option('nuovo_theme_social_options')) {
		add_option('nuovo_theme_social_options');
	}
	
	// Add the Social Options Section
	add_settings_section('social_options_section', 'Social Options', 'nuovo_social_options_callback', 'nuovo_theme_social_options');

	// Add the Facebook Option
	add_settings_field('facebook', 'Facebook Link', 'nuovo_facebook_callback', 'nuovo_theme_social_options', 'social_options_section');
	
	// Add the Twitter Option
	add_settings_field('twitter', 'Twitter Link', 'nuovo_twitter_callback', 'nuovo_theme_social_options', 'social_options_section');
	
	// Add the YouTube Option
	add_settings_field('youtube', 'YouTube Link', 'nuovo_youtube_callback', 'nuovo_theme_social_options', 'social_options_section');
	
	// Add the Google Plus Option
	add_settings_field('googleplus', 'Google Plus Link', 'nuovo_googleplus_callback', 'nuovo_theme_social_options', 'social_options_section');
	
	// Add the LinkedIn Option
	add_settings_field('linkedin', 'LinkedIn Link', 'nuovo_linkedin_callback', 'nuovo_theme_social_options', 'social_options_section');
	
	// Register the Fields
	register_setting('nuovo_theme_social_options', 'nuovo_theme_social_options');
}
add_action('admin_init', 'nuovo_initialize_social_options');

function nuovo_social_options_callback() {
	echo '<p>Enter links to the social media sites you are a part of.</p>';
}

function nuovo_facebook_callback() {
	$options = get_option('nuovo_theme_social_options');
	if (isset($options['facebook'])) { $opt = $options['facebook']; } else { $opt = ''; }
	
	echo '<input type="text" id="facebook" name="nuovo_theme_social_options[facebook]" value="' . $opt . '" size="70" />';
}

function nuovo_twitter_callback() {
	$options = get_option('nuovo_theme_social_options');
	if (isset($options['twitter'])) { $opt = $options['twitter']; } else { $opt = ''; }
	
	echo '<input type="text" id="twitter" name="nuovo_theme_social_options[twitter]" value="' . $opt . '" size="70" />';
}

function nuovo_youtube_callback() {
	$options = get_option('nuovo_theme_social_options');
	if (isset($options['youtube'])) { $opt = $options['twitter']; } else { $opt = ''; }
	
	echo '<input type="text" id="youtube" name="nuovo_theme_social_options[youtube]" value="' . $opt . '" size="70" />';
}

function nuovo_googleplus_callback() {
	$options = get_option('nuovo_theme_social_options');
	if (isset($options['googleplus'])) { $opt = $options['googleplus']; } else { $opt = ''; }
	
	echo '<input type="text" id="googleplus" name="nuovo_theme_social_options[googleplus]" value="' . $opt . '" size="70" />';
}

function nuovo_linkedin_callback() {
	$options = get_option('nuovo_theme_social_options');
	if (isset($options['linkedin'])) { $opt = $options['linkedin']; } else { $opt = ''; }
	
	echo '<input type="text" id="linkedin" name="nuovo_theme_social_options[linkedin]" value="' . $opt . '" size="70" />';
}

function nuovo_initialize_homepage_options() {
	if (false == get_option('nuovo_theme_homepage_options')) {
		add_option('nuovo_theme_homepage_options');
	}
	
	// Add the Social Options Section
	add_settings_section('homepage_options_section', 'Homepage Options', 'nuovo_homepage_options_callback', 'nuovo_theme_homepage_options');
	
	// Add Featured Post Slider Category Option
	add_settings_field('slideshow-category', 'Category for Slideshow', 'nuovo_slideshow_category_callback', 'nuovo_theme_homepage_options', 'homepage_options_section');

	// Add the Featured Post Slider Count Option
	add_settings_field('slideshow-count', 'Number of Posts for Slideshow', 'nuovo_slideshow_count_callback', 'nuovo_theme_homepage_options', 'homepage_options_section');

	// Add Category One Option
	add_settings_field('category-one', 'First Category', 'nuovo_category_one_callback', 'nuovo_theme_homepage_options', 'homepage_options_section');

	// Add the Category One Count Option
	add_settings_field('category-one-count', 'Number of Posts for Category One', 'nuovo_category_one_count_callback', 'nuovo_theme_homepage_options', 'homepage_options_section');
	
	// Add Category Two Option
	add_settings_field('category-two', 'Second Category', 'nuovo_category_two_callback', 'nuovo_theme_homepage_options', 'homepage_options_section');

	// Add the Category Two Count Option
	add_settings_field('category-two-count', 'Number of Posts for Category Two', 'nuovo_category_two_count_callback', 'nuovo_theme_homepage_options', 'homepage_options_section');
	
	// Add Category Three Option
	add_settings_field('category-three', 'Third Category', 'nuovo_category_three_callback', 'nuovo_theme_homepage_options', 'homepage_options_section');

	// Add the Category Three Count Option
	add_settings_field('category-three-count', 'Number of Posts for Category Three', 'nuovo_category_three_count_callback', 'nuovo_theme_homepage_options', 'homepage_options_section');
	
	// Add Category Four Option
	add_settings_field('category-four', 'Fourth Category', 'nuovo_category_four_callback', 'nuovo_theme_homepage_options', 'homepage_options_section');

	// Add the Category Four Count Option
	add_settings_field('category-four-count', 'Number of Posts for Category Four', 'nuovo_category_four_count_callback', 'nuovo_theme_homepage_options', 'homepage_options_section');
	
	// Add the Latest Posts Count Option
	add_settings_field('latest-posts-count', 'Number of Latest Posts', 'nuovo_latest_posts_count_callback', 'nuovo_theme_homepage_options', 'homepage_options_section');
	
	// Register the Fields
	register_setting('nuovo_theme_homepage_options', 'nuovo_theme_homepage_options');
}
add_action('admin_init', 'nuovo_initialize_homepage_options');

function nuovo_homepage_options_callback() {
	echo '<p>Here are the options for the homepage.</p>';
}

function nuovo_slideshow_category_callback(){
	$options = get_option('nuovo_theme_homepage_options');
	if (isset($options['slideshow-category'])) { $opt = $options['slideshow-category']; } else { $opt = ''; }
	wp_dropdown_categories(array('selected' => $opt, 'name' => 'nuovo_theme_homepage_options[slideshow-category]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'studiopress'), 'hide_empty' => '0' ));
}

function nuovo_slideshow_count_callback() {
	$options = get_option('nuovo_theme_homepage_options');
	if (isset($options['slideshow-count'])) { $opt = $options['slideshow-count']; } else { $opt = ''; }
	$html = '<input type="text" name="nuovo_theme_homepage_options[slideshow-count]" id="slideshow-count" value="' . $opt . '" size="2" />';
	echo $html;
}

function nuovo_category_one_callback(){
	$options = get_option('nuovo_theme_homepage_options');
	if (isset($options['category-one'])) { $opt = $options['category-one']; } else { $opt = ''; }
	wp_dropdown_categories(array('selected' => $opt, 'name' => 'nuovo_theme_homepage_options[category-one]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'studiopress'), 'hide_empty' => '0' ));
}

function nuovo_category_one_count_callback() {
	$options = get_option('nuovo_theme_homepage_options');
	if (isset($options['category-one-count'])) { $opt = $options['category-one-count']; } else { $opt = ''; }
	$html = '<input type="text" name="nuovo_theme_homepage_options[category-one-count]" id="category-one-count" value="' . $opt . '" size="2" />';
	echo $html;
}

function nuovo_category_two_callback(){
	$options = get_option('nuovo_theme_homepage_options');
	if (isset($options['category-two'])) { $opt = $options['category-two']; } else { $opt = ''; }
	wp_dropdown_categories(array('selected' => $opt, 'name' => 'nuovo_theme_homepage_options[category-two]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'studiopress'), 'hide_empty' => '0' ));
}

function nuovo_category_two_count_callback() {
	$options = get_option('nuovo_theme_homepage_options');
	if (isset($options['category-two-count'])) { $opt = $options['category-two-count']; } else { $opt = ''; }
	$html = '<input type="text" name="nuovo_theme_homepage_options[category-two-count]" id="category-two-count" value="' . $opt . '" size="2" />';
	echo $html;
}

function nuovo_category_three_callback(){
	$options = get_option('nuovo_theme_homepage_options');
	if (isset($options['category-three'])) { $opt = $options['category-three']; } else { $opt = ''; }
	wp_dropdown_categories(array('selected' => $opt, 'name' => 'nuovo_theme_homepage_options[category-three]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'studiopress'), 'hide_empty' => '0' ));
}

function nuovo_category_three_count_callback() {
	$options = get_option('nuovo_theme_homepage_options');
	if (isset($options['category-three-count'])) { $opt = $options['category-three-count']; } else { $opt = ''; }
	$html = '<input type="text" name="nuovo_theme_homepage_options[category-three-count]" id="category-three-count" value="' . $opt . '" size="2" />';
	echo $html;
}

function nuovo_category_four_callback(){
	$options = get_option('nuovo_theme_homepage_options');
	if (isset($options['category-four'])) { $opt = $options['category-four']; } else { $opt = ''; }
	wp_dropdown_categories(array('selected' => $opt, 'name' => 'nuovo_theme_homepage_options[category-four]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'studiopress'), 'hide_empty' => '0' ));
}

function nuovo_category_four_count_callback() {
	$options = get_option('nuovo_theme_homepage_options');
	if (isset($options['category-four-count'])) { $opt = $options['category-four-count']; } else { $opt = ''; }
	$html = '<input type="text" name="nuovo_theme_homepage_options[category-four-count]" id="category-four-count" value="' . $opt . '" size="2" />';
	echo $html;
}

function nuovo_latest_posts_count_callback() {
	$options = get_option('nuovo_theme_homepage_options');
	if (isset($options['latest-posts-count'])) { $opt = $options['latest-posts-count']; } else { $opt = '0'; }
	$html = '<input type="text" name="nuovo_theme_homepage_options[latest-posts-count]" id="latest-posts-count" value="' . $opt . '" size="2" />';
	echo $html;
}
?>