<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheets/login.css">
    <link rel="stylesheet" href="../stylesheets/datapembeli.css">
    <link rel="stylesheet" href="../stylesheets/tambahproduk.css">
    <link rel="stylesheet" href="../stylesheets/editpesanan.css">
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
            <h2>Edit Pesanan</h2>
            <form id="form-login" action="" method="POST">
                <div class="username-input input-field">
                    <label for="username"></label>
                    <input type="text" name="username" id="username" value="Sani" required>
                    <small class="error-message">Nama Pembeli Tidak Boleh Kosong</small>
                </div>
                <div class="nama-produk-input input-field">
                    <label for="nama-produk"></label>
                    <input type="text" name="nama-produk" id="nama-produk" value="Fanta Botol 350 Ml" required>
                    <small class="error-message">Nama Produk Tidak Boleh Kosong</small>
                </div>
                <div class="jumlah-produk-input input-field">
                    <label for="jumlah-produk"></label>
                    <input type="number" name="jumlah-produk" id="jumlah-produk" value="1" required>
                    <small class="error-message">Jumlah Produk Tidak Boleh Kosong</small>
                </div>
                <div class="status-produk-input input-field">
                    <label for="status-produk"></label>
                    <input type="text" name="status-produk" id="status-produk" value="belum diantar" required>
                    <small class="error-message">Status Produk Tidak Boleh Kosong</small>
                </div>
                <div class="submit-button input-field">
                    <button type="submit" name="add-product" id="add-product" onclick="return confirm('yakin data produk sudah benar?');">Perbarui Pesanan</button>
                </div>
                <div class="submit-button input-field">
                    <a class="tombol-batal" href="daftarbarang.php" onclick="return confirm('yakin batal edit produk?');">Batal</a>
                </div>
            </form>
        </main>
    </section>

</body>

</html>