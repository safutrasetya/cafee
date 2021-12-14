<?php
  if(isset($_POST['btnMenuDel'])){
    if(isset($_SESSION['menudelcek'])){
      $getid = array_column($_SESSION['menudelcek'], "idmenu");
      foreach($getid as $key=>$value){

        $deleteit = mysqli_query($koneksi,"DELETE FROM menu where id_menu = '{$value}'");
        if(!$deleteit){
          die("hmmm... Menu tidak ditemukan".mysqli_error($koneksi));
        }
      }
      unset($_SESSION['menudelcek']);
      echo "
      <div id='divAlert2' name='divAlert' class='my-3 p-2' role='alert' style='background-color: #e6dd9c;'>
      <i class='bi bi-exclamation-circle-fill'></i> Menu berhasil dihapus! merefresh dalam 3 detik...
      </div>";
      echo "<script>$(document).ready(function(){
                        setTimeout(function() {
                window.location.replace('daftarmenuhapus.php');
              }, 3500);
              });</script>";
    }else{
      echo "<div id='divAlert2' name='divAlert' class='my-3 p-2' role='alert' style='background-color: #e6dd9c;'>
      <i class='bi bi-exclamation-circle-fill'></i> Pilih setidaknya satu Menu.
      </div>";
    }
    unset($_POST['btnMenuDel']);
  }else{}


?>
