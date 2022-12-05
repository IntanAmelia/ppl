<?php
require "function.php";

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
                    <a href="menuadmin.php">Menu Admin</a>
                </li>
                <li>
                    <a href="logout.php">Logout</a>
                </li>
            </ul>
        </navbar>
    </header>
    <main class="main">
        <h1>Daftar Pesanan</h1>
        <table class="chart-order">
            <thead>
                <tr>
                    <th>
                        ID Pesanan
                    </th>
                    <th>
                        Nama Pembeli
                    </th>
                    <th>
                        Nama Barang
                    </th>
                    <th>
                        Harga Satuan
                    </th>
                    <th>
                        Jumlah Barang
                    </th>
                    <th>
                        Subtotal
                    </th>
                    <th>
                        Status
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
            <?php
                include "koneksi.php";
                $query="SELECT pesanan.IDPESANAN, user.NAMA, product.NAMA_BARANG, product.HARGA, detail_pesanan.JUMLAH_BARANG, (product.HARGA*detail_pesanan.JUMLAH_BARANG) AS subtotal,pesanan.STATUS FROM user INNER JOIN pesanan USING(USERID) INNER JOIN detail_pesanan USING(IDPESANAN) INNER JOIN product USING(IDBARANG) WHERE pesanan.STATUS IN ('dipesan','diantar') GROUP BY pesanan.IDPESANAN;";
                $hasil = mysqli_query($koneksi,$query);
                
                if(mysqli_num_rows($hasil)>0){
                    while($data=mysqli_fetch_array($hasil)){
                        echo"
                        <tr>
                            <td>$data[IDPESANAN]</td>
                            <td>$data[NAMA]</td>
                            <td>$data[NAMA_BARANG]</td>
                            <td>$data[HARGA]</td>
                            <td>$data[JUMLAH_BARANG]</td>
                            <td>$data[subtotal]</td>
                            <td>$data[STATUS]</td>
                            <td>
                                <a href='#editModal' class='edit' id='tombolubah' data-toggle='modal' data-id='$data[IDPESANAN]' data-status='$data[STATUS]'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
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

            ?>
            </tbody>
        </table>
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
                            <label for="jumlah">Status(dipesan/diantar/selesai)</label>
                            <input type="text" class="form-control" name="status" id="status" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="ubah" class="btn btn-info" value="Save">
                    </div>
                </form>
                <?php
                    if(isset($_POST["ubah"])){
                        ubahstatus($_POST);
                    }
                ?>
            </div>
        </div>
    </div>
    <script>
        $(document).on("click", "#tombolubah", function(){
            let id = $(this).data("id")
            let status = $(this).data("status")

            $(".modal-body #id").val(id)
            $(".modal-body #status").val(status)


        });
    </script>
</body>

</html>