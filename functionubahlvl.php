<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
  if(isset($_POST['btnUpdtLvl'])){
    $idakun = $_POST['idupdtlevel'];
    $levelakun = $_POST['levelakun'];
    $levelakun = (int)$levelakun;
    $query = "UPDATE akun SET level = '{$levelakun}' WHERE id= '{$idakun}'";

    if($koneksi->query($query)===TRUE){
      // header('Location:daftarriwayattrnsks.php');
      echo "<div id='divAlert' name='divAlert' class='alert alert-success' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Level akun $idakun telah diupdate</div>";
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
