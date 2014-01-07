
<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

<head>
  <meta charset="<?php bloginfo('charset'); ?>">

  <?php // Google Chrome Frame for IE ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php bloginfo('name'); ?></title>

  <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW">

  <meta name="description" content="<?php echo get_bloginfo ('description' );  ?>">

  <?php // mobile meta (hooray!) ?>
  <meta name="HandheldFriendly" content="True">
  <meta name="MobileOptimized" content="320">
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

  <?php // icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) ?>
  <link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon_129x129.png">
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_template_directory_uri(); ?>/img/favicon_144x144.png">
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_template_directory_uri(); ?>/img/favicon_114x114.png">
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_template_directory_uri(); ?>/img/favicon_72x72.png">
  <link rel="apple-touch-icon-precomposed" href="<?php echo get_template_directory_uri(); ?>/img/favicon_57x57.png">
  <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon_32x32.png">
  <!--[if IE]>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon_16x16.ico">
    <![endif]-->
  <?php // or, set /favicon.ico for IE10 win ?>
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/img/favicon_144x144.png">

  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

  <?php wp_head(); ?>

  <link href="<?php echo get_template_directory_uri(); ?>/fonts/fontello/css/fontello.css" rel="stylesheet">

  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>
</head>

<body <?php body_class(); ?>>

  <div id="page" class="container-fluid">
    <header id="masthead" class="" role="banner">
      <div class="row header-banner">
            <div class="col-xs-6 col-sm-9 col-sm-push-3">
              <div class="visible-xs">
                <a href="#menu" class="menu-link">
                  <div class="menu-mobile">
                    <i class="icon-menu"></i>
                  </div>
                </a>
              </div>
              <div class="hidden-xs">
                <img src="<?php echo get_header_image() ?>" class="img-responsive"/>
              </div>
            </div>
            <div class="col-xs-6 col-sm-3 col-sm-pull-9 second-banner">
              <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                <div class="logo"></div>
              </a>
            </div>
      </div>

      <div class="menu-search row">
        <div class="col-md-8">
          <div class="menu">
            <nav id="menu" role="navigation">
              <ul>
                <?php
                $defaults = array(
                  'theme_location'  => '',
                  'menu'            => '',
                  'container'       => '',
                  'container_class' => '',
                  'container_id'    => '',
                  'menu_class'      => '',
                  'menu_id'         => '',
                  'echo'            => true,
                  'show_home'       => 1,
                  'fallback_cb'     => 'wp_page_menu',
                  'before'          => '',
                  'after'           => '',
                  'link_before'     => '',
                  'link_after'      => '',
                  'items_wrap'      => '%3$s',
                  'depth'           => 0,
                  'walker'          => ''
                );
                wp_nav_menu($defaults);
                ?>
              </ul>
            </nav>
          </div>
        </div>
        <div class="col-md-4 search-link hidden-xs">
          <?php get_search_form(); ?>
        </div>
      </div>
      <div class="description text-center visible-xs">
        <?php bloginfo('name'); ?>
      </div>
    </header><!-- #masthead -->

    <div id="main">
      <div class="row">
