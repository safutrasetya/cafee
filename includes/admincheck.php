<?php
  require_once("includes/koneksi.php");
  if(isset($_SESSION['meja'])){
      header ("Location: halamanmakanan.php");
  }
?>
