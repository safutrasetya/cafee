<?php

session_start();

if (isset($_SESSION['keranjang'])){
  unset($_SESSION['keranjang']);
  $updtstatmeja = "UPDATE meja SET reservasi = 0 WHERE id_meja='{$_SESSION['meja']}'";
  if($koneksi->query($updtstatmeja) === TRUE){
  }else{
    echo "Error: ".$updtstatmeja."<br>".$koneksi->error;
  }
}
if(session_destroy()){
    header("Location:login.php");
}

?>
