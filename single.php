<?php
/**
 * The template for displaying single posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

get_header();

wp_rig()->print_styles( 'wp-rig-single' );
wp_rig()->print_styles( 'wp-rig-content' );
wp_rig()->load_color_stylesheet();

?>
	<div class="site-container">
		<main id="primary" class="site-main">
			<?php

			while ( have_posts() ) {
				the_post();
				?>
				<article id="<?php the_ID(); ?>" <?php post_class(); ?>>

					<?php get_template_part( '/template-parts/single/header' ); ?>

					<div class="entry-content">
						<?php get_template_part( '/template-parts/single/details' ); ?>
						<?php the_content(); ?>
					</div>

					<footer class="entry-footer">
						<?php get_template_part( '/template-parts/single/navigation' ); ?>

						<?php get_template_part( '/template-parts/single/bio' ); ?>

						<?php
						if ( post_type_supports( get_post_type(), 'comments' ) && ( comments_open() || get_comments_number() ) ) {
							comments_template();
						}
						?>
						<?php wp_link_pages(); ?>
					</footer>
				</article>
				<?php
			}
			?>
		</main><!-- #primary -->

		<?php
		get_sidebar();
		?>
	</div>
<?php
get_footer();
