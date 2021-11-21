<?php
  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");
  if(isset($_GET['btnUpdt'])){
    $idtrnsks = $_GET['idtrnsks'];
    $stattrnsks = $_GET['statustrnsks'];
    $stattrnsks = (int)$stattrnsks;
    $query = "UPDATE riwayat_pembelian SET status_bayar = '{$stattrnsks}' WHERE id_transaksi = '{$idtrnsks}'";

    if($koneksi->query($query)===TRUE){
      // header('Location:daftarriwayattrnsks.php');
      echo "<div id='divAlert' name='divAlert' class='alert alert-success' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Pesanan $idtrnsks telah diupdate</div>";
      echo "<script>window.location = 'daftarriwayattrnsks.php</script>";
    }else{
      header('Location:halerror.php');
    }
  }

 ?>
