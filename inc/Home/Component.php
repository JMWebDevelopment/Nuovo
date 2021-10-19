<?php
/**
 * WP_Rig\WP_Rig\Home\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Home;

use WP_Rig\WP_Rig\Component_Interface;
use WP_Rig\WP_Rig\Templating_Component_Interface;
use Sports_Bench\Classes\Base\Scoreboard;
use Sports_Bench\Classes\Base\Team;
use function WP_Rig\WP_Rig\wp_rig;
use function add_action;
use function add_filter;

/**
 * Class for managing Sports Bench changes for the theme.
 *
 * Exposes template tags:
 * * `wp_rig()->print_styles()`
 */
class Component implements Component_Interface, Templating_Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'home';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'wp_enqueue_scripts', [ $this, 'load_carousel_js' ] );
		add_action( 'template_include', [ $this, 'change_page_two' ] );
	}

	/**
	 * Gets template tags to expose as methods on the Template_Tags class instance, accessible through `wp_rig()`.
	 *
	 * @return array Associative array of $method_name => $callback_info pairs. Each $callback_info must either be
	 *               a callable or an array with key 'callable'. This approach is used to reserve the possibility of
	 *               adding support for further arguments in the future.
	 */
	public function template_tags() : array {
		return [];
	}

	/**
	 * Loads the JavaScript for the home page carosuel.
	 *
	 * @since 2.0.0
	 */
	public function load_carousel_js() {
		wp_enqueue_script(
			'wp-rig-carousel',
			get_theme_file_uri( '/assets/js/carousel.min.js' ),
			[],
			wp_rig()->get_asset_version( get_theme_file_path( '/assets/js/carousel.min.js' ) ),
			false
		);
		wp_script_add_data( 'wp-rig-carousel', 'async', true );
		wp_script_add_data( 'wp-rig-carousel', 'precache', true );
	}

	/**
	 * Loads the index template if someone hits "View More" for homepage sections without a category selected.
	 *
	 * @since 2.0.0
	 *
	 * @param string $template      The current template trying to be loaded.
	 * @return string               The template to load.
	 */
	public function change_page_two( $template ) {
		if ( is_front_page() && is_paged() ) {
			$template = locate_template( array( 'index.php' ) );
		}
		return $template;
	}
}
