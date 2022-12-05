<?php
require "koneksi.php";
session_start();
global $koneksi;
$id=$_SESSION['id'];

echo"<script>
    var konfirmasi = confirm('Apakah anda yakin untuk checkout semua barang di keranjang?')
    if(konfirmasi){
        var lanjut = true;
    }else{
        document.location.href='datapembeli.php'
    }
    </script>";

$nama=$_POST['nama'];
$nohp=$_POST['phone-number'];
$kelurahan=$_POST['village'];
$rt=$_POST['RT'];
$rw=$_POST['RW'];
$detail=$_POST['address'];

$query="SELECT * FROM user_detail WHERE USERID='$id';";
$data=mysqli_query($koneksi,$query);

$hasil=mysqli_num_rows($data);
if($hasil==1){
    $query1 = "UPDATE user_detail SET NO_HP=$nohp, KELURAHAN='$kelurahan', RT='$rt', RW='$rw', DETAIL_ALAMAT = '$detail' WHERE USERID='$id';";
}else{
    $query1 = "INSERT INTO user_detail(USERID,NO_HP,KELURAHAN,RT,RW,DETAIL_ALAMAT) VALUES('$id',$nohp, '$kelurahan', '$rt', '$rw','$detail');";
}

$query3="SELECT detail_pesanan.* FROM pesanan INNER JOIN detail_pesanan USING(IDPESANAN) WHERE pesanan.USERID='$id' AND pesanan.STATUS='keranjang';";
$kurangistok=mysqli_query($koneksi,$query3);

while($hasilkurangistok=mysqli_fetch_array($kurangistok)){
    $idbarangnya=$hasilkurangistok["IDBARANG"];
    $query4="SELECT * FROM product WHERE IDBARANG='$idbarangnya';";
    $hasilquery4=mysqli_query($koneksi,$query4);
    $dataquery4=mysqli_fetch_array($hasilquery4);
    $datastok=$dataquery4['STOK'];
    $datajumlah=$hasilkurangistok["JUMLAH_BARANG"];
    $stokakhir=$datastok-$datajumlah;
    $query5="UPDATE product SET STOK=$stokakhir WHERE IDBARANG='$idbarangnya';";
    $hasilquery5=mysqli_query($koneksi,$query5);
}

$query2="UPDATE `pesanan` SET `STATUS` = 'dipesan' WHERE `pesanan`.`USERID` = '$id' && `STATUS`='keranjang';";

$edit = mysqli_query($koneksi, $query1);
$edit2 = mysqli_query($koneksi, $query2);

if($edit && $edit2){
    echo"<script>
        alert('Berhasil melakukan checkout')
        document.location.href='statuspesanan.php'
    </script>";
}else{
    echo"<script>
        alert('Gagal melakukan checkout')
        document.location.href='datapembeli.php'
    </script>";
}

return mysqli_affected_rows($koneksi);



?>