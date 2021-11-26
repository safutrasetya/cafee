<?php

require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");

$id_menu = $_GET['id'];
$sql ="DELETE FROM menu WHERE id_menu='$id_menu'";
$result=mysqli_query($koneksi,$sql);


if(!$result){
  die("Query gagal".mysqli_error($koneksi));
}

header('location:daftarmenu.php');
 ?>
