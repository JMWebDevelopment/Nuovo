<?php
/**
 * Template part for displaying the header top navigation menu
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

?>

<div class="social-area">

	<?php echo wp_kses_post( wp_rig()->social_media_links() ); ?>

</div>
