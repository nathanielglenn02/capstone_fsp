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

    $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
    $limit = 5;
    $teamEvents = EventTeams::getPaginatedEventsByTeam($koneksi, $idteam, $page, $limit);
    $totalEvents = EventTeams::getTotalEventsByTeam($koneksi, $idteam);
    $totalPages = ceil($totalEvents / $limit);

    $pageAchievements = isset($_GET['pageAchievements']) ? (int)$_GET['pageAchievements'] : 1;
    $achievements = Achievement::getPaginatedAchievementsByTeam($koneksi, $idteam, $pageAchievements, $limit);
    $totalAchievements = Achievement::getTotalAchievementsByTeam($koneksi, $idteam);
    $totalPagesAchievements = ceil($totalAchievements / $limit);

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
                        echo "<li class='event-completed'>";
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

            <div class="pagination" style="text-align: right;">
                <?php if ($page > 1): ?>
                    <a href="?idteam=<?= $idteam ?>&page=<?= $page - 1 ?>">
                        << </a>
                        <?php else: ?>
                            <a href="#" class="disabled">
                                << </a>
                                <?php endif; ?>

                                <?php
                                $start_page = max(1, $page - 1);
                                $end_page = min($totalPages, $start_page + 2);

                                for ($hal = $start_page; $hal <= $end_page; $hal++): ?>
                                    <?php if ($hal == $page): ?>
                                        <b><?= $hal ?></b>
                                    <?php else: ?>
                                        <a href="?idteam=<?= $idteam ?>&page=<?= $hal ?>"><?= $hal ?></a>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($page < $totalPages): ?>
                                    <a href="?idteam=<?= $idteam ?>&page=<?= $page + 1 ?>">>></a>
                                <?php else: ?>
                                    <a href="#" class="disabled">>></a>
                                <?php endif; ?>
            </div>
        </div>


        <div class="todo">
            <div class="head">
                <h3>Achievements</h3>
                <a href="../achievement/create_achievement.php?idteam=<?php echo "$idteam" ?>"><i
                        class='bx bx-plus'></i></a>
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
                        echo "<a href='../achievement/edit_achievement.php?id=" . $achievement->getIdAchievement() . "&idteam=" . $idteam . "'><i class='fa-solid fa-pen' style='margin-right: 10px;'></i></a>";
                        echo "<a href='../achievement/delete_achievement.php?id=" . $achievement->getIdAchievement() . "&idteam=" . $idteam . "' onclick=\"return confirm('Are you sure you want to delete this achievement?');\"><i class='fa-solid fa-trash'></i></a>";
                        echo "</div>";
                        echo "</li>";
                    }
                } else {
                    echo "<p>No achievements added yet.</p>";
                }
                ?>
            </ul>

            <div class="pagination" style="text-align: right;">
                <?php if ($pageAchievements > 1): ?>
                    <a href="?idteam=<?= $idteam ?>&pageAchievements=<?= $pageAchievements - 1 ?>">
                        << </a>
                        <?php else: ?>
                            <a href="#" class="disabled">
                                << </a>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $totalPagesAchievements; $i++): ?>
                                    <?php if ($i == $pageAchievements): ?>
                                        <b><?= $i ?></b>
                                    <?php else: ?>
                                        <a href="?idteam=<?= $idteam ?>&pageAchievements=<?= $i ?>"><?= $i ?></a>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($pageAchievements < $totalPagesAchievements): ?>
                                    <a href="?idteam=<?= $idteam ?>&pageAchievements=<?= $pageAchievements + 1 ?>">>></a>
                                <?php else: ?>
                                    <a href="#" class="disabled">>></a>
                                <?php endif; ?>
            </div>

        </div>



    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>