<div id="mobile-archive-post-area" class="clearfix">
	<?php the_post(); ?>
		<h1 class="mobile-archive-title">Tag Archive <?php single_tag_title(); ?></h1>
		<div class="mobile-archive-separator"></div>
	<?php rewind_posts(); ?>
	<?php while (have_posts()) : the_post(); ?>
		<div id="<?php the_ID(); ?>" class="mobile-archive-post clearfix">
			<div class="mobile-archive-featured-photo-area">
				<?php if (has_post_thumbnail()) { ?>
					<div class="mobile-archive-featured-photo">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
						<span class="mobile-archive-comments"><span class="mobile-photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%'); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" alt="comments" /></span></span>
					</div>
				<?php } ?>
			</div>
			<h3 class="mobile-archive-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p class="mobile-archive-meta-text">Written By: <?php the_author_posts_link(); ?> on <?php the_time('F j, Y'); ?></p>
			Posted In: <?php the_category(', '); ?></p>
			<?php the_excerpt(); ?>
		</div>
	<?php endwhile; ?>
	<!--Begin Paged Navigation-->
	<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
		<?php next_posts_link(__('<div class="mobile-archive-next-posts">Older Posts&rsaquo;&rsaquo;</div>', 'nuovo')); ?>
		<?php previous_posts_link(__('<div class="mobile-archive-previous-posts">&lsaquo;&lsaquo;Newer Posts</div>', 'nuovo')); ?>
	<?php } ?>
	<!--End Paged Navigation-->
</div>