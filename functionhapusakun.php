<?php

include("includes/koneksi.php");

$id = $_GET['id'];
$query ="DELETE FROM akun WHERE id='$id'";
$result=mysqli_query($koneksi,$query);


if(!$result){
  die("Query gagal".mysqli_error($koneksi));
}

header('location:daftarakun.php');
 ?>
