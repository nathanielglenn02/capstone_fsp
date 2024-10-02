<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classJoinProposal.php');
require_once('../../class/classTeam.php');

$idmember = $_SESSION['idmember'];

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['idteam'])) {
    $idteam = $_POST['idteam'];
    $description = isset($_POST['description']) ? $_POST['description'] : '';

    $existingProposal = JoinProposal::getProposalByMemberAndTeam($koneksi, $idmember, $idteam);

    if ($existingProposal) {
        echo "<script>alert('Anda sudah mengajukan join ke tim ini. Mohon tunggu konfirmasi.'); window.location.href = 'team.php';</script>";
    } else {
        JoinProposal::createProposal($koneksi, $idmember, $idteam, $description);
        echo "<script>alert('Join proposal berhasil diajukan.'); window.location.href = 'team.php';</script>";
    }
} else {
    header('Location: team.php');
}
