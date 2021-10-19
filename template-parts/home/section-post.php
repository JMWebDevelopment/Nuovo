<?php
/**
 * Template part for displaying a section post section of the homepage.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<article id="section-post-<?php the_ID(); ?>" <?php post_class( 'home-section-post' ); ?>>
	<?php
	if ( has_post_thumbnail() ) {
		?>
		<div class="featured-photo">
			<?php the_post_thumbnail( 'archive' ); ?>
			<span class="comments"><p class="photo-post-details-links"><?php echo get_the_date( get_option( 'date_format' ) ); ?> &bull; <?php echo wp_kses_post( comments_popup_link( '0', '1', '%', '', esc_html__( 'Off', 'wp-rig' ) ) ); ?> <span class="fas fa-comment-alt"></span></p></span>
		</div>
		<?php
	}
	?>

	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
	<p class="meta"><?php esc_html_e( 'Written By:', 'wp-rig' ); ?> <?php the_author_posts_link(); ?></p>

	<?php the_excerpt(); ?>
</article>
