$(document).ready(function () {
  $('#TESTIMONIALS').owlCarousel({
    loop: true,
    nav: false,
    items: 1,
    dots: true,
    animateOut: 'slideOutUp',
    animateIn: 'slideInUp',
  });

  $('#MAIN-SLIDER').owlCarousel({
    loop: true,
    nav: false,
    items: 1,
    dots: true,
  });
  $('#AD-SLIDER').owlCarousel({
    loop: true,
    nav: false,
    items: 1,
    dots: true,
    center: true,
  });


  $('.popup-video').magnificPopup({
    disableOn: 700,
    type: 'iframe',
    removalDelay: 160,
    preloader: false,

    fixedContentPos: false,
  });

  $('#SERVICE_SLIDER').owlCarousel({
    loop: true,
    nav: true,
    items: 1,
    dots: false,
    navText: [
      '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
      '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
    ],
  });

  $('#GALLERY').owlCarousel({
    loop: true,
    margin: 40,
    nav: true,
    navText: [
      '<i class="fa fa-long-arrow-left" aria-hidden="true"></i>',
      '<i class="fa fa-long-arrow-right" aria-hidden="true"></i>',
    ],
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 2,
      },
      1000: {
        items: 3,
      },
      1200: {
        items: 4,
      },
    },
  });

  $('body').on('click', '.menu-vertical__category', function () {
    $(this).toggleClass('menu-vertical__category--collapsed');
    $(this)
      .find('> div.menu-vertical__item')
      .toggleClass('menu-vertical__item--active');
  });

  $('body').on('click', 'a.menu-vertical__item', function (e) {
    $(this).siblings('a').removeClass('menu-vertical__item--active');
    $(this).addClass('menu-vertical__item--active');

    e.stopPropagation();
  });

  $('body').on('click', '.menu-vertical__toggle', function (e) {
    $('.menu-vertical').toggleClass('menu-vertical--closed');
  });

  $('body').on('click', '.language-select', function () {
    $(this).find('.dropdown').toggleClass('dropdown--open');
  });
});

var inputs = document.querySelectorAll('.inputfile');
Array.prototype.forEach.call(inputs, function (input) {
  var label = input.nextElementSibling,
    labelVal = label.innerHTML;

  input.addEventListener('change', function (e) {
    var fileName = '';
    if (this.files && this.files.length > 1) {
      fileName = (this.getAttribute('data-multiple-caption') || '').replace(
        '{count}',
        this.files.length
      );
    } else {
      fileName = e.target.value.split('\\').pop();
    }

    if (fileName) {
      label.innerHTML = fileName;
    } else {
      label.innerHTML = labelVal;
    }
  });
});
