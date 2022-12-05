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
    <link rel="stylesheet" href="../stylesheets/daftarbarang.css">
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
        <h1>Daftar Produk</h1>
                
        <div class="add-to-chart checkout-button">
            <a href="tambahproduk.php">Tambah Barang +</a>
        </div>
        <table class="chart-order">
            <thead>
                <tr>
                    <th>
                        Gambar
                    </th>
                    <th>
                        Nama Barang
                    </th>
                    <th>
                        Stok Barang
                    </th>
                    <th>
                        Harga Satuan
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                include('koneksi.php');
                $query = mysqli_query($koneksi,"SELECT * FROM product");
                
                while($row = mysqli_fetch_array($query))
                {
                ?>
                    <tr>
                        <td><img src="image_view.php?IDBARANG=<?php echo $row['IDBARANG']; ?>" style="height:100px;"/></td>
                        <td><?php echo $row['NAMA_BARANG']?></td>
                        <td><?php echo $row['STOK']?></td>
                        <td><?php echo $row['HARGA']?></td>
                        <td>
                            <a href='#editModal' class='edit' id='tombolubah' data-toggle='modal' data-id='<?php echo $row['IDBARANG']?>' data-nama='<?php echo $row['NAMA_BARANG']?>' data-stok='<?php echo $row['STOK']?>' data-harga='<?php echo $row['HARGA']?>'><i class='material-icons' data-toggle='tooltip' title='Edit'>&#xE254;</i></a>
                            <a href='#deleteModal' class='delete' id='tombolHapus' data-toggle='modal' data-id='<?php echo $row['IDBARANG']?>'><i class='material-icons'data-toggle='tooltip'title='Delete'>&#xE872;</i></a>
                        </td>
                    </tr>
                <?php
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
                            <label for="nama">Nama Barang</label>
                            <input type="text" class="form-control" name="nama" id="nama" required>
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok</label>
                            <input type="number" class="form-control" name="stok" id="stok" required>
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Satuan</label>
                            <input type="text" class="form-control" name="harga" id="harga" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-default" data-dismiss="modal" value="Cancel">
                        <input type="submit" name="ubah" class="btn btn-info" value="Save">
                    </div>
                </form>
                <?php
                    if(isset($_POST["ubah"])){
                        ubahDataBarang($_POST);
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
                        hapusDataBarang($_POST);
                    }
                ?>
            </div>
        </div>
    </div>
    <script>
    $(document).on("click", "#tombolubah", function(){
		let id = $(this).data("id")
        let nama = $(this).data("nama")
        let stok = $(this).data("stok")
        let harga = $(this).data("harga")
		$(".modal-body #id").val(id)
        $(".modal-body #nama").val(nama)
        $(".modal-body #stok").val(stok)
        $(".modal-body #harga").val(harga)

    });
    $(document).on("click", "#tombolHapus", function(){
		let id = $(this).data("id")
		$(".modal-body #id").val(id)

    });
    </SCript>
</body>

</html>