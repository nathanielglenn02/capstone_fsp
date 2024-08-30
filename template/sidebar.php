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
            <!-- <li class="active"> -->
            <li>
                <a href="<?= $main_url ?>index.php">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="<?= $main_url ?>game/game.php">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Game</span>
                </a>
            </li>
            <li>
                <a href="<?= $main_url ?>team/team.php">
                    <i class='bx bxs-group'></i>
                    <span class="text">Team</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="#">
                    <i class='bx bxs-cog'></i>
                    <span class="text">Settings</span>
                </a>
            </li>
            <li>
                <a href="#" class="logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
            <li>
                <a href="#" class="login">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Login</span>
                </a>
            </li>
        </ul>
    </section>
    <!-- SIDEBAR -->