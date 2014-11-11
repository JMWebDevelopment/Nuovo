<!--Begin Featured Post Slider-->
<div id="tablet-slideshow-area" class="clearfix">
	<div id="tablet-slideshow-nav">
	<div class="tablet-next">
		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/slideshowarrowright.png" alt="slideshow-arrow-right" onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/images/slideshowarrowrighthover.png'" onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/images/slideshowarrowright.png'" /></a>
	</div>
	<div class="tablet-prev">
		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/slideshowarrowleft.png" alt="slideshow-arrow-left" onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/images/slideshowarrowlefthover.png'" onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/images/slideshowarrowleft.png'" /></a>
	</div>
	<div id="tablet-slideshow" class="clearfix">
		<?php 
			$slideshow_args = array(
				'showposts' => nuovo_options('homepage', 'slideshow-count'),
				'category_name' => cat_id_to_name(nuovo_options('homepage', 'slideshow-category')),
				'orderby' => 'date',
				'order' => 'DES'
			);
			$slideshow = new WP_Query($slideshow_args);
			if ($slideshow->have_posts()) : while ($slideshow->have_posts()) : $slideshow->the_post(); ?>
			<div class="tablet-slide">
				<div class="tablet-slide-photo">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
					<span class="tablet-slide-panel">
						<span class="tablet-slide-panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></span><br />
						<span class="tablet-slide-panel-meta">Written By: <?php the_author_posts_link(); ?><?php edit_post_link('Edit', ' &bull; '); ?><br />
						Posted in: <?php the_category(', '); ?> &bull; <?php the_time('F j, Y'); ?> &bull; <?php comments_popup_link('0 Comments', '1 Comment', '% Comments', '', 'Comments Disabled'); ?></span>
					</span>
				</div>
			</div>
		<?php endwhile;?>
		<?php endif; ?>
	</div>
	</div>
</div>
<!--End Featured Post Slider-->
<!--Begin Home Posts Area-->
<div id="tablet-home-posts-area" class="clearfix">
	<!--Begin Category One Posts-->
	<div class="category-area-one clearfix">
		<div class="home-title-bg">
			<h3 class="home-title"><?php echo cat_id_to_name(nuovo_options('homepage', 'category-one')); ?></h3>
		</div>
		<?php 
		$cat1_args = array(
			'showposts' => nuovo_options('homepage', 'category-one-count'),
			'category_name' => cat_id_to_name(nuovo_options('homepage', 'category-one')),
			'orderby' => 'date',
			'order' => 'DES'
		);
		$cat1 = new WP_Query($cat1_args);
		if ($cat1->have_posts()) : while ($cat1->have_posts()) : $cat1->the_post(); ?>
		<div class="home-post">
			<?php if (has_post_thumbnail()) { ?>
				<div class="home-photo">
					<a href="<?php the_permalink(); ?>">
						<?php the_post_thumbnail(); ?>
					</a>
					<span class="photo-post-details"><span class="photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%'); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" alt="comments" /></span></span>
				</div>
			<?php } ?>
			<h3 class="home-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p class="home-meta">Written By: <?php the_author_posts_link(); ?><?php edit_post_link('Edit', ' &bull; '); ?></p>
			<hr />
				<?php the_excerpt('Continue Reading', 'nuovo'); ?>
		</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<div class="home-view-all">
			<a href="index.php?cat=<?php echo nuovo_options('homepage', 'category-one'); ?>">
				View All&rsaquo;&rsaquo;
			</a>
		</div>
	</div>
	<!--End Category One Posts-->
	<!--Begin Category Two Posts-->
	<div class="category-area-two clearfix">
		<div class="home-title-bg">
			<h3 class="home-title"><?php echo cat_id_to_name(nuovo_options('homepage', 'category-two')); ?></h3>
		</div>
		<?php 
		$category_two = cat_id_to_name(nuovo_options('homepage', 'category-two'));
		$cat2_args = array(
			'showposts' => nuovo_options('homepage', 'category-two-count'),
			'category_name' => $category_two,
			'orderby' => 'date',
			'order' => 'DES'
		);
		$cat2 = new WP_Query($cat2_args);
		if ($cat2->have_posts()) : while ($cat2->have_posts()) : $cat2->the_post(); ?>
			<div class="home-post">
				<?php if (has_post_thumbnail()) { ?>
					<div class="home-photo">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
						<span class="photo-post-details"><span class="photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%'); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" alt="comments" /></span></span>
					</div>
				<?php } ?>
				<h3 class="home-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="home-meta">Written By: <?php the_author_posts_link(); ?><?php edit_post_link('Edit', ' &bull; '); ?></p>
				<hr />
				<?php the_excerpt('Continue Reading', 'nuovo'); ?>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<div class="home-view-all">
			<a href="index.php?cat=<?php echo nuovo_options('homepage', 'category-two'); ?>">
				View All&rsaquo;&rsaquo;
			</a>
		</div>
	</div>
	<!--End Category Two Posts-->
	<!--Begin Category Three Posts-->
	<div class="category-area-three clearfix">
		<div class="home-title-bg">
			<h3 class="home-title"><?php echo cat_id_to_name(nuovo_options('homepage', 'category-three')); ?></h3>
		</div>
		<?php 
		$cat3_args = array(
			'showposts' => nuovo_options('homepage', 'category-three-count'),
			'category_name' => cat_id_to_name(nuovo_options('homepage', 'category-three')),
			'orderby' => 'date',
			'order' => 'DES'
		);
		$cat3 = new WP_Query($cat3_args);
		if ($cat3->have_posts()) : while ($cat3->have_posts()) : $cat3->the_post(); ?>
			<div class="home-post">
				<?php if (has_post_thumbnail()) { ?>
					<div class="home-photo">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
						<span class="photo-post-details"><span class="photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%'); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" alt="comments" /></span></span>
					</div>
				<?php } ?>
				<h3 class="home-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="home-meta">Written By: <?php the_author_posts_link(); ?><?php edit_post_link('Edit', ' &bull; '); ?></p>
				<hr />
				<?php the_excerpt('Continue Reading', 'nuovo'); ?>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<div class="home-view-all">
			<a href="index.php?cat=<?php echo nuovo_options('homepage', 'category-three'); ?>">
				View All&rsaquo;&rsaquo;
			</a>
		</div>
	</div>
	<!--End Category Three Posts-->
	<?php if (nuovo_options('homepage', 'category-four') != -1) { ?>
		<!--Begin Category Four Posts-->
		<div class="category-area-four clearfix">
			<div class="home-title-bg">
				<h3 class="home-title"><?php echo cat_id_to_name(nuovo_options('homepage', 'category-four')); ?></h3>
			</div>
			<?php 
				$cat4_args = array(
					'showposts' => nuovo_options('homepage', 'category-four-count'),
					'category_name' => cat_id_to_name(nuovo_options('homepage', 'category-four')),
					'orderby' => 'date',
					'order' => 'DES'
				);
				$cat4 = new WP_Query($cat4_args);
				if ($cat4->have_posts()) : while ($cat4->have_posts()) : $cat4->the_post(); ?>
				<div class="home-post">
					<?php if (has_post_thumbnail()) { ?>
						<div class="home-photo">
							<a href="<?php the_permalink(); ?>">
								<?php the_post_thumbnail(); ?>
							</a>
							<span class="photo-post-details"><span class="photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%'); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" alt="comments" /></span></span>
						</div>
					<?php } ?>
					<h3 class="home-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="home-meta">Written By: <?php the_author_posts_link(); ?><?php edit_post_link('Edit', ' &bull; '); ?></p>
					<hr />
					<?php the_excerpt('Continue Reading', 'nuovo'); ?>
				</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<div class="home-view-all">
				<a href="index.php?cat=<?php echo nuovo_options('homepage', 'category-four'); ?>">
					View All&rsaquo;&rsaquo;
				</a>
			</div>
		</div>
		<!--End Category Four Posts-->
	<?php } ?>
	<?php wp_reset_query(); ?>
	<?php if (nuovo_options('homepage', 'latest-posts-count') > 0) { ?> 
		<!--Begin Latest Posts-->
		<div class="latest-posts-area clearfix">
			<div class="latest-posts-title-bg">
				<h3 class="latest-posts-title">Latest Posts</h3>
			</div>
			<?php 
				$latest_posts_args = array(
					'showposts' => nuovo_options('homepage', 'latest-posts-count'),
					'orderby' => 'date',
					'order' => 'DES'
				);
				$latest_posts = new WP_Query($latest_posts_args);
				if ($latest_posts->have_posts()) : while ($latest_posts->have_posts()) : $latest_posts->the_post();
			?>
					<div class="latest-posts">
						<div class="latest-posts-photo"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail('latest-posts'); ?></a></div>
						<div class="latest-posts-headline-area">
							<h5 class="latest-posts-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> &bull; Written By: <?php the_author_posts_link(); ?> &bull; <?php the_time('F j, Y'); ?> &bull; <?php comments_popup_link('0 Comments', '1 Comment', '% Comments', '', 'Comments Disabled'); ?></h5>
						</div>
					</div>
			<?php endwhile; ?>
			<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				<?php next_posts_link(__('<span class="home-next">Next Posts&rsaquo;&rsaquo;</span>', 'nuovo')); ?>
			<?php } ?>
			<?php endif; ?>
		</div>
		<!--End Latest Posts-->
	<?php } ?>
</div>