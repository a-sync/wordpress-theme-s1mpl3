<?php
load_theme_textdomain('s1mpl3');//call in air support!
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/2002/REC-xhtml1-20020801/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
  <head profile="http://gmpg.org/xfn/11">
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />

    <title><?php bloginfo('name'); ?> <?php wp_title(); ?></title>

    <meta name="generator" content="WordPress <?php //bloginfo('version'); ?>" /> <!-- leave this for stats / or keep it commented for security :-/ -->

    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
    <link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php wp_get_archives('type=monthly&format=link'); ?>
    <?php wp_head(); ?>

  </head>
<body>

  <div id="container">

    <div id="head">
      <h1 id="blogname">
        <?php $words=explode(' ',get_option('blogname'));$j=1;for($i=0;count($words)>$i;$i++){echo'<a class="blognameword'.$j.'" href="'.get_option('home').'/">'.$words[$i].' </a>';if($j==3){$j=1;}else{$j++;}} ?>
      </h1>
      <h1 id="blogdescription"><?php bloginfo('description'); ?></h1>
    </div>

    <div id="menubar">
      <div id="menu"><i class="page_item home"><a href="<?php echo get_option('home'); ?>/"><?php _e('Home', 's1mpl3'); ?></a></i>

<?php
          /* ----- Horizontal Menu Generator ----- */
          //if(wp_list_pages('meta_key=menu&meta_value=menu&sort_column=menu_order&echo=0&title_li=')) {
            $p = wp_list_pages('meta_key=menu&meta_value=menu&sort_column=menu_order&echo=0&title_li=&depth=-1');
          //}
          //else {
          //  $p = wp_list_pages('sort_column=menu_order&depth=1&echo=0&title_li=&depth=1');
          //}
          if($p != '') {
            $p = preg_replace('/<li class=/', '<i class=', $p);
            $p = preg_replace('/<\/li>/', '</i>', $p);
            echo $p;
          }
?>

      </div>
      <div id="search">

        <form method="get" id="searchform1" action="<?php bloginfo('url'); ?>/">
          <div>
            <input type="text" value="<?php the_search_query(); ?>" name="s" id="s1" tabindex="1"/>
            <input type="submit" id="searchsubmit1" value="<?php echo __('Search', 's1mpl3').'!'; ?>" />
          </div>
        </form>

      </div>
    </div>

    <div class="spacer"></div>

<!-- end header -->