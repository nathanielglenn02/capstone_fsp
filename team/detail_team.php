<?php
require_once('../service/config.php');
require_once('../class/classAchievement.php');
require_once('../class/classTeamMembers.php');

$title = "Team Details - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

// Mengambil idteam dari parameter URL
$idteam = isset($_GET['idteam']) ? intval($_GET['idteam']) : null;

if ($idteam) {
    // Mengambil semua achievement berdasarkan idTeam
    $achievements = Achievement::getAchievementsByTeam($koneksi, $idteam);

    // Mengambil semua anggota tim berdasarkan idTeam
    $teamMembers = TeamMembers::getMembersByTeam($koneksi, $idteam);
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
                <a href="add_member.php?idteam=<?php echo $idteam; ?>"><i class='bx bx-plus'></i></a>
                <i class='bx bx-filter'></i>
            </div>
            <ul class="todo-list">
                <?php
                // Loop untuk menampilkan semua anggota dari tim yang aktif
                foreach ($teamMembers as $member) {
                    echo "<li class='completed'>";
                    echo "<p>" . htmlspecialchars($member->getMemberName()) . "</p>";
                    echo "</li>";
                }
                ?>
            </ul>
        </div>

        <div class="todo">
            <div class="head">
                <h3>Achievements</h3>
                <a href="create_achievement.php?idteam=<?php echo $idteam; ?>"><i class='bx bx-plus'></i></a>
                <i class='bx bx-filter'></i>
            </div>
            <ul class="todo-list">
                <?php
                foreach ($achievements as $achievement) {
                    echo "<li class='completed'>";
                    echo "<p>" . htmlspecialchars($achievement->getName()) . "</p>";
                    echo "</li>";
                }
                ?>  
            </ul>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>