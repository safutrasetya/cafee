<?php
if(isset($_GET['addMakanan'])){

  // print_r($_GET['pesanan_baru']);
  if(isset($_SESSION['keranjang'])){

    $item_array_id = array_column($_SESSION['keranjang'],"menu_id");

    if(in_array($_GET['id_pesanan_baru'],$item_array_id)){

      echo "<div id='divAlert' name='divAlert' class='alert alert-warning' role='alert'><i class='bi bi-exclamation-circle-fill'></i> Pesanan tersebut sudah ada di keranjang! Tap <a href='halpesanan.php'>disini</a> untuk mengatur banyak pesanan.</div>";
      echo "<script>window.location = 'halamanmakanan.php</script>";
      echo "<br>";
    }else{

      $count=count($_SESSION['keranjang']);
      $item_array = array('menu_id'=>$_GET['id_pesanan_baru'], 'menu_quantity'=>1);
      $_SESSION['keranjang'][$count] = $item_array;
      echo "<div id='divAlert' name='divAlert' class='alert alert-info' role='alert'><i class='bi bi-check-lg'></i> Pesanan dimasukkan ke keranjang!</div>";
      // print_r($_SESSION['keranjang']);
      echo "<script>window.location = 'halamanmakanan.php</script>";
      // print_r(key(array_column($_SESSION['keranjang'],'menu_id')));
    }
  }else{

    $item_array = array('menu_id'=>$_GET['id_pesanan_baru'], 'menu_quantity'=>1);
    $_SESSION['keranjang'][0]=$item_array;
    // print_r($_SESSION['keranjang']);
    // print_r(key(array_column($_SESSION['keranjang'],'menu_id')));
    $updtstatmeja = "UPDATE meja SET reservasi = 1 WHERE id_meja='{$_SESSION['meja']}'";
    if($koneksi->query($updtstatmeja) === TRUE){
      echo "<div id='divAlert' name='divAlert' class='alert alert-info' role='alert'><i class='bi bi-check-lg'></i> Pesanan dimasukkan ke keranjang!</div>";
      echo "<script>window.location = 'halamanmakanan.php</script>";
    }else{
      echo "Error: ".$updtstatmeja."<br>".$koneksi->error;
    }
  }
}
?>
