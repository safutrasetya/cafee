<?php

include("includes/koneksi.php");

$gambar = $_POST["gambar"];
$level = $_POST["level"];
$username = $_POST["username"];
$nama = $_POST["nama"];
$email = $_POST["email"];
$NoHp = $_POST["No_Hp"];
$password = $_POST["password"];

$query = "INSERT INTO akun (gambar,username,nama,email,No_Hp,password,level) VALUES
          ('$gambar','$username','$nama','$email','$NoHp','$password','$level')";

$hasil = mysqli_query($koneksi,$query);

if($hasil)
{
  echo "
    <script>
    alert('Akun berhasil ditambahkan!');
    document.location.href = 'daftarakun.php';
    </script>
    ";
}else{
  echo"
    <script>
    alert('Akun gagal ditambahkan!');
    document.location.href = 'tambahakun.php';
    </script>
    ";
}



 ?>
