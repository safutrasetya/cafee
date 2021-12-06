<?php

require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");

$id = $_GET['id'];
$query ="DELETE FROM akun WHERE id='$id'";
$result=mysqli_query($koneksi,$query);


if(!$result){
  die("Query gagal".mysqli_error($koneksi));
}
$akibat=$id;
$nama2 = $_SESSION['nama'];
$startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
$start_date = $startdate->format('Y-m-d H:i:s');
$history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama2','Hapus akun','$akibat','$start_date')";
mysqli_query($koneksi, $history);
header('location:daftarakun.php');
 ?>
