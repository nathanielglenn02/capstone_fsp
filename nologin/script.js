function openNav() {
    document.getElementById("sidebar").style.width = "250px";
}

function closeNav() {
    document.getElementById("sidebar").style.width = "0";
}

function createCarousel(id, prevBtnId, nextBtnId) {
    const slider = document.getElementById(id);
    const prevBtn = document.getElementById(prevBtnId);
    const nextBtn = document.getElementById(nextBtnId);

    let scrollAmount = 0;

    function scrollRight() {
        if (scrollAmount < slider.scrollWidth - slider.clientWidth) {
            scrollAmount += 300;
            slider.scrollTo({ left: scrollAmount, behavior: 'smooth' });
        } else {
            scrollAmount = 0;
            slider.scrollTo({ left: scrollAmount, behavior: 'smooth' });
        }
    }

    function scrollLeft() {
        if (scrollAmount > 0) {
            scrollAmount -= 300;
            slider.scrollTo({ left: scrollAmount, behavior: 'smooth' });
        } else {
            scrollAmount = slider.scrollWidth - slider.clientWidth;
            slider.scrollTo({ left: scrollAmount, behavior: 'smooth' });
        }
    }
    nextBtn.addEventListener('click', scrollRight);
    prevBtn.addEventListener('click', scrollLeft);
}

document.addEventListener("DOMContentLoaded", () => {
    createCarousel('games-slider', 'games-prev', 'games-next');
    createCarousel('teams-slider', 'teams-prev', 'teams-next');
    createCarousel('events-slider', 'events-prev', 'events-next');
    createCarousel('achievements-slider', 'achievements-prev', 'achievements-next');
});
