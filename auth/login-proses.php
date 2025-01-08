<?php
session_start();

require_once "../service/config.php";

if (isset($_POST['login'])) {
    $username = htmlspecialchars(trim($_POST['username']));
    $password = htmlspecialchars(trim($_POST['password']));

    $stmt = $koneksi->prepare("SELECT * FROM member WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();

        if (password_verify($password, $row["password"])) {
            $_SESSION['ssLogin'] = true;
            $_SESSION['idmember'] = $row['idmember'];
            $_SESSION['username'] = $row['username'];
            $_SESSION['profile'] = $row['profile'];
            $_SESSION['firstname'] = $row['fname'];
            $_SESSION['lastname'] = $row['lname'];

            if ($row['profile'] == 'admin') {
                header("Location: ../admin/index.php");
            } elseif ($row['profile'] == 'member') {
                header("Location: ../member/index.php");
            }
            exit;
        } else {
            echo "<script>
                alert('Username atau Password salah!');
                window.location.href = 'login.php';
                </script>";
        }
    } else {
        echo "<script>
            alert('Username atau Password salah!');
            window.location.href = 'login.php';
            </script>";
    }

    $stmt->close();
}
