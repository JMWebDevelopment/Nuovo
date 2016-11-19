<?php 
/**
* Sidebar.php
*
* Sidebar file for Nuovo
*
* @author Jacob Martella
* @package Nuovo
* @version 2.4
*/
?>
<section class="sidebar">
	<?php if ( function_exists( 'dynamic_sidebar' ) && dynamic_sidebar( 'Sidebar' ) ) : else : ?>
	<?php endif; ?>
</section>