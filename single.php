<?php get_header(); ?>
<div id="content">
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="single-post" class="clearfix">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if (has_post_thumbnail()) { ?>
					<div class="single-featured-photo"><?php the_post_thumbnail('single-post'); ?></div>
					<hr />
				<?php } ?>
				<h3 class="single-headline"><?php the_title(); ?></h3>
				<div class="post clearfix">
					<!--Begin Meta Text-->
					<div class="single-meta clearfix">
						<div class="single-meta-table"><h5 class="single-meta-text"><?php the_time('M j, Y'); ?></h5></div>
						<div class="single-meta-table-alt"><h5 class="single-meta-text"><?php _e('Written By: ', 'nuovo'); ?><?php the_author_posts_link(); ?></h5></div>
						<div class="single-meta-table"><h5 class="single-meta-text"><?php comments_popup_link(__('0 Comments', 'nuovo'), __('1 Comments', 'nuovo'), __('% Comments', 'nuovo'), '', __('Comments Closed', 'nuovo')); ?></h5></div>
						<div class="single-meta-table-alt"><h5 class="single-meta-text"><?php the_category(', '); ?></h5></div>
						<div class="single-meta-table"><h5 class="single-meta-text"><?php _e('Tags: ', 'nuovo'); ?><br /><?php the_tags('', '<br />'); ?></h5></div>
					</div>
					<!--End Meta Tex-->
					<!--Start Post Text-->
					<?php the_content(); ?>
					<div class="mobile-single-meta clearfix">
						<div class="mobile-single-meta-table"><h5 class="single-meta-text"><?php the_time('M j, Y'); ?></h5></div>
						<div class="mobile-single-meta-table-alt"><h5 class="single-meta-text"><?php _e('Written By: ', 'nuovo'); ?><?php the_author_posts_link(); ?></h5></div>
						<div class="mobile-single-meta-table"><h5 class="single-meta-text"><?php comments_popup_link(__('0 Comments', 'nuovo'), __('1 Comments', 'nuovo'), __('% Comments', 'nuovo'), '', __('Comments Closed', 'nuovo')); ?></h5></div>
						<div class="mobile-single-meta-table-alt"><h5 class="single-meta-text"><?php the_category(', '); ?></h5></div>
						<div class="mobile-single-meta-table"><h5 class="single-meta-text"><?php _e('Tags: ', 'nuovo'); ?><br /><?php the_tags('', '<br />'); ?></h5></div>
					</div>
					<!--End Post Text-->
				</div>
				<?php if (esc_attr(get_theme_mod('nuovo-author-bio') == 1)) { ?>
					<!--Begin Author Bio-->
					<div class="archive-separator"></div>
					<div class="archive-featured-photo-area">
						<div class="author-photo">
							<?php echo get_avatar(get_the_author_email(), $size = '96'); ?>
						</div>
					</div>
					<h1 class="archive-title"><?php _e('About', 'nuovo'); ?> <?php the_author_meta('display_name'); ?></h1>
					<?php the_author_meta('description'); ?>
					<!--End Author Bio-->
				<?php } ?>
				<?php comments_template(); ?><!--Comments-->
			</div>
		</div>
	<?php endwhile; ?>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>