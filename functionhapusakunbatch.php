<?php
  if(isset($_POST['btnAkunDel'])){
    if(isset($_SESSION['akundelcek'])){
      $getid = array_column($_SESSION['akundelcek'], "idakun");
      foreach($getid as $key=>$value){

        $deleteit = mysqli_query($koneksi,"DELETE FROM akun where id = '{$value}'");
        if(!$deleteit){
          die("hmmm... Akun tidak ditemukan".mysqli_error($koneksi));
        }
      }
      unset($_SESSION['akundelcek']);
      echo "
      <div id='divAlert2' name='divAlert' class='my-3 p-2' role='alert' style='background-color: #e6dd9c;'>
      <i class='bi bi-exclamation-circle-fill'></i> Akun berhasil dihapus! merefresh dalam 3 detik...
      </div>";
      echo "<script>$(document).ready(function(){
                        setTimeout(function() {
                window.location.replace('daftarakunhapus.php');
              }, 3000);
              });</script>";
    }else{
        echo "<div id='divAlert2' name='divAlert' class='my-3 p-2' role='alert' style='background-color: #e6dd9c;'>
        <i class='bi bi-exclamation-circle-fill'></i> Pilih setidaknya satu akun.
        </div>";

    }
    unset($_POST['btnAkunDel']);

  }else{}



?>
