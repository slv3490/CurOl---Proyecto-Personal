import Swiper from 'swiper';
import { Navigation } from 'swiper/modules';
import 'swiper/css';
import 'swiper/css/navigation';

if (document.querySelector(".swiper")) {
    const swiper = new Swiper(".mySwiper", {
        modules: [Navigation],
        slidesPerView: getSlidesPerView(),
        spaceBetween: 30,
        freeMode: true,
        navigation: {
            nextEl: ".swiper-button-next",
            prevEl: ".swiper-button-prev",
        },
    });

    function getSlidesPerView() {
        const phone = 480;
        const tablet = 768;
        const desktop = 1024;
        const width = window.innerWidth;

        if (width <= phone) {
            return 1;
        } 
        if (width > phone && width <= tablet) {
            return 2;
        } 
        if (width > tablet && width <= desktop) {
            return 3;
        }
        return 4;
    };

    window.addEventListener("resize", () => {
        swiper.params.slidesPerView = getSlidesPerView();
        swiper.update();
    });
}