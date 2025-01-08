<?php
session_start();

require_once "../service/config.php";

if (isset($_POST['login'])) {
    // Sanitasi input
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Query untuk memeriksa username
    $stmt = $koneksi->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        // Verifikasi password
        if (password_verify($password, $row["password"])) {
            // Set sesi login
            $_SESSION['ssLogin'] = true;
            $_SESSION['idmember'] = $row['idmember'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['profile'] = $row['profile'];
            $_SESSION['firstname'] = $row['fname'];
            $_SESSION['lastname'] = $row['lname'];

            // Redirect berdasarkan peran
            if ($row['profile'] == 'admin') {
                header("Location: ../admin/index.php");
            } elseif ($row['profile'] == 'member') {
                header("Location: ../member/index.php");
            }
            exit;
        } else {
            // Password salah
            echo "<script>
                alert('Username atau Password salah!');
                window.location.href = 'login.php';
                </script>";
        }
    } else {
        // Username tidak ditemukan
        echo "<script>
            alert('Username atau Password salah!');
            window.location.href = 'login.php';
            </script>";
    }

    // Tutup statement
    $stmt->close();
}
