<?php
require_once("includes/koneksi.php");
require_once("includes/logincheck.php");
require_once("includes/admincheck.php");
//include 'functiontambahmeja.php';

  if(isset($_POST['btnUpdate'])){
    $idmeja = $_POST['idmeja'];
    $statusmeja = $_POST['statusmeja'];
    $statusmeja= (int)$statusmeja;
    $query = "UPDATE meja SET reservasi = '{$statusmeja}' WHERE id_meja = '{$idmeja}'";

    if($koneksi->query($query)===TRUE){
      $akibat=$idmeja;
      $nama = $_SESSION['nama'];
      $startdate = new DateTime("now", new DateTimeZone('Asia/Jakarta'));
      $start_date = $startdate->format('Y-m-d H:i:s');
      $history = "INSERT INTO history (pelaku,aksi,akibat,waktu) VALUES ('$nama','Edit Status Meja','$akibat','$start_date')";
      mysqli_query($koneksi, $history);
      // header('Location:daftarriwayattrnsks.php');
      echo "<div id='divAlert' name='divAlert' class='' style='background-color: #ffccd5;'><i class='bi bi-exclamation-circle-fill'></i> Meja $idmeja telah diupdate</div>";
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
