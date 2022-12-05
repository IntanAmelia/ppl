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
                    <a id="chart" href="#"><img src="../assets/icons/keranjang.png" alt="Keranjang"></a>
                </li>
            </ul>
        </navbar>
    </header>
    
    <main class="main">
        <h1>Keranjang Anda</h1>
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
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                include "koneksi.php";
                $userid=$_SESSION['id'];
                $query="SELECT pesanan.IDPESANAN, product.NAMA_BARANG, product.HARGA, detail_pesanan.JUMLAH_BARANG, (product.HARGA*detail_pesanan.JUMLAH_BARANG) AS subharga FROM pesanan INNER JOIN detail_pesanan USING(IDPESANAN) INNER JOIN product USING(IDBARANG) WHERE pesanan.USERID='$userid' && pesanan.STATUS='keranjang' GROUP BY pesanan.IDPESANAN;";
                $hasil = mysqli_query($koneksi,$query);
                
                if(mysqli_num_rows($hasil)>0){
                    while($data=mysqli_fetch_array($hasil)){
                        echo"
                        <tr>
                            <td>$data[NAMA_BARANG]</td>
                            <td>$data[HARGA]</td>
                            <td>$data[JUMLAH_BARANG]</td>
                            <td>$data[subharga]</td>
                            <td>
                                <a href='#editModal' class='edit' id='tombolubah' data-toggle='modal' data-id='$data[IDPESANAN]' data-jumlah='$data[JUMLAH_BARANG]'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                                <a href='#deleteModal' class='delete' id='tombolHapus' data-toggle='modal' data-id='$data[IDPESANAN]'><i class='material-icons'data-toggle='tooltip'title='Delete'>&#xE872;</i></a>
                            </td>
                        </tr>";
                    }
                }else{
                    echo"
                    <tr>
                        <td>KOSONG</td>
                    </tr>
                    ";
                }
                $querytotal="SELECT SUM(product.HARGA*detail_pesanan.JUMLAH_BARANG) AS total FROM pesanan INNER JOIN detail_pesanan USING(IDPESANAN) INNER JOIN product USING(IDBARANG) WHERE pesanan.USERID='$userid' && pesanan.STATUS='keranjang' GROUP BY pesanan.USERID;";
                $hasiltotal=mysqli_query($koneksi,$querytotal);
                if(mysqli_num_rows($hasiltotal)>0){
                    $datatotal=mysqli_fetch_array($hasiltotal);
                    echo "
                    <tr>
                        <td colspan='3'><b>total</b></td>
                        <td colspan='2'>$datatotal[total]</td>
                    </tr>
                    ";
                }else{
                    echo"
                    <tr>
                        <td>Tidak ada pesanan</td>
                    </tr>
                    ";
                }

            ?>

            </tbody>
        </table>
        <div class="add-to-chart checkout-button">
            <a href="datapembeli.php">Checkout</a>
        </div>
    </main>
    <!-- Edit Modal HTML -->
    <div id="editModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">						
                        <h4 class="modal-title">Edit Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" class="form-control" name="id" id="id" required>
                        <div class="form-group">
                            <label for="jumlah">Jumlah</label>
                            <input type="number" class="form-control" name="jumlah" id="jumlah" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="ubah" class="btn btn-info" value="Save">
                    </div>
                </form>
                <?php
                    if(isset($_POST["ubah"])){
                        ubahDataKeranjang($_POST);
                    }
                ?>
            </div>
        </div>
    </div>
    <!-- Delete Modal HTML -->
    <div id="deleteModal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">						
                        <h4 class="modal-title">Hapus Data</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" name="id" id="id">					
                        <p>Apakah Anda yakin untuk menghapus data ini?</p>
                        <p class="text-warning"><small>aksi ini tidak dapat dibatalkan</small></p>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="hapus" class="btn btn-danger" value="Delete">
                    </div>
                </form>
                <?php
                    if(isset($_POST["hapus"])){
                        hapusDataKeranjang($_POST);
                    }
                ?>
            </div>
        </div>
    </div>
    <script>
        $(document).on("click", "#tombolubah", function(){
            let id = $(this).data("id")
            let jumlah = $(this).data("jumlah")

            $(".modal-body #id").val(id)
            $(".modal-body #jumlah").val(jumlah)


        });

        $(document).on("click", "#tombolHapus", function(){
            let id = $(this).data("id")

            $(".modal-body #id").val(id)


        });

    </script>
</body>

</html>