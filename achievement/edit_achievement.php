<?php
require_once('../service/config.php');
require_once('../class/classAchievement.php');
require_once('../class/classTeam.php');
require_once('../class/classGame.php');

$title = "Edit Achievement - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

// Mengambil idteam dari URL
$idachievement = isset($_GET['id']) ? intval($_GET['id']) : 0;

if ($idachievement == 0) {
    // Jika idteam tidak valid, redirect ke halaman team
    header('Location: achievement.php');
    exit();
}

// Mengambil data tim berdasarkan idteam
$achievement = Achievement::getAchievementsByTeam($koneksi, $idachievement);

// Mengambil semua data game untuk dropdown
$teams = Team::getAllTeams($koneksi);

// Proses saat form disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $achievementName = $_POST['achievement_name'];
    $teamid = $_POST['team_id'];
    $date = $_POST['ach_date'];
    $description = $_POST['ach_desc'];
    
    $achievement = new Achievement($koneksi);
    $achievement->setName($achievementName);
    $achievement->setIdTeam($teamid);
    $achievement->setDate($date);
    $achievement->setDescription($description);
    $achievement->updateAchievement();
    header('Location: achievement.php');
    exit();
}
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Update Achievement</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="team.php">Achievement</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Update Achievement</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Konten Utama -->
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Update Achievement</h3>
            </div>
            <form method="POST">
                <div class="form-group">
                    <label for="achievement_name">Achievement Name</label>
                    <input type="text" id="achievement_name" name="achievement_name" value="<?php echo htmlspecialchars($achievement->getName()); ?>" required>
                </div>
                <div class="form-group">
                    <label for="team_id">Team</label>
                    <select id="team_id" name="team_id" required>
                        <?php foreach ($teams as $team): ?>
                            <option value="<?php echo $team->getTeamId(); ?>" <?php echo $team->getTeamId() == $achievement->getIdTeam() ? 'selected' : ''; ?>>
                                <?php echo htmlspecialchars($team->getTeamName()); ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="ach_date">Date</label>
                    <input type="date" id="ach_date" name="ach_date" value="<?php echo htmlspecialchars($achievement->getDate()); ?>" required>
                </div>  
                <div class="form-group">
                    <label for="ach_desc">Description</label>
                    <textarea id="ach_desc" name="ach_desc" required><?php echo htmlspecialchars($achievement->getDescription()); ?></textarea>
                </div>  
                <button type="submit" class="btn">Update Achievement</button>
            </form>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>