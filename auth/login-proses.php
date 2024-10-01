<?php
session_start();

require_once "../service/config.php";

if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $password = htmlspecialchars($_POST['password']);

    $stmt = $koneksi->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row["password"])) {
            $_SESSION['ssLogin'] = true;
            $_SESSION['idmember'] = $row['idmember'];
            $_SESSION['ssUser'] = $username;
            $_SESSION['role'] = $row['profile'];
            $_SESSION['user_id'] = $row['idmember'];

            // Cek role dan arahkan ke folder yang sesuai
            if ($_SESSION['role'] == 'admin') {
                header("Location: ../admin/index.php");
            } else {
                header("Location: ../member/index.php");
            }

            exit;
        } else {
            echo "<script>
                alert('Password salah!');
                window.location.href = 'login.php';
                </script>";
        }
    } else {
        echo "<script>
            alert('Username tidak terdaftar!');
            window.location.href = 'login.php';
            </script>";
    }

    $stmt->close();
}
