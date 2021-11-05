<?php
include ("includes/koneksi.php");

if(empty($_SESSION['meja'])){
    header ("Location: loginmeja.php");
}
?>
