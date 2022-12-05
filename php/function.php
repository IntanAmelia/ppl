<?php
session_start();
function keranjang($data){
    global $koneksi;
    $userid=$_SESSION['id'];
    $idbarang=$data["id"];
    $jumlah=$data["jumlah"];

    $query = "SELECT * FROM pesanan ORDER BY IDPESANAN DESC LIMIT 1;";
    $data = mysqli_query($koneksi, $query);

    $ambilid=mysqli_fetch_array($data);
    $id = $ambilid["IDPESANAN"];

    $sub_id=intval(substr($id, 1));

    if(mysqli_num_rows($data)==0){
        $hasilid ="p1";
    }else{
        $sub_id +=1;
        $hasilid = "p{$sub_id}";
    }

    $querycekstok="SELECT * FROM product WHERE IDBARANG='$idbarang';";
    $datastok=mysqli_query($koneksi,$querycekstok);

    $ambilstok=mysqli_fetch_array($datastok);

    $stok=$ambilstok['STOK'];

    if($jumlah>$stok){
        echo"<script>
            alert('Gagal, stok tidak mencukupi')
            document.location.href='beranda.php'
        </script>";
    }else{
        $queryadd1= "INSERT INTO pesanan (IDPESANAN, USERID,STATUS) VALUES ('$hasilid','$userid','keranjang');";
        $add1=mysqli_query($koneksi, $queryadd1);
    
        $queryadd2= "INSERT INTO detail_pesanan (IDPESANAN,IDBARANG,JUMLAH_BARANG) VALUES('$hasilid','$idbarang',$jumlah);";
        $add2=mysqli_query($koneksi, $queryadd2);
    
        if($add1 && $add2){
            echo"<script>
                alert('berhasil memasukkan ke keranjang')
                document.location.href='beranda.php'
            </script>";
        }else{
            echo"<script>
                alert('gagal memasukkan ke keranjang')
                document.location.href='beranda.php'
            </script>";
        }
    }


    return mysqli_affected_rows($koneksi);
    
}

function ubahDataKeranjang($data){
    global $koneksi;

    $id=$data["id"];
    $jumlah=$data["jumlah"];
    
    $query = "UPDATE detail_pesanan SET JUMLAH_BARANG='$jumlah' WHERE IDPESANAN='$id'";
    $edit = mysqli_query($koneksi, $query);


    if($edit){
        echo"<script>
            alert('Data Berhasil di Update')
            document.location.href='keranjang.php'
        </script>";
    }else{
        echo"<script>
            alert('Data Gagal di Update')
            document.location.href='keranjang.php'
        </script>";
    }

    return mysqli_affected_rows($koneksi);

}

function hapusDataKeranjang($data){
    global $koneksi;

    $id=$data["id"];

    $query = "DELETE FROM detail_pesanan WHERE detail_pesanan.IDPESANAN = '$id'";
    $delete = mysqli_query($koneksi, $query);
    $query2 = "DELETE FROM pesanan WHERE pesanan.IDPESANAN = '$id'";
    $delete2 = mysqli_query($koneksi, $query2);

    if($delete && $delete2){
        echo"<script>
            alert('Data Berhasil dihapus')
            document.location.href='keranjang.php'
        </script>";
    }else{
        echo"<script>
            alert('Data Gagal dihapus')
            document.location.href='keranjang.php'
        </script>";
    }

    return mysqli_affected_rows($koneksi);
}

function ubahDataBarang($data){
    global $koneksi;

    $id=$data["id"];
    $nama=$data["nama"];
    $stok=$data["stok"];
    $harga=$data["harga"];
    
    $query = "UPDATE product SET NAMA_BARANG='$nama', STOK='$stok', HARGA='$harga' WHERE IDBARANG='$id'";
    $edit = mysqli_query($koneksi, $query);


    if($edit){
        echo"<script>
            alert('Data Berhasil di Update')
            document.location.href='daftarbarang.php'
        </script>";
    }else{
        echo"<script>
            alert('Data Gagal di Update')
            document.location.href='daftarbarang.php'
        </script>";
    }

    return mysqli_affected_rows($koneksi);

}

function hapusDataBarang($data){
    global $koneksi;

    $id=$data["id"];
    $query = "DELETE FROM product WHERE IDBARANG = '$id'";
    $delete = mysqli_query($koneksi, $query);

    if($delete){
        echo"<script>
            alert('Data Berhasil dihapus')
            document.location.href='daftarbarang.php'
        </script>";
    }else{
        echo"<script>
            alert('Data Gagal dihapus')
            document.location.href='daftarbarang.php'
        </script>";
    }

    return mysqli_affected_rows($koneksi);
}

function tambahDataBarang($data){
    global $koneksi;
    require "koneksi.php";
    $nama=$data["nama-produk"];
    $stok=$data["stok-produk"];
    $harga=$data["harga-produk"];

    $sql = "SELECT IDBARANG FROM product ORDER BY IDBARANG DESC LIMIT 1;";
    $hasil = mysqli_query($koneksi, $sql);

    $ambilid=mysqli_fetch_array($hasil);
    $id = $ambilid["IDBARANG"];

    $sub_id=intval(substr($id, 1));

    if(mysqli_num_rows($hasil)==0){
        $hasilid ="b1";
    }else{
        $sub_id +=1;
        $hasilid = "b{$sub_id}";
    }

    $file_size = $_FILES['gambar-produk']['size'];
    $file_type = $_FILES['gambar-produk']['type'];
    if ($file_size < 2048000 and ($file_type =='image/jpeg' or $file_type == 'image/png'))
    {
        $image   = addslashes(file_get_contents($_FILES['gambar-produk']['tmp_name']));
        $query = "INSERT INTO product(IDBARANG,NAMA_BARANG,STOK,HARGA,TIPEGAMBAR,GAMBAR) VALUES ('$hasilid', '$nama', $stok, $harga, '$file_type', '$image');";
        $tambah = mysqli_query($koneksi,$query);
        if($tambah){
            echo"<script>
                alert('Product Berhasil ditambahkan')
                document.location.href='daftarbarang.php'
            </script>";
        }else{
            echo"<script>
                alert('Product Gagal di Update')
                document.location.href='daftarbarang.php'
            </script>";
        }
    }else{
        echo"<script>
            alert('gambar tidak sesuai')
            document.location.href='tambahproduk.php'
        </script>";
    }


    return mysqli_affected_rows($koneksi);

}

function ubahstatus($data){
    global $koneksi;

    $id=$data["id"];
    $status=$data["status"];
    
    $query = "UPDATE pesanan SET `STATUS`='$status' WHERE IDPESANAN='$id';";
    $edit = mysqli_query($koneksi, $query);


    if($edit){
        echo"<script>
            alert('Data Berhasil di Update')
            document.location.href='daftarpesanan.php'
        </script>";
    }else{
        echo"<script>
            alert('Data Gagal di Update')
            document.location.href='daftarpesanan.php'
        </script>";
    }

    return mysqli_affected_rows($koneksi);

}
?>