<?php
include ("includes/koneksi.php");

if(empty($_SESSION['nama'])&&empty($_SESSION['meja'])){
    header ("Location: login.php");
}
?>
