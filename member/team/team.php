<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classTeam.php');
require_once('../../class/classJoinProposal.php');

$title = "Team - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;

$search = isset($_GET['search']) ? $_GET['search'] : "";

$teams = Team::getAllTeamsWithPaging($koneksi, $page, $limit, $search);

$search_query = "%" . $search . "%";
$stmt = $koneksi->prepare("SELECT COUNT(*) AS total FROM team WHERE name LIKE ?");
$stmt->bind_param("s", $search_query);
$stmt->execute();
$total_teams_result = $stmt->get_result();
$total_teams = $total_teams_result->fetch_assoc()['total'];
$total_pages = ceil($total_teams / $limit);
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Team</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Team</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Team List</h3>
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Search team..."
                        value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" />
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Game</th>
                        <th>Detail</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($teams as $team) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($team->getTeamName()) . "</td>";
                        echo "<td>" . htmlspecialchars($team->getGameId()) . "</td>";
                        echo "<td><a href='detail_team.php?idteam=" . $team->getTeamId() . "'>Detail</a></td>";
                        echo "<td>";

                        echo "<form method='POST' action='join_team.php' onsubmit='return confirmJoin()'>";
                        echo "<div class='form-group'>";
                        echo "<textarea name='description' placeholder='Tuliskan pesan Anda di sini...' rows='3'></textarea>";
                        echo "<button type='submit' class='btn btn-join'><i class='fas fa-user-plus'></i>Join</button>";
                        echo "</div>";
                        echo "<input type='hidden' name='idteam' value='" . $team->getTeamId() . "'>";
                        echo "</form>";

                        echo "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="pagination" style="text-align: right;">
                <?php
                if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>">
                        << </a>
                        <?php else: ?>
                            <a href="#" class="disabled">
                                << </a>
                                <?php endif; ?>

                                <?php
                                $max_hal = ceil($total_teams / $limit);

                                $start_page = max(1, $page - 1);
                                $end_page = min($max_hal, $start_page + 2);

                                for ($hal = $start_page; $hal <= $end_page; $hal++): ?>
                                    <?php if ($hal == $page): ?>
                                        <b><?= $hal ?></b>
                                    <?php else: ?>
                                        <a href="?page=<?= $hal ?>&search=<?= urlencode($search) ?>"><?= $hal ?></a>
                                    <?php endif; ?>
                                <?php endfor; ?>

                                <?php if ($page < $max_hal): ?>
                                    <a href="?page=<?= $page + 1 ?>&search=<?= urlencode($search) ?>">>></a>
                                <?php else: ?>
                                    <a href="#" class="disabled">>></a>
                                <?php endif; ?>
            </div>
        </div>
    </div>

    <script>
        function confirmJoin() {
            return confirm("Apakah Anda yakin ingin bergabung dengan tim ini?");
        }
    </script>

    <?php
    require_once('../template/footer.php');
    ?>
</main>