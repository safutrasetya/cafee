<?php
  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php"); require_once("includes/staffcheck.php");
  if(isset($_POST['idmenu'])&&isset($_POST['check'])){
    if(isset($_SESSION['menudelcek'])){
      $cekdalamsession = array_column($_SESSION['menudelcek'], "idmenu");
      $varcek = 0;
      foreach ($cekdalamsession as $key=>$idmenu){
        if($idmenu == $_POST['idmenu']){
          $_SESSION['menudelcek'][$key]['cekbox'] = $_POST['check'];
          $varcek = 1;
          break;
        }
      }
      if($varcek==0){
        $count = count($_SESSION['menudelcek']);
        $item_array = array('idmenu'=>$_POST['idmenu'], 'cekbox'=>$_POST['check']);
        $_SESSION['menudelcek'][$count] = $item_array;
      }
    }else{
      $item_array = array('idmenu'=>$_POST['idmenu'], 'cekbox'=>$_POST['check']);
      $_SESSION['menudelcek'][0]=$item_array;
    }
  }else{

  }
  if(isset($_SESSION['menudelcek'])){
    $ceksession = array_column($_SESSION['menudelcek'], "idmenu");
    $nomor =1;
    foreach($ceksession as $key=>$value){
      if($_SESSION['menudelcek'][$key]['cekbox']==1){
        $select = mysqli_query($koneksi, "SELECT * FROM menu where id_menu = '{$value}'");
        foreach($select as $row){
          echo "<p>".$nomor.". ".$row['nama_menu']."</p>";
        }
        $nomor++;
      }
    }
    $varunset = 0;
    $cekdalamsession = array_column($_SESSION['menudelcek'], "idmenu");
    foreach ($cekdalamsession as $key=>$idmenu){
      if($_SESSION['menudelcek'][$key]['cekbox'] == 1){
        $varunset = 1;
        break;
      }
    }
    if($varunset==0){
      unset($_SESSION['menudelcek']);
    }
  }

?>
