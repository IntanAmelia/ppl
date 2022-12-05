<?php
include"koneksi.php";
global $koneksi;

$nama=$_POST["name"];
$username=$_POST["username"];
$password=md5($_POST["password"]);

$sql = "SELECT USERID FROM user ORDER BY USERID DESC LIMIT 1;";
$hasil = mysqli_query($koneksi, $sql);

$ambilid=mysqli_fetch_array($hasil);
$id = $ambilid["USERID"];

$sub_id=intval(substr($id, 1));

if(mysqli_num_rows($hasil)==0){
    $hasilid ="u1";
}else{
    $sub_id +=1;
    $hasilid = "u{$sub_id}";
}

$query="INSERT INTO user (USERID, NAMA, USERNAME, PASSWORD, level) VALUES ('$hasilid', '$nama', '$username', '$password', 'user');";
$reg=mysqli_query($koneksi, $query);


if($reg){
    echo"<script>
        alert('Anda berhasil mendaftar, silahkan login')
        document.location.href='../index.php'
    </script>";
}else{
    echo"<script>
        alert('Anda gagal mendaftar')
        document.location.href='../index.php'
    </script>";
}
?>