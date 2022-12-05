<?php
require "function.php";
if($_SESSION['level']!='user' || empty($_SESSION['login'])){
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <title>Beranda</title>
    <style>
        table td a.edit {
            color: #FFC107;
        }
        table td a.delete {
            color: #F44336;
        }
    </style>
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
                    <a href="beranda.php">Beranda</a>
                </li>
                <li>
                    <a href="statuspesanan.php">Pesanan Saya</a>
                </li>
                <li>
                    <a href="tentangkami.php">Kontak Kami</a>
                </li>
                <li>
                    <a href="logout.php">Keluar</a>
                </li>
                <li>
                    <a id="chart" href="keranjang.php"><img src="../assets/icons/keranjang.png" alt="Keranjang"></a>
                </li>
            </ul>
        </navbar>
    </header>
    
    <main class="main">
        <h1>Pesanan Saya</h1>
        <table class="chart-order">
            <thead>
                <tr>
                    <th>
                        Nama Barang
                    </th>
                    <th>
                        Harga satuan
                    </th>
                    <th>
                        jumlah barang
                    </th>
                    <th>
                        subtotal
                    </th>
                    <th>
                        status
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                include "koneksi.php";
                $userid=$_SESSION['id'];
                $query="SELECT pesanan.IDPESANAN, product.NAMA_BARANG, product.HARGA, detail_pesanan.JUMLAH_BARANG, (product.HARGA*detail_pesanan.JUMLAH_BARANG) AS subharga, pesanan.STATUS FROM pesanan INNER JOIN detail_pesanan USING(IDPESANAN) INNER JOIN product USING(IDBARANG) WHERE pesanan.USERID='$userid' && pesanan.STATUS NOT IN('keranjang') GROUP BY pesanan.IDPESANAN;";
                $hasil = mysqli_query($koneksi,$query);
                
                if(mysqli_num_rows($hasil)>0){
                    while($data=mysqli_fetch_array($hasil)){
                        echo"
                        <tr>
                            <td>$data[NAMA_BARANG]</td>
                            <td>$data[HARGA]</td>
                            <td>$data[JUMLAH_BARANG]</td>
                            <td>$data[subharga]</td>
                            <td>$data[STATUS]</td>
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