$(document).ready(function () {
  'use strict';

  $('.slider').ripples({
    dropRadius: 5,
    perturbance: 0.001,
  });

  $('.text').typed({
    strings: [
      '<strong>TRAVEL WITH ALL YOUR</strong> <strong class="primary">HEART...</strong>',
    ],
    typespeed: 0,
    loop: true,
  });

  $('.restaurant-name').typed({
    strings: ['<strong>KING</strong> <strong class="primary">FOOD...</strong>'],
    typespeed: 0,
    loop: true,
  });

  $('.hotel-name').typed({
    strings: [
      '<strong>MAJESTIC</strong> <strong class="primary">HOTEL...</strong>',
    ],
    typespeed: 0,
    loop: true,
  });

  $('.shop-name').typed({
    strings: [
      '<strong>CENTAURUS</strong> <strong class="primary">MALL...</strong>',
    ],
    typespeed: 0,
    loop: true,
  });

  $('.must-name').typed({
    strings: [
      '<strong>BADSHAHI</strong> <strong class="primary">MOSQUE...</strong>',
    ],
    typespeed: 0,
    loop: true,
  });

  $('.event-name').typed({
    strings: [
      '<strong>LANTERNS</strong> <strong class="primary">FESTIVAL...</strong>',
    ],
    typespeed: 0,
    loop: true,
  });

  $(window).scroll(function () {
    var top = $(window).scrollTop();
    if (top >= 60) {
      $('nav').addClass('secondary');
    } else if ($('nav').hasClass('secondary')) {
      $('nav').removeClass('secondary');
    }
  });

  $('.work').magnificPopup({
    delegate: 'a', // child items selector, by clicking on it popup will open
    type: 'image',
    gallery: { enabled: true },
  });

  $('#team-members').owlCarousel({
    items: 3,
    autoplay: true,
    smartspeed: 700,
    loop: true,
    autoplayHoverPause: true,
    responsive: {
      0: { items: 1 },
      480: { items: 2 },
      768: { items: 3 },
    },
  });

  $('.counter').counterUp({
    delay: 10,
    time: 4000,
  });

  $('a.smooth-scroll').click(function (event) {
    event.preventDefault();
    var section = $(this).attr('href');
    $('html, body').animate(
      {
        scrollTop: $(section).offset().top - -2,
      },
      1250,
      'easeInOutExpo'
    );
  });

  new WOW().init();
});
