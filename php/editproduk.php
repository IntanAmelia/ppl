<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheets/login.css">
    <link rel="stylesheet" href="../stylesheets/datapembeli.css">
    <link rel="stylesheet" href="../stylesheets/tambahproduk.css">
    <title>Masuk Akun</title>
</head>

<body>

    <section class="container">
        <header class="header">
            <figure>
                <img id="logo-icon" src="../assets/images/logo_minimarket.png" alt="Logo minimarket">
            </figure>
            <div class="header-title">
                <h1>Mini Market</h1>
                <p>harga merakyat kualitas pejabat</p>
            </div>
        </header>
        <main class="main">
            <h2>Edit Produk</h2>
            <form id="form-login" action="" method="POST">
                <div class="nama-produk-input input-field">
                    <label for="nama-produk"></label>
                    <input type="text" name="nama-produk" id="nama-produk" value="Fanta Botol 350 Ml" required>
                    <small class="error-message">Nama Produk Tidak Boleh Kosong</small>
                </div>
                <div class="stok-produk-input input-field">
                    <label for="stok-produk"></label>
                    <input type="text" name="stok-produk" id="stok-produk" value="40" required>
                    <small class="error-message">Jumlah Stok Produk Tidak Boleh Kosong</small>
                </div>
                <div class="harga-produk-input input-field">
                    <label for="harga-produk"></label>
                    <input type="number" name="harga-produk" id="harga-produk" value="40000" required>
                    <small class="error-message">Harga Produk Tidak Boleh Kosong</small>
                </div>
                <div class="harga-produk-input input-field">
                    <label for="gambar">Gambar</label> <br>
                    <img src="img/<?= $data['gambar']; ?>" width="40"> <br> <!-- sesuaikan dengan nama gambar pada database -->
                    <input type="file" name="gambar" id="gambar" required>
                    <small class="error-message">Gambar Produk Tidak Boleh Kosong</small>
                </div>
                <div class="submit-button input-field">
                    <button type="submit" name="add-product" id="add-product" onclick="return confirm('yakin data produk sudah benar?');">Perbarui Produk</button>
                </div>
                <div class="submit-button input-field">
                    <a class="tombol-batal" href="daftarbarang.php" onclick="return confirm('yakin batal edit produk?');">Batal</a>
                </div>
            </form>
        </main>
    </section>

</body>

</html>