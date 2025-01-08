<?php
session_start(); // Memulai sesi

$title = "Login - Club Informatics 2024";

require_once('../service/config.php');
require_once('template/header.php');
require_once('../class/classMember.php');

// Periksa apakah pengguna sudah login
if (isset($_SESSION['idmember'])) {
    if ($_SESSION['profile'] == 'admin') {
        header("Location: ../admin/index.php");
    } elseif ($_SESSION['profile'] === 'member') {
        header('Location: ../member/index.php');
    }
    exit;
}
?>
<main>
    <div class="login-container">
        <div class="login-form">
            <h3>Masuk ke Akun Anda</h3>

            <!-- Pesan error jika ada -->
            <?php if (isset($_SESSION['error'])): ?>
                <div class="error-message" style="color: red; margin-bottom: 20px;">
                    <?= $_SESSION['error']; ?>
                </div>
                <?php unset($_SESSION['error']); ?>
            <?php endif; ?>

            <!-- Form login -->
            <form action="login-proses.php" method="POST">
                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username anda" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password anda" required>
                </div>

                <button type="submit" class="btn btn-login" name="login">Login</button>
            </form>

            <!-- Link untuk daftar -->
            <div class="register-link">
                <p>Belum punya akun? <a href="registrasi.php">Daftar di sini</a></p>
            </div>

            <!-- Tombol kembali ke halaman dashboard -->
            <div class="back-to-dashboard">
                <a href="../nologin/index.php" class="btn btn-dashboard">Kembali ke Dashboard</a>
            </div>
        </div>
    </div>
</main>

<?php
require_once('template/footer.php');
?>