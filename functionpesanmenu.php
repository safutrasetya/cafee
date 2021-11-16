<?php
if(isset($_POST['addMakanan'])){
  // print_r($_POST['pesanan_baru']);
  if(isset($_SESSION['keranjang'])){

    $item_array_id = array_column($_SESSION['keranjang'],"menu_id");

    if(in_array($_POST['id_pesanan_baru'],$item_array_id)){

      echo "<div class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Pesanan tersebut sudah ada di keranjang! Tap <a href='halpesanan.php'>disini</a> untuk mengatur banyak pesanan.</div>";
      // print_r($_SESSION['keranjang']);
      echo "<script>window.location = 'halamanmakanan.php</script>";
      echo "<br>";
      // $vartemp=array_column($_SESSION['keranjang'],'menu_id');
      // while($newvar = current($vartemp)){
        // echo key($vartemp). " ";
        // next($vartemp);
      // }
    }else{

      $count=count($_SESSION['keranjang']);
      $item_array = array('menu_id'=>$_POST['id_pesanan_baru'], 'menu_quantity'=>1);
      $_SESSION['keranjang'][$count] = $item_array;
      echo "<div class='alert alert-info' role='alert'><i class='bi bi-check-lg'></i> Pesanan dimasukkan ke keranjang!</div>";
      // print_r($_SESSION['keranjang']);
      echo "<script>window.location = 'halamanmakanan.php</script>";
      // print_r(key(array_column($_SESSION['keranjang'],'menu_id')));
    }
  }else{

    $item_array = array('menu_id'=>$_POST['id_pesanan_baru'], 'menu_quantity'=>1);
    $_SESSION['keranjang'][0]=$item_array;
    // print_r($_SESSION['keranjang']);
    // print_r(key(array_column($_SESSION['keranjang'],'menu_id')));
    echo "<div class='alert alert-info' role='alert'><i class='bi bi-check-lg'></i> Pesanan dimasukkan ke keranjang!</div>";
    echo "<script>window.location = 'halamanmakanan.php</script>";
  }
}
?>
