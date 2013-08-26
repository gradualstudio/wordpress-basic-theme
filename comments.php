<?php
/**
 * The template for displaying Comments.
 */
?>

<?php if ( post_password_required() ) : ?>
				<p><?php _e( 'This post is password protected. Enter the password to view any comments.', 'wbt' ); ?></p>
<?php
		/* Stop the rest of comments.php from being processed,
		 * but don't kill the script entirely -- we still have
		 * to fully load the template.
		 */
		return;
	endif;
?>

<?php if ( have_comments() ) : ?>
			<h2><?php _e('Comments', 'wbt'); ?></h2>
			<strong><?php comments_number( 'no responses', 'one response', '% responses' ); ?></strong>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<?php previous_comments_link( __( '&larr; Older Comments', 'wbt' ) ); ?>
				<?php next_comments_link( __( 'Newer Comments &rarr;', 'wbt' ) ); ?>
<?php endif; // check for comment navigation ?>

			<ul class="comments-list">
				<?php wp_list_comments( array( 'callback' => 'wbt_comment' ) ); ?>
			</ul>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
				<?php previous_comments_link( __( '&larr; Older Comments', 'wbt' ) ); ?>
				<?php next_comments_link( __( 'Newer Comments &rarr;', 'wbt' ) ); ?>
<?php endif; // check for comment navigation ?>

<?php else : // or, if we don't have comments:

	/* If there are no comments and comments are closed,
	 * let's leave a little note, shall we?
	 */
	if ( ! comments_open() ) :
?>
	<p><?php _e( 'Comments are closed.', 'wbt' ); ?></p>
<?php endif; // end ! comments_open() ?>

<?php endif; // end have_comments() ?>

<?php if ( comments_open() ) : ?>

<section class="comment-form form">

	<h3><?php _e( 'Leave a comment', 'wbt' ); ?></h3>
	
	<div id="cancel-comment">
		<?php cancel_comment_reply_link('Cancel Reply'); ?>
	</div>

	<?php if ( get_option('comment_registration') && !is_user_logged_in() ) : ?>
  	<div class="help">
  		<p><?php _e("You must be  ", "wbt"); ?> <a href="<?php echo wp_login_url( get_permalink() ); ?>"><?php _e("logged in ", "wbt"); ?></a> <?php _e("to post a comment. ", "wbt"); ?></p>
  	</div>
	<?php else : ?>

	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform" role="form">
	
	<div class="form-group">

	<?php if ( is_user_logged_in() ) : ?>

	<?php _e("Logged in as  ", "wbt"); ?><a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. 	<a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account"><?php _e("Log out &raquo; ", "wbt"); ?></a>
	
	
	<?php else : ?>
	
		<p><input class="form-control" type="text" name="author" id="author" placeholder="<?php _e("Author", "wbt"); ?>" value="<?php echo esc_attr($comment_author); ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> /></p>
		
		<p><input class="form-control" type="email" name="email" id="email" placeholder="<?php _e("E-mail", "wbt"); ?>" value="<?php echo esc_attr($comment_author_email); ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> /></p>
		
		<p><input class="form-control" type="url" name="url" id="url" class="" placeholder="<?php _e("Web Site", "wbt"); ?>" value="<?php echo esc_attr($comment_author_url); ?>" tabindex="3" /></p>
	
	<?php endif; ?>
	
		<p><textarea class="form-control" name="comment" placeholder="<?php _e("Comment", "wbt"); ?>" id="comment" tabindex="4" rows="4"></textarea></p>
	
		<p><input name="submit" type="submit" id="submitcomment" class="submit btn btn-default" tabindex="5" value="<?php _e("Send", "wbt"); ?>" /></p>
	  
	  <?php comment_id_fields(); ?>
	
	<?php do_action('comment_form', $post->ID); ?>
	</div>
	</form>
	
	<?php endif; // If registration required and not logged in ?>
</section>

<?php endif; // if you delete this the sky will fall on your head ?> 
