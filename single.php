<?php get_header(); ?>
<div id="content">
	<?php while ( have_posts() ) : the_post(); ?>
		<div id="single-post" class="clearfix">
			<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
				<?php if (has_post_thumbnail()) { ?>
					<div class="single-featured-photo"><?php the_post_thumbnail(); ?></div>
					<hr />
				<?php } ?>
				<h3 class="single-headline"><?php the_title(); ?></h3>
				<div class="post clearfix">
					<!--Begin Meta Text-->
					<div class="single-meta clearfix">
						<div class="single-meta-table"><h5 class="single-meta-text"><?php the_time('M j, Y'); ?></h5></div>
						<div class="single-meta-table-alt"><h5 class="single-meta-text">Written By: <?php the_author_posts_link(); ?></h5></div>
						<div class="single-meta-table"><h5 class="single-meta-text"><?php comments_popup_link('0 Comments', '1 Comment', '% Comments', '', 'Comments Closed'); ?></h5></div>
						<div class="single-meta-table-alt"><h5 class="single-meta-text"><?php the_category(', '); ?></h5></div>
						<div class="single-meta-table"><h5 class="single-meta-text"><?php the_tags('<strong>Tags:</strong><br />', '<br />'); ?></h5></div>
					</div>
					<!--End Meta Tex-->
					<!--Start Post Text-->
					<?php the_content(); ?>
					<!--End Post Text-->
				</div>
				<?php if (nuovo_options('general', 'author-bio')) { ?>
					<!--Begin Author Bio-->
					<div class="archive-separator"></div>
					<div class="archive-featured-photo-area">
						<div class="author-photo">
							<?php echo get_avatar(get_the_author_email(), $size = '96'); ?>
						</div>
					</div>
					<h1 class="archive-title">About <?php the_author_meta('display_name'); ?></h1>
					<?php the_author_meta('description'); ?>
					<!--End Author Bio-->
				<?php } ?>
				<?php comments_template(); ?><!--Comments-->
			</div>
		</div>
	<?php endwhile; ?>
	<?php get_nuovo_mobile_template('single'); ?><!--Single Mobile Template-->
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>