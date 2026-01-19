
  document.addEventListener('DOMContentLoaded', function () {
  const firstCard = document.querySelector('.card1');
  const otherCards = document.querySelectorAll('.card2, .card3, .card4');

  function updateFirstCard() {
    // Check if any other card is currently hovered
    const isAnyOtherHovered = Array.from(otherCards).some(card => card.matches(':hover'));
    
    if (isAnyOtherHovered) {
      firstCard.classList.remove('default-visible');
    } else {
      firstCard.classList.add('default-visible');
    }
  }

  // Attach listeners to other cards only
  otherCards.forEach(card => {
    card.addEventListener('mouseenter', updateFirstCard);
    card.addEventListener('mouseleave', updateFirstCard);
  });

  // Also update when leaving the container (optional but safe)
  const container = document.querySelector('.hero--sec3--div4');
  container?.addEventListener('mouseleave', () => {
    // Wait a tick to see if mouse is truly outside
    setTimeout(() => {
      if (!firstCard.matches(':hover') && !Array.from(otherCards).some(c => c.matches(':hover'))) {
        firstCard.classList.add('default-visible');
      }
    }, 50);
  });
});




const hiddenElements = document.querySelectorAll(
  '.hidden-left, .hidden-right, .hidden-up, .hidden-down, .hidden-fade, .hidden-zoom-in, .hidden-zoom-out'
);


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










