<?php
  if(isset($_POST['btnMejaDel'])){
    if(isset($_SESSION['mejadelcek'])){
      $getid = array_column($_SESSION['mejadelcek'], "idmeja");
      foreach($getid as $key=>$value){

        $deleteit = mysqli_query($koneksi,"DELETE FROM meja where id_meja = '{$value}'");
        if(!$deleteit){
          die("hmmm... Meja tidak ditemukan".mysqli_error($koneksi));
        }
      }
      unset($_SESSION['mejadelcek']);
      echo "
      <div id='divAlert2' name='divAlert' class='my-3 p-2' role='alert' style='background-color: #e6dd9c;'>
      <i class='bi bi-exclamation-circle-fill'></i> Meja berhasil dihapus! merefresh dalam 3 detik...
      </div>";
      echo "<script>$(document).ready(function(){
                        setTimeout(function() {
                window.location.replace('daftarmejahapus.php');
              }, 3000);
              });</script>";
    }else{
        echo "<div id='divAlert2' name='divAlert' class='my-3 p-2' role='alert' style='background-color: #e6dd9c;'>
        <i class='bi bi-exclamation-circle-fill'></i> Pilih setidaknya satu meja.
        </div>";

    }
    unset($_POST['btnMejaDel']);

  }else{}



?>
