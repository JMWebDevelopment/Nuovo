<?php
/**
 * Template part for displaying the fourth post section of the homepage.
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

use WP_Query;

if ( ( '' !== esc_attr( get_theme_mod( 'nuovo-category-four' ) ) ) && ( 'none' !== esc_attr( get_theme_mod( 'nuovo-category-four' ) ) ) ) {
	$category_id = esc_attr( get_theme_mod( 'nuovo-category-four' ) );
} else {
	$category_id = '';
}

if ( esc_attr( get_theme_mod( 'nuovo-category-four-count' ) ) ) {
	$cat_count = esc_attr( get_theme_mod( 'nuovo-category-four-count' ) );
} else {
	$cat_count = 3;
}

$section_args  = [
	'posts_per_page' => $cat_count,
	'category_name'  => get_cat_name( $category_id ),
	'orderby'        => 'date',
	'order'          => 'DES',
];
$section_posts = new WP_Query( $section_args );

?>

<section class="home-posts-section clearfix">

	<h2 class="section-heading">
		<?php
		if ( ( '' !== esc_attr( get_theme_mod( 'nuovo-category-four' ) ) ) && ( 'none' !== esc_attr( get_theme_mod( 'nuovo-category-four' ) ) ) ) {
			echo esc_html( get_cat_name( $category_id ) );
		}
		?>
	</h2>

	<?php
	if ( $section_posts->have_posts() ) {
		?>
		<div class="posts-section">
			<?php
			while ( $section_posts->have_posts() ) {
				$section_posts->the_post();
				get_template_part( 'template-parts/home/section', 'post' );
			}
			?>
		</div>
		<?php
	}
	wp_reset_postdata();
	?>

	<?php
	if ( '' !== $category_id ) {
		?>
		<a class="view-all" href="<?php echo esc_attr( get_category_link( $category_id ) ); ?>"><?php esc_html_e( 'View All', 'wp-rig' ); ?> &rsaquo;&rsaquo;</a>
		<?php
	}
	?>
</section>
