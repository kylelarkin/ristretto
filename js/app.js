// Font Awesome Pseudo Elements
window.FontAwesomeConfig = {
  searchPseudoElements: true
};

jQuery(document).ready(function ($) {
  
  // Smooth Scroll
  $('a').smoothScroll();

  // Mobile Menu Toggle
  $('.menu-toggle').on('click', function (e) {
    $(this).toggleClass('active');
    $('.menu').toggleClass('nav-open');
  });

  // Search header Toggle
  $('.search-toggle').on('click', function (e) {
    $('.body--header .searchform').toggleClass('open');
  });
  $('#search-close').on('click', function (e) {
    $('.body--header .searchform').removeClass('open');
  });

  // Sub menu toggles
  $('.menu > .menu-item-has-children').on('click', function (e) {
    var $submenu = $(this).children('.sub-menu');
    if ($submenu.hasClass('open')) {
      $submenu.removeClass('open');
    } else {
      $submenu.addClass('open');
      $(this).siblings().find('.sub-menu').removeClass('open');
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

});


jQuery(window).on('load', function () {
  // Initialize Jarallax FIRST, then AOS
  jarallax(document.querySelectorAll('.jarallax, .has-parallax'), {
    speed: 0.2,
    imgPosition: 'center bottom'
  });

  AOS.init();
  
});