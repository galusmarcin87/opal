function draw(video, canvas, img) {
  var context = canvas.getContext('2d');
  context.drawImage(video, 0, 0, canvas.width, canvas.height);

  var dataURL = canvas.toDataURL();
  img.setAttribute('poster', dataURL);
}
function getFileData(input, imgPreview, append, htmlType = 'img') {
  const files = input.files[0];
  if (files) {
    const fileReader = new FileReader();
    fileReader.readAsDataURL(files);
    fileReader.addEventListener('load', function () {
      imgPreview.style.display = 'inline-flex';

      if (append) {
        imgPreview.style.width = 'auto';
        imgPreview.style.background = 'transparent';

        const img = document.createElement(htmlType);
        img.src = this.result;
        img.className = 'image';
        imgPreview.appendChild(img);

        if (htmlType === 'video') {
        }
      } else {
        imgPreview.innerHTML =
          '<img class="image" src="' + this.result + '" />';
      }
    });
  }
}

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

  $('body').on('click', '#ACCORDION .accordion__header', function () {
    $(this).toggleClass('accordion__header--active');
  });

  const MINIATURE = document.getElementById('MINIATURE');
  const MINIATURE_PREVIEW = document.getElementById('MINIATURE-PREVIEW');

  MINIATURE.addEventListener('change', function () {
    getFileData(MINIATURE, MINIATURE_PREVIEW);
  });

  const BG_IMAGE = document.getElementById('BG-IMAGE');
  const BG_IMAGE_PREVIEW = document.getElementById('BG-IMAGE-PREVIEW');

  BG_IMAGE.addEventListener('change', function () {
    getFileData(BG_IMAGE, BG_IMAGE_PREVIEW);
  });

  const BALLERY_IMAGE = document.getElementById('GALLERY-IMAGE');
  const BALLERY_IMAGE_PREVIEW = document.getElementById(
    'GALLERY-IMAGE-PREVIEW'
  );

  BALLERY_IMAGE.addEventListener('change', function () {
    getFileData(BALLERY_IMAGE, BALLERY_IMAGE_PREVIEW, true);
  });

  const VIDEO = document.getElementById('VIDEO');
  const VIDEO_PREVIEW = document.getElementById('VIDEO-PREVIEW');

  VIDEO.addEventListener('change', function () {
    getFileData(VIDEO, VIDEO_PREVIEW, true, 'video');
  });
});

var inputs = document.querySelectorAll('.inputfile');
Array.prototype.forEach.call(inputs, function (input) {
  let label = input.nextElementSibling;
  let labelVal = label?.innerHTML;

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

    if (!label) {
      return;
    }

    if (fileName) {
      label.innerHTML = fileName;
    } else {
      label.innerHTML = labelVal;
    }
  });
});
