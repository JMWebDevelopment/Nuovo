<?php
/**
 * Template part for displaying the header branding
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<header class="entry-header">
	<?php
	if ( has_post_thumbnail() ) {
		?>
		<div class="featured-photo">
			<?php the_post_thumbnail( 'single-post' ); ?>
		</div>
		<?php
	}
	?>
	<h1><?php the_title(); ?></h1>
</header>
