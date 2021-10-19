<?php
/**
 * Template part for displaying the top slider section of the homepage.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Query;

if ( esc_attr( get_theme_mod( 'nuovo-slideshow-count' ) ) ) {
	$num_posts = esc_attr( get_theme_mod( 'nuovo-slideshow-count' ) );
} else {
	$num_posts = 5;
}

$slideshow_args  = [
	'posts_per_page' => $num_posts,
	'category_name'  => get_cat_name( esc_attr( get_theme_mod( 'nuovo-slideshow-category' ) ) ),
	'orderby'        => 'date',
	'order'          => 'DES',
];
$slideshow_posts = new WP_Query( $slideshow_args );

if ( $slideshow_posts->have_posts() ) {
	?>
	<div class="top-posts-slider">
		<div id="carousel" class="carousel">
			<ul>
				<?php
				while ( $slideshow_posts->have_posts() ) {
					$slideshow_posts->the_post();
					get_template_part( '/template-parts/home/top-slider', 'post' );
				}
				?>
			</ul>
		</div>
	</div>
	<?php
}
wp_reset_postdata();

