<?php 
include 'koneksi.php';
$nama = $_GET['nama'];
mysqli_query($koneksi,"DELETE FROM user WHERE nama like '$nama'")or die(mysqli_error());
 
header("location:detaildatapembeli.php?pesan=hapus");
?>