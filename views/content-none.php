<?php
/**
 * Le "template" affichant qu'aucuns articles n'a été trouvé
 *
 * @package WordPress
 * @subpackage Ippon
 * @since Ippon 1.0
 */
?>

<div class="page-content">
  <?php if (is_home() && current_user_can( 'publish_posts' ) ) : ?>
    <p><?php printf( __( 'Ready to publish your first post? <a href="%1$s">Get started here</a>.', 'twentythirteen' ), admin_url( 'post-new.php' ) ); ?></p>
  <?php elseif ( is_search() ) : ?>
    <p>Désolé, mais aucuns résultats n'a été trouvé avec votre recherche : <?php echo get_search_query(); ?></p>
    <p>Une nouvelle recherche sera peut être plus fructueuse.</p>    
    <?php get_search_form(); ?>
  <?php else : ?>
    <p>Désolé, mais rien ne correspond à vos attentes.</p>
    <p>Une recherche avec un mot sera peut être plus fructueuse.</p>    
    <?php get_search_form(); ?>
  <?php endif; ?>
</div><!-- .page-content -->
