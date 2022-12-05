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
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </navbar>
    </header>
    <main class="main">
        <h1>Riwayat Pembelian</h1>
        <table class="chart-order">
            <thead>
                <tr>
                    <th>
                        Nama Pembeli
                    </th>
                    <th>
                        Total Harga
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                include "koneksi.php";
                $query="SELECT user.NAMA, (product.HARGA*detail_pesanan.JUMLAH_BARANG) AS subharga FROM user INNER JOIN pesanan USING(USERID) INNER JOIN detail_pesanan USING(IDPESANAN) INNER JOIN product USING(IDBARANG) WHERE pesanan.STATUS='selesai' GROUP BY pesanan.IDPESANAN;";
                $hasil = mysqli_query($koneksi,$query);
                
                if(mysqli_num_rows($hasil)>0){
                    while($data=mysqli_fetch_array($hasil)){
                        echo"
                        <tr>
                            <td>$data[NAMA]</td>
                            <td>$data[subharga]</td>
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