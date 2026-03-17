import './bootstrap';
import { FreeMode } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/free-mode';

// Make Swiper available globally so Alpine can see it
window.Swiper = Swiper;
window.SwiperModules = { FreeMode };