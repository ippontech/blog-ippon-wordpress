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

      </div><!-- .row -->
    </div><!-- #main -->
  </div><!-- #page -->

  <div class="backtotop">
    <a href="#"></a>
  </div>

  <footer class="main-footer">
    <div class="container">
      <div class="row contacts">
        <div class="col-md-4 col-sm-8">
          <div class="adresses">
            <address>
              <h1>Paris</h1>
              Tél : + 33 (0)1 46 12 48 48<br/>
              43, avenue de la Grande Armée<br/>
              75116 Paris<br/>
            </address>
            <address>
              <h1>New York</h1>
              60 Broad Street Suite 3502<br/>
              New York, NY 10004<br/>
              United States of America<br/>
            </address>
          </div>
        </div>
        <div class="col-md-4 col-sm-4">
          <div class="adresses">          
            <address>
              <h1>Bordeaux</h1>
              Tél : +33 (0)5 56 30 69 31<br/>
              61 cours de l’Intendance<br/>
              33000 Bordeaux<br/>
            </address>
            <address>
              <h1>Nantes</h1>
              Tél : +33 (0)2 40 48 28 06<br/>
              1 Rue Du Guesclin<br/>
              44019 Nantes Cedex<br/>
            </address>
            <address>
              <h1>Toulouse</h1>
              Tél : +33 (0)5 34 51 23 60<br/>
              Immeuble Burolines II<br/>
              2 ter, rue Marcel Doret<br/>
              31700 Blagnac<br/>
            </address>
          </div>
        </div>
        <div class="col-md-2 col-sm-8">
          <div class="accounts-links">
            <h1>Nos réseaux</h1>
            <?php get_template_part('social-network-withtitle', 'none'); ?>
          </div>
        </div>
        <div class="col-md-2 col-sm-4">
          <div class="friends-links">
            <h1>Nos sites</h1>
            <a href="http://www.ippon.fr" target="_blank">ippon.fr</a>
            <a href="http://www.ippon-hosting.fr" target="_blank">ippon-hosting.fr</a>
            <a href="http://www.ippon-digital.fr" target="_blank">ippon-digital.fr</a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-12 copyrights">
          <p>
            <?php echo 'Copyright &copy; ' . date("Y") . ' ' . get_bloginfo('name'); ?>
            - All Right Reserved
          </p>
          <p>
            Powered by Ippon and WordPress
          </p>
        </div>
      </div>
    </div>
  </footer>

  <?php wp_footer(); ?>

  <?php // jQuery ?>
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>
  <script>window.jQuery || document.write('<script src="<?php echo get_template_directory_uri(); ?>/js/vendor/jquery-1.10.1.min.js"><\/script>')</script>

  <?php // Pour le chargement d'images en asynchrone cf. https://github.com/vvo/lazyload ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/vendor/lazyload.min.js"></script>

  <?php // Polyfill pour les media queries ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/vendor/css3-mediaqueries.js"></script>

  <?php // Fonctionnalités spécifiques au blog Ippon ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/functions.js"></script>

  <?php // RWD tables cf. http://zurb.com/playground/responsive-tables ?>
  <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/js/vendor/responsive-tables.js"></script>

  <script>
  
    $(document).ready(function() {
      MY_MENU.init();
    });
  if (Function('/*@cc_on return document.documentMode===10@*/')() || Function('/*@cc_on return document.documentMode===9@*/')()){
    $( "div" ).addClass(function( index, currentClass ) {
    
    var addedClass;
   
    if ( currentClass === "menu" ) {
      addedClass = "ie9_10_menu";
    }
    if ( currentClass === "header-rs" && Function('/*@cc_on return document.documentMode===9@*/')()) {
      addedClass = "ie9_flex";
    } else if ( currentClass === "header-rs" ){
      addedClass = "ie10_flex";
    }
    return addedClass;
    });
  }
  </script>

</body>
</html>