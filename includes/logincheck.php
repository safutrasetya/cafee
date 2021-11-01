<?php
include ("includes/koneksi.php");

if(empty($_SESSION['nama'])){
    header ("Location: login.php");
}
?>
