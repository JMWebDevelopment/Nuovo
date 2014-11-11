<?php while (have_posts()) : the_post(); ?>
	<div id="mobile-post-area">
		<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
			<h1 class="page-title"><?php the_title(); ?></h1>
			<?php the_content(); ?>
		</div><!--End Post Class-->
		<?php wp_link_pages(); ?>
	</div><!--End Post Area-->
<?php endwhile; ?>