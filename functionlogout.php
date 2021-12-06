<?php
  require_once('includes/koneksi.php');
session_start();

if (isset($_SESSION['keranjang'])){
  unset($_SESSION['keranjang']);
  $updtstatmeja = "UPDATE meja SET reservasi = 0 WHERE id_meja='{$_SESSION['meja']}'";
  if($koneksi->query($updtstatmeja) === TRUE){
    $akibat = $_SESSION['meja'];
    $nama2 = $_SESSION['meja'];
    $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
    $start_date = $startdate->format('Y-m-d H:i:s');
    $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama2','Logout Meja','$akibat','$start_date')";
    mysqli_query($koneksi, $history);
  }else{
    echo "Error: ".$updtstatmeja."<br>".$koneksi->error;
  }
}elseif(isset($_SESSION['nama'])){
  $akibat = $_SESSION['nama'];
  $nama2 = $_SESSION['nama'];
  $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
  $start_date = $startdate->format('Y-m-d H:i:s');
  $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama2','Logout Staff/Admin','$akibat','$start_date')";
  mysqli_query($koneksi, $history);
}

if(session_destroy()){
    header("Location:login.php");
}

?>
