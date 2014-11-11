<?php while ( have_posts() ) : the_post(); ?>
	<div id="mobile-single-post" class="clearfix">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div class="mobile-single-featured-photo"><?php the_post_thumbnail(); ?></div>
			<hr />
			<h3 class="mobile-single-headline"><?php the_title(); ?></h3>
			<!--Start Post Text-->
			<?php the_content(); ?>
			<!--End Post Text-->
			<!--Start Meta Text-->
			<div class="mobile-single-meta clearfix">
				<div class="mobile-single-meta-table"><h5 class="single-meta-text"><?php the_time('M j, Y'); ?></h5></div>
				<div class="mobile-single-meta-table-alt"><h5 class="single-meta-text">Written By: <?php the_author_posts_link(); ?></h5></div>
				<div class="mobile-single-meta-table"><h5 class="single-meta-text"><?php comments_popup_link('0 Comments', '1 Comment', '% Comments', '', 'Comments Closed'); ?></h5></div>
				<div class="mobile-single-meta-table-alt"><h5 class="single-meta-text"><?php the_category(', '); ?></h5></div>
				<div class="mobile-single-meta-table"><h5 class="single-meta-text"><?php the_tags('<strong>Tags:</strong><br />', '<br />'); ?></h5></div>
			</div>
			<!--End Meta Tex-->
			<!--Begin Author Bio-->
			<?php if (nuovo_options('general', 'author-bio')) { ?>
				<h1 class="mobile-single-title">About <?php the_author_meta('display_name'); ?></h1>
				<div class="mobile-single-author-photo-area">
					<div class="mobile-single-author-photo">
						<?php echo get_avatar(get_the_author_email(), $size = '96'); ?>
					</div>
				</div>
				<?php the_author_meta('description'); ?>
			<?php } ?>
			<!--End Author Bio-->
			<?php comments_template(); ?><!--Comments-->
		</div>
	</div>
<?php endwhile; ?>