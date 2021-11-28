<?php

require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");

$gambar = $_POST['gambar'];
$ketersidiaan = $_POST['ketersidiaan'];
$nama_menu = $_POST['nama_menu'];
$info_menu = $_POST['info_menu'];
$harga = $_POST['harga'];
$kategori = $_POST['kategori'];


$query = "INSERT INTO menu (gambar,ketersidiaan,nama_menu,info_menu,harga,kategori) VALUES
          ('$gambar','$nama_menu','$ketersidiaan','$info_menu','$harga','$kategori')";

$hasil = mysqli_query($koneksi,$query);

if($hasil)
{
  echo "
    <script>
    alert('Menu berhasil ditambahkan!');
    document.location.href = 'daftarmenu.php';
    </script>
    ";
}else{
  echo"
    <script>
    alert('menu gagal ditambahkan!');
    document.location.href = 'tambahmenu.php';
    </script>
    ";
}

 ?>
