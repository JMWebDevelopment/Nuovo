<?php
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');
 
	if ( post_password_required() ) { ?>
		<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.', 'nuovo'); ?></p>
	<?php
		return;
	}
?>
<?php if ( have_comments() ) : ?>
	<h3 id="comments"><?php comments_number(__('No Responses', 'nuovo'), __('One Response', 'nuovo'), __('% Responses', 'nuovo') );?> <?php __('to', 'nuovo'); ?> &#8220;<?php the_title(); ?>&#8221;</h3>
	<ol class="commentlist">
		<?php wp_list_comments('type=comment&callback=nuovo_advanced_comment'); 
                ?>
	</ol>
	<div class="clear"></div>
	<div class="comment-navigation">
		<div class="older"><?php previous_comments_link() ?></div>
		<div class="newer"><?php next_comments_link() ?></div>
	</div>
 <?php else : ?>
	<?php if ( comments_open() ) : ?>
		<!-- If comments are open, but there are no comments. -->
	 <?php else :?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>
	<?php endif; ?>
<?php endif; ?>
<?php if ( comments_open() ) : ?>
<div id="respond">
<?php comment_form(); ?>
</div>
<?php endif; ?>