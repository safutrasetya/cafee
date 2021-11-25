<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
  if(isset($_POST['btnUpdt'])){
    $idtrnsks = $_POST['idtrnsks'];
    $stattrnsks = $_POST['statustrnsks'];
    $stattrnsks = (int)$stattrnsks;
    $query = "UPDATE riwayat_pembelian SET status_bayar = '{$stattrnsks}' WHERE id_transaksi = '{$idtrnsks}'";

    if($koneksi->query($query)===TRUE){
      // header('Location:daftarriwayattrnsks.php');
      echo "<div id='divAlert' name='divAlert' class='alert alert-success' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Pesanan $idtrnsks telah diupdate</div>";
      ///ATUR INIIIII BINGUN W vvvvvvvvvv
      echo "<script>$(document).ready(function(){
    //Check if the current URL contains '#'
    if(document.URL.indexOf('#')==-1){
        // Set the URL to whatever it was plus '#'.
        url = document.URL+'#';
        location = '#';

        //Reload the page
        location.reload(true);
    }
});</script>";
    }else{
      header('Location:halerror.php');
    }
  }

 ?>
