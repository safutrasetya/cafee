<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
  if(isset($_POST['btnDelRsrvs'])){
    $idrsrvs = $_POST['idhapusrsrvs'];
    $query = "DELETE FROM mejareservasi WHERE id_reservasi = '{$idrsrvs}'";

    if($koneksi->query($query)===TRUE){
      $akibat=$idrsrvs;
      $nama2 = $_SESSION['nama'];
      $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
      $start_date = $startdate->format('Y-m-d H:i:s');
      $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama2','Hapus Reservasi','$akibat','$start_date')";
      mysqli_query($koneksi, $history);
      // header('Location:daftarriwayatrsrvs.php');
      echo "<div id='divAlertHapus' name='divAlertHapus' class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Reservasi $idrsrvs telah dihapus</div>";
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
