<?php
include('koneksi.php');
$query = mysqli_query($koneksi,"SELECT * FROM product");
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
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
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
            </ul>
        </navbar>
    </header>
    <main class="main">
        <h1>Daftar Produk</h1>
        <ul class="catalouge">
            <?php 
            while($row = mysqli_fetch_array($query))
            {
                ?>
                <li class="product">
                    <figure>
                        <img src="image_view.php?IDBARANG=<?php echo $row['IDBARANG']; ?>"/>
                        <figcaption>
                            <?php echo $row['NAMA_BARANG']; ?>
                        </figcaption>
                    </figure>
                    <article>
                        <ul>
                            <li>
                                Stok : <?php echo $row['STOK']; ?>
                            </li>
                            <li>
                                Harga : <?php echo $row['HARGA']; ?>
                            </li>
                        </ul>
                    </article>
                    <div class="add-to-chart">
                        <a href="#Modal" class="masukkan" id="masukkan" data-toggle='modal' data-id="<?php echo $row['IDBARANG']?>" data-nama="<?php echo $row['NAMA_BARANG']?>">Masukkan Keranjang</a>
                    </div>
                </li>
                <?php
            }
            ?>
        </ul>
    </main>
    <!-- Modal HTML -->
    <div id="Modal" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST">
                    <div class="modal-header">						
                        <h4 class="modal-title"><p id="namabarangnya"></p></h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    </div>
                    <div class="modal-body">
                    <input type="hidden" class="form-control" name="id" id="id" required>
                        <div class="form-group">
                            <label for="jumlah">jumlah</label>
                            <input type="text" class="form-control" name="jumlah" id="jumlah" required>
                        </div>					
                    </div>
                    <div class="modal-footer">
                        <input type="button" class="btn btn-succes" data-dismiss="modal" value="batal">
                        <input type="submit" name="tambah" class="btn btn-success" value="Masukkan">
                    </div>
                </form>
                <?php
                    if(isset($_POST["tambah"])){
                        keranjang($_POST);
                    }
                ?>
            </div>
        </div>
    </div>
</body>
<script>
    $(document).on("click", "#masukkan", function(){
		let id = $(this).data("id")
        let nama = $(this).data("nama")
        let def = 1

        $(".modal-header #namabarangnya").html(nama)

		$(".modal-body #id").val(id)
        $(".modal-body #jumlah").val(def)

    });
</SCript>
</html>