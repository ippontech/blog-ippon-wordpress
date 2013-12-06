<?php
/**
 * The Header template for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
  <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.1/css/font-awesome.css" rel="stylesheet">
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
