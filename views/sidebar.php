<?php
// load the API Client library
// include(get_template_directory_uri() . "/Eventbrite.php");
include(get_template_directory()."/Eventbrite.php");

// Initialize the API client
//  Eventbrite API / Application key (REQUIRED)
//   http://www.eventbrite.com/api/key/
//  Eventbrite user_key (OPTIONAL, only needed for reading/writing private user data)
//   http://www.eventbrite.com/userkeyapi

//test_app_key: VBGXTDKF6KIURVPCBR / vrai key: VCQZTVRNGERPPCJIYP
//test_user_key: 138668242583242740277 / vri userkey 134123987636170296330

$now = time();
if( $now > intval(file_get_contents('time'))+60*60*24){
  try {
  $authentication_tokens = array('app_key'  => 'VBGXTDKF6KIURVPCBR',
                                 'user_key' => '138668242583242740277');

  $eb_client = new Eventbrite( $authentication_tokens );

  // For more information about the features that are available through the Eventbrite API, see http://developer.eventbrite.com/doc/
  $events = $eb_client->user_list_events();
  $s = serialize($events);
  file_put_contents('events', $s);
  }
  catch (Exception $e) {
  }
  file_put_contents('time', $now);
}

//mark-up the list of events that were requested 
// render in html - ?>

<?php
/**
 * The sidebar containing the secondary widget area
 *
 * Displays on posts and pages.
 *
 * If no active widgets are in this sidebar, hide it completely.
 *
 * @package WordPress
 * @subpackage Ippon
 * @since Ippon 1.0
 */

if ( is_active_sidebar( 'sidebar-2' ) ) : ?>
  <div class="col-sm-4">
    <aside id="aside-content">
      <div class="sidebar-inner">
        <!-- insertions automatiques des événements Eventbrite rattachés au compte Ippon -->
        <?= Eventbrite::eventList( unserialize(file_get_contents('events')), 'eventListRow'); ?>
        <div class="widget-area">
          <?php dynamic_sidebar( 'sidebar-2' ); ?>
        </div><!-- .widget-area -->
      </div><!-- .sidebar-inner -->
    </aside><!-- #tertiary -->
  </div>
<?php endif; ?>