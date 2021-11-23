<?php

include("includes/koneksi.php");

  $id = $_POST['id'];
  $gambar = $_POST ['gambar'];
  $username = $_POST['username'];
  $nama = $_POST['nama'];
  $email = $_POST['email'];
  $No_Hp = $_POST['No_Hp'];
  $password = $_POST['password'];

  if($koneksi){
    $sql="UPDATE akun SET gambar='$gambar',username='$username',nama='$nama',email='$email',No_Hp='$No_Hp',password='$password' WHERE id='$id'";
      mysqli_query($koneksi,$sql);
      echo "
        <script>
        alert('Akun berhasil diperbarui!');
        document.location.href = 'daftarakun.php';
        </script>
        ";
    }elseif($koneksi->connect_error){
      echo"
        <script>
        alert('Akun gagal ditambahkan!');
        document.location.href = 'editprofil.php';
        </script>
        ";
    }
?>
