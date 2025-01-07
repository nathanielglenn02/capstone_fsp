<?php
require_once "../service/config.php";
?>
<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn">&times;</a>
    <a href="#home" class="sidebar-link">Home</a>
    <a href="#games" class="sidebar-link">Games</a>
    <a href="#teams" class="sidebar-link">Teams</a>
    <a href="#events" class="sidebar-link">Events</a>
    <a href="#achievements" class="sidebar-link">Achievements</a>
    <a href="../auth/login.php" class="sidebar-link">Login</a>
</div>

<!-- Tombol Hamburger -->
<div class="menu-btn">&#9776;</div>

<!-- Tambahkan JavaScript di bawah -->
<script>
    // Ambil elemen sidebar, tombol hamburger, dan link di sidebar
    const menuBtn = document.querySelector('.menu-btn');
    const sidebar = document.querySelector('#sidebar');
    const closeBtn = sidebar.querySelector('.closebtn');
    const sidebarLinks = document.querySelectorAll('.sidebar-link');

    // Fungsi untuk menutup sidebar
    const closeSidebar = () => {
        sidebar.classList.remove('open'); // Hapus class 'open'
    };

    // Toggle sidebar ketika tombol hamburger diklik
    menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('open'); // Tambah atau hapus class 'open'
    });

    // Tutup sidebar jika tombol close (x) diklik
    closeBtn.addEventListener('click', closeSidebar);

    // Tutup sidebar ketika salah satu link di sidebar diklik
    sidebarLinks.forEach(link => {
        link.addEventListener('click', closeSidebar);
    });

    // Tutup sidebar jika pengguna mengklik di luar sidebar
    document.addEventListener('click', (event) => {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnMenuBtn = menuBtn.contains(event.target);

        // Jika klik di luar sidebar dan bukan tombol hamburger, tutup sidebar
        if (!isClickInsideSidebar && !isClickOnMenuBtn) {
            closeSidebar();
        }
    });
</script>