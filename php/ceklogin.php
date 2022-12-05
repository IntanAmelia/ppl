<?php

session_start();

include "koneksi.php";


$username = $_POST["username"];
$password = md5($_POST["password"]);


$query="SELECT * FROM user WHERE user.username='$username' AND user.password='$password'";
$login=mysqli_query($koneksi,$query);

$cek=mysqli_num_rows($login);

if($cek>0){
    $data=mysqli_fetch_assoc($login);
    if($data['level']=="admin"){
        $_SESSION['login']=true;
        $_SESSION['nama']=$data['nama'];
        $_SESSION['username']=$username;
        $_SESSION['level']="admin";

        header("location:menuadmin.php");
    }else if($data['level']=="user"){
        $_SESSION['login']=true;
        $_SESSION['nama']=$data['nama'];
        $_SESSION['id']=$data['USERID'];
        $_SESSION['username']=$username;
        $_SESSION['level']="user";

        header("location:beranda.php");
    }
}else{
	echo"<script>
    alert('Username atau password salah')
    document.location.href='../index.php'
    </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php echo "$data[level]"?>
    <a href="logout.php">logout</a>
</body>
</html>