<section id="home" class="hero">
    <div class="hero-background">
        <!-- Slider Container -->
        <div class="slider">
            <div class="slide" style="background-image: url('../asset/image/images1.jpg');"></div>
            <div class="slide" style="background-image: url('../asset/image/images2.jpg');"></div>
            <div class="slide" style="background-image: url('../asset/image/images3.jpg');"></div>
        </div>
        <!-- Indicators -->
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
        img.src = url; // Preload gambar ke dalam cache browser
    });

    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.querySelector('.slider'); // Elemen slider
        const slides = document.querySelectorAll('.slide'); // Semua slide
        const totalSlides = slides.length; // Jumlah total slide
        const indicatorsContainer = document.querySelector('.indicators'); // Container indikator
        let index = 0; // Indeks awal
        let startX = 0; // Posisi awal sentuhan atau klik mouse
        let endX = 0; // Posisi akhir sentuhan atau lepas mouse
        let isDragging = false; // Status apakah sedang drag

        // Fungsi untuk memperbarui posisi slider
        function updateSliderPosition() {
            slider.style.transform = `translateX(-${index * 100}%)`; // Pindah posisi
            updateIndicators(); // Perbarui indikator
        }

        // Fungsi untuk membuat indikator
        function createIndicators() {
            for (let i = 0; i < totalSlides; i++) {
                const indicator = document.createElement('div');
                indicator.classList.add('indicator');
                if (i === 0) indicator.classList.add('active'); // Aktifkan indikator pertama
                indicatorsContainer.appendChild(indicator);
            }
        }

        // Fungsi untuk memperbarui indikator
        function updateIndicators() {
            const indicators = document.querySelectorAll('.indicator');
            indicators.forEach((indicator, i) => {
                indicator.classList.toggle('active', i === index);
            });
        }

        // Swipe handling untuk touch devices
        slider.addEventListener('touchstart', (e) => {
            startX = e.touches[0].clientX;
        });

        slider.addEventListener('touchend', (e) => {
            endX = e.changedTouches[0].clientX;
            if (endX - startX > 50) {
                // Geser ke kanan
                index = index > 0 ? index - 1 : totalSlides - 1;
            } else if (startX - endX > 50) {
                // Geser ke kiri
                index = (index + 1) % totalSlides;
            }
            updateSliderPosition();
        });

        // Mouse drag handling untuk desktop
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
                // Geser ke kanan
                index = index > 0 ? index - 1 : totalSlides - 1;
            } else if (startX - endX > 50) {
                // Geser ke kiri
                index = (index + 1) % totalSlides;
            }
            updateSliderPosition();
        });

        slider.addEventListener('mouseleave', () => {
            if (isDragging) isDragging = false; // Hentikan drag jika mouse keluar area slider
        });

        // Jalankan slider secara otomatis
        setInterval(() => {
            index = (index + 1) % totalSlides; // Reset ke awal setelah slide terakhir
            updateSliderPosition(); // Panggil fungsi untuk update posisi
        }, 5000); // Interval 5 detik

        createIndicators(); // Buat indikator saat halaman dimuat
    });
</script>