<?php

  if(isset($_POST['btnBatalPesan'])){
    if(isset($_SESSION['keranjang'])){
      unset($_SESSION['keranjang']);
    }  
  }
?>
