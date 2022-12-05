<?php
include('koneksi.php');
if(isset($_GET['IDBARANG'])) 
{
    $query = mysqli_query($koneksi,"select * from product where IDBARANG='".$_GET['IDBARANG']."'");
    $row = mysqli_fetch_array($query);
    header("Content-type: " . $row["TIPEGAMBAR"]);
    echo $row["GAMBAR"];
}
else
{
    header('location:../beranda.php');
}
?>