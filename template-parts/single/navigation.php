<?php
/**
 * Template part for displaying the navigation for a single post.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

if ( '1' === esc_attr( get_theme_mod( 'nuovo-post-navigation' ) ) ) {
	$prev_post = get_previous_post();
	$next_post = get_next_post();
	?>
	<div class="post-pagination clearfix">
		<?php
		if ( $prev_post ) {
			previous_post_link( '<div class="previous-post">' . get_the_post_thumbnail( $prev_post->ID ) . '<h2 class="paginate-title">&laquo;&laquo; %link</h2></div>', '%title' );
		}
		?>

		<?php
		if ( $next_post ) {
			next_post_link( '<div class="next-post">' . get_the_post_thumbnail( $next_post->ID ) . '<h2 class="paginate-title">%link &raquo;&raquo;</h2></div>', '%title' ); }
		?>
	</div>
	<?php
}
