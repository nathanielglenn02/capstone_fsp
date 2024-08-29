<?php
require_once "service/config.php";
$title = 'Dashboard';
require_once('template/header.php');
require_once('template/sidebar.php');
require_once('template/navbar.php');
?>


<!-- MAIN -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Dashboard</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Home</a>
                </li>
            </ul>
        </div>
    </div>


    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Team List</h3>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Team</th>
                        <th>Game</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>Team A</p>
                        </td>
                        <td>PUBG</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>Team A</p>
                        </td>
                        <td>Mobile Legend</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>Team A</p>
                        </td>
                        <td>Valorant</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>Team A</p>
                        </td>
                        <td>Honor of King</td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>Team A</p>
                        </td>
                        <td>Clash Royale</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    require_once('template/footer.php');
    ?>
</main>
<!-- MAIN -->
</section>
<!-- CONTENT -->

<script src="script.js"></script>
</body>

</html>