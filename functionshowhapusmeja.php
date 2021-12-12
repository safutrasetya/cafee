<?php
require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php"); require_once("includes/staffcheck.php");
if(isset($_SESSION['mejadelcek'])){
  $ceksession = array_column($_SESSION['mejadelcek'], "idmeja");
  $nomor =1;
  foreach($ceksession as $key=>$value){
    if($_SESSION['mejadelcek'][$key]['cekbox']==1){
      $select = mysqli_query($koneksi, "SELECT * FROM meja where id_meja = '{$value}'");
      foreach($select as $row){
        echo "<p>".$nomor.". ".$row['id_meja']."</p>";      }
      $nomor++;
    }
  }
  $varunset = 0;
  $cekdalamsession = array_column($_SESSION['mejadelcek'], "idmeja");
  foreach ($cekdalamsession as $key=>$idmeja){
    if($_SESSION['mejadelcek'][$key]['cekbox'] == 1){
      $varunset = 1;
      break;
    }
  }
  if($varunset==0){
    unset($_SESSION['mejadelcek']);
  }
}
if(!isset($_SESSION['mejadelcek'])){
  echo "
  <i class='bi bi-exclamation-circle-fill'></i>
  Tidak ada meja yang dipilih.
  ";
}


?>
