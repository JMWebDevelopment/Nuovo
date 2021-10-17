<?php
/**
 * The template for displaying all pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-home' );
wp_rig()->print_styles( 'wp-rig-content' );
wp_rig()->load_color_stylesheet();

?>
	<div class="site-container">
		<?php get_template_part( '/template-parts/home/top', 'slider' ); ?>
		<main id="primary" class="site-main">
			<?php get_template_part( '/template-parts/home/first', 'section' ); ?>

			<?php get_template_part( '/template-parts/home/second', 'section' ); ?>

			<?php get_template_part( '/template-parts/home/third', 'section' ); ?>

			<?php get_template_part( '/template-parts/home/fourth', 'section' ); ?>

			<?php get_template_part( '/template-parts/home/latest', 'posts' ); ?>
		</main><!-- #primary -->
		<?php
		get_sidebar();
		?>
	</div>
<?php
get_footer();
