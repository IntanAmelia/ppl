<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../stylesheets/index.css">
    <link rel="stylesheet" href="../stylesheets/produkadmin.css">
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
                    <a href="..index.php">Beranda</a>
                </li>
                <li>
                    <a href="menuadmin.php">Menu Admin</a>
                </li>
                <li>
                    <a href="tentangkami.php">Kontak Kami</a>
                </li>
                <li>
                    <a href="logout.php">Keluar</a>
                </li>
            </ul>
        </navbar>
    </header>
    <main class="main">
        <h1>Daftar Produk</h1>
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
                        Stok
                    </th>
                    <th>
                        Harga
                    </th>
                    <th>
                        Aksi
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <img class="action" src="../assets/images/fanta.jpg" alt="fanta">
                    </td>
                    <td>
                        Minuman Fanta Merah Botol 350 ml
                    </td>
                    <td>
                        45
                    </td>
                    <td>
                        5.000
                    </td>
                    <td>
                        <a href="">
                            <img class="action" src="../assets/icons/edit.png" alt="Edit">
                        </a>
                        <a href="">
                            <img class="action" src="../assets/icons/hapus.png" alt="Hapus">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img class="action" src="../assets/images/rokok.jpg" alt="rokok">
                    </td>

                    <td>
                        Rokok Sampoerna Mild 12 Batang
                    </td>
                    <td>
                        45
                    </td>
                    <td>
                        25.000
                    </td>
                    <td>
                        <a href="">
                            <img class="action" src="../assets/icons/edit.png" alt="Edit">
                        </a>
                        <a href="">
                            <img class="action" src="../assets/icons/hapus.png" alt="Hapus">
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <img class="action" src="../assets/images/beras.jpg" alt="beras">
                    </td>

                    <td>
                        Beras Slyp Super 10kg
                    </td>
                    <td>
                        45
                    </td>
                    <td>
                        55.000
                    </td>
                    <td>
                        <a href="">
                            <img class="action" src="../assets/icons/edit.png" alt="Edit">
                        </a>
                        <a href="">
                            <img class="action" src="../assets/icons/hapus.png" alt="Hapus">
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
        <div class="add-to-chart checkout-button">
            <a href="datapembeli.php">Checkout</a>
        </div>
    </main>
</body>

</html>