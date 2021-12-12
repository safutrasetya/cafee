<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php"); require_once("includes/staffcheck.php");
if(isset($_SESSION['akundelcek'])){
  $ceksession = array_column($_SESSION['akundelcek'], "idakun");
  $nomor =1;
  foreach($ceksession as $key=>$value){
    if($_SESSION['akundelcek'][$key]['cekbox']==1){
      $select = mysqli_query($koneksi, "SELECT * FROM akun where id = '{$value}'");
      foreach($select as $row){
        echo "<p>".$nomor.". ".$row['nama']."</p>";      }
      $nomor++;
    }
  }
  $varunset = 0;
  $cekdalamsession = array_column($_SESSION['akundelcek'], "idakun");
  foreach ($cekdalamsession as $key=>$idakun){
    if($_SESSION['akundelcek'][$key]['cekbox'] == 1){
      $varunset = 1;
      break;
    }
  }
  if($varunset==0){
    unset($_SESSION['akundelcek']);
  }
}
if(!isset($_SESSION['akundelcek'])){
  echo "
  <i class='bi bi-exclamation-circle-fill'></i>
  Tidak ada akun yang dipilih.
  ";
}


?>
