<div id="mobile-footer">
	<?php wp_reset_query(); ?>
	<p class="footer-text">Copyright &copy; <?php echo date('Y'); ?><br />
	<a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a><br />
	Nuovo<br />
	<?php wp_loginout(); ?><?php wp_register(' &bull; ', ''); ?></p>
</div>