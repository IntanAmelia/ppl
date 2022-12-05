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
    <link rel="stylesheet" href="../stylesheets/keranjang.css">
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
                    <a href="logout.php">Keluar</a>
                </li>
            </ul>
        </navbar>
    </header>
    <main class="main">
        <h1>Detail Data Pembeli</h1>
        <table class="chart-order">
            <thead>
                <tr>
                    <th>
                        Nama Pembeli
                    </th>
                    <th>
                        No Telepon
                    </th>
                    <th>
                        Desa
                    </th>
                    <th>
                        RT
                    </th>
                    <th>
                        RW
                    </th>
                    <th>
                        Detail Alamat
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                include "koneksi.php";

                $query="SELECT user.*,user_detail.* FROM user INNER JOIN user_detail USING(USERID) WHERE level='user' GROUP BY user.USERID;";
                $hasil = mysqli_query($koneksi,$query);
                
                if(mysqli_num_rows($hasil)>0){
                    while($data=mysqli_fetch_array($hasil)){
                        echo"
                        <tr>
                            <td>$data[NAMA]</td>
                            <td>$data[NO_HP]</td>
                            <td>$data[KELURAHAN]</td>
                            <td>$data[RT]</td>
                            <td>$data[RW]</td>
                            <td>$data[DETAIL_ALAMAT]</td>
                            <td><a href='hapususer.php?nama=$data[NAMA]'>Hapus</a>
                        </tr>";
                    }
                }else{
                    echo"
                    <tr>
                        <td>KOSONG</td>
                    </tr>
                    ";
                }

            ?>
            </tbody>
        </table>
    </main>
</body>

</html>