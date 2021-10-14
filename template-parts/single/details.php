<?php
/**
 * Template part for displaying the header branding
 *
 * @package wp_rig
 */

namespace WP_Rig\WP_Rig;

// Get the number of comments.
$num_comments = get_comments_number( get_the_ID() );
if ( 0 === $num_comments ) {
	$comments_text = esc_html__( '0 Comments', 'wp-rig' );
} elseif ( 1 === $num_comments ) {
	$comments_text = esc_html__( '1 Comment', 'wp-rig' );
} else {
	$comments_text = $num_comments . esc_html__( ' Comments', 'wp-rig' );
}
if ( false === comments_open() ) {
	$comments_text = esc_html__( 'Comments Off', 'wp-rig' );
}

// Get the tags.
$tags         = get_the_tags();
$tags_section = '';
if ( $tags ) {
	foreach ( $tags as $a_tag ) {
		$tags_section .= $a_tag->name . '<br />';
	}
}

?>

<aside class="post-details">
	<div class="row"><p><?php the_date( get_option( 'date_format' ) ); ?></h5></div>
	<div class="row"><p><?php echo esc_html__( 'Written By:', 'wp-rig' ) . ' ' . get_the_author_link(); ?></h5></div>
	<div class="row"><p><?php echo wp_kses_post( $comments_text ); ?></h5></div>
	<div class="row"><p><?php echo wp_kses_post( get_the_category_list( ', ' ) ); ?></h5></div>
	<div class="row"><p><?php the_date( get_option( 'date_format' ) ); ?></h5></div>
</aside>
