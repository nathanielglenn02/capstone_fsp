<?php
require_once('../service/config.php');
$title = "Team - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');
?>

<main>
    <div class="head-title">
        <div class="left">
            <h1>Team</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Team</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- Konten Utama -->
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Team List</h3>
                <i class='bx bx-plus'></i>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Anggota</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>User 1</p>
                        </td>
                        <td>
                            <i class="fa-solid fa-pen"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>User 2</p>
                        </td>
                        <td>
                            <i class="fa-solid fa-pen"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>User 3</p>
                        </td>
                        <td>
                            <i class="fa-solid fa-pen"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>User 4</p>
                        </td>
                        <td>
                            <i class="fa-solid fa-pen"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <img src="img/people.png">
                            <p>User 5</p>
                        </td>
                        <td>
                            <i class="fa-solid fa-pen"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="todo">
            <div class="head">
                <h3>Achievment</h3>
                <i class='bx bx-plus'></i>
                <i class='bx bx-filter'></i>
            </div>
            <ul class="todo-list">
                <li class="completed">
                    <p>Achievment 1</p>
                </li>
                <li class="completed">
                    <p>Achievment 2</p>
                </li>
                <li class="not-completed">
                    <p>Achievment 3</p>
                </li>
                <li class="completed">
                    <p>Achievment 4</p>
                </li>
                <li class="not-completed">
                    <p>Achievment 5</p>
                </li>
            </ul>
        </div>
    </div>


    <?php
    require_once('../template/footer.php');

    ?>