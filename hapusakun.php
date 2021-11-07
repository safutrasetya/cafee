<?php

include("includes/koneksi.php");

$id = $_GET['id'];

mysqli_query($koneksi,"DELETE FROM akun WHERE id='$id'");


header('location:daftarakun.php');
 ?>
