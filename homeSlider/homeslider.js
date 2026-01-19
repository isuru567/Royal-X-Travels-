let nextDom = document.getElementById('next');
let prevDom = document.getElementById('prev');
let carouselDom = document.querySelector('.carousel');
let sliderDom = carouselDom.querySelector('.list');
let thumbnailBorderDom = carouselDom.querySelector('.thumbnail');
let timeDom = document.querySelector('.carousel .time');

let timeAutoNext = 7000;
let runNextAuto;

function startAutoSlide() {
    clearTimeout(runNextAuto);
    runNextAuto = setTimeout(() => {
        nextDom.click();
    }, timeAutoNext);
}

function showSlider(type) {
    let sliderItems = sliderDom.querySelectorAll('.item');
    let thumbnailItems = thumbnailBorderDom.querySelectorAll('.item');

    if (type === 'next') {
        sliderDom.appendChild(sliderItems[0]);
        thumbnailBorderDom.appendChild(thumbnailItems[0]);
    } else {
        sliderDom.prepend(sliderItems[sliderItems.length - 1]);
        thumbnailBorderDom.prepend(thumbnailItems[thumbnailItems.length - 1]);
    }

    updateUI();
    startAutoSlide();
}

function updateUI() {
    let sliderItems = sliderDom.querySelectorAll('.item');
    let thumbnailItems = thumbnailBorderDom.querySelectorAll('.item');

    // Remove all active classes
    sliderItems.forEach(item => item.classList.remove('active'));
    thumbnailItems.forEach(item => item.classList.remove('active'));

    // Add active class to the first item (currently showing one)
    if (sliderItems.length > 0) {
        sliderItems[0].classList.add('active');
    }
    if (thumbnailItems.length > 0) {
        thumbnailItems[0].classList.add('active');
    }

    // Reset progress bar
    timeDom.classList.remove('running');
    void timeDom.offsetWidth; 
    timeDom.classList.add('running');
}

nextDom.onclick = () => showSlider('next');
prevDom.onclick = () => showSlider('prev');

// --- Updated Thumbnail Click Handling ---
if (thumbnailBorderDom) {
    thumbnailBorderDom.addEventListener('click', (e) => {
        // Click කරපු thumbnail item එක හොයාගන්න
        let clickedThumb = e.target.closest('.item');
        if (!clickedThumb) return;

        let targetIdx = clickedThumb.getAttribute('data-index');
        let currentActiveIdx = sliderDom.querySelector('.item.active').getAttribute('data-index');

        console.log("Clicked Index:", targetIdx);
        console.log("Current Index:", currentActiveIdx);

        if (targetIdx === currentActiveIdx) return;

        // Click කරපු index එක පළවෙනි තැනට එනකන් items ටික rotate කරන්න
        while (sliderDom.querySelector('.item').getAttribute('data-index') !== targetIdx) {
            let sItems = sliderDom.querySelectorAll('.item');
            let tItems = thumbnailBorderDom.querySelectorAll('.item');
            
            sliderDom.appendChild(sItems[0]);
            thumbnailBorderDom.appendChild(tItems[0]);
        }

        updateUI();
        startAutoSlide();
    });
}

// Initialize
updateUI();
startAutoSlide();