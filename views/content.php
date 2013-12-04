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
  <header class="entry-header">

    <!-- Affichage du titre avec ou sans lien -->
    <?php if ( is_single() ) : ?>
    <h1 class="entry-title"><?php the_title(); ?></h1>
    <?php else : ?>
    <a href="<?php the_permalink(); ?>" rel="bookmark">
      <h1 class="entry-title">
        <?php the_title(); ?>
      </h1>
    </a>
    <?php endif; // is_single() ?>

    <!-- Affichage des meta données -->
    <div class="article-meta">
      <?php ippon_meta(); ?>
      
      <?php if (comments_open() && ! is_single()) : ?>
        <div class="comments-meta">
          <i class="fa fa-comment"></i>
          <?php comments_popup_link( '<span class="leave-reply">' . __( 'Leave a comment', 'twentythirteen' ) . '</span>', __( 'One comment so far', 'twentythirteen' ), __( '% comments', 'twentythirteen' ) ); ?>
        </div><!-- .comments-meta -->
      <?php endif; // comments_open() ?>

      <?php if (get_the_tag_list()) : ?>
        <div class="tags-meta">
          <?php echo get_the_tag_list('<i class="fa fa-tag"></i> ',', ','');?>
        </div><!-- .tags-meta -->
      <?php endif; // get_the_tag_list() ?>
    </div><!-- .article-meta -->
    





  </header><!-- .entry-header -->


  <!-- Affichage du résumé -->
  <?php if (is_search() || !is_single()) : ?>
    <!-- Avec image -->
    <?php if (has_post_thumbnail() && !post_password_required()) : ?>
      <div class="entry-thumbnail row">
        <div class="col-sm-6">
          <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
        </div>
        <div class="col-sm-6 ">
          <?php if ($pos=strpos($post->post_content, '<!--more-->')): ?>
            <?php the_content(''); ?>
          <?php else : ?>
            <?php the_excerpt(); ?>
          <?php endif; ?>
          <p>
            <a class="calltoaction" href="<?php the_permalink(); ?>" rel="bookmark">
              Lire la suite
            </a>
          </p>
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
        <p>
          <a class="calltoaction" href="<?php the_permalink(); ?>" rel="bookmark">
            Lire la suite
          </a>
        </p>
      </div><!-- .entry-content -->
    <?php endif; ?>

  <!-- Affichage de l'ensemble de l'article -->
  <?php else : ?>
    <!-- Avec image -->
    <?php if (has_post_thumbnail() && !post_password_required()) : ?>
      <div class="entry-thumbnail row">
        <div class="col-sm-6">
          <?php the_post_thumbnail('full', array('class' => 'img-responsive')); ?>
        </div>
        <div class="col-sm-6">
<?php 
global $more;    // Declare global $more (before the loop).
$more = 0;       // Set (inside the loop) to display content above the more tag.
the_content('');
?>
        </div>
      </div>
      <div>
        UU<?php 
global $more;    // Declare global $more (before the loop).
$more = 1;       // Set (inside the loop) to display all content, including text below more.
the_content('',false);
?>
      </div>
    <!-- Sans image -->
    <?php else : ?>
      <?php the_content(); ?>
    <?php endif; ?>
  <?php endif; ?>




  <footer class="entry-meta">
    <?php if (is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
      <?php get_template_part( 'author-bio' ); ?>
    <?php endif; ?>
  </footer><!-- .entry-meta -->
</article><!-- #post -->
