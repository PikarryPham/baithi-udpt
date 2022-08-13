var swiper = new Swiper(".bg-slider-thumbs", {
    freeMode: true,
    watchSlidesProgress: true,
  });

  var swiper2 = new Swiper(".mySwiper", {
    // autoplay: {
    //   delay: 3000,
    //   disableOnInteraction: false,
    // },
    loop: true,
    spaceBetween: 10,
    thumbs: {
      swiper: swiper,
    },
  });