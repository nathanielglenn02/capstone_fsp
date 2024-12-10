<?php

require_once "../service/config.php";

if (isset($_POST['simpan'])) {
    $fname = trim(htmlspecialchars($_POST['fname']));
    $lname = trim(htmlspecialchars($_POST['lname']));
    $username = trim(htmlspecialchars($_POST['username']));
    $password = trim(htmlspecialchars($_POST['password']));
    $profile = "member";

    if ($username === $password) {
        echo "<script>
            alert('Username dan password tidak boleh sama.');
            window.location.href = 'registrasi.php';
            </script>";
        exit();
    }

    if (strlen($username) < 5 || !preg_match('/[a-zA-Z]/', $username) || !preg_match('/\d/', $username)) {
        echo "<script>
            alert('Username harus minimal 5 karakter dan merupakan campuran huruf dan angka.');
            window.location.href = 'registrasi.php';
            </script>";
        exit();
    }

    if (strlen($password) < 8 || !preg_match('/[a-zA-Z]/', $password) || !preg_match('/\d/', $password)) {
        echo "<script>
            alert('Password harus minimal 8 karakter dan merupakan campuran huruf dan angka.');
            window.location.href = 'registrasi.php';
            </script>";
        exit();
    }

    $checkStmt = $koneksi->prepare("SELECT idmember FROM member WHERE username = ?");
    if (!$checkStmt) {
        die("Prepare failed: " . $koneksi->error);
    }
    $checkStmt->bind_param("s", $username);
    $checkStmt->execute();
    $checkStmt->store_result();

    if ($checkStmt->num_rows > 0) {
        echo "<script>
        alert('Username sudah terdaftar. Silakan gunakan username yang lainnya.');
        window.location.href = 'registrasi.php';
        </script>";
        $checkStmt->close();
        exit();
    }
    $checkStmt->close();

    $pass = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $koneksi->prepare("INSERT INTO member (fname, lname, username, password, profile) VALUES (?, ?, ?, ?, ?)");
    if (!$stmt) {
        die("Prepare failed: " . $koneksi->error);
    }
    $stmt->bind_param("sssss", $fname, $lname, $username, $pass, $profile);

    if ($stmt->execute()) {
        echo "<script>
        alert('Registrasi berhasil, silahkan login.');
        window.location.href = 'login.php';
        </script>";
    } else {
        echo "<script>
        alert('Registrasi gagal: " . $stmt->error . "'');
        window.location.href = 'registrasi.php';
        </script>";
    }

    $stmt->close();
}
