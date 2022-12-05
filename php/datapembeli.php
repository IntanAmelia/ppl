<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheets/login.css">
    <link rel="stylesheet" href="../stylesheets/datapembeli.css">
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
            <h2>Data Pembeli</h2>
            <form id="form-login" action="checkout.php" method="POST">
                <div class="username-input input-field">
                    <label for="nama"></label>
                    <input type="text" name="nama" id="nama" placeholder="Masukkan Nama Lengkap Anda" required>
                    <small class="error-message">Nama Tidak Boleh Kosong</small>
                </div>
                <div class="phone-number-input input-field">
                    <label for="phone-number"></label>
                    <input type="text" name="phone-number" id="phone-number" placeholder="Masukkan Telepon Anda" required>
                    <small class="error-message">Telepon Tidak Boleh Kosong</small>
                </div>
                <div class="village-input input-field">
                    <label for="village"></label>
                    <input type="text" name="village" id="village" placeholder="Desa/Kelurahan" required>
                    <small class="error-message">Desa/Kelurahan Tidak Boleh Kosong</small>
                </div>
                <div class="RT-input input-field">
                    <label for="RT"></label>
                    <input type="text" name="RT" id="RT" placeholder="RT" required>
                    <small class="error-message">RT Tidak Boleh Kosong</small>
                </div>
                <div class="RW-input input-field">
                    <label for="RW"></label>
                    <input type="text" name="RW" id="RW" placeholder="RW" required>
                    <small class="error-message">RW Tidak Boleh Kosong</small>
                </div>
                <div class="address-input input-field">
                    <label for="address"></label>
                    <input type="text" name="address" id="address" placeholder="Masukkan Detail Alamat Anda" required>
                    <small class="error-message">Alamat Tidak Boleh Kosong</small>
                </div>
                <div class="submit-button input-field">
                    <button type="submit" name="done-chekout" id="done-chekout">checkout barang</button>
                    <br>
                    <button onclick="kembali()" name="cancel" id="done-chekout" style="background-color: red;">Batal</button>
                    <script>
                        function kembali(){
                            document.location.href='keranjang.php';
                        }
                    </script>
                </div>
            </form>
        </main>
    </section>

</body>

</html>