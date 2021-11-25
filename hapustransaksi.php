<?php

include("includes/koneksi.php");

$idtranshapus = $_GET['id'];

$sql=mysqli_query($koneksi,"DELETE FROM riwayat_pembelian WHERE id_transaksi='$idtranshapus'");
if (!$sql){
  echo "Query gagal";
}

header('location:daftarriwayattrnsks.php');
 ?>
