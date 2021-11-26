<?php

require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");

$id_menu = $_GET['id'];
$sql ="DELETE FROM meja WHERE id_meja='$id_meja'";
$result=mysqli_query($koneksi,$sql);


if(!$result){
  die("Query gagal".mysqli_error($koneksi));
}

header('location:daftarmeja.php');
 ?>
