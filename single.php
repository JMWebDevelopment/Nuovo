<?php 
/**
* Single.php
*
* Single post file for Nuovo
*
* @author Jacob Martella
* @package Nuovo
* @version 2.0
*/
?>
<?php get_header(); ?>
<main class="post-single">
	<?php while(have_posts()) : the_post(); ?>
		<article id="post-<?php the_ID(); ?>" <?php post_class('single-story'); ?>>
			<header class="entry-header">
				<?php if (has_post_thumbnail()) { ?>
					<div class="featured-photo"><?php the_post_thumbnail('single-post'); ?></div>
				<?php } ?>
				<h3 class="headline"><?php the_title(); ?></h3>
			</header>
			<?php echo nuovo_post_details(true); ?>
			<?php the_content(); ?>
			<?php echo nuovo_post_details(false); ?>
			<?php echo nuovo_author_bio(); ?>
			<?php comments_template(); ?>
		</article>
	<?php endwhile; ?>
</main>
<?php get_sidebar(); ?>
<?php get_footer(); ?>