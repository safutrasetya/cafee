<?php

session_start();

if (isset($_SESSION['keranjang'])){
  unset($_SESSION['keranjang']);
}
if(session_destroy()){
    header("Location:login.php");
}

?>
