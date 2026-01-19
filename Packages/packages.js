function toggleSeeMore() {
  const moreCards = document.getElementById('moreCards');
  const btn = document.getElementById('seeMoreBtn');

  if (moreCards.classList.contains('active')) {
    moreCards.classList.remove('active');
    btn.textContent = 'See More';
  } else {
    moreCards.classList.add('active');
    btn.textContent = 'See Less';
  }
}





document.addEventListener('DOMContentLoaded', function () {
  // Target all cards in section-2 (both visible and hidden ones)
  const allCards = document.querySelectorAll('.section-2 .first-row-img');
  const firstCard = document.querySelector('.section-2 .first-row-img.default-visible');

  if (!firstCard) return; // Safety check

  let isHoveringAnyCard = false;

  function updateFirstCardVisibility() {
    if (isHoveringAnyCard) {
      firstCard.classList.remove('default-visible');
    } else {
      firstCard.classList.add('default-visible');
    }
  }

  // Attach hover listeners to all cards
  allCards.forEach(card => {
    card.addEventListener('mouseenter', () => {
      isHoveringAnyCard = true;
      updateFirstCardVisibility();
    });

    card.addEventListener('mouseleave', () => {
      // Small delay to prevent flicker when moving between cards
      setTimeout(() => {
        // Check if mouse is still over any card in this section
        const anyHovered = Array.from(allCards).some(c => c.matches(':hover'));
        isHoveringAnyCard = anyHovered;
        updateFirstCardVisibility();
      }, 50);
    });
  });

  // Also handle when user leaves the entire card container
  const cardContainer = document.querySelector('.package--sec2--div2');
  if (cardContainer) {
    cardContainer.addEventListener('mouseleave', () => {
      isHoveringAnyCard = false;
      updateFirstCardVisibility();
    });
  }
});



$(document).ready(function () {
  var owl = $(".package--sec4--div5").owlCarousel({
    loop: true,
    margin: 20,
    nav: false, // Disable default navigation
    dots: false,
    autoplay: true,
    autoplayTimeout: 3000,
    autoplayHoverPause: true,
    responsive: {
      0: { items: 1 },
      540: { items: 2 },
      951: { items: 3 },
      1200: { items: 4 }
    }
  });

  // Connect custom navigation buttons
  $('.custom-prev').click(function() {
    owl.trigger('prev.owl.carousel');
  });

  $('.custom-next').click(function() {
    owl.trigger('next.owl.carousel');
  });
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
