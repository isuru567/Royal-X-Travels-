 const swiper = new Swiper('.swiper', {
      loop: true,
      spaceBetween: 20,
      grabCursor: true,
      autoHeight: false,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
        dynamicBullets: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        1024: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
      },
    });




const hiddenElements = document.querySelectorAll(`
  .hidden-left, .hidden-right, .hidden-up, .hidden-down,
  .hidden-fade, .hidden-zoom-in, .hidden-zoom-out
`);

const observer = new IntersectionObserver(entries => {
  entries.forEach(entry => {
    if (entry.isIntersecting) {
      const el = entry.target;

      if (el.classList.contains('hidden-left')) el.classList.add('show-left');
      if (el.classList.contains('hidden-right')) el.classList.add('show-right');
      if (el.classList.contains('hidden-up')) el.classList.add('show-up');
      if (el.classList.contains('hidden-down')) el.classList.add('show-down');
      if (el.classList.contains('hidden-fade')) el.classList.add('show-fade');
      if (el.classList.contains('hidden-zoom-in')) el.classList.add('show-zoom-in');
      if (el.classList.contains('hidden-zoom-out')) el.classList.add('show-zoom-out');

      observer.unobserve(el); // animate once
    }
  });
}, { threshold: 0.2 });

hiddenElements.forEach(el => observer.observe(el));
