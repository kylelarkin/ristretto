// Font Awesome Pseudo Elements
window.FontAwesomeConfig = {
  searchPseudoElements: true
}; // Document Ready

jQuery(document).ready(function ($) {
  // AOS
  AOS.init();
  
  // Mobile Menu Toggle
  $('.menu-toggle').on('click', function (e) {
    $(this).toggleClass('active');
    $('#menu-primary-header-menu').toggleClass('nav-open');
  }); 
  
  //sub menu toggles
  $('#menu-primary-header-menu > .menu-item-has-children').on('click', function (e) {
    var $submenu = $(this).find('.sub-menu');
    // If the clicked sub-menu already has 'open-sub-menu', remove it
    if ($submenu.hasClass('open-sub-menu')) {
      $submenu.removeClass('open-sub-menu');
    } else {
      // Otherwise, add 'open-sub-menu' to the clicked one and remove it from its siblings
      $submenu.addClass('open-sub-menu');
      $(this).siblings().find('.sub-menu').removeClass('open-sub-menu');
    }
  });
  
  // Header Search Toggle
  $('.nav-search-btn').click(function () {
    $('.header-search-wrapper').addClass('search-open');
    return $('.header-search-input').focus();
  });
  $('.header-search-close').click(function () {
    return $('.header-search-wrapper').removeClass('search-open');
  });
  return $(window).load(function () {});
});

// Media Query Change
// WidthChange = (mq) ->
//   if mq.matches
//     jQuery('.primary-nav').appendTo('.primary-header')
//   else
//     jQuery('.primary-nav').insertAfter('.secondary-header')
// if matchMedia
//   mq = window.matchMedia('(min-width: 900px)')
//   mq.addListener WidthChange
//   WidthChange mq

jQuery(window).on('scroll', function () {
  return AOS.refreshHard();
}); //setup parallax settings

jQuery(window).on('load', function () {
  return jarallax(document.querySelectorAll('.jarallax, .has-parallax'), {
    speed: 0.2,
    imgPosition: 'center bottom'
  });
});

//# sourceMappingURL=app.js.map
