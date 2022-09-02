# Font Awesome Pseudo Elements
window.FontAwesomeConfig = searchPseudoElements: true

# Document Ready
jQuery(document).ready ($) ->
  # AOS
  #Object Fit Image Polyfill for IE11
  AOS.init();
  objectFitImages()
  
  # Mobile Menu Toggle
  $('.menu-toggle').on 'click', (e) ->
    $(this).toggleClass 'active'
    $('.menu-wrapper').toggleClass 'open'
    $('.body--wrapper').toggleClass 'nav-open'

  # Header Search Toggle
  $('.nav-search-btn').click ->
    $('.header-search-wrapper').addClass('search-open')
    $('.header-search-input').focus()
  $('.header-search-close').click ->
    $('.header-search-wrapper').removeClass('search-open')

  $(window).load ->


# Media Query Change
# WidthChange = (mq) ->
#   if mq.matches
#     jQuery('.primary-nav').appendTo('.primary-header')
#   else
#     jQuery('.primary-nav').insertAfter('.secondary-header')
# if matchMedia
#   mq = window.matchMedia('(min-width: 900px)')
#   mq.addListener WidthChange
#   WidthChange mq
