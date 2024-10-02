<?php
$title = "Registrasi - Club Informatics 2024";

require_once('../service/config.php');
require_once('template/header.php');
require_once('../class/classMember.php');
?>
<main>
    <div class="login-container">
        <div class="login-form">
            <h3>Registrasi Akun Baru</h3>
            <!-- Form Registrasi -->
            <form action="register-proses.php" method="POST">
                <div class="form-group">
                    <label for="fname">First Name:</label>
                    <input type="text" id="fname" name="fname" placeholder="Masukkan nama depan" required>
                </div>

                <div class="form-group">
                    <label for="lname">Last Name:</label>
                    <input type="text" id="lname" name="lname" placeholder="Masukkan nama belakang" required>
                </div>

                <div class="form-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" placeholder="Masukkan username anda" required>
                </div>

                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password anda" required>
                </div>

                <button type="submit" class="btn btn-login" name="simpan">Daftar</button>
            </form>

            <div class="register-link">
                <p>Sudah punya akun? <a href="login.php">Login di sini</a></p>
            </div>
        </div>
    </div>
</main>

<?php
require_once('template/footer.php');
?>