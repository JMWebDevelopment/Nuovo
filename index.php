<?php get_header(); ?>
	<div id="content">
		<div id="archive-post-area" class="clearfix">
			<?php the_post(); ?>
				<?php $page = get_query_var('paged'); ?>
				<h1 class="archive-title"><?php _e('Page ' . $page); ?></h1>
				<div class="archive-separator"></div>
			<?php rewind_posts(); ?>
			<?php while (have_posts()) : the_post(); ?>
				<div id="<?php the_ID(); ?>" class="archive-post clearfix">
					<div class="archive-featured-photo-area">
						<?php if (has_post_thumbnail()) { ?>
							<div class="archive-featured-photo">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
								<span class="archive-comments"><span class="photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%'); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" /></span></span>
							</div>
						<?php } ?>
					</div>
					<h3 class="archive-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="archive-meta-text">Written By: <?php the_author_posts_link(); ?> on <?php the_time('F j, Y'); ?></p>
					<?php the_excerpt(); ?>
					<hr />
				</div>
			<?php endwhile; ?>
			<!--Begin Paged Navigation-->
			<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				<?php next_posts_link(__('<div class="archive-next-posts">Older Posts&rsaquo;&rsaquo;</div>', 'nuovo')); ?>
				<?php previous_posts_link(__('<div class="archive-previous-posts">&lsaquo;&lsaquo;Newer Posts</div>', 'nuovo')); ?>
			<?php } ?>
			<!--End Paged Navigation-->
		</div>
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>