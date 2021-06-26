# Font Awesome Pseudo Elements
window.FontAwesomeConfig = searchPseudoElements: true

# Document Ready
jQuery(document).ready ($) ->
  # Mobile Menu Toggle
  $('.menu-toggle').on 'click', (e) ->
    $(this).toggleClass 'active'
    $('.menu-wrapper').toggleClass 'open'
    $('.body--wrapper').toggleClass 'nav-open'
  
  # Close Menu if Clicked Off
  $('.body--wrapper').click ->
    if $(this).hasClass 'nav-open'
      $('.menu-toggle').removeClass 'active'
      $('.menu-wrapper').removeClass 'open'
      $('.body--wrapper').removeClass 'nav-open'

  # Intercept Logged Out User for Account Icon
  $('.account-signed-out').click (event) ->
    event.preventDefault()
    $('#leaky-paywall-login-form').fadeToggle('fast')
    $('#user_login').focus()
  
  $('body').on 'click', '.leaky-login-link', ->
    $('#leaky-paywall-login-form').fadeIn('fast')
    $('#user_login').focus()

  # Header Search Toggle
  $('.nav-search-btn').click ->
    $('.header-search-wrapper').addClass('search-open')
    $('.header-search-input').focus()
  $('.header-search-close').click ->
    $('.header-search-wrapper').removeClass('search-open')

  # Series Slider
  $('.series-slider').slick(
    prevArrow: false
    nextArrow: false
    fade: true
    autoplay: true
    autoplaySpeed: 6000
    speed: 800
  )

  # Fix for unresponsive Leaky Paywall Table
  $('.leaky-paywall-profile-subscription-details').wrap('<div class="subscriber-table-wrapper"></div>')

  # AOS
  AOS.init();

  # Object Fit Image Polyfill for IE11
  objectFitImages()


  
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
