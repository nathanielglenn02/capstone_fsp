<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classAchievement.php');

$title = "Achievement - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;

$search = isset($_GET['search']) ? $_GET['search'] : "";

$achievements = Achievement::getAllAchievementWithPaging($koneksi, $page, $limit, $search);

$search_query = "%" . $search . "%";
$stmt = $koneksi->prepare("SELECT COUNT(*) AS total FROM achievement WHERE name LIKE ?");
$stmt->bind_param("s", $search_query);
$stmt->execute();
$total_achievements_result = $stmt->get_result();
$total_achievements = $total_achievements_result->fetch_assoc()['total'];
$total_pages = ceil($total_achievements / $limit);
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Achievement</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Achievement</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Konten Utama -->
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Achievement List</h3>
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Search Achievement..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" />
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Achievement Name</th>
                        <th>Date</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($achievements as $achievement) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($achievement->getIdTeam()) . "</td>";
                        echo "<td>" . htmlspecialchars($achievement->getName()) . "</td>";
                        echo "<td>" . htmlspecialchars($achievement->getDate()) . "</td>";
                        echo "<td>" . htmlspecialchars($achievement->getDescription()) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="pagination" style="text-align: right;">
                <?php
                if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>">
                        <<< /a>
                        <?php else: ?>
                            <a href="#" class="disabled">
                                <<< /a>
                                <?php endif; ?>

                                <?php
                                $max_hal = ceil($total_achievements / $limit);

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

    <?php
    require_once('../template/footer.php');
    ?>
</main>