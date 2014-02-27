
 
<!doctype html>

<head>


  <meta charset="<?php bloginfo('charset'); ?>">

  <?php // Google Chrome Frame for IE ?>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

  <title><?php bloginfo('name'); ?></title>

  <!-- <META NAME="ROBOTS" CONTENT="NOINDEX, NOFOLLOW"> -->

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


  <?php // Bootstrap 3 + styles spécifiques ?>  
  <link rel="stylesheet" id="twentythirteen-style-css" href="<?php echo get_template_directory_uri(); ?>/style.css" type="text/css" media="all">
  <?php // Fonts iconiques nécessaires (uniquement celles dont on a besoin) ?>
  <?php // cf. http://fontello.com/ ?>
  <link href="<?php echo get_template_directory_uri(); ?>/fonts/fontello/css/fontello.css" rel="stylesheet">

  <?php // Modernizr cf. http://modernizr.com/ ?>
  <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.7.1/modernizr.min.js" type="text/javascript"></script>
  <?php //YepNope ?>
  <script src="//cdnjs.cloudflare.com/ajax/libs/yepnope/1.5.4/yepnope.min.js"></script>

  <?php // html5shiv.js cf. https://code.google.com/p/html5shiv/ ?>
  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/r29/html5.js"></script>
  <?php // respond.js cf. https://github.com/scottjehl/Respond ?>
  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.4.2/respond.js" type="text/javascript"></script>  

  <?php //Flexie ?>
  <script>
  Modernizr.load({
  test: Modernizr.flexbox,
  nope: '//cdnjs.cloudflare.com/ajax/libs/flexie/1.0.3/flexie.min.js'
  });
  </script>
  <!--[if gt IE 8]><!--> 
  <style type="text/css"> .no-flexbox .menu {
  margin-top: -21px;
  }
  </style> <!--<![endif]--> 

  <!-- CONTENU WP_HEAD -->
  <?php wp_head(); ?>
  <!-- FIN CONTENU WP_HEAD -->


</head> 

<body <?php body_class(); ?>>

  <div id="page" class="container">
    <header id="masthead" role="banner">
      <div class="row">
        <div class="col-xs-6 col-sm-4 col-sm-push-8">
          <div class="visible-xs">
            <a href="#menu" class="menu-link">
              <div class="menu-mobile">
                <i class="icon-menu"></i>
              </div>
            </a>
          </div>
          <div class="hidden-xs">
            <div class="header-rs">
              <?php get_template_part('social-network', 'none'); ?>
            </div>
          </div>
        </div>
        <div class="col-xs-6 col-sm-8 col-sm-pull-4 second-banner">
          <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
            <div class="logo"></div>
          </a>
        </div>
      </div>
      <div class="row">
        <!-- <div class="col-sm-12"> -->
          <div class="hidden-xs">
            <img src="<?php echo get_header_image() ?>" class="img-responsive"/>
          </div>
        <!-- </div> -->
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
