</div><!--End Wrapper-->
<div id="footer">
	<?php wp_reset_query(); ?>
	<p class="footer-text">Copyright &copy; <?php echo date('Y'); ?> &bull; <a href="<?php echo get_home_url(); ?>"><?php bloginfo('name'); ?></a> &bull; <a href="http://jacobmartella.com/nuovo/">Nuovo</a> &bull; <?php wp_loginout(); ?><?php wp_register(' &bull; ', ''); ?></p>
</div>
<?php get_nuovo_mobile_template('footer'); ?><!--Footer Mobile Template-->
<?php wp_footer(); ?>
</body>
</html>	