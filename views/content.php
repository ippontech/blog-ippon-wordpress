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

  <div class="row hack-row post-annex">

      <!-- Affichage des meta données principales -->
      <div class="col-xs-9 col-sm-6 post-meta">
        <?php ippon_meta(); ?>
      </div>
      <div class="col-xs-3 col-sm-6 post-meta-secondary">
        <!-- <a href="<?php the_permalink(); ?>" rel="bookmark"> -->
        <div class="article-goto visible-xs">
          <a class="next post-goto" href="<?php the_permalink(); ?>" rel="bookmark">
            Lire<span class="hidden-xs"> l'article</span>
          </a>
        </div>
      <!-- </a> -->
        <!-- Affichage des meta données secondaires -->
        <div class="secondary-meta hidden-xs">
          <?php if (get_the_tag_list()) : ?>
            <div class="tags-meta">
              <?php echo get_the_tag_list('<i class="fa fa-tags"></i> ',', ','');?>
            </div><!-- .tags-meta -->
          <?php endif; // get_the_tag_list() ?>
        </div>
      </div>
  </div>


  <!-- Affichage du résumé -->
  <?php if (is_search() || !is_single()) : ?>
    <!-- Avec image -->
    <?php if (has_post_thumbnail() && !post_password_required()) : ?>
      <div class="entry-thumbnail row">
        <div class="col-sm-6">
          <figure class="centerImage">
          <?php if (get_post_format()=='video') : ?>
            <div class="player-btn">
              <span class="fa-stack fa-lg">
                <i class="fa fa-circle fa-stack-2x"></i>
                <i class="fa fa-flag fa-stack-1x fa-play"></i>
              </span>
            </div>
          <?php endif; ?>
          <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>  
          </figure>
        </div>
        <div class="col-sm-6">
          <?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>
            <?php the_content(''); ?>
          <?php else : ?>
            <?php the_excerpt(); ?>
          <?php endif; ?>
        </div>
      </div>
    <!-- Sans image -->
    <?php else : ?>
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
      <a class="calltoaction next" href="<?php the_permalink(); ?>" rel="bookmark">
        Lire l'article
      </a>
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
