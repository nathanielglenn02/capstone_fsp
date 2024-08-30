<?php
require_once('../service/config.php');
$title = "Game - Club Informatics 2024";
require_once('../template/header.php');
require_once('../template/sidebar.php');
require_once('../template/navbar.php');
?>

<!-- Konten Utama -->
<main>
    <div class="head-title">
        <div class="left">
            <h1>Game</h1>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Dashboard</a>
                </li>
                <li><i class='bx bx-chevron-right'></i></li>
                <li>
                    <a class="active" href="#">Game</a>
                </li>
            </ul>
        </div>
    </div>
    <div class="table-data">
        <div class="order">
            <div class="head">
                <h3>Detail Game</h3>
                <i class='bx bx-plus'></i>
                <i class='bx bx-search'></i>
                <i class='bx bx-filter'></i>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Game</th>
                        <th>Deskripsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>PUBG</td>
                        <td>
                            <p>PUBG adalah game battle royale di mana 100 pemain bertempur dalam peta yang semakin
                                mengecil, dengan tujuan menjadi pemain atau tim terakhir yang bertahan hidup. Pemain
                                harus mencari senjata, kendaraan, dan perlengkapan lainnya sambil bertahan dari serangan
                                musuh.</p>
                        </td>
                        <td>
                            <i class="fa-solid fa-pen"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Mobile Legend</td>
                        <td>
                            <p>Mobile Legends adalah game MOBA (Multiplayer Online Battle Arena) di mana dua tim,
                                masing-masing terdiri dari lima pemain, bertarung untuk menghancurkan basis musuh sambil
                                mempertahankan basis mereka sendiri. Setiap pemain mengendalikan karakter unik yang
                                disebut "hero" dengan kemampuan khusus.</p>
                        </td>
                        <td>
                            <i class="fa-solid fa-pen"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Valorant</td>
                        <td>
                            <p>game FPS (First-Person Shooter) taktis yang menggabungkan elemen tembak-menembak cepat
                                dengan kemampuan khusus dari setiap karakter yang disebut "agents". Dalam game ini, dua
                                tim beranggotakan lima pemain bertarung dalam mode penyerangan dan pertahanan.</p>
                        </td>
                        <td>
                            <i class="fa-solid fa-pen"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Honor of King</td>
                        <td>
                            <p>Honor of Kings adalah game MOBA populer di China yang mirip dengan Mobile Legends. Pemain
                                membentuk tim untuk bertarung di arena, menggunakan hero dengan berbagai kemampuan unik
                                untuk menghancurkan basis musuh dan memenangkan pertandingan.</p>
                        </td>
                        <td>
                            <i class="fa-solid fa-pen"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                    <tr>
                        <td>Clash Royale</td>
                        <td>
                            <p>Clash Royale adalah game strategi waktu nyata yang menggabungkan elemen permainan kartu
                                dan tower defense. Pemain mengumpulkan dan meng-upgrade kartu yang mewakili pasukan,
                                bangunan, dan mantra untuk digunakan dalam pertempuran melawan pemain lain secara
                                online.</p>
                        </td>
                        <td>
                            <i class="fa-solid fa-pen"></i>
                            <i class="fa-solid fa-trash"></i>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    require_once('../template/footer.php');

    ?>