<?php
$title = "Navbar";
require_once('header.php');
?>
<!-- CONTENT -->
<section id="content">
    <!-- NAVBAR -->
    <nav>
        <i class='bx bx-menu'></i>

        <div style="flex-grow: 1;"></div>

        <a href="#" class="profile">
            <img src="img/people.png">
        </a>
    </nav>
    <!-- NAVBAR -->

    <script>
        const menuIcon = document.querySelector('.bx-menu');
        const sidebar = document.getElementById('sidebar');

        menuIcon.addEventListener('click', () => {
            sidebar.classList.toggle('hide');
        });
    </script>