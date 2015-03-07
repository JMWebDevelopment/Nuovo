<?php 
// Create the theme options page
function nuovo_create_theme_options_page(){
	add_theme_page(__('Nuovo Theme Options', 'nuovo'),__('Theme Options', 'nuovo'),'edit_theme_options','nuovo_options','nuovo_build_options_page');
}
add_action('admin_menu','nuovo_create_theme_options_page');

// Register the scripts needed for the theme options page
function my_admin_scripts() {
	if (isset($_GET['page']) && $_GET['page'] == 'nuovo_options') {
   		wp_enqueue_script('jquery-ui');
        wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('option-tabs', get_template_directory_uri() . '/js/options-tabs.js');
		wp_enqueue_style('option-styles', get_template_directory_uri() . '/admin/options-style.css');
    }
}
add_action('admin_enqueue_scripts', 'my_admin_scripts');

// Register the settings and set a callback function to sanitize the options
function nuovo_register_settings(){
	register_setting('nuovo_theme_options', 'nuovo_options', 'nuovo_validate_options');
}
add_action('admin_init','nuovo_register_settings');

// Assign Default Values
function nuovo_get_option_defaults(){
	$defaults = array(
		'rss-feed' => '',
		'color-theme' => 'default',
		'top-menu' => '',
		'author-bio' => '',
		'facebook' => '',
		'twitter' => '   ',
		'youtube' => '',
		'googleplus' => '',
		'linkedin' => '',
		'slideshow-category' => '',
		'slideshow-count' => '4',
		'category-one' => '',
		'category-one-count' => '3',
		'category-two' => '',
		'category-two-count' => '3',
		'category-three' => '',
		'category-three-count' => '3',
		'category-four' => '',
		'category-four-count' => '3',
		'latest-posts-count' => '10'
	);
	return apply_filters('nuovo_option_defaults', $defaults);
}


// Add the color theme options into an array
$nuovo_colors = array(
	'default' => array(
		'value' => 'default',
		'label' => 'Default'
	),
	'blue' => array(
		'value' => 'blue',
		'label' => 'Blue'
	),
	'green' => array(
		'value' => 'green',
		'label' => 'Green'
	),
	'orange' => array(
		'value' => 'orange',
		'label' => 'Orange'
	),
	'purple' => array(
		'value' => 'purple',
		'label' => 'Purple'
	),
	'red' => array(
		'value' => 'red',
		'label' => 'Red'
	),
	'yellow' => array(
		'value' => 'yellow',
		'label' => 'Yellow'
	),
);

// Create the theme options form
function nuovo_build_options_page(){
	
	global $nuovo_options, $nuovo_colors;

	if (!isset($_REQUEST['updated'])){
		$_REQUEST['updated'] = false;
	}
	?>
	<div class="wrap">
		<?php echo "<h2>" . __( 'Nuovo Theme Options', 'nuovo' ) . "</h2>"; ?>
		<?php if (false !== $_REQUEST['updated']) { ?>
			<div class="updated fade"><p><strong><?php _e( 'Options saved' ); ?></strong></p></div>
		<?php } ?>
		<div id="tab-wrap">
		<form method="post" action="options.php">
			<?php $settings = wp_parse_args(
				get_option('nuovo_options', array()), nuovo_get_option_defaults()
			); ?>
			<?php settings_fields('nuovo_theme_options'); ?>
			<!--Tabs to go here -->
			<ul>
				<li class="nav-tab"><a href="#tab-general">General</a></li>
				<li class="nav-tab"><a href="#tab-social">Social</a></li>
				<li class="nav-tab"><a href="#tab-homepage">Homepage</a></li>
			</ul>
			<!--General options here-->
			<div id="tab-general">
				<table>
					<!-- RSS Feed-->
					<tr valign="top">
						<th scope="row"><label for="rss-feed"><?php _e('RSS Feed', 'nuovo'); ?></label></th>
						<td><input id="rss-feed" name="nuovo_options[rss-feed]" type="text" value="<?php esc_attr_e($settings['rss-feed']); ?>" /></td>
					</tr>
					<!-- Color Theme-->
					<tr valign="top">
						<th scope="row"><label for="color-theme"><?php _e('Color Theme', 'nuovo'); ?></label></th>
						<td>
							<select id="color-theme" name="nuovo_options[color-theme]">
								<?php
								foreach($nuovo_colors as $color){
									$label = $color['label'];
									$selected = "";
									if ($color['value'] == $settings['color-theme']) {
										$selected = 'selected="selected"';
									}
									echo '<option value="' . esc_attr($color['value']) . '" ' . $selected . '>' . $label . '</option>';
								}
								?>
							</select>
						</td>
					</tr>
					<!--Top Menu-->
					<tr valign="top">
						<th scope="row"><label for="top-menu"><?php _e('Top Menu', 'nuovo'); ?></label></th>
						<td><input type="checkbox" id="top-menu" name="nuovo_options[top-menu]" value="1" <?php checked(true, $settings['top-menu']); ?> /></td>
					</tr>
					<!--Author Bio-->
					<tr valign="top">
						<th scope="row"><label for="author-bio"><?php _e('Author Bio', 'nuovo'); ?></label></th>
						<td><input type="checkbox" id="author-bio" name="nuovo_options[author-bio]" value="1" <?php checked(true, $settings['author-bio']); ?> /></td>
					</tr>
				</table>
			</div>
			<!--Social options here-->
			<div id="tab-social">
				<table>
					<!-- Facebook Link -->
					<tr valign="top">
						<th scope="row"><label for="facebook"><?php _e('Facebook', 'nuovo'); ?></label></th>
						<td><input id="facebook" name="nuovo_options[facebook]" type="text" value="<?php esc_attr_e($settings['facebook']); ?>" /></td>
					</tr>
					<!--Twitter Link-->
					<tr valign="top">
						<th scope="row"><label for="twitter"><?php _e('Twitter Link', 'nuovo'); ?></label></th>
						<td><input id="twitter" name="nuovo_options[twitter]" type="text" value="<?php esc_attr_e($settings['twitter']); ?>" /></td>
					</tr>
					<!--YouTube Link-->
					<tr valign="top">
						<th scope="row"><label for="youtube"><?php _e('YouTube Link', 'nuovo'); ?></label></th>
						<td><input id="youtube" name="nuovo_options[youtube]" type="text" value="<?php esc_attr_e($settings['youtube']); ?>" /></td>
					</tr>
					<!--Google Plus Link-->
					<tr valign="top">
						<th scope="row"><label for="googleplus"><?php _e('Google+ Link', 'nuovo'); ?></label></th>
						<td><input id="googleplus" name="nuovo_options[googleplus]" type="text" value="<?php esc_attr_e($settings['googleplus']); ?>" /></td>
					</tr>
					<!--LinkedIn Link-->
					<tr valign="top">
						<th scope="row"><label for="linkedin"><?php _e('LinkedIn', 'nuovo'); ?></label></th>
						<td><input id="linkedin" name="nuovo_options[linkedin]" type="text" value="<?php esc_attr_e($settings['linkedin']); ?>" /></td>
					</tr>
				</table>
			</div>
			<!--Homepage options here-->
			<div id="tab-homepage">
				<table>
					<tr valign="top">
						<th scope="row"><label for="slideshow-category"><?php _e('Slideshow Category', 'nuovo'); ?></label></th>
						<td><?php wp_dropdown_categories(array('selected' => $settings['slideshow-category'], 'name' => 'nuovo_options[slideshow-category]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'nuovo'), 'hide_empty' => '0' )); ?></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="slideshow-count"><?php _e('Number of posts for the slideshow', 'nuovo'); ?></label></th>
						<td><input id="slideshow-count" name="nuovo_options[slideshow-count]" type="number" min="-1" value="<?php esc_attr_e($settings['slideshow-count']) ?>" size="2"/></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="category-one"><?php _e('First Category', 'nuovo'); ?></label></th>
						<td><?php wp_dropdown_categories(array('selected' => $settings['category-one'], 'name' => 'nuovo_options[category-one]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'nuovo'), 'hide_empty' => '0' )); ?></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="category-one-count"><?php _e('Number of posts for Category One', 'nuovo'); ?></label></th>
						<td><input id="category-one-count" name="nuovo_options[category-one-count]" type="number" min="-1" value="<?php esc_attr_e($settings['category-one-count']) ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="category-two"><?php _e('Second Category', 'nuovo'); ?></label></th>
						<td><?php wp_dropdown_categories(array('selected' => $settings['category-two'], 'name' => 'nuovo_options[category-two]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'nuovo'), 'hide_empty' => '0' )); ?></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="category-two-count"><?php _e('Number of posts for Category Two', 'nuovo'); ?></label></th>
						<td><input id="category-two-count" name="nuovo_options[category-two-count]" type="number" min="-1" value="<?php esc_attr_e($settings['category-two-count']) ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="category-three"><?php _e('Third Category', 'nuovo'); ?></label></th>
						<td><?php wp_dropdown_categories(array('selected' => $settings['category-three'], 'name' => 'nuovo_options[category-three]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'nuovo'), 'hide_empty' => '0' )); ?></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="category-three-count"><?php _e('Number of posts for Category Three', 'nuovo'); ?></label></th>
						<td><input id="category-three-count" name="nuovo_options[category-three-count]" type="number" min="-1" value="<?php esc_attr_e($settings['category-three-count']) ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="category-four"><?php _e('Fourth Category', 'nuovo'); ?></label></th>
						<td><?php wp_dropdown_categories(array('selected' => $settings['category-four'], 'name' => 'nuovo_options[category-four]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'nuovo'), 'hide_empty' => '0' )); ?></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="category-four-count"><?php _e('Number of posts for Category Four', 'nuovo'); ?></label></th>
						<td><input id="category-four-count" name="nuovo_options[category-four-count]" type="number" min="-1" value="<?php esc_attr_e($settings['category-four-count']) ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="latest-posts-count"><?php _e('Number of posts for Latest Posts', 'nuovo'); ?></label></th>
						<td><input id="latest-posts-count" name="nuovo_options[latest-posts-count]" type="number" min="-1" value="<?php esc_attr_e($settings['latest-posts-count']) ?>" /></td>
					</tr>
				</table>
			</div>
			<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>
		</form>
		</div>
	</div>

	<?php
}
// Validate and sanitize the options
function nuovo_validate_options($input){
	global $nuovo_options, $nuovo_colors;
	$settings = get_option('nuovo_options', $nuovo_options);
	$cats = get_categories();

	// Validate the input for the RSS feed
	$input['rss-feed'] = wp_filter_nohtml_kses( $input['rss-feed'] );

	// Validate the input for the color theme
	//$prev = $settings['color-theme'];
	//if ( !array_key_exists( $input['color-theme'], $nuovo_colors ) ){
	//	$input['color-theme'] = $prev;
	//}

	// Validate the input for the top menu
	if ( ! isset( $input['top-menu'] ) ){
		$input['top-menu'] = null;
	}
	$input['top-menu'] = ( $input['top-menu'] == 1 ? 1 : 0 );

	// Validate the input for the author bio
	if ( ! isset( $input['author-bio'] ) ){
		$input['author-bio'] = null;
	}
	$input['author-bio'] = ( $input['author-bio'] == 1 ? 1 : 0 );

	// Validate the input for the Facebook Link
	$input['facebook'] = wp_filter_nohtml_kses( $input['facebook'] );

	// Validate the input for the Twitter Link
	$input['twitter'] = wp_filter_nohtml_kses( $input['twitter'] );

	// Validate the input for the YouTube Link
	$input['youtube'] = wp_filter_nohtml_kses( $input['youtube'] );

	// Validate the input for the Google+ Link
	$input['googleplus'] = wp_filter_nohtml_kses( $input['googleplus'] );

	// Validate the input for the LinkedIn Link
	$input['linkedin'] = wp_filter_nohtml_kses( $input['linkedin'] );

	// Validate the input for the Slideshow Category
	$prev = $settings['slideshow-category'];
	if ( !array_key_exists( $input['slideshow-category'], $cats ) ){
		$input['slideshow-category'] = $prev;
	}

	// Validate the input for the Slideshow Category Count
	$input['slideshow-count'] = intval( $input['slideshow-count'] );

	// Validate the input for the First Category
	$prev = $settings['category-one'];
	if ( !array_key_exists( $input['category-one'], $cats ) ){
		$input['category-one'] = $prev;
	}

	// Validate the input for the Category One Count
	$input['category-one-count'] = intval( $input['category-one-count'] );

	// Validate the input for the Second Category
	$prev = $settings['category-two'];
	if ( !array_key_exists( $input['category-two'], $cats ) ){
		$input['category-two'] = $prev;
	}

	// Validate the input for the Category Two Count
	$input['category-two-count'] = intval( $input['category-two-count'] );

	// Validate the input for the Third Category
	$prev = $settings['category-three'];
	if ( !array_key_exists( $input['category-three'], $cats ) ){
		$input['category-three'] = $prev;
	}

	// Validate the input for the Category Three Count
	$input['category-three-count'] = intval( $input['category-three-count'] );

	// Validate the input for the Fourth Category
	$prev = $settings['category-four'];
	if ( !array_key_exists( $input['category-four'], $cats ) ){
		$input['category-four'] = $prev;
	}

	// Validate the input for the Category Four Count
	$input['category-four-count'] = intval( $input['category-four-count'] );

	// Validate the input for the Latest Posts Count
	$input['latest-posts-count'] = intval( $input['latest-posts-count'] );

	return $input;
}
?>