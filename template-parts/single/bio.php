<?php
/**
 * Template part for displaying the header branding
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<section class="author-bio clearfix">
	<?php
	if ( get_avatar( get_the_author_meta( 'email' ) ) ) {
		?>
		<div class="mug-shot"><?php echo wp_kses_post( get_avatar( get_the_author_meta( 'email' ), $size = 96 ) ); ?></div>
		<?php
	}
	?>
	<h2 class="title"><?php echo esc_html__( 'About', 'wp-rig' ) . ' ' . wp_kses_post( get_the_author_meta( 'display_name' ) ); ?></h2>
	<p class="bio">
		<?php echo wp_kses_post( get_the_author_meta( 'description' ) ); ?>
	</p>
</section>
