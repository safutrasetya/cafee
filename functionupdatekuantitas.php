<?php
require_once('includes/koneksi.php');
if(isset($_POST['btnUpdate']) && isset($_SESSION['keranjang'])){
  // echo "<div>--------------</div>";
  // print_r($_POST['updatepesanan']);
  // echo "<div>--------------</div>";
  // print_r($_SESSION['keranjang']);
  // echo "<div>--------------</div>";
  $arrqupdate = array_column($_POST['updatepesanan'], 'kuantitasupdate');
  $arrqupdate = array_map('intval',$arrqupdate);
  $arridupdate = array_column($_POST['updatepesanan'], 'pesananidupdate');
  $arridsession = array_column($_SESSION['keranjang'], 'menu_id');

  foreach($arridupdate as $keyupdt=>$valuepdt){
    foreach($arridsession as $keysess=>$valueid){
      if($valueid == $valuepdt){
        // echo "<div>berhasil</div>";
        $_SESSION['keranjang'][$keysess]['menu_quantity'] = $_POST['updatepesanan'][$keyupdt] ['kuantitasupdate'];
        // var_dump(array_column($_SESSION['keranjang'],'menu_quantity'));
        // echo "<div>--------------</div>";
      }else{
        // echo "<div>KESALAHAN PENCOCOKAN ID MENU</div>";
        // var_dump(array_column($_SESSION['keranjang'],'menu_quantity'));
        // echo "<div>--------------</div>";
      }
      // echo "<div>LOOPING...</div>";
      // echo "<div>--------------</div>";
    }
  }
  // echo "<div>SELESAI! BERIKUT ARRAY SESSION SEKARANG</div>";
  // var_dump(array_column($_SESSION['keranjang'],'menu_quantity'));
  // echo "<div>--------------</div>";
  // var_dump(array_column($_POST['updatepesanan'], 'kuantitasupdate'));
  // echo "<div>--------------</div>";
  // var_dump(array_column($_SESSION['keranjang'], 'menu_id'));
  // echo "<div>--------------</div>";
  // var_dump(array_column($_POST['updatepesanan'], 'pesananidupdate'));
  // echo "<div>--------------</div>";
  // print_r($_POST['updatepesanan']);
  // echo "<div>--------------</div>";
  // print_r($_SESSION['keranjang']);
  // echo "<div>array_valued vvvv</div>";
  // $_SESSION['keranjang'] = array_values($_SESSION['keranjang']);
  // echo "<div>--------------</div>";
  // print_r($_SESSION['keranjang']);
    echo "<div id='divAlert' name='divAlert' class='alert alert-success m-2' role='alert'>Total harga telah diupdate! Silahkan lihat struk pembelian.</div>";

  }

?>
