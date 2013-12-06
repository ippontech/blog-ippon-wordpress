<?php
/**
 * The template for displaying Category pages
 *
 * @link http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Ippon
 * @since Ippon 1.0
 */

get_header(); ?>

  <div id="primary" class="col-sm-8 content-area">
    <div id="content" class="site-content" role="main">

    <header class="archive-header hidden-xs">
      <h1 class="archive-title">
        <?php echo single_cat_title(); ?>
      </h1>
      <?php if (category_description()) : // Show an optional category description ?>
        <p class="archive-meta"><?php echo category_description(); ?></p>
      <?php endif; ?>
    </header><!-- .archive-header -->

    <?php if (have_posts()) : ?>
      <?php /* The loop */ ?>
      <?php while (have_posts() ) : the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
      <?php endwhile; ?>
      <?php ippon_paging_nav(); ?>
    <?php else : ?>
      <?php get_template_part('content', 'none' ); ?>
    <?php endif; ?>

    </div><!-- #content -->
  </div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>