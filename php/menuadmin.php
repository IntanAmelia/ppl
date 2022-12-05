<?php
session_start();
if($_SESSION['level']!='admin' || empty($_SESSION['login'])){
    header("location:../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheets/index.css">
    <link rel="stylesheet" href="../stylesheets/menuadmin.css">
    <title>Beranda</title>
</head>

<body>
    <header class="header">
        <navbar class="navbar">
            <div class="logo-container">
                <figure>
                    <img id="logo-icon" src="../assets/images/logo_minimarket.png" alt="Logo minimarket">
                </figure>
                <div class="logo-title">
                    <h1>Mini Market</h1>
                    <p>harga merakyat kualitas pejabat</p>
                </div>
            </div>
            <ul class="navbar-links">
                <li>
                    <a href="menuadmin.php">Menu Admin</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </navbar>
    </header>
    <main class="main">
        <h1>Menu Admin</h1>
        <ul class="catalouge">
            <li class="menu">
                <a href="daftarbarang.php">
                    <figure>
                        <img src="../assets/images/list.png" alt="Daftar Barang">
                    </figure>
                    <figcaption class="admin-menu-title">
                        Daftar Barang
                    </figcaption>
                    </figure>
                </a>
            </li>
            <li class="menu">
                <a href="detaildatapembeli.php">
                    <figure>
                        <img src="../assets/images/user.png" alt="Data Pembeli">
                    </figure>
                    <figcaption class="admin-menu-title">
                        Data Pembeli
                    </figcaption>
                    </figure>
                </a>
            </li>
            <li class="menu">
                <a href="./daftarpesanan.php">
                    <figure>
                        <img src="../assets/images/daftar.png" alt="Daftar Pesanan">
                    </figure>
                    <figcaption class="admin-menu-title">
                        Daftar Pesanan
                    </figcaption>
                    </figure>
                </a>
            </li>
            <li class="menu">
                <a href="./riwayat.php">
                    <figure>
                        <img src="../assets/images/riwayat.png" alt="Riwayat Pembelian">
                    </figure>
                    <figcaption class="admin-menu-title">
                        Riwayat Pembelian
                    </figcaption>
                    </figure>
                </a>
            </li>
        </ul>
    </main>
</body>

</html>