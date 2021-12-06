<?php

  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");

  $id_menu = $_GET['id'];
  $sql ="DELETE FROM menu WHERE id_menu='$id_menu'";
  $result=mysqli_query($koneksi,$sql);


  if(!$result){
    die("Query gagal".mysqli_error($koneksi));
  }
  $akibat=$id_menu;
  $nama2 = $_SESSION['nama'];
  $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
  $start_date = $startdate->format('Y-m-d H:i:s');
  $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama2','Hapus Menu','id menu $akibat','$start_date')";
  mysqli_query($koneksi, $history);
  echo "
  <script>
  alert('Menu telah dihapus.');
  document.location.href = 'daftarmenu.php';
  </script>
  ";
 ?>
