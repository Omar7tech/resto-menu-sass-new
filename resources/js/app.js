import './bootstrap';

// Import Swiper and FreeMode module
import Swiper from 'swiper';
import { FreeMode } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/free-mode';

// Import AOS
import AOS from 'aos';

// Import Lenis for smooth scrolling
import Lenis from 'lenis';
import 'lenis/dist/lenis.css';



// Initialize Swiper for category badges
document.addEventListener('livewire:navigated', function() {
  // Initialize AOS
  AOS.init({
    once: true
  });
  
  // Initialize Lenis for smooth scrolling
  const lenis = new Lenis({
    autoRaf: true,
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    wheelMultiplier: 1.5,
    touchMultiplier: 1,
  });
  
  // Custom anchor scroll handling
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
      e.preventDefault();
      const targetId = this.getAttribute('href');
      const targetElement = document.querySelector(targetId);
      
      if (targetElement) {
        const navbarHeight = 64;
        const categoryBarHeight = 80;
        const offset = navbarHeight + categoryBarHeight + 20;
        
        const elementPosition = targetElement.getBoundingClientRect().top;
        const offsetPosition = elementPosition + window.pageYOffset - offset;
        
        lenis.scrollTo(offsetPosition);
      }
    });
  });
  
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

