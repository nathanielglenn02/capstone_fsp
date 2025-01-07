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
                <a href="../index.php" title="Dashboard">
                    <i class='bx bxs-dashboard'></i>
                    <span class="text">Home</span>
                </a>
            </li>
            <li>
                <a href="game.php" title="Game">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="text">Game</span>
                </a>
            </li>
            <li>
                <a href="../team/team.php" title="Team">
                    <i class='bx bxs-group'></i>
                    <span class="text">Team</span>
                </a>
            </li>
            <li>
                <a href="../event/event.php" title="Event">
                    <i class='bx bx-calendar-event'></i>
                    <span class="text">Event</span>
                </a>
            </li>
            <li>
                <a href="../achievement/achievement.php" title="Achievement">
                    <i class='bx bx-trophy'></i>
                    <span class="text">Achievement</span>
                </a>
            </li>
            <li>
                <a href="../team/join_status.php" title="Join Status">
                    <i class='bx bxs-edit-alt'></i>
                    <span class="text">Status Proposal</span>
                </a>
            </li>
            <li>
                <a href="../team/approved_teams.php" title="Approved Teams">
                    <i class='bx bxs-user-detail'></i>
                    <span class="text">My Teams</span>
                </a>
            </li>
        </ul>
        <ul class="side-menu">
            <li>
                <a href="../../auth/logout.php" class="logout" title="Logout">
                    <i class='bx bxs-log-out-circle'></i>
                    <span class="text">Logout</span>
                </a>
            </li>
        </ul>
    </section>
</body>