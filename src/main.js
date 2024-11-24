import * as aboutme from './js/about-me.js';

import AOS from 'aos';
import 'aos/dist/aos.css';

// AOS.init({
//   duration: 4000,
//   easing: 'ease-out-quart',
// });
AOS.init({
  duration: 1500, // Adjusts animation speed
  easing: 'ease-out-quart', // Easing style
  once: false, // Ensures animation only happens once
  anchorPlacement: 'top-bottom', // Start animation when element is in view
});
flatpickr('#date', {
  dateFormat: 'Y-m-d',
  minDate: 'today',
  maxDate: '2099-12-31', // Ограничение на максимальную дату
  defaultDate: 'today', // Установить текущую дату по умолчанию
  disable: ['2024-11-25', '2024-11-30'], // Запретить выбор определенных дат
  locale: 'pl', // Локализация (польский язык)
});
