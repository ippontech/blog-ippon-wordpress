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
        <a href="http://github.com/ippontech" target="_blank"><i class="fa fa-github-alt"></i></a>
        <a href="https://plus.google.com/106753560954832510210/posts" target="_blank"><i class="fa fa-google-plus"></i></a>
        <a href="http://www.youtube.com/user/ippontechtv" target="_blank"><i class="fa fa-youtube"></i></a>
        <a href="http://twitter.com/ippontech" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="/?feed=rss" target="_blank"><i class="fa fa-rss"></i></a>
        <a href="http://www.linkedin.com/company/ippon-technologies" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://vimeo.com/ippontech" target="_blank"><i class="fa fa-vimeo-square"></i></a>
      </div>
      <div class="friends-links">
        <a href="http://www.ippon.fr" target="_blank">ippon.fr</a>
        <a href="http://www.atomes.com" target="_blank">atomes.com</a>
        <a href="http://www.ippon-digital.fr" target="_blank">ippon-digital.fr</a>
        <a href="http://www.blog.ippon.fr" target="_blank">blog.ippon.fr</a>
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
  <script>window.jQuery || document.write('<script src="<?php bloginfo('template_url'); ?>/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/vendor/lazyload.js"></script>
  <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/functions.js"></script>
  <script>
    $(document).ready(function() {
      MY_MENU.init();
    });
  </script>

</body>
</html>