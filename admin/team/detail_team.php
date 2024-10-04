<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classAchievement.php');
require_once('../../class/classTeamMembers.php');
require_once('../../class/classEventTeams.php');

$title = "Team Details - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$idteam = isset($_GET['idteam']) ? intval($_GET['idteam']) : null;

if ($idteam) {
    $achievements = Achievement::getAchievementsByTeam($koneksi, $idteam);

    $teamMembers = TeamMembers::getMembersByTeam($koneksi, $idteam);

    $teamEvents = EventTeams::getEventsByTeam($koneksi, $idteam);

    $_SESSION['return_url'] = $_SERVER['REQUEST_URI'];
} else {
    echo "ID team tidak ditemukan.";
    exit;
}
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Team Details</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="team.php">Team</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Team Details</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Konten Utama -->
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Team Members</h3>
                <i class='bx bx-filter'></i>
            </div>
            <ul class="todo-list">
                <?php
                if (!empty($teamEvents)) {
                    foreach ($teamMembers as $member) {
                        echo "<li class='teamMembers-completed'>";
                        echo "<p>" . htmlspecialchars($member->getMemberName()) . "</p>";
                        echo "</li>";
                    }
                } else {
                    echo "<p>No Team Members participated yet.</p>";
                }
                ?>
            </ul>
        </div>

        <?php
        $domain = $_SERVER['HTTP_HOST'];
        $path = $_SERVER['SCRIPT_NAME'];
        $queryString = $_SERVER['QUERY_STRING'];
        $url_asal = "http://" . $domain . $path . "?" . $queryString;
        ?>

        <div class="order">
            <div class="head">
                <h3>Events Participated</h3>
                <a href="../event/create_event_team.php?idteam=<?php echo $idteam; ?>"><i class='bx bx-plus'></i></a>
                <i class='bx bx-filter'></i>
            </div>
            <ul class="todo-list">
                <?php
                if (!empty($teamEvents)) {
                    foreach ($teamEvents as $event) {
                        echo "<li class='event-completed'>";  // Add the class here
                        echo "<p>" . htmlspecialchars($event->getEventName()) . " - " . htmlspecialchars($event->getDate()) . "</p>";
                        echo "<div class='action-buttons'>";
                        echo "<a href='../event/edit_event.php?idevent=" . $event->getEventId() . "&idteam=" . $idteam . "'><i class='fa-solid fa-pen' style='margin-right: 10px;'></i></a>";
                        echo "<a href='../event/delete_event_team.php?idevent=" . $event->getEventId() . "&idteam=" . $idteam . "' onclick=\"return confirm('Are you sure you want to delete this event from the team?');\"><i class='fa-solid fa-trash'></i></a>";
                        echo "</div>";
                        echo "</li>";
                    }
                } else {
                    echo "<p>No events participated yet.</p>";
                }
                ?>
            </ul>
        </div>

        <div class="todo">
            <div class="head">
                <h3>Achievements</h3>
                <a href="../achievement/create_achievement.php"><i class='bx bx-plus'></i></a>
                <i class='bx bx-filter'></i>
            </div>

            <ul class="todo-list">
                <?php
                if (!empty($achievements)) {
                    foreach ($achievements as $achievement) {
                        echo "<li class='completed'>";
                        echo "<div class='left'>";
                        echo "<p><strong>" . htmlspecialchars($achievement->getName()) . "</strong></p>";
                        echo "<small>Description: " . htmlspecialchars($achievement->getDescription()) . "</small>";
                        echo "</div>";
                        echo "<div class='right'>";
                        echo "<small>Date: " . htmlspecialchars($achievement->getDate()) . "</small>";
                        echo "</div>";
                        echo "<div class='action-buttons'>";
                        echo "<a href='edit_team_achievement.php?id=" . $achievement->getIdAchievement() . "&idteam=" . $idteam . "'><i class='fa-solid fa-pen' style='margin-right: 10px;'></i></a>";
                        echo "<a href='../achievement/delete_achievement.php?id=" . $achievement->getIdAchievement() . "&idteam=" . $idteam . "' onclick=\"return confirm('Are you sure you want to delete this achievement?');\"><i class='fa-solid fa-trash'></i></a>";
                        echo "</div>";
                        echo "</li>";
                    }
                } else {
                    echo "<p>No achievements added yet.</p>";
                }
                ?>
            </ul>
        </div>



    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>