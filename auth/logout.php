<?php
session_start();
session_destroy();

echo "<script>
    alert('Anda telah berhasil logout.');
    window.location.href = '../nologin/index.php'; // Redirect ke halaman nologin atau login
</script>";
exit;
