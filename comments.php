<?php // Do not delete these lines
	if ('comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die(__('Forbidden for you!', 's1mpl3').' <a href="'.bloginfo('url').'">'.__('Start here...', 's1mpl3').'</a>');

	if (!empty($post->post_password)) { // if there's a password
		if ($_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password) {  // and it doesn't match the cookie
			?>

	<table class="log"><tr><td class="logbody"><i><?php _e('You have to give the password to see the comments!', 's1mpl3'); ?></i></td><tr></table>
			<?php
			return;
		}
	}

	/* This variable is for alternating comment background */
	$c = 1;
?>

  <div id="comments">

<?php if ($comments) : ?>
	<?php foreach ($comments as $comment) : ?>

    <div class="<?php echo 'comment'.$c; ?>">
      <div class="comment-head">
        <?php comment_author_link() ?> @ <em><a name="comment-<?php comment_ID() ?>"><?php comment_time('F j, Y &#8212; g:i a') ?></a></em><?php edit_comment_link(__('Edit This', 's1mpl3'),' # ',''); ?>
      </div>

      <div class="comment-text">
        <?php comment_text() ?>
        <?php if ($comment->comment_approved == '0') { ?>[<em><?php _e('Your comment is waiting for approval.', 's1mpl3'); ?></em>]<?php } ?>
      </div>

    </div>

		<?php
			if ($c < 3) $c++;
			else $c = 1;
			endforeach; /* end for each comment */
		?>

<?php else : // this is displayed if there are no comments so far ?>
	<?php if ('open' != $post->comment_status && !is_page()) : ?>
    <a class="comment-head" name="comments" href="#commentform"><?php _e('Comments closed!', 's1mpl3'); ?></a>
	<?php endif; ?>

  <?php if ('open' == $post->comment_status && !(get_option('comment_registration') && !$user_ID)) : ?>
    <a class="comment-head" name="comments" href="#commentform"><?php _e('Leave a comment!', 's1mpl3'); ?></a>
	<?php endif; ?>

<?php endif; ?>

<?php if ('open' == $post->comment_status) : ?>
	<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
    <a class="comment-head" href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php the_permalink(); ?>"><?php _e('Log in', 's1mpl3'); ?></a><?php _e('to leave a comment.', 's1mpl3'); ?>
<?php else : ?>

    <div id="comment-form">
      <form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post">

    <?php if ( $user_ID ) : ?>
      <?php _e('Logged in as: ', 's1mpl3'); ?> <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a><br />
    <?php else : ?>

      <?php _e('Name', 's1mpl3'); ?>:<?php if ($req) echo '<b><font color="red">*</font></b>'; ?>
      <input class="inputbox1" type="text" name="author" value="<?php echo $comment_author; ?>" maxlength="32" tabindex="1" /><br />

      <i><?php _e('(we keep it secret)', 's1mpl3'); ?></i> <?php _e('E-Mail', 's1mpl3'); ?>:<?php if ($req) echo '<b><font color="red">*</font></b>'; ?>
      <input class="inputbox1" type="text" name="email" value="<?php echo $comment_author_email; ?>" tabindex="2" /><br />

      <?php _e('Webpage', 's1mpl3'); ?>:
      <input class="inputbox1" type="text" name="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /><br />

    <?php endif; ?>
      <textarea class="inputbox2" name="comment" rows="7" cols="10" tabindex="4"></textarea><br />
            
      <input name="submit" class="button" type="submit" value="<?php _e('Send', 's1mpl3'); ?>!" tabindex="5" />&nbsp;
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
      <input class="button" type="button" value="&lt;&#63;&gt;" onclick="alert('<?php _e('The xHTML tags you can use:', 's1mpl3'); ?> ' + '\n' + '<?php echo allowed_tags(); ?>')" />&nbsp;
      <?php do_action('comment_form', $post->ID); ?>

      </form>
    </div>

<?php endif; // If registration required and not logged in ?>
<?php endif; // if you delete this the sky will fall on your head ?>

  </div>