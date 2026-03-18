import './bootstrap';

// Import Swiper and FreeMode module
import Swiper from 'swiper';
import { FreeMode } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/free-mode';

// Initialize Swiper for category badges
document.addEventListener('DOMContentLoaded', function() {
  const categorySwiper = new Swiper('.category-swiper', {
    modules: [FreeMode],
    slidesPerView: 'auto',
    spaceBetween: 5,
    freeMode: {
      enabled: true,
      sticky: false,
      momentumRatio: 0.8,
      momentumVelocityRatio: 0.8,
      momentumBounceRatio: 0.5,
    },
    grabCursor: true,
    resistance: true,
    resistanceRatio: 0.85,
    preventClicks: false,
    preventClicksPropagation: false,
    touchRatio: 1.5,
    touchAngle: 45,
    breakpoints: {
      640: {
        spaceBetween: 5,
      },
      768: {
        spaceBetween: 5,
      },
      1024: {
        spaceBetween: 8,
      }
    }
  });
});