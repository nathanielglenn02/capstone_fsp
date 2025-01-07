<section id="home" class="hero">
    <div class="hero-background">
        <!-- Slider Container -->
        <div class="slider">
            <img src="../asset/image/images1.jpg" alt="Hero Image 1">
            <img src="../asset/image/images2.jpg" alt="Hero Image 2">
            <img src="../asset/image/images3.jpg" alt="Hero Image 3">
        </div>
    </div>
    <div class="hero-content">
        <h1>Welcome to Informatics E-Sport</h1>
        <p>Discover teams, games, events, and achievements in the world of e-sports.</p>
        <a href="#games" class="btn-main">Explore Now</a>
    </div>

</section>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const slider = document.querySelector('.slider');
        const slides = document.querySelectorAll('.slider img');
        const totalSlides = slides.length;
        let index = 0;

        // Fungsi untuk mengupdate posisi slider
        function updateSliderPosition() {
            slider.style.transform = `translateX(-${index * 100}%)`;
            slider.style.transition = 'transform 0.5s ease-in-out'; // Animasi saat transisi
        }

        // Mulai slider dengan jeda awal
        setTimeout(() => {
            setInterval(() => {
                index = (index + 1) % totalSlides; // Loop kembali ke awal setelah slide terakhir
                updateSliderPosition();
            }, 5000); // 5 detik
        }, 5000); // Jeda awal sebelum transisi pertama (5 detik)
    });
</script>