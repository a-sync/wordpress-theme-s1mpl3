<?php get_header(); ?>

  <div id="post-contents">

    <div class="post">
        <div class="post-head">
          <div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('404 - Nothing here', 's1mpl3'); ?></a></div>
          <div class="post-date"></div>
          <div class="post-line"><div class="post-lineleft"></div><div class="post-linecenter"></div><div class="post-lineright"></div></div>
        </div>
        <div class="post-text">
          <?php _e('The page you are looking for is moved or deleted, sorry...', 's1mpl3'); ?>
        </div><div class="post-foot"></div>
    </div>

  </div>

<?php get_sidebar(); ?>

  <div class="spacer"></div>

<?php get_footer(); ?>