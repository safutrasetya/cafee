<?php
  require_once('includes/koneksi.php');
  if(isset($_POST['btnUpdate']) && isset($_SESSION['keranjang'])){

    $varstoi = array_column($_POST['updatepesanan'], 'kuantitasupdate');
    $varstoi = array_map('intval',$varstoi);

    foreach($varstoi as $key=>$value){

      if ($_SESSION['keranjang'][$key]['menu_id']==$_POST['updatepesanan'][$key]['pesananidupdate']){
        $_SESSION['keranjang'][$key]['menu_quantity']=$value;
      }else{
        echo "woah somethings not right..\n";
      }
      echo "<div>looped</div>";
      print_r(array_column($_SESSION['keranjang'],'menu_quantity'));
    }
    echo "<div class='alert alert-success my-2' role='alert'>Total harga telah diupdate! Silahkan lihat struk pembelian.</div>";
    header('Location:halpesanan.php');
  }

?>
