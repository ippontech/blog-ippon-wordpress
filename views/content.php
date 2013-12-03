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
		<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
		<div class="entry-thumbnail">
			<?php the_post_thumbnail(); ?>
		</div>
		<?php endif; ?>

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

	<!-- Affichage du résumé ou de l'ensemble du post -->
	<?php if ( is_search() || !is_single()) : ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'twentythirteen' ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentythirteen' ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php if ( is_single() && get_the_author_meta( 'description' ) && is_multi_author() ) : ?>
			<?php get_template_part( 'author-bio' ); ?>
		<?php endif; ?>
	</footer><!-- .entry-meta -->
</article><!-- #post -->
