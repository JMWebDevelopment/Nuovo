<?php
// Set the Maximum Content Width
if ( ! isset( $content_width ) )
 $content_width = 640;

//Add support and Register the Two Menus
function register_my_menus() {
	register_nav_menus(
		array(
			'top-menu' => __( 'Top Menu' ),
			'main-menu' => __( 'Main Menu' )
		)
	);
}
add_action( 'init', 'register_my_menus' );

// turns a category ID to a Name
function cat_id_to_name($id) {
	foreach((array)(get_categories()) as $category) {
    	if ($id == $category->cat_ID) { return $category->cat_name; break; }
	}
}

//Simplify Calling the Tablet Templates
function get_nuovo_tablet_template($temp_name) {
	include_once( get_template_directory() . '/tablet/' . $temp_name . '.php' );
}

//Simplify Calling the Mobile Templates
function get_nuovo_mobile_template($temp_name) {
	include_once( get_template_directory() . '/mobile/' . $temp_name . '.php' );
}

//Create easy Function for Calling Theme Options
function nuovo_options($type, $opt) {
	if ($type == 'social') {
		$option = get_option('nuovo_theme_social_options');
	}
	elseif ($type == 'homepage') {
		$option = get_option('nuovo_theme_homepage_options');
	}
	else {
		$option = get_option('nuovo_theme_general_options');
	}
	if (isset($option[$opt])) {
		return $option[$opt];
	}
}

function show_nuovo_options($opt) {
	if ($type == 'social') {
		$option = get_option('nuovo_theme_social_options');
	}
	elseif ($type = 'homepage') {
		$option == get_option('nuovo_theme_homepage_options');
	}
	else {
		$option = get_option('nuovo_theme_general_options');
	}
	echo $option[$opt];
}

//Add Support for Custom Background
$custom_background_args = array(
'default-color' => '000000',
);
add_theme_support( 'custom-background', $custom_background_args );

//Add Support for Custom Header
$args = array(
'flex-width' 	=> true,
'width'	=> 530,
'flex-height'	=> true,
'height'	=> 150,
'default-image' => '',
'default-text-color'     => '777777',
'upload'	=> true,
);
add_theme_support('custom-header', $args);

//Add Support for Featured Images
add_theme_support( 'post-thumbnails', array( 'post' ) );

//Setup Function For Comments
function advanced_comment($comment, $args, $depth) {
   $GLOBALS['comment'] = $comment; ?>
 
<li <?php comment_class(); ?> id="li-comment-<?php comment_ID() ?>">
   <div class="comment-author vcard">
     <?php echo get_avatar($comment,$size='48'); ?>
       <div class="comment-meta"<a href="<?php the_author_meta( 'user_url'); ?>"><?php printf(__('%s'), get_comment_author_link()) ?></a></div>
       <small><?php printf(__('%1$s at %2$s'), get_comment_date(),  get_comment_time()) ?><?php edit_comment_link(__('(Edit)'),'  ','') ?></small>
     </div>
     <div class="clear"></div>
 
     <?php if ($comment->comment_approved == '0') : ?>
       <em><?php _e('Your comment is awaiting moderation.') ?></em>
       <br />
     <?php endif; ?>
 
     <div class="comment-text">	
         <?php comment_text() ?>
     </div>
 
   <div class="reply">
      <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
	   <?php delete_comment_link(get_comment_ID()); ?>
   </div>
   <div class="clear"></div>
<?php }
function delete_comment_link($id) {
  if (current_user_can('edit_post')) {
    echo '<a href="'.admin_url("comment.php?action=cdc&c=$id").'">del</a> ';
    echo '<a href="'.admin_url("comment.php?action=cdc&dt=spam&c=$id").'">spam</a>';
  }
}

//Register Sidebars
function nuovo_sidebar() {
	register_sidebar(array(
		'name'=>'Sidebar',
		'before_widget' => '<div class="widget-wrap">',
		'after_widget' => '</p> </div>',
		'before_title' => '<div class="widget-title-bg"><h3 class="widget-title">',
		'after_title' => '</h3></div><p class="widget-body">'
	));
}
add_action('widgets_init', 'nuovo_sidebar');

//Theme Options
require_once(get_template_directory() . '/theme-options.php');

//Change Menu Container CSS Based on Menu Names
function nuovo_menu_container() {
	$menus = wp_get_nav_menus();
	foreach ($menus as $menu){
		$name = strtolower($menu->name);
		$name = str_replace(" ", "-", $name);
		echo '<style type="text/css">#top-menu .menu-'.$name.'-container, #main-menu .menu-'.$name.'-container{width: 980px;margin: auto;} @media only screen and (max-width: 979px) and (min-width: 700px) {#top-menu .menu-'.$name.'-container, #main-menu .menu-'.$name.'-container{width: 700px;margin: auto;min-height:39px;max-height:78px;}} @media only screen and (max-width: 699px) and (min-width: 650px) {#top-menu .menu-'.$name.'-container, #main-menu .menu-'.$name.'-container{width: 650px;margin: auto;clear:both;}}</style>';
	}
}

//Add Support for Different Page 2 Template
add_action('template_include','nuovo_change_page_two');
function nuovo_change_page_two( $template ){
    if( is_front_page() && is_paged() ){
        $template = locate_template(array('index.php'));
    }
    return $template;
}

//Change the "Read More" For Posts on Home Page
function nuovo_new_excerpt_more( $more ) {
		return '... <span class="home-read-more"><a href="'. get_the_permalink( get_the_ID() ) .'">Continue Reading&rsaquo;&rsaquo;</a></span>';
}
add_filter('excerpt_more', 'nuovo_new_excerpt_more');

//Change the length of excerpt
function nuovo_custom_excerpt_length( $length ) {
	return 40;
}
add_filter( 'excerpt_length', 'nuovo_custom_excerpt_length', 999 );

//Find the stylesheet the user wants to use
function nuovo_find_stylesheet() {
	$color = nuovo_options('general', 'color-style');
	if ($color == 'default') {
		return;
	}
	else {
		$stylesheets = array('<link rel="stylesheet" type="text/css" href="'. get_template_directory_uri() . '/css/' . $color . '.css" />', '<link rel="stylesheet" type="text/css" href="'. get_template_directory_uri() . '/css/tablet/' . $color . '.css" />', '<link rel="stylesheet" type="text/css" href="'. get_template_directory_uri() . '/css/mobile/' . $color . '.css" />');
		foreach ($stylesheets as $stylesheet){
			echo $stylesheet . "\n";
		}
	}
}

//Add Support for Editor Style
function nuovo_add_editor_styles() {
    add_editor_style();
}
add_action( 'init', 'nuovo_add_editor_styles' );

//Enqueue Scripts
function nuovo_scripts() {
	$scripts = array(
					'jquery-min' => '/js/jquery.min.js',
					'cycle' => '/js/cycle.js',
					'swiper' => '/js/idangerous.swiper-2.3.min.js'
	);
	foreach ($scripts as $key=>$location) {
		wp_register_script( $key, get_template_directory_uri() . $location );
		wp_enqueue_script( $key );
	}
	$color = nuovo_options('general', 'color-theme');
	if ($color != 'default') {
		$color_styles = array(
			'desktop' => '/css/' . $color . '.css',
			'tablet' => '/css/tablet/' . $color . '.css',
			'mobile' => '/css/mobile/' . $color . '.css'
		);
	} else {
		$color_styles = array(
			'tablet' => '/css/tablet/default.css',
			'mobile' => '/css/mobile/default.css'
		);
	}
	foreach ($color_styles as $key=>$location) {
		wp_register_style($key, get_template_directory_uri() . $location);
		wp_enqueue_style($key);
	}
	wp_register_style('user', get_template_directory_uri() . '/user.css');
	wp_enqueue_script('user');
	wp_enqueue_script('jquery');
	wp_enqueue_script('jquery-ui-core');
}
add_action( 'wp_enqueue_scripts', 'nuovo_scripts' );

// Add Responsiveness for Featured Images
add_filter('post_thumbnail_html', 'nuovo_remove_thumbnail_dimensions', 10);
add_filter('image_send_to_editor', 'nuovo_remove_thumbnail_dimensions', 10);
function nuovo_remove_thumbnail_dimensions($html) {
	$html = preg_replace('/(width\height)=\"\d*\"\s/', "", $html);
	return $html;
}

// Add Support for Automatic Feed Links
add_theme_support( 'automatic-feed-links' );

// Add function to make sure dropdown option is selected and to display selected item.
function nuovo_selected($option, $value){
	if ($option != '') {
		if ($option == $value) {
			return 'selected="selected"';
		}
	}
}

// Add function to make sure dropdown option is checked.
function nuovo_checked($option) {
	if ($option != '') {
		if ($option == 1) {
			return 'checked="checked"';
		}
	}
}

// Add function to display the page title
function nuovo_wp_title( $title, $sep ) {
	global $paged, $page;

	if ( is_feed() )
		return $title;

	// Add the site name.
	$title .= get_bloginfo( 'name' );

	// Add the site description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		$title = "$title $sep $site_description";

	// Add a page number if necessary.
	if ( $paged >= 2 || $page >= 2 )
		$title = "$title $sep " . sprintf( __( 'Page %s', 'twentytwelve' ), max( $paged, $page ) );

	return $title;
}
add_filter( 'wp_title', 'nuovo_wp_title', 10, 2);
?>