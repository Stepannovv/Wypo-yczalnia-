import * as aboutme from './js/about-me.js';

import AOS from 'aos';
import 'aos/dist/aos.css';

// AOS.init({
//   duration: 4000,
//   easing: 'ease-out-quart',
// });
AOS.init({
  duration: 1000, // Adjusts animation speed
  easing: 'ease-out-quart', // Easing style
  once: false, // Ensures animation only happens once
  anchorPlacement: 'top-bottom', // Start animation when element is in view
});
