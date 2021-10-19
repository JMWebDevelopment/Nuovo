<?php
/**
 * WP_Rig\WP_Rig\Customizer\Component class
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig\Customizer;

use WP_Rig\WP_Rig\Component_Interface;
use function WP_Rig\WP_Rig\wp_rig;
use WP_Customize_Manager;
use function add_action;
use function bloginfo;
use function wp_enqueue_script;
use function get_theme_file_uri;
use function get_theme_file_path;

/**
 * Class for managing Customizer integration.
 */
class Component implements Component_Interface {

	/**
	 * Gets the unique identifier for the theme component.
	 *
	 * @return string Component slug.
	 */
	public function get_slug() : string {
		return 'customizer';
	}

	/**
	 * Adds the action and filter hooks to integrate with WordPress.
	 */
	public function initialize() {
		add_action( 'customize_register', array( $this, 'action_customize_register' ) );
		add_action( 'customize_preview_init', array( $this, 'action_enqueue_customize_preview_js' ) );
	}

	/**
	 * Adds postMessage support for site title and description, plus a custom Theme Options section.
	 *
	 * @param WP_Customize_Manager $wp_customize Customizer manager instance.
	 */
	public function action_customize_register( WP_Customize_Manager $wp_customize ) {
		$wp_customize->add_panel(
			'nuovo_main_options',
			array(
				'priority'       => 10,
				'capability'     => 'edit_theme_options',
				'theme_supports' => '',
				'title'          => esc_html__( 'Nuovo Options', 'wp-rig' ),
			)
		);

		$wp_customize->add_section(
			'nuovo_basic_options',
			array(
				'title'    => esc_html__( 'Basic Options', 'wp-rig' ),
				'priority' => 130, // Before Additional CSS.
				'panel'    => 'nuovo_main_options',
			)
		);

		$wp_customize->add_section(
			'nuovo_homepage_options',
			array(
				'title'    => esc_html__( 'Homepage Options', 'wp-rig' ),
				'priority' => 130, // Before Additional CSS.
				'panel'    => 'nuovo_main_options',
			)
		);

		$wp_customize->add_section(
			'nuovo_social_media_options',
			array(
				'title'    => esc_html__( 'Social Media Options', 'wp-rig' ),
				'priority' => 130, // Before Additional CSS.
				'panel'    => 'nuovo_main_options',
			)
		);

		$wp_customize->add_setting(
			'nuovo-rss-feed',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_link' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-rss-feed',
			array(
				'label'     => esc_html__( 'Custom RSS Feed', 'wp-rig' ),
				'section'   => 'nuovo_basic_options',
				'type'      => 'text',
			)
		);

		//* Add in the Color Theme Option
		$wp_customize->add_setting(
			'nuovo-color-theme',
			array(
				'default'           => 'default',
				'sanitize_callback' => array( $this, 'sanitize_select' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-color-theme',
			array(
				'label'     => esc_html__( 'Color Theme', 'wp-rig' ),
				'section'   => 'nuovo_basic_options',
				'type'      => 'select',
				'choices'   => array(
					'default'   => esc_html__( 'Default', 'wp-rig' ),
					'blue'      => esc_html__( 'Blue', 'wp-rig' ),
					'green'     => esc_html__( 'Green', 'wp-rig' ),
					'orange'    => esc_html__( 'Orange', 'wp-rig' ),
					'purple'    => esc_html__( 'Purple', 'wp-rig' ),
					'red'       => esc_html__( 'Red', 'wp-rig' ),
					'yellow'    => esc_html__( 'Yellow', 'wp-rig' ),
				),
			)
		);

		$wp_customize->add_setting(
			'nuovo-top-menu',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-top-menu',
			array(
				'label'     => esc_html__( 'Top Menu', 'wp-rig' ),
				'section'   => 'nuovo_basic_options',
				'type'      => 'checkbox',
			)
		);

		$wp_customize->add_setting(
			'nuovo-author-bio',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-author-bio',
			array(
				'label'     => esc_html__( 'Author Bio', 'wp-rig' ),
				'section'   => 'nuovo_basic_options',
				'type'      => 'checkbox',
			)
		);

		$wp_customize->add_setting(
			'nuovo-post-navigation',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_checkbox' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-post-navigation',
			array(
				'label'     => esc_html__( 'Show Single Post Navigation', 'wp-rig' ),
				'section'   => 'nuovo_basic_options',
				'type'      => 'checkbox',
			)
		);

		$wp_customize->add_setting(
			'nuovo-facebook',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_link' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-facebook',
			array(
				'label'     => esc_html__( 'Facebook Link', 'wp-rig' ),
				'section'   => 'nuovo_social_media_options',
				'type'      => 'text',
			)
		);

		$wp_customize->add_setting(
			'nuovo-twitter',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_link' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-twitter',
			array(
				'label'     => esc_html__( 'Twitter Link', 'wp-rig' ),
				'section'   => 'nuovo_social_media_options',
				'type'      => 'text',
			)
		);

		$wp_customize->add_setting(
			'nuovo-youtube',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_link' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-youtube',
			array(
				'label'     => esc_html__( 'YouTube Link', 'wp-rig' ),
				'section'   => 'nuovo_social_media_options',
				'type'      => 'text',
			)
		);

		$wp_customize->add_setting(
			'nuovo-linkedin',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_link' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-linkedin',
			array(
				'label'     => esc_html__( 'LinkedIn Link', 'wp-rig' ),
				'section'   => 'nuovo_social_media_options',
				'type'      => 'text',
			)
		);

		$wp_customize->add_setting(
			'nuovo-instagram',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_link' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-instagram',
			array(
				'label'     => esc_html__( 'Instagram Link', 'wp-rig' ),
				'section'   => 'nuovo_social_media_options',
				'type'      => 'text',
			)
		);

		$wp_customize->add_setting(
			'nuovo-tumblr',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_link' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-tumblr',
			array(
				'label'     => esc_html__( 'Tumblr Link', 'wp-rig' ),
				'section'   => 'nuovo_social_media_options',
				'type'      => 'text',
			)
		);

		$wp_customize->add_setting(
			'nuovo-pinterest',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_link' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-pinterest',
			array(
				'label'     => esc_html__( 'Pinterest Link', 'wp-rig' ),
				'section'   => 'nuovo_social_media_options',
				'type'      => 'text',
			)
		);

		$cats             = get_categories();
		$cat_args['none'] = esc_html__( 'None', 'wp-rig' );
		foreach ( $cats as $cat ) {
			$cat_args[ $cat->term_id ] = $cat->name;
		}

		$wp_customize->add_setting(
			'nuovo-slideshow-category',
			array(
				'default'           => '',
				'sanitize_callback' => 'nuovo_sanitize_category',
			)
		);

		$wp_customize->add_control(
			'nuovo-slideshow-category',
			array(
				'label'     => esc_html__( 'Slideshow Category', 'wp-rig' ),
				'section'   => 'nuovo_homepage_options',
				'type'      => 'select',
				'choices'   => $cat_args,
			)
		);

		$wp_customize->add_setting(
			'nuovo-slideshow-count',
			array(
				'default'           => '4',
				'sanitize_callback' => array( $this, 'sanitize_num' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-slideshow-count',
			array(
				'label'     => esc_html__( 'Number of Slideshow Posts', 'wp-rig' ),
				'section'   => 'nuovo_homepage_options',
				'type'      => 'text',
			)
		);

		$wp_customize->add_setting(
			'nuovo-category-one',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_category' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-category-one',
			array(
				'label'     => esc_html__( 'First Category', 'wp-rig' ),
				'section'   => 'nuovo_homepage_options',
				'type'      => 'select',
				'choices'   => $cat_args,
			)
		);

		$wp_customize->add_setting(
			'nuovo-category-one-count',
			array(
				'default'           => 3,
				'sanitize_callback' => array( $this, 'sanitize_num' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-category-one-count',
			array(
				'label'     => esc_html__( 'Number of Posts in the First Section', 'wp-rig' ),
				'section'   => 'nuovo_homepage_options',
				'type'      => 'text',
			)
		);

		$wp_customize->add_setting(
			'nuovo-category-two',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_category' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-category-two',
			array(
				'label'     => esc_html__( 'Second Category', 'wp-rig' ),
				'section'   => 'nuovo_homepage_options',
				'type'      => 'select',
				'choices'   => $cat_args,
			)
		);

		$wp_customize->add_setting(
			'nuovo-category-two-count',
			array(
				'default'           => 0,
				'sanitize_callback' => array( $this, 'sanitize_num' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-category-two-count',
			array(
				'label'     => esc_html__( 'Number of Posts in the Second Section', 'wp-rig' ),
				'section'   => 'nuovo_homepage_options',
				'type'      => 'text',
			)
		);

		$wp_customize->add_setting(
			'nuovo-category-three',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_category' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-category-three',
			array(
				'label'     => esc_html__( 'Third Category', 'wp-rig' ),
				'section'   => 'nuovo_homepage_options',
				'type'      => 'select',
				'choices'   => $cat_args,
			)
		);

		$wp_customize->add_setting(
			'nuovo-category-three-count',
			array(
				'default'           => 0,
				'sanitize_callback' => array( $this, 'sanitize_num' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-category-three-count',
			array(
				'label'     => esc_html__( 'Number of Posts in the Third Section', 'wp-rig' ),
				'section'   => 'nuovo_homepage_options',
				'type'      => 'text',
			)
		);

		$wp_customize->add_setting(
			'nuovo-category-four',
			array(
				'default'           => '',
				'sanitize_callback' => array( $this, 'sanitize_category' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-category-four',
			array(
				'label'     => esc_html__( 'Fourth Category', 'wp-rig' ),
				'section'   => 'nuovo_homepage_options',
				'type'      => 'select',
				'choices'   => $cat_args,
			)
		);

		$wp_customize->add_setting(
			'nuovo-category-four-count',
			array(
				'default'           => 0,
				'sanitize_callback' => array( $this, 'sanitize_num' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-category-four-count',
			array(
				'label'     => esc_html__( 'Number of Posts in the Fourth Section', 'wp-rig' ),
				'section'   => 'nuovo_homepage_options',
				'type'      => 'text',
			)
		);

		$wp_customize->add_setting(
			'nuovo-latest-posts-count',
			array(
				'default'           => 10,
				'sanitize_callback' => array( $this, 'sanitize_num' ),
			)
		);

		$wp_customize->add_control(
			'nuovo-latest-posts-count',
			array(
				'label'     => esc_html__( 'Number of Latest Posts', 'wp-rig' ),
				'section'   => 'nuovo_homepage_options',
				'type'      => 'text',
			)
		);
	}

	public function sanitize_link( $input ) {
		return wp_filter_nohtml_kses( $input );
	}

	public function sanitize_select( $input ) {
		$valid = array(
			'default'   => esc_html__( 'Default', 'wp-rig' ),
			'blue'      => esc_html__( 'Blue', 'wp-rig' ),
			'green'     => esc_html__( 'Green', 'wp-rig' ),
			'orange'    => esc_html__( 'Orange', 'wp-rig' ),
			'purple'    => esc_html__( 'Purple', 'wp-rig' ),
			'red'       => esc_html__( 'Red', 'wp-rig' ),
			'yellow'    => esc_html__( 'Yellow', 'wp-rig' ),
		);

		if ( array_key_exists( $input, $valid ) ) {
			return $input;
		} else {
			return 'default';
		}
	}

	public function sanitize_checkbox( $input ) {
		return ( ( isset( $input ) && true == $input ) ? 1 : 0 );
	}

	public function sanitize_category( $input ) {
		$cats             = get_categories();
		$cat_args['none'] = esc_html__( 'None', 'wp-rig' );
		foreach ( $cats as $cat ) {
			$cat_args[ $cat->term_id ] = $cat->name;
		}
		if ( array_key_exists( $input, $cat_args ) ) {
			return $input;
		} else {
			return 1;
		}
	}

	public function sanitize_num( $input ) {
		return intval( $input );
	}

	/**
	 * Enqueues JavaScript to make Customizer preview reload changes asynchronously.
	 */
	public function action_enqueue_customize_preview_js() {
		wp_enqueue_script(
			'wp-rig-customizer',
			get_theme_file_uri( '/assets/js/customizer.min.js' ),
			array( 'customize-preview' ),
			wp_rig()->get_asset_version( get_theme_file_path( '/assets/js/customizer.min.js' ) ),
			true
		);
	}
}
