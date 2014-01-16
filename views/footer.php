<?php
/**
 * The template for displaying the footer
 *
 * Contains footer content and the closing of the #main and #page div elements.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

    </div><!-- #main -->
    <footer class="col-md-12 main-footer">
      <div class="accounts-links">
        <?php get_template_part('social-network', 'none'); ?>
      </div>
      <div class="friends-links">
        <a href="http://www.ippon.fr" target="_blank">ippon.fr</a>
        <a href="http://www.ippon-hosting.fr" target="_blank">ippon-hosting.fr</a>
        <a href="http://www.ippon-digital.fr" target="_blank">ippon-digital.fr</a>
      </div>
      <div class="copyrights">
        <p>
          <?php echo 'Copyright &copy; ' . date("Y") . ' ' . get_bloginfo('name'); ?>
          - All Right Reserved
        </p>
        <p>
          Powered by Ippon and WorPress
        </p>
      </div>
    </footer><!-- #colophon -->
    
  </div><!-- #page -->

  <?php wp_footer(); ?>

  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/vendor/lazyload.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery.fittext.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/vendor/css3-mediaqueries.js"></script>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/functions.js"></script>
  <script>
    $(document).ready(function() {
      MY_MENU.init();
      $(".player-btn").fitText(1);
    });
  </script>

</body>
</html>