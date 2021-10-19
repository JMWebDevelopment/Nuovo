<?php
/**
 * Template part for displaying a top slider post section.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<li class="slide">
	<div class="slide-container">
		<div class="slide-photo">
			<?php the_post_thumbnail( 'slideshow' ); ?>
		</div>
		<div class="slide-info">
			<h2><?php the_title(); ?></h2>
			<p class="post-meta">
				<?php esc_html_e( 'Written By: ', 'wp-rig' ); ?><?php the_author_posts_link(); ?><br />
				<?php esc_html_e( 'Posted in: ', 'wp-rig' ); ?><?php esc_html_e( 'Posted in: ', 'wp-rig' ); ?><?php single_cat_title(); ?> &bull; <?php echo get_the_date( get_option( 'date_format' ) ); ?> &bull; <?php comments_popup_link( __( '0 Comments', 'wp-rig' ), __( '1 Comment', 'wp-rig' ), __( '% Comments', 'wp-rig' ), '', __( 'Comments Off', 'wp-rig' ) ); ?>
			</p>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="button"><?php esc_html_e( 'Read This Post', 'wp-rig' ); ?></a>
		</div>
	</div>
</li>
