<?php
/**
 * Template part for displaying a latest post.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<article id="latest-post-<?php the_ID(); ?>" <?php post_class( 'home-latest-post' ); ?>>
	<?php
	if ( has_post_thumbnail() ) {
		?>
		<div class="featured-photo">
			<?php the_post_thumbnail( 'latest' ); ?>
		</div>
		<?php
	}
	?>

	<div class="post-info">
		<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
		<p class="meta"><?php esc_html_e( 'Written By:', 'wp-rig' ); ?> <?php the_author_posts_link(); ?> &bull; <?php echo get_the_date( get_option( 'date_format' ) ); ?> &bull; <?php comments_popup_link( esc_html__( '0 Comments', 'wp-rig' ), esc_html__( '1 Comment', 'wp-rig' ), esc_html__( '% Comments', 'wp-rig' ), '', esc_html__( 'Comments Closed', 'wp-rig' ) ); ?></p>
	</div>
</article>
