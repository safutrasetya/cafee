<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
  if(isset($_POST['btnDel'])){
    $idtrnsks = $_POST['idhapustrnsks'];
    $query = "DELETE FROM riwayat_pembelian WHERE id_transaksi = '{$idtrnsks}'";

    if($koneksi->query($query)===TRUE){
      // header('Location:daftarriwayattrnsks.php');
      echo "<div id='divAlertHapus' name='divAlertHapus' class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Pesanan $idtrnsks telah dihapus</div>";
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
