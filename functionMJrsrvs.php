<?php
  require_once("includes/koneksi.php"); require_once("includes/logincheck.php");require_once("includes/admincheck.php");
  $cmdMeja = "SELECT * FROM meja";
  $getMeja = mysqli_query($koneksi, $cmdMeja);

  foreach($getMeja as $row){
    echo "<option value='$row[id_meja]'>$row[meja]</option>";
  }
?>
