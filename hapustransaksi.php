<?php

include("includes/koneksi.php");

$idtranshapus = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM riwayat_pembelian WHERE id_transaksi='$idtranshapus'");


header('location:daftarriwayattrnsks.php');
 ?>
