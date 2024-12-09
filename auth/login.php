<?php
$title = "Login - Club Informatics 2024";

require_once('../service/config.php');
require_once('template/header.php');
require_once('../class/classMember.php');
?>
<main>
    <div class="login-container">
        <div class="login-form">
            <h3>Masuk ke Akun Anda</h3>

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

            <div class="register-link">
                <p>Belum punya akun? <a href="<?= $main_url ?>auth/registrasi.php">Daftar di sini</a></p>
            </div>
        </div>
    </div>
</main>

<?php
require_once('template/footer.php');

?>