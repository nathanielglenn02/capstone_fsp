<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classJoinProposal.php');
require_once('../../class/classTeam.php');
require_once('../../class/classAchievement.php');
require_once('../../class/classEventTeams.php');
require_once('../../class/classTeamMembers.php');

$idmember = $_SESSION['idmember'];

$approvedTeams = JoinProposal::getApprovedTeamsByMember($koneksi, $idmember);

$title = "My Approved Teams - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>My Approved Teams</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">My Approved Teams</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Teams You're a Member Of</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Members</th>
                        <th>Achievements</th>
                        <th>Events</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (!empty($approvedTeams)) {
                        foreach ($approvedTeams as $team) {
                            $teamMembers = TeamMembers::getMembersByTeam($koneksi, $team['idteam']);
                            $achievements = Achievement::getAchievementsByTeam($koneksi, $team['idteam']);
                            $events = EventTeams::getEventsByTeam($koneksi, $team['idteam']);

                            echo "<tr>";
                            echo "<td>" . htmlspecialchars($team['name']) . "</td>";

                            echo "<td>";
                            if (!empty($teamMembers)) {
                                echo "<ul>";
                                foreach ($teamMembers as $member) {
                                    echo "<li>" . htmlspecialchars($member->getMemberName()) . "</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "No members found.";
                            }
                            echo "</td>";

                            echo "<td>";
                            if (!empty($achievements)) {
                                echo "<ul>";
                                foreach ($achievements as $achievement) {
                                    echo "<li>" . htmlspecialchars($achievement->getName()) . "</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "No achievements.";
                            }
                            echo "</td>";

                            echo "<td>";
                            if (!empty($events)) {
                                echo "<ul>";
                                foreach ($events as $event) {
                                    echo "<li>" . htmlspecialchars($event->getEventName()) . " - " . htmlspecialchars($event->getDate()) . "</li>";
                                }
                                echo "</ul>";
                            } else {
                                echo "No events.";
                            }
                            echo "</td>";

                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4'>You are not part of any approved teams yet.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="pagination">
                <?php if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>">
                        << Previous</a>
                        <?php else: ?>
                            <span class="disabled">
                                << Previous</span>
                                <?php endif; ?>

                                <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                                    <?php if ($i == $page): ?>
                                        <span class="current"><?= $i ?></span>
                                    <?php else: ?>
                                        <a href="?page=<?= $i ?>"><?= $i ?></a>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($page < $total_pages): ?>
                                    <a href="?page=<?= $page + 1 ?>">Next >></a>
                                <?php else: ?>
                                    <span class="disabled">Next >></span>
                                <?php endif; ?>
            </div>
        </div>
    </div>
</main>

<?php
require_once('../template/footer.php');
?>