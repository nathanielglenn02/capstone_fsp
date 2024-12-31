<?php
require_once "../service/config.php";
?>
<!-- Sidebar -->
<div id="sidebar" class="sidebar">
    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
    <a href="#home">Home</a>
    <a href="#games">Games</a>
    <a href="#teams">Teams</a>
    <a href="#events">Events</a>
    <a href="#achievements">Achievements</a>
    <a href="<?= $main_url ?>auth/login.php">Login</a>
</div>

<!-- Tombol Hamburger -->
<div class="menu-btn" onclick="openNav()">&#9776;</div>