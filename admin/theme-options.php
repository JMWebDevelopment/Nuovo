<?php 
// Create the theme options page
function nuovo_create_theme_options_page(){
	add_theme_page(__('Nuovo Theme Options', 'nuovo'),__('Theme Options', 'nuovo'),'edit_theme_options','nuovo_options','nuovo_build_options_page');
}
add_action('admin_menu','nuovo_create_theme_options_page');

// Register the scripts needed for the theme options page
function nuovo_admin_scripts() {
	if (isset($_GET['page']) && $_GET['page'] == 'nuovo_options') {
   		wp_enqueue_script('jquery-ui');
        wp_enqueue_script('jquery-ui-tabs');
		wp_enqueue_script('nuovo-option-tabs', get_template_directory_uri() . '/js/nuovo-options-tabs.js');
		wp_enqueue_style('nuovo-option-styles', get_template_directory_uri() . '/admin/nuovo-options-style.css');
    }
}
add_action('admin_enqueue_scripts', 'nuovo_admin_scripts');

// Register the settings and set a callback function to sanitize the options
function nuovo_register_settings(){
	register_setting('nuovo_theme_options', 'nuovo_options', 'nuovo_validate_options');
}
add_action('admin_init','nuovo_register_settings');

// Assign Default Values
function nuovo_get_option_defaults(){
	$defaults = array(
		'nuovo-rss-feed' => '',
		'nuovo-color-theme' => 'default',
		'nuovo-top-menu' => '',
		'nuovo-author-bio' => '',
		'nuovo-facebook' => '',
		'nuovo-twitter' => '   ',
		'nuovo-youtube' => '',
		'nuovo-googleplus' => '',
		'nuovo-linkedin' => '',
		'nuovo-slideshow-category' => '',
		'nuovo-slideshow-count' => '4',
		'nuovo-category-one' => '',
		'nuovo-category-one-count' => '3',
		'nuovo-category-two' => '',
		'nuovo-category-two-count' => '3',
		'nuovo-category-three' => '',
		'nuovo-category-three-count' => '3',
		'nuovo-category-four' => '',
		'nuovo-category-four-count' => '3',
		'nuovo-latest-posts-count' => '10'
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
			<div class="updated fade"><p><strong><?php _e( 'Options saved', 'nuovo' ); ?></strong></p></div>
		<?php } ?>
		<div id="tab-wrap">
		<form method="post" action="options.php">
			<?php $settings = wp_parse_args(
				get_option('nuovo_options', array()), nuovo_get_option_defaults()
			); ?>
			<?php settings_fields('nuovo_theme_options'); ?>
			<!--Tabs to go here -->
			<ul>
				<li class="nav-tab"><a href="#tab-general"><?php _e('General' ,'nuovo'); ?></a></li>
				<li class="nav-tab"><a href="#tab-social"><?php _e('Social' ,'nuovo'); ?></a></li>
				<li class="nav-tab"><a href="#tab-homepage"><?php _e('Homepage' ,'nuovo'); ?></a></li>
			</ul>
			<!--General options here-->
			<div id="tab-general">
				<table>
					<!-- RSS Feed-->
					<tr valign="top">
						<th scope="row"><label for="nuovo-rss-feed"><?php _e('RSS Feed', 'nuovo'); ?></label></th>
						<td><input id="nuovo-rss-feed" name="nuovo_options[nuovo-rss-feed]" type="text" value="<?php echo esc_attr($settings['nuovo-rss-feed']); ?>" /></td>
					</tr>
					<!-- Color Theme-->
					<tr valign="top">
						<th scope="row"><label for="nuovo-color-theme"><?php _e('Color Theme', 'nuovo'); ?></label></th>
						<td>
							<select id="nuovo-color-theme" name="nuovo_options[nuovo-color-theme]">
								<?php
								foreach($nuovo_colors as $color){
									$label = $color['label'];
									$selected = "";
									if ($color['value'] == $settings['nuovo-color-theme']) {
										$selected = 'selected="selected"';
									}
									echo '<option value="' . esc_attr($color['value']) . '" ' . $selected . '>' . __($label) . '</option>';
								}
								?>
							</select>
						</td>
					</tr>
					<!--Top Menu-->
					<tr valign="top">
						<th scope="row"><label for="nuovo-top-menu"><?php _e('Top Menu', 'nuovo'); ?></label></th>
						<td><input type="checkbox" id="nuovo-top-menu" name="nuovo_options[nuovo-top-menu]" value="1" <?php checked(true, $settings['nuovo-top-menu']); ?> /></td>
					</tr>
					<!--Author Bio-->
					<tr valign="top">
						<th scope="row"><label for="nuovo-author-bio"><?php _e('Author Bio', 'nuovo'); ?></label></th>
						<td><input type="checkbox" id="nuovo-author-bio" name="nuovo_options[nuovo-author-bio]" value="1" <?php checked(true, $settings['nuovo-author-bio']); ?> /></td>
					</tr>
				</table>
			</div>
			<!--Social options here-->
			<div id="tab-social">
				<table>
					<!-- Facebook Link -->
					<tr valign="top">
						<th scope="row"><label for="nuovo-facebook"><?php _e('Facebook', 'nuovo'); ?></label></th>
						<td><input id="nuovo-facebook" name="nuovo_options[nuovo-facebook]" type="text" value="<?php echo esc_attr($settings['nuovo-facebook']); ?>" /></td>
					</tr>
					<!--Twitter Link-->
					<tr valign="top">
						<th scope="row"><label for="nuovo-twitter"><?php _e('Twitter Link', 'nuovo'); ?></label></th>
						<td><input id="nuovo-twitter" name="nuovo_options[nuovo-twitter]" type="text" value="<?php echo esc_attr($settings['nuovo-twitter']); ?>" /></td>
					</tr>
					<!--YouTube Link-->
					<tr valign="top">
						<th scope="row"><label for="nuovo-youtube"><?php _e('YouTube Link', 'nuovo'); ?></label></th>
						<td><input id="nuovo-youtube" name="nuovo_options[nuovo-youtube]" type="text" value="<?php echo esc_attr($settings['nuovo-youtube']); ?>" /></td>
					</tr>
					<!--Google Plus Link-->
					<tr valign="top">
						<th scope="row"><label for="nuovo-googleplus"><?php _e('Google+ Link', 'nuovo'); ?></label></th>
						<td><input id="nuovo-googleplus" name="nuovo_options[nuovo-googleplus]" type="text" value="<?php echo esc_attr($settings['nuovo-googleplus']); ?>" /></td>
					</tr>
					<!--LinkedIn Link-->
					<tr valign="top">
						<th scope="row"><label for="nuovo-linkedin"><?php _e('LinkedIn', 'nuovo'); ?></label></th>
						<td><input id="nuovo-linkedin" name="nuovo_options[nuovo-linkedin]" type="text" value="<?php echo esc_attr($settings['nuovo-linkedin']); ?>" /></td>
					</tr>
				</table>
			</div>
			<!--Homepage options here-->
			<div id="tab-homepage">
				<table>
					<tr valign="top">
						<th scope="row"><label for="nuovo-slideshow-category"><?php _e('Slideshow Category', 'nuovo'); ?></label></th>
						<td><?php wp_dropdown_categories(array('selected' => esc_attr($settings['nuovo-slideshow-category']), 'name' => 'nuovo_options[nuovo-slideshow-category]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'nuovo'), 'hide_empty' => '0' )); ?></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="nuovo-slideshow-count"><?php _e('Number of posts for the slideshow', 'nuovo'); ?></label></th>
						<td><input id="nuovo-slideshow-count" name="nuovo_options[nuovo-slideshow-count]" type="number" min="-1" value="<?php echo esc_attr($settings['nuovo-slideshow-count']) ?>" size="2"/></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="nuovo-category-one"><?php _e('First Category', 'nuovo'); ?></label></th>
						<td><?php wp_dropdown_categories(array('selected' => esc_attr($settings['nuovo-category-one']), 'name' => 'nuovo_options[nuovo-category-one]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'nuovo'), 'hide_empty' => '0' )); ?></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="nuovo-category-one-count"><?php _e('Number of posts for Category One', 'nuovo'); ?></label></th>
						<td><input id="nuovo-category-one-count" name="nuovo_options[nuovo-category-one-count]" type="number" min="-1" value="<?php echo esc_attr($settings['nuovo-category-one-count']) ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="nuovo-category-two"><?php _e('Second Category', 'nuovo'); ?></label></th>
						<td><?php wp_dropdown_categories(array('selected' => esc_attr($settings['nuovo-category-two']), 'name' => 'nuovo_options[nuovo-category-two]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'nuovo'), 'hide_empty' => '0' )); ?></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="nuovo-category-two-count"><?php _e('Number of posts for Category Two', 'nuovo'); ?></label></th>
						<td><input id="nuovo-category-two-count" name="nuovo_options[nuovo-category-two-count]" type="number" min="-1" value="<?php echo esc_attr($settings['nuovo-category-two-count']) ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="nuovo-category-three"><?php _e('Third Category', 'nuovo'); ?></label></th>
						<td><?php wp_dropdown_categories(array('selected' => esc_attr($settings['nuovo-category-three']), 'name' => 'nuovo_options[nuovo-category-three]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'nuovo'), 'hide_empty' => '0' )); ?></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="nuovo-category-three-count"><?php _e('Number of posts for Category Three', 'nuovo'); ?></label></th>
						<td><input id="nuovo-category-three-count" name="nuovo_options[nuovo-category-three-count]" type="number" min="-1" value="<?php echo esc_attr($settings['nuovo-category-three-count']) ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="nuovo-category-four"><?php _e('Fourth Category', 'nuovo'); ?></label></th>
						<td><?php wp_dropdown_categories(array('selected' => esc_attr($settings['nuovo-category-four']), 'name' => 'nuovo_options[nuovo-category-four]', 'orderby' => 'name', 'hierarchical' => 1, 'show_option_none' => __("None", 'nuovo'), 'hide_empty' => '0' )); ?></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="nuovo-category-four-count"><?php _e('Number of posts for Category Four', 'nuovo'); ?></label></th>
						<td><input id="nuovo-category-four-count" name="nuovo_options[nuovo-category-four-count]" type="number" min="-1" value="<?php echo esc_attr($settings['nuovo-category-four-count']) ?>" /></td>
					</tr>
					<tr valign="top">
						<th scope="row"><label for="nuovo-latest-posts-count"><?php _e('Number of posts for Latest Posts', 'nuovo'); ?></label></th>
						<td><input id="nuovo-latest-posts-count" name="nuovo_options[nuovo-latest-posts-count]" type="number" min="-1" value="<?php echo esc_attr($settings['nuovo-latest-posts-count']) ?>" /></td>
					</tr>
				</table>
			</div>
			<p class="submit"><input type="submit" class="button-primary" value="<?php _e('Save Options', 'nuovo'); ?>" /></p>
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
	$input['nuovo-rss-feed'] = wp_filter_nohtml_kses( $input['nuovo-rss-feed'] );

	// Validate the input for the color theme
	$prev = $settings['nuovo-color-theme'];
	if ( !array_key_exists( $input['nuovo-color-theme'], $nuovo_colors ) ){
		$input['nuovo-color-theme'] = $prev;
	}

	// Validate the input for the top menu
	if ( ! isset( $input['nuovo-top-menu'] ) ){
		$input['nuovo-top-menu'] = null;
	}
	$input['nuovo-top-menu'] = ( $input['nuovo-top-menu'] == 1 ? 1 : 0 );

	// Validate the input for the author bio
	if ( ! isset( $input['nuovo-author-bio'] ) ){
		$input['nuovo-author-bio'] = null;
	}
	$input['nuovo-author-bio'] = ( $input['nuovo-author-bio'] == 1 ? 1 : 0 );

	// Validate the input for the Facebook Link
	$input['nuovo-facebook'] = wp_filter_nohtml_kses( $input['nuovo-facebook'] );

	// Validate the input for the Twitter Link
	$input['nuovo-twitter'] = wp_filter_nohtml_kses( $input['nuovo-twitter'] );

	// Validate the input for the YouTube Link
	$input['nuovo-youtube'] = wp_filter_nohtml_kses( $input['nuovo-youtube'] );

	// Validate the input for the Google+ Link
	$input['nuovo-googleplus'] = wp_filter_nohtml_kses( $input['nuovo-googleplus'] );

	// Validate the input for the LinkedIn Link
	$input['nuovo-linkedin'] = wp_filter_nohtml_kses( $input['nuovo-linkedin'] );

	// Validate the input for the Slideshow Category
	$prev = $settings['nuovo-slideshow-category'];
	if ( !array_key_exists( $input['nuovo-slideshow-category'], $cats ) ){
		$input['nuovo-slideshow-category'] = $prev;
	}

	// Validate the input for the Slideshow Category Count
	$input['nuovo-slideshow-count'] = intval( $input['nuovo-slideshow-count'] );

	// Validate the input for the First Category
	$prev = $settings['nuovo-category-one'];
	if ( !array_key_exists( $input['nuovo-category-one'], $cats ) ){
		$input['nuovo-category-one'] = $prev;
	}

	// Validate the input for the Category One Count
	$input['nuovo-category-one-count'] = intval( $input['nuovo-category-one-count'] );

	// Validate the input for the Second Category
	$prev = $settings['nuovo-category-two'];
	if ( !array_key_exists( $input['nuovo-category-two'], $cats ) ){
		$input['nuovo-category-two'] = $prev;
	}

	// Validate the input for the Category Two Count
	$input['nuovo-category-two-count'] = intval( $input['nuovo-category-two-count'] );

	// Validate the input for the Third Category
	$prev = $settings['nuovo-category-three'];
	if ( !array_key_exists( $input['nuovo-category-three'], $cats ) ){
		$input['nuovo-category-three'] = $prev;
	}

	// Validate the input for the Category Three Count
	$input['nuovo-category-three-count'] = intval( $input['nuovo-category-three-count'] );

	// Validate the input for the Fourth Category
	$prev = $settings['nuovo-category-four'];
	if ( !array_key_exists( $input['nuovo-category-four'], $cats ) ){
		$input['nuovo-category-four'] = $prev;
	}

	// Validate the input for the Category Four Count
	$input['nuovo-category-four-count'] = intval( $input['nuovo-category-four-count'] );

	// Validate the input for the Latest Posts Count
	$input['nuovo-latest-posts-count'] = intval( $input['nuovo-latest-posts-count'] );

	return $input;
}
?>