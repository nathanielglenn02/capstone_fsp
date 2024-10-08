<?php
require_once('../../service/config.php');
require_once('../../class/classGame.php');

$title = "Game - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');


$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5;

$search = isset($_GET['search']) ? $_GET['search'] : "";

$games = Game::getAllGamesWithPaging($koneksi, $page, $limit, $search);

$search_query = "%" . $search . "%";
$stmt = $koneksi->prepare("SELECT COUNT(*) AS total FROM GAME WHERE name LIKE ?");
$stmt->bind_param("s", $search_query);
$stmt->execute();
$total_games_result = $stmt->get_result();
$total_games = $total_games_result->fetch_assoc()['total'];
$total_pages = ceil($total_games / $limit);
?>

<!-- Konten Utama -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Game</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Game</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Game</h3>
                <!-- <a href="create_game.php"><i class='bx bx-plus'></i></a> -->
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Search Game..."
                        value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" />
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Game</th>
                        <th>Deskripsi</th>
                        <!-- <th>Detail</th> -->
                        <!-- <th>Aksi</th> -->
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($games as $game) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($game->getGameName()) . "</td>";
                        echo "<td><p>" . htmlspecialchars($game->getDescription()) . "</p></td>";
                        // echo "<td>";
                        // echo "<a href='detail_game.php?id=" . $game->getGameId() . "'>Detail</a>";
                        // echo "</td>";
                        echo "<td>";
                        // echo "<a href='edit_game.php?id=" . $game->getGameId() . "'><i class='fa-solid fa-pen' style='margin-right: 10px;'></i></a>";
                        // echo "<a href='delete_game.php?id=" . $game->getGameId() . "' onclick=\"return confirm('Apakah Anda yakin ingin menghapus game ini?');\"><i class='fa-solid fa-trash'></i></a>";
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
                                $max_hal = ceil($total_games / $limit);

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