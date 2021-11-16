<?php

include("includes/koneksi.php");

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM menu WHERE id='$id'");


header('location:daftarmenu.php');
 ?>
