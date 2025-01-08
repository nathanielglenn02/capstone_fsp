<section id="home" class="hero">
    <div class="hero-background">
        <div class="slider">
            <div class="slide" style="background-image: url('../asset/image/images1.jpg');"></div>
            <div class="slide" style="background-image: url('../asset/image/images2.jpg');"></div>
            <div class="slide" style="background-image: url('../asset/image/images3.jpg');"></div>
        </div>
        <div class="indicators"></div>
    </div>
    <div class="hero-content">
        <h1>Welcome to Informatics E-Sport</h1>
        <p>Discover teams, games, events, and achievements in the world of e-sports.</p>
        <a href="#games" class="btn-main">Explore Now</a>
    </div>
</section>

<script>
    const imageUrls = [
        '../asset/image/images1.jpg',
        '../asset/image/images2.jpg',
        '../asset/image/images3.jpg'
    ];

    imageUrls.forEach((url) => {
        const img = new Image();
        img.src = url;
    });

    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slide');
        const totalSlides = slides.length;
        const indicatorsContainer = document.querySelector('.indicators');
        let index = 0;
        let startX = 0;
        let endX = 0;
        let isDragging = false;

        function updateSliderPosition() {
            slider.style.transform = `translateX(-${index * 100}%)`;
            updateIndicators();
        }

        function createIndicators() {
            for (let i = 0; i < totalSlides; i++) {
                const indicator = document.createElement('div');
                indicator.classList.add('indicator');
                if (i === 0) indicator.classList.add('active');
                indicatorsContainer.appendChild(indicator);
            }
        }

        function updateIndicators() {
            const indicators = document.querySelectorAll('.indicator');
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('active', i === index);
            });
        }

        slider.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });

        slider.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            if (endX - startX > 50) {
                index = index > 0 ? index - 1 : totalSlides - 1;
            } else if (startX - endX > 50) {
                index = (index + 1) % totalSlides;
            }
            updateSliderPosition();
        });

        slider.addEventListener('mousedown', (e) => {
            startX = e.clientX;
            isDragging = true;
        });

        slider.addEventListener('mousemove', (e) => {
            if (!isDragging) return;
            endX = e.clientX;
        });

        slider.addEventListener('mouseup', () => {
            if (!isDragging) return;
            isDragging = false;
            if (endX - startX > 50) {
                index = index > 0 ? index - 1 : totalSlides - 1;
            } else if (startX - endX > 50) {
                index = (index + 1) % totalSlides;
            }
            updateSliderPosition();
        });

        slider.addEventListener('mouseleave', () => {
            if (isDragging) isDragging = false;
        });

        setInterval(() => {
            index = (index + 1) % totalSlides;
            updateSliderPosition();
        }, 5000);

        createIndicators();
    });
</script>