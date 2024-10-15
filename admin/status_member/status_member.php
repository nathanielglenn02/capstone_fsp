<?php
session_start();

if (!isset($_SESSION['idmember'])) {
    header('Location: ../../auth/login.php');
    exit;
}

require_once('../../service/config.php');
require_once('../../class/classJoinProposal.php');
require_once('../../class/classTeam.php');
require_once('../../class/classMember.php');


$joinProposals = JoinProposal::getAllProposal($koneksi);

$title = "Status Join Proposal - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Status Join Proposal</h1>
            <ul class="breadcrumb">
                <li>
                    <a class="active" href="../index.php">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a href="#">Status Join</a>
                </li>
            </ul>
        </div>
    </div>

    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Status Proposal Join</h3>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Team Name</th>
                        <th>Member</th>
                        <th>Pesan</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($joinProposals as $proposal) {
                        $team = Team::getTeamById($koneksi, $proposal->getTeamId());
                        $memberName = Member::getMemberNameById($koneksi, $proposal->getIdMember());
                        echo "<tr>";
                        echo "<td>" . htmlspecialchars($team->getTeamName()) . "</td>";
                        echo "<td>" . htmlspecialchars($memberName) . "</td>";
                        echo "<td>" . htmlspecialchars($proposal->getDescription()) . "</td>";
                        echo "<td>" . htmlspecialchars($proposal->getStatus()) . "</td>";
                        echo "<td>";
                        echo "<a href='edit_status_member.php?id=" . $proposal->getId() . "'><i class='fa-solid fa-pen' style='margin-right: 10px;'></i></a>";
                        echo "</td>";
                        echo "</tr>";
                    }

                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');
    ?>
</main>