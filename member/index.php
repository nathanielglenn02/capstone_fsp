<?php
require_once "../service/config.php";
$title = 'Dashboard';
require_once('template/header.php');
require_once('template/sidebar.php');
require_once('template/navbar.php');
require_once('../class/classTeam.php');

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = 5; // Tampilkan 5 data per halaman

$search = isset($_GET['search']) ? $_GET['search'] : "";
// Panggil method untuk mengambil data team dengan pagination
$teams = Team::getAllTeamsWithPaging($koneksi, $page, $limit, $search);

// Ambil total jumlah data untuk menghitung total halaman
$search_query = "%" . $search . "%";
$stmt = $koneksi->prepare("SELECT COUNT(*) AS total FROM team WHERE name LIKE ?");
$stmt->bind_param("s", $search_query);
$stmt->execute();
$total_teams_result = $stmt->get_result();
$total_teams = $total_teams_result->fetch_assoc()['total'];
$total_pages = ceil($total_teams / $limit);

session_start();

if (isset($_SESSION['logout_success'])) {
    echo "<p style='color: green;'>" . $_SESSION['logout_success'] . "</p>";
    unset($_SESSION['logout_success']); // Hapus session setelah ditampilkan
}
?>

<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
            </ul>
        </div>
    </div>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Team List</h3>
                <form method="GET" action="">
                    <input type="text" name="search" placeholder="Search team..." value="<?= isset($_GET['search']) ? htmlspecialchars($_GET['search']) : '' ?>" />
                    <button type="submit"><i class='bx bx-search'></i></button>
                </form>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>ID Team</th>
                        <th>Name</th>
                        <th>Game</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Loop untuk menampilkan data team yang diambil dari database
                    foreach ($teams as $team) {
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($team->getTeamId()) . "</td>";
                        echo "<td><p>" . htmlspecialchars($team->getTeamName()) . "</p></td>";
                        echo "<td>" . htmlspecialchars($team->getGameId()) . "</td>";
                        echo "</tr>";
                    }
                    ?>
                </tbody>
            </table>
            <div class="pagination" style="text-align: right;">
            <?php
                if ($page > 1): ?>
                    <a href="?page=<?= $page - 1 ?>&search=<?= urlencode($search) ?>"><<</a>
                <?php else: ?>
                    <a href="#" class="disabled"><<</a>
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
    <?php
    require_once('template/footer.php');
    ?>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="script.js"></script>
</body>

</html>