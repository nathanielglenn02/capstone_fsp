<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classTeam.php');
require_once('../../class/classGame.php');

$title = "Create Team - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');

$games = Game::getAllGames($koneksi);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $teamName = $_POST['team_name'];
    $gameId = $_POST['game_id'];

    // Inisialisasi objek tim baru
    $team = new Team($koneksi);
    $team->setTeamName($teamName);
    $team->setGameId($gameId);

    // Proses file gambar jika ada
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $imageTmpPath = $_FILES['image']['tmp_name'];
        $imageName = ''; // Nama gambar sementara
        $imagePath = ''; // Path gambar sementara

        // Simpan data tim terlebih dahulu untuk mendapatkan teamId
        $team->createTeam();

        // Ambil teamId yang baru dimasukkan
        $teamId = $team->getTeamId(); 
        $imageName = $teamId . '.jpg'; // Gunakan ID tim sebagai nama file gambar
        $imagePath = '../../public/img/' . $imageName; // Tentukan path penyimpanan gambar

        // Pindahkan file gambar ke folder tujuan
        if (move_uploaded_file($imageTmpPath, $imagePath)) {
            // Update path gambar setelah tim berhasil disimpan
            $team->setImgPath($imagePath);
            // Update imgPath di database setelah gambar berhasil disimpan
            $team->updateTeam();
        } else {
            $errorMessage = "Gagal meng-upload gambar.";
        }
    } else {
        $errorMessage = "File gambar tidak ditemukan atau terjadi kesalahan.";
    }

    // Redireksi setelah data tim dan gambar berhasil disimpan
    header('Location: team.php');
    exit();
}
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Create Team</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="team.php">Team</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Create Team</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="table-data">
        <div class="order">
            <form id="create_team" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="team_name">Team Name</label>
                    <input type="text" id="team_name" name="team_name" required>
                </div>
                <div class="form-group">
                    <label for="game_id">Game</label>
                    <select id="game_id" name="game_id" required>
                        <?php foreach ($games as $game): ?>
                            <option value="<?php echo $game->getGameId(); ?>"><?php echo $game->getGameName(); ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Pilih gambar JPG:</label>
                    <input type="file" name="image" id="image" accept="image/jpg" required> <br>
                </div>
                
                <button type="submit" class="btn">Create Team</button>
            </form>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>
