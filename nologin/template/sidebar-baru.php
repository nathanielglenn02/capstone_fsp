<?php
require_once "../service/config.php";
?>

<div id="sidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn">&times;</a>
    <a href="#home" class="sidebar-link">Home</a>
    <a href="#games" class="sidebar-link">Games</a>
    <a href="#teams" class="sidebar-link">Teams</a>
    <a href="#events" class="sidebar-link">Events</a>
    <a href="#achievements" class="sidebar-link">Achievements</a>
    <a href="../auth/login.php" class="sidebar-link">Login</a>
</div>

<div class="menu-btn">&#9776;</div>

<script>
    const menuBtn = document.querySelector('.menu-btn');
    const sidebar = document.querySelector('#sidebar');
    const closeBtn = sidebar.querySelector('.closebtn');
    const sidebarLinks = document.querySelectorAll('.sidebar-link');

    const closeSidebar = () => {
        sidebar.classList.remove('open');
    };

    menuBtn.addEventListener('click', () => {
        sidebar.classList.toggle('open');
    });

    closeBtn.addEventListener('click', closeSidebar);

    sidebarLinks.forEach(link => {
        link.addEventListener('click', closeSidebar);
    });

    document.addEventListener('click', (event) => {
        const isClickInsideSidebar = sidebar.contains(event.target);
        const isClickOnMenuBtn = menuBtn.contains(event.target);

        if (!isClickInsideSidebar && !isClickOnMenuBtn) {
            closeSidebar();
        }
    });
</script>