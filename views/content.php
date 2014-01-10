<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 *
 * @package WordPress
 * @subpackage Ippon
 * @since Ippon 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <header class="entry-header row">

    <!-- Affichage du titre avec ou sans lien -->
    <div class="col-xs-12">
      <?php if (is_single()) : ?>
      <h1 class="entry-title"><?php the_title(); ?></h1>
      <?php else : ?>
      <a href="<?php the_permalink(); ?>" rel="bookmark">
        <h1 class="entry-title">
          <?php the_title(); ?>
        </h1>
      </a>
      <?php endif; // is_single() ?>
    </div>

  </header><!-- .entry-header -->

  <div class="post-meta">
    <?php ippon_meta_date(); ?>
    <div class="meta-author-tags">
      <?php ippon_meta_author(); ?>
      <div class="meta-tags">
        <?php if (get_the_tag_list()) : ?>
          <?php echo get_the_tag_list('<i class="icon-tags"></i> ',', ','');?>
        <?php endif; // get_the_tag_list() ?>
      </div><!-- .tags-meta -->
    </div>
  </div>

  <?php if (is_search() || !is_single()) : ?>
  <!-- Affichage du résumé -->
    <?php if (has_post_thumbnail() && !post_password_required()) : ?>
    <!-- Avec image -->
      <div class="entry-thumbnail row">
        <div class="col-sm-6">
          <figure class="centerImage">
          <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>  
          </figure>
        </div>
        <div class="col-sm-6">
          <?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>
            <?php the_content(''); ?>
          <?php else : ?>
            <?php the_excerpt(); ?>
          <?php endif; ?>
          <div class="calltoaction">
            <a class="next" href="<?php the_permalink(); ?>" rel="bookmark">
            <?php if (get_post_format()=='video') : ?>
              Voir la vidéo
            <?php else : ?>
              Lire l'article
            <?php endif; ?>
            </a>
          </div>
        </div>
      </div>
    <?php else : ?>
    <!-- Sans image -->
      <div class="entry-content">
        <?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>
          <?php the_content(''); ?>
        <?php else : ?>
          <?php the_excerpt(); ?>
        <?php endif; ?>
      </div><!-- .entry-content -->
    <?php endif; ?>
    <!-- Lien pour accéder à l'article en entier -->
    <footer class="hidden-xs">

    </footer>

  <!-- Affichage de l'ensemble de l'article -->
  <?php else : ?>
    <!-- Avec image -->
    <?php if (has_post_thumbnail() && !post_password_required() && get_post_format()!=='video') : ?>
      <div class="entry-thumbnail">
        <div class="row">
          <div class="col-sm-6">
            <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
          </div>
          <div class="col-sm-6 content-teaser">
            <?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>
              <?php 
                global $more;    // Declare global $more (before the loop).
                $more = 0;       // Set (inside the loop) to display content above the more tag.
                the_content('');
              ?>
            <?php endif; ?>
          </div>
          <div class="col-sm-12">
            <?php 
              global $more;    // Declare global $more (before the loop).
              $more = 1;       // Set (inside the loop) to display all content, including text below more.
              the_content('',false);
            ?>
          </div>
        </div>
      </div>

    <!-- Sans image -->
    <?php else : ?>
      <div class="entry-content">
        <div class="row">
          <div class="col-sm-12 content-teaser">
            <?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>
              <?php 
                global $more;    // Declare global $more (before the loop).
                $more = 0;       // Set (inside the loop) to display content above the more tag.
                the_content('');
              ?>
            <?php endif; ?>
          </div>
          <div class="col-sm-12">
            <?php 
              global $more;    // Declare global $more (before the loop).
              $more = 1;       // Set (inside the loop) to display all content, including text below more.
              the_content('',false);
            ?>
          </div>
        </div>
      </div>    

    <?php endif; ?>
    <footer class="entry-meta">
      <?php if (is_single() && get_the_author_meta('description') && is_multi_author() ) : ?>
        <?php get_template_part('author-bio'); ?>
      <?php endif; ?>
    </footer><!-- .entry-meta -->
  <?php endif; ?>

</article><!-- #post -->