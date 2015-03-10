<?php get_header(); ?>
<!--Begin Featured Post Slider-->
<div id="slideshow-area">
	<div id="slideshow-nav">
	<div class="next">
		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/slideshowarrowright.png" alt="slideshow-arrow-right" onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/images/slideshowarrowrighthover.png'" onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/images/slideshowarrowright.png'" /></a>
	</div>
	<div class="prev">
		<a href="#"><img src="<?php echo get_template_directory_uri(); ?>/images/slideshowarrowleft.png" alt="slideshow-arrow-left" onmouseover="this.src='<?php echo get_template_directory_uri(); ?>/images/slideshowarrowlefthover.png'" onmouseout="this.src='<?php echo get_template_directory_uri(); ?>/images/slideshowarrowleft.png'" /></a>
	</div>
	<div id="slideshow" class="clearfix">
		<?php 
			$slideshow_args = array(
				'showposts' => esc_attr(nuovo_options('nuovo-slideshow-count')),
				'category_name' => nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-slideshow-category'))),
				'orderby' => 'date',
				'order' => 'DES'
			);
			$slideshow = new WP_Query($slideshow_args);
			if ($slideshow->have_posts()) : while ($slideshow->have_posts()) : $slideshow->the_post(); ?>
			<div class="slide">
				<div class="slide-photo">
					<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
				</div>
				<div class="slide-panel">
					<h3 class="slide-panel-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="slide-panel-meta"><?php _e('Written By: ', 'nuovo'); ?><?php the_author_posts_link(); ?><?php edit_post_link(__('Edit', 'nuovo'), ' &bull; '); ?><br />
					<?php _e('Posted in: ', 'nuovo'); ?><?php _e('Posted in: ', 'nuovo'); ?><?php the_category(', '); ?> &bull; <?php the_time('F j, Y'); ?> &bull; <?php comments_popup_link(__('0 Comments', 'nuovo'), __('1 Comment', 'nuovo'), __('% Comments', 'nuovo'), '', __('Comments Off', 'nuovo')); ?></p>
					<hr />
					<?php the_excerpt('Continue Reading', 'nuovo'); ?>
				</div>
			</div>
		<?php endwhile;?>
		<?php endif; ?>
	</div>
	</div>
</div>
<!--End Featured Post Slider-->
<!--Begin Home Posts Area-->
<div id="home-posts-area">
	<!-- Begin Catgeory One Posts-->
	<div class="category-area-one clearfix">
		<div class="home-title-bg">
			<h3 class="home-title"><?php echo nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-one'))); ?></h3>
		</div>
		<?php 
			$cat1_args = array(
				'showposts' => esc_attr(nuovo_options('nuovo-category-one-count')),
				'category_name' => esc_attr(nuovo_cat_id_to_name(nuovo_options('nuovo-category-one'))),
				'orderby' => 'date',
				'order' => 'DES'
			);
			$cat1 = new WP_Query($cat1_args);
			if ($cat1->have_posts()) : while ($cat1->have_posts()) : $cat1->the_post(); 
		?>
			<div class="home-post">
				<?php if (has_post_thumbnail()) { ?>
					<div class="home-photo">
						<a href="<?php the_permalink(); ?>">
							<?php the_post_thumbnail(); ?>
						</a>
						<span class="photo-post-details"><p class="photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" /></p></span>
					</div>
				<?php } ?>
				<h3 class="home-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
				<p class="home-meta"><?php _e('Written By: ' ,'nuovo'); ?><?php the_author_posts_link(); ?><?php edit_post_link(__('Edit', 'nuovo'), ' &bull; '); ?></p>
				<hr />
				<?php the_excerpt('Continue Reading', 'nuovo'); ?>
			</div>
		<?php endwhile; ?>
		<?php endif; ?>
		<div class="home-view-all">
			<a href="index.php?cat=<?php echo esc_attr(nuovo_options('nuovo-category-one')); ?>">
				<?php _e('View All&rsaquo;&rsaquo;', 'nuovo'); ?>
			</a>
		</div>
	</div>
	<!--End Category One Posts-->
	<!--Begin Category Two Posts-->
	<?php if (esc_attr(nuovo_options('nuovo-category-two'))) { ?>
		<div class="category-area-two clearfix">
			<div class="home-title-bg">
				<h3 class="home-title"><?php echo nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-two'))); ?></h3>
			</div>
			<?php 
				$cat2_args = array(
					'showposts' => esc_attr(nuovo_options('nuovo-category-two-count')),
					'category_name' => nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-two'))),
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
								<span class="photo-post-details"><p class="photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" /></p></span>
							</div>
						<?php } ?>
						<h3 class="home-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="home-meta"><?php _e('Written By: ' ,'nuovo'); ?><?php the_author_posts_link(); ?><?php edit_post_link(__('Edit', 'nuovo'), ' &bull; '); ?></p>
						<hr />
						<?php the_excerpt('Continue Reading', 'nuovo'); ?>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>
			<div class="home-view-all">
				<a href="index.php?cat=<?php echo esc_attr(nuovo_options('nuovo-category-two')); ?>">
					<?php _e('View All&rsaquo;&rsaquo;', 'nuovo'); ?>
				</a>
			</div>
		</div>
	<?php } ?>
	<!--End Category Two Posts-->
	<!--Begin Category Three Posts-->
	<?php if(esc_attr(nuovo_options('nuovo-category-three'))) { ?>
		<div class="category-area-three clearfix">
			<div class="home-title-bg">
				<h3 class="home-title"><?php echo nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-three'))); ?></h3>
			</div>
			<?php 
			$cat3_args = array(
				'showposts' => esc_attr(nuovo_options('nuovo-category-three-count')),
				'category_name' => esc_attr(nuovo_cat_id_to_name(nuovo_options('nuovo-category-three'))),
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
							<span class="photo-post-details"><p class="photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" /></p></span>
						</div>
					<?php } ?>
					<h3 class="home-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="home-meta"><?php _e('Written By: ' ,'nuovo'); ?><?php the_author_posts_link(); ?><?php edit_post_link(__('Edit', 'nuovo'), ' &bull; '); ?></p>
					<hr />
					<?php the_excerpt('Continue Reading', 'nuovo'); ?>
				</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<div class="home-view-all">
				<a href="index.php?cat=<?php echo esc_attr(nuovo_options('nuovo-category-three')); ?>">
					<?php _e('View All&rsaquo;&rsaquo;', 'nuovo'); ?>
				</a>
			</div>
		</div>
	<?php } ?>
	<!--End Category Three Posts-->
	<?php if (esc_attr(nuovo_options('nuovo-category-four'))) { ?>
		<!--Begin Category Four Posts-->
		<div class="category-area-four clearfix">
			<div class="home-title-bg">
				<h3 class="home-title"><?php echo nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-four'))); ?></h3>
			</div>
			<?php 
				$cat4_args = array(
					'showposts' => esc_attr(nuovo_options('nuovo-category-four-count')),
					'category_name' => nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-four'))),
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
							<span class="photo-post-details"><p class="photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" /></p></span>
						</div>
					<?php } ?>
					<h3 class="home-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
					<p class="home-meta"><?php _e('Written By: ' ,'nuovo'); ?><?php the_author_posts_link(); ?><?php edit_post_link(__('Edit', 'nuovo'), ' &bull; '); ?></p>
					<hr />
					<?php the_excerpt('Continue Reading', 'nuovo'); ?>
				</div>
			<?php endwhile; ?>
			<?php endif; ?>
			<div class="home-view-all">
				<a href="index.php?cat=<?php echo esc_attr(nuovo_options('nuovo-category-four')); ?>">
					<?php _e('View All&rsaquo;&rsaquo;', 'nuovo'); ?>
				</a>
			</div>
		</div>
		<!--End Category Four Posts-->
	<?php } ?>
	<?php wp_reset_query(); ?>
	<?php if (esc_attr(nuovo_options('nuovo-latest-posts-count')) > 0) { ?>
		<!--Begin Latest Posts-->
		<div class="latest-posts-area clearfix">
			<div class="latest-posts-title-bg">
				<h3 class="latest-posts-title">Latest Posts</h3>
			</div>
			<?php 
				$latest_posts_args = array(
					'showposts' => esc_attr(nuovo_options('nuovo-latest-posts-count')),
					'orderby' => 'date',
					'order' => 'DES'
				);
				$latest_posts = new WP_Query($latest_posts_args);
				if ($latest_posts->have_posts()) : while ($latest_posts->have_posts()) : $latest_posts->the_post(); 
			?>
					<div class="latest-posts">
						<?php if (has_post_thumbnail()) { ?>
							<div class="latest-posts-photo"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
						<?php } ?>
						<div class="latest-posts-headline-area">
							<h5 class="latest-posts-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> &bull; <?php _e('Written By: ', 'nuovo'); ?><?php the_author_posts_link(); ?> &bull; <?php the_time('F j, Y'); ?> &bull; <?php comments_popup_link(__('0 Comments', 'nuovo'), __('1 Comment', 'nuovo'), __('% Comments', 'nuovo'), '', __('Comments Closed', 'nuovo')); ?></h5>
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
<!--End Home Posts Area-->
<!--Begin Mobile Home Posts Area-->
<div id="mobile-home-posts-area">
	<!--Begin Category One Posts-->
	<div id="category-area-one" class="clearfix">
		<div class="mobile-home-title-bg">
			<h3 class="home-title"><?php echo nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-one'))); ?></h3>
		</div>
		<div class="mobile-swiper-container1">
			<div class="swiper-wrapper">
				<?php 
					$cat1_args = array(
						'showposts' => esc_attr(nuovo_options('nuovo-category-one-count')),
						'category_name' => nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-one'))),
						'orderby' => 'date',
						'order' => 'DES'
					);
					$cat1 = new WP_Query($cat1_args);
					if ($cat1->have_posts()) : while ($cat1->have_posts()) : $cat1->the_post(); 
				?>
					<div class="swiper-slide">
						<?php if (has_post_thumbnail()) { ?>
							<div class="mobile-home-photo">
								<a href="<?php the_permalink(); ?>">
									<?php the_post_thumbnail(); ?>
								</a>
								<span class="mobile-photo-post-details"><span class="mobile-photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" alt="comments" /></span></span>
							</div>
						<?php } ?>
						<h3 class="mobile-home-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						<p class="mobile-home-meta"><?php _e('Written By: ', 'nuovo'); ?><?php the_author_posts_link(); ?><?php edit_post_link(__('Edit', 'nuovo'), ' &bull; '); ?></p>
						<hr />
						<?php the_excerpt('Continue Reading', 'nuovo'); ?>
					</div>
				<?php endwhile; ?>
				<?php endif; ?>
			</div>
		</div>
		<div class="mobile-home-view-all">
			<a href="index.php?cat=<?php echo esc_attr(nuovo_options('nuovo-category-one')); ?>">
				<?php _e('View All&rsaquo;&rsaquo;', 'nuovo'); ?>
			</a>
		</div>
	</div>
	<!--End Category One Posts-->
	<!--Begin Category Two Posts-->
	<?php if (esc_attr(nuovo_options('nuovo-category-two'))) { ?>
		<div id="category-area-two" class="clearfix">
			<div class="mobile-home-title-bg">
				<h3 class="home-title"><?php echo nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-two'))); ?></h3>
			</div>
			<div class="mobile-swiper-container2">
				<div class="swiper-wrapper">
					<?php 
						$cat2_args = array(
							'showposts' => esc_attr(nuovo_options('nuovo-category-two-count')),
							'category_name' => nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-two'))),
							'orderby' => 'date',
							'order' => 'DES'
						);
						$cat2 = new WP_Query($cat2_args);
						if ($cat2->have_posts()) : while ($cat2->have_posts()) : $cat2->the_post(); 
					?>
						<div class="swiper-slide">
							<?php if (has_post_thumbnail()) { ?>
								<div class="mobile-home-photo">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
									<span class="mobile-photo-post-details"><span class="mobile-photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" alt="comments" /></span></span>
								</div>
							<?php } ?>
							<h3 class="mobile-home-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="mobile-home-meta"><?php _e('Written By: ', 'nuovo'); ?><?php the_author_posts_link(); ?><?php edit_post_link(__('Edit', 'nuovo'), ' &bull; '); ?></p>
							<hr />
							<?php the_excerpt('Continue Reading', 'nuovo'); ?>
						</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="mobile-home-view-all">
				<a href="index.php?cat=<?php echo esc_attr(nuovo_options('nuovo-category-two')); ?>">
					<?php _e('View All&rsaquo;&rsaquo;', 'nuovo'); ?>
				</a>
			</div>
		</div>
	<?php } ?>
	<!--End Category Two Posts-->
	<!--Begin Category Three Posts-->
	<?php if (esc_attr(nuovo_options('nuovo-category-three'))) { ?>
		<div id="category-area-three" class="clearfix">
			<div class="mobile-home-title-bg">
				<h3 class="home-title"><?php echo nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-three'))); ?></h3>
			</div>
			<div class="mobile-swiper-container3">
				<div class="swiper-wrapper">
					<?php 
						$cat3_args = array(
							'showposts' => esc_attr(nuovo_options('nuovo-category-three-count')),
							'category_name' => nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-three'))),
							'orderby' => 'date',
							'order' => 'DES'
						);
						$cat3 = new WP_Query($cat3_args);
						if ($cat3->have_posts()) : while ($cat3->have_posts()) : $cat3->the_post(); 
					?>
						<div class="swiper-slide">
							<?php if (has_post_thumbnail()) { ?>
								<div class="mobile-home-photo">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
									<span class="mobile-photo-post-details"><span class="mobile-photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" alt="comments" /></span></span>
								</div>
							<?php } ?>
							<h3 class="mobile-home-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="mobile-home-meta"><?php _e('Written By: ', 'nuovo'); ?><?php the_author_posts_link(); ?><?php edit_post_link(__('Edit', 'nuovo'), ' &bull; '); ?></p>
							<hr />
							<?php the_excerpt('Continue Reading', 'nuovo'); ?>
						</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="mobile-home-view-all">
				<a href="index.php?cat=<?php echo esc_attr(nuovo_options('nuovo-category-three')); ?>">
					<?php _e('View All&rsaquo;&rsaquo;', 'nuovo'); ?>
				</a>
			</div>
		</div>
	<?php } ?>
	<!--End Category Three Posts-->
	<?php if (esc_attr(nuovo_options('nuovo-category-four'))) { ?>
		<!--Begin Category Four Posts-->
		<div id="category-area-four" class="clearfix">
			<div class="mobile-home-title-bg">
				<h3 class="home-title"><?php echo nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-four'))); ?></h3>
			</div>
			<div class="mobile-swiper-container4">
				<div class="swiper-wrapper">
					<?php 
						$cat4_args = array(
							'showposts' => esc_attr(nuovo_options('nuovo-category-four-count')),
							'category_name' => nuovo_cat_id_to_name(esc_attr(nuovo_options('nuovo-category-four'))),
							'orderby' => 'date',
							'order' => 'DES'
						);
						$cat4 = new WP_Query($cat4_args);
						if ($cat4->have_posts()) : while ($cat4->have_posts()) : $cat4->the_post(); 
					?>
						<div class="swiper-slide">
							<?php if (has_post_thumbnail()) { ?>
								<div class="mobile-home-photo">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail(); ?>
									</a>
									<span class="mobile-photo-post-details"><span class="mobile-photo-post-details-links"><?php echo the_time('M j, Y'); ?> &bull; <?php echo comments_popup_link('0', '1', '%', '', __('Off', 'nuovo')); ?><img src="<?php echo get_template_directory_uri(); ?>/images/comments.png" style="margin-top:3px; margin-left:3px;margin-bottom:-2px;" alt="comments" /></span></span>
								</div>
							<?php } ?>
							<h3 class="mobile-home-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<p class="mobile-home-meta"><?php _e('Written By: ', 'nuovo'); ?><?php the_author_posts_link(); ?><?php edit_post_link(__('Edit', 'nuovo'), ' &bull; '); ?></p>
							<hr />
							<?php the_excerpt('Continue Reading', 'nuovo'); ?>
						</div>
					<?php endwhile; ?>
					<?php endif; ?>
				</div>
			</div>
			<div class="mobile-home-view-all">
				<a href="index.php?cat=<?php echo esc_attr(nuovo_options('nuovo-category-four')); ?>">
					<?php _e('View All&rsaquo;&rsaquo;', 'nuovo'); ?>
				</a>
			</div>
		</div>
		<!--End Category Four Posts-->
	<?php } ?>
	<?php wp_reset_query(); ?>
	<?php if (esc_attr(nuovo_options('nuovo-latest-posts-count')) > 0) { ?> 
		<!--Begin Latest Posts-->
		<div id="mobile-latest-posts-area" class="clearfix">
			<div class="mobile-latest-posts-title-bg">
				<h3 class="mobile-latest-posts-title"><?php _e('Latest Posts', 'nuovo'); ?></h3>
			</div>
			<?php 
				$latest_posts_args = array(
					'showposts' => esc_attr(nuovo_options('nuovo-latest-posts-count')),
					'orderby' => 'date',
					'order' => 'DES'
				);
				$latest_posts = new WP_Query($latest_posts_args);
				if ($latest_posts->have_posts()) : while ($latest_posts->have_posts()) : $latest_posts->the_post(); 
			?>
					<div class="mobile-latest-posts clearfix">
						<?php if (has_post_thumbnail()) { ?>
							<div class="mobile-latest-posts-photo"><a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a></div>
						<?php } ?>
						<div class="mobile-latest-posts-headline-area clearfix">
							<h5 class="mobile-latest-posts-headline"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> &bull; <?php _e('Written By: ', 'nuovo'); ?><?php the_author_posts_link(); ?> &bull; <?php the_time('F j, Y'); ?> &bull; <?php comments_popup_link(__('0 Comments', 'nuovo'), __('1 Comment', 'nuovo'), __('% Comments', 'nuovo'), '', __('Comments Disabled', 'nuovo')); ?></h5>
						</div>
					</div>
			<?php endwhile; ?>
			<?php global $wp_query; $total_pages = $wp_query->max_num_pages; if ( $total_pages > 1 ) { ?>
				<?php next_posts_link(__('<span class="mobile-home-next">Next Posts&rsaquo;&rsaquo;</span>', 'nuovo')); ?>
			<?php } ?>
			<?php endif; ?>
		</div>
		<!--End Latest Posts-->
	<?php } ?>
</div>
<!--End Mobile Home Posts Area-->
<?php get_sidebar(); ?>
<?php get_footer(); ?>