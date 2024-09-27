import Swiper from 'swiper';
import { Navigation, Autoplay, Keyboard } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';
// const swiper = new Swiper('.swiper', { ... });

document.addEventListener('DOMContentLoaded', function () {
  // Swiper: Slider
  const swiper = new Swiper('.swiper', {
    modules: [Navigation, Autoplay, Keyboard],
    loop: false,
    keyboard: {
      enabled: true,
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    // onlyInViewport: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    slidesPerView: 1,
    spaceBetween: 15,
    breakpoints: {
      1440: {
        slidesPerView: 1,
        spaceBetween: 32,
      },
      768: {
        slidesPerView: 1,
        spaceBetween: 32,
      },
    },
    on: {
      init: function () {
        updateNavigationButtons(this);
      },
      slideChange: function () {
        updateNavigationButtons(this);
      },
    },
  });

  function updateNavigationButtons(swiper) {
    const prevButton = document.querySelector('.swiper-button-prev');
    const nextButton = document.querySelector('.swiper-button-next');

    if (swiper.isBeginning) {
      prevButton.disabled = true;
    } else {
      prevButton.disabled = false;
    }

    if (swiper.isEnd) {
      nextButton.disabled = true;
    } else {
      nextButton.disabled = false;
    }
  }
});
