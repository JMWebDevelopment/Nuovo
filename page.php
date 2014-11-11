<?php get_header(); ?>
	<div id="content">
		<?php while (have_posts()) : the_post(); ?>
			<div id="post-area">
				<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<h1 class="page-title"><?php the_title(); ?></h1>
					<?php the_content(); ?>
					<?php comments_template(); ?><!--Comments-->
				</div><!--End Post Class-->
				<?php wp_link_pages(); ?>
			</div><!--End Post Area-->
		<?php endwhile; ?>
		<?php get_nuovo_mobile_template('page'); ?><!--Page Mobile Template-->
		<?php get_sidebar(); ?>
	</div>
<?php get_footer(); ?>