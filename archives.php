<?php
/*
Template Name: Archives
*/

/*  Smarter Archives 1.0.1 by rob1n (http://robinadr.com/)
    modded by Vector Akashi
*/
function wp_smart_archives() {
	global $wpdb;
	$years = $wpdb->get_results( "SELECT distinct year(post_date) AS year, count(ID) as posts FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' GROUP BY year(post_date) ORDER BY post_date DESC" );
	if ( empty( $years ) ) { return; }
	$months_short = apply_filters( 'smarter_archives_months', array( '', __('Jan', 's1mpl3'), __('Feb', 's1mpl3'), __('Mar', 's1mpl3'), __('Apr', 's1mpl3'), __('May', 's1mpl3'), __('Jun', 's1mpl3'), __('Jul', 's1mpl3'), __('Aug', 's1mpl3'), __('Sep', 's1mpl3'), __('Oct', 's1mpl3'), __('Nov', 's1mpl3'), __('Dec', 's1mpl3') ) );
	print '<div class="smart-archives">';
	foreach ( $years as $year ) {
		print '<p><a class="year-link" href="' . get_year_link( $year->year ) . '">' . $year->year . '</a><b>:</b>&nbsp;&nbsp;';
		for ( $month = 1; $month <= 12; $month++ ) {
			if ( (int) $wpdb->get_var( "SELECT COUNT(ID) FROM $wpdb->posts WHERE post_type = 'post' AND post_status = 'publish' AND year(post_date) = '$year->year' AND month(post_date) = '$month'" ) > 0 ) { print '<a href="' . get_month_link( $year->year, $month ) . '">' . $months_short[$month] . '</a>'; }
			else { print '<span class="empty-month">' . $months_short[$month] . '</span>'; }
			if ( $month != 12 ) { print '&nbsp;<b class="separator">|</b>&nbsp;'; }
		} print '</p>';
	} print '</div>';
}

?>
<?php include 'header.php'; ?>

    <div id="post-contents">

      <div class="post">

        <div class="post-head">

          <div class="post-title"><a href="<?php the_permalink() ?>" rel="bookmark"><?php _e('Archives', 's1mpl3'); ?></a></div>
          <div class="post-date"></div>

          <div class="post-line">
            <div class="post-lineleft"></div>
            <div class="post-linecenter"></div>
            <div class="post-lineright"></div>
          </div>

        </div>

        <div class="post-text">

          <div class="archiv">

            <h3 class="archhead"><?php _e('Calendary', 's1mpl3'); ?></h3>

            <?php wp_smart_archives(); ?>

            <h3 class="archhead"><?php _e('Categories', 's1mpl3'); ?></h3>
            <ul>
              <?php wp_list_categories('orderby=name&show_count=1&title_li='); ?>
            </ul>

            <h3 class="archhead"><?php _e('All posts', 's1mpl3'); ?></h3>
            <ul>
              <?php wp_get_archives('type=postbypost'); ?>
            </ul>

          </div>

        </div>

      </div>

    </div>

<?php get_sidebar(); ?>

    <div class="spacer"></div>

<?php include 'footer.php'; ?>