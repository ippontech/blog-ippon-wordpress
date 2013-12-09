
<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
  <meta charset="<?php bloginfo('charset'); ?>">

  <?php // Google Chrome Frame for IE ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <meta name="description" content="<?php echo get_bloginfo ('description' );  ?>">

  <?php // mobile meta (hooray!) ?>
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon_129x129.png">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon_32x32.png">
  <!--[if IE]>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon_16x16.ico">
    <![endif]-->
  <?php // or, set /favicon.ico for IE10 win ?>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/favicon_144x144.png">

  <link rel="profile" href="http://gmpg.org/xfn/11">

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body <?php body_class(); ?>>
  <div id="page" class="container-fluid">
    <header id="masthead" class="" role="banner">
      <div class="row header-banner">
        <div class="col-sm-2">
          <div class="row visible-xs">
            <div class="col-xs-8">
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo_IpponGroupe.png" class="img-responsive"/>
            </div>
            <div class="col-xs-4">
              <a href="#menu" class="menu-link">
                <i class="fa fa-bars"></i><span class="hidden-xs"> Menu</span>
              </a>
            </div>
          </div>
          <div class="hidden-xs">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
              <img src="<?php echo get_template_directory_uri(); ?>/img/logo_IpponGroupe.png" class="img-responsive"/>
            </a>
          </div>
        </div>
        <div class="col-sm-10 hidden-xs">
          <img src="<?php echo get_header_image() ?>" class="img-responsive"/>
        </div>
      </div>

      <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
        <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
        <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
      </a>
      <div class="menu-search">
        <div class="home-link hidden-xs">
          <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">
            <i class="fa fa-home fa-lg"></i>
          </a>
        </div>

        <nav id="menu" role="navigation">

            <?php
            $defaults = array(
              'theme_location'  => '',
              'menu'            => '',
              'container'       => '',
              // 'container_class' => '',
              'container_id'    => '',
              // 'menu_class'      => '',
              'menu_id'         => '',
              'echo'            => true,
              'fallback_cb'     => 'wp_page_menu',
              'before'          => '',
              'after'           => '',
              'link_before'     => '',
              'link_after'      => '',
              'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
              'depth'           => 0,
              'walker'          => ''
            );
            wp_nav_menu( $defaults );
            ?>
        </nav>
        <div class="search-link hidden-xs">
          <?php get_search_form(); ?>
        </div>
    </header><!-- #masthead -->

    <div id="main">
      <div class="row">
