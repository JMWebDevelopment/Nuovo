<?php
/**
 * Template part for displaying the latest post section of the homepage.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Query;

if ( esc_attr( get_theme_mod( 'nuovo-latest-posts-count' ) ) > 0 ) {

	$latest_posts_args = array(
		'posts_per_page' => esc_attr( get_theme_mod( 'nuovo-latest-posts-count' ) ),
		'orderby'        => 'date',
		'order'          => 'DES',
	);
	$latest_posts      = new WP_Query( $latest_posts_args );

	?>
	<section class="home-latest-posts clearfix">
		<h2 class="latest-posts-title"><?php esc_html_e( 'Latest Posts', 'wp-rig' ); ?></h2>

		<?php
		if ( $latest_posts->have_posts() ) {
			?>
			<div class="posts-section">
				<?php
				while ( $latest_posts->have_posts() ) {
					$latest_posts->the_post();
					get_template_part( 'template-parts/home/latest', 'post' );
				}
				?>
			</div>
			<?php
		}
		global $wp_query;
		$total_pages = $wp_query->max_num_pages;
		if ( $total_pages > 1 ) {
			next_posts_link( '<span class="next-posts">' . esc_html__( 'Next Posts&rsaquo;&rsaquo;', 'wp-rig' ) . '</span>' );
		}
		wp_reset_postdata();
		?>
	</section>
	<?php
}
