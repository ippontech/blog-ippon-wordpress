/**
 * Functionality specific to Ippon.
 */

var MY_MENU = (function() {
  var init = function() {

    //console.debug('begin building menu-link');
    $('body').addClass('js');
    var $menu = $('#menu'),
    $menulink = $('.menu-link');

    $menulink.click(function() {
      $menulink.toggleClass('active');
      $menu.toggleClass('active');
      return false;
    });
    //console.debug('end building menu-link');
  }

  var public_functions = {};
  public_functions.init = init;
  
  return public_functions;

})();
