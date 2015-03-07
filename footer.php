</div><!--End Wrapper-->
<div id="footer">
	<?php wp_reset_query(); ?>
	<p class="footer-text"><?php _e('Copyright', 'nuovo'); ?> &copy; <?php echo date('Y'); ?> &bull; <a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a> &bull; <a href="http://jacobmartella.com/nuovo-wordpress-theme/">Nuovo</a> &bull; <?php wp_loginout(); ?><?php wp_register(' &bull; ', ''); ?></p>
</div>
<div id="mobile-footer">
	<?php wp_reset_query(); ?>
	<p class="footer-text"><?php _e('Copyright', 'nuovo'); ?> &copy; <?php echo date('Y'); ?><br />
	<a href="<?php echo esc_url(home_url()); ?>"><?php bloginfo('name'); ?></a><br />
	Nuovo<br />
	<?php wp_loginout(); ?><?php wp_register(' &bull; ', ''); ?></p>
</div>
<?php wp_footer(); ?>
</body>
</html>	