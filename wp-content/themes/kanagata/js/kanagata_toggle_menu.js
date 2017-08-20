/**
 * Smart phone toggle menu
 *
 * @author Hiroshi Sawai <info@info-town.jp>
 * @copyright Hiroshi Sawai
 * @version 1.0.0
 * @since 1.0.0
 *
 */
jQuery(function ($) {
  /*
   * global menu
   */
  $('#sp_toggle_menu').click(function () {
    $('.menu-global').slideToggle();
    return false;
  });
  $('.menu-item-has-children').bind('click', function (event) {
    if ( "none" === $('#sp_toggle_menu').css('display') ) {
      event.stopPropagation();
      return true;
    }
    if ($(this).children('ul').css('display') === 'none') {
      ($(this).children('ul')).show('slow');
    } else if ($(this).children('ul').css('display') === 'block') {
      $(this).children('ul').hide('slow');
    }
    return false;
  });
  /*
   * extra menu action
   */
  $('#sp_menu_extra').click(function () {
    $('.header__menu-extra').slideToggle();
    return false;
  });
});
