<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */

if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
  <aside class="col-sm-4">
    <div class="sidebar-inner">
      <div class="widget-area">
        <?php dynamic_sidebar( 'sidebar-2' ); ?>
      </div><!-- .widget-area -->
    </div><!-- .sidebar-inner -->
  </aside><!-- #tertiary -->
<?php endif; ?>