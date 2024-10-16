<?php
$title = "Sidebar";
require_once('header.php');
?>

<body>
    <!-- SIDEBAR -->
    <section id="sidebar">
        <a href="#" class="brand">
            <i class='bx bxs-smile'></i>
            <span class="text">Informatic E-Sport</span>
        </a>
        <ul class="side-menu top">
            <li>
                <a href="<?= $main_url ?>nologin/index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="<?= $main_url ?>nologin/game/game.php">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Game</span>
                </a>
            </li>
            <li>
                <a href="<?= $main_url ?>nologin/team/team.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Team</span>
                </a>
            </li>
            <li>
                <a href="<?= $main_url ?>nologin/event/event.php">
                    <i class='bx bx-calendar-event'></i>
                    <span class="text">Event</span>
                </a>
            </li>
            <li>
                <a href="<?= $main_url ?>nologin/achievement/achievement.php">
                    <i class='bx bx-trophy'></i>
                    <span class="text">Achievement</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="<?= $main_url ?>auth/login.php" class="login">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Login</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->