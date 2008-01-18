<?php get_header(); ?>

  <div id="post-contents">

<!-- begin posts loop -->
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

    <div class="post"><!-- id="post-<?php the_ID(); ?>"> -->

        <div class="post-head">

          <div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php the_title(); ?></a></div>
          <div class="post-date"><?php the_time('F j, Y &#8212; g:i a') ?></div>

          <div class="post-line">
            <div class="post-lineleft"></div>
            <div class="post-linecenter"></div>
            <div class="post-lineright"></div>
          </div>

        </div>

        <div class="post-text">

          <?php the_content(__('&raquo; &raquo; &raquo;', 's1mpl3')); ?>

        </div>

        <div class="post-foot">Posted in <?php the_category(', ') ?> | by <?php the_author() ?> | <?php edit_post_link(__('Edit This', 's1mpl3'), '', ' | '); ?> <?php comments_popup_link(__('Comments (0)', 's1mpl3'), __('Comments (1)', 's1mpl3'), __('Comments (%)', 's1mpl3')); ?></div>

    </div>

  <?php endwhile; else: ?>
    <div class="post">
      <div class="post-head">
        <div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php if(is_404()){_e('404 - Nothing here', 's1mpl3');} else{_e('Nothing found', 's1mpl3');} ?></a></div>
        <div class="post-date"></div>
        <div class="post-line"><div class="post-lineleft"></div><div class="post-linecenter"></div><div class="post-lineright"></div></div>
      </div>
      <div class="post-text">
        <?php if(is_404()){_e('The page you are looking for is moved or deleted, sorry...', 's1mpl3');} else{_e('Sorry, no posts matched your criteria.', 's1mpl3');} ?>
      </div>
      <div class="post-foot"></div>
    </div>
  <?php endif; ?>
<!-- end posts loop -->

  </div>

<?php get_sidebar(); ?>

  <div class="spacer"></div>

  <div id="navigate">

    <div id="next"><?php next_posts_link(__('Next +', 's1mpl3')) ?></div>
    <div id="previous"><?php previous_posts_link(__('+ Previous', 's1mpl3')) ?></div>

  </div>

<?php get_footer(); ?>