<?php
/**
 * Template part for displaying a post in the archive template
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( 'story-article' ); ?>>
	<?php
	if ( has_post_thumbnail() ) {
		?>
		<div class="featured-photo">
			<div class="featured-photo-container">
				<?php the_post_thumbnail( 'archive' ); ?>
				<span class="comments"><p class="photo-post-details-links"><?php echo get_the_date( get_option( 'date_format' ) ); ?> &bull; <?php echo wp_kses_post( comments_popup_link( '0', '1', '%', '', esc_html__( 'Off', 'wp-rig' ) ) ); ?> <span class="fas fa-comment-alt"></span></p></span>
			</div>
		</div>
		<?php
	}
	?>
	<div class="post-info">
		<h2 class="headline"><?php the_title(); ?></h2>
		<p class="byline">
			<?php esc_html_e( 'Written By:', 'wp-rig' ); ?> <?php the_author_posts_link(); ?> <?php esc_html_e( 'on', 'wp-rig' ); ?> <?php the_date( get_option( 'date_format' ) ); ?>
			<?php
			if ( ! is_category() ) {
				?>
				<br />
				<?php esc_html_e( 'Posted in: ', 'wp-rig' ); ?><?php the_category( ', ' ); ?>
				<?php
			}
			?>
		</p>
		<?php the_excerpt(); ?>
	</div>
</article>
