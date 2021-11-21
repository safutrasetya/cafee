<?php
require_once('includes/koneksi.php');
if(isset($_GET['btnUpdate']) && isset($_SESSION['keranjang'])){
  // echo "<div>--------------</div>";
  // print_r($_GET['updatepesanan']);
  // echo "<div>--------------</div>";
  // print_r($_SESSION['keranjang']);
  // echo "<div>--------------</div>";
  $arrqupdate = array_column($_GET['updatepesanan'], 'kuantitasupdate');
  $arrqupdate = array_map('intval',$arrqupdate);
  $arridupdate = array_column($_GET['updatepesanan'], 'pesananidupdate');
  $arridsession = array_column($_SESSION['keranjang'], 'menu_id');

  foreach($arridupdate as $keyupdt=>$valuepdt){
    foreach($arridsession as $keysess=>$valueid){
      if($valueid == $valuepdt){
        $_SESSION['keranjang'][$keysess]['menu_quantity'] = $_GET['updatepesanan'][$keyupdt] ['kuantitasupdate'];
      }else{
      }
    }
  }

    echo "<div id='divAlert' name='divAlert' class='alert alert-success m-2' role='alert'>Total harga telah diupdate! Silahkan lihat struk pembelian.</div>";

  }

?>
