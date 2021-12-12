<?php
  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php"); require_once("includes/staffcheck.php");
  if(isset($_POST['idmeja'])&&isset($_POST['check'])){
    if(isset($_SESSION['mejadelcek'])){
      $cekdalamsession = array_column($_SESSION['mejadelcek'], "idmeja");
      $varcek = 0;
      foreach ($cekdalamsession as $key=>$idmeja){
        if($idmeja == $_POST['idmeja']){
          $_SESSION['mejadelcek'][$key]['cekbox'] = $_POST['check'];
          $varcek = 1;
          break;
        }
      }
      if($varcek==0){
        $count = count($_SESSION['mejadelcek']);
        $item_array = array('idmeja'=>$_POST['idmeja'], 'cekbox'=>$_POST['check']);
        $_SESSION['mejadelcek'][$count] = $item_array;
      }
    }else{
      $item_array = array('idmeja'=>$_POST['idmeja'], 'cekbox'=>$_POST['check']);
      $_SESSION['mejadelcek'][0]=$item_array;
    }
  }else{

  }
  if(isset($_SESSION['mejadelcek'])){
    $ceksession = array_column($_SESSION['mejadelcek'], "idmeja");
    $nomor =1;
    foreach($ceksession as $key=>$value){
      if($_SESSION['mejadelcek'][$key]['cekbox']==1){
        $select = mysqli_query($koneksi, "SELECT * FROM meja where id_meja = '{$value}'");
        foreach($select as $row){
          echo "<p>".$nomor.". ".$row['meja']."</p>";
        }
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

?>
