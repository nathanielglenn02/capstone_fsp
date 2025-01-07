<?php
require_once "../service/config.php";
?>
<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn">&times;</a>
    <a href="#home">Home</a>
    <a href="#games">Games</a>
    <a href="#teams">Teams</a>
    <a href="#events">Events</a>
    <a href="#achievements">Achievements</a>
    <a href="<?= $main_url ?>auth/login.php">Login</a>
</div>

<!-- Tombol Hamburger -->
<div class="menu-btn">&#9776;</div>

<!-- Tambahkan JavaScript di bawah -->
<script>
    // Ambil elemen sidebar dan tombol hamburger
    const menuBtn = document.querySelector('.menu-btn');
    const sidebar = document.querySelector('#sidebar');

    // Toggle sidebar ketika tombol hamburger diklik
    menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('open'); // Tambah atau hapus class 'open'
    });

    // Tutup sidebar jika tombol close (x) diklik
    const closeBtn = sidebar.querySelector('.closebtn');
    closeBtn.addEventListener('click', () => {
        sidebar.classList.remove('open'); // Hilangkan class 'open'
    });

    // Tutup sidebar jika pengguna mengklik di luar sidebar
    document.addEventListener('click', (event) => {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnMenuBtn = menuBtn.contains(event.target);

        // Jika klik di luar sidebar dan bukan tombol hamburger, tutup sidebar
        if (!isClickInsideSidebar && !isClickOnMenuBtn) {
            sidebar.classList.remove('open');
        }
    });
</script>