// Font Awesome Pseudo Elements
window.FontAwesomeConfig = {
  searchPseudoElements: true
}; // Document Ready

jQuery(document).ready(function ($) {
  // AOS
  AOS.init();
  objectFitImages(); // Mobile Menu Toggle

  $('.menu-toggle').on('click', function (e) {
    $(this).toggleClass('active');
    $('.menu-wrapper').toggleClass('open');
    return $('.body--wrapper').toggleClass('nav-open');
  }); // Header Search Toggle

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
